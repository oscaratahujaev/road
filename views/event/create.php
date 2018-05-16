<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = Yii::t('yii', 'Тадбир қўшиш');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Тадбир'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="event-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
