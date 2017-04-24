<?php
/* @var $this yii\web\View */
?>


<div class="row">
    <div class="target col-md-6 well col-md-offset-3" style="margin-top: 100px">
        <h3 class="col-md-offset-4">Change frontend UI</h3>
        <label>Source</label>
        <select class="form-control" id="source">
            <option value="">choose source</option>
            <?php foreach ($div as $d){?>
            <option value=<?= $d->id ?> ><?= $d->div ?></option>
            <?php } ?>
        </select>
        <label>Target</label>
        <select class="form-control" id="target">
            <option value="">choose target</option>

        </select>
        <hr>
        <button class="btn btn-primary" id="apply">Apply</button>
    </div>
    <div class="target col-md-6">

    </div>
    <span id="snackbar">Change Applied</span>

</div>
<?php
$this->registerCssFile("@web/css/snackbar.css",['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);

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
    $("#source").val("");
    $("#target").val("");
    console.log(response);
    var x = document.getElementById("snackbar");
               console.log(x);
                // Add the "show" class to DIV
                x.className = "show";
   setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }
 });

});
')
?>
