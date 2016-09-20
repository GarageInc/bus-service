<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation for table `busmark`.
 */
class m160918_080049_create_busmarks_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('busmarks', [
            'id' => $this->primaryKey(3),
            'markname' =>  Schema::TYPE_STRING . ' NOT NULL',
            'is_deleted' => Schema::TYPE_BOOLEAN . ' NOT NULL',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('busmarks');
    }
}
