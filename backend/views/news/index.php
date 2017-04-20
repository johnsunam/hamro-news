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
    <label>Add new category</label>
    <input type="text" class="form-control" id="category"/>
    </div>
        <div class="col-md-4">
            <label>Add new tags</label>
            <input type="text" class="form-control" id="tags"/>
        </div>
    </div>

    <div class="row">
    <?php $form = ActiveForm::begin(['id' => 'news-form']); ?>

                <?= $form->field($model, 'category_id')->dropdownList($category,
               ['prompt'=>'category',"id"=>'selectcategory']
           ); ?>

        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'content')->textarea()?>
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'submit-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>

    </div>


<?php 

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
}');

 ?>
