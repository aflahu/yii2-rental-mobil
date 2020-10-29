<?php

use yii\db\Migration;

/**
 * Class m201029_004424_add_table_fasilitas
 */
class m201029_004424_add_table_fasilitas extends Migration
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
        echo "m201029_004424_add_table_fasilitas cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%fasilitas}}', [
            'kode_fasilitas' => $this->primaryKey(),
            'nama_fasilitas' => $this->string(50)->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%fasilitas}}');
    }
}
