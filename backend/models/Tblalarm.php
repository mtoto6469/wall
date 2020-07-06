<?php

namespace backend\models;

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
            [['idCategory',], 'required'],
            [['idCategory', 'fewHours', 'price', 'enable', 'enable_view'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'کد آلارم',
            'idCategory' => 'صفحه تبلیغ',
            'fewHours' => ' تعداد ساعات نمایش تبلیغ',
            'price' => ' قیمت هر ساعت',
            'enable' => 'وضعیت فعلی نمایش این آلارم',
            'enable_view' => 'حذف',
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
