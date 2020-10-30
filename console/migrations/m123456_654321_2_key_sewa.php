<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_2_key_sewa
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_2_key_sewa extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%sewa}}', 'no_nota');
        $this->runSuccess['addAutoIncrement'] = $this->addAutoIncrement('{{%sewa}}', 'no_nota', 'integer', '', 5);
        $this->runSuccess['idx-sewa-id_penyewa'] = $this->createIndex('idx-sewa-id_penyewa', '{{%sewa}}', 'id_penyewa', 0);

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
                $this->dropPrimaryKey(null, '{{%sewa}}');
            } elseif (!empty($keyName)) {
                $this->dropIndex("`$keyName`", '{{%sewa}}');
            }
        }

    }
}
