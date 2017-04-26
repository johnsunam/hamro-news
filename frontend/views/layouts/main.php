<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Graduate|Handlee|Josefin+Sans|Lobster+Two" rel="stylesheet">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<style>
    .navbar li>a{
        font-size: 12px;
        font-family: 'Graduate', cursive;
        color: black;
    }
    .navbar button{
        font-size: 12px;
        font-family: 'Graduate', cursive;
        color: black;
    }
    .navbar-brand{
        font-family: 'Handlee', cursive;
        font-size: 30px;
        color: crimson;
    }
</style>

<div class="wrap">
    <?php
    $categories_array = array();
    $categories = \common\models\Category::find()->all();
    foreach ($categories as $category)
    {
        $categories_array[]=['label'=> $category->name,'url'=>['/site/news','c_id'=>$category->id,'n_id'=>0]];
    }
//    $loginItems = [
//        ['label'=> 'Login By facebook','url'=>['/site/auth','authclient'=>'facebook']]
//    ];
    NavBar::begin([
        'brandLabel' => 'Hamro Khabar',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-fixed-top',
            'style' => 'background-color: darkturquoise;'
        ],
    ]);
//    $menuItems = [
//        ['label' => 'Home', 'url' => ['/site/index']],
//        //['label' => 'About', 'url' => ['/site/about']],
//        //['label' => 'Contact', 'url' => ['/site/contact']],
//    ];
    if (Yii::$app->user->isGuest) {
        $menuItems = [['label' => 'Signup', 'url' => ['/site/signup']]];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    $finalMenuItems = array_merge($categories_array,$menuItems);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $finalMenuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Hamro Khabar <?= date('Y') ?></p>

    </div>
</footer>

<?php $this->endBody() ?>
</body>
<?php
$script = <<<JS
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=1004022106400296";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

JS;
$this->registerJS($script)
?>
</html>
<?php $this->endPage() ?>


