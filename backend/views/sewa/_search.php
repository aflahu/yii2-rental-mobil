<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SewaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sewa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'no_nota') ?>

    <?= $form->field($model, 'id_penyewa') ?>

    <?= $form->field($model, 'tanggal_sewa') ?>

    <?= $form->field($model, 'jaminan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
