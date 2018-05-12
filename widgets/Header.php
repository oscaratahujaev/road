<?php
/**
 * Created by PhpStorm.
 * User: a_atahujaev
 * Date: 05.02.2018
 * Time: 10:59
 */

namespace app\widgets;


use yii\base\Widget;

class Header extends Widget
{

    public function run()
    {
        return $this->render('header');
    }

}