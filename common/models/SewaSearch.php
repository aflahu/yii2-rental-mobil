<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Sewa;

/**
 * SewaSearch represents the model behind the search form of `common\models\Sewa`.
 */
class SewaSearch extends Sewa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_nota', 'id_penyewa'], 'integer'],
            [['tanggal_sewa', 'jaminan'], 'safe'],
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
        $query = Sewa::find();

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
            'no_nota' => $this->no_nota,
            'id_penyewa' => $this->id_penyewa,
            'tanggal_sewa' => $this->tanggal_sewa,
        ]);

        $query->andFilterWhere(['like', 'jaminan', $this->jaminan]);

        return $dataProvider;
    }
}
