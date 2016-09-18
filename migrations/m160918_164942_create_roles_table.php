<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation for table `roles`.
 */
class m160918_164942_create_roles_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('roles', [
            'id' => $this->primaryKey(3),
            'rolename' =>  Schema::TYPE_STRING . ' NOT NULL'
        ]);

        $this->addForeignKey("user_to_role", "users", "role_id", "roles", "id");
    }

    public function safeDown()
    {
        $this->dropForeignKey("user_to_role", "users");
        $this->dropTable('roles');
    }
}
