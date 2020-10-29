<?php

use yii\db\Migration;

/**
 * Class m201029_005201_add_detail_fasilitas_table
 */
class m201029_005201_add_detail_fasilitas_table extends Migration
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
        echo "m201029_005201_add_detail_fasilitas_table cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%detail_fasilitas}}', [
            'no_mobil' => $this->string(8)->notNull(),
            'kode_fasilitas' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-detail_fasilitas-no_mobil', '{{%detail_fasilitas}}', 'no_mobil');
        $this->createIndex('idx-detail_fasilitas-kode_fasilitas', '{{%detail_fasilitas}}', 'kode_fasilitas');
    }

    public function down()
    {
        $this->dropTable('{{%detail_fasilitas}}');
    }
}
