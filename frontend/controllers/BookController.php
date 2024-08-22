<?php

namespace frontend\controllers;

use Yii;
use common\models\Book;
use yii\web\Controller;

class BookController extends Controller
{
    public function actionIndex()
    {
        $books = Book::find()->all();
        return $this->render('index', [
            'books' => $books,
        ]);
    }

    public function actionView($id)
    {
        $book = Book::findOne($id);
        if ($book === null) {
            throw new \yii\web\NotFoundHttpException('Book not found.');
        }
        return $this->render('view', [
            'book' => $book,
        ]);
    }
}

