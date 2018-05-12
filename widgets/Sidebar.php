<?php
/**
 * Created by PhpStorm.
 * User: a_atahujaev
 * Date: 05.02.2018
 * Time: 11:03
 */

namespace app\widgets;


use common\factories\MenuHandlerFactory;
use common\models\UserReports;
use app\modules\admin\models\Menu;
use Yii;
use yii\base\Widget;

class Sidebar extends Widget
{

    public function run()
    {
        $menuModels = Menu::find()->orderBy('`order`')->all();
        $treeItems = self::setTreeMenuItems($menuModels, 'parent');

        return $this->render('sidebar', [
            'navTreeItems' => $treeItems
        ]);
    }

    public static function setTreeMenuItems($arParts, $parentFieldName, $parent_id = null, $childFieldName = 'items')
    {
        $arTree = array();;
        foreach ($arParts as $item) {
            if (is_object($item))
                $item = $item->getAttributes();

            if (Yii::$app->user->can($item['route']) && $item[$parentFieldName] == $parent_id) {
                $icon = !empty($item['image']) ? $item['image'] : 'circle-o';
                $children = self::setTreeMenuItems($arParts, $parentFieldName, $item['id']);
                $itemAr = [
                    'label' => $item['name'],
                    'url' => [$item['route']],
                ];
                if ($parent_id == null || !empty($item['image']))
                    $itemAr['label'] = $item['name'];
                $itemAr['icon'] = $icon;
                if ($children) {
                    $itemAr[$childFieldName] = $children;
                }

                if (!empty($item['data'])) {
                    $menuHandler = MenuHandlerFactory::getInstance($item['data']);
                    if (!empty($menuHandler)) {
                        if (isset($itemAr[$childFieldName])) {
                            $itemAr[$childFieldName] = array_merge($itemAr[$childFieldName], $menuHandler->getChildren($childFieldName));
                        } else {
                            $itemAr[$childFieldName] = $menuHandler->getChildren($childFieldName);
                        }
                    }
                }

                $arTree[] = $itemAr;

            }
        }
        return $arTree;
    }

}