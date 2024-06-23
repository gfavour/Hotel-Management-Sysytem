<style>
span.gaplabel1{ display:inline-block !important;width:150px !important; font-size:16px; line-height:20px;}
</style>

<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">

<div class="col-sm-12">
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
  $sql = "SELECT * FROM addclient WHERE id=".mysqli_escape_string($conn4as,$_GET["clientid"]);
  $qry = mysqli_query($conn4as,$sql);
  $total = mysqli_num_rows($qry);
  if ($total > 0){
  $rs = mysqli_fetch_assoc($qry);
  	echo '<span class="gaplabel1">Name: </span> '.$rs["title"].' '.$rs["lastname"].' '.$rs["firstname"];
   echo '<br><span class="gaplabel1">Email:</span> '.$rs["email"];
   echo '<br><span class="gaplabel1">Phone: </span> '.$rs["phone"];
   echo '<br><span class="gaplabel1">Customer ID:</span> 00'.$rs["id"];
   echo '<br><span class="gaplabel1">Invoice ID:</span> '.$invoiceid;
  }else{
  	echo 'Error: Unknown Customer.';
  }
  ?>
  <input type="hidden" name="clientid" value="<?php echo $_GET['clientid']; ?>">
  <input type="hidden" name="invoiceid" value="<?php echo $invoiceid; ?>">
  <input type="hidden" name="grandtotal" value="0">
  <input type="hidden" name="dwat" value="order">
  </div>

<span style="margin:0; font-size:24px; color:#FF3300; text-align:right;"><strong>Grand Total</strong><br /># <span id="grandtotal">0.00</span> </span>
</div>
		
		

		<div class="col-md-12">
		
             
			 <div id="msgbox"></div>
			  <div class="box box-solid">
		        
                <div class="box-body">
				
					<div id="topb4accord">
					
					<div class="row" style="text-align:left; margin:0 0 15px 0; border-bottom:#ccc dotted 1px;">
   <div style="font-size:18px; line-height:20px; margin:0 0 5px 14px; text-align:left;">Select service(s) to place order.</div>
   
   <?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'receptionist'){ ?>
   <div class="col-sm-3">
   <label for="reservation"><input type="checkbox" name="chkroom" id="reservation" value="reservation" onclick="ShowHideById('tab-reservation');" /> Room Reservation</label>
   </div>
   <?php } ?>
   <?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'bar'){ ?>
   <div class="col-sm-3">
   <label for="bar"><input type="checkbox" name="chkbar" id="bar" value="bar" onclick="ShowHideById('tab-bar')" /> Bar Service</label>
   </div>
   <div class="col-sm-3">
   <label for="swimpool"><input type="checkbox" name="chkswimpool" id="swimpool" value="swimpool" onclick="ShowHideById('tab-swimpool')" /> Swimming Pool Service</label>
   </div>
   <?php } ?>
   <?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'restaurant'){ ?>
   <div class="col-sm-3">
   <label for="restaurant"><input type="checkbox" name="chkrestaurant" id="restaurant" value="restaurant" onclick="ShowHideById('tab-restaurant')" /> Restaurant Service</label>
   </div>
   <?php } ?>
   <?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'laundary'){ ?>
   <div class="col-sm-3">
   <label for="laundary"><input type="checkbox" name="chklaundary" id="laundary" value="laundary" onclick="ShowHideById('tab-laundary')" /> Laundary Service</label>
   </div>
   <?php } ?>
   <?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'spa'){ ?>
   <div class="col-sm-3">
   <label for="spa"><input type="checkbox" name="chkspa" id="spa" value="spa" onclick="ShowHideById('tab-spa')" /> Spa Service</label>
   </div>
   <?php } ?>
   <?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'sport'){ ?>
   <div class="col-sm-3">
   <label for="sport"><input type="checkbox" name="chksport" id="sport" value="sport" onclick="ShowHideById('tab-sport')" /> Sport Facilities</label>
   </div>
   <?php } ?>
   </div>
   
   </div>
				
				
                  <div class="box-group" id="accordion">
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
</form>

<script>
getDiscount(document.frm1.noofroom.value,'<?php echo $minnoofroom; ?>','<?php echo $promodiscount; ?>');
getCheckInOutInterval();
</script>