<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Tblimg */

$this->title = 'ثبت عکس';
$this->params['breadcrumbs'][] = ['label' => 'Tblimgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblimg-create col-sm-8 paddingX">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'newModel'=>$newModel,
        'advertise'=>$advertise,
 
    ]) ?>

</div>
