<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Fasilitas */

$this->title = 'Update Fasilitas: ' . $model->kode_fasilitas;
$this->params['breadcrumbs'][] = ['label' => 'Fasilitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_fasilitas, 'url' => ['view', 'id' => $model->kode_fasilitas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fasilitas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
