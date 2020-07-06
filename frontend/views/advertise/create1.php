<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Advertise */

$this->title = 'ثبت محصول جدید';
$this->params['breadcrumbs'][] = ['label' => 'Advertises', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertise-create col-sm-8 " style="padding-left: 20%;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form1', [

        'model' => $model,
        'category' => $category,
    ]) ?>

</div>
