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
/* @var $searchModel backend\models\TblproductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tblproducts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblproduct-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tblproduct', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idCategory',
            'title',
            'shortdescription',
            'desciption:ntext',
            //'price',
            //'enable',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
