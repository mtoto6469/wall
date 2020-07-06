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
/* @var $model frontend\models\Advertise */
/* @var $form yii\widgets\ActiveForm */
?>
?>

<div class="tblproduct-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-6">

            <?= $form->field($model, 'showOn')->dropDownList($category,['prompt'=>'دسته اصلی'])->label('نام دسته والد') ?>

         </div>

        <div class="col-sm-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('نام محصول') ?>
        </div>
    </div>
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true])->label('تلفن') ?>
    
    <?= $form->field($model, 'shortDiscripton')->textInput(['maxlength' => true])->label('توضیحات') ?>

    <?= $form->field($model, 'text')->textInput(['maxlength' => true])->label('متن ') ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'priceProduct')->textInput()->label('قیمت محصول') ?>
        </div>

        <?php if ($model->isNewRecord) { ?>
            <div class="col-sm-6">
                <?= $form->field($model, 'images')->fileInput()->label('عکس محصول') ?>
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
