<?php
/**
 * Created by PhpStorm.
 * User: a_atahujaev
 * Date: 05.02.2018
 * Time: 11:57
 */

namespace app\widgets;


use yii\base\Widget;

class Breadcrumbs extends Widget
{
    public $links;

    public function init()
    {

    }

    public function run()
    {
        return $this->render('breadcrumbs',[
            'links' => $this->links
        ]);
    }

}