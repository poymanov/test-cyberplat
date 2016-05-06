<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Catalog;

class CatalogController extends Controller
{	

	public function actionDetail($id) {

		$category = Catalog::findOne($id);

		$subcategories = Catalog::find()
						->where(['parent_id' => $id])
						->all();

		return $this->render('detail',compact('category','subcategories'));
	}
}