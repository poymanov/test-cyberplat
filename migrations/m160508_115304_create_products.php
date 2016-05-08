<?php

use yii\db\Migration;

/**
 * Handles the creation for table `products`.
 */
class m160508_115304_create_products extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'category_id' => $this->integer(),
        ],'CHARSET=utf8');

        // Категория товара - индекс
        $this->createIndex('category_id','products','category_id');

        // Добавляем внешний ключ
        $this->addForeignKey('category_id','products','category_id','catalog','id','CASCADE','CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('products');
    }
}
