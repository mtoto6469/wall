<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Tblchat2Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'گفتگوها';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblchat2-index col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'idChat',
        [
            'attribute'=>'idChat',
            'value'=>function($model){
                $chat=\backend\models\Tblchat::find()->where(['id'=>$model->idChat])->one();
                if ($chat){
                    $user=\frontend\models\Profile::find()->where(['id'=>$chat->idUserMe])->one();
                    if ($user){
                        $name=$user->name;
                        $family=$user->lastName;
                        $fullName=$name.' '.$family;
                        return $fullName;
                    }//end if user
                    else{
                        return null;
                    }//end if user
                }//end if chat
                else{
                    return null;
                }//end else chat
            },
            'label'=>'دریافت کننده'
        ],
//            'idSend',
            [
                'attribute'=>'idSend',
                'value'=>function($model){
                    $chat=\backend\models\Tblchat::find()->where(['id'=>$model->idChat])->one();
                    if ($chat){
                        $user=\frontend\models\Profile::find()->where(['id'=>$chat->idUserYou])->one();
                        if ($user){
                            $name=$user->name;
                            $family=$user->lastName;
                            $fullName=$name.' '.$family;
                            return $fullName;
                        }//end if user
                        else{
                            return null;
                        }//end if user
                    }//end if chat
                    else{
                        return null;
                    }//end else chat
                },
                'label'=>'ارسال کننده'
            ],
            [
                'attribute'=> 'text',
                'label'=>'متن',
            ],
            [
                'attribute'=> 'timeatamp',
                'label'=>'تاریخ و زمان ارسال',
            ],
//            'text:ntext',
//            'timeatamp',
            //'namelstnameMe',
            //'nameLastnameYou',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
