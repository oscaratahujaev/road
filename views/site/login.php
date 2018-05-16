<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Тизимга кириш';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= \app\widgets\Alert::widget() ?>
<div class="login-box-body">
    <?php $form = ActiveForm::begin(['id' => 'login-form', 'method' => 'post']); ?>

    <div class="form-group has-feedback">
        <?= Html::textInput('LoginForm[username]', '', [
            'autofocus' => true,
            'class' => 'form-control',
            'placeholder' => 'Логин'
        ]) ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>

    <div class="form-group has-feedback">
        <?= Html::passwordInput('LoginForm[password]', '', [
            'autofocus' => true,
            'class' => 'form-control',
            'placeholder' => 'Парол'
        ]) ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>

    <div class="row">
        <div class="col-xs-8">
            <div class="checkbox">
                <label>
                    <?= Html::checkbox('rememberMe', false) ?> Эслаб қолиш
                </label>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
            <?= Html::submitButton('Кириш', ['class' => 'btn btn-primary btn-block btn-flat']) ?>
        </div>
        <!-- /.col -->
    </div>


    <?php ActiveForm::end(); ?>

    <div class="font-small grey-text d-flex justify-content-center"><a
                href="<?= Url::to(['signup']) ?>"
                class="dark-grey-text font-weight-bold ml-1">Рўйхатдан ўтиш</a></div>
</div>
