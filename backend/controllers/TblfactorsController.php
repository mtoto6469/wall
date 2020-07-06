<?php

namespace backend\controllers;

use common\components\jdf;
use PHPUnit\Framework\Exception;
use Yii;
use backend\models\Tblfactors;
use backend\models\TblfactorsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TblfactorsController implements the CRUD actions for Tblfactors model.
 */
class TblfactorsController extends Controller
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
     * Lists all Tblfactors models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblfactorsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndex1()
    {
        $searchModel = new TblfactorsSearch();
        $dataProvider = $searchModel->search1(Yii::$app->request->queryParams);

        return $this->render('index1', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndex2()
    {
        $searchModel = new TblfactorsSearch();
        $dataProvider = $searchModel->search2(Yii::$app->request->queryParams);

        return $this->render('index2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblfactors model.
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
     * Creates a new Tblfactors model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tblfactors();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tblfactors model.
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

//            if ($model->load(Yii::$app->request->post())) {
            $date=new jdf();
            $model->updateDate=$date->date('Y/m/d - h:m:s');
                $model->confirm=1;
                  
                if ($model->save()){
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $model->id]);
                }//if confirm=1
                else{
                    return $this->redirect(['index','id' => $model->id]);
                }

//            }
//            else{}

//            return $this->render('update', [
//                'model' => $model,
//            ]);
        }//end try
        catch (Exception $e){
            $transaction->rollBack();
            $this->refresh();
        }//end catch
    }

    /**
     * Deletes an existing Tblfactors model.
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
     * Finds the Tblfactors model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblfactors the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblfactors::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
