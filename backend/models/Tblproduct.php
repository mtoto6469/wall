<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblproduct".
 *
 * @property int $id
 * @property int $idCategory
 * @property string $title
 * @property string $imageName
 * @property string $shortdescription
 * @property string $desciption
 * @property int $price
 * @property int $enable
 */
class Tblproduct extends \yii\db\ActiveRecord
{
    public $image;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblproduct';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCategory', 'shortdescription', 'desciption','imageName'], 'required'],
            [['idCategory', 'price', 'enable'], 'integer'],
            [['desciption'], 'string'],
            [['imageName'], 'string', 'max' => 300],
            [['title', 'shortdescription'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'کد محصول',
            'idCategory' => 'دسته محصول',
            'title' => 'نام محصول',
            'imageName' => 'عکس محصول',
            'shortdescription' => 'Shortdescription',
            'desciption' => 'Desciption',
            'price' => 'Price',
            'enable' => 'Enable',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TblproductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblproductQuery(get_called_class());
    }
}
