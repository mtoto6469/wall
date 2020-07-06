<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblfactors */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tblfactors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblfactors-view col-sm-10">

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
            'idUser',
            'idAdvertise',
            'pricefull',
            'idProfile',
            'type',
            'date',
            'description',
            'time',
            'priceReset',
            'typeproduct',
        ],
    ]) ?>

</div>
