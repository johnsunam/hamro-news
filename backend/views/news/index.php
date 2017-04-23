    <?php

use yii\helpers\Url; 
use yii\widgets\ActiveForm;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="row">
    <div class="jumbotron">
        <h1>Admin panel</h1>
    </div>
    <div class="news col-md-8">



        <div class="row">

            <div class="col-md-4" style="margin-left: 20px;">
                <label>Add category</label>
                <input type="text" class="form-control" id="category"/>

                <label>Add new tags</label>
                <input type="text" class="form-control" id="tags"/>
            </div>
        </div>


        <div class="row well" style="margin:20px;">
            <h2 class="col-md-offset-5">Add News Content</h2>
            <div class="form col-md-11" >
                <?php $form = ActiveForm::begin(['id' => 'news-form','options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'category_id')->dropdownList($category,
                    ['prompt'=>'category',"id"=>'selectcategory']
                ); ?>

                <?= $form->field($model, 'title')->textInput(array("placeholder"=>"Title")) ?>
                <?= $form->field($model, 'content')->textarea(["rows"=>10])?>
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
                                        <input type="checkbox" id=<?= $tag->name ?> name="tags[]" value=<?= $tag->id ?> /><?= $tag->name ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </dd>

                </dl>
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','style'=>'width:100px']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
            <span id="snackbar"></span>

        </div>
    </div>
    <div class="col-md-4">
        <h3>Todays News Title</h3>
        <ul class="list-group">
        <?php foreach ($news as $n){ ?>

            <li class="list-group-item"><div class="row"><div class="col-md-9" style="overflow: hidden;text-overflow: ellipsis;">
                        <div class="row">
                            <div class="col-xs-6 col-md-4">
                                <a href="#" class="thumbnail">
                                    <img src="<?=  '/hamroKhabar/frontend/web/images/' . $n->image ?>"
                                         alt="...">
                                </a>
                            </div>
                            
                        </div><?= $n->title ?></div>
                    <div class="col-md-3"><a href=<?=Url::toRoute(['/news/delete','id'=>$n->id]) ?> class="badge" style="color:white;">
                            <i class="glyphicon glyphicon-trash pull-right"></i>
                        </a><a href=<?=Url::toRoute(['/news/update','id'=>$n->id]) ?> class="badge" style="color:white;" onclick="chooseContent(<?php $news ?>);">
                            <i class="glyphicon glyphicon-pencil pull-right"></i>
                        </a></div></div>
                <h4>Tags:</h4>
            <p style="margin-top: 20px">
                    <?php foreach ($this->context->getTags($n->id) as $tag){ ?>
                        <span class="badge"><?= $tag->name ?></span>
                <?php } ?>
            </p>
            </li>

        <?php } ?>

        </ul>
    </div>
</div>


<?php
$this->registerCssFile("@web/css/dropdown.css",['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
$this->registerCssFile("@web/css/snackbar.css",['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
$this->registerJsFile("@web/js/dropdown.js",['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJs('$("#category").on("keyup",function(e){
    
    if(e.keyCode===13){
    if(e.target.value.length!==0)
        sendData("category",e.target.value);
    }

});

$("#tags").on("keyup",function(e){

    if(e.keyCode===13){
    if(e.target.value.length!==0)
      sendData("tags",e.target.value);
    }
});
  
  var newsTags= '.\yii\helpers\Json::htmlEncode($newstags).';
  newsTags.forEach((item,index)=>{
 $(`input[value=${item}]`).prop("checked",true) ;
  
  })
function sendData(types,data){
    var datas={types:types,data:data};
    console.log(datas);
     var url = 
     $.post({
           url:"' . Url::toRoute('news/ajax') . '",
           data:datas,
           success:function(response){
               //for snackbar
               var x = document.getElementById("snackbar");
               console.log(x);
                // Add the "show" class to DIV
                x.className = "show";
                console.log(data);
                $("#snackbar").text(`${data} created`);
                // After 3 seconds, remove the show class from DIV
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
               $(`#select${types}`).append("<option value="+response.id+">"+response.name+"</option>");
               if(types==="tags"){
               $(".mutliSelect ul").append(`<li> <input type="checkbox" id=${response.name} name="tag[]" value=${response.id} />${response.name}</li>`);
               }
               $(`#${types}`).val("");
           }
       });
}



');

 ?>
