<?php

namespace DotPlant\ProductBookmarks\controllers;

use app\modules\shop\models\Product;
use DotPlant\ProductBookmarks\models\ProductBookmark;
use Yii;

class BookmarkController extends \app\components\Controller
{
    public function actionAdd($id, $returnUrl = null)
    {
        if (Yii::$app->user->isGuest) {
            $idsList = Yii::$app->session->get('productBookmarks', []);
            if (!in_array($id, $idsList)) {
                $idsList[] = $id;
                Yii::$app->session->set('productBookmarks', $idsList);
            }
        } else {
            $idsList = ProductBookmark::find()
                ->select(['product_id'])
                ->where(['user_id' => Yii::$app->user->id])
                ->asArray(true)
                ->column();
            if (!in_array($id, $idsList)) {
                $pb = new ProductBookmark;
                $pb->attributes = [
                    'product_id' => $id,
                    'user_id' => Yii::$app->user->id,
                ];
                $pb->save();
            }
        }
        return $this->redirect($returnUrl !== null ? $returnUrl : Yii::$app->request->referrer);
    }

    public function actionDelete($id, $returnUrl = null)
    {
        if (Yii::$app->user->isGuest) {
            $idsList = Yii::$app->session->get('productBookmarks', []);
            $key = array_search($id, $idsList);
            if ($key !== false) {
                unset($idsList[$key]);
                Yii::$app->session->set('productBookmarks', $idsList);
            }
        } else {
            ProductBookmark::deleteAll(['product_id' => $id, 'user_id' => Yii::$app->user->id]);
        }
        return $this->redirect($returnUrl !== null ? $returnUrl : Yii::$app->request->referrer);
    }

    public function actionList()
    {
        if (Yii::$app->user->isGuest) {
            $idsList = Yii::$app->session->get('productBookmarks', []);
        } else {
            $idsList = ProductBookmark::find()
                ->select(['product_id'])
                ->where(['user_id' => Yii::$app->user->id])
                ->asArray(true)
                ->column();
        }
        return $this->render('list', ['products' => Product::findAll($idsList)]);
    }
}
