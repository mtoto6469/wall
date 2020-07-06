<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblalarmSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblalarm-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idCategory') ?>

    <?= $form->field($model, 'nameCategory') ?>

    <?= $form->field($model, 'fewHours') ?>

    <?= $form->field($model, 'price') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
