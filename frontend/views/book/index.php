<?php
use yii\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Book[] $books */


$booksArray = [];
foreach ($books as $book) {
    $booksArray[] = [
        'id' => $book->id,
        'title' => $book->title,
        'description' => $book->description,
        'authors' => implode(', ', array_map(function($author) {
            return Html::encode($author->first_name) . ' ' . Html::encode($author->last_name);
        }, $book->authors)),
    ];
}

$dataProvider = new ArrayDataProvider([
    'allModels' => $booksArray,
    'pagination' => [
        'pageSize' => 10,
    ],
    'sort' => [
        'attributes' => ['title', 'description', 'authors'],
    ],
]);

?>

<h1>Book List</h1>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'attribute' => 'title',
            'label' => 'Title',
            'format' => 'raw',
            'value' => function ($data) {
                return Html::a(Html::encode($data['title']), Url::to(['book/view', 'id' => $data['id']]));
            },
        ],
        [
            'attribute' => 'authors',
            'label' => 'Authors',
            'format' => 'raw',
        ],
        [
            'attribute' => 'description',
            'label' => 'Description',
            'format' => 'text',
        ],
    ],
]); ?>
