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
 <input type="text" class="form-control" placeholder="" value="0" name="swimpooldiscount" id="swimpooldiscount" onchange="calculateswimpool()" onkeyup="calculateswimpool()">
 <span class="input-group-addon styledc"<?php echo DiscountConversion4Swimpool(); ?>><i class="fa fa-building-o"></i></span>
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
  <label>Additional Info. (optional)</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
 <input type="text" class="form-control" placeholder="" name="swimpoolitemdescr">
  </div>
</div>

                        </div>
                      </div>
                    </div>