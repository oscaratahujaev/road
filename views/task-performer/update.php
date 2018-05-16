<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TaskPerformer */

$this->title = Yii::t('yii', 'Update Task Performer: ' . $model->id, [
    'nameAttribute' => '' . $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Task Performers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('yii', 'Ўзгартириш');
?>
<div class="task-performer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
