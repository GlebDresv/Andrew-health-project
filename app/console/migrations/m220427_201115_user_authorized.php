<?php

use yii\db\Migration;

/**
 * Class m220427_174111_people
 */
class m220427_201115_user_authorized extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('user_auth', [
            'userid' => $this->primaryKey(),
            'phone_number' => $this->integer()->notNull(),
            'full_name' => $this->string()->notNull()->defaultValue('No Name'),
            'about' => $this->string()->notNull(),
            'image' => $this->string()->defaultValue('../default.png'),
            'height' => $this->smallInteger(3)->unsigned()->defaultValue(Null),
            'age' => $this->smallInteger(3)->unsigned()->defaultValue(Null),
            'distance_day' => $this->integer()->unsigned()->notNull(),
            'distance_week' => $this->integer()->unsigned()->notNull(),
            'distance_all' => $this->integer()->unsigned()->notNull(),
            'desired_distance' => $this->integer()->unsigned()->notNull(),
            'recommended_distance' => $this->integer()->unsigned()->notNull(),
        ]);
        $this->addForeignKey('user_id', 'user_auth', 'userid', 'user', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropForeignKey('user_id', 'user_auth');
        $this->dropTable('user_auth');
    }
}
