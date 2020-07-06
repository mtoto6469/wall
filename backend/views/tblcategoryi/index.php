<?php

use yii\helpers\Html;
use yii\grid\GridView;

$session = Yii::$app->session;
if (!$session->isActive) {
    $session->open();
} else {
}
if (isset($_SESSION['error'])) {
    if ($_SESSION['error'] != null) {
        echo '<div class="alert alert-danger  session center-session" id="">' . $_SESSION['error'] . '</div>';
    }
    $_SESSION['error'] = null;
}


/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblcategoryiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'دسته بندی صفحه';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblcategoryi-index col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('ایجاد صفحه جدید', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'idParent',
        [
            'attribute'=>'idParent',
            'value'=>function($model){
                $category=\backend\models\Tblcategoryi::find()->all();
                if ($category){

                    $id_parent=$model->idParent;
                    foreach ($category as $cat){
                        $id=$cat->id;
                        $idParent=$cat->idParent;
                        if ($id_parent==$id){
                            return $cat->title;
                        }
                }//end foreach
                }//end if category

            }
        ],
            'title',
            'discription',
//            'enable',
        [
          'attribute'=>'enable',
            'value'=>function($model){
                if ($model->enable==1){

                    return 'نمایش داده میشود';
                }//end if enable 1
                else{

                    return 'نمایش داده نمیشود';
                }//end else enable 0
            },
        ],
            //'enable_view',
            //'displayPrice',
            //'dateUpdate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
