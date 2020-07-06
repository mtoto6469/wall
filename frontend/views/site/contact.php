<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$session = Yii::$app->session;
if (!$session->isActive) {
    $session->open();
} else {
}
if (isset($_SESSION['error'])) {
    if ($_SESSION['error'] != null) {
        echo '<div class="alert alert-danger  session center-session" id="">' . $_SESSION['error'] . '</div>';
    }
    $_SESSION['error'] = null;
}

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact offset-sm-2">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="contact col-sm-5  offset-1">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'nameLastnameYou')->textInput(['autofocus' => true])->label('نام و نام خانوادگی') ?>
            

                <?= $form->field($model, 'text')->textarea(['rows' => 6])->label('متن') ?>
            
                <div class="form-group">
                    <?= Html::submitButton('ثبت', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
