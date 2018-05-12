<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\EventSectorDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-sector-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'event_id') ?>

    <?= $form->field($model, 'sector_id') ?>

    <?= $form->field($model, 'mahalla_number') ?>

    <?= $form->field($model, 'sum') ?>

    <?php // echo $form->field($model, 'sum_unit_id') ?>

    <?php // echo $form->field($model, 'repaired_object') ?>

    <?php // echo $form->field($model, 'repaired_road') ?>

    <?php // echo $form->field($model, 'road_unit_id') ?>

    <?php // echo $form->field($model, 'employed') ?>

    <?php // echo $form->field($model, 'creator') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'modifier') ?>

    <?php // echo $form->field($model, 'modified_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('yii', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('yii', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
