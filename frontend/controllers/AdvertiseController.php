<?php

namespace frontend\controllers;

use common\components\jdf;
use common\models\User;
use Faker\Provider\DateTime;
use frontend\models\Img;
use frontend\models\Percentage;
use frontend\models\Tblalarm;
use frontend\models\Tblcategoryi;
use frontend\models\Tblfactors;
use frontend\models\Tblimg;
use PHPUnit\Framework\MockObject\Stub\Exception;
use Yii;
use frontend\models\Advertise;
use frontend\models\AdvertiseSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

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

    //ثبت آلارم
    public function actionView1($id)
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $alarm = Tblalarm::find()->where(['enable' => 1])->andWhere(['enable_view' => 1])->all();
            $model = $this->findModel($id);


            if ($model->load(Yii::$app->request->post())) {

                //به دست آوردن قیمت آلارم و تعداد ساعت آلارم
//                if ($model->showOn == 0 || $model->showOn == -1 || $model->showOn == null) {
//                    $pricePage = 0;
//                }//end if showOn
//                else {
//                    $tblCategory = Tblcategoryi::find()->where(['id' => $model->showOn])->andWhere(['enable' => 1])->andWhere(['enable_view' => 1])->one();
//                    $pricePage = $tblCategory->displayPrice;
//                }//end else showOn
//
                $tblAlarm = Tblalarm::find()->where(['id' => $model->idAlarm])->andWhere(['enable' => 1])->andWhere(['enable_view' => 1])->one();
                if ($tblAlarm) {
                    $priceAlarm = $tblAlarm->price;//قیمت آلارم
                    $hour = $tblAlarm->fewHours;
                    $idAlarm = $tblAlarm->id;
                    $priceAdvertise = $model->priceAdvertise;//قیمت صفحه تبلیغ
                    //sum price

                    $sumPrice = $priceAlarm + $priceAdvertise;//جمع قیمت ثفحه و قیمت الارم
                    $model->priceFull = $sumPrice;//قیمت کل


                } else {
                    $_SESSION['error'] = 'لطفا نوع آلارم را مشخص کنید';
                    return $this->render('view1', [
//                'model' => $this->findModel($id),
                        'model' => $model,
                        'alarm' => $alarm,
                    ]);
                }
                $model->priceAlarm = $priceAlarm;
                $model->fewHoursAlarm = $hour;
                $model->idAlarm = $idAlarm;


                //به دست آوردن زمان آلارم
                //start alarm
                $date = new jdf();
//زمان فرستاده شده توسط کاریر
                $alarmJalaliDate = $model->dateAlarm;
//تبدیل به میلادی
                $startTime = explode("/", $alarmJalaliDate);
                $alarmd = $startTime[2];
                $alarmm = $startTime[1];
                $alarmy = $startTime[0];

                $startTime1 = $date->jalaliToGregorian($alarmd, $alarmm, $alarmy);//convert jalali to gamary

                $alarmD = $startTime1[0];
                $alarmM = $startTime1[1];
                $alarmY = $startTime1[2];
                $SDateA = $alarmY . '/' . $alarmM . '/' . $alarmD;
                $model->dateAlarm = $SDateA;


                if ($model->save()) {
                    $transaction->commit();
                    $_SESSION['error'] = 'اطلاعات با موفقیت ثبت شد';
                    return $this->redirect(['view', 'id' => $model->id]);
                }//end if save
                else {
                    $_SESSION['error'] = 'خطا در ذخیره سازی';
                    return $this->render('view1', [
//                'model' => $this->findModel($id),
                        'model' => $model,
                        'alarm' => $alarm,
                    ]);
                }//end else save


            } else {
                return $this->render('view1', [
//                'model' => $this->findModel($id),
                    'model' => $model,
                    'alarm' => $alarm,
                ]);
            }//end else load

        }//end try
        catch (\PHPUnit\Framework\Exception $e) {
            $transaction->rollBack();
            $this->refresh();
        }//end catch

    }

    /**
     * Creates a new Advertise model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function ctionFinddate()
    {

    }//

    /*****************************************************/
    public function actionFirstindex()
    {
        return $this->render('firstindex');
    }

//ثبت تبلیغ
    public function actionCreate()
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {

            $user = User::findOne(Yii::$app->user->getId());
//            $category = Tblcategoryi::find()->where(['enable' => 1])->andWhere(['enable_view' => 1])->andWhere(['<>', 'idParent', -1])->all();
            $category = Tblcategoryi::find()->where(['enable' => 1])->andWhere(['enable_view' => 1])->andWhere(['<>','idParent',9])->andWhere(['<>','idParent','-1'])->all();
            $alarm = Tblalarm::find()->where(['enable' => 1])->andWhere(['enable_view' => 1])->all();
            $model = new Advertise();
            if ($model->load(Yii::$app->request->post())) {

                $model->images = UploadedFile::getInstance($model, 'images');
                if ($model->images != null) {
                    if ($model->validate()) {

                        //save img
                        $image = new Img();

                        //save idUser with images
                        $id = $user->id;
                        $baseName = $id . $model->images->baseName;
                        $model->images->saveAs(Yii::getAlias('@upload') . '/upload/' . $baseName . '.' . $model->images->extension);//save in upload folder
                        $model->urlImgOrMovie = $baseName . '.' . $model->images->extension;

//                        $tblAlarm = Tblalarm::find()->where(['id' => $model->idAlarm])->andWhere(['enable' => 1])->andWhere(['enable_view' => 1])->one();
//                        if ($tblAlarm){$priceAlarm = $tblAlarm->price;}else{}

                        if ($model->showOn == 0 || $model->showOn == -1 || $model->showOn == null) {
                            $pricePage = 0;
                        }//end if showOn
                        else {
                            $tblCategory = Tblcategoryi::find()->where(['id' => $model->showOn])->andWhere(['enable' => 1])->andWhere(['enable_view' => 1])->one();
                            $pricePage = $tblCategory->displayPrice;
                        }//end else showOn


                        //تبدیل تاریخ شمسی کاربر به میلادی و ذخیره در دیتابیس
                        $date = new jdf();

                        //start date
                        $startJalaliDate = $model->startDate;
                        $time = explode("/", $startJalaliDate);
                        $d = $time[2];
                        $m = $time[1];
                        $y = $time[0];
                        $time1 = $date->jalaliToGregorian($d, $m, $y);
                        $Y = $time1[0];
                        $M = $time1[1];
                        $D = $time1[2];
                        $dateM = $Y . '/' . $M . '/' . $D;
                        $model->startDate = $dateM;

                        //end date
                        $endJalaliDate = $model->endDate;
                        $endTime = explode("/", $endJalaliDate);
                        $endd = $endTime[2];
                        $endm = $endTime[1];
                        $endy = $endTime[0];
                        $endTime1 = $date->jalaliToGregorian($endd, $endm, $endy);
                        $endY = $endTime1[0];
                        $endM = $endTime1[1];
                        $endD = $endTime1[2];
                        $SDateM = $endY . '/' . $endM . '/' . $endD;
                        $model->endDate = $SDateM;


//                        //start alarm
//                        $alarmJalaliDate = $model->dateAlarm;
//                        $startTime = explode("/", $alarmJalaliDate);
//                        $alarmd = $startTime[2];
//                        $alarmm = $startTime[1];
//                        $alarmy = $startTime[0];
//                        $startTime1 = $date->jalaliToGregorian($alarmd, $alarmm, $alarmy);
//                        $alarmD = $startTime1[0];
//                        $alarmM = $startTime1[1];
//                        $alarmY = $startTime1[2];
//                        $SDateA = $alarmY . '/' . $alarmM . '/' . $alarmD;
//                        $model->dateAlarm = $SDateA;
//
//                        $fu = $model->fewHoursAlarm;
//                        if ($fu == null || $fu == 0) {
//                            $model->fewHoursAlarm = 0;
//                        }//end if $fu
//                        else {
//                            $model->fewHoursAlarm = 0;
//                        }

                        //به دست آوردن ساعت ارسال اطلاعات
                        $time1 = $date->date('H:i:s');
                        $time2 = date('h:m:s');
//                echo date_default_timezone_get();


                        //به دست آوردن فاسله بین دو تاریخ
                        $end = $model->endDate . '';
                        $start = $model->startDate;
                        $end1 = strtotime($end);
                        $start1 = strtotime($start);
                        $m = $end1 - $start1;

                        $datediff = ($end1 - $start1) / (60 * 60);//convert to hour
//                 $datediff = ($end1 - $start1) / (60* 60 * 24);//convert to day
                        $dateToday = date('Y/m/d');
                        $dateToday1 = strtotime($dateToday);
                        //اگر زمان شروع برای کاربر با تاریخ امروز برابر بود
                        if ($start1 == $dateToday1) {
                            $myTime = '24:00:00';
                            $timeLeft = $myTime - $time2;//ساعت مانده امروز
                            $allTimeLeft = ($timeLeft - $myTime) + $datediff;//کل زمان ثبت تبلیغ

                        }//end if date today
                        else {
//                            echo $allTimeLeft = $datediff;
//                            exit;
                        }//end else date today
                        $dateAlarm = $model->dateAlarm;
                        if ($dateAlarm == 0 || $dateAlarm == null || $dateAlarm == -1) {
                            $dateAlarm = 0;
                        }//end if $dateAlarm
                        else {
                            $dateAlarm = $model->dateAlarm;

                        }//end else dateAlarm

                        $model->fewDays = $allTimeLeft;
                        $model->finalAgree = 0;
                        $model->idUser = $user->id;
                        $model->agree = 0;
                        $model->enable = 1;
//                        $model->priceAlarm = $priceAlarm;
                        $model->priceAdvertise = $pricePage;

                        //sum price
                        $priceAlarm = 0;
                        $sumPrice = $priceAlarm + $pricePage;
                        $model->priceFull = $sumPrice;


                        $end1 = strtotime($end);
                        $dd = $end1 - $start1;


                        if ($model->save()) {

                            $transaction->commit();
                            if ($model->alarm == 1) {
                                $_SESSION['error'] = 'اطلاعات با موفقیت ثبت شدند';
                                return $this->redirect(['view1', 'id' => $model->id, 'startJalaliDate' => $startJalaliDate]);
                            }//end if alarm==1
                            else {
                                $_SESSION['error'] = 'اطلاعات با موفقیت ثبت شدند';
                                return $this->redirect(['view', 'id' => $model->id]);
                            }//end if alarm==0


                        }//end if save
                        else {

                            var_dump($model->getErrors());
                            exit;
                            $_SESSION['error'] = 'خطا در ذخیزه سازی اطلاعات';
                            return $this->render('create', [
                                'model' => $model,
                                'alarm' => $alarm,
                                'category' => $category,
                            ]);

                        }//end else save

                    }//end if validate
                    else {
                        $_SESSION['error'] = 'خطا در validate';
                        return $this->render('create', [
                            'model' => $model,
                            'alarm' => $alarm,
                            'category' => $category,
                        ]);
                    }//end else validate
                }//end if images != null
                else {

                    $_SESSION['error'] = 'عکس اجباری میباشد';
                    return $this->render('create', [
                        'model' => $model,
                        'alarm' => $alarm,
                        'category' => $category,
                    ]);
                }//end else images == null


            }//end if load
            else {

                return $this->render('create', [
                    'model' => $model,
                    'alarm' => $alarm,
                    'category' => $category,
                ]);

            }//end else load
        }//end try
        catch (Exception $e) {

            $transaction->rollBack();
            $this->refresh();

        }//end catch


    }

    //ثبت محصول
    public function actionCreate1()
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {

            $user = User::findOne(Yii::$app->user->getId());
            $category = ArrayHelper::map(Tblcategoryi::find()->where(['enable' => 1])->andWhere(['enable_view' => 1])->andWhere(['idParent' => 9])->all(), 'id', 'title');
            $alarm = Tblalarm::find()->where(['enable' => 1])->andWhere(['enable_view' => 1])->all();
            $model = new Advertise();
            if ($model->load(Yii::$app->request->post())) {

                $model->images = UploadedFile::getInstance($model, 'images');
                if ($model->images != null) {
                    if ($model->validate()) {

                        //save img
                        $image = new Img();

                        //save idUser with images
                        $id = $user->id;
                        $baseName = $id . $model->images->baseName;
                        $model->images->saveAs(Yii::getAlias('@upload') . '/upload/' . $baseName . '.' . $model->images->extension);//save in upload folder
                        $model->urlImgOrMovie = $baseName . '.' . $model->images->extension;

//                        $tblAlarm = Tblalarm::find()->where(['id' => $model->idAlarm])->andWhere(['enable' => 1])->andWhere(['enable_view' => 1])->one();
//                        if ($tblAlarm){$priceAlarm = $tblAlarm->price;}else{}

                        if ($model->showOn == 0 || $model->showOn == -1 || $model->showOn == null) {
                            $_SESSION['error1'] = 'لطفا دسته محصول خود را وارد کنید';
                            return $this->render('create1', [
                                'model' => $model,
                                'category' => $category,
                            ]);
                        }//end if showOn
                        else {
                            $tblCategory = Tblcategoryi::find()->where(['id' => $model->showOn])->andWhere(['enable' => 1])->andWhere(['enable_view' => 1])->one();
                            $pricePage = $tblCategory->displayPrice;
                        }//end else showOn


                        //تبدیل تاریخ شمسی کاربر به میلادی و ذخیره در دیتابیس
//                        $date = new jdf();
//
//                        //start date
//                        $startJalaliDate = $model->startDate;
//                        $time = explode("/", $startJalaliDate);
//                        $d = $time[2];
//                        $m = $time[1];
//                        $y = $time[0];
//                        $time1 = $date->jalaliToGregorian($d, $m, $y);
//                        $Y = $time1[0];
//                        $M = $time1[1];
//                        $D = $time1[2];
//                        $dateM = $Y . '/' . $M . '/' . $D;
//                        $model->startDate = $dateM;
//
//                        //end date
//                        $endJalaliDate = $model->endDate;
//                        $endTime = explode("/", $endJalaliDate);
//                        $endd = $endTime[2];
//                        $endm = $endTime[1];
//                        $endy = $endTime[0];
//                        $endTime1 = $date->jalaliToGregorian($endd, $endm, $endy);
//                        $endY = $endTime1[0];
//                        $endM = $endTime1[1];
//                        $endD = $endTime1[2];
//                        $SDateM = $endY . '/' . $endM . '/' . $endD;
//                        $model->endDate = $SDateM;


//                        //start alarm
//                        $alarmJalaliDate = $model->dateAlarm;
//                        $startTime = explode("/", $alarmJalaliDate);
//                        $alarmd = $startTime[2];
//                        $alarmm = $startTime[1];
//                        $alarmy = $startTime[0];
//                        $startTime1 = $date->jalaliToGregorian($alarmd, $alarmm, $alarmy);
//                        $alarmD = $startTime1[0];
//                        $alarmM = $startTime1[1];
//                        $alarmY = $startTime1[2];
//                        $SDateA = $alarmY . '/' . $alarmM . '/' . $alarmD;
//                        $model->dateAlarm = $SDateA;
//
//                        $fu = $model->fewHoursAlarm;
//                        if ($fu == null || $fu == 0) {
//                            $model->fewHoursAlarm = 0;
//                        }//end if $fu
//                        else {
//                            $model->fewHoursAlarm = 0;
//                        }

                        //به دست آوردن ساعت ارسال اطلاعات
//                        $time1 = $date->date('H:i:s');
//                        $time2 = date('h:m:s');
//                echo date_default_timezone_get();


                        //به دست آوردن فاسله بین دو تاریخ
//                        $end = $model->endDate . '';
//                        $start = $model->startDate;
//                        $end1 = strtotime($end);
//                        $start1 = strtotime($start);
//                        $m = $end1 - $start1;
//
//                        $datediff = ($end1 - $start1) / (60 * 60);//convert to hour
////                 $datediff = ($end1 - $start1) / (60* 60 * 24);//convert to day
//                        $dateToday = date('Y/m/d');
//                        $dateToday1 = strtotime($dateToday);
//                        //اگر زمان شروع برای کاربر با تاریخ امروز برابر بود
//                        if ($start1 == $dateToday1) {
//                            $myTime = '24:00:00';
//                            $timeLeft = $myTime - $time2;//ساعت مانده امروز
//                            $allTimeLeft = ($timeLeft - $myTime) + $datediff;//کل زمان ثبت تبلیغ
//
//                        }//end if date today
//                        else {
//                            echo $allTimeLeft = $datediff;
//                            exit;
//                        }//end else date today
//                        $dateAlarm = $model->dateAlarm;
//                        if ($dateAlarm == 0 || $dateAlarm == null || $dateAlarm == -1) {
//                            $dateAlarm = 0;
//                        }//end if $dateAlarm
//                        else {
//                            $dateAlarm = $model->dateAlarm;
//
//                        }//end else dateAlarm

                        $model->namberOfVisits = 0;
                        $model->startDate = '0';
                        $model->endDate = '0';
                        $model->alarm = 0;
                        $model->idAlarm = -1;
                        $model->dateAlarm = 0;
                        $model->startTimeAlarm = '0';
                        $model->fewHoursAlarm = 0;
                        $model->fewDays = 0;
                        $model->finalAgree = 0;
                        $model->idUser = $user->id;
                        $model->agree = 0;
                        $model->enable = 1;
//                        $model->priceAlarm = $priceAlarm;
                        $model->priceAdvertise = $pricePage;

                        //sum price
                        $priceAlarm = 0;
                        $sumPrice = $priceAlarm + $pricePage;
                        $model->priceFull = $sumPrice;


//                        $end1 = strtotime($end);
//                        $dd = $end1 - $start1;


                        if ($model->save()) {

                            $transaction->commit();
                            $_SESSION['error'] = 'اطلاعات با موفقیت ثبت شدند';
                            return $this->redirect(['view', 'id' => $model->id]);

                        }//end if save
                        else {

                            var_dump($model->getErrors());
                            exit;
                            $_SESSION['error'] = 'خطا در ذخیزه سازی اطلاعات';
                            return $this->render('create1', [
                                'model' => $model,

                                'category' => $category,
                            ]);

                        }//end else save

                    }//end if validate
                    else {
                        var_dump($model->getErrors());exit;
                        $_SESSION['error'] = 'خطا در validate';
                        return $this->render('create1', [
                            'model' => $model,

                            'category' => $category,
                        ]);
                    }//end else validate
                }//end if images != null
                else {

                    $_SESSION['error'] = 'عکس اجباری میباشد';
                    return $this->render('create1', [
                        'model' => $model,

                        'category' => $category,
                    ]);
                }//end else images == null


            }//end if load
            else {

                return $this->render('create1', [
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
     * Updates an existing Advertise model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $user = User::findOne(Yii::$app->user->getId());
            $category = ArrayHelper::map(Tblcategoryi::find()->where(['enable' => 1])->andWhere(['enable_view' => 1])->all(), 'id', 'title');
            $alarm = Tblalarm::find()->where(['enable' => 1])->andWhere(['enable_view' => 1])->all();
            $advertise = Advertise::find()->where(['idUser' => $user->id])->andWhere(['enable' => 1])->andWhere(['id' => $id])->one();

            $model = $this->findModel($id);
            if ($model->load(Yii::$app->request->post())) {

                if ($model->agree == 1) {
                    if ($model->images == null) {
                        if ($model->save()) {

                            $_SESSION['error'] = 'اطلاعات با موفقیت ذخیره شدند';
                            return $this->redirect(['view', 'id' => $model->id]);

                        }//end if save
                        else {
                            var_dump($model->getErrors());
                            $_SESSION['error'] = 'خطا در ذخیره اطلاعات';
                            return $this->render('update', [
                                'model' => $model,
                                'category' => $category,
                                'alarm' => $alarm,
                                'advertise' => $advertise,
                            ]);
                        }//end else save
                    }//end if image = null
                    else {

                        if ($model->validate()) {


                            //save idUser with images
                            $id = $user->id;
                            $baseName = $id . $model->images->baseName;
                            $model->images->saveAs(Yii::getAlias('@upload') . '/upload/' . $baseName . '.' . $model->images->extension);//save in upload folder
                            $model->urlImgOrMovie = $baseName;

                            if ($model->save()) {
                                $_SESSION['error'] = 'اطلاعات با موفقیت ذخیره شدند';
                                return $this->redirect(['view', 'id' => $model->id]);
                            }//end if save
                            else {
                                var_dump($model->getErrors());
                                $_SESSION['error'] = 'خطا در ذخیره اطلاعات';
                                return $this->render('update', [
                                    'model' => $model,
                                    'category' => $category,
                                    'alarm' => $alarm,
                                    'advertise' => $advertise,
                                ]);
                            }//end else save
                        }//end if validate
                        else {

                            $_SESSION['error'] = 'عکس not validate';
                            return $this->render('update', [
                                'model' => $model,
                                'category' => $category,
                                'alarm' => $alarm,
                                'advertise' => $advertise,
                            ]);
                        }//end else validate
                    }//end else image != null


                }//end if agree 1
                else {

                    $_SESSION['error'] = 'شما مجاز به تغییر نیستید میتوانید درخواست را حذف کنید';
                    return $this->render('update', [
                        'model' => $model,
                        'category' => $category,
                        'alarm' => $alarm,
                        'advertise' => $advertise,
                    ]);

                }//end else agree 0

            }//end if load
            else {

                return $this->render('update', [
                    'model' => $model,
                    'category' => $category,
                    'alarm' => $alarm,
                    'advertise' => $advertise,
                ]);
            }//end else load

        }//end try
        catch (Exception $e) {
            $transaction->rollBack();
            $this->refresh();
        }//end catch
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
        $date = date('Y/m/d');

        //        $this->findModel($id)->delete();
        $advertise = Advertise::find()->where(['enable' => 1])->andWhere(['id' => $id])->one();
        $dateAdvertise = $advertise->endDate;
        if ($date > $dateAdvertise) {
            $model = $this->findModel($id);
            if ($model->delete()) {
                return $this->redirect(['index']);
            }//id delete
            else {
                $_SESSION['error'] = 'رکورد حذف نشد';
                return $this->redirect(['index']);
            }//end else delete

        } else {
            $_SESSION['error'] = 'شما مجاز به حذف نمیباشید';
            return $this->redirect(['index']);
        }
//        $model=$this->findModel($id);


        return $this->redirect(['index']);
    }

    /**
     * Finds the Advertise model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Advertise the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
//ثبت تعداد علاقه مندی ها
    public function actionSabt()
    {
        $idVisit = $_GET['id'];

        $model = Advertise::find()->where(['id' => $idVisit])->andWhere(['enable' => 1])->one();
        $sabt = $model->namberOfVisits;
        $visit = $sabt + 1;
        $model->namberOfVisits = $visit;
        if ($model->save()) {

        } else {
            var_dump($model->getErrors());
            exit;
        }
    }

    //ثبت فاکتور
    public function actionFactor(){
       $transaction=Yii::$app->db->beginTransaction();
        try{
            $id=$_GET['id'];
            if ($id){
                if (Yii::$app->user->isGuest){
                    $_SESSION['error']='لطفا اول ثبت نام کنید';
                    return $this->redirect('site\login');
                }//end if is guest
                else{
                    $user=User::findOne(Yii::$app->user->getId());
                    $idUser=$user->id;
                    $product=Advertise::find()->where(['enable'=>1])->andWhere(['id'=>$id])->one();
                    if ($product){
                        $idAdvertise=$id;
                        $idProfile=$product->idUser;
                        $price=$product->priceProduct;

                        $price1 = $price / 100;
                        $p = Percentage::find()->one();
                        $p1 = $p->percentage;
                        $a = $price1 * $p1;
                        $finalPrice = $price + $a;

                        //save in factor
                        $model=new Tblfactors();
                        $model->idUser=$idUser;
                        $model->idAdvertise=$idAdvertise;
                        $model->idProfile=$idProfile;
                        $model->pricefull=$finalPrice;
                        $model->type=2;//خرید محصول
                        $model->description='مربوط به خرید محصول';
                        $model->typeproduct=-1;
                        $model->priceReset=0;
                        $model->confirm=0;
                        

                        $date=new jdf();
                        $model->date=$date->date('Y/m/d-h:m:s');
                        $model->time=date('Y/m/d-h:m:s');
                        if ($model->save()){
                            $transaction->commit();

//                            $_SESSION['error']='تا 6 ساعت آینده گزینه پرداخت نهایی برای شما فعال میشود';
                            return $this->redirect(['tblfactors/index','id'=>$model->id]);
                        }//end if save
                        else{
                           var_dump($model->getErrors());exit;
                        }//end else do not save

                    }//end if product
                    else{
                        return $this->redirect('site/products');
                    }//end else product
                }//end else is user

            }//end if $id
            else{
//           return $this->redirect(['site/products','id'=>$id]) ;
            }//end else $id
        }//end try
        catch (\PHPUnit\Framework\Exception $e){
           $transaction->rollBack();
            $this->refresh();
        }//end catch
    }

    protected function findModel($id)
    {
        if (($model = Advertise::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
