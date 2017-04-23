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

    //getting news for today
    public function news(){
        $starTime=date("Y-m-d"). ' 00:00:00';
        $endTime=date("Y-m-d"). ' 23:59:59';
        $news=News::find()->Where(['between','createdAt',$starTime,$endTime])->all();
        return $news;
    }

    public function getTags($id){
        $model=News::findOne($id);
        return $model->tags;
    }

    public function category(){
        $categories=Category::find()->all();
        $category=array();
        foreach($categories as $cat){
            $category[$cat->id]=$cat->name;
        }
        return $category;
    }

    public function saveTags($tags,$id){
        foreach ($tags as $tag){
            $newsTag=new NewsTag();
            $newsTag->news_id=$id;
            $newsTag->tag_id=$tag;
            $newsTag->save();
        }
    }

    public function actionIndex(){

        $tags=Tags::find()->all();
        $news=$this->news();
        $model=new News();
        $category=$this->category();
        if($model->load(Yii::$app->request->post())){

            $model->image=UploadedFile::getInstance($model,'image');
             if($model->upload() && $model->save()){
                $id=$model->id;

                $tags=(Yii::$app->request->post()['tags']);
                 $this->saveTags($tags,$id);
                 return $this->redirect(Url::toRoute('/news/index'));
             }
             else{
                 return print_r($model->errors);
             }

        }
        else {
            $newstags=array();
            return $this->render('index', ['newstags'=>$newstags,'tags' => $tags, 'category' => $category, 'model' => $model ,'news'=>$news]);
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
    public function actionDelete($id){
        $model=News::findOne($id);
        if($model->delete()){
            $this->redirect(Url::toRoute('/news/index'));
        }
    }

    public function actionUpdate($id){
        $model=News::findOne($id);
        $tags=Tags::find()->all();
        $news=$this->news();
        $category=$this->category();
        $newstags=$this->newsTags($id);
        if($model->load(Yii::$app->request->post()) && $model->save()){
            NewsTag::deleteAll(['news_id'=>$id]);
            $newtags=(Yii::$app->request->post()['tags']);
            $this->saveTags($newtags,$id);
            return $this->redirect(Url::toRoute('/news/index'));
        }
        return $this->render('index', ['newstags'=>$newstags,'tags' => $tags, 'category' => $category, 'model' => $model ,'news'=>$news]);


    }
    public function newsTags($id){
        $newsTags=NewsTag::find()->select(['tag_id'])->where(['news_id'=>$id])->all();
        $tags=array();
        foreach ($newsTags as $tag){
            array_push($tags,$tag['tag_id']);
        }
        return $tags;


    }

}