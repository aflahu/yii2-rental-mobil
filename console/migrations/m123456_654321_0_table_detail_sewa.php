<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_0_table_detail_sewa
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_0_table_detail_sewa extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%detail_sewa}}', [
            'no_nota' => $this->integer(11)->notNull(),
            'id_driver' => $this->integer(11)->notNull(),
            'no_mobil' => $this->string(8)->notNull(),
            'tgl_kembali' => $this->date()->null(),
            'pembayaran' => $this->integer(15)->null(),
        ], $this->tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%detail_sewa}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%detail_sewa}}');
            } else {
                throw new \yii\db\Exception('only support "dropTable" and "dropCommentFromTable"');
            }
        }
    }
}
