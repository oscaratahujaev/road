<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ref\RefRegion */

$this->title = Yii::t('yii', 'Create Ref Region');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Ref Regions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-region-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
