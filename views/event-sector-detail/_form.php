<?php

use app\models\ref\RefUnitMeasure;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EventSectorDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-sector-detail-form">

    <?php $form = ActiveForm::begin([
        'enableClientValidation' => true,
    ]); ?>

    <?= $form->errorSummary($model) ?>

    <div class="col-md-4">
        <?= $form->field($model, 'mahalla_number')->textInput([
            'type' => 'number',
            'required' => true,
        ]) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'repaired_object')->textInput([
            'type' => 'number',
        ]) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'employed')->textInput(['type' => 'number']) ?>
    </div>
    <div class="clearfix"></div>

    <div class="col-md-4">

        <?= Html::label('«Йўл харитаси» доирасида таъмирланадиган ички йўллар') ?><br>
        <?= Html::input('number', 'EventSectorDetail[repaired_road]', $model->repaired_road, [
            'class' => 'form-control',
            'style' => 'width:70%;float:left',
        ]) ?>

        <?= Html::dropDownList('EventSectorDetail[road_unit_id]', $model->road_unit_id,
            ArrayHelper::map(RefUnitMeasure::find()->orderBy('id desc')->all(), 'id', 'name'),
            [
                'class' => 'form-control',
                'style' => 'width:29%',
            ]) ?>
    </div>

    <div class="col-md-8">

        <?= Html::label('«Йўл харитаси»да белгиланган чора-тадбирларни амалга ошириш учун белгиланган молиявий маблағларнинг тахминий ҳажми') ?>
        <br>
        <?= Html::input('number', 'EventSectorDetail[sum]', $model->sum, [
            'class' => 'form-control',
            'style' => 'width:70%;float:left',
        ]) ?>

        <?= Html::dropDownList('EventSectorDetail[sum_unit_id]', $model->sum_unit_id,
            ArrayHelper::map(RefUnitMeasure::find()->all(), 'id', 'name'),
            [
                'class' => 'form-control',
                'style' => 'width:29%',
            ]) ?>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-12" style="margin-top: 20px;">

        <?= Html::submitButton(Yii::t('yii', 'Сақлаш'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
