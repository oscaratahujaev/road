<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TaskPerformer */

$this->title = Yii::t('yii', 'Create Task Performer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Task Performers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-performer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
