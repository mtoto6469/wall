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
/* @var $model backend\models\Percentage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="percentage-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'percentage')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton('ثبت', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
