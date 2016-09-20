<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation for table `trips_points`.
 */
class m160919_203743_create_trips_points_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('trips_points', [
            'id' => $this->primaryKey(),
            'trip_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'point_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'is_deleted' => Schema::TYPE_BOOLEAN . ' NOT NULL',
        ]);

        $this->addForeignKey("to_trips", "trips_points", "trip_id", "trips", "id");
        $this->addForeignKey("to_points", "trips_points", "point_id", "points", "id");
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey("to_points", "trips_points");
        $this->dropForeignKey("to_trips", "trips_points");
        $this->dropTable('trips_points');
    }
}
