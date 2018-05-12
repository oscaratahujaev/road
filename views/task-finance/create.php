<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TaskFinance */

$this->title = Yii::t('yii', 'Create Task Finance');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Task Finances'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-finance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
