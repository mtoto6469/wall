<?php

namespace backend\controllers;

use frontend\models\Tblalarm;
use PHPUnit\Framework\Exception;
use Yii;
use backend\models\Advertise;
use backend\models\AdvertiseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdvertiseController implements the CRUD actions for Advertise model.
 */
class AdvertiseController extends Controller
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

            $alarm=Tblalarm::find()->where(['enable'=>1])->andWhere(['enable_view'=>1])->all();
            $model=new Advertise();
            if ($model->load(Yii::$app->request->post())){

                return $this->redirect(['view', 'id' => $model->id]);
            }//end if load
            else{

                return $this->render('create',[
                    'model'=>$model,
                    'alarm'=>$alarm,
                ]);
            }//end else load
        }//end try
        catch(Exception $e){

            $transaction->rollBack();
            $this->refresh();
        }//end catch

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
