<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\BookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'region_id') ?>

    <?= $form->field($model, 'district_id') ?>

    <?= $form->field($model, 'sector_id') ?>

    <?= $form->field($model, 'sector_head') ?>

    <?php // echo $form->field($model, 'head_position') ?>

    <?php // echo $form->field($model, 'head_workplace') ?>

    <?php // echo $form->field($model, 'head_address') ?>

    <?php // echo $form->field($model, 'decision_number') ?>

    <?php // echo $form->field($model, 'decision_date') ?>

    <?php // echo $form->field($model, 'governor_head') ?>

    <?php // echo $form->field($model, 'prosecutor_head') ?>

    <?php // echo $form->field($model, 'affair_head') ?>

    <?php // echo $form->field($model, 'tax_head') ?>

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
