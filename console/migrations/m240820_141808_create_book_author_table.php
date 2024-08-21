<?php

use yii\db\Migration;

class m240820_141808_create_book_author_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('book_author', [
            'book_id' => $this->integer(),
            'author_id' => $this->integer(),
            'PRIMARY KEY(book_id, author_id)',
        ]);

        $this->addForeignKey(
            'fk-book_author-book_id',
            'book_author',
            'book_id',
            'books',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-book_author-author_id',
            'book_author',
            'author_id',
            'authors',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-book_author-book_id', 'book_author');
        $this->dropForeignKey('fk-book_author-author_id', 'book_author');
        $this->dropTable('book_author');
    }

}
