<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblimg */

$this->title = 'آپلود عکس';
$this->params['breadcrumbs'][] = ['label' => 'Tblimgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblimg-create col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'newModel'=>$newModel,
        'advertise'=>$advertise,
        'category'=>$category,
    ]) ?>

</div>
