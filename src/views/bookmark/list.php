<?php

/**
 * @var $products \app\modules\shop\models\Product[]
 * @var $this \yii\web\View
 */

use yii\helpers\Url;

?>
<h1><?= Yii::t('app', 'Product bookmarks') ?></h1>
<ul>
<?php foreach ($products as $product): ?>
    <?= $this->render('item', ['product' => $product, 'url' => Url::toRoute(['@product', 'model' => $product])]) ?>
<?php endforeach; ?>
</ul>
<?php

$js = <<<JS
$(".product-item .product-image,.product-item .product-announce").click(function() {
    var that = $(this),
        parent = null;
    if (that.hasClass('product-image')) {
        parent = that.parent();
    } else {
        parent = that.parent().parent();
    }

    document.location = parent.find('a.product-name').attr('href');
    return false;
});
JS;
$this->registerJs($js, \app\components\WebView::POS_READY, 'product-item-click');
