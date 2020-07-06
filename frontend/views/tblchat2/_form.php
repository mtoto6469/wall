<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblchat2 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblchat2-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idChat')->textInput() ?>

    <?= $form->field($model, 'idSend')->textInput() ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'timeatamp')->textInput() ?>

    <?= $form->field($model, 'namelstnameMe')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nameLastnameYou')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
