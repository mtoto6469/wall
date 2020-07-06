<?php
namespace frontend\controllers;

use common\components\Userr;
use common\models\User;
use frontend\models\Advertise;
use frontend\models\Profile;
use frontend\models\Tblalarm;
use frontend\models\Tblcategoryi;
use frontend\models\Tblchat;
use frontend\models\Tblchat2;
use frontend\models\Tblimg;
use PHPUnit\Framework\Exception;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $enableCsrfValidation=false;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['logout', 'signup'],
//                'rules' => [
//                    [
//                        'actions' => ['signup'],
//                        'allow' => true,
//                        'roles' => ['?'],
//                    ],
//                    [
//                        'actions' => ['logout'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
//        $criteria = new CDbCriteria();
//
//        if(isset($_GET['q']))
//        {
//            $q = $_GET['q'];
//            $criteria->compare('attribute1', $q, true, 'OR');
//            $criteria->compare('attribute2', $q, true, 'OR');
//        }
//
//        $dataProvider=new CAdata("Model", array('criteria'=>$criteria));
//
//        $this->render('index',array(
//            'dataProvider'=>$dataProvider,
//        ));

//        $category=Tblcategoryi::find()->where(['enable'=>1])->andWhere(['enable_view'=>1])->all();
//        foreach ($category as $cat){
//            $showOn=$cat->id;
//            $advertise=Advertise::find()->where(['showOn'=>$cat->id])->andWhere(['enable'=>1])->all();
//            foreach ($advertise as $adver){
//                $_SESSION['title']=$adver->title;
//                $_SESSION['title']=$adver->images;
//                $_SESSION['title']=$adver->text;
//            }
//
//        }

//        echo date('Y/m/d H:i:sa');exit;
        $alarm=Tblalarm::find()->all();

        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        try{

            if (!Yii::$app->user->isGuest) {
                return $this->goHome();
            }

            $model = new LoginForm();
            if ($model->load(Yii::$app->request->post())) {
                $username=$model->username;
                $password=$model->password;

                $userU=new Userr();
                $login=$userU->Login($username,$password);
                if ($login){
                    if ($login['result']==1){
                        return $this->goBack();
                    }else{
//                    echo 5;exit;
                        $_SESSION['error']=$login['msg'];
                        return $this->render('login', [
                            'model' => $model,
                        ]);
                    }
                }//if $login
                else{


                }//else $login


            } else {
                $model->password = '';

                return $this->render('login', [
                    'model' => $model,
                ]);
            }
            
        }//end try
        catch(Exception $e){
            
            $this->refresh();
            
        }//end catch
       
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {

        $transaction=Yii::$app->db->beginTransaction();
        try{
            if (Yii::$app->request->get('id')){

                if (!Yii::$app->user->isGuest){

            $user=User::findOne(Yii::$app->user->getId());
            $idSender=$user->id;
            $idAdvertise=$_GET['id'];
            $model=new Tblchat2();
            if($model->load(Yii::$app->request->post())){

                //first save in tblchat and get id for tblchat2
             $chat=new Tblchat();
                $chat->idUserMe=$idAdvertise;
                $chat->idUserYou=$idSender;
                if ($chat->save()){
                    $idChat=$chat->id;

                }//end if save chat
                else{
                    var_dump($chat->getErrors());exit;
                    $_SESSION['error']='خطا در ذخیره سازی';
                    return $this->render('contact',[
                        'model'=>$model,
                    ]);
                }//end else chat

                $model->idChat=$idChat;
                $model->idSend=$idSender;
                //get sender name
                $sender=Profile::find()->where(['id'=>$idSender])->one();
                $senderName=$sender->name;
                $senderLastName=$sender->lastName;
                $fullName=$senderName.$senderLastName;
                $model->namelstnameMe=$fullName;

                //get recipients name
                $receiver=Profile::find()->where(['id'=>$idAdvertise])->one();
                $receiverName=$receiver->name;
                $receiverLastName=$receiver->lastName;
                $fullName1=$receiverName.$receiverLastName;
                $model->nameLastnameYou=$fullName1;

                //get time
                $model->timeatamp=date('Y/m/d-h:m:s');

                if ($model->save()){
                    $transaction->commit();
                    return $this->redirect('index');

                }//end save
                else{
                    var_dump($model->getErrors());exit;
                    $_SESSION['error']='لطفا دوباره سعی کنید';
                    return $this->render('contact',[
                        'model'=>$model,
                    ]);

                }//end else save




            }//end if load
            else {
                return $this->render('contact',[
                   'model'=>$model,
                ]);
            }//end else load
                }//end if != isGuest
                else{
//                    $_SESSION['error']='لطفا اول با نام کاربری خود وارد شوید یا ثبت نام کنید';
                    return $this->render('index');
                }////end if isGuest

            }//end if request get id
            else{
                return $this->render('index');
            }//end else request get != id
        }//rnd try
        catch(Exception $e){
            $transaction->rollBack();
            $this->refresh();
        }//end catch



        
//        $model = new ContactForm();
//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
//                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
//            } else {
//                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
//            }
//
//            return $this->refresh();
//        } else {
//            return $this->render('contact', [
//                'model' => $model,
//            ]);
//        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        try{

            $model = new SignupForm();

            if ($model->load(Yii::$app->request->post())) {
                $username = $model->username;
                $password = $model->password;
                $name = $model->name;
                $lastName = $model->lastName;
                $phone = $model->phone;
                $idRegent = $model->idRegent;
//            var_dump($model);exit;

                $userC = new Userr();

                $get = $userC->Signup($username, $password, 'user', $name, $lastName, $phone, $idRegent, 1);

                if ($get) {

                    if ($get['result'] == 1) {

                        $_SESSION['error'] = $get['msg'];
                        return $this->goHome();

                    } else {

                        $_SESSION['error'] = $get['msg'];
                    }

                } else {

                }


                if ($user = $model->signup()) {
//
//                if (Yii::$app->getUser()->login($user)) {
//
//                    return $this->goHome();
//                }
                }
            }//end $model->load
            else {
//            var_dump($model->getErrors());exit;
            }

            return $this->render('signup', [
                'model' => $model,
//            'userC'=>$userC
            ]);
            
        }//end try
        catch (Exception $e){
            
            $this->refresh();
            
        }//end catch
       
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionMoreadvertise(){
        $id=$_GET['id'];
        if ($id){
            $advertise=Advertise::find()->where(['id'=>$id])->andWhere(['enable'=>1])->one();
            $img=Tblimg::find()->where(['idImageAdvertise'=>$id])->andWhere(['typeImg'=>2])->all();
            if ($img){
               
            }//end if img
            else{}//end else img
            return $this->render('moreadvertise',[
                'advertise'=>$advertise,
                'img'=>$img,
            ]);
        }else{
            return $this->redirect('index');
        }

    }
    
    public function actionAdvertises(){
        $id=$_GET['id'];
//        $idParent=$_GET['idparent'];
        if ($id){
            $category=Tblcategoryi::find()->where(['id'=>$id])->andWhere(['enable'=>1])->andWhere(['enable_view'=>1])->one();
            if ($category){
//                echo $category->id;exit;

                $advertise=Advertise::find()->where(['enable'=>1])->andWhere(['agree'=>1])->andWhere(['finalAgree'=>1])->andWhere(['showOn'=>$category->id])->all();
                if ($advertise){
                   

                    return $this->render('advertises',[
                        'category'=>$category,
                        'advertise'=>$advertise,
                    ]);
                }//end if advertise
                else{
                    $_SESSION['error']='در این صفحه هیچ آگهی ثبت نشده';
                    return $this->render('error1',[
                        'category'=>$category,
//                        'advertise'=>$advertise,
                    ]);
//                   echo 'هیچ آگهی ثبت نشده';exit;
                }//end else advertise


            }//end if $category
            else{}//end else $category
        }//end if get id
        else{echo 2;exit;}//end else not id

    }

    public function actionProducts(){
        $id=$_GET['id'];
//        $idParent=$_GET['idparent'];
        if ($id){
            $category=Tblcategoryi::find()->where(['id'=>$id])->andWhere(['enable'=>1])->andWhere(['enable_view'=>1])->one();
            if ($category){
//                echo $category->id;exit;

                $advertise=Advertise::find()->where(['enable'=>1])->andWhere(['agree'=>1])->andWhere(['finalAgree'=>1])->andWhere(['showOn'=>$category->id])->all();
                if ($advertise){


                    return $this->render('products',[
                        'category'=>$category,
                        'advertise'=>$advertise,
                    ]);
                }//end if advertise
                else{
                    $_SESSION['error']='در این صفحه هیچ آگهی ثبت نشده';
                    return $this->render('error1',[
                        'category'=>$category,
                    ]);
//                   echo 'هیچ آگهی ثبت نشده';exit;
                }//end else advertise


            }//end if $category
            else{}//end else $category
        }//end if get id
        else{echo 2;exit;}//end else not id

    }

    public function actionMorepro(){
        $id=$_GET['id'];
        if ($id){
            $advertise=Advertise::find()->where(['id'=>$id])->andWhere(['enable'=>1])->one();
            $img=Tblimg::find()->where(['idImageAdvertise'=>$id])->andWhere(['typeImg'=>3])->all();
            if ($img){

            }//end if img
            else{}//end else img
            return $this->render('morepro',[
                'advertise'=>$advertise,
                'img'=>$img,
            ]);
        }else{
            return $this->redirect('index');
        }
    }
    //search
    public function actionSearch(){

   
        $advertise=Advertise::find()->where(['enable'=>1])->andFilterWhere(['like', 'title',$_POST['search_param']])->all();
        
        if ($advertise){
            return $this->render('search',[
                'advertise'=>$advertise,
            ]);
        }else{
            return $this->render('search',[
                'advertise'=>$advertise,
            ]);
        }
        
    }
}
