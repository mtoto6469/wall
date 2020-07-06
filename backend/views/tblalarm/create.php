<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblalarm */

$this->title = 'هشدار تبلیغاتی';
$this->params['breadcrumbs'][] = ['label' => 'هشدار تبلیغاتی', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblalarm-create col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'category'=>$category,
    ]) ?>

</div>
