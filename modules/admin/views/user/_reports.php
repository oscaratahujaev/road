<?php
/**
 * Created by PhpStorm.
 * User: a_atahujaev
 * Date: 22.02.2018
 * Time: 12:03
 */

use common\models\ref\RefRegion;
use common\models\Reports;
use kartik\base\AnimateAsset;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\YiiAsset;

AnimateAsset::register($this);
YiiAsset::register($this);

$opts = Json::htmlEncode([
    'routes' => Reports::getList($user->id),
]);
$this->registerJs("var _opts = {$opts};");
$this->registerJs("var user_id = {$user->id};");
$this->registerJs($this->render('_script.js'));
$animateIcon = ' <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></i>';
?>

<h1><?= Html::encode(Yii::t('main', 'Reports')); ?></h1>

<div class="row">
    <div class="col-sm-5">
        <select multiple size="20" class="form-control list" data-target="available"></select>
    </div>

    <div class="col-sm-1">
        <br><br>
        <?= Html::a('&gt;&gt;' . $animateIcon, ['assign'], [
            'class' => 'btn btn-success btn-assign',
            'data-target' => 'available',
            'title' => Yii::t('rbac-admin', 'Assign'),
        ]); ?><br><br>
        <?= Html::a('&lt;&lt;' . $animateIcon, ['remove'], [
            'class' => 'btn btn-danger btn-assign',
            'data-target' => 'assigned',
            'title' => Yii::t('rbac-admin', 'Remove'),
        ]); ?>
    </div>

    <div class="col-sm-5">
        <select multiple size="20" class="form-control list" data-target="assigned"></select>
    </div>
</div>

<p></p>