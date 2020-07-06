<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tblcategoryi".
 *
 * @property int $id
 * @property int $idParent
 * @property string $title
 * @property string $discription
 * @property int $enable
 * @property int $enable_view
 * @property int $displayPrice
 * @property string $dateUpdate
 * @property string $urlImgOrMovie
 */
class Tblcategoryi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblcategoryi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idParent', 'title', 'discription'], 'required'],
            [['idParent', 'enable', 'enable_view', 'displayPrice'], 'integer'],
            [['dateUpdate'], 'safe'],
            [['urlImgOrMovie'], 'string'],
            [['title', 'discription','urlImgOrMovie'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idParent' => 'Id Parent',
            'title' => 'Title',
            'discription' => 'Discription',
            'enable' => 'Enable',
            'enable_view' => 'Enable View',
            'displayPrice' => 'Display Price',
            'dateUpdate' => 'Date Update',
            'urlImgOrMovie' => 'urlImgOrMovie',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TblcategoryiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblcategoryiQuery(get_called_class());
    }
}
