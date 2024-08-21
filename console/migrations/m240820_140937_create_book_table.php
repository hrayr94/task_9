<?php

use yii\db\Migration;

class m240820_140937_create_book_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('books', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
            'publication_year' => $this->integer(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('books');
    }

}
