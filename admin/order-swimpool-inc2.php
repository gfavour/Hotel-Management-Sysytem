<a href="javascript:;" class="btn btn-sm btn-primary" style="margin:10px 0;" onclick="$('#tab-swimpool').toggle(500);">Order Swimming Pool Service</a>
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post">
<div class="panel box box-primary"id="tab-swimpool" style="display:none;">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseFivea">
                            Swimming Pool Service
                          </a>
                        </h4>
                      </div>
                      <div id="collapseFivea" class="panel-collapse collapse in">
                        <div class="box-body">

<?php $invoiceid = time(); ?>
<input type="hidden" name="invoiceid" value="<?php echo $invoiceid; ?>">
<input type="hidden" name="grandtotal" value="0">
<input type="hidden" name="dwat" value="orderswimpbarcode2">
<input type="hidden" name="chkswimpool" id="swimpool" value="swimpool" />


<div class="col-sm-4">
  <label>Customer Name</label>
  <div class="form-group input-group">
   <select name="clientid" id="clientid" title="Choose customer name" required x-moz-errormessage="Select a client." class="selectpicker" data-live-search="true">
  	<?php
          OptionWithRoomCustomers_RoomNoOnly();
		?>
  </select>
  </div>
</div>


<div class="col-sm-4">
  <label>Swimming Pool Service</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
   <select name="swimpoolitem" id="swimpoolitem" title="room_type" onchange="getOptions(this,'swimpoolDetails','../fxn/process1.php')" class=" form-control">
  <option value="0">Select</option>
    <?php
              $sql= "SELECT id,name FROM addswimpool";
              $query = mysqli_query($conn4as,$sql);
			  while($rs = mysqli_fetch_assoc($query)){
                echo '<option value="'.$rs['id'].'">'.$rs['name'].'</option>';
			  }
			  ?>
  </select>
  </div>
</div>

<div class="col-sm-4">
<input type="hidden" name="swimpoolhidmeas" id="swimpoolhidmeas" />
  <label>Unit Price</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa">#</i></span>
   <input type="text" class="form-control" readonly name="swimpoolprice" onchange="calculateswimpool()" onkeyup="calculateswimpool()">
   <span class="input-group-addon"><i class="fa" id="swimpoolmeasure">&nbsp;</i></span>
  </div>
</div>

<div class="col-sm-4">
  <label>Duration</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
   <input type="text" class="form-control" placeholder="" name="swimpoolduration" value="1" onchange="calculateswimpool()" onkeyup="calculateswimpool()">
  	<span class="input-group-addon"><i class="fa" id="swimpoolmeasure2">&nbsp;</i></span>
  </div>
</div>

<div class="col-sm-4">
  <label>Number of Person</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
   <input type="text" class="form-control" placeholder="" name="swimpoolquantity" value="1" onchange="calculateswimpool()" onkeyup="calculateswimpool()">
  </div>
</div>


<div class="col-sm-4">
  <label>Total</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa">#</i></span>
 <input type="text" class="form-control" placeholder="" readonly name="swimpooltotal">
 <span class="input-group-addon"><i class="fa">.00</i></span>
  </div>
</div>


<div class="col-sm-4">
  <label>Discount</label>
  <div class="form-group input-group">
  
 <input type="text" class="form-control" placeholder="" value="0" name="swimpooldiscount" onchange="calculateswimpool()" onkeyup="calculateswimpool()">
 <span class="input-group-addon"><i class="fa">%</i></span>
  </div>
</div>



<div class="col-sm-4">
  <label>Date Order</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
 <input type="date" class="form-control" placeholder="" name="swimpoolorderdate" value="<?php echo date("Y-m-d"); ?>">
  </div>
</div>

<div class="col-sm-4">
  <label>Start Time:</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
 <input type="hidden" class="form-control" placeholder="" name="swimpoolitemdescr">
 <input type="text" class="form-control" placeholder="" name="swimpoolordertime" value="<?php echo date("h:i A"); ?>">
  </div>
</div>


<div class="col-sm-12" style="margin-bottom:10px;">
    <label for="chkispaid" style="background:#f5f5f5 !important; padding:2px 8px; margin-bottom:10px; border-radius:3px; cursor:pointer;"><input type="checkbox" name="chkispaid" id="chkispaid" value="1"> Mark this order as paid</label>
    </div>
	
 <div class="col-sm-12"> 
<button type="submit" class="btn btn-warning btn-md" style="margin-left:0px;margin-right:5px;background: #00c292;border:1px solid #00c292;">ORDER NOW</button>
</div>

</div>
                      </div>
                    </div>
					</form>