<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'region_id')->textInput() ?>

    <?= $form->field($model, 'district_id')->textInput() ?>

    <?= $form->field($model, 'sector_id')->textInput() ?>

    <?= $form->field($model, 'sector_head')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'head_position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'head_workplace')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'head_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'decision_number')->textInput() ?>

    <?= $form->field($model, 'decision_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'governor_head')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prosecutor_head')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'affair_head')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tax_head')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'creator')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'modifier')->textInput() ?>

    <?= $form->field($model, 'modified_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('yii', 'Сақлаш'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
