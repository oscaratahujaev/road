<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EventSectorDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-sector-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'event_id')->textInput() ?>

    <?= $form->field($model, 'sector_id')->textInput() ?>

    <?= $form->field($model, 'mahalla_number')->textInput() ?>

    <?= $form->field($model, 'sum')->textInput() ?>

    <?= $form->field($model, 'sum_unit_id')->textInput() ?>

    <?= $form->field($model, 'repaired_object')->textInput() ?>

    <?= $form->field($model, 'repaired_road')->textInput() ?>

    <?= $form->field($model, 'road_unit_id')->textInput() ?>

    <?= $form->field($model, 'employed')->textInput() ?>

    <?= $form->field($model, 'creator')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'modifier')->textInput() ?>

    <?= $form->field($model, 'modified_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('yii', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
