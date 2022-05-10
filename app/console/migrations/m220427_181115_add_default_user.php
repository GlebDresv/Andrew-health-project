<?php

use yii\db\Migration;

/**
 * Class m220427_181115_add_admin_user
 */
class m220427_181115_add_default_user extends Migration
{
    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     */
    public function up()
    {
        $this->execute('INSERT INTO user(username,auth_key,password_hash,email,created_at,updated_at)
                        VALUES (\'user\',\'234\',\''.Yii::$app->security->generatePasswordHash('user').'\',\'user@test.test\',\'0\',\'0\')');
    }
    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->execute('DELETE FROM user
                        WHERE username = \'user\'');
    }

}
