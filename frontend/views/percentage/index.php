<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PercentageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Percentages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="percentage-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Percentage', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'percentage',
            'enable',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
