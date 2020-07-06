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
<div class="advertise"><p class="pAdd">توجه هیچ آگهی رایگان نیست
    </p></div>
<div class="advertise-form ">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('عنوان تبلیغ') ?>

    <?= $form->field($model, 'shortDiscripton')->textInput(['maxlength' => true])->label('توضیحات') ?>

    <?= $form->field($model, 'text')->textInput(['maxlength' => true])->label('متن تبلیغ') ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true])->label('تلفن') ?>
    <div class=""><p>نمایش اگهی در صفحه : </p></div>

    <div class="row">
        <?php if ($category){
            foreach ($category as $categor){
            ?>

        <div class="col-sm-3">
            <div class="form-group field-advertise-showon has-success">
                <label class="control-label" for="advertise-showon"></label>
<!--                <input name="Advertise[showOn]" value="0" type="hidden">-->
                <label><input id="advertise-showon" name="Advertise[showOn]" value="<?= $categor->id?>"  aria-invalid="false" type="checkbox">  <?= $categor->title?></label>

                <div class="help-block"></div>
            </div>

        </div>
        <?php
            }//end foreach
        }//end if $category?>

    </div>


    <!--    -->
    <div><span>لطفا نام عکس ها لاتین باشد در غیر اینصورت نمایش داده نمیشود</span></div>

    <?php if ($model->isNewRecord) { ?>
        <?= $form->field($model, 'images')->fileInput()->label('عکس تبلیغ') ?>
        <?php
    }//end if new record
    else {
        ?>
        <?= $form->field($model, 'images')->fileInput()->label('عکس تبلیغ') ?>

        <img src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $model->urlImgOrMovie; ?>"
             style="width: 200px ;height: 200px" name="<?= $model->urlImgOrMovie ?>">
        <?php
    }//end else new record
    ?>
    <div class="row"><div><p>توجه بیشترین زمان برای نمایش یک تبلیغ حداکثر 2 ماه و حداقل 6 ساعت میباشد</p></div></div>

    <div class="row">

        <div class="col-sm-3">
            <div class="form-group field-advertise-startdate ">
                <label class="control-label" for="advertise-startdate">تاریخ شروع</label>
                <input id="datepicker4" class="form-control" name="Advertise[startDate]" aria-required="true"
                       type="text" value="<?= $model->startDate ?>">

                <div class="help-block"></div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group field-advertise-enddate">
                <label class="control-label" for="advertise-enddate">تاریخ پایان</label>
                <input id="datepicker2" class="form-control" name="Advertise[endDate]" aria-required="true" type="text"
                       value="<?= $model->endDate ?>">

                <div class="help-block"></div>
            </div>
        </div>

    </div>

    <div class="form-group field-advertise-alarm has-success">

        <input name="Advertise[alarm]" value="0" type="hidden"><label><input id="advertise-alarm"
                                                                             name="Advertise[alarm]" value="1"
                                                                             aria-invalid="false" type="checkbox"
                                                                             onchange=""> Alarm</label>

        <div class="help-block"></div>
    </div>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    <!--
    function changeteaserName() {-->
        <!--
        $('.StartDateP').css('display', 'block');-->
        <!--
        $('.StartDate').css('display', 'none');-->
        <!---->
        <!--
    }-->
    <!---->
    <!--
    function chengetteaserGifName() {-->
        <!--
        $('.StartDate1').css('display', 'block');-->
        <!--
        $('.StartDate').css('display', 'none');-->
        <!--
    }-->
    <!---->
    <!--
    function Mydate() {-->
        <!--
        var idDate = $('#datepicker4').val();-->
        <!--
        alert(idDate);-->
        <!--
        $.ajax({-->
            <!--            type: 'POST',-->
    <!--            url: '--><?php //echo Yii::$app->getUrlManager()->createUrl('advertise/finddate')?>//',
    //            data: {id_teaser: idDate},
    //            success: function (data) {
    //                $('#dateStartX').html(data);
    //            }
    //
    //        });
    //    }
</script>
