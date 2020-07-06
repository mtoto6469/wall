<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblalarm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblalarm-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idCategory')->textInput() ?>

    <?= $form->field($model, 'fewHours')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
