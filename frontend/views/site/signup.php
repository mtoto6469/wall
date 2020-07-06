<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$session = Yii::$app->session;
if (!$session->isActive) {
    $session->open();
} else {
}
if (isset($_SESSION['error'])) {
    if ($_SESSION['error'] != null) {
        echo '<div class="alert alert-danger  session" id="">' . $_SESSION['error'] . '</div>';
    }
    $_SESSION['error'] = null;
}


$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5 col-lg-offset-3">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label('نام ') ?>

            <?= $form->field($model, 'lastName')->textInput(['autofocus' => true])->label('نام خانوادگی') ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('نام کاربری(شماره موبایل)') ?>

            <?= $form->field($model, 'password')->passwordInput()->label('کلمه عبور') ?>

            <?= $form->field($model, 'phone')->textInput(['autofocus' => true])->label('تلفن') ?>

            <?= $form->field($model, 'idRegent')->textInput(['autofocus' => true])->label('کد معرف') ?>

<!--            --><?//= $form->field($model, 'role')->textInput(['autofocus' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
