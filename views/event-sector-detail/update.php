<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EventSectorDetail */

$this->title = Yii::t('yii', 'Update Event Sector Detail: ' . $model->id, [
    'nameAttribute' => '' . $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Event Sector Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('yii', 'Ўзгартириш');
?>
<div class="event-sector-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
