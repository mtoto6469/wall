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

<div class="advertise-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shortDiscripton')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'showOn')->dropDownList($category,['Prompt'=>'نمایش در صفحه : ']) ?>

    <?= $form->field($model, 'images')->fileInput() ?>

    <div class="row">

        <div class="col-sm-3">
            <div class="form-group field-advertise-startdate">
                <label class="control-label" for="advertise-startdate">تاریخ شروع</label>
                <input id="datepicker4" class="form-control" name="Advertise[startDate]" aria-required="true" type="text" value="<?= $model->startDate?>">

                <div class="help-block"></div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group field-advertise-enddate">
                <label class="control-label" for="advertise-enddate">تاریخ پایان</label>
                <input id="datepicker2" class="form-control" name="Advertise[endDate]" aria-required="true" type="text" value="<?= $model->endDate ?>">

                <div class="help-block"></div>
            </div>
        </div>

        <!--    --><?//= $form->field($model, 'startDate')->textInput() ?>

    </div>

    <!--    --><?//= $form->field($model, 'endDate')->textInput() ?>

    <?= $form->field($model, 'alarm')->checkbox() ?>
    <div class="row">

        <div class="col-sm-6">
            <?php if ($alarm){  ?>
                <div class="form-group field-advertise-idcategory required has-error">
                    <label class="control-label" for="advertise-idcategory">انتخاب نوع آلارم</label>
                    <select id="advertise-idcategory" class="form-control" name="Advertise[idCategory]" aria-required="true" aria-invalid="true">
                        <option value="">صفحه</option>
                        <?php foreach ($alarm as $a){ $idCategory=$a->idCategory; ?>

                            <option value="<?= $a->id; ?>"> <?php
                                $category1=\frontend\models\Tblcategoryi::find()->where(['enable'=>1])->andWhere(['enable_view'=>1])->all();
                                if ($category1){

                                    foreach ($category1 as $cat){

                                        $id=$cat->id;
                                        if ($id==$idCategory){

                                            $idCat= $cat->title;
                                        } //end if

                                    }//end foreach
                                }//end if $category
                                else{}//end else $category
                                echo 'صفحه'.' -> '. $idCat.' - '.$a->fewHours.'    '.'ساعت'.' = '.$a->price.'  '.'تومان';?></option>

                        <?php }//end foreach ?>
                    </select>

                    <div class="help-block">صفحه تبلیغ cannot be blank.</div>
                </div>
            <?php } ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'dateAlarm')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'startTimeAlarm')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <!--    --><?//= $form->field($model, 'idAlarm')->textarea( ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
