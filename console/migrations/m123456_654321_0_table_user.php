<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_0_table_user
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_0_table_user extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['createTable'] = $this->createTable('{{%user}}', [
            'id' => $this->integer(11)->notNull(),
            'username' => $this->string(255)->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string(255)->notNull(),
            'password_reset_token' => $this->string(255)->null(),
            'email' => $this->string(255)->notNull(),
            'status' => $this->smallInteger(6)->notNull()->defaultValue(10),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
            'verification_token' => $this->string(255)->null(),
            'role' => $this->smallInteger(1)->notNull()->defaultValue(1),
            'jenis_kelamin' => $this->string(9)->null(),
            'nama' => $this->string(30)->null(),
            'pekerjaan' => $this->string(25)->null(),
            'alamat' => $this->string(50)->null(),
            'kota' => $this->string(20)->null(),
            'provinsi' => $this->string(20)->null(),
        ], $this->tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('createTable' === $keyName) {
                $this->dropTable('{{%user}}');
            } elseif ('addTableComment' === $keyName) {
                $this->dropCommentFromTable('{{%user}}');
            } else {
                throw new \yii\db\Exception('only support "dropTable" and "dropCommentFromTable"');
            }
        }
    }
}
