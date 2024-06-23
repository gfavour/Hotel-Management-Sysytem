<div class="col-sm-6" style="padding:0;display:none;" id="jqdiv1">
<div class="box box-primary">
<div class="box-header">
<h3 class="box-title" style="margin-left:15px;">Add Expenses</h3>
</div>

<div class="box-body table-responsive">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post">
<input type="hidden" name="dwat" value="addexp" />
<!--row-->
<div class="col-sm-12">
<label>Title</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="title" class="form-control" placeholder="Title">
</div>
</div>

<div class="col-sm-12">
<label>Date</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
<input type="date" id="expdate" class="form-control" name="expdate"  title="Date required" value="<?php echo date("Y-m-d"); ?>">
</div>
</div>

<div class="col-sm-12">
<label>Amount:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="text" name="amount" class="form-control" placeholder="Amount">
</div>
</div>

<!--row-->
<div class="col-sm-12">
<label>Department For:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<select name="dept" class="form-control">
<?php
echo getExpDeptOpt($_REQUEST["dept"]);
?>
</select>
</div>
</div>

<div class="col-sm-12">
<label>Short Description</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<textarea type="text" name="description" class="form-control" placeholder="Description"></textarea>
</div>
</div>


<div class="col-md-12" style="margin-top:10px;">
<button class="btn btn-warning btn-md" style="margin-right:10px;"><i class="fa fa-send"></i> Submit</button>
</div>
</form>
</div>
</div>
</div>
<br clear="all" />