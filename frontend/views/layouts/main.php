<?php

/* @var $this \yii\web\View */ 
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;
use frontend\assets\AppAsset;
use common\widgets\Alert;

//use frontend\helpers\Html;

AppAsset::register($this);
$url = Yii::$app->urlManager;
$this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>


<nav class="navbar navbar-expand-lg navbar-light">

    <!-- logo-->
    <div class="logo">
        <h1 class="dropdown"><a class="page-scroll active" href="<?= $url->createAbsoluteUrl(['site/index']) ?>">لوگو </a></h1>
    </div>
    <?php //search?>
    <div class="mysearch" role="search">
        <?php $form =ActiveForm::begin(['action' => ['/site/search']]); ?>
        <div class="input-group searchName">
            <input type="hidden" name="search_param" value="all" id="search_param">
<!--            <input id="search" type="text" class="form-control" placeholder="جستجو..." name="Tblcategoryi[]"-->
<!--                   onkeyup="Search(this.value)">-->


<!--            <input id="search" type="text" class="form-control1 " placeholder="جستجو..." name="Tblcategoryi[]" onclick="Search(this.value)">-->
            <input id="search" type="text" class="form-control1 " placeholder="جستجو..." name="search_param">
            <span class="input-group-btn position-search">
                <button  class="bt btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
            </span>


        </div>


<!--        <ul id="search" class="dropdown-menu" role="menu">-->
<!--            <li><a href="#"><span>ojuo</span></a></li>-->
<!--        </ul>-->
        <?php ActiveForm::end(); ?>
    </div>

    <!-- home-->
    <div class="navbar-collapse  hidden1" id="bs-example-navbar-collapse-1 ">

        <ul class="nav navbar-nav navbar-right">

            <?php
            //در صورتی که مهمان نبود
            if (Yii::$app->user->isGuest) {
                ?>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">کاربران</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown"> <a href="<?= $url->createAbsoluteUrl(['site/login']) ?>" class="">ورود</a></li>
                        <li class="dropdown">  <a href="<?= $url->createAbsoluteUrl(['site/signup']) ?>" class="">ثبت نام</a></li>
                    </ul>

                </li>
                <?php
            }//else guest
            ?>

            <!--تبلیغات-->
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">آگهی</a>
                <ul class="dropdown-menu">
                    <?php
                    $advertiseCategory = \frontend\models\Tblcategoryi::find()->where(['enable' => 1])->andWhere(['enable_view' => 1])->andWhere(['idParent' => 8])->all();
                    if ($advertiseCategory) {
                        foreach ($advertiseCategory as $advertise) {
                            if ($advertise->idParent == 8) {
                                ?>
                                <li class="dropdown"><a class="dropdown-toggle"
                                                        href="<?= $url->createAbsoluteUrl(['site/advertises', 'idParent' => $advertise->idParent, 'id' => $advertise->id]) ?>"><?= $advertise->title; ?></a>
                                </li>
                                <?php
                            }//end if idParent مشاغل
                            else {
                            }//end else idParent مشاغل
                        }//end foreach
                    }//end if jabsCategory
                    else {
                    }//end if jabsCategory
                    ?>
                </ul>
            </li>
            <!--محصولات-->
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">مصالح ساختمانی</a>
                <ul class="dropdown-menu">
                    <?php $productCategory = \frontend\models\Tblcategoryi::find()->where(['enable_view' => 1])->andWhere(['enable' => 1])->andWhere(['idParent' => 9])->all();
                    if ($productCategory) {
                        foreach ($productCategory as $product) {
                            ?>
                            <li class="dropdown"><a class="dropdown-toggle"
                                                    href="<?= $url->createAbsoluteUrl(['site/products', 'idParent' => $product->idParent, 'id' => $product->id]) ?>"><?= $product->title; ?></a>
                            </li>
                            <?php
                        }//end foreach
                    }//end if Materials
                    else {
                    }//end else Materials
                    ?>
                </ul>
            </li>



        </ul>

    </div>
    <!--menu mobile-->
    <div class="book_menu-top">

        <div id="book_nav" class="book_nav_primary book_nav_primary_dropdown"><a><i
                    class="fa fa-align-justify myfa" style="color: #fff"></i></a>
            <ul class="book_menu" style="width: 217px">
                <li><a href="#" class="book_menu_with_ul">صفحه اصلی </a></li>

                <li><a href="#" class="book_menu_with_ul">مصالح ساختمانی</a>
                    <ul class="dropdown-menu second_ul">
                        <?php $productCategory = \frontend\models\Tblcategoryi::find()->where(['enable_view' => 1])->andWhere(['enable' => 1])->andWhere(['idParent' => 9])->all();
                        if ($productCategory) {
                            foreach ($productCategory as $product) {
                                ?>
                                <li class="dropdown"><a class="dropdown-toggle texta" href="<?= $url->createAbsoluteUrl(['site/products', 'idParent' => $product->idParent, 'id' => $product->id]) ?>"><?= $product->title; ?></a>
                                </li>
                                <?php
                            }//end foreach
                        }//end if Materials
                        else {
                        }//end else Materials
                        ?>
                    </ul>
                </li>
                <li><a href="#" class="book_menu_with_ul">آگهی </a>
                    <ul class="second_ul">
                        <?php
                        $advertiseCategory = \frontend\models\Tblcategoryi::find()->where(['enable' => 1])->andWhere(['enable_view' => 1])->andWhere(['idParent' => 8])->all();
                        if ($advertiseCategory) {
                            foreach ($advertiseCategory as $advertise) {
                                if ($advertise->idParent == 8) {
                                    ?>
                                    <li class="dropdown"><a class="dropdown-toggle texta" href="<?= $url->createAbsoluteUrl(['site/advertises', 'idParent' => $advertise->idParent, 'id' => $advertise->id]) ?>"><?= $advertise->title; ?></a>
                                    </li>
                                    <?php
                                }//end if idParent مشاغل
                                else {
                                }//end else idParent مشاغل
                            }//end foreach
                        }//end if jabsCategory
                        else {
                        }//end if jabsCategory
                        ?>
                    </ul>
                </li>
                <?php
                //در صورتی که مهمان نبود
                if (Yii::$app->user->isGuest) {
                    ?>
                    <li><a class="dropdown-toggle book_menu_with_ul" data-toggle="dropdown">کاربران</a>
                        <ul class="dropdown-menu second_ul">
                            <li class="dropdown"> <a href="<?= $url->createAbsoluteUrl(['site/login']) ?>" class="texta">ورود</a></li>
                            <li class="dropdown">  <a href="<?= $url->createAbsoluteUrl(['site/signup']) ?>" class="texta">ثبت نام</a></li>
                        </ul>

                    </li>
                    <?php
                }//else guest
                ?>
            </ul>
        </div>
    </div>

    <!-- profile-->
    <div class="dropdown pull-left user-buttem profileli ">
        <?php
        //در صورتی که مهمان نبود
        if (!Yii::$app->user->isGuest) {
            $user = \common\models\User::findOne(Yii::$app->user->getId());
            $profile = \frontend\models\Profile::find()->where(['idUser' => $user->id])->andWhere(['enable' => 1])->all();
            foreach ($profile as $profil) {
                $profile1 = $profil->name;
//                            $id=$profil->id;
            }
            ?>
            <button href="#" class="dropdown-toggle user" type="button" id="userX" data-toggle="dropdown">
                <i class="fa fa-bars "></i>
<!--                <div>--><?//= $profile1; ?><!--</div>-->
            </button>
            <ul class="dropdown-menu profileMenu">

                <li>
                    <a href="<?= $url->createAbsoluteUrl(['profile/update', 'id' => $profil->id], ['data-method' => 'post']) ?>">
                        ویرایش</a></li>
                <li ><a href="<?= $url->createAbsoluteUrl(['site/logout'], ['data-method' => 'post']) ?>"> خروج</a></li>
                <li><a href="<?= $url->createAbsoluteUrl(['advertise/create'], ['data-method' => 'post']) ?>"> ثبت
                        تبلیغات</a></li>

                <li><a href="<?= $url->createAbsoluteUrl(['advertise/create1'], ['data-method' => 'post']) ?>"> ثبت محصول</a></li>
                <li><a href="<?= $url->createAbsoluteUrl(['tblproduct/index'], ['data-method' => 'post']) ?>"> مدیریت محصولات ثبت شده</a></li>
                <li><a href="<?= $url->createAbsoluteUrl(['tblchat2/index'], ['data-method' => 'post']) ?>"> پیامهای
                        من</a></li>
                <li><a href="<?= $url->createAbsoluteUrl(['tblproduct/create'], ['data-method' => 'post']) ?>"> آخرین
                        بازدید</a></li>

                <li><a href="<?= $url->createAbsoluteUrl(['tblfactors/index'], ['data-method' => 'post']) ?>"> فاکتورها</a></li>
            </ul>
            <?php
        }//if !guest
//        ?>
<!--    </div>-->
</nav>

<div id="dd" class="serach">
    <?php $form =ActiveForm::begin(['action' => ['/site/search']]); ?>
    <div class="search2 searchName">
        <i id="ww" class="fa fa-times"></i>
        <input type="text" name="search_param"  id="aa" placeholder="جستجو...">
            <span class="input-group-btn position-search">
                <button  class="bt btn-default" type="submit"><span class=""></span></button>
            </span>


    </div>


    <!--        <ul id="search" class="dropdown-menu" role="menu">-->
    <!--            <li><a href="#"><span>ojuo</span></a></li>-->
    <!--        </ul>-->
    <?php ActiveForm::end(); ?>
</div>
<div class="body1">
    <?php $this->beginBody() ?>

    <body>
    <?= $content; ?>
   <footer>

   </footer>
    <?php $this->endBody() ?>
    </body>


</html>
<?php $this->endPage() ?>


<script>

    $( "input.form-control1" ).on({
        click: function() {
            $( this ).toggleClass( "active " );
        }
//        mouseenter: function() {
//            $( this ).addClass( "inside" );
//        },
// mouseleave: function() {
//            $( this ).removeClass( "inside" );
//        }
    });
</script>



<script>
    /*******************search************************/
    function searchX(){

        var search=$('#search').val();
        
        $.ajax({
            type:'GET',
            url:'<?php echo \Yii::$app->getUrlManager()->createUrl('site/search') ?>',
            data:{search:search},
            success:function (data) {
                $('#product').html(data);
                
            }
            
        });
    }
    /*******************menuR************************/
    $(document).ready(function () {
        var x = 0;
        $(".book_nav_primary_dropdown").click(function () {
            if (x == 0) {
                $(".book_menu", this).slideDown(20);
                x = 1;
            } else {
                $(".book_menu ", this).slideUp(20);
                x = 0;
            }
        });
    });

    /*******************slider************************/
    var sliderTag = $('#slider');
    var sliderItems = sliderTag.find('.item');
    var numItems = sliderItems.length;
    var nextSlide = 1;
    var timeOut = 5000;
    function slider() {
        // alert('');
        if (nextSlide > numItems) {
            nextSlide = 1;
        }
        if (nextSlide < 1) {
            nextSlide = numItems;
        }
        sliderItems.hide();
        sliderItems.eq(nextSlide - 1).fadeIn(500);
        nextSlide++;
    }
    slider();

    var sliderInterval = setInterval(slider, timeOut);
    sliderTag.mouseleave(function () {
        // clearInterval(sliderInterval);
        sliderInterval = setInterval(slider, timeOut)
    });

    function goTonext() {
        slider();
    }
    $('#slid #next').click(function () {
        clearInterval(sliderInterval);
        goTonext();
    });
    function goToprev() {
        nextSlide = nextSlide - 2;
        slider();
    }
    $('#slid #prev').click(function () {
        clearInterval(sliderInterval);
        goToprev();
    });
    $('#slider a').hover(function () {
        clearInterval(sliderInterval);
        var index = $(this).index();

    }, function () {

    });
    $('#slid span').hover(function () {
        clearInterval(sliderInterval);
        var index = $(this).index();

    }, function () {

    });



$("#search").click(function(){
    $("nav").css("display", "none");
    $("#dd").css("display", "block");


    // $("body").css("background-color", "yellow");
});

$("#ww").click(function(){
    $("nav").css("display", "block");
    $("#dd").css("display", "none");


});
</script>