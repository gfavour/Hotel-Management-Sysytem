<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Edit Guest</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Guest</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
  <?php
  if (select("SELECT * FROM addclient WHERE id = ".mysqli_escape_string($conn4as,$_GET["id"]))){
  	$rs = mysqli_fetch_assoc($qry);
  }else{
  	redirect('manage-guests.php?m=record not found');
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
<input type="hidden" name="dwat" value="editguest" />
<input type="hidden" name="hidid" value="<?php echo $rs["id"]; ?>" />

<div class="col-sm-4">
<label>Title</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="title" id="title" title="title" class="form-control">
<option value="Mr" <?php echo ($rs["title"] == 'Mr')?'selected':''; ?>>Mr.</option>
<option value="Mrs" <?php echo ($rs["title"] == 'Mrs')?'selected':''; ?>>Mrs.</option>
<option value="Miss" <?php echo ($rs["title"] == 'Miss')?'selected':''; ?>>Miss.</option>
<option value="Chief" <?php echo ($rs["title"] == 'Chief')?'selected':''; ?>>Chief</option>
<option value="Dr" <?php echo ($rs["title"] == 'Dr')?'selected':''; ?>>Dr.</option>
<option value="Engr" <?php echo ($rs["title"] == 'Engr')?'selected':''; ?>>Engr.</option>
<option value="Chairman" <?php echo ($rs["title"] == 'Chairman')?'selected':''; ?>>Chairman</option>
<option value="Senator" <?php echo ($rs["title"] == 'Senator')?'selected':''; ?>>Senator</option>
<option value="Governor" <?php echo ($rs["title"] == 'Governor')?'selected':''; ?>>Governor</option>
<option value="President" <?php echo ($rs["title"] == 'President')?'selected':''; ?>>President</option>
</select> 
</div>
</div>

<div class="col-sm-4">
<label>Last Name</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="lastname" class="form-control" placeholder="Last Name" value="<?php echo $rs["lastname"]; ?>">
</div>
</div>

<div class="col-sm-4">
<label>First Name</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="firstname" class="form-control" placeholder="First Name" value="<?php echo $rs["firstname"]; ?>">
</div>
</div>

<!--row-->
<div class="col-sm-4">
<label>Email Address</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="text" name="email" class="form-control" placeholder="Email Address" value="<?php echo $rs["email"]; ?>">
</div>
</div>

<div class="col-sm-4">
<label>Phone Number</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-phone"></i></span>
<input type="text" name="phone" class="form-control" placeholder="Phone Number" value="<?php echo $rs["phone"]; ?>">
</div>
</div>

<div class="col-md-4">
<label>Company (optional)</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" class="form-control" name="company" placeholder="Company" value="<?php echo $rs["company"]; ?>">  
</div>  
</div>


<div class="col-md-4">
<label>City</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" class="form-control" name="city" placeholder="City" value="<?php echo $rs["city"]; ?>">  
</div>  
</div> 

<div class="col-md-4">
<label>State</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" class="form-control" name="state" placeholder="State" value="<?php echo $rs["state"]; ?>">  
</div>  
</div> 

<div class="col-md-4">
<label>Country</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
  <select name="country" id="country" title="country" class=" form-control">
  <?php
  $countryid = $rs["country"];
  if(select("select * from tblcountry order by id")){
	  while($rs3 = mysqli_fetch_assoc($qry)){
			echo ($countryid == $rs3["id"])?'<option value="'.$rs3["id"].'" selected>'.$rs3["country"].'</option>':'<option value="'.$rs3["id"].'">'.$rs3["country"].'</option>';  
	  }
  }else{
  	echo '<option value="">No Country</option>';
  }
  ?>
  </select>
</div>  
</div> 


<div class="col-md-12" style="margin-top:10px;">
<button class="btn btn-warning btn-md" style="margin-right:10px;">Update</button> <a href="manage-guests.php">Back to Manage Guests</a>
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