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
/* @var $searchModel backend\models\TblalarmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'هشدار تبلیغاتی';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblalarm-index col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('ایجاد آلارم جدید', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'idCategory',
        [
            'attribute'=>'idCategory',
            'value'=>function($model){

                $idModel=$model->idCategory;
                $category=\backend\models\Tblcategoryi::find()->all();
                if ($category){

                    foreach ($category as $cat){

                        $idCategory=$cat->id;
                        if ($idCategory==$idModel){

                            $categoryName=$cat->title;

                        }//end if $idCategory
                        else{

                        }//end else idCategory
                    }//end foreach
                    return $categoryName;
                }//end if $category
                else{

                    return null;
                }//end else $category
            },//end function
        ],
            'fewHours',
            'price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
