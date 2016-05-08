<?php

namespace app\models;

use yii\db\ActiveRecord;

class Catalog extends ActiveRecord
{
    public function rules()
    {
        return [
            [['name'], 'required']            
        ];
    }

    public function getCategoryName() {
    	// Получаем имя родительской категории по её id

    	// Если не указан id родительской категории возвращаем пустое значение
    	if($this->parent_id) {

    		$parent = Catalog::findOne($this->parent_id);

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