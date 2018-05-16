<?php

use app\models\ref\RefCategory;
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
        'data' => ArrayHelper::map(RefMahalla::find()->all(),'id','name'),
        'language' => 'de',
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(RefCategory::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'title')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'deadline_type')->textInput() ?>

    <?= $form->field($model, 'deadline_date')->textInput() ?>

    <?= $form->field($model, 'deadline_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'realiz_mechanism')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('yii', 'Сақлаш'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
