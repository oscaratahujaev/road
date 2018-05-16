<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BookRecords */

$this->title = Yii::t('yii', 'Update Book Records: ' . $model->id, [
    'nameAttribute' => '' . $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Book Records'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('yii', 'Ўзгартириш');
?>
<div class="book-records-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
