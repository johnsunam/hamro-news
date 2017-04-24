<?php

namespace frontend\controllers;

use yii\web\Controller;

class CustomizableViewController extends Controller
{
    public function actionIndex()
    {
        return $this->render('_main');
    }
}