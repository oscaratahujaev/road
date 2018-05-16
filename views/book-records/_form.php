<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BookRecords */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-records-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'book_id')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'visit_start')->textInput() ?>

    <?= $form->field($model, 'visit_end')->textInput() ?>

    <?= $form->field($model, 'visit_place_owner')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'place_address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'stated_problems')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'identified_problems')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'solution_deadline_start')->textInput() ?>

    <?= $form->field($model, 'solution_deadline_end')->textInput() ?>

    <?= $form->field($model, 'accomplishment')->checkbox() ?>

    <?= $form->field($model, 'reason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'owner_acquainted')->checkbox() ?>

    <?= $form->field($model, 'problem_resolved')->checkbox() ?>

    <?= $form->field($model, 'creator')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'modifier')->textInput() ?>

    <?= $form->field($model, 'modified_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('yii', 'Сақлаш'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
