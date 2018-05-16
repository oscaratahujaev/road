<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EventTask */

$this->title = Yii::t('yii', 'Update Event Task: ' . $model->title, [
    'nameAttribute' => '' . $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Event Tasks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('yii', 'Ўзгартириш');
?>
<div class="event-task-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
