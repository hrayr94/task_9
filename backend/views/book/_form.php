<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Author;

/* @var yii\web\View $this */
/* @var common\models\Book $model */
/* @var yii\widgets\ActiveForm $form */

$form = ActiveForm::begin();
?>

<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'publication_year')->textInput() ?>

<?= $form->field($model, 'author_ids')->checkboxList(
    \common\models\Author::find()->select(['first_name', 'id'])->indexBy('id')->column()
) ?>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
