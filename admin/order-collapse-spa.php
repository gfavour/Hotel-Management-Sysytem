<div class="panel box box-primary"id="tab-spa" style="display:none;">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                            SPA Service
                          </a>
                        </h4>
                      </div>
                      <div id="collapseFive" class="panel-collapse collapse in">
                        <div class="box-body">
                         
<div class="col-sm-4">
  <label>Spa Service</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
   <select name="spaitem" id="spaitem" title="room_type" onchange="getOptions(this,'spaDetails','<?php echo '../fxn/process1.php'; ?>')" class=" form-control">
  <option value="0">Select</option>
    <?php
              $sql= "SELECT id,name FROM addspa";
              $query = mysqli_query($conn4as,$sql);
			  while($rs = mysqli_fetch_assoc($query)){
                echo '<option value="'.$rs['id'].'">'.$rs['name'].'</option>';
			  }
			  ?>
  </select>
  </div>
</div>

<div class="col-sm-4">
  <label>Unit Price</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa">#</i></span>
   <input type="text" class="form-control" placeholder="" name="spaprice" onchange="calculatespa()" onkeyup="calculatespa()">
  </div>
</div>

<div class="col-sm-4">
  <label>Number of Person</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
   <input type="text" class="form-control" placeholder="" name="spaquantity" value="1" onchange="calculatespa()" onkeyup="calculatespa()">
  </div>
</div>

<div class="col-sm-4">
  <label>Discount</label>
  <div class="form-group input-group">
  
 <input type="number" step="any" class="form-control" placeholder="" value="0" name="spadiscount" id="spadiscount" onchange="calculatespa()" onkeyup="calculatespa()">
 <span class="input-group-addon styledc"<?php echo DiscountConversion4Spa(); ?>><i class="fa fa-building-o"></i></span>
  </div>
</div>


<div class="col-sm-4">
  <label>Total</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa">#</i></span>
 <input type="text" class="form-control" placeholder="" readonly name="spatotal">
 <span class="input-group-addon"><i class="fa">.00</i></span>
  </div>
</div>


<div class="col-sm-4">
  <label>Date Order</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
 <input type="date" class="form-control" placeholder="" name="spaorderdate" value="<?php echo date("Y-m-d"); ?>">
  </div>
</div>

<div class="col-sm-4">
  <label>Additional Info. (optional)</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
 <input type="text" class="form-control" placeholder="" name="spaitemdescr">
  </div>
</div>

                        </div>
                      </div>
                    </div>