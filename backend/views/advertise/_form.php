<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Advertise */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advertise-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idUser')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'urlImgOrMovie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shortDiscripton')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fewDays')->textInput() ?>

    <?= $form->field($model, 'namberOfVisits')->textInput() ?>

    <?= $form->field($model, 'showOn')->textInput() ?>

    <?= $form->field($model, 'agree')->textInput() ?>

    <?= $form->field($model, 'startDate')->textInput() ?>

    <?= $form->field($model, 'endDate')->textInput() ?>

    <?= $form->field($model, 'alarm')->textInput() ?>

    <?= $form->field($model, 'idAlarm')->textInput() ?>

    <?= $form->field($model, 'fewHoursAlarm')->textInput() ?>

    <?= $form->field($model, 'finalAgree')->textInput() ?>

    <?= $form->field($model, 'enable')->textInput() ?>

    <?= $form->field($model, 'priceAdvertise')->textInput() ?>

    <?= $form->field($model, 'priceAlarm')->textInput() ?>

    <?= $form->field($model, 'priceFull')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
