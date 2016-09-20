<?php

use yii\db\Migration;
use yii\db\Schema;

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

            'carrier_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'role_id' => Schema::TYPE_INTEGER . ' NOT NULL',

            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'password' => Schema::TYPE_STRING . ' NOT NULL',
            'auth_key' => Schema::TYPE_STRING . ' NOT NULL',
            'token' => Schema::TYPE_STRING . ' NOT NULL',
            'is_deleted' => Schema::TYPE_BOOLEAN . ' NOT NULL',
        ], $tableOptions);


        $this->addForeignKey("user_to_carrier", "users", "carrier_id", "carriers", "id");

    }

    public function safeDown()
    {
        $this->dropForeignKey("user_to_carrier", "users");
        $this->dropTable('users');
    }
}
