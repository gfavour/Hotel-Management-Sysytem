<div class="panel box box-primary"id="tab-sport" style="display:none;">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                            Sport Materials (Free)
                          </a>
                        </h4>
                      </div>
                      <div id="collapseSix" class="panel-collapse collapse in">
                        <div class="box-body">
                         
<div class="col-sm-4">
  <label>Sport items</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
   <select name="spoitem" id="spoitem" title="room_type" onchange="getOptions(this,'spoDetails','<?php echo '../fxn/process1.php'; ?>')" class=" form-control">
  <option value="0">Select</option>
    <?php
              $sql= "SELECT id,name,status FROM addsport";
              $query = mysqli_query($conn4as,$sql);
			  while($rs = mysqli_fetch_assoc($query)){
                echo '<option value="'.$rs['id'].'">'.$rs['name'].' (For '.$rs['status'].')</option>';
			  }
			  ?>
  </select>
  </div>
</div>

<div class="col-sm-4">
  <label>Unit Price</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa">#</i></span>
   <input type="text" class="form-control" placeholder="" name="spoprice" readonly onchange="calculatespo()" onkeyup="calculatespo()">
  </div>
</div>

<div class="col-sm-4">
  <label>Quantity</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
   <input type="text" class="form-control" placeholder="" name="spoquantity" value="1" onchange="calculatespo()" onkeyup="calculatespo()">
  </div>
</div>

<div class="col-sm-4">
  <label>Discount</label>
  <div class="form-group input-group">
  
 <input type="text" class="form-control" placeholder="" value="0" name="spodiscount" onchange="calculatespo()" onkeyup="calculatespo()">
 <span class="input-group-addon"><i class="fa">%</i></span>
  </div>
</div>


<div class="col-sm-4">
  <label>Total</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa">#</i></span>
 <input type="text" class="form-control" placeholder="" readonly name="spototal">
 <span class="input-group-addon"><i class="fa">.00</i></span>
  </div>
</div>


<div class="col-sm-4">
  <label>Date Order</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
 <input type="date" class="form-control" placeholder="" name="spoorderdate" value="<?php echo date("Y-m-d"); ?>">
  </div>
</div>


                        </div>
                      </div>
                    </div>