<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


?>
<style>
    .breadcrumb a,li{
        font-family: 'Josefin Sans', sans-serif;
        font-size: 18px;
    }
    h1{
        font-family: 'Lobster Two', cursive;
        font-size: 35px;
    }
    p,label,span{
        font-family: 'Josefin Sans', sans-serif;
        font-size: 18px;
    }
</style>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-md-4">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    <p>If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.</p>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-4">
            <h1 style="text-align: center">Or</h1>
        </div>
        <div class="col-md-4">
            <a href="<?= \yii\helpers\Url::to(['/site/auth','authclient'=>'facebook']) ?>" class="btn btn-block btn-primary">
                <span>Login By Facebook</span>
            </a>
            <a href="<?= \yii\helpers\Url::to(['/site/auth','authclient'=>'google']) ?>" class="btn btn-block btn-primary">
                <span>Login By Google +</span>
            </a>
        </div>
    </div>
</div>
