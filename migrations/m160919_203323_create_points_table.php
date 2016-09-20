<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation for table `points`.
 */
class m160919_203323_create_points_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('points', [
            'id' => $this->primaryKey(),
            'name' => Schema::TYPE_STRING. ' NOT NULL',
            'is_deleted' => Schema::TYPE_BOOLEAN . ' NOT NULL',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('points');
    }
}
