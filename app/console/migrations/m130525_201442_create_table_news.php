<?php

use yii\db\Migration;

/**
 * Class m130524_201442_add_table_profile
 */
class m130525_201442_create_table_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'header' => $this->string(),
            'text' => $this->text(),
            'image' => $this->string(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'photo_id' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('news');
    }
}
