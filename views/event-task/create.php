<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EventTask */
/* @var $finance app\models\TaskFinance */
/* @var $mahalla \app\models\ref\RefMahalla[] */

$this->title = "Тадбир";
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Чора тадбир'), 'url' => ['/event/view', 'id' => $eventId]];
$this->params['breadcrumbs'][] = 'Қўшиш';
?>
<div class="event-task-create">

    <?= $this->render('_form', [
        'model' => $model,
        'mahalla' => $mahalla,
        'finance' => $finance
    ]) ?>

</div>
