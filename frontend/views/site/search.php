<?php
$url=Yii::$app->urlManager;
?>


<!--<section class="section" style="border: 1px solid rgba(0,0,0,0.2);padding: 2% 5%!important;;min-height:100vh" >-->




    <!--            <div class="left-wrap" style="box-shadow: none;padding: 0">-->



    <div class="row" style="text-align: right">


        <?php
        if($advertise!=null){

            foreach ($advertise as $pro) {


//                $id_img = explode('*', $pro->id);


//                $img =\frontend\models\Tblimg::find()->where(['id'=>$pro->id])->one();

                ?>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="product-search" dir="rtl">
                        <img src="<?= Yii::$app->request->hostInfo ?>/upload/<?=$pro->urlImgOrMovie?>" alt="<?=$pro->title?>"width="100%;">
                        <br>
                        <div style="margin:5px ">
                            <
                                       <a href="<?= $url->createAbsoluteUrl(['']) ?>"> <span class="new_btn q2">اطلاعات بیشتر</span></a>
                        </div>
                    </div>
                </div>

                <?php
            }

        }else{?>

            <div class="text-center" style="margin: 2%">
                <img src="<?=Yii::$app->request->hostInfo?>/upload/baghali.png" style="width: 400px;height: 300px">
                <p style="margin: 2%;font-size: 15px;color: darkorange">محصولی با این مشخصات یافت نشد!!</p>
            </div>

            <?php
        }
        ?>
    </div>








    <hr>

    <!--            </div>-->




<!--</section>-->

<!--modal-->

<div id="myModal" class="modal" style="position:absolute!importent">


</div>


<div id="myModal2" class="modal">


</div>

<script>

    function openModal(id) {


        $.ajax({
            type: 'GET',
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('/site/findpro') ?>',
            data: {id: id},
            success:function (data) {
                $('#myModal').html(data).css('display','block');


            }
        });


//        document.getElementById('myModal').style.display = "block";


    }

    function closeModal() {
        document.getElementById('myModal').style.display = "none";
    }
</script>


<script>

    function openModal2(id) {


        $.ajax({
            type: 'GET',
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('/site/findpro2') ?>',
            data: {id: id},
            success:function (data) {
                $('#myModal2').html(data).css('display','block');


            }
        });


//        document.getElementById('myModal').style.display = "block";


    }

    function closeModal2() {
        document.getElementById('myModal2').style.display = "none";
    }
</script>
