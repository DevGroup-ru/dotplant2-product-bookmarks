<?php

namespace DotPlant\ProductBookmarks;

class Module extends \app\components\ExtensionModule
{
    public static $moduleId = 'product-bookmarks';

    public function behaviors()
    {
        return [
            'configurableModule' => [
                'class' => 'app\modules\config\behaviors\ConfigurableModuleBehavior',
                'configurationView' => '@ProductBookmarks/views/configurable/_config',
                'configurableModel' => 'DotPlant\ProductBookmarks\components\ConfigurationModel',
            ]
        ];
    }
}
