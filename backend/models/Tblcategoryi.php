<?php

namespace backend\models;

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
    public $image;
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
            [['title'], 'required'],
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
            'id' => 'کد دسته',
            'idParent' => 'کد دسته والد',
            'title' => 'عنوان دسته',
            'discription' => 'توضیحات',
            'enable' => 'وضعیت فعلی این دسته',
            'enable_view' => 'Enable View',
            'displayPrice' => 'نمایش قیمت',
            'dateUpdate' => 'تاریخ ویرایش',
            'urlImgOrMovie' => 'عکس دسته',
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
