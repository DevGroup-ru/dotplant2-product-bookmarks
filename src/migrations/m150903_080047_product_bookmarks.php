<?php

use DotPlant\ProductBookmarks\models\ProductBookmark;
use yii\db\Migration;

class m150903_080047_product_bookmarks extends Migration
{
    public function up()
    {
        $this->insert(
            '{{%configurable}}',
            [
                'module' => 'product-bookmarks',
                'sort_order' => 99,
                'section_name' => 'Product bookmarks',
                'display_in_config' => 0,
            ]
        );
        $this->createTable(
            ProductBookmark::tableName(),
            [
                'user_id' => $this->integer(),
                'product_id' => $this->integer(),
                'PRIMARY KEY (`user_id`, `product_id`)',
            ]
        );
    }

    public function down()
    {
        $this->delete('{{%configurable}}', ['module' => 'ProductBookmarks']);
        $this->dropTable(ProductBookmark::tableName());
    }
}
