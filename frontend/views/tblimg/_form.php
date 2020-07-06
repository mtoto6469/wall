<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

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
/* @var $this yii\web\View */
/* @var $model frontend\models\Tblimg */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblimg-form">

    <?php $form = ActiveForm::begin(); ?>
    <div><p>توجه: شما میتوانید تا 10 عکس را همزمان آپلود کنید هنگام آپلود عکس کلید ctrl را نگه واشته و عکس هایتان را انتخاب کنید</p></div>
    <?= $form->field($newModel, 'images[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <?= $form->field($model, 'urlImgOrMove')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idImageAdvertise')->dropDownList($advertise, ['prompt' => 'نام تبلیغ'])->label('نام تبلیغ') ?>

    <?= $form->field($model, 'typeImg')->radioList(['2'=>'تبلیغات','3'=>'محسولات'])->label('نوع عکس') ?>

    <div class="form-group">
        <?= Html::submitButton('ثبت', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
