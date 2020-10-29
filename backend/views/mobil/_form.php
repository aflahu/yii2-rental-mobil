<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Mobil */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mobil-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_mobil')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_mobil')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_mobil')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun_pembuatan')->textInput() ?>

    <?= $form->field($model, 'harga_sewa')->textInput() ?>

    <?= $form->field($model, 'kapasitas_penumpang')->textInput() ?>

    <?= $form->field($model, 'status_mobil')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
