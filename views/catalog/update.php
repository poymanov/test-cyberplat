<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Catalog;
/* @var $this yii\web\View */

$this->title = "Редактирование категории ".$category->name;
?>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($category, 'name')->label('Название категории') ?>

    <?= $form->field($category, 'parent_id')->label('Родительская категория')->dropdownList(
	    Catalog::find()->select(['name', 'id'])->indexBy('id')->column(),
	    ['prompt'=>'Выберите родительскую категорию']);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>