<?php
/**
 * Created by PhpStorm.
 * User: a_atahujaev
 * Date: 05.02.2018
 * Time: 11:41
 */

namespace app\widgets;


use yii\base\Widget;

class Alert extends Widget
{
    public function run()
    {
        return $this->render('alert');
    }

}