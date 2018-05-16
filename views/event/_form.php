<?php

use app\models\EventType;
use app\models\ref\RefDeadlineType;
use kartik\file\FileInput;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row event-form">

    <?php $form = ActiveForm::begin([
        'enableClientValidation' => true,
    ]); ?>

    <?= $form->errorSummary($model) ?>

    <div class="col-md-8">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'realiz_mechanism')->textarea(['rows' => 4]) ?>

        <?= $form->field($model, 'event_type_id')->dropDownList(\yii\helpers\ArrayHelper::map(EventType::find()->all(), 'id', 'name')) ?>


        <?= $form->field($model, 'deadline_type')->dropDownList(
            ArrayHelper::map(RefDeadlineType::find()->all(), 'id', 'name'),
            [
                'id' => 'deadline-type'
            ]) ?>

        <div class="hidden" id="deadline">
            <?= $form->field($model, 'deadline')->widget(DatePicker::classname(), [
                'options' => [
                    'placeholder' => 'Санани танланг',
                ],
                'pluginOptions' => [
                    'autoclose' => true
                ]
            ])->label(false) ?>
        </div>

        <?php $district = \app\models\ref\RefDistrict::findOne(Yii::$app->user->identity->detail->district_id) ?>
        <?= $form->field($model, 'responsible')->textInput(
            [
                'maxlength' => true,
                'readonly' => $district->ceo_full_name ? true : false,
                'value' => $district->ceo_full_name,
            ]) ?>
    </div>

    <div class="col-md-4">


        <?= $form->field($model, 'basis_file')->widget(FileInput::classname(), [
        ]); ?>

    </div>

    <div class="form-group col-md-12">
        <?= Html::submitButton(Yii::t('yii', 'Сақлаш'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
