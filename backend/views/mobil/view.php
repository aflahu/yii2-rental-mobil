<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Mobil */
/* @var $fasilitas  */

$this->title = $model->no_mobil;
$this->params['breadcrumbs'][] = ['label' => 'Mobils', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$status_mobil = ['ada', 'disewa', 'perbaikan'];
?>
<div class="mobil-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->no_mobil], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->no_mobil], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'no_mobil',
            'nama_mobil',
            'jenis_mobil',
            'tahun_pembuatan',
            'harga_sewa',
            'kapasitas_penumpang',
            [
                'label' => 'status_mobil',
                'value' => $status_mobil[$model->status_mobil]
            ],
            [
                'label' => 'fasilitas',
                'value' => $fasilitas
            ]
        ],
    ]) ?>

</div>