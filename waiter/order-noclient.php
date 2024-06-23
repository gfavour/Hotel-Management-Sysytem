<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<style>
span.gaplabel1{ display:inline-block !important;width:150px !important; font-size:16px; line-height:20px;}
</style>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>New Order</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">order</li>
          </ol>
        </section>

<!-- Begin Main content -->
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">
<section class="content">
		<div class="row">
		<div class="col-sm-8">
		<div class="box">
		<div class="box-header">
        <div class="box-title">
			  <?php
              $sql= "SELECT promodiscount,minnoofroom,vat FROM settings";
              $query = mysqli_query($conn4as,$sql);
			  $rss = mysqli_fetch_assoc($query);
              $promodiscount = $rss['promodiscount'];
			  $minnoofroom = $rss['minnoofroom'];
			  $vat = $rss['vat'];
			  ?>
  <?php
  $invoiceid = time();
  $sql = "SELECT addroom.id,addroom.roomType,addroom.roomrate,tblcategory.catname FROM addroom INNER JOIN tblcategory ON addroom.categoryid = tblcategory.id WHERE addroom.id=".mysqli_escape_string($conn4as,$_GET["roomid"])." AND tblcategory.cattype = 'room' ORDER BY addroom.id";
  $qry = mysqli_query($conn4as,$sql);
  $total = mysqli_num_rows($qry);
  if ($total > 0){
  $rs = mysqli_fetch_assoc($qry);
  	echo '<span class="gaplabel1">Room: </span> '.$rs["roomType"];
   echo '<br><span class="gaplabel1">Room Category:</span> '.$rs["catname"];
   echo '<br><span class="gaplabel1">Room Rate: </span> #'.number_format($rs["roomrate"],2);
   echo '<br><span class="gaplabel1">Invoice ID:</span> '.$invoiceid;
  }else{
  	echo 'Error: Unknown Customer.';
  }
  ?>
  <input type="hidden" name="room_type" id="room_type" value="<?php echo $_GET['roomid']; ?>">
  <input type="hidden" name="invoiceid" value="<?php echo $invoiceid; ?>">
  <input type="hidden" name="grandtotal" value="0">
  <input type="hidden" name="dwat" value="order">
<br clear="all" />

<div class="col-sm-8" style="padding:10px 0 0 0;">
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
                echo ($rsclient["id"] != '1')?'<option value="'.$rsclient['id'].'">'.ucwords(strtolower($rsclient["title"].' '.$rsclient["lastname"].' '.$rsclient["firstname"])).'</option>':'';
			  }
			  ?>
  </select>
  </div>
</div>

</div>
</div>
				
</div>
</div>
		
<div class="col-sm-4"><div class="box"><div class="box-header">
<div style="margin:5px 0; font-size:14px; text-align:left;" id="depositamt">Customer: N/A<br />Deposit: 0.00</div>

<div style="margin:8px 0 0 0; padding-top:5px; text-align:left;border-top:#ccc dotted 1px;">
<label for="pay4rmewallet"><input type="checkbox" value="1" id="pay4rmewallet" name="pay4rmewallet"> Deduct Payment From e-Wallet</label>
</div>

<div style="margin:0 0 8px 0; padding-top:5px; font-size:16px; color:#FF3300; text-align:left;border-top:#ccc dotted 1px;"><strong>Grand Total:</strong> <span id="grandtotal">0.00</span></div>

</div></div></div>

</div>
		
		
		
		<div class="row">
		<div class="col-md-12">
		<input type="hidden" name="chkroom" id="reservation" value="reservation" />             
			 <div id="msgbox"></div>
			  <div class="box box-solid">
		                <!-- /.box-header -->
                <div class="box-body">
                  <div class="box-group" id="accordion">
				  
				  <div class="">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Reservation Booking <span style=" font:14px Arial, Helvetica, sans-serif; color:#c00; text-align:center; margin:0 0 10px 0;" id="rmleftgroup"></span> 
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="box-body">
                         
<div class="col-sm-4">
  <label>Amount (per room)</label>
  <div class="form-group input-group">
   <span class="input-group-addon"><i class="fa">#</i></span>
   <input type="text" name="roomrate" class="form-control" placeholder="Amount" value="0" readonly onchange="calculate()" onkeyup="calculate()">
   <span class="input-group-addon"><i class="fa">.00</i></span>
  </div>
</div>

<div class="col-sm-4">
  <label>Room Left</label>
  <div class="form-group input-group">
 <input type="text" class="form-control" placeholder="" name="roomleft" readonly value="1">
 <span class="input-group-addon"><i class="fa" id="roomoutof">Out of 0</i></span>
  </div>
</div>

<input type="hidden" name="noofroom" id="noofroom" value="1" onchange="getDiscount(this.value,'<?php echo $minnoofroom; ?>','<?php echo $promodiscount; ?>')" />

<!--
<div class="col-sm-4">
  <label>Number of Room</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
  <select name="noofroom" id="noofroom" title="Number of room is required" class=" form-control" onchange="getDiscount(this.value,'<?php echo $minnoofroom; ?>','<?php echo $promodiscount; ?>')">
                      
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                       </select>
  </div>
</div>
-->


<div class="col-sm-4">
  <label>Number of Person</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
  <input type="text" class="form-control" placeholder="Number only" value="" name="noofperson">
  </div>
</div>


<div class="col-sm-4">
  <label>Check In <em>(mm/dd/yyyy)</em></label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
  <input type="date" id="checkin" class="form-control" name="checkin"  title="Check in date required" value="<?php echo date("Y-m-d"); ?>" onchange="var thisday = '<?php echo date("Y-m-d"); ?>';if(this.value != thisday){ showalert('Check in date must be today <?php echo date("Y-m-d"); ?>!','danger'); }else{ getCheckInOutInterval(); }">
  </div>
</div>


<div class="col-sm-4">
  <label>Check Out <em>(mm/dd/yyyy)</em></label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
 <input type="date" id="checkout" class="form-control" name="checkout"  title="Check out date required" value="" onchange="getCheckInOutInterval()">
  </div>
</div>

<div class="col-sm-4">
  <label>Duration</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
 <input type="text" class="form-control" placeholder="" name="duration" readonly value="0">
  </div>
</div>


<div class="col-sm-4">
  <label>Discount (%)</label>
  <div class="form-group input-group">
 <input type="number" class="form-control" placeholder="" name="discount" id="discount" value="0" onchange="calculate();" onkeyup="calculate();">
 <span class="input-group-addon styledc"<?php echo DiscountConversion4Room(); ?>><i class="fa fa-building-o"></i></span>
  </div>
</div>

<div class="col-sm-4">
  <label>VAT (%)</label>
  <div class="form-group input-group">
 <input type="text" class="form-control" placeholder="" name="vat" readonly value="<?php echo $vat; ?>">
 <span class="input-group-addon"><i class="fa">%</i></span>
  </div>
</div>

<div class="col-sm-4">
  <label>Total</label>
  <div class="form-group input-group">
 <span class="input-group-addon"><i class="fa">#</i></span>
 <input type="text" class="form-control" placeholder="" name="bookingtotal" id="bookingtotal" readonly value="0">
 <span class="input-group-addon"><i class="fa">.00</i></span>
  </div>
  <input type="hidden" name="spototal" value="0" />
  <input type="hidden" name="spatotal" value="0" />
  <input type="hidden" name="swimpooltotal" value="0" />
  <input type="hidden" name="lautotal" value="0" />
  <input type="hidden" name="restotal" value="0" />
  <input type="hidden" name="bartotal" value="0" />
</div>


                        </div>
                      </div>
                    </div>
					
				  
					<button class="btn btn-warning btn-md" style="margin-right:10px;"><i class="fa fa-send"></i> Order Now</button>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
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
	document.getElementById("depositamt").innerHTML = '<b>Customer:</b> '+clientArray[id]['name']+'<br><b>Deposit:</b> '+clientArray[id]['amount'];
}
</script>