<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblcategoryi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblcategoryi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idParent')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enable')->textInput() ?>

    <?= $form->field($model, 'enable_view')->textInput() ?>

    <?= $form->field($model, 'displayPrice')->textInput() ?>

    <?= $form->field($model, 'dateUpdate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
