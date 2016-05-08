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
}