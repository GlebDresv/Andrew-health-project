<?php

use yii\db\Migration;
/**
 * Class m220427_174111_people
 */
class m220427_174111_people extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('people', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'city' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('people');
    }
}
