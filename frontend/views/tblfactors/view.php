<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblfactors */
?>

<?php
$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tblfactors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblfactors-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
//            'idUser',
//            'idAdvertise',
//            'pricefull',
//            'idProfile',
            'type',
            'date',
            'description',
//            'time',
//            'priceReset',
            'typeproduct',
        ],
    ]) ?>

</div>
