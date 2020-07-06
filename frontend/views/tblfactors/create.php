<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Tblfactors */

$this->title = 'Create Tblfactors';
$this->params['breadcrumbs'][] = ['label' => 'Tblfactors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblfactors-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
