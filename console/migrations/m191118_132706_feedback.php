<?php

use yii\db\Migration;

/**
 * Class m191118_132706_feedback
 */
class m191118_132706_feedback extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('feedback', [
            'id' => $this->primaryKey(11)->unsigned(),
            'firstname' => $this->string(32)->notNull(),
            'lastname' => $this->string(32)->notNull(),
            'email' => $this->string(128)->notNull(),
            'mobile' => $this->string(32)->notNull(),
            'plot' => $this->text()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('feedback');
    }
}
