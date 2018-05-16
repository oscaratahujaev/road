<?php

use app\models\ref\RefCategory;
use app\models\ref\RefMahalla;
use app\models\ref\RefSector;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EventTask */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="event-task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mahalla')->widget(Select2::classname(), [
        'data' => $mahalla,
        'options' => ['placeholder' => 'Махаллалар'],
        'pluginOptions' => [
            'multiple' => true,
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(RefCategory::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'title')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'deadline_type')->dropDownList(
        ArrayHelper::map(\app\models\ref\RefDeadlineType::find()->all(), 'id', 'name'),
        [
            'id' => 'deadline-type'
        ]
    ) ?>

    <div id="deadline" class="hidden">
        <?= $form->field($model, 'deadline_date')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Санани танланг'],
            'pluginOptions' => [
                'format' => 'dd.mm.yyyy',
                'autoclose' => true
            ]
        ]) ?>
    </div>

    <div id="deadline-text" class="hidden">
        <?= $form->field($model, 'deadline_text')->textInput([
            'placeholder' => 'Саналарни ёзинг'
        ]) ?>
    </div>


    <?= $form->field($model, 'realiz_mechanism')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('yii', 'Сақлаш'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
