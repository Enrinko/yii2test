<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%texts}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%profile}}`
 * - `{{%language}}`
 */
class m230722_155837_create_texts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%texts}}', [
            'id' => $this->primaryKey(),
            'profile_id' => $this->integer()->notNull(),
            'title' => $this->string(150)->notNull(),
            'body' => $this->text()->notNull(),
            'lang' => $this->integer()->notNull(),
        ]);

        // creates index for column `profile_id`
        $this->createIndex(
            '{{%idx-texts-profile_id}}',
            '{{%texts}}',
            'profile_id'
        );

        // add foreign key for table `{{%profile}}`
        $this->addForeignKey(
            '{{%fk-texts-profile_id}}',
            '{{%texts}}',
            'profile_id',
            '{{%profile}}',
            'id',
            'CASCADE'
        );

        // creates index for column `lang`
        $this->createIndex(
            '{{%idx-texts-lang}}',
            '{{%texts}}',
            'lang'
        );

        // add foreign key for table `{{%language}}`
        $this->addForeignKey(
            '{{%fk-texts-lang}}',
            '{{%texts}}',
            'lang',
            '{{%language}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%profile}}`
        $this->dropForeignKey(
            '{{%fk-texts-profile_id}}',
            '{{%texts}}'
        );

        // drops index for column `profile_id`
        $this->dropIndex(
            '{{%idx-texts-profile_id}}',
            '{{%texts}}'
        );

        // drops foreign key for table `{{%language}}`
        $this->dropForeignKey(
            '{{%fk-texts-lang}}',
            '{{%texts}}'
        );

        // drops index for column `lang`
        $this->dropIndex(
            '{{%idx-texts-lang}}',
            '{{%texts}}'
        );

        $this->dropTable('{{%texts}}');
    }
}
