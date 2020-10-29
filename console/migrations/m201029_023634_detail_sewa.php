<?php

use yii\db\Migration;

/**
 * Class m201029_023634_detail_sewa
 */
class m201029_023634_detail_sewa extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201029_023634_detail_sewa cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%detail_sewa}}', [
            'no_nota' => $this->integer()->notNull(),
            'id_driver' => $this->integer()->notNull(),
            'no_mobil' => $this->string(8)->notNull(),
            'tgl_kembali' => $this->date(),
            'pembayaran' => $this->integer(15),
        ], $tableOptions);

        $this->createIndex('idx-detail_sewa-no_nota', '{{%detail_sewa}}', 'no_nota');
        $this->createIndex('idx-detail_sewa-id_driver', '{{%detail_sewa}}', 'id_driver');
        $this->createIndex('idx-detail_sewa-no_mobil', '{{%detail_sewa}}', 'no_mobil');
    }

    public function down()
    {
        $this->dropTable('{{%detail_sewa}}');
    }
}
