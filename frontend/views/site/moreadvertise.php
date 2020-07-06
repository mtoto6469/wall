<div>
    <div>
        <?php if ($advertise) { ?>

            <img class="responsiveImg" src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $advertise->urlImgOrMovie ?>"
                 alt="<?= $advertise->urlImgOrMovie ?>" style="width: 100%;height: 300px;">
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
                <?php if ($img) {
                    foreach ($img as $image) {
                        $name = $image->urlImgOrMove;
                        $a = explode('*', $name);
                        $count = count($a);
                        for ($i = 0; $i < $count - 1; $i++) {
                            ?>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div>

                                    <img class="responsiveImg" src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $a[$i]; ?>"
                                         alt="<?= $advertise->urlImgOrMovie ?>" style="width: 100%;height: 300px;">
                                </div>
                            </div>
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