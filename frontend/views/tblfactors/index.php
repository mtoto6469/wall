<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblfactorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tblfactors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblfactors-index col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('فاکتورهای نهایی شده', ['index1'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'idAdvertise',
                'format' => 'html',//برای نمایس عکس
                'value' => function ($model) {
                    $advertise = \frontend\models\Advertise::find()->where(['id' => $model->id])->one();
                    if ($advertise) {

                        $image = '<img src="' . Yii::$app->request->hostInfo . '/upload/' . $advertise->urlImgOrMovie . '" width="70"; height="70">';

                        return $image;

                    }//end if $advertise
                    else {
                        return null;
                    }//end else $advertise
                },
                'label' => 'عکس محصول',
            ],
            [
                'attribute' => 'idAdvertise',
                'format' => 'html',//برای نمایس عکس
                'value' => function ($model) {
                    $advertise = \frontend\models\Advertise::find()->where(['id' => $model->id])->one();
                    if ($advertise) {
                        $productName = $advertise->title;

                        return $productName;

                    }//end if $advertise
                    else {
                        return null;
                    }//end else $advertise
                },
                'label' => 'نام محصول',
            ],
//            'idUser',
//            'idAdvertise',
//            'pricefull',
            [
                'attribute'=> 'pricefull',
                'label'=>'قیمت',
            ],
//            'idProfile',
            //'type',
//            'date',
        [
            'attribute'=>'date',
            'label'=>'تاریخ و ساعت',
        ],
            //'description',
            //'time',
            //'priceReset',
            //'typeproduct',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
