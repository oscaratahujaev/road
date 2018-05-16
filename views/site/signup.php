<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Рўйхатдан ўтиш';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">

    <div class="row">
        <div class="login-box-body">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'region')->dropDownList(['1726' => 'Тошкент шахри']) ?>

            <?= $form->field($model, 'district')->dropDownList(['1726269' => 'Мирзо Улуғбек тумани']) ?>

            <?= $form->field($model, 'lastname')->textInput() ?>

            <?= $form->field($model, 'firstname')->textInput() ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'repeatPassword')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Рўйхатдан ўтиш', ['class' => 'btn btn-primary btn-block', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

