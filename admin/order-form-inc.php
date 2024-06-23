<div>
<input type="hidden" name="chkroom" id="reservation" value="reservation" />             
                  
<div class="col-sm-6">
  <label>Amount (per room)</label>
  <div class="form-group input-group">
   <span class="input-group-addon"><i class="fa">#</i></span>
   <input type="text" name="roomrate" class="form-control" placeholder="Amount" value="0" readonly onchange="calculate()" onkeyup="calculate()">
   <span class="input-group-addon"><i class="fa">.00</i></span>
  </div>
</div>

<div class="col-sm-6">
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

<div class="col-sm-6">
  <label>Check In <em>(mm/dd/yyyy)</em></label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
  <input type="date" id="checkin" class="form-control" name="checkin" id="checkin"  title="Check in date required" value="<?php echo ($_GET["chkindate"] != '')?$_GET["chkindate"]:date("Y-m-d"); ?>" onchange="getCheckInOutInterval()" onclick="getCheckInOutInterval()">
  </div>
</div>


<div class="col-sm-6">
  <label>Check Out <em>(mm/dd/yyyy)</em></label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
 <input type="date" id="checkout" class="form-control" name="checkout" id="checkout"  title="Check out date required" value="<?php echo ($_GET["chkoutdate"] != '')?$_GET["chkoutdate"]:''; ?>" onchange="getCheckInOutInterval()" onclick="getCheckInOutInterval()">
  </div>
</div>

<div class="col-sm-6">
  <label>Number of Person</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
  <input type="text" class="form-control" placeholder="Number only" value="" name="noofperson">
  </div>
</div>

<div class="col-sm-6">
  <label>Duration</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
 <input type="text" class="form-control" placeholder="" name="duration" readonly value="0">
  </div>
</div>


<div class="col-sm-6">
  <label>Discount (%)</label>
  <div class="form-group input-group">
 <input type="number" class="form-control" step="any" placeholder="" name="discount" id="discount" value="0" onchange="calculate();" onkeyup="calculate();">
 <span class="input-group-addon styledc"<?php echo DiscountConversion4Room('ndtotal'); ?>><i class="fa fa-building-o"></i></span>
  </div>
</div>

<div class="col-sm-6">
  <label>VAT (%)</label>
  <div class="form-group input-group">
 <input type="text" class="form-control" placeholder="" name="vat" readonly value="<?php echo $vat; ?>">
 <span class="input-group-addon"><i class="fa">%</i></span>
  </div>
</div>

<div class="col-sm-6">
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

<br clear="all" />
<button class="btn btn-warning btn-md" style="margin-right:10px;"><i class="fa fa-send"></i> Order Now</button>
</div>
