<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BookRecords */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Book Records'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-records-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('yii', 'Ўзгартириш'), ['Ўзгартириш', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('yii', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'book_id',
            'date',
            'visit_start',
            'visit_end',
            'visit_place_owner',
            'place_address:ntext',
            'stated_problems:ntext',
            'identified_problems:ntext',
            'solution_deadline_start',
            'solution_deadline_end',
            'accomplishment:boolean',
            'reason',
            'owner_acquainted:boolean',
            'problem_resolved:boolean',
            'creator',
            'created_at',
            'modifier',
            'modified_at',
        ],
    ]) ?>

</div>
