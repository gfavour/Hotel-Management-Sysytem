<div class="panel box box-primary"id="tab-bar" style="display:none;">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            Bar Service
                          </a>
                        </h4>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse in">
                        <div class="box-body">
                         
<div class="col-sm-4">
  <label>Item</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
   <select name="baritem" id="baritem" title="room_type" onchange="getOptions(this,'BarDetails','<?php echo '../fxn/process1.php'; ?>')" class=" form-control">
  <option value="">Choose an Item</option>
    <?php
              $sql= "SELECT id,name,categoryid FROM addbar";
              $query = mysqli_query($conn4as,$sql);
			  while($addroom = mysqli_fetch_assoc($query)){
                echo '<option value="'.$addroom['id'].'">'.$addroom['name'].' ('.getOneField("SELECT catname FROM tblcategory WHERE id = ".mysqli_real_escape_string($conn4as,$addroom["categoryid"]),"catname").')</option>';
			  }
			  ?>
  </select>
  </div>
</div>

<div class="col-sm-4">
  <label>Item Left</label>
  <div class="form-group input-group" id="barleftgroup">
 <input type="text" class="form-control" placeholder="" name="barleft" readonly value="0">
 <span class="input-group-addon"><i class="fa" id="baroutof">Out of 0</i></span>
  </div>
</div>

<div class="col-sm-4">
  <label>Unit Price</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa">#</i></span>
   <input type="text" class="form-control" placeholder="" name="barprice" onchange="calculatebar()" onkeyup="calculatebar()">
   <span class="input-group-addon"><i class="fa">.00</i></span>
  </div>
</div>


<div class="col-sm-4">
  <label>Quantity</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
 <input type="text" class="form-control" placeholder="" value="1" name="barquantity" onchange="calculatebar()" onkeyup="calculatebar()">
  </div>
</div>

<div class="col-sm-4">
  <label>Discount</label>
  <div class="form-group input-group">  
 <input type="text" class="form-control" placeholder="" value="0" name="bardiscount" id="bardiscount" onchange="calculatebar()" onkeyup="calculatebar()">
 <span class="input-group-addon styledc"<?php echo DiscountConversion4Bar(); ?>><i class="fa fa-building-o"></i></span>
  </div>
</div>


<div class="col-sm-4">
  <label>Total</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa">#</i></span>
 <input type="text" class="form-control" placeholder="" readonly name="bartotal">
 <span class="input-group-addon"><i class="fa">.00</i></span>
  </div>
</div>


<div class="col-sm-4">
  <label>Order Date</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
 <input type="date" class="form-control" placeholder="" name="barorderdate" value="<?php echo date("Y-m-d"); ?>">
  </div>
</div>

<div class="col-sm-4">
  <label>Item Description (optional)</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
 <input type="text" class="form-control" placeholder="" name="baritemdescr">
  </div>
</div>

                        </div>
                      </div>
                    </div>