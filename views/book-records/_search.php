<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\BookRecordsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-records-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'book_id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'visit_start') ?>

    <?= $form->field($model, 'visit_end') ?>

    <?php // echo $form->field($model, 'visit_place_owner') ?>

    <?php // echo $form->field($model, 'place_address') ?>

    <?php // echo $form->field($model, 'stated_problems') ?>

    <?php // echo $form->field($model, 'identified_problems') ?>

    <?php // echo $form->field($model, 'solution_deadline_start') ?>

    <?php // echo $form->field($model, 'solution_deadline_end') ?>

    <?php // echo $form->field($model, 'accomplishment')->checkbox() ?>

    <?php // echo $form->field($model, 'reason') ?>

    <?php // echo $form->field($model, 'owner_acquainted')->checkbox() ?>

    <?php // echo $form->field($model, 'problem_resolved')->checkbox() ?>

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
