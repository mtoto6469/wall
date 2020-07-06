<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\Tblchat2Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tblchat2s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblchat2-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>

        گفتگو های خصوصی من:
        <?php
        //کارنمیکنه
        function($model1) {

        Html::a('Create Tblchat2', ['index/contact','id'=>$model1->id], ['class' => 'btn btn-success']);} ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'namelstnameMe',
//            'idChat',
//            'idSend',
            'text:ntext',
            'nameLastnameYou',
            'timeatamp',


//            ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => ' {list} {reserve}  {works} {view} {delete}',
                'buttons' => [

                    'list' => function ($url, $model) {

//                        echo $model->id;exit;
                        return Html::a(
                            '<i class="fa fa-list-alt" aria-hidden="true" style="padding: 3px;color: #000;"></i>',
                            ['site/contact', 'id' => $model->id],
                            ['title'=>'massage']
                        );
                    },
//
//                    'reserve' => function ($url, $model) {
//                        return Html::a(
//                            '<i class="fa fa-calendar" aria-hidden="true" style="padding: 3px"></i>',
//                            ['tblnobat/round', 'doc' => $model->id],
//                            ['title'=>'نوبت دهی']
//                        );
//                    },
//
//                    'works' => function ($url, $model) {
//                        return Html::a(
//                            '<i class="fa fa-medkit" aria-hidden="true" style="padding: 3px"></i>',
//                            ['works/create', 'doc' => $model->id],
//                            ['title'=>'ثبت خدمات']
//                        );
//                    },
                ],
            ],
        ],
    ]); ?>
</div>
