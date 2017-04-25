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
         return $request['source'];
        if($this->actionChangedb($request,'source') && $this->actionChangedb($request,'target'))
                return 'success';
    }

    public function actionVisibility(){
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $request=Yii::$app->request->post();
        $hide=UiTable::findOne($request['id']);
        $hide->visibility=="true"?$hide->visibility="false":$hide->visibility="true";
        $hide->save();
    }
    public function actionChangedb($request,$type){


        $data=UiTable::findOne($request[$type]['id']);
        $data->parent=$request[$type]['parent'];
        $data->position=$request[$type]['position'];
        if($data->save()){
            return true;
        }
    }

}
