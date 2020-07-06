<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblfactorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'فاکتورها';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblfactors-index">

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

            [
                'attribute' => 'idAdvertise',
                'format' => 'html',//برای نمایس عکس
                'value' => function ($model) {
                    $advertise = \frontend\models\Advertise::find()->where(['id' => $model->id])->one();
                    if ($advertise) {

                        $image = '<img src="' . Yii::$app->request->hostInfo . '/upload/' . $advertise->urlImgOrMovie . '" width="100"; height="100">';

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
            [
                'attribute'=> 'pricefull',
                'label'=>'قیمت',
            ],

            [
                'attribute'=>'updateDate',
                'label'=>'تاریخ و ساعت فبول این درخواست خرید',
            ],
//            'id',
//            'idUser',
//            'idAdvertise',
//            'pricefull',
//            'idProfile',
            //'type',
            //'date',
            //'description',
            //'time',
            //'priceReset',
            //'typeproduct',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => ' {list} {reserve}  {works} ',
                'buttons' => [

//                    'list' => function ($url, $model) {
//
////                        echo $model->id;exit;
//                        return Html::a(
//                            '<i class="fa fa-list-alt" aria-hidden="true" style="padding: 3px;color: #fff;"></i>',
//                            ['payment/index', 'id' => $model->id],
//                            ['title'=>'پرداخت']
//                        );
//                    },
//
                    'reserve' => function ($url, $model) {
                        return Html::a(
                            '<i class="fa fa-trash" aria-hidden="true" style="padding: 3px"></i>',
                            ['tblfactors/delete', 'id' => $model->id],
                            ['title'=>'حذف محصول ']
                        );
                    },
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

    ]);
    $user=\common\models\Userr::findOne(Yii::$app->user->getId());
     $count=\frontend\models\Tblfactors::find()->where(['confirm'=>1])->andWhere(['idUser'=>$user->id])->count();
    if ($count){
        $factor=\frontend\models\Tblfactors::find()->where(['confirm'=>1])->andWhere(['idUser'=>$user->id])->all();
        if ($factor){
//            for ($i=0; $i<$count ;$i++){
            $sum=0;
            foreach ($factor as $f){

                $sum=$sum+$f->pricefull;
            }
        }//end if $factor
        else{$sum=0;}//end else $factor

    }//end if count
    else{
        $sum=0;
    }//end else count

    ?>
    <div><span>قیمت کل : <?= $sum ?> </span></div>
    <?php

    ?>
<!--        <div style="color: #fff ;background: #fff; display: inline-block">-->
<!--            <button href="/frontend/web/tblfactors/cart" title="پرداخت" type="submit"><i class="fa fa-shopping-basket" aria-hidden="true" style="padding: 3px;color: #fff;background: #000"></i></button>-->
<!---->
<!--        </div>-->
    </div>

</div>
