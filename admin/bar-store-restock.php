<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php 
include_once 'inc/sidebar.php'; 
setStoreItems();
?>
<script>
var jsArrayBar1 = [];
var jsArrayBar2 = [];
var jsArrayBar3 = [];
jsArrayBar1 = <?php echo setEachBarItems("addbar"); ?>;
jsArrayBar2 = <?php echo setEachBarItems("addbar2"); ?>;
jsArrayBar3 = <?php echo setEachBarItems("addbar3"); ?>;
</script>

<?php
  if (select("SELECT * FROM tblstore WHERE id = ".mysqli_real_escape_string($conn4as,$_GET["id"]))){
  	$rs = mysqli_fetch_assoc($qry);
  }else{
  	redirect('store.php?m=record not found');
  }  
?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Transfer Item to Bar</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Transfer Item to Bar</li>
          </ol>
        </section>


<section class="content">
<div class="row">
<div class="col-xs-12">
<div id="msgbox"></div>

<div class="col-sm-12" style="padding-left:0; margin-bottom:10px;">
<strong style="color:#FF3300;">Note:</strong> Kindly make sure cursor is inside the barcode field before scanning.
</div>

<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dwat" value="transfer2bar" />
<input type="hidden" name="storeitemid" value="<?php echo $_GET["id"]; ?>">
<input type="hidden" name="barcode" id="barcode" value="<?php echo $rs["barcode"]; ?>" />
<input type="hidden" name="price" value="<?php echo $rs["price"]; ?>">
<input type="hidden" name="quantity" value="<?php echo $rs["quantity"]; ?>">
<input type="hidden" name="costprice" id="costprice" value="<?php echo $rs["costprice"]; ?>">

<?php
$categoryid = $rs["categoryid"];
$qry1 = mysqli_query($conn4as,"SELECT * FROM tblcategory WHERE cattype = 'bar' ORDER BY catname");
while($rs1 = mysqli_fetch_assoc($qry1)){
echo ($categoryid == $rs1["id"])?'<input type="hidden" name="measure" id="measure" value="'.$rs1["id"].'">':'<input type="hidden" name="measure" id="measure" value="'.$rs1["id"].'">';
}
?>

<div class="col-sm-6" style="padding-left:0;" id="transformdiv">
<div class="box box-primary" style="padding-left:0;">
<div class="box-body">

<div class="col-sm-12">
<label>Item From Store:</label> [<a href="javascript:;" onclick="showmodal('<div class=\'col-sm-12\' style=\'padding:0;\'><div class=\'form-group input-group\' style=\'margin-top:10px;\'><select name=\'newbarid\' id=\'newbarid\' class=\'form-control\'><option value=\'\' selected=\'selected\'></option><?php echo getStoreItemsWithKeys(); ?></select></div></div><br><button type=\'button\' onclick=\'go2(&quot;bar-store-restock.php?id=&quot;+document.getElementById(&quot;newbarid&quot;).value)\'>GO</button>','Choose Item From Store','#fff')">Change item</a>]
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input name="storename" id="storename" readonly class="form-control" value="<?php echo $rs["name"]; ?>">
</div>
</div>

<div class="col-sm-12">
<label>Available Quantity:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input name="storeqty" id="storeqty" readonly class="form-control" value="<?php echo $rs["qtyinstore"]; ?>">
</div>
</div>


<div class="col-sm-12">
<label>Type of Bar:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="bartype" id="bartype" class="form-control" onchange="getBarsOptions(this.value);">
<option value="" selected></option>
<!--
<option value="1">Bar 1 (Lounge)</option>
<option value="2">Bar 2 (Pool Bar)</option>-->
<?php
echo getBarTypesByNumKeyOpt($_REQUEST["bartype"]);
?>
</select>
</div>
</div>

<div class="col-sm-12">
<label>Item From Bar:</label> <br />(Select item you want to add quantity to. In case such item doesn't exist, click "Add As New Item" checkbox below)
<div class="form-group input-group" style="margin-top:10px;">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="barname" id="barname" class="form-control"><!-- class="selectpicker" data-live-search="true"-->
<option value="" selected="selected"></option>
<?php 
//echo getBarsItemsWithKeys($_REQUEST["barname"]);
?>
</select>
</div>
</div>


<div class="col-sm-12">
<label>Quantity:</label> <em>(Quantity of item to send to bar.)</em>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="barqty" id="barqty" class="form-control" placeholder="Quantity">
</div>
</div>

<div class="col-sm-12">
<label><input type="checkbox" value="1" name="chkaddasnew" id="chkaddasnew" /> Add As New Item.</label><br />
<strong class="red">Important:</strong> checking the box above will completely add above item as new in bar. Do not check it if item already registered in bar to avoid duplicate. 
</div>

<div class="col-md-12" style="margin-top:10px;">
<button type="button" class="btn btn-default btn-md" style="margin-right:10px;" onclick="window.location.href = 'store.php';"><i class="fa fa-arrow-back"></i> GO BACK</button>
<button class="btn btn-warning btn-md" style="margin-right:10px;"><i class="fa fa-send"></i> SEND</button>
</div>

</div>
</div>
</div>

</form>
		
			  
</div>
</div>
</section>
<!-- End Main content -->
</div>
<?php include_once 'inc/footer.php'; ?>
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
    }else if (bartype == '3') {
        for (var k in jsArrayBar3){
            selopt.options[selopt.options.length] = new Option(jsArrayBar3[k], k);
        };
    
	}
}
//getBarsOptions('1');

</script>