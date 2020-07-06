<?php

use yii\helpers\Html;
use frontend\widgets\Alert;
use yii\widgets\ActiveForm;

$session = Yii::$app->session;
if (!$session->isActive) {
    $session->open();
} else {
}
if (isset($_SESSION['error1'])) {
    if ($_SESSION['error1'] != null) {
        echo '<div class="alert alert-danger  session" id="">' . $_SESSION['error1'] . '</div>';
    }
    $_SESSION['error'] = null;
}
//echo 55;exit;
///**
// * Created by PhpStorm.
// * User: maryam
// * Date: 9/11/2018
// * Time: 3:17 PM
// */
//
//
$this->title = 'تغییر رمز';
?>


<?php $form = ActiveForm::begin(); ?>

<?= $form->field($user, 'username')->textInput(['maxlength' => true]) ?>

<?= $form->field($user, 'oldPassword')->textInput(['maxlength' => true]) ?>

<?= $form->field($user, 'newPassword')->textInput(['maxlength' => true]) ?>


<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
