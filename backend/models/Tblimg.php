<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblimg".
 *
 * @property int $id
 * @property string $urlImgOrMove
 * @property int $idImageAdvertise
 * @property string $type
 * @property string $typeImg
 * @property string $enable_view
 */
class Tblimg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblimg';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['urlImgOrMove','typeImg'], 'required'],
            [['idImageAdvertise','enable_view'], 'integer'],
            [['urlImgOrMove', 'type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'کد عکس',
            'urlImgOrMove' => 'نام عکس یا فیلم',
            'idImageAdvertise' => 'کد عکس تبلیغاتی',
            'type' => 'نوع عکس',
            'typeImg' => 'Type Img',
            'enable View' => 'Type Img',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TblimgQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblimgQuery(get_called_class());
    }
}
