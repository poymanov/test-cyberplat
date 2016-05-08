<?php

namespace app\models;

use yii\db\ActiveRecord;

class Products extends ActiveRecord
{
	public function rules()
    {
        return [
            [['name'], 'required']            
        ];
    }

    public function getCategoryName() {
    	// Получаем имя родительской категории по id товара

    	$category_id = $this->category_id;
    	// Если не указан id родительской категории возвращаем пустое значение
    	if($category_id) {

    		$parent = Catalog::findOne($category_id);

    		if ($parent === null) {
    			// Если не нашли родительской категории с таким id, 
    			// возвращаем пустое значение
            	return "";
        	} else {
        		// Иначе возвращаем имя родительской категории
        		return $parent->name;
        	}

    	} else {
    		return "";
    	}
    	
    }
}