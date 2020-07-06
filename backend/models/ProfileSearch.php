<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Profile;

/**
 * ProfileSearch represents the model behind the search form of `backend\models\Profile`.
 */
class ProfileSearch extends Profile
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idUser', 'username', 'phone', 'idRagent', 'enable'], 'integer'],
            [['role', 'name', 'lastName'], 'safe'],
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
        $query = Profile::find();

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
            'username' => $this->username,
            'phone' => $this->phone,
            'idRagent' => $this->idRagent,
            'enable' => $this->enable,
        ]);

        $query->andFilterWhere(['like', 'role', $this->role])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'lastName', $this->lastName]);

        return $dataProvider;
    }
}
