<?php

namespace backend\controllers;

use backend\models\Tblimg;
use common\components\jdf;
use PHPUnit\Framework\Exception;
use Yii;
use backend\models\Tblcategoryi;
use backend\models\TblcategoryiSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

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
//                    'delete' => ['POST'],
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
            $category = ArrayHelper::map(Tblcategoryi::find()->where(['enable_view' => 1])->andWhere(['<>', 'id', 5])->all(), 'id', 'title');

            $model = new Tblcategoryi();
            if ($model->load(Yii::$app->request->post())) {
                $model->image = UploadedFile::getInstance($model, 'image');
                if ($model->image != null) {

                    if ($model->validate()) {

                        $baseName = $model->image->baseName;
                        $model->image->saveAs(Yii::getAlias('@upload') . '/upload/' . $baseName . '.' . $model->image->extension);//save in upload folder
                        $model->urlImgOrMovie = $baseName . '.' . $model->image->extension;

                        if ($model->idParent == null || $model->idParent == 0 || $model->idParent == -1) {

                            $_SESSION['error1'] = 'لطفا دسته مورد نظر را انتخاب کنید';
                            return $this->render('create', [
                                'model' => $model,
                                'category' => $category,
                            ]);
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
                            $_SESSION['error'] = 'اطلاعات با موفقیت ثبت شد';
                            return $this->redirect(['view', 'id' => $model->id]);

                        }//end if save
                        else {

                            $_SESSION['error'] = 'اطلاعات ذخیره نشد';
                            return $this->render('create', [
                                'model' => $model,
                                'category' => $category,
                            ]);

                        }//end else save
                    }//end if validate
                    else {
                        $_SESSION['error1'] = 'مشکل در validate عکس';
                        return $this->render('create', [
                            'model' => $model,
                            'category' => $category,
                        ]);
                    }//end else validate
                }//end if image != null
                else {
                    $_SESSION['imageError'] = 'لطفا یک عکس مرتبت با موضوع آپلود کنید';
                    return $this->render('create', [
                        'model' => $model,
                        'category' => $category,
                    ]);
                }//end else image == null

            }//end model load
            else {

                return $this->render('create', [
                    'model' => $model,
                    'category' => $category,
                ]);

            }//end else model load
        }//end try
        catch (Exception $e) {

            $transaction->rollBack();
            $this->refresh();

        }//end catch
    }//end function

    /**
     * Updates an existing Tblcategoryi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {

            $category = ArrayHelper::map(Tblcategoryi::find()->where(['enable_view' => 1])->all(), 'id', 'title');

            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post())) {
                $model->image = UploadedFile::getInstance($model, 'image');
                if ($model->image != null) {

                    if ($model->validate()) {

                        $baseName = $model->image->baseName;
                        $model->image->saveAs(Yii::getAlias('@upload') . '/upload/' . $baseName . '.' . $model->image->extension);//save in upload folder
                        $model->urlImgOrMovie = $baseName . '.' . $model->image->extension;

                        if ($model->idParent == null || $model->idParent == 0 || $model->idParent == -1) {
                            $model->idParent = -1;
                        } else {

                        }

//                $date_ir = new jdf();
//                $model->dateUpdate = $date_ir->date('Y/m/d');
                        $model->dateUpdate = date('Y/m/d');

                        if ($model->save()) {

                            $transaction->commit();
                            $_SESSION['error'] = 'اطلاعات با موفقیت ثبت شد';
                            return $this->redirect(['view', 'id' => $model->id]);

                        }//end if save
                        else {

                            $_SESSION['error'] = 'اطلاعات ذخیره نشد';
                            return $this->render('update', [
                                'model' => $model,
                                'category' => $category,
                            ]);

                        }//end else save
                    }//end if validate
                    else {
                        $_SESSION['error1'] = 'مشکل در validate عکس';
                        return $this->render('create', [
                            'model' => $model,
                            'category' => $category,
                        ]);
                    }//end else validate

                }//end if image != null
                else {

                    if ($model->idParent == null || $model->idParent == 0 || $model->idParent == -1) {
                        $model->idParent = -1;
                    } else {

                    }

//                $date_ir = new jdf();
//                $model->dateUpdate = $date_ir->date('Y/m/d');
                    $model->dateUpdate = date('Y/m/d');

                    if ($model->save()) {

                        $transaction->commit();
                        $_SESSION['error'] = 'اطلاعات با موفقیت ثبت شد';
                        return $this->redirect(['view', 'id' => $model->id]);

                    }//end if save
                    else {

                        $_SESSION['error'] = 'اطلاعات ذخیره نشد';
                        return $this->render('update', [
                            'model' => $model,
                            'category' => $category,
                        ]);

                    }//end else save

                }//end else image == null

            }//end if model->load
            else {

                return $this->render('update', [
                    'model' => $model,
                    'category' => $category,
                ]);

            }//end else model->load
        }//end try
        catch (Exception $e) {

            $transaction->rollBack();
            $this->refresh();

        }//end catch
    }//end function

    /**
     * Deletes an existing Tblcategoryi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $model = $this->findModel($id);
            $title = ' صفحه اصلی';

            if ($model->title == $title) {

                $_SESSION['error'] = 'خطا ! شما مجاز به حذف این فیلد نمیباشید';
                return $this->redirect(['index']);
            }//end if $title
            else {
                $model->enable_view = 0;
                if ($model->save()) {

                    $transaction->commit();
                    $_SESSION['error'] = 'فیلد با موفقیت حذف شد!';
                    return $this->redirect(['index']);

                }//end if save
                else {

                    $_SESSION['error'] = 'خطا ! فیلد حذف نشد';
                    return $this->redirect(['index']);
                }
            }
        }//end try
        catch (Exception $e) {

            $transaction->rollBack();
            $this->refresh();

        }//end catch


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
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
