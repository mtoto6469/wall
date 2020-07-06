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
/* @var $searchModel backend\models\PercentageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'درصد تبلیغ محصول';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="percentage-index col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
      
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'percentage',
//            'enable',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
