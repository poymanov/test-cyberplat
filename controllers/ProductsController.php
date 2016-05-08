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
}