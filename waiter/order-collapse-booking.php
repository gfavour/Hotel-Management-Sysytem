<div class="panel box box-primary" id="tab-reservation" style="display:none;">
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
  <label>Room</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
  <select name="room_type" id="room_type" title="room_type" onchange="getOptions(this,'RoomDetails','<?php echo '../fxn/process1.php'; ?>')" class=" form-control"  x-moz-errormessage="Select a room type.">
  <option value="0">Choose Room</option>
    <?php
              $sql= "SELECT id,roomType,categoryid FROM addroom";
              $query = mysqli_query($conn4as,$sql);
			  while($addroom = mysqli_fetch_assoc($query)){
                echo '<option value="'.$addroom['id'].'">'.getOneField("SELECT catname FROM tblcategory WHERE id = ".mysqli_escape_string($conn4as,$addroom["categoryid"]),"catname").' ('.$addroom['roomType'].')</option>';
			  }
			  ?>
  </select>
  </div>
</div>



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
 <input type="text" class="form-control" placeholder="" name="roomleft" readonly value="0">
 <span class="input-group-addon"><i class="fa" id="roomoutof">Out of 0</i></span>
  </div>
</div>


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


<div class="col-sm-4">
  <label>Number of Person</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
  <input type="text" class="form-control" placeholder="Number only" value="" name="noofperson">
  </div>
</div>


<div class="col-sm-4">
  <label>Check In</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
 <input type="date" id="checkin" class="form-control" name="checkin"  title="Check in date required" value="<?php echo date("Y-m-d"); ?>" onchange="getCheckInOutInterval();">
 <!--var thisday = <?php //echo date("m/d/Y"); ?>; if(this.value != thisday){ showalert('Check in date must be today <?php //echo date("m/d/Y"); ?>!','danger'); }else{ -->
  </div>
</div>


<div class="col-sm-4">
  <label>Check Out</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
 <input type="date" id="checkout" class="form-control" name="checkout"  title="Check out date required" value="" onchange="getCheckInOutInterval();">
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
 <input type="text" class="form-control" placeholder="" name="discount" id="discount" value="0" onchange="calculate();" onkeyup="calculate();">
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
 <input type="text" class="form-control" placeholder="" name="bookingtotal" readonly value="0">
 <span class="input-group-addon"><i class="fa">.00</i></span>
  </div>
</div>


                        </div>
                      </div>
                    </div>
					