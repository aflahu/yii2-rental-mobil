<?php

use hzhihua\dump\Migration;

/**
 * Class m123456_654321_1_tableData_user
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m123456_654321_1_tableData_user extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->_transaction = $this->getDb()->beginTransaction();
        $this->batchInsert('{{%user}}', 
            ['id', 'username', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'status', 'created_at', 'updated_at', 'verification_token', 'role', 'jenis_kelamin', 'nama', 'pekerjaan', 'alamat', 'kota', 'provinsi'],
            [
                [1, 'admin', 'v0F4oko0YSsrvESSQG0A1z1CjhxCBt2_', '$2y$13$T1wPlsfQMSaySOp9Yd15V.szi5YgMn6k9XJaA6Spg7RiaHcaZWA9.', null, 'admin@admin.com', 10, 1603937224, 1603940256, 'jV5MsW_8CeuV401hEKFOREpXSLcpTR4Z_1603937224', 1, '', 'saya', '', '', '', ''],
            ]
        );
        $this->_transaction->commit();

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        $this->_transaction->rollBack();

    }
}
