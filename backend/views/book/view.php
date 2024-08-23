<?php

use yii\helpers\Html;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\Book $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider([
            'allModels' => [$model],
            'pagination' => false,
        ]),
        'columns' => [
            [
                'attribute' => 'id',
                'label' => 'ID',
            ],
            [
                'attribute' => 'title',
                'label' => 'Title',
            ],
            [
                'attribute' => 'description',
                'label' => 'Description',
                'format' => 'ntext',
            ],
            [
                'attribute' => 'publication_year',
                'label' => 'Publication Year',
            ],
        ],
    ]); ?>

</div>
