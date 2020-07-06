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
/* @var $model backend\models\Tblimg */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblimg-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($newModel, 'images[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <?= $form->field($model, 'urlImgOrMove')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enable_view')->radioList(['3'=>'نمایش داده نشود','2'=>'نمایش داده شود'])->label('نمایش عکس در اسلایدر صفحه نخست : ') ?>
    

    <div class="form-group">
        <?= Html::submitButton('ثبت', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
