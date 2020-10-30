<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_2_key_detail_fasilitas
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_2_key_detail_fasilitas extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['idx-detail_fasilitas-no_mobil'] = $this->createIndex('idx-detail_fasilitas-no_mobil', '{{%detail_fasilitas}}', 'no_mobil', 0);
        $this->runSuccess['idx-detail_fasilitas-kode_fasilitas'] = $this->createIndex('idx-detail_fasilitas-kode_fasilitas', '{{%detail_fasilitas}}', 'kode_fasilitas', 0);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('addAutoIncrement' === $keyName) {
                continue;
            } elseif ('PRIMARY' === $keyName) {
                // must be remove auto_increment before drop primary key
                if (isset($this->runSuccess['addAutoIncrement'])) {
                    $value = $this->runSuccess['addAutoIncrement'];
                    $this->dropAutoIncrement("{$value['table_name']}", $value['column_name'], $value['column_type'], $value['property']);
                }
                $this->dropPrimaryKey(null, '{{%detail_fasilitas}}');
            } elseif (!empty($keyName)) {
                $this->dropIndex("`$keyName`", '{{%detail_fasilitas}}');
            }
        }

    }
}
