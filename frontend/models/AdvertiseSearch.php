<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Advertise;

/**
 * AdvertiseSearch represents the model behind the search form of `frontend\models\Advertise`.
 */
class AdvertiseSearch extends Advertise
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idUser', 'phone', 'fewDays', 'namberOfVisits', 'showOn', 'agree', 'alarm', 'idAlarm', 'fewHoursAlarm', 'finalAgree', 'enable', 'priceAdvertise', 'priceAlarm','priceProduct', 'priceFull'], 'integer'],
            [['title', 'urlImgOrMovie', 'shortDiscripton', 'text', 'startDate', 'endDate', 'dateAlarm', 'startTimeAlarm'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Advertise::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'idUser' => $this->idUser,
            'phone' => $this->phone,
            'fewDays' => $this->fewDays,
            'namberOfVisits' => $this->namberOfVisits,
            'showOn' => $this->showOn,
            'agree' => $this->agree,
            'alarm' => $this->alarm,
            'idAlarm' => $this->idAlarm,
            'dateAlarm' => $this->dateAlarm,
            'startTimeAlarm' => $this->startTimeAlarm,
            'fewHoursAlarm' => $this->fewHoursAlarm,
            'finalAgree' => $this->finalAgree,
            'enable' => $this->enable,
            'priceAdvertise' => $this->priceAdvertise,
            'priceAlarm' => $this->priceAlarm,
            'priceProduct' => $this->priceProduct,
            'priceFull' => $this->priceFull,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'urlImgOrMovie', $this->urlImgOrMovie])
            ->andFilterWhere(['like', 'shortDiscripton', $this->shortDiscripton])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'startDate', $this->startDate])
            ->andFilterWhere(['like', 'endDate', $this->endDate]);

        return $dataProvider;
    }
}
