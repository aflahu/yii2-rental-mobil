<?php

use yii\db\Migration;

/**
 * Class m201029_001216_add_mobil_table
 */
class m201029_001216_add_mobil_table extends Migration
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
        echo "m201029_001216_add_mobil_table cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%mobil}}', [
            'no_mobil' => $this->primaryKey(),
            'nama_mobil' => $this->string(25)->notNull(),
            'jenis_mobil' => $this->string(20)->notNull(),
            'tahun_pembuatan' => $this->integer(5)->notNull(),
            'harga_sewa' => $this->integer(15)->notNull(),
            'kapasitas_penumpang' => $this->integer(3)->notNull(),
            'status_mobil' => $this->string(7)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%mobil}}');
    }
}
