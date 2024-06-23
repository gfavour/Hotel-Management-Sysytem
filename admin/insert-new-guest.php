<div class="box box-primary" style="margin-top:10px; display:none;" id="jqdiv1">
<div class="box-header">
<h3 class="box-title" style="margin-left:15px;">Add New Guest</h3>
</div>

<div class="box-body table-responsive">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dwat" value="addguest" />
<!--row-->
<div class="col-sm-4">
<label>Title</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="title" id="title" title="title" class="form-control">
<option value="Mr">Mr.</option>
<option value="Mrs">Mrs.</option>
<option value="Miss">Miss.</option>
<option value="Chief">Chief</option>
<option value="Dr">Dr.</option>
<option value="Engr">Engr.</option>
<option value="Chairman">Chairman</option>
<option value="Senator">Senator</option>
<option value="Governor">Governor</option>
<option value="President">President</option>
</select> 
</div>
</div>

<div class="col-sm-4">
<label>Last Name</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="lastname" class="form-control" placeholder="Last Name">
</div>
</div>

<div class="col-sm-4">
<label>First Name</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="firstname" class="form-control" placeholder="First Name">
</div>
</div>

<!--row-->
<div class="col-sm-4">
<label>Email Address</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="text" name="email" class="form-control" placeholder="Email Address">
</div>
</div>

<div class="col-sm-4">
<label>Phone Number</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-phone"></i></span>
<input type="text" name="phone" class="form-control" placeholder="Phone Number">
</div>
</div>

<div class="col-md-4">
<label>Company / Host (optional)</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<!--<input type="text" class="form-control" name="company" placeholder="Company" value="">-->
<select name="company" id="company" title="company" class="form-control"><?php echo getAllCompanyOpt($_REQUEST["company"]); ?></select>
</div>  
</div>

<div class="col-md-4">
<label>City</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" class="form-control" name="city" placeholder="City">  
</div>  
</div> 

<div class="col-md-4">
<label>State</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" class="form-control" name="state" placeholder="State">  
</div>  
</div> 

<div class="col-md-4">
<label>Country</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
  <select name="country" id="country" title="country" class=" form-control">
  <?php
  if(select("select * from tblcountry order by id")){
	  while($rs3 = mysqli_fetch_assoc($qry)){
			echo '<option value="'.$rs3["country"].'">'.$rs3["country"].'</option>';  
	  }
  }else{
  	echo '<option value="">No Country</option>';
  }
  ?>
  </select>
</div>  
</div> 

<div class="col-md-4">
<label>Upload Identification Card / Passport (optional)</label>
<div class="form-group input-group">
<input type="file" class="form-control" name="pic">  
</div>  
</div> 

<div class="col-md-12" style="margin-top:10px;">
<button class="btn btn-warning btn-md" style="margin-right:10px;"><i class="fa fa-send"></i> Submit</button>
</div>
</form>
</div>
</div>