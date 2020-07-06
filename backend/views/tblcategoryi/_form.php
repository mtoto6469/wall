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
/* @var $model backend\models\Tblcategoryi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblcategoryi-form ">

    <?php $form = ActiveForm::begin(); ?>

    <?php if ($model->isNewRecord){ ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
<?php
        $session = Yii::$app->session;
        if (!$session->isActive) {
        $session->open();
        } else {
        }
        if (isset($_SESSION['error1'])) {
        if ($_SESSION['error1'] != null) {
        echo '<div class="alert alert-danger  session center-session" id="">' . $_SESSION['error1'] . '</div>';
        }
        $_SESSION['error1'] = null;
        }
?>

        <?= $form->field($model, 'idParent')->dropDownList($category,['prompt'=>'دسته اصلی'])->label('نام دسته والد') ?>

    <?php }else{

        $page= ' صفحه اصلی';
//    if ($page='صفحه اصلی'){echo $page;exit;}else{echo 2;exit;}
       if ($page==$model->title){   ?>
          <?php  echo $model->title; ?>

        <?= $form->field($model, 'idParent')->dropDownList($category,['prompt'=>'دسته اصلی'])->label('نام دسته والد') ?>

    <?php } else{ ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true])?>

        <?= $form->field($model, 'idParent')->dropDownList($category,['prompt'=>'دسته اصلی'])->label('نام دسته والد') ?>
   <?php } }?>

    <?= $form->field($model, 'discription')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'displayPrice')->textInput() ?>
    <?php
if ($model->isNewRecord){?>
    <?php
    $session = Yii::$app->session;
    if (!$session->isActive) {
    $session->open();
    } else {
    }
    if (isset($_SESSION['imageError'])) {
    if ($_SESSION['imageError'] != null) {
    echo '<div class="alert alert-danger  session center-session" id="">' . $_SESSION['imageError'] . '</div>';
    }
    $_SESSION['imageError'] = null;
    }
    ?>

    <?= $form->field($model, 'image')->fileInput()->label('عکس') ?>
   <?php 
}//end if is new record
    else{?>
    <?= $form->field($model, 'image')->fileInput()->label('عکس') ?>
        <img src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $model->urlImgOrMovie; ?>"
             style="width: 200px ;height: 200px" name="<?= $model->urlImgOrMovie ?>">
    <?php
    }//end else is old record
   
?>
    <?= $form->field($model, 'enable')->radioList([1=>'قابل نمایش',0=>'غیر قابل نمایش']) ?>
    

    <div class="form-group">
        <?= Html::submitButton('ثبت', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
