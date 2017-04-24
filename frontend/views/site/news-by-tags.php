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
    <h2 style="padding-left: 0px">
        News Under <span style="font-size: 35px;margin-bottom: 12px" class="badge"><?= $tag ?></span> Tag:
    </h2>
    <div class="col-md-8" style="padding-left: 0px">
        <div class="thumbnail">
            <?php
            if($selectedNews) {
                ?>
                <h2>
                    <?= $selectedNews->title ?>
                </h2>
                <img style="padding: 10px;" src="<?= \yii\helpers\Url::toRoute('/images/' . $selectedNews->image) ?>"
                     alt="first">
                <p>
                    <?= $selectedNews->content ?>
                </p>
                <?php
            }else {
                ?>
                <h2>
                    <?= $newsByTags[0]->title ?>
                </h2>
                <img style="padding: 10px;" src="<?= \yii\helpers\Url::toRoute('/images/' . $newsByTags[0]->image) ?>"
                     alt="first">
                <p>
                    <?= $newsByTags[0]->content ?>
                </p>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="col-md-4" style="padding-right: 0px">
        <div class="thumbnail">
            <h2>Tags</h2>
            <hr style="margin-bottom: 0px">
            <p style="font-size: 18px">
                <?php
                foreach ($newsByTags[0]->tags as $tag){
                    ?>
                    <a href="<?=\yii\helpers\Url::to(['/site/news-by-tags','t_id'=>$tag->id,'n_id'=>0])?>"><span style="font-size: 15px" class="badge"><?= $tag->name?></span></a>
                    <?php
                }
                ?>
            </p>
        </div>
        <div class="thumbnail">
            <h2>Other News of this tag</h2>
            <?php
            foreach ($newsByTags as $newsItem) {
                ?>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <a href="<?= \yii\helpers\Url::to(['/site/news-by-tags','t_id'=>$tag->id,'n_id'=>$newsItem->id]) ?>">
                            <img class="myImageZoom" style="padding-left: 10px" src="<?= \yii\helpers\Url::toRoute('/images/'.$newsItem->image)?>" alt="...">
                        </a>
                    </div>
                    <div class="col-md-8" style="padding:0px;">
                        <a style="text-decoration: none !important;" href="<?= \yii\helpers\Url::to(['/site/news-by-tags','t_id'=>$tag->id,'n_id'=>$newsItem->id]) ?>">
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