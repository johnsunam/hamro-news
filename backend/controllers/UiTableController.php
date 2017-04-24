<?php

namespace backend\controllers;

use common\models\UiTable;
use Yii;
class UiTableController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $div=UiTable::find()->all();
        return $this->render('index',['div'=>$div]);
    }
    public function actionUpdate()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $request=Yii::$app->request->post();
        $source=UiTable::findOne($request['source']['id']);
        $target=UiTable::findOne($request['target']['id']);
        $source->parent=$request['source']['parent'];
        $source->position=$request['source']['position'];
        $target->parent=$request['target']['parent'];
        $target->position=$request['target']['position'];
        if($source->save() && $target->save()){
            return 'success';
        }

    }

}
