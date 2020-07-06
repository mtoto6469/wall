<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$session = Yii::$app->session;
if (!$session->isActive) {
    $session->open();
} else {
}
if (isset($_SESSION['error'])) {
    if ($_SESSION['error'] != null) {
        echo '<div class="alert alert-info  session center-session" id="">' . $_SESSION['error'] . '</div>';
    }
    $_SESSION['error'] = null;
}

/* @var $this yii\web\View */
/* @var $model backend\models\Tblalarm */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'هشدار تبلیغاتی', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblalarm-view col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ویرایش', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('حذف', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
//            'idCategory',
            [
                'attribute' => 'idCategory',
                'value' => function ($model) {
                    $categoryName = $model->idCategory;
                    $category = \backend\models\Tblcategoryi::find()->where(['enable' => 1])->andWhere(['enable_view' => 1])->all();
                    if ($category) {

                        foreach ($category as $cat) {
                            $idCategory = $cat->id;
                            if ($categoryName == $idCategory) {

                                $categoryTitle = $cat->title;

                            }//end if
                            else {
                            }//end else

                        }//end foreach
                        return $categoryTitle;
                    }//end if $category
                    else {

                        return null;
                    }//end else $category

                },
            ],
            'fewHours',
            'price',
            [
                'attribute' => 'enable',
                'value' => function ($model) {
                    $enable = $model->enable;
                    if ($enable == 1) {

                        return 'قابل نمایش';
                    }//end if $enable 1
                    else {
                        return 'غیر قابل نمایش';
                    }//end else $enable 0
                }
            ],

        ],
    ]) ?>

</div>
