<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; 
//LoadRoomImagesArray(); //$AllRoomImagesArray
?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Edit Rooms</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Rooms</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
  <?php
  if (select("SELECT * FROM addroom WHERE id = ".mysqli_real_escape_string($conn4as,$_GET["id"]))){
  	$rs = mysqli_fetch_assoc($qry);
	if ($rs["facilities"] != ""){$facilities = explode(",",$rs["facilities"]);}
  }else{
  	redirect('room.php?m=record not found');
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
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dwat" value="editroom" />
<input type="hidden" name="hidid" value="<?php echo $rs["id"]; ?>" />
<input type="hidden" name="hidqty" value="<?php echo $rs["roomQuantity"]; ?>" />
<!--row-->
<div class="col-sm-4">
<label>Room Name/Number</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="roomtype" class="form-control" placeholder="Room Type" required title="Room type is required" value="<?php echo $rs["roomType"]; ?>">
</div>
</div>

<div class="col-sm-4">
<label>Room Card Number</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="rcardno" class="form-control" placeholder="Room Card Number" value="<?php echo $rs["rcardno"]; ?>">
</div>
</div>

<div class="col-sm-4">
<label>Room Lock Number</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="rlockno" class="form-control" placeholder="Room Lock Number" value="<?php echo $rs["rlockno"]; ?>">
</div>
</div>

<div class="col-sm-4">
<label>Room Type</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="categoryid" id="categoryid" class="form-control" required x-moz-errormessage="Room type is required">
<option value="" selected>**Select**</option>
<?php
$categoryid = $rs["categoryid"];
$qry1 = mysqli_query($conn4as,"SELECT * FROM tblcategory WHERE cattype = 'room' ORDER BY catname");
while($rs1 = mysqli_fetch_assoc($qry1)){
echo ($categoryid == $rs1["id"])?'<option value="'.$rs1["id"].'" selected>'.$rs1["catname"].'</option>':'<option value="'.$rs1["id"].'">'.$rs1["catname"].'</option>';
}
?>
</select>
</div>
</div>


<div class="col-sm-4">
<label>Rate (per night)</label>
<div class="form-group input-group">
<span class="input-group-addon">&#8358;</span>
<input type="text" name="roomrate" class="form-control" placeholder="0.00" required title="Rate is required" value="<?php echo $rs["roomrate"]; ?>">
</div>
</div>

<div class="col-sm-4">
<label>Quantity</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="quantity" class="form-control" placeholder="e.g 1,2,3..." required title="Quantity is required" value="<?php echo $rs["roomQuantity"]; ?>">
</div>
</div>

<!--row-->
<div class="col-sm-4">
<label>Adult Per Room</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-users"></i></span>
<select name="maxadult" id="maxadult" title="Ensure you enter the Maximum Number of Adult per Room" class=" form-control" required x-moz-errormessage="You must ensure you enter the Maximum Number of Adult per Room.">
<option value="0" <?php echo ($rs["noofadult"] == '0')?'selected':''; ?>>**Select**</option>
<option value="1" <?php echo ($rs["noofadult"] == '1')?'selected':''; ?>>1</option>
<option value="2" <?php echo ($rs["noofadult"] == '2')?'selected':''; ?>>2</option>
<option value="3" <?php echo ($rs["noofadult"] == '3')?'selected':''; ?>>3</option>
<option value="4" <?php echo ($rs["noofadult"] == '4')?'selected':''; ?>>4</option>
<option value="5" <?php echo ($rs["noofadult"] == '5')?'selected':''; ?>>5</option>
</select>
</div>
</div>

<div class="col-sm-4">
<label>Children Per Room</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-users"></i></span>
<select name="maxchild" id="maxchild" title="Ensure you enter the Maximum Number of children per Room" class=" form-control" required x-moz-errormessage="You must ensure you enter the Maximum Number of Adult per Room.">
<option value="0" <?php echo ($rs["noofchildren"] == '0')?'selected':''; ?>>**Select**</option>
<option value="1" <?php echo ($rs["noofchildren"] == '1')?'selected':''; ?>>1</option>
<option value="2" <?php echo ($rs["noofchildren"] == '2')?'selected':''; ?>>2</option>
<option value="3" <?php echo ($rs["noofchildren"] == '3')?'selected':''; ?>>3</option>
<option value="4" <?php echo ($rs["noofchildren"] == '4')?'selected':''; ?>>4</option>
<option value="5" <?php echo ($rs["noofchildren"] == '5')?'selected':''; ?>>5</option>
</select>
</div>
</div>

<div class="col-md-12">
<label>Room Description</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-comments"></i></span>
<textarea class=" form-control" name="roomDescription" Placeholder="e.g: Air Conditioned, Tv, Wireless Network etc."><?php echo $rs["roomDescription"]; ?></textarea>  
</div>  
</div> 
		
<!--Images-->	
<fieldset class="col-md-12"><legend>Attach Picture(s)</legend>
<?php
if (select("SELECT * FROM roompictures WHERE roomid = '".mysqli_real_escape_string($conn4as,$_GET["id"])."' ORDER BY id")){
$rs2 = mysqli_fetch_assoc($qry);
}
?>
<input type="hidden" name="hidufile1" value="<?php echo $rs2[pic1]; ?>">
<input type="hidden" name="hidufile2" value="<?php echo $rs2[pic2]; ?>">
<input type="hidden" name="hidufile3" value="<?php echo $rs2[pic3]; ?>">
<input type="hidden" name="hidufile4" value="<?php echo $rs2[pic4]; ?>">
<input type="hidden" name="hidufile5" value="<?php echo $rs2[pic5]; ?>">
<input type="hidden" name="hidufile6" value="<?php echo $rs2[pic6]; ?>">
<input type="hidden" name="hidufile7" value="<?php echo $rs2[pic7]; ?>">
<input type="hidden" name="hidufile8" value="<?php echo $rs2[pic8]; ?>">
<input type="hidden" name="hidufile9" value="<?php echo $rs2[pic9]; ?>">
<input type="hidden" name="hidufile10" value="<?php echo $rs2[pic10]; ?>">
<input type="hidden" name="hidufile11" value="<?php echo $rs2[pic11]; ?>">
<input type="hidden" name="hidufile12" value="<?php echo $rs2[pic12]; ?>">

<div class="col-sm-4">
<div class="form-group input-group">
<span class="input-group-addon"><?php echo ($rs2[pic1] != '')?'<i class="fa fa-photo"></i>':'01'; ?></span>
<input type="file" class="form-control" name="ufile1">
</div>
</div>

<div class="col-sm-4">
<div class="form-group input-group">
<span class="input-group-addon"><?php echo ($rs2[pic2] != '')?'<i class="fa fa-photo"></i>':'02'; ?></span>
<input type="file" class="form-control" name="ufile2" placeholder="">
</div>
</div>

<div class="col-sm-4">
<div class="form-group input-group">
<span class="input-group-addon"><?php echo ($rs2[pic3] != '')?'<i class="fa fa-photo"></i>':'03'; ?></span>
<input type="file" class="form-control" name="ufile3">
</div>
</div>

<div class="col-sm-4">
<div class="form-group input-group">
<span class="input-group-addon"><?php echo ($rs2[pic4] != '')?'<i class="fa fa-photo"></i>':'04'; ?></span>
<input type="file" class="form-control" name="ufile4" placeholder="">
</div>
</div>

<div class="col-sm-4">
<div class="form-group input-group">
<span class="input-group-addon"><?php echo ($rs2[pic5] != '')?'<i class="fa fa-photo"></i>':'05'; ?></span>
<input type="file" class="form-control" name="ufile5" placeholder="">
</div>
</div>

<div class="col-sm-4">
<div class="form-group input-group">
<span class="input-group-addon"><?php echo ($rs2[pic6] != '')?'<i class="fa fa-photo"></i>':'06'; ?></span>
<input type="file" class="form-control" name="ufile6" placeholder="">
</div>
</div>

<div class="col-sm-4">
<div class="form-group input-group">
<span class="input-group-addon"><?php echo ($rs2[pic7] != '')?'<i class="fa fa-photo"></i>':'07'; ?></span>
<input type="file" class="form-control" name="ufile7" placeholder="">
</div>
</div>

<div class="col-sm-4">
<div class="form-group input-group">
<span class="input-group-addon"><?php echo ($rs2[pic8] != '')?'<i class="fa fa-photo"></i>':'08'; ?></span>
<input type="file" class="form-control" name="ufile8" placeholder="">
</div>
</div>

<div class="col-sm-4">
<div class="form-group input-group">
<span class="input-group-addon"><?php echo ($rs2[pic9] != '')?'<i class="fa fa-photo"></i>':'09'; ?></span>
<input type="file" class="form-control" name="ufile9" placeholder="">
</div>
</div>

<div class="col-sm-4">
<div class="form-group input-group">
<span class="input-group-addon"><?php echo ($rs2[pic10] != '')?'<i class="fa fa-photo"></i>':'10'; ?></span>
<input type="file" class="form-control" name="ufile10" placeholder="">
</div>
</div>

<div class="col-sm-4">
<div class="form-group input-group">
<span class="input-group-addon"><?php echo ($rs2[pic11] != '')?'<i class="fa fa-photo"></i>':'11'; ?></span>
<input type="file" class="form-control" name="ufile11" placeholder="">
</div>
</div>

<div class="col-sm-4">
<div class="form-group input-group">
<span class="input-group-addon"><?php echo ($rs2[pic12] != '')?'<i class="fa fa-photo"></i>':'12'; ?></span>
<input type="file" class="form-control" name="ufile12" placeholder="">
</div>
</div>
</fieldset>

<!--Facilities-->	
<fieldset class="col-md-12"><legend>Room Facilities</legend>
<p><strong>NOTE:</strong> Ensure you select appropriately according to the room facilities attributed to a room type.</p>
<?php
if (select("select * from addroomfacility order by name")){
while($rs1 = mysqli_fetch_assoc($qry)){
?>
<div class="col-md-3">
<div id="image_container"> 
<label><input type="checkbox" name="facility[]" style="margin-top:10px; margin-left:-10px;" value="<?php echo $rs1["id"]; ?>" <?php echo (in_array($rs1["id"],$facilities))?'checked':'';?>><i> </i><small style="font-size:13px; padding-left:8px;"><?php echo ucwords($rs1["name"]); ?></small></label>
</div>
</div>
<?php
}
}else{
echo 'No facility found. Click "<strong>Add Room Facility</strong>" button to add new facilities.';
}
?>
</fieldset>
<div class="col-md-12" style="margin-top:10px;">
<button class="btn btn-warning btn-md" style="margin-right:10px;">Update</button> <a href="manage-rooms.php">Back to Manage Room</a>
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