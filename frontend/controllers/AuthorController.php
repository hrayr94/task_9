<?php

namespace frontend\controllers;

use common\models\Author;

class AuthorController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $authors = Author::find()->all();
        return $this->render('index', [
            'authors' => $authors,
        ]);
    }

    public function actionView($id)
    {
        $author = Author::findOne($id);
        if ($author === null) {
            throw new \yii\web\NotFoundHttpException('Author not found.');
        }
        return $this->render('view', [
            'author' => $author,
        ]);
    }


}
