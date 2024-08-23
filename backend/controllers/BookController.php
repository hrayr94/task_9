<?php

namespace backend\controllers;

use backend\models\BookSearch;
use Yii;
use common\models\Book;
use common\models\Author;
use yii\web\NotFoundHttpException;

class BookController extends AdminController
{
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
            $model->saveAuthors();
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
        $authors = Author::find()->all();
        $model->author_ids = $model->getAuthors()->select('id')->column();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->saveAuthors();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'authors' => $authors,
        ]);
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
