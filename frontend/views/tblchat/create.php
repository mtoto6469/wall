<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Tblchat */

$this->title = 'Create Tblchat';
$this->params['breadcrumbs'][] = ['label' => 'Tblchats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblchat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
