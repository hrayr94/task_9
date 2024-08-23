<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ArrayDataProvider;

/** @var yii\web\View $this */
/** @var common\models\Book $book */

$this->title = $book->title;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => new ArrayDataProvider([
            'allModels' => [$book],
            'pagination' => false,
        ]),
        'columns' => [
            [
                'label' => 'Title',
                'value' => function ($model) {
                    return Html::encode($model->title);
                },
            ],
            [
                'label' => 'Authors',
                'value' => function ($model) {
                    return implode(', ', array_map(function ($author) {
                        return Html::encode($author->first_name . ' ' . $author->last_name);
                    }, $model->authors));
                },
            ],
            [
                'label' => 'Summary',
                'value' => function ($model) {
                    return nl2br(Html::encode($model->description));
                },
                'format' => 'raw',
            ],
        ],
    ]); ?>

    <div class="book-actions">
        <?= Html::a('Back to List', ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

</div>
