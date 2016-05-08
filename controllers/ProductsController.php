<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Products;

class ProductsController extends Controller
{
	public function actionIndex() {
		$products = Products::find()->all();
		return $this->render('index',compact('products'));
	}

	public function actionNew() {
		$product = new Products;
		
		if($product->load(Yii::$app->request->post()) && $product->validate()) {
			// Валидация прошла успешно,
			// создаем новую категорию
			$request = Yii::$app->request;
			$product->name = $request->post('Products')['name'];
			$product->category_id = $request
									->post('Products')['category_id'];
			$product->save();

			// Переадресация на главную страницу
			$this->redirect('/');

		} else {
			// либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('new', compact('product'));
		}
	}

	public function actionUpdate($id) {
		$product = Products::findOne($id);

		// Если такого товара не найдено, редирект на предыдущую страницу
		if ($product === null) {
			$this->redirect(Yii::$app->request->referrer);
		}
		
		if($product->load(Yii::$app->request->post()) && $product->validate()) {
			// Валидация прошла успешно,
			// создаем новую категорию
			$request = Yii::$app->request;
			$product->name = $request->post('Products')['name'];
			$product->category_id = $request
									->post('Products')['category_id'];
			$product->save();

			// Переадресация на главную страницу
			$this->redirect('/');

		} else {
			// либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('update', compact('product'));
		}
	}

	public function actionDelete($id) {

		// Находим по id товар
		$product = Products::findOne($id);

		// Если товар найден
		if ($product !== null) {
			
			// Удаляем товар
			$product->delete();
		}

		// Возвращаемся обратно на страницу управления товарами
		$this->redirect(Yii::$app->request->referrer);
	}
}