<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblfactors */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblfactors-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idUser')->textInput() ?>

    <?= $form->field($model, 'idAdvertise')->textInput() ?>

    <?= $form->field($model, 'pricefull')->textInput() ?>

    <?= $form->field($model, 'idProfile')->textInput() ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <?= $form->field($model, 'priceReset')->textInput() ?>

    <?= $form->field($model, 'typeproduct')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
