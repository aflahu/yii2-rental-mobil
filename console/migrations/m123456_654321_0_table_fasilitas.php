<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_0_table_fasilitas
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_0_table_fasilitas extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%fasilitas}}', [
            'kode_fasilitas' => $this->integer(11)->notNull(),
            'nama_fasilitas' => $this->string(50)->notNull(),
        ], $this->tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%fasilitas}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%fasilitas}}');
            } else {
                throw new \yii\db\Exception('only support "dropTable" and "dropCommentFromTable"');
            }
        }
    }
}
