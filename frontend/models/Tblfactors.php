<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tblfactors".
 *
 * @property int $id
 * @property int $idUser
 * @property int $idAdvertise
 * @property int $pricefull
 * @property int $idProfile
 * @property int $type
 * @property string $date
 * @property string $description
 * @property string $time
 * @property int $priceReset
 * @property int $typeproduct
 * @property int $confirm
 * @property int $atu
 * @property int $ref
 * @property int $updateDate
 */
class Tblfactors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblfactors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUser', 'idAdvertise', 'pricefull', 'idProfile', 'type', 'priceReset', 'typeproduct','confirm'], 'integer'],
            [['idProfile'], 'required'],
            [['time'], 'safe'],
            [['date','updateDate'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 250],
            [['atu','ref'], 'string', 'max' => 250],
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
            'idAdvertise' => 'Id Advertise',
            'pricefull' => 'Pricefull',
            'idProfile' => 'Id Profile',
            'type' => 'Type',
            'date' => 'Date',
            'description' => 'Description',
            'time' => 'Time',
            'priceReset' => 'Price Reset',
            'typeproduct' => 'Typeproduct',
            'confirm' => 'confirm',
            'atu' => 'Atu',
            'ref' => 'Ref',
            'updateDate' => 'UpdateDate',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TblfactorsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblfactorsQuery(get_called_class());
    }
}
