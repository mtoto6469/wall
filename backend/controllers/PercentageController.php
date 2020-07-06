<?php

namespace backend\controllers;

use PHPUnit\Framework\Exception;
use Yii;
use backend\models\Percentage;
use backend\models\PercentageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PercentageController implements the CRUD actions for Percentage model.
 */
class PercentageController extends Controller
{
    public $enableCsrfValidation=false;
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
     * Lists all Percentage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PercentageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Percentage model.
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
     * Creates a new Percentage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
       $transaction=Yii::$app->db->beginTransaction();
        try{
            $model = new Percentage();

            if ($model->load(Yii::$app->request->post()) ) {

                if ($model->save()){
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $model->id]);
                }//end if save
                else {
                    $_SESSION['error'] = 'خطا در ذخیره سازی';
                    return $this->render('update', [
                        'model' => $model,
                    ]);
                }//end else save
            }//end if load
            else{
                $_SESSION['error']='خطا در ذخیره سازی';
                return $this->render('create', [
                    'model' => $model,
                ]); 
            }//end else load
            
        }//end try
        catch(Exception $e){
            $transaction->rollBack();
            $this->refresh();
        }//end catch
    }

    /**
     * Updates an existing Percentage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $transaction=Yii::$app->db->beginTransaction();
        try{
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post())) {
                if ($model->save()){
                    $transaction->commit();
                return $this->redirect(['view', 'id' => $model->id]);
            }//end if save
            else {
                $_SESSION['error'] = 'خطا در ذخیره سازی';
                return $this->render('update', [
                    'model' => $model,
                ]);
            }//end else save
            }//end else load
             else{
                 return $this->render('update', [
                     'model' => $model,
                 ]);  
             }//end else load   

        }//end try
        catch(Exception $e){
            $transaction->rollBack();
            $this->refresh();
        }//end catch
       

       
    }

    /**
     * Deletes an existing Percentage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $transaction=Yii::$app->db->beginTransaction();
        try{
            $model=$this->findModel($id);
            if ($id==2){
                $_SESSION['error'] = 'خطا در حذف';
                return $this->redirect(['index']);
            }//end if
            else {


                if ($model->delete()) {
                    $transaction->commit();
                    return $this->redirect(['index']);
                }//end if delete
                else {
                    $_SESSION['error'] = 'خطا در حذف';
                    return $this->redirect(['index']);
                }
            }
        }//end try
        catch(Exception $e){
            $transaction->rollBack();
            $this->refresh();
        }//end catch
        
    }

    /**
     * Finds the Percentage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Percentage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Percentage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
