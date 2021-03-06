<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_2_key_mobil
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_2_key_mobil extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%mobil}}', 'no_mobil');

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
                $this->dropPrimaryKey(null, '{{%mobil}}');
            } elseif (!empty($keyName)) {
                $this->dropIndex("`$keyName`", '{{%mobil}}');
            }
        }

    }
}
