<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Catalog;
use app\models\Products;

class CatalogController extends Controller
{	

	public function actionDetail($id) {

		// Данные по текущей категории
		$category = Catalog::findOne($id);

		// Данные по подкатегориям категории
		$subcategories = Catalog::find()
						->where(['parent_id' => $id])
						->all();

		// Массив с категориями для поиска товаров
		$products_categories = array();

		// Добавляем текущую категорию
		$products_categories[] = $category->id;

		// И все вложенные
		foreach ($subcategories as $item) {
			$products_categories[] = $item->id;
		}

		// Получаем все продукты по категории
		$products = Products::find()
					->where(['category_id' => $products_categories])
					->all();

		return $this->render('detail',compact('category','subcategories','products'));
	}
}