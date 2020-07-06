<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblproduct */

$this->title = 'Update Tblproduct: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tblproducts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tblproduct-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
