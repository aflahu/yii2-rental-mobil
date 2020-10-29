<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Mobil;

/**
 * MobilSearch represents the model behind the search form of `common\models\Mobil`.
 */
class MobilSearch extends Mobil
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_mobil', 'tahun_pembuatan', 'harga_sewa', 'kapasitas_penumpang'], 'integer'],
            [['nama_mobil', 'jenis_mobil', 'status_mobil'], 'safe'],
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
        $query = Mobil::find();

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
            'no_mobil' => $this->no_mobil,
            'tahun_pembuatan' => $this->tahun_pembuatan,
            'harga_sewa' => $this->harga_sewa,
            'kapasitas_penumpang' => $this->kapasitas_penumpang,
        ]);

        $query->andFilterWhere(['like', 'nama_mobil', $this->nama_mobil])
            ->andFilterWhere(['like', 'jenis_mobil', $this->jenis_mobil])
            ->andFilterWhere(['like', 'status_mobil', $this->status_mobil]);

        return $dataProvider;
    }
}
