<?php

namespace frontend\controllers;

use common\components\jdf;
use frontend\models\Tblalarm;
use frontend\models\Tblcategoryi;
use PHPUnit\Framework\Exception;
use Yii;
use frontend\models\Advertise;
use frontend\models\AdvertiseSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * AdvertiseController implements the CRUD actions for Advertise model.
 */
class AdvertiseController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Advertise models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdvertiseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Advertise model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Advertise model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $transaction=Yii::$app->db->beginTransaction();
        try{

            $category=ArrayHelper::map(Tblcategoryi::find()->where(['enable'=>1])->andWhere(['enable_view'=>1])->all(),'id','title');
            $alarm=Tblalarm::find()->where(['enable'=>1])->andWhere(['enable_view'=>1])->all();
            $model= new Advertise();
            if ($model->load(Yii::$app->request->post())){


                //تبدیل تاریخ شمسی کاربر به میلادی و ذخیره در دیتابیس
                $date=new jdf();

                $startJalaliDate=$model->startDate;
                $time=explode("/",$startJalaliDate);
                $d=$time[2];
                $m=$time[1];
                $y=$time[0];
                $time1=$date->jalaliToGregorian($d,$m,$y);
                $Y=$time1[0];
                $M=$time1[1];
                $D=$time1[2];
                $dateM=$Y .'/'.$M.'/'.$D;
                $model->startDate=$dateM;

                $endJalaliDate=$model->endDate;
                $endTime=explode("/",$endJalaliDate);
                $endd=$endTime[2];
                $endm=$endTime[1];
                $endy=$endTime[0];
                $endTime1=$date->jalaliToGregorian($endd,$endm,$endy);
                $endY=$endTime1[0];
                $endM=$endTime1[1];
                $endD=$endTime1[2];
                $SDateM=$endY .'/'.$endM.'/'.$endD;
                $model->endDate=$SDateM;

                $fu=$model->fewHoursAlarm;
                if ($fu==null || $fu==0){
                    $model->fewHoursAlarm=0;
                }//end if $fu
                else{
                    echo 2;exit;
                }




                if ($model->save()){

                    $transaction->commit();
                    $_SESSION['error']='اطلاعات با موفقیت ثبت شدند';
                    return $this->redirect(['view', 'id' => $model->id]);

                }//end if save
                else{

                    var_dump($model->getErrors());exit;
                    $_SESSION['error']='خطا در ذخیزه سازی اطلاعات';
                    return $this->render('create',[
                        'model'=>$model,
                        'alarm'=>$alarm,
                        'category'=>$category,
                    ]);

                }//end else save
            }//end if load
            else{

                return $this->render('create',[
                    'model'=>$model,
                    'alarm'=>$alarm,
                    'category'=>$category,
                ]);

            }//end else load
        }//end try
        catch (Exception $e){

            $transaction->rollBack();
            $this->refresh();

        }//end catch
        $model = new Advertise();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

        }

    }

    /**
     * Updates an existing Advertise model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Advertise model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Advertise model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Advertise the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Advertise::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
