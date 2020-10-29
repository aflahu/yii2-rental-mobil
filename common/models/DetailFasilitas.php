<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "detail_fasilitas".
 *
 * @property string $no_mobil
 * @property int $kode_fasilitas
 *
 * @property Mobil $noMobil
 * @property Fasilitas $kodeFasilitas
 */
class DetailFasilitas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_fasilitas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_mobil', 'kode_fasilitas'], 'required'],
            [['kode_fasilitas'], 'integer'],
            [['no_mobil'], 'string', 'max' => 8],
            [['no_mobil'], 'exist', 'skipOnError' => true, 'targetClass' => Mobil::className(), 'targetAttribute' => ['no_mobil' => 'no_mobil']],
            [['kode_fasilitas'], 'exist', 'skipOnError' => true, 'targetClass' => Fasilitas::className(), 'targetAttribute' => ['kode_fasilitas' => 'kode_fasilitas']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no_mobil' => 'No Mobil',
            'kode_fasilitas' => 'Kode Fasilitas',
        ];
    }

    /**
     * Gets query for [[NoMobil]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNoMobil()
    {
        return $this->hasOne(Mobil::className(), ['no_mobil' => 'no_mobil']);
    }

    /**
     * Gets query for [[KodeFasilitas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKodeFasilitas()
    {
        return $this->hasOne(Fasilitas::className(), ['kode_fasilitas' => 'kode_fasilitas']);
    }
}
