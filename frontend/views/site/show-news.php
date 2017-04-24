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
        <div class="thumbnail">
            <h2>Comments</h2>
            <div data-width="100%" class="fb-comments" data-href="<?=\yii\helpers\Url::to(['/site/show-news','id'=>$id],true)?>" data-numposts="5"></div>
        </div>
    </div>
    <div class="col-md-4" style="padding-right: 0px">
        <div class="thumbnail">
            <h2>Tags</h2>
            <hr style="margin-bottom: 0px">
            <p style="font-size: 18px">
                <?php
                foreach ($news->tags as $tag){
                    ?>
                    <a href="<?=\yii\helpers\Url::to(['/site/news-by-tags','t_id'=>$tag->id,'n_id'=>0])?>"><span style="font-size: 15px" class="badge"><?= $tag->name?></span></a>
                    <?php
                }
                ?>
            </p>
        </div>
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


