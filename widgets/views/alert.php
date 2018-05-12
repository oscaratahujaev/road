<?php
/**
 * Created by PhpStorm.
 * User: a_atahujaev
 * Date: 05.02.2018
 * Time: 11:41
 */

$flashes = Yii::$app->session->getAllFlashes();
//var_dump($flashes);
?>
<?php if (!empty($flashes)) { ?>
    <div>
        <div>
            <?php foreach ($flashes as $key => $value): ?>

                <div class="alert alert-<?= $key ?> alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php if ($key == 'info') { ?>
                        <i class="icon fa fa-info"></i>
                    <?php } elseif ($key == 'danger') { ?>
                        <i class="icon fa fa-ban"></i>
                    <?php } elseif ($key == 'success') { ?>
                        <i class="icon fa fa-check"></i>
                    <?php } else { ?>
                        <i class="icon fa fa-warning"></i>
                    <?php } ?>

                    <?= $value ?>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
<?php } ?>