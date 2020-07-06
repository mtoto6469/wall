<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Percentage */

$this->title = 'ویرایش درصد: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Percentages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="percentage-update col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
