<?php

use yii\db\Migration;

/**
 * Handles the creation for table `user`.
 */
class m160918_075336_create_user_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('users', [
            'id' => $this->primaryKey(10),
            'currier_id' => Schema::TYPE_STRING . ' NOT NULL',
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'password' => Schema::TYPE_STRING . ' NOT NULL',
            'auth_key' => Schema::TYPE_STRING . ' NOT NULL',
            'token' => Schema::TYPE_STRING . ' NOT NULL',
        ], $tableOptions);

    }

    public function safeDown()
    {
        $this->dropTable('users');
    }
}
