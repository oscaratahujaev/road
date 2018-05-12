<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EventType */

$this->title = Yii::t('yii', 'Create Event Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Event Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
