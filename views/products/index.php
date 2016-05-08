<?php

/* @var $this yii\web\View */

$this->title = 'Управление товарами';
?>

<div class="row">
	<h1>
		Управление товарами
	</h1>
	<div>
		<a href="/products/new" class="categories-new btn btn-primary">Добавить новый</a>
	</div>	
	<table class="table table-bordered categories-index">
		<tr>
			<th>id</th>
			<th>Название</th>
			<th>Категория</th>
			<th>Изменить</th>
			<th>Удалить</th>
		</tr>
		<?php foreach ($products as $product) {?>
			<tr>
				<td><?php echo $product->id; ?></td>
				<td><?php echo $product->name; ?></td>
				<td><?php echo $product->getCategoryName(); ?></td>
				<td>
					<a href="/products/update/<?php echo $product->id; ?>" class="glyphicon glyphicon-pencil"></a>
				</td>
				<td>
					<a href="/products/delete/<?php echo $product->id; ?>" class="glyphicon glyphicon-trash"></a>
				</td>
			</tr>
		<?php } ?>
	</table>	
</div>

