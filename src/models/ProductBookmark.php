<?php

namespace DotPlant\ProductBookmarks\models;

use Yii;

/**
 * This is the model class for table "{{%product_bookmark}}".
 *
 * @property integer $product_id
 * @property integer $user_id
 */
class ProductBookmark extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_bookmark}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'user_id'], 'required'],
            [['product_id', 'user_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => Yii::t('app', 'Product ID'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }
}
