<?php

use yii\db\Migration;

/**
 * Class m220427_181115_add_admin_user
 */
class m220427_181115_add_admin_user extends Migration
{
    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     */
    public function up()
    {
        $this->execute('INSERT INTO user(username,auth_key,password_hash,email,created_at,updated_at)
                        VALUES (\'admin\',\'123\',\''.Yii::$app->security->generatePasswordHash('admin').'\',\'email@test.test\',\'0\',\'0\')');
    }
    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->execute('DELETE FROM user
                        WHERE username = \'admin\'');
    }

}
