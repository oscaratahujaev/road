<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EventSectorDetail */

$this->title = $sectorId."-сектор бйича дастурни амалга ошириш бўйича кутилаётган натижалар";
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Чора тадбир'), 'url' => ['/event/view','id'=>$eventId]];
$this->params['breadcrumbs'][] = 'Натижа';
?>
<div class="event-sector-detail-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
