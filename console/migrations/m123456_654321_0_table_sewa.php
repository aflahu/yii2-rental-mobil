<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_0_table_sewa
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_0_table_sewa extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%sewa}}', [
            'no_nota' => $this->integer(11)->notNull(),
            'id_penyewa' => $this->integer(11)->notNull(),
            'tanggal_sewa' => $this->date()->notNull(),
            'jaminan' => $this->string(15)->notNull(),
        ], $this->tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%sewa}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%sewa}}');
            } else {
                throw new \yii\db\Exception('only support "dropTable" and "dropCommentFromTable"');
            }
        }
    }
}
