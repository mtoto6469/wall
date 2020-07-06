<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblproduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblproduct-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idCategory')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shortdescription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desciption')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'enable')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
