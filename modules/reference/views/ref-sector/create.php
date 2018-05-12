<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ref\RefSector */

$this->title = Yii::t('yii', 'Create Ref Sector');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Ref Sectors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-sector-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
