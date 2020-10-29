<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sewa".
 *
 * @property int $no_nota
 * @property int $id_penyewa
 * @property string $tanggal_sewa
 * @property string $jaminan
 *
 * @property User $penyewa
 * @property DetailSewa $noNota
 */
class Sewa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sewa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_penyewa', 'tanggal_sewa', 'jaminan'], 'required'],
            [['id_penyewa'], 'integer'],
            [['tanggal_sewa'], 'safe'],
            [['jaminan'], 'string', 'max' => 15],
            [['id_penyewa'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_penyewa' => 'id']],
            [['no_nota'], 'exist', 'skipOnError' => true, 'targetClass' => DetailSewa::className(), 'targetAttribute' => ['no_nota' => 'no_nota']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no_nota' => 'No Nota',
            'id_penyewa' => 'Id Penyewa',
            'tanggal_sewa' => 'Tanggal Sewa',
            'jaminan' => 'Jaminan',
        ];
    }

    /**
     * Gets query for [[Penyewa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPenyewa()
    {
        return $this->hasOne(User::className(), ['id' => 'id_penyewa']);
    }

    /**
     * Gets query for [[NoNota]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNoNota()
    {
        return $this->hasOne(DetailSewa::className(), ['no_nota' => 'no_nota']);
    }
}
