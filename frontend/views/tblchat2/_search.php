<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblchat2Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblchat2-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idChat') ?>

    <?= $form->field($model, 'idSend') ?>

    <?= $form->field($model, 'text') ?>

    <?= $form->field($model, 'timeatamp') ?>

    <?php // echo $form->field($model, 'namelstnameMe') ?>

    <?php // echo $form->field($model, 'nameLastnameYou') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
