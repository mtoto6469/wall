<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Advertise */

$this->title = 'ویرایش: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'تبلیغات', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="advertise-update  col-sm-8 offset-sm-2">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'alarm' => $alarm,
        'category' => $category,
        'advertise' => $advertise,
    ]) ?>

</div>
