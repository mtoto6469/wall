<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Advertise */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Advertises', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertise-view">

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
            'title',
            'urlImgOrMovie',
            'shortDiscripton',
            'text',
            'phone',
            'fewDays',
            'namberOfVisits',
            'showOn',
            'agree',
            'startDate',
            'endDate',
            'alarm',
            'idAlarm',
            'fewHoursAlarm',
            'finalAgree',
            'enable',
            'priceAdvertise',
            'priceAlarm',
            'priceFull',
        ],
    ]) ?>

</div>
