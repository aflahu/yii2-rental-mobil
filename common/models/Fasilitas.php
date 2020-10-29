<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fasilitas".
 *
 * @property int $kode_fasilitas
 * @property string $nama_fasilitas
 *
 * @property DetailFasilitas[] $detailFasilitas
 */
class Fasilitas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fasilitas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_fasilitas'], 'required'],
            [['nama_fasilitas'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode_fasilitas' => 'Kode Fasilitas',
            'nama_fasilitas' => 'Nama Fasilitas',
        ];
    }

    /**
     * Gets query for [[DetailFasilitas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetailFasilitas()
    {
        return $this->hasMany(DetailFasilitas::className(), ['kode_fasilitas' => 'kode_fasilitas']);
    }
}
