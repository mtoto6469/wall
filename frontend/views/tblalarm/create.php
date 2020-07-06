<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Tblalarm */

$this->title = 'Create Tblalarm';
$this->params['breadcrumbs'][] = ['label' => 'Tblalarms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblalarm-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
