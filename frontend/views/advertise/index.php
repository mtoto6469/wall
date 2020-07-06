<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
/* @var $searchModel frontend\models\AdvertiseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'تبلیغات';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertise-index  col-sm-8 offset-sm-2">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('ثبت تبلیغ جدید', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idUser',
            'title',
            'urlImgOrMovie',
            'shortDiscripton',
            //'text',
            //'phone',
            //'fewDays',
            //'namberOfVisits',
            //'showOn',
            //'agree',
            //'startDate',
            //'endDate',
            //'alarm',
            //'idAlarm',
            //'dateAlarm',
            //'startTimeAlarm',
            //'fewHoursAlarm',
            //'finalAgree',
            //'enable',
            //'priceAdvertise',
            //'priceAlarm',
            //'priceFull',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
