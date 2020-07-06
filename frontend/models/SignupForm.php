<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
//    public $email;
    public $password;
    public $idUser;
    public $name;
    public $lastName;
    public $phone;
    public $idRegent;
    public $role;
    


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

//            ['email', 'trim'],
//            ['email', 'required'],
//            ['email', 'email'],
//            ['email', 'string', 'max' => 255],
//            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['name','string','max'=>255],
            ['lastName','string','max'=>255],
            ['phone','string','max'=>11],
            ['idRegent','string','max'=>100],
            ['role','integer','max'=>1],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
//        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();

//        return $user->save() ? $user : null;
    }
}
