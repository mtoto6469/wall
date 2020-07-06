<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tblcategoryi;

/**
 * TblcategoryiSearch represents the model behind the search form of `backend\models\Tblcategoryi`.
 */
class TblcategoryiSearch extends Tblcategoryi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idParent', 'enable', 'enable_view', 'displayPrice'], 'integer'],
            [['title', 'discription', 'dateUpdate','urlImgOrMovie'], 'safe'],
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
        $query = Tblcategoryi::find()->where(['enable_view'=>1]);

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
            'idParent' => $this->idParent,
            'enable' => $this->enable,
            'enable_view' => $this->enable_view,
            'displayPrice' => $this->displayPrice,
            'dateUpdate' => $this->dateUpdate,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'discription', $this->discription])
            ->andFilterWhere(['like', 'urlImgOrMovie', $this->urlImgOrMovie]);

        return $dataProvider;
    }
}
