<?php

namespace frontend\models;

use common\models\User;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Tblfactors;

/**
 * TblfactorsSearch represents the model behind the search form of `frontend\models\Tblfactors`.
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
        $user=User::findOne(Yii::$app->user->getId());
        $query = Tblfactors::find()->where(['idUser'=>$user->id]);

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
        $user=User::findOne(Yii::$app->user->getId());
        $query = Tblfactors::find()->andWhere(['confirm'=>1])->andWhere(['idUser'=>$user->id]);

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
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'atu', $this->atu])
            ->andFilterWhere(['like', 'ref', $this->ref]);

        return $dataProvider;
    }
}
