<?php
/** @var yii\web\View $this */
/** @var common\models\Author $author */
?>

<h1>Author Details</h1>

<p>
    <strong>First Name:</strong> <?= htmlspecialchars($author->first_name) ?><br>
    <strong>Last Name:</strong> <?= htmlspecialchars($author->last_name) ?><br>
    <strong>Biography:</strong> <?= htmlspecialchars($author->biography) ?>
</p>
