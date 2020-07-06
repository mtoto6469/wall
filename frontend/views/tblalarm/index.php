<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblalarmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tblalarms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblalarm-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tblalarm', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idCategory',
            'fewHours',
            'price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
