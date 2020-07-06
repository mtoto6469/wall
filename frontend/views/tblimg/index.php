<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblimgSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tblimgs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblimg-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tblimg', ['create'], ['class' => 'btn btn-success']) ?>
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
