<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage();
$url = Yii::$app->urlManager;

?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="nav-side-menu col-lg-2">
    <div class="brand">دیوار</div>
    <i class="fa fa-bars fa-2px toggle-btn" data-toggle="collapse" data-target="#manu-content"></i>

    <div class="menu-list">

        <ul id="menu-cintent" class="menu-content collapse out">

            <li><a href="#"><i class="fa fa-dashboard fa-lg"></i> پنل مدیریت</a></li>

            <li data-toggle="collapse" data-target="#category" class="collapsed">
                <a href="#">
                    <i class="fa fa-dashboard fa-lg"></i>دسته بندی <span class="arrow"></span>
                    <ul class="sub-menu collapse" id="category">
                        <li><a href="<?= $url->createAbsoluteUrl(['tblcategoryi/create']) ?>">ثبت دسته  جدید</a></li>
                        <li><a href="<?= $url->createAbsoluteUrl(['tblcategoryi/index']) ?>">مدیریت دسته ها</a></li>

                    </ul>
                </a>
            </li>

            <li data-toggle="collapse" data-target="#image" class="collapsed">
                <a href="#">
                    <i class="fa fa-dashboard fa-lg"></i> آپلود عکس ها<span class="arrow"></span>
                    <ul class="sub-menu collapse" id="image">
                        <li><a href="<?= $url->createAbsoluteUrl(['tblimg/create']) ?>">ثبت عکس های جدید</a></li>
                        <li><a href="<?= $url->createAbsoluteUrl(['tblimg/index']) ?>">مدیریت عکس ها</a></li>

                    </ul>
                </a>
            </li>

            <li data-toggle="collapse" data-target="#profile" class="collapsed">
                <a href="#">
                    <i class="fa fa-dashboard fa-lg"></i>ثبت کاربر<span class="arrow"></span>
                    <ul class="sub-menu collapse" id="profile">
                        <li><a href="<?= $url->createAbsoluteUrl(['profile/create']) ?>">ثبت کاربر جدید</a></li>
                        <li><a href="<?= $url->createAbsoluteUrl(['profile/index']) ?>">مدیریت کاربران</a></li>

                    </ul>
                </a>
            </li>

            <li data-toggle="collapse" data-target="#alarm" class="collapsed">
                <a href="#">
                    <i class="fa fa-dashboard fa-lg"></i>ثبت هشدار<span class="arrow"></span>
                    <ul class="sub-menu collapse" id="alarm">
                        <li><a href="<?= $url->createAbsoluteUrl(['tblalarm/create']) ?>">ثبت هشدار جدید</a></li>
                        <li><a href="<?= $url->createAbsoluteUrl(['tblalarm/index']) ?>">مدیریت هشدارها</a></li>

                    </ul>
                </a>
            </li>

            <li data-toggle="collapse" data-target="#percentage" class="collapsed">
                <a href="#">
                    <i class="fa fa-dashboard fa-lg"></i>درصر مدیر ار فروش محصول<span ></span>
                    <ul class="sub-menu collapse" id="percentage">
                        <li><a href="<?= $url->createAbsoluteUrl(['percentage/index']) ?>">ویرایش درصد جدید</a></li>

                    </ul>
                </a>
            </li>

            <li data-toggle="collapse" data-target="#chat" class="collapsed">
                <a href="#">
                    <i class="fa fa-dashboard fa-lg"></i>چت کاربران<span class="arrow"></span>
                    <ul class="sub-menu collapse" id="chat">
                        <li><a href="<?= $url->createAbsoluteUrl(['tblchat2/index']) ?>">چت کاربران</a></li>

                    </ul>
                </a>
            </li>

            <li data-toggle="collapse" data-target="#factor" class="collapsed">
                <a href="#">
                    <?php $count=\backend\models\Tblfactors::find()->where(['confirm'=>0])->count();?>
                    <i class="fa fa-dashboard fa-lg"></i>فاکتور<span class="arrow"><span class="badge bg-red"><?= $count; ?></span>
                    <ul class="sub-menu collapse" id="factor">

                        <?php $count1=\backend\models\Tblfactors::find()->where(['confirm'=>0])->andWhere(['type'=>1])->count();?>
                        <?php $count2=\backend\models\Tblfactors::find()->where(['confirm'=>0])->andWhere(['type'=>2])->count();?>
                        <li><a href="<?= $url->createAbsoluteUrl(['tblfactors/index']) ?>"></span>تمام فاکتورها</a></li>
                        <li><a href="<?= $url->createAbsoluteUrl(['tblfactors/index2']) ?>"><span class="badge bg-red"><?= $count2; ?></span> فاکتور مربوط به خرید محصولات فروشکاه</a></li>
                        <li><a href="<?= $url->createAbsoluteUrl(['tblfactors/index1']) ?>">فاکتور مربوط به تبلیغ کنندگان <span class="badge bg-red"><?= $count1; ?></a></li>

                    </ul>
                </a>
            </li>

        </ul>
    </div>
</div>
<?= $content ?>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
