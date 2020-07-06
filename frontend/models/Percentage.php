<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "percentage".
 *
 * @property int $id
 * @property int $percentage
 * @property int $enable
 */
class Percentage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'percentage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['percentage', 'enable'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'percentage' => 'Percentage',
            'enable' => 'Enable',
        ];
    }

    /**
     * {@inheritdoc}
     * @return PercentageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PercentageQuery(get_called_class());
    }
}
