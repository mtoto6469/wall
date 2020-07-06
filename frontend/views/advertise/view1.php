<?php

/**
 * Created by PhpStorm.
 * User: maryam
 * Date: 10/21/2018
 * Time: 5:39 PM
 */


use yii\helpers\Html;
use yii\widgets\DetailView;
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

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Advertises', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertise-view col-sm-8 offset-sm-2">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ویرایش', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('حذف', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
//            'idUser',
            [
                'attribute'=>'idUser',
                'value'=>function($model){
                    $user=\common\models\User::findOne(Yii::$app->user->getId());
                    return $user->username;
                }
            ],
            'title',
            'urlImgOrMovie',
//            'shortDiscripton',
//            'text',
            'phone',
            'fewDays',
//            'namberOfVisits',
//            'showOn',
//            'agree',
//            'startDate',
//            'endDate',
//            'alarm',
//            'idAlarm',
//            'dateAlarm',
//            'startTimeAlarm',
//            'fewHoursAlarm',
////            'finalAgree',
////            'enable',
//            'priceAdvertise',
//            'priceAlarm',
//            'priceFull',
        ],
    ]) ?>
    <div class="row">
        <p>توجه انتخاب زمان شروع آلارم از 1 نصف شب تا 24 میباشد پس لطفا در وارد کردن ساعت دقت نمایید.</p>
    </div>
    <div> <p>لطفا تاریخ اآلارم خارج از تاریخ تعیین شده برای تبلیغ نباشد</p></div>
    <?php $form = ActiveForm::begin(); ?>
    <div class="alarm">

        <div class="col-sm-6">
            <?php if ($alarm) { ?>

                <div class="form-group field-advertise-idAlarm required has-error">
                    <label class="control-label" for="advertise-idAlarm">انتخاب نوع آلارم</label>
                    <select id="advertise-idAlarm" class="form-control" name="Advertise[idAlarm]"
                            aria-required="true" aria-invalid="true">
                        <option value="0">صفحه</option>

                        <?php  foreach ($alarm as $a) {

                            $d = $a->id;


                            $idCategory = $a->idCategory; ?>

                            <option value="<?= $a->id; ?>">
                                <?php
                                $category1 = \frontend\models\Tblcategoryi::find()->where(['enable' => 1])->andWhere(['enable_view' => 1])->all();
                                if ($category1) {

                                    foreach ($category1 as $cat) {

                                        $id = $cat->id;

//                                        if ($id == $idCategory) {


                                            $idCat = $cat->title;

//                                            echo $idCat;exit;
//                                        } //end if
//                                        else{
//                                            echo ' <div><p>شما قادر به گزاشتن هشدار در این صفحه نمیباشید</p><div/>';
//                                        }

                                    }//end foreach
                                }//end if $category
                                else {
                                }//end else $category
                                echo '"صفحه' . ' -> ' . $idCat . ' - ' . $a->fewHours . '    ' . 'ساعت' . ' = ' . $a->price . '  ' . 'تومان'; ?>
                            </option>

                        <?php }//end foreach
                        ?>

                    </select>

                    <div class="help-block">صفحه تبلیغ cannot be blank.</div>
                </div>
            <?php } ?>
        </div>

        <div class="col-sm-3">

            <div class="form-group field-advertise-datealarm ">
                <label class="control-label" for="advertise-datealarm"> تاریخ شروع نمایش آلارم</label>
                <input id="datepicker4" class="form-control" name="Advertise[dateAlarm]" aria-required="true"
                       type="text" value="">

                <div class="help-block"></div>
            </div>
        </div>
        <?php if ($model->isNewRecord) { ?>
            <div class="col-sm-3">
                <div class="form-group field-advertise-starttimealarm">
                    <label class="control-label" for="advertise-starttimealarm">تاریخ شروع نمایش آلارم</label>
                    <input id="advertise-starttimealarm" class="form-control" name="Advertise[startTimeAlarm]"
                           type="text">

                    <div class="help-block"></div>
                </div>
            </div>
            <?php
        } else {
//            if ($advertise) {
//                ?>
<!--                <div class="col-sm-3">-->
<!--                    <div class="form-group field-advertise-starttimealarm">-->
<!--                        <label class="control-label" for="advertise-starttimealarm">Start Time Alarm</label>-->
<!--                        <input id="advertise-starttimealarm" class="form-control" name="Advertise[startTimeAlarm]"-->
<!--                               type="text" value="--><?php //echo $advertise->startTimeAlarm; ?><!--">-->
<!---->
<!--                        <div class="help-block"></div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                --><?php
//            } else {
//                ?>

                <div class="col-sm-3">
                    <div class="form-group field-advertise-starttimealarm">
                        <label class="control-label" for="advertise-starttimealarm">ساعت شروع</label>
                        <input id="advertise-starttimealarm" class="form-control" name="Advertise[startTimeAlarm]"
                               type="text">

                        <div class="help-block"></div>
                    </div>
                </div>

                <?php
//            }
            ?>

            <?php
        } ?>

    </div>


    <div class="form-group">
        <?= Html::submitButton('ثبت آلارم', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
