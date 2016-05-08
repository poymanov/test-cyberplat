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

		// Если категория не найдена, возвращаемся на главную страницу
		if($category === null) {
			$this->redirect(Yii::$app->request->referrer);
		}

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

	public function actionNew() {
		$category = new Catalog;
		
		if($category->load(Yii::$app->request->post()) && $category->validate()) {
			// Валидация прошла успешно,
			// создаем новую категорию
			$request = Yii::$app->request;
			$category->name = $request->post('Catalog')['name'];
			$category->parent_id = $request->post('Catalog')['parent_id'];
			$category->save();

			// Переадресация на главную страницу
			$this->redirect('/');

		} else {
			// либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('new', compact('category'));
		}
	}

	public function actionIndex() {
		$categories = Catalog::find()->all();
		return $this->render('index',compact('categories'));
	}

	public function actionDelete($id) {

		// Находим по id категорию
		$category = Catalog::findOne($id);

		// Если категория найдена
		if ($category !== null) {
			
			// Удаляем категорию
			$category->delete();

			// Очищаем parent_id у дочерних категорий
			$childrens = Catalog::find()
					->where(['parent_id' => $id])
					->all();

			foreach ($childrens as $children) {
				$children->parent_id = "";
				$children->save();
			}
		}

		// Возвращаемся обратно на страницу управлени категориями
		$this->redirect(Yii::$app->request->referrer);
	}

	public function actionUpdate($id) {
		$category = Catalog::findOne($id);

		// Если такой категории не найдено, редирект на предыдущую страницу
		if ($category === null) {
			$this->redirect(Yii::$app->request->referrer);
		}
		
		if($category->load(Yii::$app->request->post()) && $category->validate()) {
			// Валидация прошла успешно,
			// создаем новую категорию
			$request = Yii::$app->request;
			$category->name = $request->post('Catalog')['name'];
			$category->parent_id = $request->post('Catalog')['parent_id'];
			$category->save();

			// Переадресация на страницу управления категориями
			$this->redirect('/catalog');

		} else {
			// либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('update', compact('category'));
		}
	}
}