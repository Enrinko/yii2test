<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%language}}`.
 */
class m230722_155752_create_language_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%language}}', [
            'id' => $this->primaryKey(),
            'full_size_name' => $this->string(100)->notNull()->unique(),
            'short_size_name' => $this->string(10)->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%language}}');
    }
}
