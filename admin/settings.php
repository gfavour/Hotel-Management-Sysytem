<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>General Settings</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Settings</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
		<div class="row">
		<div class="col-xs-12">

		<div id="msgbox"></div>
		
		<div class="box box-primary">
<?php
$sql = select("SELECT * FROM settings ORDER BY id");
if($sql){
$rs = mysqli_fetch_assoc($qry);				
}
?>

<div class="box-body table-responsive">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dwat" value="settings" />
<input type="hidden" name="hidid" value="<?php echo $rs["id"]; ?>" />

<div class="col-sm-4">
  <label>Hotelier ID</label> 
  (it's optional. <a href="javascript:showmodal('This is an identification number given to you by any of the following booking sites recognized by our HMS. These booking sites have been registered and recognized by BigHMS; They are; ...<a href=\'http://www.bighms.com\'>Check online</a>.', 'What is Hotelier ID?','#fff');">Need help?</a>)
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
  <input type="text" name="hotelid" class="form-control" placeholder="Hotel ID" value="<?php echo $rs["hotelid"]; ?>">
  </div>
</div>


<div class="col-sm-4">
  <label>Booking Site Name</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
  <select name="bookingsite" class="form-control">
  <option value="" selected>Select **</option>
  <option value="www.bigotel.com" <?php echo ($rs["bookingsite"] == 'www.bigotel.com')?'selected':''; ?>>www.bigotel.com</option>
  </select>
  </div>
</div>


<div class="col-sm-4">
  <label>Hotel name</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
  <input type="text" name="hotel_name" class="form-control" placeholder="Hotels Name" value="<?php echo $rs["hotelname"]; ?>">
  </div>
</div>
<div class="col-sm-4">
  <label>Phone</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
  <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="<?php echo $rs["phone"]; ?>">
  </div>
</div>

<div class="col-sm-4">
  <label>Email</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
  <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $rs["email"]; ?>">
  </div>
</div>

<div class="col-sm-4">
  <label>Address</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-comment"></i></span>
  <input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo $rs["address"]; ?>">
  </div>
</div>

<div class="col-sm-4">
  <label>Country</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
  <input type="text" name="country" class="form-control" placeholder="Country" value="<?php echo $rs["country"]; ?>">
  </div>
</div>

<div class="col-sm-4">
  <label>Region / State</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
  <input type="text" name="state" class="form-control" placeholder="Region / State" value="<?php echo $rs["state"]; ?>">
  </div>
</div>

<div class="col-sm-4">
  <label>website</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
  <input type="text" name="website" class="form-control" placeholder="Website" value="<?php echo $rs["website"]; ?>">
  </div>
</div>
<div class="col-sm-4">
  <label>Promo Discount</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-money"></i></span>
  <input type="text" name="book_promo_discount" class="form-control" placeholder="Promo Discount" value="<?php echo $rs["promodiscount"]; ?>">
  </div>
</div>
<div class="col-sm-4">
  <label>Min Number of Room Applied</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input type="text" name="min_no_room" class="form-control" placeholder="" value="<?php echo $rs["minnoofroom"]; ?>">
  </div>
</div>

<div class="col-sm-4">
  <label>VAT</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-money"></i></span>
  <input type="text" name="vat" class="form-control" placeholder="VAT" value="<?php echo $rs["vat"]; ?>">
  </div>
</div>

<div class="col-sm-4">
  <label>Service Charge</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-money"></i></span>
  <input type="text" name="servicecharge" class="form-control" placeholder="Service Charge" value="<?php echo $rs["servicecharge"]; ?>">
  </div>
</div>

<div class="col-sm-4">
  <label>Facebook Link</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
  <input type="text" name="facebook_links" class="form-control" placeholder="Facebook Link" value="<?php echo $rs["facebook"]; ?>">
  </div>
</div>
<div class="col-sm-4">
  <label>Twitter Link</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
  <input type="text" name="twitter_links" class="form-control" placeholder="Twitter Links" value="<?php echo $rs["twitter"]; ?>">
  </div>
</div>
<div class="col-sm-4">
  <label>Youtube Link</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-youtube"></i></span>
  <input type="text" name="youtube_links" class="form-control" placeholder="Youtube Link" value="<?php echo $rs["youtube"]; ?>">
  </div>
</div>

<div class="col-sm-4">
  <label>Google Map</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-google"></i></span>
  <input type="text" name="google_map" class="form-control" placeholder="Google Map" value="<?php echo $rs["googlemap"]; ?>">
  </div>
</div>

<div class="col-sm-4">
  <label>Bar Item Limit Notification:</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-google"></i></span>
  <input type="text" name="baritemlimit" class="form-control" value="<?php echo $rs["baritemlimit"]; ?>">
  </div>
</div>

<div class="col-sm-6">
  <label>Attach Logo</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-file"></i></span>
  
  <input type="hidden" name="hidfile1" value="<?php echo $rs["logo"]; ?>">
  <input type="file" name="file1" class="form-control">
  </div>
</div>

<div class="col-sm-6">
  <label>Login Page Background Picture</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-file"></i></span>
  
  <input type="hidden" name="hidfile2" value="<?php echo $rs["loginbgpic"]; ?>">
  <input type="file" name="file2" class="form-control">
  </div>
</div>

<div class="col-sm-6">
  <div class="col-sm-9" style="padding-left:0"><label>Show description of Item(s) bought on guest receipt:</label></div>
  <div class="col-sm-3"><input type="checkbox" name="showguestcatlist" value="1"<?php echo ($rs["showguestcatlist"] == 1)?' checked':''; ?>></div>
</div>


<div class="col-md-12" style="margin-top:10px;">
  <button class="btn btn-warning btn-md" style="margin-right:10px;"><i class="fa fa-send"></i> Save Settings</button>
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