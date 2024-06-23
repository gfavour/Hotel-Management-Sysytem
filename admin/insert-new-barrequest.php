<script>
var jsArrayBar1 = [];
var jsArrayBar2 = [];
jsArrayBar1 = <?php echo setEachBarItems("addbar"); ?>;
jsArrayBar2 = <?php echo setEachBarItems("addbar2"); ?>;
</script>

<div class="col-sm-12" style="padding:0;display:none;" id="jqdiv1">
<div class="box box-primary">
<div class="box-header">
<h3 class="box-title" style="margin-left:15px;">Add Bar Request</h3>
</div>

<div class="box-body table-responsive">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post">
<input type="hidden" name="dwat" value="addbarrequest" />

<div class="col-sm-12">
<label>Bar Type:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<!-- onchange="getBarsOptions(this.value);"-->
<select name="bartype" class="form-control">
<option value="" selected></option>
<?php
echo getBarTypesByNumKeyOpt($_REQUEST["bartype"]);
?>
</select>
</div>
</div>


<div class="col-sm-12">
<label>Item Name:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="hidden" name="barlabel" id="barlabel" value="" />
<select name="barname" id="barname" class="form-control" onchange="document.getElementById('barlabel').value = this.options[this.selectedIndex].text;">
<?php
echo getStoreItemsOptionsDirect('');
?>
</select>
</div>
</div>


<div class="col-sm-12">
<label>Quantity:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="text" name="qty" class="form-control" placeholder="Quantity">
</div>
</div>


<div class="col-md-12" style="margin-top:10px;">
<button class="btn btn-warning btn-md" style="margin-right:10px;"><i class="fa fa-send"></i> Submit</button>
</div>
</form>
</div>
</div>
</div>
<br clear="all" />
<script>
function getBarsOptions(bartype) {
var selopt = document.getElementById("barname");
selopt.options.length = 0; //Remove all options...
selopt.options[selopt.options.length] = new Option('','');
    if (bartype == '1') {
        for (var k in jsArrayBar1){
            selopt.options[selopt.options.length] = new Option(jsArrayBar1[k], k);
        };
    }else if (bartype == '2') {
        for (var k in jsArrayBar2){
            selopt.options[selopt.options.length] = new Option(jsArrayBar2[k], k);
        };
    }
}
</script>