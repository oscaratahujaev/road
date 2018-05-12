<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-box-body">
    <?php $form = ActiveForm::begin(['id' => 'login-form', 'method' => 'post']); ?>

    <div class="form-group has-feedback">
        <?= Html::textInput('LoginForm[username]', '', [
            'autofocus' => true,
            'class' => 'form-control',
            'placeholder' => 'username'
        ]) ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>

    <div class="form-group has-feedback">
        <?= Html::passwordInput('LoginForm[password]', '', [
            'autofocus' => true,
            'class' => 'form-control',
            'placeholder' => 'password'
        ]) ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>

    <div class="row">
        <div class="col-xs-8">
            <div class="checkbox">
                <label>
                    <?= Html::checkbox('rememberMe', false) ?> Remember Me
                </label>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
            <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary btn-block btn-flat']) ?>
        </div>
        <!-- /.col -->
    </div>


    <?php ActiveForm::end(); ?>

    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>

</div>
