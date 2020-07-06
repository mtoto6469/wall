<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tblfactors;

/**
 * TblfactorsSearch represents the model behind the search form of `backend\models\Tblfactors`.
 */
class TblfactorsSearch extends Tblfactors
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idUser', 'idAdvertise', 'pricefull', 'idProfile', 'type', 'priceReset', 'typeproduct','confirm'], 'integer'],
            [['date','updateDate', 'description', 'time','atu','ref'], 'safe'],
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
        $query = Tblfactors::find();

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
            'idAdvertise' => $this->idAdvertise,
            'pricefull' => $this->pricefull,
            'idProfile' => $this->idProfile,
            'type' => $this->type,
            'time' => $this->time,
            'priceReset' => $this->priceReset,
            'typeproduct' => $this->typeproduct,
            'confirm' => $this->confirm,
        ]);

        $query->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'updateDate', $this->updateDate])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'atu', $this->atu])
            ->andFilterWhere(['like', 'ref', $this->ref]);

        return $dataProvider;
    }

    public function search1($params)
    {
        $query = Tblfactors::find()->where(['type'=>1]);

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
            'idAdvertise' => $this->idAdvertise,
            'pricefull' => $this->pricefull,
            'idProfile' => $this->idProfile,
            'type' => $this->type,
            'time' => $this->time,
            'priceReset' => $this->priceReset,
            'typeproduct' => $this->typeproduct,
            'confirm' => $this->confirm,
        ]);

        $query->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'updateDate', $this->updateDate])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'atu', $this->atu])
            ->andFilterWhere(['like', 'ref', $this->ref]);

        return $dataProvider;
    }

    public function search2($params)
    {
        $query = Tblfactors::find()->where(['type'=>2]);

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
            'idAdvertise' => $this->idAdvertise,
            'pricefull' => $this->pricefull,
            'idProfile' => $this->idProfile,
            'type' => $this->type,
            'time' => $this->time,
            'priceReset' => $this->priceReset,
            'typeproduct' => $this->typeproduct,
            'confirm' => $this->confirm,
        ]);

        $query->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'updateDate', $this->updateDate])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'atu', $this->atu])
            ->andFilterWhere(['like', 'ref', $this->ref]);

        return $dataProvider;
    }
}
