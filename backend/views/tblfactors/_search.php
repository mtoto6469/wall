<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblfactorsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblfactors-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idUser') ?>

    <?= $form->field($model, 'idAdvertise') ?>

    <?= $form->field($model, 'pricefull') ?>

    <?= $form->field($model, 'idProfile') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'priceReset') ?>

    <?php // echo $form->field($model, 'typeproduct') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
