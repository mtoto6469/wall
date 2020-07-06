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

//            'id',
//            'idUser',
        [
            'attribute'=>'idUser',
            'value'=>function($model){
                $user=\backend\models\Profile::find()->where(['idUser'=>$model->idUser])->one();

                $information='';
                if ($user){
                    $name=$user->name;
                    $family=$user->lastName;
                    $information=$name .$family;
                    return $information;
                }//end if user
                else{
                    return null;
                }//end else user
            },
            'label'=>'نام و نام خانوادگی خریدار',
        ],
            [
                'attribute'=>'idProfile',
                'value'=>function($model){
                    $user=\common\models\User::find()->where(['id'=>$model->idUser])->one();
                    if ($user){
                        $mobile=$user->username;
                        return $mobile;
                    }//end if user
                    else{
                        return null;
                    }//end else user
                },
                'label'=>'موبایل',

            ],
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
