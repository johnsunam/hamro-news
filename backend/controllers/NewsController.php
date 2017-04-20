<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Category;
use common\models\Tags;
use common\models\News;

class NewsController extends Controller{
    public function actionIndex(){
        return $this->render('index');
    }
    public function actionAjax(){
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if(Yii::$app->request->isAjax){
            $data=Yii::$app->request->post();
            if($data['types']=="category"){
                $modal=new Category();
                $modal->name=$data['data'];
            }
            elseif($data['types']=="tags"){
                $modal=new Tags();
                $modal->tag=$data['data'];
            }
            if($modal->save()){
                return $modal['attributes'];
            }
            
            ;
        }
    }
}