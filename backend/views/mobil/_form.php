<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
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

    <?=
        $form->field($model, 'status_mobil')->textInput(['maxlength' => true])->dropDownList(['ada', 'disewa', 'perbaikan'])
    ?>
    <?= $form->field($model, 'detail_fasilitas')->widget(Select2::className(), [
        'data' => $fasilitas,
        'options' => ['multiple' => true, 'tokenSeparators' => [',', ' '], 'tags' => true]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>