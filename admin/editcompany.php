<?php include_once 'inc/head.php'; 
loadAllCompany2Array();
?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Edit Company</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Company</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
  <?php
  if (select("SELECT * FROM tblcompany WHERE id = ".mysqli_real_escape_string($conn4as,$_GET["id"]))){
  	$rs = mysqli_fetch_assoc($qry);
  }else{
  	redirect('manage-company.php?m=record not found');
  }
  
  ?>
  <!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
		
<div class="box box-primary" style="margin-top:10px;" id="jqdiv1">
<div class="box-header"><div class="box-tools pull-right">&nbsp;</div></div>

<div class="box-body table-responsive">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post">
<input type="hidden" name="dwat" value="editcompany" />
<input type="hidden" name="hidid" value="<?php echo $rs["id"]; ?>" />

<div class="col-sm-4">
<label>Company Name *</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="name" class="form-control" placeholder="Company Name" value="<?php echo $rs["name"]; ?>">
</div>
</div>

<div class="col-sm-4">
<label>Contact Person</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="contactperson" class="form-control" placeholder="Contact Person" value="<?php echo $rs["contactperson"]; ?>">
</div>
</div>

<div class="col-sm-4">
<label>Phone Number *</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-phone"></i></span>
<input type="text" name="phone" class="form-control" placeholder="Phone Number" value="<?php echo $rs["phone"]; ?>">
</div>
</div>

<div class="col-md-12">
<label>Address (optional)</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo $rs["address"]; ?>">  
</div>  
</div> 




<div class="col-md-12" style="margin-top:10px;">
<a href="manage-company.php" class="btn btn-md btn-default" style="margin-right:10px;">Back to Manage Company</a> <button class="btn btn-warning btn-md">Update</button> 
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