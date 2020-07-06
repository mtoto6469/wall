<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblchatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tblchats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblchat-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tblchat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idUserMe',
            'idUserYou',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
