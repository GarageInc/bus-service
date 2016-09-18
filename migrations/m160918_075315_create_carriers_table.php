<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation for table `carrier`.
 */
class m160918_075315_create_carriers_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('carriers', [
            'id' => $this->primaryKey(3),
            'carriername' => Schema::TYPE_STRING . ' NOT NULL',
            'password' => Schema::TYPE_STRING . ' NOT NULL',
            'auth_key' => Schema::TYPE_STRING . ' NOT NULL',
            'token' => Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('carriers');
    }
}
