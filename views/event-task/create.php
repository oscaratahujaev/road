<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EventTask */

$this->title = "Тадбир";
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Чора тадбир'), 'url' => ['/event/view','id'=>$eventId]];
$this->params['breadcrumbs'][] = 'Қўшиш';
?>
<div class="event-task-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
