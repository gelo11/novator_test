<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%author}}`.
 */
class m231205_082032_create_author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%author}}', [
            'id' => $this->primaryKey(),
            'lastname' => $this->string(255),
            'firstname' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%author}}');
    }
}
