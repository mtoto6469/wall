<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblcategoryiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tblcategoryis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblcategoryi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tblcategoryi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idParent',
            'title',
            'discription',
            'enable',
            //'enable_view',
            //'displayPrice',
            //'dateUpdate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
