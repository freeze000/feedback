<?php

use yii\db\Migration;

/**
 * Class m191119_165412_user_username_remove
 */
class m191119_165412_user_username_remove extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('user', 'username');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191119_165412_user_username_remove cannot be reverted.\n";

        return false;
    }
}
