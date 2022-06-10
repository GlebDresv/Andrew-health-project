<?php

use yii\db\Migration;

/**
 * Class m130524_201442_add_table_profile
 */
class m130525_201442_create_table_location extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('location', [
            'user_id' => $this->integer(),
            'location_id' => $this->primaryKey(),
            'time' => $this->dateTime(),
            'longitude' => $this->decimal(),
            'latitude' => $this->decimal(),
        ]);
        $this->addForeignKey('user_loc-id', 'location', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropForeignKey('user_id', 'location');
        $this->dropTable('location');
    }
}
