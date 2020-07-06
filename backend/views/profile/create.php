<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Profile */

$this->title = 'ثبت کاربر';
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-create col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
