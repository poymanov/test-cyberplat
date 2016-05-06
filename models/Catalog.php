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
}