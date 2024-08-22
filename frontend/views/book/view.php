<?php
/** @var yii\web\View $this */
/** @var common\models\Book $book */
?>

<h1>Book Details</h1>

<p>
    <strong>Title:</strong> <?= htmlspecialchars($book->title) ?><br>
    <strong>Authors:</strong>
<ul>
    <?php foreach ($book->authors as $author): ?>
        <li><?= htmlspecialchars($author->first_name) ?> <?= htmlspecialchars($author->last_name) ?></li>
    <?php endforeach; ?>
</ul>
<strong>Summary:</strong> <?= htmlspecialchars($book->description) ?>
</p>
