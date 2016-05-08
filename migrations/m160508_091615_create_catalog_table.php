<?php

use yii\db\Migration;

/**
 * Handles the creation for table `catalog_table`.
 */
class m160508_091615_create_catalog_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('catalog', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'parent_id' => $this->integer()
        ],'CHARSET=utf8');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('catalog');
    }
}
