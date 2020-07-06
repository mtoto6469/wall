<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblchat2".
 *
 * @property int $id
 * @property int $idChat
 * @property int $idSend
 * @property string $text
 * @property string $timeatamp
 * @property string $namelstnameMe
 * @property string $nameLastnameYou
 */
class Tblchat2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblchat2';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idChat', 'idSend'], 'integer'],
            [['text'], 'required'],
            [['text'], 'string'],
            [['timeatamp'], 'safe'],
            [['namelstnameMe', 'nameLastnameYou'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idChat' => 'Id Chat',
            'idSend' => 'Id Send',
            'text' => 'Text',
            'timeatamp' => 'Timeatamp',
            'namelstnameMe' => 'Namelstname Me',
            'nameLastnameYou' => 'Name Lastname You',
        ];
    }

    /**
     * {@inheritdoc}
     * @return Tblchat2Query the active query used by this AR class.
     */
    public static function find()
    {
        return new Tblchat2Query(get_called_class());
    }
}
