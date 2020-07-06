<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Tblcategoryi */

$this->title = 'Create Tblcategoryi';
$this->params['breadcrumbs'][] = ['label' => 'Tblcategoryis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblcategoryi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
