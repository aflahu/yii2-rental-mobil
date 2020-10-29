<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "detail_sewa".
 *
 * @property int $no_nota
 * @property int $id_driver
 * @property string $no_mobil
 * @property string|null $tgl_kembali
 * @property int|null $pembayaran
 *
 * @property Mobil $noMobil
 * @property Sewa $sewa
 */
class DetailSewa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_sewa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_nota', 'id_driver', 'no_mobil'], 'required'],
            [['no_nota', 'id_driver', 'pembayaran'], 'integer'],
            [['tgl_kembali'], 'safe'],
            [['no_mobil'], 'string', 'max' => 8],
            [['no_mobil'], 'exist', 'skipOnError' => true, 'targetClass' => Mobil::className(), 'targetAttribute' => ['no_mobil' => 'no_mobil']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no_nota' => 'No Nota',
            'id_driver' => 'Id Driver',
            'no_mobil' => 'No Mobil',
            'tgl_kembali' => 'Tgl Kembali',
            'pembayaran' => 'Pembayaran',
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
     * Gets query for [[Sewa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSewa()
    {
        return $this->hasOne(Sewa::className(), ['no_nota' => 'no_nota']);
    }
}
