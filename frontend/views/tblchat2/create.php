<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Tblchat2 */

$this->title = 'Create Tblchat2';
$this->params['breadcrumbs'][] = ['label' => 'Tblchat2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblchat2-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
