<?php
/**
 * Created by PhpStorm.
 * User: a_atahujaev
 * Date: 05.02.2018
 * Time: 11:58
 */
use yii\helpers\Url;


?>
<!--    <pre>-->
<!--    --><?php
//    var_dump($links);
//    ?>
<!--</pre>-->
<?php if (!empty($links)): ?>
    <ol class="breadcrumb">
        <li><a href="<?= Url::to(['/']) ?>"><i class="fa fa-dashboard"></i> <?= Yii::t('yii', 'Home') ?></a></li>

        <?php for ($i = 0; $i < sizeof($links) - 1; $i++): ?>
            <li>
                <a href="<?= isset($links[$i]['url']) ? Url::to($links[$i]['url']) : "" ?>"><?= isset($links[$i]['label']) ? $links[$i]['label'] : "" ?></a>
            </li>
        <?php endfor; ?>
        <li class="active"><?= $links[$i] ?></li>
    </ol>
<?php endif; ?>