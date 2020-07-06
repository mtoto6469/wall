<?php

namespace frontend\models;

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
 * @property string $dateAlarm
 * @property string $startTimeAlarm
 * @property int $fewHoursAlarm
 * @property int $finalAgree
 * @property int $enable
 * @property int $priceAdvertise
 * @property int $priceAlarm
 * @property int $priceProduct
 * @property int $priceFull
 */
class Advertise extends \yii\db\ActiveRecord
{
    public $images;
//    public $showOn1;
//    public $showOn2;
//    public $showOn3;
//    public $showOn4;
//    public $showOn5;
//    public $showOn6;
//    public $showOn7;
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
            [['idUser', 'phone', 'fewDays', 'namberOfVisits', 'showOn', 'agree', 'alarm', 'idAlarm', 'fewHoursAlarm', 'finalAgree', 'enable', 'priceAdvertise', 'priceAlarm','priceProduct', 'priceFull'], 'integer'],
            [['phone'], 'required'],
            [['dateAlarm', 'startTimeAlarm'], 'safe'],
            [['title', 'urlImgOrMovie', 'shortDiscripton'], 'string', 'max' => 255],
            [['text'], 'string', 'max' => 1000],
            [['startDate', 'endDate'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
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
            'dateAlarm' => 'dateAlarm',
            'startTimeAlarm' => 'Start Time Alarm',
            'fewHoursAlarm' => 'Few Hours Alarm',
            'finalAgree' => 'Final Agree',
            'enable' => 'Enable',
            'priceAdvertise' => 'Price Advertise',
            'priceAlarm' => 'Price Alarm',
            'priceProduct' => 'Price Produvt',
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
