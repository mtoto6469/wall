<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblcategoryiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblcategoryi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idParent') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'discription') ?>

    <?= $form->field($model, 'enable') ?>

    <?php // echo $form->field($model, 'enable_view') ?>

    <?php // echo $form->field($model, 'displayPrice') ?>

    <?php // echo $form->field($model, 'dateUpdate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
