<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblproductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tblproducts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblproduct-index paddingX col-sm-8">

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
            'idUser',
//            'idCategory',
            'title',
            'shortdescription',
//            'desciption:ntext',
            'price',
            //'enable',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
