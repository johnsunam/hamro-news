<?php
namespace backend\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Category;
use common\models\Tags;
use common\models\News;
use yii\web\UploadedFile;
use common\models\NewsTag;
class NewsController extends Controller{


    public function actionIndex(){
        $tags=Tags::find()->all();
        $categories=Category::find()->all();
        $model=new News();
        $category=array();
        foreach($categories as $cat){
            $category[$cat->id]=$cat->name;
        }

        if($model->load(Yii::$app->request->post())){
           // return print_r(Yii::$app->request->post()['tags']);
            $model->image=UploadedFile::getInstance($model,'image');
             if($model->upload() && $model->save()){
                $id=$model->id;

                $tags=(Yii::$app->request->post()['tags']);
                foreach ($tags as $tag){
                    $newsTag=new NewsTag();
                    $newsTag->news_id=$id;
                    $newsTag->tag_id=$tag;
                    $newsTag->save();
                }
                 return $this->redirect(Url::toRoute('/news/index'));
             }
             else{
                 return print_r($model->errors);
             }

        }
        else {
            return $this->render('index', ['tags' => $tags, 'category' => $category, 'model' => $model]);
        }

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