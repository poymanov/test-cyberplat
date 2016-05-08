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
}