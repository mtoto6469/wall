<?php
$url = Yii::$app->urlManager;
?>
<div>
    <div>
        <?php if ($category) {
            ?>
            <img class="responsiveImg" src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $category->urlImgOrMovie; ?>"style="width: 100%;height: 300px;">
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
                        <div class="col-lg-4 ">
                            <div class="col-sm-12 shadow1">
                                <div class="pRelative">
                                    <p class="displayBlock">موضوع : </p>
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
                                    <a style="position: absolute;left: 13px;cursor: pointer;"
                                       href="<?= $url->createAbsoluteUrl(['site/contact', 'id' => $image->id]) ?>"
                                       class="red">
                                        <div class="pAbsolute red"><p class="displayBlock"></p></div>
                                        تماس با ما</a>

                                </div>

                                <div>
                                    <a  href="<?= $url->createAbsoluteUrl(['site/moreadvertise','id'=>$image->id]) ?>" > <img class="responsiveImg" src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $name; ?>" alt="<?= $image->urlImgOrMovie ?>" style="width: 100%;height: 300px;"></a>
                                </div>
                                <div class="pRelative"><p class="displayBlock">توضیحات : </p>
                                    <p class="displayBlock"> <?= $image->text; ?></p>
                                    <a href="<?= $url->createAbsoluteUrl(['advertise/sabt', 'id' => $image->id]) ?>"
                                       class="red">
                                        <div class="pAbsolute red"><i class="fa fa-heart "></i>
                                            <p class="displayBlock"></p></div>
                                    </a>
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