<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation for table `buses`.
 */
class m160918_080324_create_buses_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('buses', [
            'id' => $this->primaryKey(3),

            'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'carrier_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'busmark_id' => Schema::TYPE_INTEGER . ' NOT NULL',

            'bus_number' =>  Schema::TYPE_STRING . ' NOT NULL',
            'year_of_issue' => Schema::TYPE_DATE . ' NOT NULL',
            'goverment_number' => Schema::TYPE_STRING . ' NOT NULL',
            'registration_certificate' => Schema::TYPE_STRING. ' NOT NULL',

            'has_folding_chairs' => Schema::TYPE_BOOLEAN. ' NOT NULL',
            'has_air_conditioning' => Schema::TYPE_BOOLEAN. ' NOT NULL',
            'has_internet' => Schema::TYPE_BOOLEAN. ' NOT NULL',
            'has_tv' => Schema::TYPE_BOOLEAN. ' NOT NULL',
            'has_restroom' => Schema::TYPE_BOOLEAN. ' NOT NULL',

            'number_of_storeys' => Schema::TYPE_INTEGER. ' NOT NULL',
        ]);

        $this->addForeignKey("bus_to_user", "buses", "user_id", "users", "id");
        $this->addForeignKey("bus_to_carrier", "buses", "carrier_id", "carriers", "id");
        $this->addForeignKey("bus_to_busmark", "buses", "busmark_id", "busmarks", "id");
    }

    public function safeDown()
    {
        $this->dropForeignKey("bus_to_busmark", "buses");
        $this->dropForeignKey("bus_to_carrier", "buses");
        $this->dropForeignKey("bus_to_busmark", "buses");

        $this->dropTable('buses');
    }
}
