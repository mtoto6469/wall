<?php $url=Yii::$app->getUrlManager();  ?>
<div>
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

                                            <?php if ($img) {
                                                foreach ($img as $image) {
                                                    $name = $image->urlImgOrMove;
                                                    $a = explode('*', $name);
                                                    $count = count($a);
                                                    for ($i = 0; $i < $count - 1; $i++) {
                                                        ?>
                                                        <a class="item"> <img
                                                                src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $a[$i]; ?>"
                                                                alt="<?= $advertise->urlImgOrMovie ?>"
                                                                style="width: 100%;"></a>
                                                        <?php
                                                    }//end for $i

                                                }//end foreach img

                                            }//end if img
                                            else {
                                              if ($advertise){?>
                                                <div style="">
                                                    <a class="item"> <img
                                                            src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $advertise->urlImgOrMovie ?>"
                                                            alt="<?= $advertise->urlImgOrMovie ?>"
                                                            style="width: 100%;"></a>
                                                </div>
                                                <?php
                                            }//end if advertise
                                            else{}//end else advertise

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
           <div class="col-sm-12">
              <div class="container">
                  <div class="row">
                      <?php  if ($advertise){?>
                          <div style="padding: 15px;">
                              <span>توضیحات محصول : </span>
                              <p><?= $advertise->text ?></p>
                          </div>
                          <?php
                      }//end if advertise
                      else{}//end else advertise
                      ?>

                      <div >
                          <p class="displayBlock"> قیمت محصول :</p>
                          <?php
                          $price = $advertise->priceProduct;
                          $price1 = $price / 100;
                          $p = \frontend\models\Percentage::find()->one();
                          $p1 = $p->percentage;
                          $a = $price1 * $p1;
                          $finalPrice = $price + $a;
                          ?>
                          <span class="displayBlock"><?= $finalPrice ?></span>
                          <span class="displayBlock">تومان</span>
                      </div>

                      <div class="add ">
                          <a class="btn btn-danger  my-cart-b cartbag" href="<?= $url->createAbsoluteUrl(['advertise/factor', 'id' => $advertise->id])?> " >اضافه به سبد خرید</a>
                      </div>
                      
                  </div>
              </div>
           </div>
       </div>
   </div>

</div>



