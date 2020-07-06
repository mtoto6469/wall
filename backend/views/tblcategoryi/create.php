<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblcategoryi */

$this->title = 'ایجاد صفحه حدید';
$this->params['breadcrumbs'][] = ['label' => 'Tblcategoryis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblcategoryi-create col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'category' => $category,
    ]) ?>

</div>
