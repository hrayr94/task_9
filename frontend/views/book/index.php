<?php
/** @var yii\web\View $this */
/** @var common\models\Book[] $books */
?>

<h1>Book List</h1>

<ul>
    <?php foreach ($books as $book): ?>
        <li>
            <a href="<?= \yii\helpers\Url::to(['book/view', 'id' => $book->id]) ?>">
                <?= htmlspecialchars($book->title) ?>
            </a>
            <p><?= htmlspecialchars($book->description) ?></p>
        </li>
    <?php endforeach; ?>
</ul>
