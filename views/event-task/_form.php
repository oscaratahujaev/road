<?php

use app\models\ref\RefCategory;
use app\models\ref\RefMahalla;
use app\models\ref\RefOrganization;
use app\models\ref\RefPlaceType;
use app\models\ref\RefSector;
use app\models\ref\RefUnitMeasure;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EventTask */
/* @var $form yii\widgets\ActiveForm */
/* @var $finance \app\models\TaskFinance */
/* @var $performer \app\models\TaskPerformer */


$this->registerJsFile('/js/angular.min.js', [
    'position' => \yii\web\View::POS_END
]);
$this->registerJsFile('/js/task-ang.js', [
    'position' => \yii\web\View::POS_END
]);

?>

<div class="event-task-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-7 col-lg-7">
        <?= $form->field($model, 'title')->textInput(['rows' => 6]) ?>
        <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(RefCategory::find()->all(), 'id', 'name')) ?>


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
    </div>


    <div class="col-md-5 col-lg-5">
        <?= $form->field($model, 'mahalla')->widget(Select2::classname(), [
            'data' => $mahalla,
            'options' => ['placeholder' => 'Махаллалар'],
            'pluginOptions' => [
                'multiple' => true,
                'allowClear' => true
            ],
        ]); ?>
        <?= $form->field($model, 'realiz_mechanism')->textarea(['rows' => 4]) ?>
    </div>

    <div class="clearfix"></div>


    <div class="col-md-8">
        <h4 class="text-center"><?= Html::label('Тахминий харажатлар') ?></h4>

        <table class="table" id="finance-table">
            <tr>
                <td width="220px" class="text-center"><?= Html::label('Сумма') ?><br></td>
                <td width="140px" class="text-center"></td>
                <td class="text-center"><?= Html::label('Молиялаштириш манбаи') ?><br></td>
                <td class="text-center">
                    <button class="btn btn-success add-button" type="button" ng-click="addFinance()"><i
                                class="fa fa-plus"></i></button>
                </td>
            </tr>

            <tr class="finance" ng-repeat="finance in financeArr">
                <td><?= Html::input('number', 'TaskFinance[sum][]', $finance->sum, [
                        'class' => 'form-control',
                        'required' => true,
                    ]) ?></td>
                <td><?= Html::dropDownList('TaskFinance[sum_unit_id][]', $finance->sum_unit_id,
                        ArrayHelper::map(RefUnitMeasure::find()->all(), 'id', 'name'),
                        [
                            'class' => 'form-control',
                            'required' => true,
                        ]) ?></td>
                <td><?= Html::input('text', 'TaskFinance[source][]', $finance->source, [
                        'class' => 'form-control',
                        'required' => true,
                    ]) ?></td>
                <td>
                    <button class="btn btn-danger remove-button" type="button" ng-click="removeFinance($index)">
                        <i class="fa fa-trash"></i></button>
                </td>
            </tr>
        </table>

    </div>
    <div class="clearfix"></div>



    <div class="col-md-8" >
        <h4 class="text-center"><?= Html::label('Масъул ижрочилар') ?></h4>

        <table class="table" id="finance-table">
            <tr>
                <td width="140px"></td>
                <td class="text-center"><?= Html::label('Ташкилот') ?><br></td>
                <td class="text-center"><?= Html::label('Ташкилот ходими') ?><br></td>
                <td>
                    <button class="btn btn-success add-button" type="button" ng-click="addPerformer()"><i
                                class="fa fa-plus"></i></button>
                </td>
            </tr>

            <tr class="finance" ng-repeat="performer in performerArr">
                <td>
                    <input type="hidden" value="{{$index+1}}" name="TaskPerformer[sortorder][]">
                    <?= Html::dropDownList('TaskPerformer[place_type][]', '',
                        ArrayHelper::map(RefPlaceType::find()->all(), 'id', 'name'),
                        [
                            'class' => 'form-control',
                            'required' => true
                        ]) ?>
                </td>
                <td><?= Html::dropDownList('TaskPerformer[organization_id][]', '',
                        ArrayHelper::map(RefOrganization::find()->all(), 'id', 'name'),
                        [
                            'class' => 'form-control',
                            'required' => true
                        ]) ?>
                </td>
                <td><?= Html::input('text', 'TaskPerformer[fullname][]', '',
                        [
                            'class' => 'form-control',
                            'required' => true
                        ]) ?>
                </td>
                <td>
                    <button class="btn btn-danger remove-button" type="button" ng-click="removePerformer($index)">
                        <i class="fa fa-trash"></i></button>
                </td>
            </tr>
        </table>
    </div>

    <div class="clearfix"></div>

    <div class="form-group col-md-12">
        <?= Html::submitButton(Yii::t('yii', 'Сақлаш'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
