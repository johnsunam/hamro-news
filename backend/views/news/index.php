    <?php

use yii\helpers\Url; 
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
    </div>

    <div class="row">
    <div class="col-md-4">
    <label>Add new tags</label>
    <input type="text" class="form-control" id="tags"/>
    </div>
    </div>
    <div class="well container" style="margin-top:10px">
    <div class="row">
    <div class="col-md-4">
    <label>Choose Category</label>
    <select class="form-control">
    <option>sports</option>
     <option>sports</option>
      <option>sports</option>
    </select>
    </div>
    <div class="col-md-4 col-md-offset-2">
    <label>Choose tags</label>
    <select class="form-control" >
    <option>science</option>
    <option>technology</option>
    <option>science</option>
    <option>technology</option>
    <option>science</option>
    <option>technology</option>
    </select>
    </div>
    </div>
    <br>
    <br>
    
   
    <form>
    <div class="">
    <label>News title</label>
    <input type="text" class="form-control" id="title"/>
    </div>
    
    <div class="" style="margin-top:30px;">
    <label>Content</label>
    <textarea rows="6" class="form-control"  cols="100"></textarea>
    </div>
    </form>    
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
               $(`#${types}`).val("");
           }
       });
}');

 ?>
