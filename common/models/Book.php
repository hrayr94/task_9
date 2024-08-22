<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class Book extends ActiveRecord
{
    public $author_ids = [];

    public static function tableName()
    {
        return 'books';
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['publication_year'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['author_ids'], 'each', 'rule' => ['integer']],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'publication_year' => 'Publication Year',
            'author_ids' => 'Authors',
        ];
    }

    public function getAuthors()
    {
        return $this->hasMany(Author::class, ['id' => 'author_id'])->via('bookAuthor', ['book_id' => 'id']);
    }

    public function getBookAuthors()
    {
        return $this->hasMany(BookAuthor::class, ['book_id' => 'id']);
    }
}
