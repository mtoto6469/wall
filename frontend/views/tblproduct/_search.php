<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblproductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblproduct-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idCategory') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'shortdescription') ?>

    <?= $form->field($model, 'desciption') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'enable') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
