<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property int $idUser
 * @property string $role
 * @property string $username
 * @property string $name
 * @property string $lastName
 * @property string $phone
 * @property string $idRagent
 * @property int $enable
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUser', 'role', 'username', 'name', 'lastName', 'phone', 'idRagent'], 'required'],
            [['idUser', 'username', 'phone', 'idRagent', 'enable'], 'integer'],
            [['role', 'name', 'lastName'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'کد پروفایل کاربر',
            'idUser' => 'کد کاربری',
            'role' => 'نقش',
            'username' => 'نام کاربری',
            'name' => 'نام',
            'lastName' => 'نام خانوادگی',
            'phone' => 'تلفن',
            'idRagent' => 'کد معرف',
            'enable' => 'Enable',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProfileQuery(get_called_class());
    }
}
