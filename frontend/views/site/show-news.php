<style>
    h2{
        font-family: 'Lobster Two', cursive;
        font-size: 45px;
        padding-left: 10px;
    }
    p{
        font-family: 'Josefin Sans', sans-serif;
        padding: 10px;
        font-size: 20px;
        text-align: justify;
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
</style>
<div class="site-index">
    <div class="col-md-8" style="padding-left: 0px">
        <div class="thumbnail">
            <h2>
                <?= $news->title ?>
            </h2>
            <img style="padding: 10px;" src="<?= \yii\helpers\Url::toRoute('/images/'.$news->image) ?>" alt="first">
            <p>
                <?= $news->content ?>
            </p>
        </div>
    </div>
    <div class="col-md-4" style="padding-right: 0px">
        <div class="thumbnail">
            <h2>Recent News</h2>
            <?php
            foreach ($recentNews as $newsItem) {
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
</div>