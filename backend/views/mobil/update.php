<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Mobil */

$this->title = 'Update Mobil: ' . $model->no_mobil;
$this->params['breadcrumbs'][] = ['label' => 'Mobils', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->no_mobil, 'url' => ['view', 'id' => $model->no_mobil]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mobil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
