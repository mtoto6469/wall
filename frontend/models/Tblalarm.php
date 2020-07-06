<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tblalarm".
 *
 * @property int $id
 * @property int $idCategory
 * @property int $fewHours
 * @property int $price
 * @property int $enable
 * @property int $enable_view
 */
class Tblalarm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblalarm';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCategory'], 'required'],
            [['idCategory',  'fewHours', 'price','enable','enable_view'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idCategory' => 'Id Category',
            'fewHours' => 'Few Hours',
            'price' => 'Price',
            'enable'=>'Enable',
            'enable_view'=>'Enable view',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TblalarmQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblalarmQuery(get_called_class());
    }
}
