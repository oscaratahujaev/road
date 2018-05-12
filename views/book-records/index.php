<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\BookRecordsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yii', 'Book Records');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-records-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('yii', 'Create Book Records'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'book_id',
            'date',
            'visit_start',
            'visit_end',
            //'visit_place_owner',
            //'place_address:ntext',
            //'stated_problems:ntext',
            //'identified_problems:ntext',
            //'solution_deadline_start',
            //'solution_deadline_end',
            //'accomplishment:boolean',
            //'reason',
            //'owner_acquainted:boolean',
            //'problem_resolved:boolean',
            //'creator',
            //'created_at',
            //'modifier',
            //'modified_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
