<?php
/**
 * Created by PhpStorm.
 * User: a_atahujaev
 * Date: 05.02.2018
 * Time: 11:02
 */
use app\widgets\Nav;
use yii\helpers\Url;

$controller = Yii::$app->controller;
$path = "/";

$path .= $controller->module->id == "app-frontend" ? "" : $controller->module->id . "/";
$path .= $controller->id . "/";
$path .= $controller->action->id;

?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Url::to('/img/user.png') ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <?php if (!Yii::$app->user->isGuest):?>
                    <p><?= Yii::$app->user->identity->fullname ?></p>
                    <?php else:?>
                    <p>Гость</p>
                <?php endif;?>
                <a href="#"><i class="fa fa-circle text-success"></i> Онлайн</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <!--            <div class="input-group">-->
            <!--                <input type="text" name="q" class="form-control" placeholder="Поиск...">-->
            <!--                <span class="input-group-btn">-->
            <!--                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>-->
            <!--                </button>-->
            <!--              </span>-->
            <!--            </div>-->
        </form>

        <ul class="sidebar-menu" data-widget="tree">

            <?php

            ?>
            <?php foreach ($navTreeItems as $item) { ?>
                <?php $isActive = $path == $item['url'][0] ? "active" : ""; ?>
                <?php if (empty($item['items'])) { ?>
                    <li class="<?= $isActive ?>">
                        <a href="<?= Url::to($item['url']) ?>">
                            <i class="fa fa-<?= !empty($item['icon']) ? $item['icon'] : "circle-o" ?>"></i>
                            <span><?= Yii::t('yii', $item['label']) ?></span>
                        </a>
                    </li>
                <?php } else { ?>
                    <?php foreach ($item['items'] as $child) { ?>
                        <?php
                        $isActive = "";
                        if ($path == $child['url'][0]) {
                            $isActive = 'active';
                            break;
                        } ?>
                    <?php } ?>

                    <li class="treeview <?= $isActive ?>">
                        <a href="#">
                            <i class="fa fa-<?= !empty($item['icon']) ? $item['icon'] : "circle-o" ?>"></i>
                            <span><?= Yii::t('yii', $item['label']) ?></span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <?php foreach ($item['items'] as $child) { ?>
                                <?php $isActive = $path == $child['url'][0] ? "active" : ""; ?>
                                <li class="<?= $isActive ?>"><a href="<?= Url::to($child['url']) ?>">
                                        <i class="fa fa-<?= $child['icon'] == 'NULL' ? "circle-o" : $child['icon'] ?>"></i> <?= Yii::t('yii', $child['label']) ?>
                                    </a></li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>

            <?php } ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
