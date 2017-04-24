<?php

namespace frontend\controllers;

class CustomizableViewController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
