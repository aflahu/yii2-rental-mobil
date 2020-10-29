<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MobilSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mobil-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'no_mobil') ?>

    <?= $form->field($model, 'nama_mobil') ?>

    <?= $form->field($model, 'jenis_mobil') ?>

    <?= $form->field($model, 'tahun_pembuatan') ?>

    <?= $form->field($model, 'harga_sewa') ?>

    <?php // echo $form->field($model, 'kapasitas_penumpang') ?>

    <?php // echo $form->field($model, 'status_mobil') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
