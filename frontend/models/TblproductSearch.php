<?php

namespace frontend\models;

use common\models\User;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Tblproduct;

/**
 * TblproductSearch represents the model behind the search form of `frontend\models\Tblproduct`.
 */
class TblproductSearch extends Tblproduct
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','idUser' ,'idCategory', 'price', 'enable'], 'integer'],
            [['title', 'shortdescription', 'desciption','imageName'], 'safe'],
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
        $code=$user->id;
        $query = Tblproduct::find()->andWhere(['enable'=>1])->andWhere(['idUser'=>$code]);

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
            'idCategory' => $this->idCategory,
            'price' => $this->price,
            'enable' => $this->enable,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'shortdescription', $this->shortdescription])
            ->andFilterWhere(['like', 'imageName', $this->imageName])
            ->andFilterWhere(['like', 'desciption', $this->desciption]);

        return $dataProvider;
    }
}
