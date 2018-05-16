<?php

use app\components\Functions;
use kartik\widgets\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$regions = Functions::getRegions();
$districts = Functions::getDistricts();
$sector = [];
?>


<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'region_id')->dropDownList($regions, [
                'prompt' => 'Вилоятни танланг',
            ])->label('Вилоят') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'district_id')->dropDownList($districts, [
                'prompt' => 'Туманни танланг',
            ])->label('Туман') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'sector_id')->dropDownList($sector, [
                'prompt' => 'Секторни танланг'
            ])->label('Сектор') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'sector_head')->textInput(['maxlength' => true])->label('Cектор бошлиги') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'head_position')->textInput(['maxlength' => true])->label('Бошлигнинг лавозими') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'head_workplace')->textInput(['maxlength' => true])->label('Бошлигнинг иш жойи') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'head_address')->textarea()->label('Бошлигнинг манзили') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'decision_number')->input('number')->label('Карор номери') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'decision_date')->widget(DatePicker::className(), [
                'pluginOptions' => [
                    'format' => 'dd-M-yyyy',
                    'todayHighlight' => true
                ]
            ])->label('Карор санаси'); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'governor_head')->textInput(['maxlength' => true])->label('Туман (шаҳар) ҳокими') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'prosecutor_head')->textInput(['maxlength' => true])->label('Туман (шаҳар) прокурори') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'affair_head')->textInput(['maxlength' => true])->label('Туман (шаҳар) Ички ишлар бошқармаси бошлиғи') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'tax_head')->textInput(['maxlength' => true])->label('Туман (шаҳар) Давлат солиқ инспекцияси бошлиғи') ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('yii', 'Сақлаш'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
