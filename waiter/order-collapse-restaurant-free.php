<div class="panel box box-primary"id="tab-restaurant" style="display:none;">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Restaurant Service (Free)
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse in">
                        <div class="box-body">
                         
<div class="col-sm-4">
  <label>Food</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
   <select name="resitem" id="resitem" title="room_type" onchange="getOptions(this,'resDetails','<?php echo '../fxn/process1.php'; ?>')" class=" form-control">
  <option value="0">Choose a food</option>
    <?php
              $sql= "SELECT id,name,categoryid FROM addresturant";
              $query = mysqli_query($conn4as,$sql);
			  while($rs = mysqli_fetch_assoc($query)){
                echo '<option value="'.$rs['id'].'">'.$rs['name'].' ('.getOneField("SELECT catname FROM tblcategory WHERE id = ".mysqli_escape_string($conn4as,$rs["categoryid"]),"catname").')</option>';
			  }
			  ?>
  </select>
  </div>
</div>

<div class="col-sm-4">
  <label>Unit Price</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa">#</i></span>
   <input type="text" class="form-control" placeholder="" name="resprice" onchange="calculateres()" onkeyup="calculateres()">
    <span class="input-group-addon"><i class="fa" id="resoutof">per 0 plate</i></span>
  </div>
</div>


<div class="col-sm-4">
  <label>Quantity</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
 <input type="text" class="form-control" placeholder="" value="1" name="resquantity" onchange="calculateres()" onkeyup="calculateres()">
  </div>
</div>

<div class="col-sm-4">
  <label>Discount</label>
  <div class="form-group input-group">
  
 <input type="text" class="form-control" placeholder="" value="0" name="resdiscount" onchange="calculateres()" onkeyup="calculateres()">
 <span class="input-group-addon"><i class="fa">%</i></span>
  </div>
</div>


<div class="col-sm-4">
  <label>Total</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa">#</i></span>
 <input type="text" class="form-control" placeholder="" readonly name="restotal">
 <span class="input-group-addon"><i class="fa">.00</i></span>
  </div>
</div>


<div class="col-sm-4">
  <label>Order Date</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
 <input type="date" class="form-control" placeholder="" name="resorderdate" value="<?php echo date("Y-m-d"); ?>">
  </div>
</div>

<div class="col-sm-4">
  <label>Additional Info. (optional)</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
 <input type="text" class="form-control" placeholder="" name="resitemdescr">
  </div>
</div>

                        </div>
                      </div>
                    </div>