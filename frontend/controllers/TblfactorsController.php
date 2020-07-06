<?php

namespace frontend\controllers;

use common\models\User;
use Yii;
use frontend\models\Tblfactors;
use frontend\models\TblfactorsSearch;
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
    //فاکتور هایی که مدیر تایید کرده و کاربر میتئپواند آن را پرداخت کند
    public function actionIndex1()
    {
        $searchModel = new TblfactorsSearch();
        $dataProvider = $searchModel->search1(Yii::$app->request->queryParams);
        
       

        return $this->render('index1', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionBag()
    {
        $user = User::findOne(Yii::$app->user->getId());

        $factor = Tblfactors::find()->where(['confirm' => 1])->andWhere(['idUser' => $user->id])->all();
        
        if ($factor) {
            return $this->render('bag', [
                'factor' => $factor,
            ]);
        }//end if factor
        else {
            echo 55;
            exit;
        }//end else factor
    }

    public function actionCart(){

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
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
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
