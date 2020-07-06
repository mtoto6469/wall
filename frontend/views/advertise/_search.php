<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AdvertiseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advertise-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idUser') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'urlImgOrMovie') ?>

    <?= $form->field($model, 'shortDiscripton') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'fewDays') ?>

    <?php // echo $form->field($model, 'namberOfVisits') ?>

    <?php // echo $form->field($model, 'showOn') ?>

    <?php // echo $form->field($model, 'agree') ?>

    <?php // echo $form->field($model, 'startDate') ?>

    <?php // echo $form->field($model, 'endDate') ?>

    <?php // echo $form->field($model, 'alarm') ?>

    <?php // echo $form->field($model, 'idAlarm') ?>

    <?php // echo $form->field($model, 'dateAlarm') ?>

    <?php // echo $form->field($model, 'startTimeAlarm') ?>

    <?php // echo $form->field($model, 'fewHoursAlarm') ?>

    <?php // echo $form->field($model, 'finalAgree') ?>

    <?php // echo $form->field($model, 'enable') ?>

    <?php // echo $form->field($model, 'priceAdvertise') ?>

    <?php // echo $form->field($model, 'priceAlarm') ?>

    <?php // echo $form->field($model, 'priceFull') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
