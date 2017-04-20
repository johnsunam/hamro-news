<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<style>
    .caption{
        position: absolute;
        bottom: 4px;
        right: 4px;
        left: 4px;
        background-color: rgba(0,0,0,0.6);
    }
    .caption h3{
        margin-top: 3px;
        margin-bottom: 3px;
        color: white;
        font-size: 17px;
        font-style: italic;
        font-family: fantasy;
    }
    h2{
        font-family: 'Lobster Two', cursive;
        font-size: 50px;
        font-style: italic;
    }
    .achorText{
        padding:0px 15px 0px 0px;
        color: black
    }
    .achorText:hover{
        color: blue;
    }
    .myImageZoom:hover{
        /*-moz-transform: scale(1.3);*/
        /*-webkit-transform: scale(1.3);*/
        transform: scale(1.25);
    }
    h5{
        font-family: 'Lobster Two', cursive;
        font-size: 35px;
        padding-left: 10px;
    }
    p{
        font-family: 'Josefin Sans', sans-serif;
        padding: 10px;
        font-size: 20px;
        text-align: justify;
    }
</style>
<div class="site-index">
    <h2>Top Stories of the day:</h2>
    <div class="row">
        <div class="col-md-8" style="padding-right: 7px">
            <div class="thumbnail" style="position: relative; margin-bottom: 3px">
                <a href="<?= \yii\helpers\Url::to(['/site/show-news','id'=>$news[0]->id]) ?>">
                    <img style="height: 514px;" class="img-responsive" src="<?= \yii\helpers\Url::toRoute('/images/'.$news[0]->image) ?>" alt="first">
                    <div class="caption">
                        <h3><?= $news[0]->title ?></h3>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="thumbnail" style="position: relative; margin-bottom: 7px">
                    <a href="<?= \yii\helpers\Url::to(['/site/show-news','id'=>$news[1]->id]) ?>">
                        <img src="<?= \yii\helpers\Url::toRoute('/images/'.$news[1]->image) ?>" alt="first">
                        <div class="caption" >
                            <h3><?= $news[1]->title ?></h3>
                        </div>
                    </a>
                </div>
                <div class="thumbnail" style="position: relative; margin-bottom: 7px">
                    <a href="<?= \yii\helpers\Url::to(['/site/show-news','id'=>$news[2]->id]) ?>">
                        <img src="<?= \yii\helpers\Url::toRoute('/images/'.$news[2]->image) ?>" alt="first" style=";height: 229px;width: 382px;">
                        <div class="caption" >
                            <h3><?= $news[2]->title ?></h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4" style="padding-right: 0px;">
            <div class="thumbnail" style="position: relative;">
                <a href="<?= \yii\helpers\Url::to(['/site/show-news','id'=>$news[3]->id]) ?>">
                    <img style="height: 243px;width: 379px;" src="<?= \yii\helpers\Url::toRoute('/images/'.$news[3]->image) ?>" alt="first">
                    <div class="caption" >
                        <h3><?= $news[3]->title ?></h3>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4" style="padding:0px 7px">
            <div class="thumbnail" style="position: relative;">
                <a href="<?= \yii\helpers\Url::to(['/site/show-news','id'=>$news[4]->id]) ?>">
                    <img style="height: 243px;width: 379px;" src="<?= \yii\helpers\Url::toRoute('/images/'.$news[4]->image) ?>" alt="first">
                    <div class="caption" >
                        <h3><?= $news[4]->title ?></h3>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4" style="padding:0px;">
            <div class="thumbnail" style="position: relative;">
                <a href="<?= \yii\helpers\Url::to(['/site/show-news','id'=>$news[5]->id]) ?>">
                    <img style="height: 243px;width: 379px;" src="<?= \yii\helpers\Url::toRoute('/images/'.$news[5]->image) ?>" alt="first">
                    <div class="caption" >
                        <h3><?= $news[5]->title ?></h3>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <hr>
    <h2>Top Stories by categories:</h2>
    <div class="row">
        <?php
        foreach ($categories as $category) {
        ?>
            <div class="col-md-4">
                <div class="thumbnail">
                    <h5><?= $category->name?></h5>
                    <?php
                    $categoryNews = \common\models\News::find()->where(['category_id'=>$category->id])->limit(6)->orderBy('createdAt desc')->all();
                    //$firstImage = $categoryNews[0]->image;
                    foreach ($categoryNews as $newsItem){
                        ?>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="<?= \yii\helpers\Url::to(['/site/show-news','id'=>$newsItem->id]) ?>">
                                    <img class="myImageZoom" style="padding-left: 10px" src="<?= \yii\helpers\Url::toRoute('/images/'.$newsItem->image)?>" alt="...">
                                </a>
                            </div>
                            <div class="col-md-8" style="padding:0px;">
                                <a style="text-decoration: none !important;" href="<?= \yii\helpers\Url::to(['/site/show-news','id'=>$newsItem->id]) ?>">
                                    <p class="achorText"><?= $newsItem->title?></p>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>


            </div>
        <?php
        }
        ?>
    </div>

</div>
