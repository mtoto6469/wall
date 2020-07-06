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
/* @var $model frontend\models\Tblproduct */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tblproducts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblproduct-view paddingX col-sm-8">

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
//            'idUser',
            'idCategory',
            'title',
            'shortdescription',
//            'desciption:ntext',
            'price',
//            'enable',
        ],
    ]) ?>

</div>
