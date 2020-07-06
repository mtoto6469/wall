<?php $url=Yii::$app->urlManager;
//$session = Yii::$app->session;
//if (!$session->isActive) {
//    $session->open();
//} else {
//}
//if (isset($_SESSION['error'])) {
//    if ($_SESSION['error'] != null) {
//        echo '<div class="alert alert-info  session" id="" style="width: 200px">' . $_SESSION['error'] . '</div>';
//    }
//    $_SESSION['error'] = null;
//}
?>
<div class="index">


    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="book_slider ">
                                <div class=" bottom-shadow ">
                                    <div id="slid">
                                        <!--                                        <span id="next"><i class="fa fa-angle-right"></i></span>-->
                                        <!--                                        <span id="prev"><i class="fa fa-angle-left "></i></span>-->
                                        <div id="slider">

                                            <?php
                                            $img=\frontend\models\Tblimg::find()->where(['idImageAdvertise'=>0])->andWhere(['typeImg'=>1])->andWhere(['enable_view'=>2])->all();
                                            if ($img) {
                                                foreach ($img as $image) {
                                                    $name = $image->urlImgOrMove;
                                                    $a = explode('*', $name);
                                                    $count = count($a);
                                                    for ($i = 0; $i < $count - 1; $i++) {
                                                        ?>
                                                        <a class="item"> <img
                                                                src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $a[$i]; ?>"
                                                                alt="<?= $image->urlImgOrMove ?>"
                                                                style="width: 100%;"></a>
                                                        <?php
                                                    }//end for $i

                                                }//end foreach img

                                            }//end if img
                                            else {


                                            }//end else
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--اگهی-->
                
                <div class="wall-slider">
                    <?php
                    $category=\frontend\models\Tblcategoryi::find()->where(['enable'=>1])->andWhere(['enable_view'=>1])->andWhere(['id'=>5])->all();


                    foreach ($category as $cat){
                        $showOn=$cat->id;

                    //کد توع عکس
                    //کد 3 تبلیغ
                        $advertise=\frontend\models\Advertise::find()->where(['showOn'=>$cat->id])->andWhere(['enable'=>1])->all();
                        foreach ($advertise as $adver){?>

                            <div class="wall-slider">
                                <div><p class="displayBlock">موضوع : </p>
                                    <span class="displayBlock"><?= $adver->title; ?></span>
<!--                                    --><?php
//                                    $session = Yii::$app->session;
//                                    if (!$session->isActive) {
//                                    $session->open();
//                                    } else {
//                                    }
//                                    if (isset($_SESSION['error'])) {
//                                    if ($_SESSION['error'] != null) {
//                                    echo '<div class="alert alert-danger  session center-session" id="">' . $_SESSION['error'] . '</div>';
//                                    }
//                                    $_SESSION['error'] = null;
//                                    }
?>
                                    <a style="position: absolute;left: 13px;cursor: pointer;" href="<?= $url->createAbsoluteUrl(['site/contact','id'=>$adver->id]) ?>" class="red"><div class="pAbsolute red"> <p class="displayBlock"> </p></div></a>

                                </div>
<!--                                --><?php //$img=\frontend\models\Tblimg::find()->where(['']) ?>
<!--                                <img class="responsiveImg" src="./../../../upload/k2-4.jpg" >-->
                                <div>
                                    <a  href="<?= $url->createAbsoluteUrl(['site/moreadvertise','id'=>$adver->id]) ?>" ><img class="responsiveImg" src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $adver->urlImgOrMovie ?>" alt="hhihih" ></a>
                                </div>

                                <div class="pRelative"><p class="displayBlock">توضیحات : </p><p class="displayBlock"> <?= $adver->text; ?></p>
                                    <a href="<?= $url->createAbsoluteUrl(['advertise/sabt','id'=>$adver->id]) ?>" class="red"><div class="pAbsolute red"> <i class="fa fa-heart "></i></><p class="displayBlock"> </p></div></a>

                                </div>

                            </div>
                          <?php
                        }//end foreach

                    }//end foreach
                     ?>

                </div>
<!--                --><?php //if (isset($_SESSION['title'])&& $_SESSION['title'] !=null){echo $_SESSION['title'];} ?>

            </div>
        </div>
    </div>
    <p>jkjiomugbttu</p>
</div>