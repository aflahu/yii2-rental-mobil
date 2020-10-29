<?php

use yii\db\Migration;

/**
 * Class m201029_021302_sewa
 */
class m201029_021302_sewa extends Migration
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
        echo "m201029_021302_sewa cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%sewa}}', [
            'no_nota' => $this->primaryKey(),
            'id_penyewa' => $this->integer()->notNull(),
            'tanggal_sewa' => $this->date()->notNull(),
            'jaminan' => $this->string(15)->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-sewa-id_penyewa', '{{%sewa}}', 'id_penyewa');
    }

    public function down()
    {
        $this->dropTable('{{%sewa}}');
    }
}
