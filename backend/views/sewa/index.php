<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SewaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sewas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sewa-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sewa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'no_nota',
            'id_penyewa',
            'tanggal_sewa',
            'jaminan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
