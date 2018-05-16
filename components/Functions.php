<?php
namespace app\components;

use app\models\Lang;
use app\models\ref\RefDistrict;
use app\models\ref\RefRegion;
use app\models\ref\RefSector;
use yii\helpers\ArrayHelper;

/**
 * Created by PhpStorm.
 * User: m_toshpolatov
 * Date: 12.05.2018
 * Time: 14:10
 */
class Functions
{
    public static function extractFromJson($key, $value)
    {
        $json = (array)json_decode($value);
        if (isset($json[$key])) {
            return $json[$key];
        } else {
            return $json['uzc'];
        }
    }

    public static function getRegions()
    {
        $regions = ArrayHelper::map(RefRegion::find()->all(), 'id', 'name');
        foreach ($regions as &$region) {
            $region = Functions::extractFromJson(Lang::LANG_UZ, $region);
        }
        return $regions;
    }

    public static function getDistricts($id = null)
    {
        $districts = ArrayHelper::map(RefDistrict::findAll(['region_id' => $id]), 'id', 'name');
        $arr = [];
        foreach ($districts as $key => $value) {
            $arr[] = [
                'id' => $key,
                'name' => Functions::extractFromJson('uzc', $value),
            ];
        }
        return $arr;
    }

    public static function getSector($id)
    {
        $sectors = ArrayHelper::map(RefSector::findAll(['district_id' => $id]), 'id', 'name');
        $arr = [];
        foreach ($sectors as $key => $value) {
            $arr[] = [
                'id' => $key,
                'name' => Functions::extractFromJson('uzc', $value),
            ];
        }
        return $arr;
    }

}