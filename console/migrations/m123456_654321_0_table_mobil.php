<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_0_table_mobil
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_0_table_mobil extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%mobil}}', [
            'no_mobil' => $this->string(8)->notNull(),
            'nama_mobil' => $this->string(25)->notNull(),
            'jenis_mobil' => $this->string(20)->notNull(),
            'tahun_pembuatan' => $this->integer(5)->notNull(),
            'harga_sewa' => $this->integer(15)->notNull(),
            'kapasitas_penumpang' => $this->integer(3)->notNull(),
            'status_mobil' => $this->string(7)->notNull(),
        ], $this->tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%mobil}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%mobil}}');
            } else {
                throw new \yii\db\Exception('only support "dropTable" and "dropCommentFromTable"');
            }
        }
    }
}
