<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

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
            'shortDiscripton',
//            'text',
            'phone',
            'fewDays',
//            'namberOfVisits',
            'showOn',
            'agree',
            'startDate',
            'endDate',
//            'alarm',
//            'idAlarm',
//            'dateAlarm',
//            'startTimeAlarm',
//            'fewHoursAlarm',
//            'finalAgree',
//            'enable',
            'priceAdvertise',
//            'priceAlarm',
            'priceFull',
        ],
    ]) ?>
    <p class="center"> <?= Html::a('آپلود عکسهای بیشتر', ['tblimg/create'], ['class' => 'btn btn-primary']) ?></p>
</div>
