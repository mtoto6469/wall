<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Percentage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="percentage-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'percentage')->textInput() ?>

    <?= $form->field($model, 'enable')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
