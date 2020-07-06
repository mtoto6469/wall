<?php

namespace frontend\controllers;

use common\components\Userr;
use common\models\User;
use PHPUnit\Framework\Exception;
use Yii;
use frontend\models\Profile;
use frontend\models\ProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller
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
//                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Profile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Profile model.
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
     * Creates a new Profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
//        $transaction=Yii::$app->db->beginTransaction();
//        try{
//            
//            $model=new Profile();
//            if ($model->load(Yii::$app->request->post()))
//            {
//                
//                if ($model->save())
//                {
//                    
//                    $transaction->commit();
//                    return $this->redirect(['view', 'id' => $model->id]); 
//                }
//                else{
//                    
//                    var_dump($model->getErrors());exit;
//                }
//                
//            }//end if load
//            else{
//                
//                return $this->render('create',[
//                    'model'=>$model,
//                ]);
//            }//end else load
//            
//        }//end try
//            
//        catch(Exception $e){
//            
//            $transaction->rollBack();
//            $this->refresh();
//            
//        }//end catch

//        return $this->render('create', [
//            'model' => $model,
//        ]);
    }

    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
//        $transaction=Yii::$app->db->beginTransaction();
        try{

            $idUser = User::findOne(Yii::$app->user->getId());
            $profile = Profile::find()->where(['enable' => 1])->andWhere(['idUser' => $idUser->id])->one();
            $user = User::find()->where(['id' => $profile->idUser])->one();

            $model = $this->findModel($id);


            if ($model->load(Yii::$app->request->post())) {
                $username = $model->username;
                $name = $model->name;
                $lastName = $model->lastName;
                $phone = $model->phone;
                $idRagent = $model->idRagent;
                $role = $model->role;

//            echo $username.$name.$lastName.$phone.$idRagent.$role;exit;
                $userUp = new Userr();
                $update = $userUp->Update($username, $name, $lastName, $phone, $idRagent, $role);
                if ($update) {

                    if ($update['result'] == 1) {
                        $_SESSION['error']=$update['msg'];
                        return $this->redirect(['view', 'id' => $model->id]);
                    } //if result
                    else {
                        $_SESSION['error'] = $update['msg'];
                        return $this->render('update', [
                            'model' => $model,
                        ]);
                    }//else result
                }//if $update
                else {

                }//else $update
            }//if load
            else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }//else load
            
        }//end try
        catch(Exception $e){
            
//            $transaction->rollBack();
            $this->refresh();
            
        }//end catch
       
    }

    /**
     * Deletes an existing Profile model.
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
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        }else{

            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
