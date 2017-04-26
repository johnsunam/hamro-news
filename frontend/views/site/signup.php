<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


//$this->title = 'Signup';
//$this->params['breadcrumbs'][] = $this->title;
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

<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row ">
        <div class="col-md-4">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-block btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-4">
            <h1 style="text-align: center">Or</h1>
        </div>
        <div class="col-md-4">
            <a href="<?= \yii\helpers\Url::to(['/site/auth','authclient'=>'facebook']) ?>" class="btn btn-block btn-primary">
                <span>Sign Up By Facebook</span>
            </a>
            <a href="<?= \yii\helpers\Url::to(['/site/auth','authclient'=>'google']) ?>" class="btn btn-block btn-primary">
                <span>Sign Up By Google +</span>
            </a>

        </div>

    </div>
</div>
