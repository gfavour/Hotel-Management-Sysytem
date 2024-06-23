<div class="box box-primary" style="margin-top:10px; display:none;" id="jqdiv1">
<div class="box-header">
<h3 class="box-title" style="margin-left:15px;">Deposit</h3>
<div class="box-tools pull-right">
<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
</div>
</div>

<div class="box-body table-responsive">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dwat" value="adddeposit" />
<!--row-->
<div class="col-sm-6">
<label>Select Customer</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="guest" id="guest" title="Customer" class="form-control">
<?php
  if(select("select id,lastname,firstname from addclient order by lastname")){
	  while($rs3 = mysqli_fetch_assoc($qry)){
			echo '<option value="'.$rs3["id"].'">'.ucwords($rs3["lastname"].' '.$rs3["firstname"]).'</option>';  
	  }
  }else{
  	echo '<option value="">No Customer</option>';
  }
  ?>
</select> 
</div>
</div>

<div class="col-sm-6">
<label>Amount</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="number" name="amount" class="form-control" placeholder="Amount">
</div>
</div>


<div class="col-md-12" style="margin-top:10px;">
<button class="btn btn-warning btn-md" style="margin-right:10px;" name="cmdsubmit" id="cmdsubmit"><i class="fa fa-send"></i> Submit</button>
</div>
</form>
</div>
</div>