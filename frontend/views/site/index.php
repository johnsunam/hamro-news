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
</style>
<div class="site-index">
    <h2>Top Stories of the day:</h2>
    <div class="row">
        <div class="col-md-8" style="padding-right: 7px">
            <div class="thumbnail" style="position: relative; margin-bottom: 3px">
                <a href="<?= \yii\helpers\Url::to(['/site/show-news','id'=>$news[0]->id]) ?>">
                    <img class="img-responsive" src="<?= \yii\helpers\Url::toRoute('/images/'.$news[0]->image) ?>" alt="first">
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
</div>
