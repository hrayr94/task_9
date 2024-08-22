<?php

namespace backend\controllers;

use backend\models\BookSearch;
use Yii;
use common\models\Book;
use common\models\Author;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class BookController extends Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function actionIndex()
    {
        $searchModel = new BookSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Book();
        $authors = Author::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->saveAuthors($model);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'authors' => $authors,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $authors = \common\models\Author::find()->all();
        $model->author_ids = \common\models\BookAuthor::find()
            ->select('author_id')
            ->where(['book_id' => $model->id])
            ->column();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->saveAuthors($model);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'authors' => $authors,
        ]);
    }




    protected function saveAuthors($model)
    {
        \common\models\BookAuthor::deleteAll(['book_id' => $model->id]);

        if (is_array($model->author_ids)) {
            foreach ($model->author_ids as $author_id) {
                $bookAuthor = new \common\models\BookAuthor();
                $bookAuthor->book_id = $model->id;
                $bookAuthor->author_id = $author_id;
                $bookAuthor->save();
            }
        }
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Book::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
