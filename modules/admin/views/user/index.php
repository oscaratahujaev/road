<?php

use common\models\ref\RefInsuranceOrgs;
use common\models\ref\RefRegion;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\grid\GridView;
use app\modules\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\searchs\User */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('rbac-admin', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model, $key, $index, $grid) {
            $url = '/admin/user/update?id=' . $model->ID;

            return ['onclick' => "window.location.href='{$url}'",
                'style' => 'cursor:pointer'];
        },
        'pjax' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'username',
            'fullname',
            'email:email',
            [
                'attribute' => 'created_at',
                'value' => function ($model) {
                    return date("d-m-Y H:i", strtotime($model->created_at));
                },
                'filterType' => GridView::FILTER_DATE,

                'filterWidgetOptions' => [
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',
                    ]
                ]
            ],
            [
                'attribute' => 'updated_at',
                'value' => function ($model) {
                    return date("d-m-Y H:i", strtotime($model->updated_at));
                },
                'filterType' => GridView::FILTER_DATE,

                'filterWidgetOptions' => [
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',
                    ]
                ]
            ],

            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return $model->status == 0 ? 'Inactive' : 'Active';
                },
                'filter' => [
                    0 => 'Inactive',
                    10 => 'Active'
                ]
            ],
            [
                'attribute' => 'orgId',
                'value' => function ($model) {
                    return ($model->org) ? $model->org->Name : "";
                },
                'filter' => ArrayHelper::map(RefInsuranceOrgs::find()->all(), 'ID', "Name"),
            ],
            [
                'attribute' => 'region_id',
                'value' => function ($model) {
                    return $model->region ? $model->region->Name : "";
                    //                    return $model->region == 0 ? 'Inactive' : 'Active';
                },
                'filter' => ArrayHelper::map(RefRegion::find()->all(), 'ID', "Name"),
            ],

//            [
//                'class' => 'yii\grid\ActionColumn',
//                'template' => Helper::filterActionColumn(['view', 'update', 'delete']),
//                'headerOptions' => ['style' => 'width:80px'],
//                //                'buttons' => [
//                //                    'activate' => function($url, $model) {
//                //                        if ($model->status == 10) {
//                //                            return '';
//                //                        }
//                //                        $options = [
//                //                            'title' => Yii::t('rbac-admin', 'Activate'),
//                //                            'aria-label' => Yii::t('rbac-admin', 'Activate'),
//                //                            'data-confirm' => Yii::t('rbac-admin', 'Are you sure you want to activate this user?'),
//                //                            'data-method' => 'post',
//                //                            'data-pjax' => '0',
//                //                        ];
//                //                        return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url, $options);
//                //                    }
//                //                    ]
//            ],
        ],
    ]);
    ?>
</div>
