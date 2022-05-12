<?php

use yii\db\Migration;

/**
 * Class m130524_201442_add_table_profile
 */
class m130525_201442_add_table_profile extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('profile_info', [
            'userid' => $this->primaryKey(),
            'phone_number' => $this->integer(),
            'full_name' => $this->string()->notNull()->defaultValue(''),
            'about' => $this->string()->notNull()->defaultValue(''),
            'image' => $this->string()->defaultValue('../img/default.png'),
            'height' => $this->smallInteger(3)->unsigned()->defaultValue(Null),
            'age' => $this->smallInteger(3)->unsigned()->defaultValue(Null),
            'distance_day' => $this->integer()->unsigned()->defaultValue(0),
            'distance_week' => $this->integer()->unsigned()->defaultValue(0),
            'distance_all' => $this->integer()->unsigned()->defaultValue(0),
            'desired_distance' => $this->integer()->unsigned()->defaultValue(0),
            'recommended_distance' => $this->integer()->unsigned()->defaultValue(0),
        ]);
        $this->addForeignKey('user_id', 'profile_info', 'userid', 'user', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropForeignKey('user_id', 'profile_info');
        $this->dropTable('profile_info');
    }
}
