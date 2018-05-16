<?php

use kartik\widgets\DatePicker;
use kartik\widgets\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BookRecords */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-records-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'book_id')->textInput() ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'date')->widget(DatePicker::className(), [
                'pluginOptions' => [
                    'format' => 'dd-M-yyyy',
                    'todayHighlight' => true
                ],
            ])->label('Уйма-уй юриш ўтказилган сана') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'visit_start')->widget(DateTimePicker::className(),
                [
                    'options' => ['placeholder' => 'Select operating time ...'],
                    'convertFormat' => true,
                    'pluginOptions' => [
                        'format' => 'd-M-Y g:i A',
                        'startDate' => '01-Mar-2014 12:00 AM',
                        'todayHighlight' => true
                    ]
                ]
            )->label("Уйма-уй юришнинг аниқ давом этган вақти соат «... : ...» дан") ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'visit_end')->widget(DateTimePicker::className(), [
                'options' => ['placeholder' => 'Select operating time ...'],
                'convertFormat' => true,
                'pluginOptions' => [
                    'format' => 'd-M-Y g:i A',
                    'startDate' => '01-Mar-2014 12:00 AM',
                    'todayHighlight' => true
                ]
            ])->label("Уйма-уй юришнинг аниқ давом этган вақти «... : ...» гача") ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'visit_place_owner')->textInput(['maxlength' => true])->label("Юриш ўтказилган уй хўжалиги эгаси") ?>
        </div>
        <div class="col-md-8">
            <?= $form->field($model, 'place_address')->textarea(['rows' => 1])->label("Юриш ўтказилган уй хўжалиги эгасининг тўлиқ манзили") ?>
        </div>
    </div>

    <?= $form->field($model, 'stated_problems')->textarea(['rows' => 4])->label("Юриш ўтказилган уй хўжалиги эгаси томонидан кўтарилган муаммолар") ?>

    <?= $form->field($model, 'identified_problems')->textarea(['rows' => 4])->label("Юриш ўтказилганда Сектор раҳбари томонидан аниқланган муаммолар") ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'solution_deadline_start')->widget(DatePicker::className(), [
                'pluginOptions' => [
                    'format' => 'dd-M-yyyy',
                    'todayHighlight' => true
                ],
            ])->label("Аниқланган муаммоларни бартараф этиш бўйича чоралар ва уларни бажариш муддати бошланиш санаси") ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'solution_deadline_end')->widget(DatePicker::className(), [
                'pluginOptions' => [
                    'format' => 'dd-M-yyyy',
                    'todayHighlight' => true
                ],
            ])->label("Аниқланган муаммоларни бартараф этиш бўйича чоралар ва уларни бажариш муддати тугаш санаси"); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'accomplishment')->checkbox(['label' => "Аниқланган муаммоларни бартараф этиш бўйича чоралар бажарилиши"]) ?>
        </div>
        <div class="col-md-12">
            <?= $form->field($model, 'reason')->textarea(['maxlength' => true])->label("Изоҳ") ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'owner_acquainted')->checkbox(["label" => "Уй хўжалиги эгасининг муаммоларни бартараф этиш бўйича чоралар билан танишиб чиққанлиги тасдиғи"]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'problem_resolved')->checkbox(["label" => "Уй хўжалиги эгаси томонидан муаммолар бартараф этилганлиги тасдиғи"]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('yii', 'Сақлаш'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
