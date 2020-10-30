<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_3_FK_detail_fasilitas
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_3_FK_detail_fasilitas extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $tablePrefix = \Yii::$app->getDb()->tablePrefix;
        $this->runSuccess[$tablePrefix.'detail_fasilitas_ibfk_1'] = $this->addForeignKey($tablePrefix.'detail_fasilitas_ibfk_1', '{{%detail_fasilitas}}', 'no_mobil', '{{%mobil}}', 'no_mobil', null, null);
        $this->runSuccess[$tablePrefix.'detail_fasilitas_ibfk_2'] = $this->addForeignKey($tablePrefix.'detail_fasilitas_ibfk_2', '{{%detail_fasilitas}}', 'kode_fasilitas', '{{%fasilitas}}', 'kode_fasilitas', null, null);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            $this->dropForeignKey($keyName, '{{%detail_fasilitas}}');
        }

    }
}
