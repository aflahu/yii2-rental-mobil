<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FasilitasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fasilitas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fasilitas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Fasilitas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'kode_fasilitas',
            'nama_fasilitas',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
