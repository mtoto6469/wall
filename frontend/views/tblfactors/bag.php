<?php
use yii\helpers\Html;
use yii\grid\GridView;

?>


<div class="tblfactors-index col-sm-10">

    <h1>فاکتورها</h1>

    <p>
        <a class="btn btn-success" href="/frontend/web/tblfactors/index1">فاکتورهای نهایی شده</a></p>

    <div id="w0" class="grid-view">
        <div class="summary">Showing <b>1-3</b> of <b>3</b> items.</div>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th><a href="" data-sort="idAdvertise">عکس محصول</a>
                </th>
                <th><a href="" data-sort="idAdvertise">نام محصول</a>
                </th>
                <th><a href="" data-sort="pricefull">قیمت</a></th>
                <th><a href="" data-sort="updateDate">تاریخ و ساعت فبول
                        این درخواست خرید</a></th>
                <th class="action-column">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($factor) {
//                for ($i=0; $i<count($factor); $i++){
                $x = 0;
                $id = 0;
                foreach ($factor as $advertise) {

//echo $advertise->id;
                    $advertise1 = \frontend\models\Advertise::find()->where(['id' => $advertise->id])->andWhere(['idUser' => $advertise->idUser])->one();
                    if ($advertise1) {
                        ?>

                        <tr data-key="1">
                            <td><?= $id = $id + 1; ?></td>
                            <td><img src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $advertise1->urlImgOrMovie ?>"
                                     alt="" width="100" height="100"></td>
                            <td><?= $advertise1->title ?></td>
                            <td><?= $advertise->pricefull ?></td>
                            <td><?= $advertise->time ?></td>
                            <td>
                                <a href="/frontend/web/tblfactors/delete?id=1" title="Delete" aria-label="Delete"
                                   data-pjax="0" data-confirm="Are you sure you want to delete this item?"
                                   data-method="post"><span class="glyphicon glyphicon-trash"></span></a></td>
                            <?php
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => ' {list} {reserve}  {works} {delete}',
                                'buttons' => [

                                    'list' => function ($url, $model) {

//                        echo $model->id;exit;
                                        return Html::a(
                                            '<i class="fa fa-list-alt" aria-hidden="true" style="padding: 3px;color: #fff;"></i>',
                                            ['payment/index', 'id' => $model->id],
                                            ['title'=>'پرداخت']
                                        );
                                    },
//
                                ],
                            ]
                            ?>
                        </tr>
                        <?php
                        $x = $advertise->pricefull + $x;
                    }//end if $advertise
                    else {
                    }//end else $advertise
                }

            } else {
                echo 2;
                exit;
            } ?>

            </tbody>
        </table>

        <div><p style="display: inline-block"><a class="btn btn-success">فیمت کل : <?= $x ?></a></p>
            <div style="color: #fff ; display: inline-block">
                <button href="/frontend/web/tblfactors/cart" title="پرداخت" type="submit"><i class="fa fa-list-alt" aria-hidden="true" style="padding: 3px;color: #fff;"></i></button>

            </div>
        </div>
    </div>
</div>