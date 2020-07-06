<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblchat2 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tblchat2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblchat2-view col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
//            'idChat',
//            'idSend',
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
                'label'=>'دارسال کننده'
            ],
//            'text:ntext',
//            'timeatamp',
        [
            'attribute'=> 'text',
            'label'=>'متن',
        ],
        [
            'attribute'=> 'timeatamp',
            'label'=>'تاریخ و زمان ارسال',
        ],
//            'namelstnameMe',
//            'nameLastnameYou',
        ],
    ]) ?>

</div>
