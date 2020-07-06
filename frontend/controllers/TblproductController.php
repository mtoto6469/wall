<?php

namespace frontend\controllers;

use common\models\User;
use frontend\models\Tblcategoryi;
use PHPUnit\Framework\Exception;
use Yii;
use frontend\models\Tblproduct;
use frontend\models\TblproductSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TblproductController implements the CRUD actions for Tblproduct model.
 */
class TblproductController extends Controller
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
     * Lists all Tblproduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblproductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblproduct model.
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
     * Creates a new Tblproduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            //get id user
            $user = User::findOne(Yii::$app->user->getId());
            $code = $user->id;

            $category = ArrayHelper::map(Tblcategoryi::find()->where(['enable' => 1])->andWhere(['enable_view' => 1])->andFilterWhere(['!=', 'idParent', 0])->andFilterWhere(['!=','idParent',-1])->all(), 'id', 'title');
            $model = new Tblproduct();
            if ($model->load(Yii::$app->request->post())) {
//$model->imageName='void';
                if ($model->price != null) {
//                    if ($model->imageName != null) {
                        $model->image = UploadedFile::getInstance($model, 'image');


                        if ($model->validate()) {

                            //save in folder
                            if ($model->image != null) {
                                $basename = $code . $model->image->baseName;
                                $model->image->saveAs(Yii::getAlias('@upload') . '/upload/' . $basename . '.' . $model->image->extension);
                                $image = $basename . '.' . $model->image->extension;
                            }//end if imageName != null
                            else {
                                $image = 'void';
                            }//end else imageName = null

                            //save in database
                            $model->imageName = $image;
                            $model->idUser=$code;
                            $model->enable = 1;


                            if ($model->save()) {
                                $transaction->commit();
                                $_SESSION['error'] = 'محصول ثبت شد';
                                return $this->redirect(['view', 'id' => $model->id]);
                            }//end if save
                            else {
                                $_SESSION['error'] = 'خطا در ذخیره سازی';
                                return $this->render('create', [
                                    'model' => $model,
                                    'category' => $category,
                                ]);
                            }//end els save
                        }//end if validate
                        else {
                            var_dump($model->getErrors());exit;
                            $_SESSION['error'] = 'مشکل در validate عکس';
                            return $this->render('create', [
                                'model' => $model,
                                'category' => $category,
                            ]);
                        }//end else validate
//                    }//end if image != null
//                    else {
//                        $_SESSION['error'] = 'لطفا یک عکس از محصول خود را وارد کنید';
//                        return $this->render('create', [
//                            'model' => $model,
//                            'category' => $category,
//                        ]);
//                    }//end else image = null
                }//end if price != null
                else {
                    $_SESSION['error'] = 'لطفا قیمت محصول را وارد کنید';
                    return $this->render('create', [
                        'model' => $model,
                        'category' => $category,
                    ]);
                }//end else = null
            }//end if load
            else {
                return $this->render('create', [
                    'model' => $model,
                    'category' => $category,
                ]);
            }//end if load
        }//end try
        catch (Exception $e) {
            $transaction->rollBack();
            $this->refresh();
        }//end catch
    }

    /**
     * Updates an existing Tblproduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            //get id user
            $user = User::findOne(Yii::$app->user->getId());
            $code = $user->id;

            $category = ArrayHelper::map(Tblcategoryi::find()->where(['enable' => 1])->andWhere(['enable_view' => 1])->andFilterWhere(['!=', 'id', 5])->all(), 'id', 'title');
            $model = $this->findModel($id);
            if ($model->load(Yii::$app->request->post())) {
              
                $oldImage=$model->imageName;

                if ($model->price != null){
                    $model->image=UploadedFile::getInstance($model,'image');
                    if ($model->image != null){
                        if ($model->image != $oldImage ){
                            $basename = $code . $model->image->baseName;
                            $model->image->saveAs(Yii::getAlias('@upload') . '/upload/' . $basename . '.' . $model->image->extension);
                            $image = $basename . '.' . $model->image->extension;
                        }//end if image != old image
                        else{
                            $image=$oldImage;
                        }//end if image=old image
                        $model->imageName=$image;
                        $model->enable=1;

                        if ($model->save()){
                            $transaction->commit();
                            $_SESSION['error']='محصول ویرایش شد';
                            return $this->redirect(['view', 'id' => $model->id]);

                        }//end if save
                        else{
                            $_SESSION['error']='خطا در ذخیره سازی';
                            return $this->render('update',[
                                'model'=>$model,
                                'category'=>$category,
                            ]);
                        }//end else save
                    }//end if image != null
                    else{
                        if ($model->save()){
                            $transaction->commit();
                            $_SESSION['error']='محصول ویرایش شد';
                            return $this->redirect(['view', 'id' => $model->id]);

                        }//end if save
                        else{
                            $_SESSION['error']='خطا در ذخیره سازی';
                            return $this->render('update',[
                                'model'=>$model,
                                'category'=>$category,
                            ]);
                        }//end else save
                    }//end else image = null
                }//end if price != null
                else{
                    $_SESSION['error'] = 'لطفا قیمت محصول را وارد کنید';
                    return $this->render('create', [
                        'model' => $model,
                        'category' => $category,
                    ]);
                }//end else price =null

            }//end if load
            else {
                return $this->render('update', [
                    'model' => $model,
                    'category' => $category,
                ]);
            }//end else load

        }//end try
        catch (Exception $e) {
            $transaction->rollBack();
            $this->refresh();
        }//end catch

    }

    /**
     * Deletes an existing Tblproduct model.
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
            if ($model->delete()){
                $transaction->commit();
                $_SESSION['error']='محصول حذف شد';
                return $this->redirect(['index']);
            }//end if delete
            else{
                $_SESSION['error']='خطا در حذف محصول';
                return $this->redirect(['index']);
            }//end else not delete
        }//end try
        catch(Exception $e){
            $transaction->rollBack();
            $this->refresh();
        }//end catch

    }

    /**
     * Finds the Tblproduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblproduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblproduct::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
//Operator '1' requires two operands.


