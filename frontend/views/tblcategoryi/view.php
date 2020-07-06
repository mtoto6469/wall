<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblcategoryi */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tblcategoryis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblcategoryi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'idParent',
            'title',
            'discription',
            'enable',
            'enable_view',
            'displayPrice',
            'dateUpdate',
        ],
    ]) ?>

</div>
