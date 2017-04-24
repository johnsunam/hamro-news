<?php
/* @var $this yii\web\View */
?>
<h1>ui-table/index</h1>

<div class="row">
    <div class="target col-md-6">
        <label>Source</label>
        <select class="form-control" id="source">
            <option value="">choose source</option>
            <?php foreach ($div as $d){?>
            <option value=<?= $d->id ?> ><?= $d->div ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="target col-md-6">
        <label>Target</label>
        <select class="form-control" id="target">
            <option value="">choose target</option>

        </select>
    </div>
    <br>
    <br>
    <button class="btn btn-primary" id="apply">Apply</button>
</div>
<?php

$this->registerJs('
$("#source").on("change",function(e){
$("#target")
.find("option")
.remove();
var alldiv='.\yii\helpers\Json::htmlEncode($div).';
console.log(e.target.value);

var selectedDiv=alldiv.find((obj)=>{
   return obj.id==e.target.value;
});


var sourcediv=alldiv.filter((single)=>{
    var selfdiv=single.parent==selectedDiv.parent || single.width==selectedDiv.width;
    
    console.log(single.parent,selectedDiv.id);
    console.log(single.id,selectedDiv.parent);
    var parRel=single.parent == selectedDiv.id || single.id == selectedDiv.parent;
    console.log(!parRel);
    return selfdiv && single.id!=selectedDiv.id && !parRel ;
});

$("#target").append(`<option value="">Choose target</option>`);

sourcediv.forEach((single)=>{
    $("#target").append(`<option value=${single.id}>${single.div}</option>`)
.val(single.id)
});



})
$("#apply").on("click",function(e){
var s=$("#source").val();
var t=$("#target").val();

var alldiv='.\yii\helpers\Json::htmlEncode($div).';

var source=alldiv.find((obj)=>{
return obj.id==s;
});

var target=alldiv.find((obj)=>{
return obj.id==t;
});


 var sourcePos=source.position;
 var targetPos=target.position;
 var sourcePar=source.parent;
 var targetPar=target.parent;
 
 source.position=targetPos;
 target.position=sourcePos;
 source.parent=targetPar;
 target.parent=sourcePar;
 
 $.post({
    url:"'. \yii\helpers\Url::toRoute('ui-table/update').'",
    data:{source:source,target:target},
    success:function(response){
    console.log(response);
    }
 });

});
')
?>
