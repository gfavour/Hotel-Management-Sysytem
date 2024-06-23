<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; loadStaff2Array(); ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Edit Expenditure</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Expenditure</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-7">
  <?php
  if (select("SELECT * FROM expenditure WHERE id = ".mysqli_real_escape_string($conn4as,$_GET["id"]))){
  	$rs = mysqli_fetch_assoc($qry);
  }else{
  	redirect('expenditure.php?m=record not found');
  }
  
  ?>
<div id="msgbox"></div>		
<div class="box box-primary" style="margin-top:10px;">
<div class="box-body table-responsive">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post">
<input type="hidden" name="dwat" value="editexp" />
<input type="hidden" name="hidid" value="<?php echo $rs["id"]; ?>" />

<div class="col-sm-12">
<label>Title</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="title" class="form-control" placeholder="Title" value="<?php echo $rs["title"]; ?>">
</div>
</div>

<div class="col-sm-12">
<label>Date</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
<input type="date" id="expdate" class="form-control" name="expdate"  title="Date required" value="<?php echo $rs["expdate"]; ?>">
</div>
</div>

<div class="col-sm-12">
<label>Amount</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<input type="text" name="amount" class="form-control" placeholder="Amount" value="<?php echo $rs["amount"]; ?>">
</div>
</div>

<div class="col-sm-12">
<label>Department For:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<select name="dept" class="form-control">
<?php
echo getExpDeptOpt($rs["dept"]);
?>
</select>
</div>
</div>

<div class="col-sm-12">
<label>Short Description</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
<textarea type="text" name="description" class="form-control" placeholder="Description" value="<?php echo $rs["description"]; ?>"></textarea>
</div>
</div>


<div class="col-md-12" style="margin-top:10px;">
<button class="btn btn-warning btn-md" style="margin-right:10px;">Update</button> <a href="expenditure.php" class="btn btn-default btn-md">Back to Expenditure</a>
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