<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblproduct */

$this->title = 'ویرایش محصول: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tblproducts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tblproduct-update paddingX col-sm-8">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'category'=>$category,
    ]) ?>

</div>
