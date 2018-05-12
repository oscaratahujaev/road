<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EventSectorDetail */

$this->title = Yii::t('yii', 'Create Event Sector Detail');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Event Sector Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-sector-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
