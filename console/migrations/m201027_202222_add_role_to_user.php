<?php

use yii\db\Migration;

/**
 * Class m201027_202222_add_role_to_user
 */
class m201027_202222_add_role_to_user extends Migration
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
        echo "m201027_202222_add_role_to_user cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $this->addColumn('{{%user}}', 'role', $this->smallInteger(1)->notNull()->defaultValue(1));
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'role');
    }
}
