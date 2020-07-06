<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Tblcategoryi;
use frontend\models\TblcategoryiSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TblcategoryiController implements the CRUD actions for Tblcategoryi model.
 */
class TblcategoryiController extends Controller
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
     * Lists all Tblcategoryi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblcategoryiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblcategoryi model.
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
     * Creates a new Tblcategoryi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $category = ArrayHelper::map(Tblcategoryi::find()->where(['enable_view' => 1])->all(), 'id', 'title');

            $model = new Tblcategoryi();
            if ($model->load(Yii::$app->request->post())) {


                if ($model->idParent == null || $model->idParent == 0 || $model->idParent == -1) {
                    $model->idParent = -1;
                }//end if idParent
                else {
                }//end else idParent
                if ($model->enable == null || $model->enable == 0 || $model->enable == -1) {
                    $model->enable = -1;
                }//end if enable
                else {
                }//end else enable
                if ($model->displayPrice == null || $model->displayPrice == 0 || $model->displayPrice == -1) {
                    $model->displayPrice = -1;
                }//end if enable
                else {
                }//end else enable

                $model->enable_view = 1;
                $model->dateUpdate = '0';

                if ($model->save()) {
                    $transaction->commit();
//                    return $this->render(['view', 'id' => $model->id]);
                    return $this->redirect(['view', 'id' => $model->id]);
                }//end if save
                else {
                    $_SESSION['error'] = 'اطلاعات ذخیره نشد';
                    return $this->render('create', [
                        'model' => $model,
                        'category' => $category,
                    ]);
                }//end else save

            }//end model load
            else {
                return $this->render('create', [
                    'model' => $model,
                    'category' => $category,
                ]);
            }//end else model load
        }//end try
        catch (\Exception $e) {
            $transaction->rollBack();
            $this->refresh();
        }//end catch
    }

    /**
     * Updates an existing Tblcategoryi model.
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
     * Deletes an existing Tblcategoryi model.
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
     * Finds the Tblcategoryi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblcategoryi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblcategoryi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
