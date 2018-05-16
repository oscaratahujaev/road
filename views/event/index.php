<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yii', 'Тадбирлар');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="event-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="overflow:hidden;margin-bottom:30px">
        <?= Html::a(Yii::t('yii', 'Тадбир қўшиш <i class="fa fa-plus"></i>'), ['create'], ['class' => 'btn btn-success pull-right']) ?>
    </div>
    <div class="clearfix"></div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => true,
        'hover' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'title',
                'contentOptions' => ['style' => 'white-space: normal;'],
                'headerOptions' => ['class' => 'text-center', 'style' => 'vertical-align:middle;'],
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a(mb_substr($data->title, 0, 150) . "...", ['view', 'id' => $data->id]);
                }
            ],
            //            'realiz_mechanism:ntext',
            //            'result:ntext',
            //            'basis_file',
            //'deadline',
            //'event_type_id',
            //'event_number',
            //'region_id',
            //'district_id',
            //'responsible',
            //'creator',
            //'created_at',
            //'modifier',
            //'modified_at',

            //            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
