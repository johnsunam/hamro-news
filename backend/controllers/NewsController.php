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
        $tags=Tags::find()->all();
        $category=Category::find()->all();
        return $this->render('index',['tags'=>$tags,'category'=>$category]);
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
                $modal->name=$data['data'];

            }
            if($modal->save()){
                return $modal['attributes'];
            }
            
            ;
        }
    }
}