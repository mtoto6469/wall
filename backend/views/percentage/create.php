<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Percentage */

$this->title = 'ثبت درصد تبلیغ محصول';
$this->params['breadcrumbs'][] = ['label' => 'Percentages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="percentage-create col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
