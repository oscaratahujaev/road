<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = 'Тадбир: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('yii', 'Ўзгартириш');
?>
<div class="event-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
