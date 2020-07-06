<?php

namespace frontend\models;

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
            [['urlImgOrMove', 'type', 'type','typeImg'], 'required'],
            [['idImageAdvertise','typeImg','enable_view'], 'integer'],
            [['urlImgOrMove', 'type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'urlImgOrMove' => 'Url Img Or Move',
            'idImageAdvertise' => 'Id Image Advertise',
            'type' => 'Type',
            'typeImg' => 'Type Img',
            'enable_view' => 'Enable Veiw',
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
