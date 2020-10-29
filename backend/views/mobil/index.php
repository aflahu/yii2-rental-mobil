<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MobilSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mobils';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mobil-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Mobil', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'no_mobil',
            'nama_mobil',
            'jenis_mobil',
            'tahun_pembuatan',
            'harga_sewa',
            //'kapasitas_penumpang',
            //'status_mobil',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
