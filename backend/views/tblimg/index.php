<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblimgSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'عکس ها';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblimg-index col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('ایجاد عکس جدید', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'urlImgOrMove',
            'idImageAdvertise',
            'type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
