<div class="panel box box-primary"id="tab-laundary" style="display:none;">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                            Laundary Service
                          </a>
                        </h4>
                      </div>
                      <div id="collapseFour" class="panel-collapse collapse in">
                        <div class="box-body">
                         
<div class="col-sm-4">
  <label>Type of Laundary Service</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
   <select name="lauitem" id="lauitem" title="room_type" onchange="getOptions(this,'lauDetails','<?php echo '../fxn/process1.php'; ?>')" class=" form-control">
  <option value="0">Select</option>
    <?php
              $sql= "SELECT id,title FROM addlaundary";
              $query = mysqli_query($conn4as,$sql);
			  while($rs = mysqli_fetch_assoc($query)){
                echo '<option value="'.$rs['id'].'">'.$rs['title'].'</option>';
			  }
			  ?>
  </select>
  </div>
</div>

<div class="col-sm-4">
  <label>Unit Price</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa">#</i></span>
   <input type="text" class="form-control" placeholder="" name="lauprice" onchange="calculatelau()" onkeyup="calculatelau()">
  </div>
</div>


<div class="col-sm-4">
  <label>Discount</label>
  <div class="form-group input-group">
 <input type="text" class="form-control" placeholder="" value="0" name="laudiscount" id="laudiscount" onchange="calculatelau()" onkeyup="calculatelau()">
 <span class="input-group-addon styledc"<?php echo DiscountConversion4Lau(); ?>><i class="fa fa-building-o"></i></span>
  </div>
</div>


<div class="col-sm-4">
  <label>Total</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa">#</i></span>
 <input type="text" class="form-control" placeholder="" readonly name="lautotal">
 <span class="input-group-addon"><i class="fa">.00</i></span>
  </div>
</div>


<div class="col-sm-4">
  <label>Date Order</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
 <input type="date" class="form-control" placeholder="" name="lauorderdate" value="<?php echo date("Y-m-d"); ?>">
  </div>
</div>

<div class="col-sm-4">
  <label>Additional Info. (optional)</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
 <input type="text" class="form-control" placeholder="" name="lauitemdescr">
  </div>
</div>

                        </div>
                      </div>
                    </div>