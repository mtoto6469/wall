<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblimg */

$this->title = 'Update Tblimg: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tblimgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tblimg-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'newModel'=>$newModel,
        'advertise'=>$advertise,
    ]) ?>

</div>
