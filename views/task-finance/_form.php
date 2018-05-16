<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TaskFinance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-finance-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'event_id')->textInput() ?>

    <?= $form->field($model, 'event_task_id')->textInput() ?>

    <?= $form->field($model, 'sum')->textInput() ?>

    <?= $form->field($model, 'sum_unit_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('yii', 'Сақлаш'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
