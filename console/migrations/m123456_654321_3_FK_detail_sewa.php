<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_3_FK_detail_sewa
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_3_FK_detail_sewa extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $tablePrefix = \Yii::$app->getDb()->tablePrefix;
        $this->runSuccess[$tablePrefix.'detail_sewa_ibfk_1'] = $this->addForeignKey($tablePrefix.'detail_sewa_ibfk_1', '{{%detail_sewa}}', 'no_nota', '{{%sewa}}', 'no_nota', null, null);
        $this->runSuccess[$tablePrefix.'detail_sewa_ibfk_2'] = $this->addForeignKey($tablePrefix.'detail_sewa_ibfk_2', '{{%detail_sewa}}', 'id_driver', '{{%user}}', 'id', null, null);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            $this->dropForeignKey($keyName, '{{%detail_sewa}}');
        }

    }
}
