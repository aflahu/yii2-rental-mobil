<?php

use yii\db\Migration;

/**
 * Class m201027_203753_add_detail_info_to_user
 */
class m201027_203753_add_detail_info_to_user extends Migration
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
        echo "m201027_203753_add_detail_info_to_user cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $this->addColumn('{{%user}}', 'jenis_kelamin', $this->string(9));
        $this->addColumn('{{%user}}', 'nama', $this->string(30));
        $this->addColumn('{{%user}}', 'pekerjaan', $this->string(25));
        $this->addColumn('{{%user}}', 'alamat', $this->string(50));
        $this->addColumn('{{%user}}', 'kota', $this->string(20));
        $this->addColumn('{{%user}}', 'provinsi', $this->string(20));
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'jenis_kelamin');
        $this->dropColumn('{{%user}}', 'nama');
        $this->dropColumn('{{%user}}', 'pekerjaan');
        $this->dropColumn('{{%user}}', 'alamat');
        $this->dropColumn('{{%user}}', 'kota');
        $this->dropColumn('{{%user}}', 'provinsi');
    }
}
