<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblalarm */

$this->title = 'ویرایش هشدار تبلیغاتی: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tblalarms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tblalarm-update col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'category'=>$category,
    ]) ?>

</div>
