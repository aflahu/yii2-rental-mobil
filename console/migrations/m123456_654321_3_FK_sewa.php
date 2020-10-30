<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_3_FK_sewa
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_3_FK_sewa extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $tablePrefix = \Yii::$app->getDb()->tablePrefix;
        $this->runSuccess[$tablePrefix.'sewa_ibfk_1'] = $this->addForeignKey($tablePrefix.'sewa_ibfk_1', '{{%sewa}}', 'id_penyewa', '{{%user}}', 'id', null, null);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            $this->dropForeignKey($keyName, '{{%sewa}}');
        }

    }
}
