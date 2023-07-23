<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m230722_082114_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->unique(),
            'body' => $this->text()->notNull(),
            'createdAt' => $this->datetime()->notNull(),
            'updatedAt' => $this->datetime()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
