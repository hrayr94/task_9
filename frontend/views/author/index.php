<?php
/** @var yii\web\View $this */
/** @var common\models\Author[] $authors */
?>

<h1>Author List</h1>

<ul>
    <?php foreach ($authors as $author): ?>
        <li>
            <a href="<?= \yii\helpers\Url::to(['author/view', 'id' => $author->id]) ?>">
                <?= htmlspecialchars($author->first_name) ?> <?= htmlspecialchars($author->last_name) ?>
            </a>
            <p><?= htmlspecialchars($author->biography) ?></p>
        </li>
    <?php endforeach; ?>
</ul>
