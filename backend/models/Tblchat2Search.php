<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tblchat2;

/**
 * Tblchat2Search represents the model behind the search form of `backend\models\Tblchat2`.
 */
class Tblchat2Search extends Tblchat2
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idChat', 'idSend'], 'integer'],
            [['text', 'timeatamp', 'namelstnameMe', 'nameLastnameYou'], 'safe'],
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
        $query = Tblchat2::find();

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
            'idChat' => $this->idChat,
            'idSend' => $this->idSend,
            'timeatamp' => $this->timeatamp,
        ]);

        $query->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'namelstnameMe', $this->namelstnameMe])
            ->andFilterWhere(['like', 'nameLastnameYou', $this->nameLastnameYou]);

        return $dataProvider;
    }
}
