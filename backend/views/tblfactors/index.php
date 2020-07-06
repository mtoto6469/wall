<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblfactorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'فاکتور';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblfactors-index col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tblfactors', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idUser',
            'idAdvertise',
            'pricefull',
            'idProfile',
            'confirm',
            //'type',
            //'date',
            //'description',
            //'time',
            //'priceReset',
            //'typeproduct',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
