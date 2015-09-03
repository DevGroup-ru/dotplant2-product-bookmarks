<?php

/**
 * @var $product \app\modules\shop\models\Product
 * @var $this \app\components\WebView
 * @var $url string
 */

use app\modules\image\widgets\ObjectImageWidget;
use kartik\helpers\Html;
use yii\helpers\Url;

?>
<div class="col-md-6 col-lg-4 col-sm-6 col-xs-12">
    <div class="product-item">

        <div class="product-image">
            <?=
            ObjectImageWidget::widget(
                [
                    'limit' => 1,
                    'model' => $product,
                ]
            )
            ?>
        </div>
        <div class="product">
            <a href="<?=$url?>" class="product-name">
                <?= Html::encode($product->name) ?>
            </a>
            <div class="product-price">
                <?=$product->formattedPrice(null, false, false)?>
            </div>
        </div>
        <div class="product-info">
            <div class="product-announce">
                <?=$product->announce?>
            </div>
            <div class="cta">
                <a class="btn btn-info" href="<?= Url::toRoute(['/product-bookmarks/bookmark/delete', 'id' => $product->id, 'returnUrl' => Url::toRoute(['/product-bookmarks/bookmark/list'])]) ?>">
                    <?= Yii::t('app', 'Remove') ?>
                </a>
            </div>
        </div>
    </div>
</div>
