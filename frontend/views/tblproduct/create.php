<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Tblproduct */

$this->title = 'Create Tblproduct';
$this->params['breadcrumbs'][] = ['label' => 'Tblproducts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblproduct-create col-sm-9">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'category'=>$category,
    ]) ?>

</div>
