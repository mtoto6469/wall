<?php

namespace frontend\controllers;

use common\components\Userr;
use Yii;
use frontend\models\User;
use frontend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

//change pass with maryam
    public function actionChangepassword()
    {
//        $uuser=new \common\models\Userr();
        $user = Yii::$app->user->identity;
        $loadPost = $user->load(Yii::$app->request->post());


        $userCh = new Userr();

        if ($loadPost) {
            $username = $user->username;
            $oldPassword = $user->oldPassword;
            $newPassword = $user->newPassword;

            $changePassword = $userCh->changePassword($username, $oldPassword, $newPassword);
            if ($changePassword) {

                if ($changePassword['result'] == 1) {
                    $_SESSION['error1'] = $changePassword['msg'];
                    return $this->refresh();
                }//end if result
                else {
                    $_SESSION['error1'] = $changePassword['msg'];
                    return $this->render('changepassword', [
                        'user' => $user,
                    ]);
                }//end else result
            }//end if $changePassword
            else {
                return $this->render('changepassword', [
                    'user' => $user,
                ]);
            }//end else $changePassword
        }//end if $loadPost
        else {
//            $_SESSION['error1']='شما مجاز به تغییر نام کاربری نیستید';
            return $this->render('changepassword', [
                'user' => $user,
            ]);
        }


    }


    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
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
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
