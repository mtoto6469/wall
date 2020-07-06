<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "advertise".
 *
 * @property int $id
 * @property int $idUser
 * @property string $title
 * @property string $urlImgOrMovie
 * @property string $shortDiscripton
 * @property string $text
 * @property string $phone
 * @property int $fewDays
 * @property int $namberOfVisits
 * @property int $showOn
 * @property int $agree
 * @property string $startDate
 * @property string $endDate
 * @property int $alarm
 * @property int $idAlarm
 * @property int $fewHoursAlarm
 * @property int $finalAgree
 * @property int $enable
 * @property int $priceAdvertise
 * @property int $priceAlarm
 * @property int $priceFull
 */
class Advertise extends \yii\db\ActiveRecord
{
    public $startTime;
    public $endTime;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'advertise';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUser', 'phone', 'fewDays', 'namberOfVisits', 'showOn', 'agree', 'alarm', 'idAlarm', 'fewHoursAlarm', 'finalAgree', 'enable', 'priceAdvertise', 'priceAlarm', 'priceFull'], 'integer'],
            [['phone', 'fewHoursAlarm'], 'required'],
            [['startDate', 'endDate'], 'safe'],
            [['title', 'urlImgOrMovie', 'shortDiscripton'], 'string', 'max' => 255],
            [['text'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'jhgfj',
            'idUser' => 'Id User',
            'title' => 'Title',
            'urlImgOrMovie' => 'Url Img Or Movie',
            'shortDiscripton' => 'Short Discripton',
            'text' => 'Text',
            'phone' => 'Phone',
            'fewDays' => 'Few Days',
            'namberOfVisits' => 'Namber Of Visits',
            'showOn' => 'Show On',
            'agree' => 'Agree',
            'startDate' => 'Start Date',
            'endDate' => 'End Date',
            'alarm' => 'Alarm',
            'idAlarm' => 'Id Alarm',
            'fewHoursAlarm' => 'Few Hours Alarm',
            'finalAgree' => 'Final Agree',
            'enable' => 'Enable',
            'priceAdvertise' => 'Price Advertise',
            'priceAlarm' => 'Price Alarm',
            'priceFull' => 'Price Full',
        ];
    }

    /**
     * {@inheritdoc}
     * @return AdvertiseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AdvertiseQuery(get_called_class());
    }
}
