<?php
/**
 * Created by PhpStorm.
 * User: a_atahujaev
 * Date: 21.02.2018
 * Time: 12:21
 */
use common\models\ref\RefDistrict;
use common\models\ref\RefInsuranceOrgs;
use common\models\ref\RefRegion;
use app\modules\admin\components\Configs;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$this->title = $user->fullname;
$this->params['breadcrumbs'][] = [
    'url' => ['/admin/user'],
    'label' => Yii::t('main', 'Users'),
];
$this->params['breadcrumbs'][] = $this->title;

//var_dump($user);
//exit;
?>

<div class="user-index">
    <?php $form = ActiveForm::begin(); ?>


    <div class="col-md-2">
        <?= $form->field($user, 'username')->textInput(['disabled' => true]) ?>
    </div>

    <div class="col-md-3">
        <?= $form->field($user, 'fullname')->textInput(['disabled' => true]) ?>
    </div>

    <div class="col-md-2">
        <?= $form->field($user, 'created_at')->textInput(['disabled' => true]) ?>
    </div>

    <div class="col-md-2">
        <?= $form->field($user, 'updated_at')->textInput(['disabled' => true]) ?>
    </div>


    <div class="col-md-3">
        <?= $form->field($user, 'status')->dropDownList([
            0 => 'Inactive',
            10 => 'Active'
        ]) ?>
    </div>

    <div class="col-md-3">
        <?= $form->field($user, 'lastname')->textInput() ?>
    </div>

    <div class="col-md-3">
        <?= $form->field($user, 'firstname')->textInput() ?>
    </div>


    <div class="col-md-3">
        <?php
        //
        $manager = Configs::authManager();
        $roles = [];
        foreach ($manager->getRoles() as $key => $value) {
            $roles[$key] = $key;
        }
        ?>

        <?= $form->field($role, 'item_name')->dropDownList(['' => ''] + $roles) ?>

    </div>

    <div class="col-md-3">
        <?= $form->field($user, 'email')->textInput() ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($user, 'orgId')->dropDownList(
            ArrayHelper::map(RefInsuranceOrgs::find()->all(), 'ID', 'Name')
        ) ?>

    </div>

    <div class="col-md-4">
        <?= $form->field($user, 'region_id')->dropDownList(['' => ''] + ArrayHelper::map(RefRegion::find()->all(), 'ID', 'Name')) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($user, 'district_id')->dropDownList(['' => ''] + ArrayHelper::map(RefDistrict::find()->all(), 'ID', 'Name')) ?>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-12">

        <?php echo $this->render('_reports', [
            'user' => $user
        ]) ?>

    </div>

    <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton(Yii::t('main', 'Save'), [
                'class' => 'btn btn-primary'
            ])
            ?>
        </div>
    </div>

</div>


<?php ActiveForm::end(); ?>

