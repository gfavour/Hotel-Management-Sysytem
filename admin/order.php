<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; 
StoreHasRoomInArray();
?>
<style>
span.gaplabel1{ display:inline-block !important;width:150px !important; font-size:16px; line-height:20px;}
</style>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>New Order</h1>
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
  $sql = "SELECT * FROM addclient WHERE id=".mysqli_real_escape_string($conn4as,$_GET["clientid"]);
  $qry = mysqli_query($conn4as,$sql);
  $total = mysqli_num_rows($qry);
  if ($total > 0){
  $rs = mysqli_fetch_assoc($qry);
   echo '<div class="col-md-12" style="padding-left:0"><span class="gaplabel1">Invoice ID:</span> '.$invoiceid.'</div>';
   //echo '<br><span class="gaplabel1">Name: </span> '.$rs["title"].' '.$rs["lastname"].' '.$rs["firstname"];
   //echo '<br><span class="gaplabel1">Customer ID:</span> '.ZeroPrefixRegNo($rs["id"]);
   
  }else{
  	echo '<div class="col-md-12" style="padding-left:0">Error: Unknown Customer.</div>';
  }
  ?>
  <div class="col-md-12" style="padding-left:0; margin:10px 0 0 0;">
  <span class="gaplabel1">Customer Name: </span> 
  <select name="clientid" id="clientid" required x-moz-errormessage="Select a client." class="selectpicker" data-live-search="true">
        <?php
          //CustomersOptionByRoomOnly();
		  OptionWithRoomCustomers_RoomNoOnly();
		?>
        </select>
  <input type="hidden" name="invoiceid" value="<?php echo $invoiceid; ?>">
  <input type="hidden" name="grandtotal" value="0">
  <input type="hidden" name="dwat" value="order">
 </div>
 
 <div class="col-sm-12" style="padding-left:0; margin:10px 0 0 0;"><span class="gaplabel1" style="color:#FF3300;"><strong>Grand Total :&nbsp;&nbsp;&nbsp;</strong></span> <span id="grandtotal" style="color:#FF3300;">0.00</span></div>
 
 <div class="col-md-12" style="padding-left:0; margin:10px 0 0 0;">
 <span class="gaplabel1">Payment Status: </span> 
 <label for="unpaid"> <input type="radio" name="paystatus" id="unpaid" value="0" /> Unpaid</label>
 <label for="deposit" style="margin-left:15px;"> <input type="radio" name="paystatus" id="deposit" value="1" /> Pay From Deposit</label>
 <!--<label for="cash" style="margin-left:15px;"> <input type="radio" name="paystatus" id="cash" value="2" /> Cash By Hand</label>-->
 </div>
 
 <div class="col-md-12" style="text-align:left; margin:10px 0 15px 0; padding-left:0;">
   <div style="font-size:18px; line-height:20px; margin:0 0 10px 0px; padding:5px 10px;border-radius:3px; text-align:left; background:#eee;">Select service(s) to render.</div>
   <div style="padding-left:5px;">
   <?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'bar'){ ?>
   <label for="swimpool"> <input type="checkbox" name="chkswimpool" id="swimpool" value="swimpool" onclick="ShowHideById('tab-swimpool')" /> Swimming Pool Service</label>
   <?php } ?>
   <?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'laundary' || $globalrole == 'receptionist'){ ?>
   <label for="laundary" style="margin-left:15px;"> <input type="checkbox" name="chklaundary" id="laundary" value="laundary" onclick="ShowHideById('tab-laundary')" /> Laundary Service</label>
   <?php } ?>
   <?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'spa'){ ?>
   <label for="spa" style="margin-left:15px"> <input type="checkbox" name="chkspa" id="spa" value="spa" onclick="ShowHideById('tab-spa')" /> Spa Service</label>
   <?php } ?>
   <?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'sport'){ ?>
   <label for="sport" style="margin-left:15px"> <input type="checkbox" name="chksport" id="sport" value="sport" onclick="ShowHideById('tab-sport')" /> Sport Facilities</label>
   <?php } ?>
   </div>
      
   </div>
  </div></div>
				
		</div>
		</div>
		</div>
		
		
		
		<div class="row">
		<div class="col-md-12">
		
             
			 <div id="msgbox"></div>
			  <div class="boxx box-solidx">
		                <!-- /.box-header -->
                <div class="box-bodyx">
                  <div class="box-groupx" id="accordion">
				  <?php include("order-collapse-booking.php"); ?>
                   <?php include("order-collapse-bar.php"); ?>
				   <?php include("order-collapse-swimpool.php"); ?>
				    <?php include("order-collapse-restaurant.php"); ?>
					<?php include("order-collapse-laundary.php"); ?>
					<?php include("order-collapse-spa.php"); ?>
					<?php include("order-collapse-sport.php"); ?>
					<button class="btn btn-warning btn-md" style="margin-right:10px;"><i class="fa fa-send"></i> Order Now</button>
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