<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Re-Stock Bar Item</h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Bar</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
  <?php
  if (select("SELECT * FROM addbar2 WHERE id = ".mysqli_real_escape_string($conn4as,$_GET["id"]))){
  	$rs = mysqli_fetch_assoc($qry);
  }else{
  	redirect('manage-bar2.php?m=record not found');
  }
  
  ?>
  <!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
		
		<div class="box box-primary" style="margin-top:10px;" id="jqdiv1">
<div class="box-header">

<div class="box-tools pull-right">
<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
</div>
</div>

<div class="box-body table-responsive">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post">
<input type="hidden" name="dwat" value="restockbar2" />
<input type="hidden" name="hidid" value="<?php echo $rs["id"]; ?>" />
<input type="hidden" name="hidname" value="<?php echo $rs["name"]; ?>" />
<input type="hidden" name="hidqty" value="<?php echo $rs["instock"]; ?>" />
<input type="hidden" name="hiditemleft" value="<?php echo $rs["itemleft"]; ?>" />
<div class="col-sm-12">
<?php 
echo "<strong style='width:200px;display:inline-block;'>Item Name:</strong> ".$rs["name"]."<br>"; 
echo "<strong style='width:200px;display:inline-block;'>Measurement:</strong> ".$rs["measure"]."<br>"; 
echo "<strong style='width:200px;display:inline-block;'>Quantity (Per Unit Price):</strong> ".$rs["quantity"]."<br>"; 
echo "<strong style='width:200px;display:inline-block;'>Unit Price:</strong> ".$rs["price"]."<br>";
echo "<strong style='width:200px;display:inline-block;'>Item left (In-stock):</strong> ".$rs["itemleft"]."<br>";
echo "<strong style='width:200px;display:inline-block;color:#f00;'>Instruction from Admin:</strong> re-stock ".GetInstructions('bar2',$rs["id"]).' '.$rs["measure"]."(s)<br><br>";
?>

</div>

<div class="col-sm-4">
<label>Add to Stock</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="number" name="restock" class="form-control" placeholder="Re-Stock" value="0">
</div>
</div>


<div class="col-md-12" style="margin-top:10px;">
<a href="manage-bar2.php" class="btn btn-sm btn-default" style="margin-right:10px;">Back to Manage Bar</a><button class="btn btn-warning btn-sm">Add Stock</button>
</div>
</form>
</div>
</div>

		</div>
          </div>
</section>
<!-- End Main content -->
</div>
<?php include_once 'inc/footer.php'; ?>