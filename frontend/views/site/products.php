<?php
$url = Yii::$app->urlManager;
?>
<div>
    <div>
        <?php if ($category) {
            ?>
            <img class="responsiveImg" src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $category->urlImgOrMovie; ?>"
                 style="width: 100%;height: 300px;">
            <?php
        }//end if advertise
        else {
            echo 'error';
            exit;
        }
        ?>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <?php if ($advertise) {

                    foreach ($advertise as $image) {
                        $name = $image->urlImgOrMovie;
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="col-sm-12 shadow1">


                                <div>
                                    <img class="responsiveImg"
                                         src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $name; ?>"
                                         alt="<?= $image->urlImgOrMovie ?>" style="width: 100%;height: 300px;">
                                </div>

                                <div class="pRelative">
                                    <p class="displayBlock">نام محصول : </p>
                                    <span class="displayBlock"><?= $image->title; ?></span>
                                    <?php
                                    $session = Yii::$app->session;
                                    if (!$session->isActive) {
                                        $session->open();
                                    } else {
                                    }
                                    if (isset($_SESSION['error'])) {
                                        if ($_SESSION['error'] != null) {
                                            echo '<div class="alert alert-danger  session center-session" id="">' . $_SESSION['error'] . '</div>';
                                        }
                                        $_SESSION['error'] = null;
                                    }
                                    ?>

                                </div>

                                <div class="pRelative">

                                 <div style="text-align: center">
                                     <p class="displayBlock"> قیمت محصول :</p>
                                     <?php
                                     $price = $image->priceProduct;
                                     $price1 = $price / 100;
                                     $p = \frontend\models\Percentage::find()->one();
                                     $p1 = $p->percentage;
                                     $a = $price1 * $p1;
                                     $finalPrice = $price + $a;
                                     ?>
                                     <span class="displayBlock"><?= $finalPrice ?></span>
                                     <span class="displayBlock">تومان</span>
                                 </div>

                                    <div style="text-align: center;padding-top: 10px;">
                                        <a href="<?= $url->createAbsoluteUrl(['site/morepro', 'id' => $image->id]) ?>">اطلاعات بیشتر</a>
                                    </div>

                                    <div class="add " style="text-align: center">
                                        <a class="btn btn-danger  my-cart-b cartbag" href="<?= $url->createAbsoluteUrl(['advertise/factor', 'id' => $image->id])?> " >اضافه به سبد خرید</a>
                                    </div>

                                </div>
                            </div>

                        </div>


                        <?php
                    }//end foreach $advertise
                }//end if advertise
                else {
                }//end else
                ?>
            </div>
        </div>
    </div>

</div>
