<?php

namespace backend\controllers;

use backend\models\Advertise;
use backend\models\Tblcategoryi;
use PHPUnit\Framework\Exception;
use Yii;
use backend\models\Tblalarm;
use backend\models\TblalarmSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TblalarmController implements the CRUD actions for Tblalarm model.
 */
class TblalarmController extends Controller
{
   
    /**
     * {@inheritdoc}
     */
    public $enableCsrfValidation = false;

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
     * Lists all Tblalarm models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblalarmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblalarm model.
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
     * Creates a new Tblalarm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $category = ArrayHelper::map(Tblcategoryi::find()->where(['enable' => 1])->andWhere(['enable_view' => 1])->all(), 'id', 'title');
            $model = new Tblalarm();
            if ($model->load(Yii::$app->request->post())) {

                $model->enable_view = 1;
                if ($model->save()) {

                    $transaction->commit();
                    $_SESSION['error'] = 'اطلاعات با موفقیت ثبت شد';
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    $_SESSION['error'] = 'خطا ! اطلاعات ذخیره نشدند';
                    return $this->render('create', [
                        'model' => $model,
                        'category' => $category,
                    ]);
                }
            }//end if load
            else {

                return $this->render('create', [
                    'model' => $model,
                    'category' => $category,
                ]);

            }//end else load
        }//end try
        catch (Exception $e) {
            $transaction->rollBack();
            $this->refresh();
        }//end catch
//        return $this->render('create', [
//            'model' => $model,
//        ]);
    }

    /**
     * Updates an existing Tblalarm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $category = ArrayHelper::map(Tblcategoryi::find()->where(['enable' => 1])->andWhere(['enable_view' => 1])->all(), 'id', 'title');
            $model = $this->findModel($id);
            if ($model->load(Yii::$app->request->post())) {

                if ($model->save()) {
                    $transaction->commit();
                    $_SESSION['error'] = 'اطلاعات با موفقیت ثبت شد';
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {

//                    var_dump($model->getErrors());exit;
                    $_SESSION['error'] = 'خطا ! اطلاعات ذخیره نشدند';
                    return $this->render('create', [
                        'model' => $model,
                        'category' => $category,
                    ]);
                }
            }//enf if load
            else {

                return $this->render('update', [
                    'model' => $model,
                    'category' => $category,
                ]);
            }
        }//end try

        catch (Exception $e) {

            $transaction->rollBack();
            $this->refresh();

        }//end catch
    }

    /**
     * Deletes an existing Tblalarm model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $model = $this->findModel($id);


            $todayDate = date('Y/m/d');
            $model = $this->findModel($id);
            $advertiseCount = Advertise::find()->where(['enable' => 1])->andWhere(['idAlarm' => $model->id])->count();
            if ($advertiseCount > 0) {
                $count = 0;
                for ($i = 0; $i < $advertiseCount; $i++) {
                    $advertise = Advertise::find()->where(['enable' => 1])->andWhere(['idAlarm' => $model->id])->all();
                    if ($advertise) {

                        foreach ($advertise as $a) {
                            $advertiseDate = $a->endDate;
                            if ($todayDate < $advertiseDate || $todayDate == $advertiseDate) {

                                $_SESSION['error'] = 'شما مجاز به حذف نمیباشید';
                                return $this->redirect(['index']);
                            }//end if $advertiseDate
                            else {
                                
                                $model->enable_view = 0;
                                if ($model->save()) {
                                    $transaction->commit();
                                    return $this->redirect(['index']);
                                }//end if save
                                else {
                                    $_SESSION['error'] = 'خطا در خدف رکورد';
                                    return $this->redirect(['index']);
                                }//end else save


                            }//end else $advertiseDate
                        }
                    }//end if $advertise
                    else {

                        $model = $this->findModel($id);
                        $model->enable_view = 0;
                        return $this->redirect(['index']);

                    }//end else $advertise
                    $count = $count + 1;
                }//end for

//                foreach ($advertise as $advert){
//                    $advertiseDate=$advert->endDate;
//                    if ($todayDate==$advertiseDate ||$todayDate<$advertiseDate){}//end if $advertiseDate
//                    else{}//end else $advertiseDate
//            }//end foreach
            }//end if $advertiseCount>0
            else {

                $model = $this->findModel($id);
                $model->enable_view = 0;
                return $this->redirect(['index']);

            }//end if $advertiseCount>0

        }//end try
        catch (Exception $e) {

            $transaction->rollBack();
            $this->refresh();
        }//end catch


        return $this->redirect(['index']);
    }

    /**
     * Finds the Tblalarm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblalarm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblalarm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
