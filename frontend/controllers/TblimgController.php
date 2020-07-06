<?php

namespace frontend\controllers;

use common\models\User;
use frontend\models\Advertise;
use frontend\models\Img;
use frontend\models\Tblcategoryi;
use PHPUnit\Framework\Exception;
use Yii;
use frontend\models\Tblimg;
use frontend\models\TblimgSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TblimgController implements the CRUD actions for Tblimg model.
 */
class TblimgController extends Controller
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
     * Lists all Tblimg models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblimgSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblimg model.
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
     * Creates a new Tblimg model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $transaction=Yii::$app->db->beginTransaction();
        try{
            $user=User::findOne(Yii::$app->user->getId());
            $code=$user->id;
            $advertise=ArrayHelper::map(Advertise::find()->where(['enable'=>1])->andWhere(['idUser'=>$code])->all(),'id','title');
            $category=ArrayHelper::map(Tblcategoryi::find()->where(['enable'=>1])->andWhere(['enable_view'=>1])->all(),'id','title');

            $model=new Tblimg();
            $newModel= new Img();

            if ($model->load((Yii::$app->request->post()))){

                $newModel->images=UploadedFile::getInstances($newModel,'images');

                if ($newModel->images != null){

                    if ($newModel->validate()){


                        //save in upload folder
                        $img1='';
                        foreach ($newModel->images as $img){

                            $nModel=new Tblimg();


                            $img->saveAs(Yii::getAlias('@upload').'/upload/'.$img->baseName . '.'.$img->extension);

                            $urlImgMove=$img->baseName . '.' .$img->extension;
                            $img1.=$urlImgMove.'*';//append کردن


//                            $nModel->urlImgOrMove=$img->baseName . '.' .$img->extension;
//                            $nModel->idImageAdvertise=$model->idImageAdvertise;
//                            if ($nModel->idImageAdvertise == null || $nModel->idImageAdvertise == 0){
//                                $nModel->idImageAdvertise=0;
//                            }else{
//
//                            }
//                            $nModel->type=$model->type;
//
//                            if ($nModel->save()){
//
//
//                            }//end if save
//                            else{
////                                var_dump($nModel->getErrors());exit;
//                                return $this->render('create', [
//                                    'model' => $model,
//                                    'newModel'=>$newModel,
//                                ]);
//                            }//end else save
                        }//end foreach
//                        var_dump($img1);exit;

                        $nModel->urlImgOrMove=$img1;
//                        echo $model->urlImgOrMove;exit;
                        $nModel->idImageAdvertise=$model->idImageAdvertise;
                        if ($nModel->idImageAdvertise == null || $nModel->idImageAdvertise == 0){
                            $nModel->idImageAdvertise=0;
                        }else{

                        }
                        $nModel->enable_view=1;
                        $nModel->type='void';
                        $nModel->typeImg=$model->typeImg;

                        if ($nModel->save()){


                        }//end if save
                        else{
                                var_dump($nModel->getErrors());exit;
                            return $this->render('create', [
                                'model' => $model,
                                'newModel'=>$newModel,
                                'advertise'=>$advertise,
                            ]);
                        }//end else save
                        $transaction->commit();
                        $id=$nModel->id;
                        return $this->redirect(['view', 'id' => $id]);
                        //save in database

                    }//end if validate
                    else{
                       var_dump($model->getErrors());exit;
                        $_SESSION['error']='عکس validate نشد';
                        return $this->render('create', [
                            'model' => $model,
                            'newModel'=>$newModel,
                            'advertise'=>$advertise,
                        ]);
                    }//end else validate

                }//end if !=null
                else{
                    var_dump($model->getErrors());exit;
                    return $this->render('create', [
                        'model' => $model,
                        'newModel'=>$newModel,
                        'advertise'=>$advertise,
                    ]);
                }//end else !=null

            }//end if load
            else{
                return $this->render('create', [
                    'model' => $model,
                    'newModel'=>$newModel,
                    'advertise'=>$advertise,
                ]);
            }//end else load

        }//end try
        catch (Exception $e){

            $transaction->rollBack();
            $this->refresh();
        }//end catch
    }

    /**
     * Updates an existing Tblimg model.
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
     * Deletes an existing Tblimg model.
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
     * Finds the Tblimg model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblimg the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblimg::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
