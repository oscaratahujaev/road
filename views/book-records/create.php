<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BookRecords */

$this->title = Yii::t('yii', 'Create Book Records');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Book Records'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-records-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
