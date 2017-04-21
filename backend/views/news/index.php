    <?php

use yii\helpers\Url; 
use yii\widgets\ActiveForm;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Admin panel</h1>
    </div>
    <div class="row">
    <div class="col-md-4">
    <label>Add category</label>
    <input type="text" class="form-control" id="category"/>
    </div>
        <div class="col-md-4">
            <label>Add new tags</label>
            <input type="text" class="form-control" id="tags"/>
        </div>
    </div>


    <div class="row">

    <?php $form = ActiveForm::begin(['id' => 'news-form','options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'category_id')->dropdownList($category,
               ['prompt'=>'category',"id"=>'selectcategory']
           ); ?>

        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'content')->textarea()?>
        <?= $form->field($model, 'image')->fileInput() ?>
        <dl class="dropdown">

            <dt>
                <a href="#">
                    <span class="hida">Select</span>
                    <p class="multiSel"></p>
                </a>
            </dt>

            <dd>
                <div class="mutliSelect">
                    <ul>
                        <?php foreach ($tags as $tag){ ?>
                            <li>
                                <input type="checkbox" id=<?= $tag->name ?> name="tags[]" value=<?= $tag->id ?> /><?= $tag->name ?></li>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </dd>

        </dl>
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'submit-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>

    </div>


<?php 
$this->registerCssFile("@web/css/dropdown.css",['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
$this->registerJsFile("@web/js/dropdown.js",['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJs('$("#category").on("keyup",function(e){
    if(e.keyCode===13){
        sendData("category",e.target.value);
    }

});

$("#tags").on("keyup",function(e){

    if(e.keyCode===13){
      sendData("tags",e.target.value);
    }
});

function sendData(types,data){
    var datas={types:types,data:data};
    console.log(datas);
     var url = 
     $.post({
           url:"' . Url::toRoute('news/ajax') . '",
           data:datas,
           success:function(response){
               console.log(response);
               $(`#select${types}`).append("<option value="+response.id+">"+response.name+"</option>");
               $(`#${types}`).val("");
           }
       });
}



');

 ?>
