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
/* @var $model frontend\models\Tblproduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblproduct-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'idCategory')->dropDownList($category)->label('نام دسته') ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('نام محصول') ?>
        </div>
    </div>

    <?= $form->field($model, 'shortdescription')->textInput(['maxlength' => true])->label('نوضیحات') ?>

    <?= $form->field($model, 'desciption')->textarea(['rows' => 6])->label('توضیحات هنگام نمایش محصول') ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'price')->textInput()->label('قیمت محصول') ?>
        </div>
        <?php if ($model->isNewRecord) { ?>
            <div class="col-sm-6">
                <?= $form->field($model, 'image')->fileInput()->label('عکس محصول') ?>
            </div>
        <?php }//enf if is new record
        else {?>
            <?= $form->field($model, 'image')->fileInput()->label('عکس محصول') ?>
            <?php
            if ($model->imageName!='void') {
                ?>
                <div class="exhibitionImg"><img
                        src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $model->imageName ?>"
                        style="width: 100px;height: 100px;"></div>
                <?php
            } else {
            }
        }//end else is Update
        ?>
    </div>


    <div class="form-group">
        <?= Html::submitButton('ثبت', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
