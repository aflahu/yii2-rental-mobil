<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Sewa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sewa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_nota')->textInput() ?>

    <?= $form->field($model, 'id_penyewa')->textInput() ?>

    <?= $form->field($model, 'tanggal_sewa')->textInput() ?>

    <?= $form->field($model, 'jaminan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
