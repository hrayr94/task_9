<?php

use yii\db\Migration;

class m240820_141702_create_author_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('authors', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'biography' => $this->text(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('authors');
    }

}
