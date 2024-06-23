<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<style>
span.gaplabel1{ display:inline-block !important;width:150px !important; font-size:16px; line-height:20px;}
</style>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Multiple Order</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">order</li>
          </ol>
        </section>

<!-- Begin Main content -->
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">
<section class="content">
		<div class="row">
		<div class="col-sm-12">
		<div class="box box-primary">
		<div class="box-header">
                  <div class="box-title">
				  <?php
              $sql= "SELECT promodiscount,minnoofroom,vat FROM settings";
              $query = mysqli_query($conn4as,$sql);
			  $rss = mysqli_fetch_assoc($query);
              $promodiscount = $rss['promodiscount'];
			  $minnoofroom = $rss['minnoofroom'];
			  $vat = $rss['vat'];
			  ?>
				  <?php
  $invoiceid = time();
   echo '<span class="gaplabel1">Invoice ID:</span> '.$invoiceid;
   echo '<br><span class="gaplabel1">Date/Time:</span> '.date("d M, Y h:i A");
   
  ?>
  <input type="hidden" name="invoiceid" value="<?php echo $invoiceid; ?>">
  <input type="hidden" name="grandtotal" value="0">
  <input type="hidden" name="dwat" value="ordermbar">
  </div>
</div>
<div style="margin:0 0 0 10px; font-size:24px; color:#FF3300; text-align:left;"><strong>Grand Total: </strong># <span id="grandtotal">0.00</span> </div>
</div>
</div>
</div>
		


<div class="row">
<div class="col-md-12">
             
	 <div id="msgbox"></div>
	  <div class="boxxs box-solidx">
                <!-- /.box-header -->
                <div class="box-bodyxs">
                  <div class="box-groupx">
		  

<div class="col-sm-4" style="padding-left:0;">
  <div class="form-group input-group"><span class="input-group-addon">Client Name:</span>
  <select name="clientid" id="clientid" title="client" class="form-control"  x-moz-errormessage="Select a client.">
   <?php
              $sql= "SELECT id,title,lastname,firstname FROM addclient";
              $query = mysqli_query($conn4as,$sql);
			  while($rsclient = mysqli_fetch_assoc($query)){
                echo '<option value="'.$rsclient['id'].'">'.$rsclient["title"].' '.$rsclient["lastname"].' '.$rsclient["firstname"].'</option>';
			  }
			  ?>
  </select>
  </div>
</div>

<div class="col-sm-3">
  <div class="form-group input-group"><span class="input-group-addon">Discount</span>
   <input type="text" class="form-control" placeholder="" value="0" name="bardiscount" onchange="calculatembar()" onkeyup="calculatembar()">
 <span class="input-group-addon"><i class="fa">%</i></span>
  </div>
</div>

<div class="col-sm-3">
  <div class="form-group input-group">
  <span class="input-group-addon">Order Date</span>
 <input type="date" class="form-control" placeholder="" name="barorderdate" value="<?php echo date("m/d/Y"); ?>">
  </div>
</div>

<button class="btn btn-warning btn-md" style="margin-left:10px;"><i class="fa fa-send"></i> Order Now</button>
<br clear="all" />
					<div>
                 				 
				 <div class="box-bodyx">
                        
<?php
  $sql = "SELECT * FROM addbar ORDER BY name";
  $qry = mysqli_query($conn4as,$sql);
  $total = mysqli_num_rows($qry);
  if ($total > 0){
  while($rs = mysqli_fetch_assoc($qry)){ //width:235px;
  echo '<label for="barcheck'.$rs["id"].'" id="'.$rs["barcode"].'" class="col-sm-2" style="border:#ddd solid 1px;border-radius:5px;padding:10px 10px;margin:10px 10px 10px 0;background:#ffc;">';
  echo '<input type="checkbox" id="barcheck'.$rs["id"].'" name="barcheck[]" value="'.$rs["id"].'" style="position:absolute;" onclick="calculatembar()">';
  echo '<div style="text-align:center; font-size:20px;">'.$rs["name"].'</div>';
  //echo '<div style="margin:0 0 10px 0;"></div>';
  echo '<div style="margin:0 0 10px 0;"><strong>Item Left:</strong> <span class="pull-right">'.$rs["itemleft"].' items</span></div>';
  
  echo '<div style="margin:0 0 10px 0;"><strong>Quantity:</strong> <input type="number" name="barquantity'.$rs["id"].'" id="barquantity'.$rs["id"].'" value="1" class="pull-right" onchange="calculatembar()" onkeyup="calculatembar()" style="width:80px;padding-left:5px;"></div>';
  
  echo '<div style="margin:0 0 10px 0;"><strong>Unit Price:</strong> <input type="number" readonly name="barprice'.$rs["id"].'" id="barprice'.$rs["id"].'" value="'.$rs["price"].'" class="pull-right" style="width:80px;padding-left:5px;background:none;border:#ccc solid 1px;"></div>';
  echo '<div style="margin:0 0 0 0;"><strong>Total:</strong> <input type="number" name="bartotal'.$rs["id"].'" id="bartotal'.$rs["id"].'" readonly value="" class="pull-right" style="width:80px;padding-left:5px;background:none;border:#ccc solid 1px;"></div>';
  echo '</label>';
  }
  }
  ?>						 
</div>
</div>
</div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
		</div>
</section>
</form>
<!-- End Main content -->
</div>
<?php include_once 'inc/footer.php'; ?>
<script>
getDiscount(document.frm1.noofroom.value,'<?php echo $minnoofroom; ?>','<?php echo $promodiscount; ?>');
getCheckInOutInterval();
</script>
