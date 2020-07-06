<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblcategoryi */

$this->title = 'ویرایش : ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'دسته بندی صفحه', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tblcategoryi-update col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'category' => $category,
    ]) ?>

</div>
