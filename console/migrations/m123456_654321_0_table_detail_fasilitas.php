<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_0_table_detail_fasilitas
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_0_table_detail_fasilitas extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%detail_fasilitas}}', [
            'no_mobil' => $this->string(8)->notNull(),
            'kode_fasilitas' => $this->integer(11)->notNull(),
        ], $this->tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%detail_fasilitas}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%detail_fasilitas}}');
            } else {
                throw new \yii\db\Exception('only support "dropTable" and "dropCommentFromTable"');
            }
        }
    }
}
