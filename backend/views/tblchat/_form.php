<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblchat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblchat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idUserMe')->textInput() ?>

    <?= $form->field($model, 'idUserYou')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
