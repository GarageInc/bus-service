<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation for table `trips`.
 */
class m160919_202328_create_trips_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('trips', [
            'id' => $this->primaryKey(3),
            'bus_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'is_deleted' => Schema::TYPE_BOOLEAN . ' NOT NULL',
        ]);

        $this->addForeignKey("trip_to_bus", "trips", "bus_id", "buses", "id");
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey("trip_to_bus", "trips");
        $this->dropTable('trips');
    }
}
