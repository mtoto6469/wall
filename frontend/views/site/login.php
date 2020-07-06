<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$session = Yii::$app->session;
if (!$session->isActive) {
    $session->open();
} else {
}
if (isset($_SESSION['error'])) {
    if ($_SESSION['error'] != null) {
        echo '<div class="alert alert-info  session" id="">' . $_SESSION['error'] . '</div>';
    }
    $_SESSION['error'] = null;
}


$this->title = 'ثبت نام';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>Please fill out the following fields to login:</p>-->

    <div class="row">
        <div class="col-lg-5 col-lg-offset-3">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('نام کاربری(شماره موبایل)') ?>

                <?= $form->field($model, 'password')->passwordInput()->label('رمز عبور') ?>

                <?= $form->field($model, 'rememberMe')->checkbox()->label('مرا بخاطر بیار') ?>

                <div style="color:#999;margin:1em 0">
                    اگر پسورد خود را فراموش کرده اید میتوانید <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
