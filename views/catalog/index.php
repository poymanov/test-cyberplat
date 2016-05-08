<?php

/* @var $this yii\web\View */

$this->title = 'Управление категориями';
?>

<div class="row">
	<h1>
		Управление категориями
	</h1>
	<div>
		<a href="/catalog/new" class="categories-new btn btn-primary">Добавить новую</a>
	</div>	
	<table class="table table-bordered categories-index">
		<tr>
			<th>id</th>
			<th>Название</th>
			<th>Родитель</th>
			<th>Изменить</th>
			<th>Удалить</th>
		</tr>
		<?php foreach ($categories as $category) {?>
			<tr>
				<td><?php echo $category->id; ?></td>
				<td><?php echo $category->name; ?></td>
				<td><?php echo $category->getCategoryName(); ?></td>
				<td></td>
				<td><a href="/catalog/delete/<?php echo $category->id; ?>" class="glyphicon glyphicon-trash"></a></td>
			</tr>
		<?php } ?>
	</table>	
</div>

