<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mobil".
 *
 * @property string $no_mobil
 * @property string $nama_mobil
 * @property string $jenis_mobil
 * @property int $tahun_pembuatan
 * @property int $harga_sewa
 * @property int $kapasitas_penumpang
 * @property string $status_mobil
 *
 * @property DetailFasilitas[] $detailFasilitas
 * @property DetailSewa[] $detailSewas
 */
class Mobil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mobil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_mobil', 'nama_mobil', 'jenis_mobil', 'tahun_pembuatan', 'harga_sewa', 'kapasitas_penumpang', 'status_mobil'], 'required'],
            [['tahun_pembuatan', 'harga_sewa', 'kapasitas_penumpang'], 'integer'],
            [['no_mobil'], 'string', 'max' => 8],
            [['nama_mobil'], 'string', 'max' => 25],
            [['jenis_mobil'], 'string', 'max' => 20],
            [['status_mobil'], 'string', 'max' => 7],
            [['no_mobil'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no_mobil' => 'No Mobil',
            'nama_mobil' => 'Nama Mobil',
            'jenis_mobil' => 'Jenis Mobil',
            'tahun_pembuatan' => 'Tahun Pembuatan',
            'harga_sewa' => 'Harga Sewa',
            'kapasitas_penumpang' => 'Kapasitas Penumpang',
            'status_mobil' => 'Status Mobil',
        ];
    }

    /**
     * Gets query for [[DetailFasilitas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetailFasilitas()
    {
        return $this->hasMany(DetailFasilitas::className(), ['no_mobil' => 'no_mobil']);
    }

    /**
     * Gets query for [[DetailSewas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetailSewas()
    {
        return $this->hasMany(DetailSewa::className(), ['no_mobil' => 'no_mobil']);
    }
}
