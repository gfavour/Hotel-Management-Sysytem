<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php 
include_once 'inc/sidebar.php'; 
loadDurations();
?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Renew Membership</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">renew membership</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<?php
$userid = $_GET["id"];
$qry = mysqli_query($conn4as,"SELECT id,userid FROM gympayments WHERE userid = '".mysqli_escape_string($conn4as,$userid)."' ORDER BY id");
$rs = mysqli_fetch_assoc($qry);
$total = mysqli_num_rows($qry);
if($total <= 0){ redirect('gympayments.php?m=Account not found'); }
?>

<div class="col-sm-8" style="padding-left:0;">
<div class="box box-primary">
<div class="box-body">

<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dwat" value="editgym1" />
<input type="hidden" name="hidid" value="<?php echo $rs["id"]; ?>" />

<div class="col-sm-6">
<label>Membership Duration:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="duration" id="duration" class="form-control">
<option value="">Select...</option>
<?php
foreach($gymDurations as $dk=>$dv){
	echo '<option value="'.$dk.'">'.$dv[1].' ('.$sign.number_format($dv[3],0).')</option>';
}
?>
</select> 
</div>
</div>


<div class="col-sm-6">
<label>Membership Type:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="membertype" id="membertype" class="form-control">
<option value="">Select...</option>
<?php
foreach($memberTypes as $mk=>$mv){
	echo '<option value="'.$mk.'">'.$mv.'</option>';
}
?>
</select> 
</div>
</div>

<div class="col-sm-6">
<label>Direct Debit Type:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="debittype" id="debittype" class="form-control">
<option value="Yes">Yes</option>
<option value="No">No</option>
</select> 
</div>
</div>


<div class="col-sm-6">
<label>Payment Type:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="paymenttype" id="paymenttype" class="form-control">
<option value="">Select...</option>
<?php
foreach($paymentTypes as $pk=>$pv){
	echo '<option value="'.$pk.'">'.$pv.'</option>';
}
?>
</select> 
</div>
</div>

<div class="col-sm-6">
<label>Payment Amount:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="number" name="amount" id="amount" class="form-control" value="0">
<input type="hidden" name="ddamount" id="ddamount" class="form-control" value="0">
<input type="hidden" name="regfee" id="regfee" class="form-control" value="0">
</div>
</div>

<div class="col-md-12" style="margin-top:10px;">
<button class="btn btn-warning btn-md" style="margin-right:10px;"><i class="fa fa-send"></i> Renew Now</button>
</div>

</form>

</div>
</div>
</div>

</section>
<!-- End Main content -->
</div>
<?php include_once 'inc/footer.php'; ?>