<?php

/**
 * Created by PhpStorm.
 * User: maryam
 * Date: 9/8/2018
 * Time: 10:17 AM
 */
namespace common\components;

use common\models\User;
use yii\base\Component;
use yii\debug\models\search\Profile;

class Userr extends Component
{

    private $session;

    public function init()
    {
        parent::init();
        $this->session = \Yii::$app->session;
    }

    //چک کردن نام کاربریusername
    public function checkUsername($username)
    {
        $check = User::find()->where(['username' => $username])->one();
        if ($check != null) {
            $sendOk['result'] = 1;
            $sendOk['msg'] = 'نام کاربری(موبایل) تکراری میباشد';
            return $sendOk;
        }//end if check
        else {

            $sendOk['result'] = 0;
            $sendOk['msg'] = 'نام کاربری موجود نیست';
            return $sendOk;
        }//end else check
    }

    //signup
    public function Signup(
        $username,
        $password,
        $role,
        $name,
        $lastName,
        $phone,
        $idRagent,
        $enable
    )
    {
        //چون اون دوتا فیلد اجباری در پرشدنشون نیست
        if ($idRagent == null) {
            $idRagent = 0;
        }
        if ($phone == null) {
            $phone = 0;
        }
//        echo $username.' ';
//        echo $password.' ';
//        echo $role.' ';
//        echo $name.' ';
//        echo $lastName.' ';
//        echo $phone.' ';
//        echo $idRagent.' '.$enable;exit;
        $user = new User();
        if ($user->validate()) {

            $user->username = $username;
            $user->setPassword($password);
            $user->generateAuthKey();
            $auth = \Yii::$app->authManager;
            $authRole = $auth->getRole('user');

            if ($user->save()) {


                $auth->assign($authRole, $user->getId());
                $profile = new \frontend\models\Profile();
//                echo $user->id;exit;

//               if ($profile->idUser = $user->id){echo 1;exit;}else{var_dump($profile->getErrors());exit;}
                $profile->idUser = $user->id;
                $profile->username = $user->username;
                $profile->name = $name;
                $profile->role = $role;
                $profile->lastName = $lastName;
                $profile->phone = $phone;
                $profile->idRagent = $idRagent;
                $profile->enable = $enable;


                if ($profile->save()) {

                    $send['result'] = 1;
                    $send['msg'] = 'ثبت نام با موفقیت انجام شد.';
                    return $send;
                }//end if save profile
                else {
var_dump($profile->getErrors());exit;
                    $user->delete();
                    $send['result'] = 0;
                    $send['msg'] = 'ثبت پروفایل ناموفق.';
                    return $send;
                }//end else save profile
            }//end if user->save
            else {
var_dump($user->getErrors());exit;
                $send['result'] = 0;
                $send['msg'] = 'ثبت نام ناموفق';
                return $send;
            }//end else user->save
        }//end if validate
        else {
//            var_dump($user->getErrors());exit;
            $send['result'] = 0;
            $send['msg'] = 'مشکل در تایید اعتبار';
            return $send;
        }//end else validet
    }//end function

    //login
    public function Login($username, $password)
    {
//        echo $username;
//        echo $password;exit;
        $user = User::findByUsername($username);
//        var_dump($user);exit;
        if ($user != null) {
//            echo $user->username;exit;
//           echo $password;exit;
            if ($user->validatePassword($password)) {
//
//                $p=Yii::$app->getUser()->login($username);
//                var_dump($p);exit;

                if (\Yii::$app->getUser()->login($user)) {

                    $profile = \frontend\models\Profile::find()->where(['enable' => 1])->andWhere(['idUser' => $user->id]);

                    if ($profile != null) {
//                        $send['id'] = $profile->id;
                        $send['result'] = 1;
                        $send['msg'] = 'fffff';
                        return $send;
//                        echo $profile->id;exit;
//                        var_dump($profile);exit;
                    }//end if profile
                    else {
                        $send['result'] = 0;
                        $send['msg'] = 'ثبت نام غیر فعال شده';
                        return $send;
                    }//end else profile
                }//end if Yii::$app
                else {
                    $send['result'] = 0;
                    $send['msg'] = 'خطا دوباره امتحان کنید';
                    return $send;
                }//end else Yii::$app
            }//end if $user->validatePassword
            else {

                $send['result'] = 0;
                $send['msg'] = 'پسورد اشتباه است';
                return $send;
            }
        }//end if user
        else {
            $send['result'] = 0;
            $send['msg'] = 'نام کاربری اشتباه است';
            return $send;
        }//end else $user
    }//end function

    //update
    public function Update(
        $username,
//        $password,
        $name,
        $lastName,
        $phone,
        $idRogant,
        $role
    )
    {

        $user = User::findByUsername($username);
        $profile = \frontend\models\Profile::find()->where(['enable' => 1])->andWhere(['username' => $username])->one();
        $profil = new \frontend\models\Profile();

        if ($profile != null) {

            $profil->enable = 1;
            $profil->name = $name;
            $profil->lastName = $lastName;
            $profil->phone = $phone;
            $profil->idRagent = $idRogant;
            $profil->role = $role;

            if ($profile->validate()) {

                $profile->username = $username;
                $profile->enable = 1;
                $profile->name = $name;
                $profile->lastName = $lastName;
                $profile->phone = $phone;
                $profile->idRagent = $idRogant;
                $profile->role = $role;

                if ($profile->username != $user) {

                    $profile->enable = 1;
                    $profile->name = $name;
                    $profile->lastName = $lastName;
                    $profile->phone = $phone;
                    $profile->idRagent = $idRogant;
                    $profile->role = $role;

                    if ($profile->save()) {
                        $send['result'] = 1;
                        $send['msg'] = 'اطلاعات ذخیره شد';
                        return $send;
                    }//if save
                    else {
                        $send['result'] = 0;
                        $send['msg'] = 'ویرایش انجام نشد';
                        return $send;
                    }
                }//if username
                else {
                    $send['result'] = 0;
                    $send['msg'] = 'تکراری بودن نام کاربری';
                    return $send;
                }//else username

            }//if validate
            else {

//                echo 999;exit;
                $send['result'] = 0;
                $send['msg'] = 'مشکل تایید اعتبار';
                return $send;
            }//else validate

        }//if $profile
        else {
            $send['result'] = 0;
            $send['msg'] = 'نام کاربری وجود ندارد لطفا اطلاعات را درست وارد کنید';
            return $send;
        }//else $profile
    }

    //changePassword
    public function changePassword(
        $username,
        $oldPassword,
        $newPassword
    )
    {

        $user=User::findByUsername($username);
//
            if ($user->validatePassword($oldPassword)) {
//                echo $oldPassword;exit;
//                echo $newPassword;exit;

                $user->oldPassword=$oldPassword;
                $new = $user->newPassword=$newPassword;
//                echo $new;exit;
//            echo $new;
                $user->password = $new;
//                echo $new;exit;

                if ($user->save()) {
//                    echo 'شد';exit;

//                    yii::$app->session->setFlash('success', 'vnkrtgeiuguhug');
                    $send['result']=1;
                    $send['msg']='ویرایش انجام شد';
                    return $send;
//                    return $this->refresh();
                    
                } else {
//                    echo 'نشد';exit;
//                    var_dump($user->getErrors());exit;
                    $send['result']=0;
                    $send['msg']='تغییرات ثبت نشد';
                    return $send;
                }

            }//end if validate
            else {
                
                $send['result']=0;
                $send['msg']='لطفا رمز خود را درست وارد کنید';
                return $send;

            }//end else validate

    }


}