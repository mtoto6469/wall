<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Percentage */

$this->title = 'Create Percentage';
$this->params['breadcrumbs'][] = ['label' => 'Percentages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="percentage-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
