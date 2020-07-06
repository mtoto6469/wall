<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblimg */

$this->title = 'ویرایش عکس: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'عکس ها', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tblimg-update col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'newModel'=>$newModel,
        'advertise'=>$advertise,
        'category'=>$category,
    ]) ?>

</div>
