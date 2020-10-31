<?php

namespace backend\controllers;

use Yii;
use common\models\Mobil;
use backend\models\MobilForm;
use common\models\DetailFasilitas;
use common\models\Fasilitas;
use common\models\MobilSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MobilController implements the CRUD actions for Mobil model.
 */
class MobilController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Mobil models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MobilSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mobil model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $arr = Fasilitas::find()->select('fasilitas.nama_fasilitas')->leftJoin('detail_fasilitas', 'fasilitas.kode_fasilitas=detail_fasilitas.kode_fasilitas')->leftJoin('mobil', 'mobil.no_mobil=detail_fasilitas.no_mobil')->where(['mobil.no_mobil' => $id])->column();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'fasilitas' => join(", ", $arr)
        ]);
    }

    /**
     * Creates a new Mobil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MobilForm();

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->no_mobil]);
        // }
        if ($model->load(Yii::$app->request->post())) {
            $model::getDb()->transaction(function ($db) use ($model) {


                $model->save();
                if ($model->detail_fasilitas != null) {
                    $arr = [];
                    for ($i = 0; $i < sizeof($model->detail_fasilitas); $i++) {
                        array_push($arr, $model->no_mobil);
                    }
                    Yii::$app->db->createCommand()
                        ->batchInsert('detail_fasilitas', ['no_mobil', 'kode_fasilitas'], array_map(null, $arr, $model->detail_fasilitas))
                        ->execute();
                }
            });

            return $this->redirect(['view', 'id' => $model->no_mobil]);
        }

        return $this->render('create', [
            'model' => $model,
            'fasilitas' => Fasilitas::find()->select('nama_fasilitas')->indexBy('kode_fasilitas')->column()
        ]);
    }

    /**
     * Updates an existing Mobil model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model::getDb()->transaction(function ($db) use ($model) {

                $model->save();
                if ($model->detail_fasilitas != null) {
                    $arr = [];
                    for ($i = 0; $i < sizeof($model->detail_fasilitas); $i++) {
                        array_push($arr, $model->no_mobil);
                    }
                    DetailFasilitas::deleteAll('no_mobil = :no_mobil', ['no_mobil' => $model->no_mobil]);
                    Yii::$app->db->createCommand()
                        ->batchInsert('detail_fasilitas', ['no_mobil', 'kode_fasilitas'], array_map(null, $arr, $model->detail_fasilitas))
                        ->execute();
                } else {
                    DetailFasilitas::deleteAll('no_mobil = :no_mobil', ['no_mobil' => $model->no_mobil]);
                }
            });

            return $this->redirect(['view', 'id' => $model->no_mobil]);
        }
        return $this->render('update', [
            'model' => $model,
            'fasilitas' => Fasilitas::find()->select('nama_fasilitas')->indexBy('kode_fasilitas')->column()
        ]);
    }

    /**
     * Deletes an existing Mobil model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        Mobil::getDb()->transaction(function ($db) use ($model) {

            DetailFasilitas::deleteAll('no_mobil = :no_mobil', ['no_mobil' => $model->no_mobil]);
            $model->delete();
        });

        return $this->redirect(['index']);
    }

    /**
     * Finds the Mobil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Mobil the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MobilForm::findOne($id)) !== null) {
            $model->detail_fasilitas = DetailFasilitas::find()->select('kode_fasilitas')->where('no_mobil = :no_mobil', ['no_mobil' => $id])->column();
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
