<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Profile */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-view col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ویرایش', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('حذف', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'آیا از حذف این کاربر متما هستید؟',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'idUser',
            'role',
            'username',
            'name',
            'lastName',
            'phone',
            'idRagent',
            'enable',
        ],
    ]) ?>

</div>
