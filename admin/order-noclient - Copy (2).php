<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php
              $sql= "SELECT promodiscount,minnoofroom,vat FROM settings";
              $query = mysqli_query($conn4as,$sql);
			  $rss = mysqli_fetch_assoc($query);
              $promodiscount = $rss['promodiscount'];
			  $minnoofroom = $rss['minnoofroom'];
			  $vat = $rss['vat'];
			  $invoiceid = NewInvoiceID(''); //time();
			  ?>
<style>
span.gaplabel1{ display:inline-block !important;width:150px !important; font-size:16px; line-height:20px;}
</style>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>New Room Booking - #<?php echo $invoiceid; ?></h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">order</li>
          </ol>
        </section>

<!-- Begin Main content -->
<div id="msgbox"></div>
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">
<section class="content">
<div class="row">

<div class="col-sm-8">
<div class="box">
<div class="box-header">	
  <input type="hidden" name="reserveid" id="reserveid" value="<?php echo $_GET['reserveid']; ?>">
  <input type="hidden" name="room_type" id="room_type" value="<?php echo $_GET['roomid']; ?>">
  <input type="hidden" name="roomnoname" id="roomnoname" value="<?php echo $_GET['roomType']; ?>">
  <input type="hidden" name="invoiceid" value="<?php echo $invoiceid; ?>">
  <input type="hidden" name="grandtotal" value="0">
  <input type="hidden" name="dwat" value="orderbycard">

<div class="col-sm-12">
  <label>Client Name</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
  <select name="clientid" id="clientid" title="Client" class="form-control selectpicker" data-live-search="true" x-moz-errormessage="Select a client." onchange="getDeposit4order(this.value);">
   <?php
              $clientarray = array();
			  $sql= "SELECT id,title,lastname,firstname,amount FROM addclient";
              $query = mysqli_query($conn4as,$sql);
			  while($rsclient = mysqli_fetch_assoc($query)){
			  	$clientarray[$rsclient["id"]] = ["name"=>ucwords(strtolower($rsclient["title"].' '.$rsclient["lastname"].' '.$rsclient["firstname"])),"amount"=>$rsclient["amount"]];
                if($rsclient["id"] != '1'){
				echo ($_GET["custid"] == $rsclient['id'])?'<option value="'.$rsclient['id'].'" selected>'.ucwords(strtolower($rsclient["title"].' '.$rsclient["lastname"].' '.$rsclient["firstname"])).'</option>':'<option value="'.$rsclient['id'].'">'.ucwords(strtolower($rsclient["title"].' '.$rsclient["lastname"].' '.$rsclient["firstname"])).'</option>';
				}
			  }
			  ?>
  </select>
  </div>
</div>

<!--Start Other Fields--->
<?php include('order-form-inc.php'); ?>
<!--End Other Fields-->

</div>
				
</div>
</div>

<!--Start Side boxex-->	
<div class="col-sm-4">

<div class="box"><div class="box-header">
<?php
  $sql = "SELECT addroom.id,addroom.roomType,addroom.roomrate,addroom.rcardno,tblcategory.catname FROM addroom INNER JOIN tblcategory ON addroom.categoryid = tblcategory.id WHERE addroom.id=".mysqli_escape_string($conn4as,$_GET["roomid"])." AND tblcategory.cattype = 'room' ORDER BY addroom.id";
  $qry = mysqli_query($conn4as,$sql);
  $total = mysqli_num_rows($qry);
  if ($total > 0){
  $rs = mysqli_fetch_assoc($qry);
  	echo '<span class="gaplabel1">Invoice ID:</span> '.$invoiceid;
	echo '<br><span class="gaplabel1">Room No.: </span> '.$rs["roomType"];
	echo '<br><span class="gaplabel1">Card No.: </span> '.$rs["rcardno"];
    echo '<br><span class="gaplabel1">Room Category:</span> '.$rs["catname"];
    echo '<br><span class="gaplabel1">Room Rate: </span> #'.number_format($rs["roomrate"],2);
   
  }else{
  	echo 'Unrecognized Room.';
  }
  ?>
</div></div>

<div class="box"><div class="box-header"><div class="box-title"><h3>e-Wallet</h3></div>
<div style="margin:5px 0; font-size:14px; text-align:left;"><span class="gaplabel1">Customer: </span><span id="depositamt">N/A</span><br /><span class="gaplabel1">Deposit:</span><span id="depositamt2">0.00</span></div>
<div style="margin:8px 0 0 0; padding-top:5px; text-align:left;border-top:#ccc dotted 1px;"><label for="pay4rmewallet"><input type="checkbox" value="1" id="pay4rmewallet" name="pay4rmewallet"> Deduct Payment From e-Wallet</label></div>
<div style="margin:0 0 8px 0; padding-top:5px; font-size:16px; color:#FF3300; text-align:left;border-top:#ccc dotted 1px;"><strong>Grand Total:</strong> <span id="grandtotal">0.00</span></div>
</div></div>

</div>
<!--End Side boxex-->	

</div>
		
		
</section>
</form>
<!-- End Main content -->
</div>
<?php include_once 'inc/footer.php'; ?>
<script>
SendByAjax("roomid=<?php echo $_GET["roomid"]; ?>&dwat=RoomDetails2","../fxn/process1.php",'');

getDiscount(document.frm1.noofroom.value,'<?php echo $minnoofroom; ?>','<?php echo $promodiscount; ?>');
getCheckInOutInterval();
var clientArray = <?php echo json_encode($clientarray); ?>;

function getDeposit4order(id){
	var cArr = clientArray[id];
	document.getElementById("depositamt").innerHTML = clientArray[id]['name'];
	document.getElementById("depositamt2").innerHTML = clientArray[id]['amount'];
}
</script>