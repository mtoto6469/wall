<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblchat".
 *
 * @property int $id
 * @property int $idUserMe
 * @property int $idUserYou
 */
class Tblchat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblchat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUserMe', 'idUserYou'], 'required'],
            [['idUserMe', 'idUserYou'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idUserMe' => 'Id User Me',
            'idUserYou' => 'Id User You',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TblchatQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblchatQuery(get_called_class());
    }
}
