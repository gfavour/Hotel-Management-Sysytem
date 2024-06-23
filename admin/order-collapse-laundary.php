<?php
              $sql= "SELECT id,title,price FROM addlaundary";
              $query = mysqli_query($conn4as,$sql);
			  $lauservices = '<option value="0">Select</option>';
			  $AllLauPrices = [];
			  while($rs = mysqli_fetch_assoc($query)){
                $lauservices .= '<option value="'.$rs['id'].'">'.$rs['title'].'</option>';
				$AllLauPrices[$rs["id"]] = array("id"=>$rs["id"],"title"=>$rs["title"],"price"=>$rs["price"]);
			  }
			  ?>
<div class="panel box box-primary"id="tab-laundary" style="display:none;">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                            Laundary Service
                          </a>
                        </h4>
						
						<div class="box-tools pull-right">
						<a href="javascript:void();" id="addlauitemrow" class="btn btn-xs btn-success btn-block" style="margin-top:2px;color:#fff;">&nbsp;<i class="fa fa-plus"></i> Add Item&nbsp;&nbsp;</a>
						</div>
						
                      </div>
                      <div id="collapseFour" class="panel-collapse collapse in">
                        <div class="box-body">

<div id="lauitemrows">
<div id="lauitemrow0">                   
<div class="col-sm-3">
  <label>Type of Laundary Service</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span><!--getOptions(this,'lauDetails','<?php //echo '../fxn/process1.php'; ?>')-->
   <select name="inplauitem[]" id="inplauitem0" title="room_type" class="form-control"><?php echo $lauservices; ?></select>
  </div>
</div>

<div class="col-sm-3">
  <label>Unit Price</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa">#</i></span>
   <input type="text" class="form-control" placeholder="" name="inplauprice[]" id="inplauprice0"><!-- onchange="calculatelau()" onkeyup="calculatelau()"-->
  </div>
</div>


<div class="col-sm-3">
  <label>Discount</label>
  <div class="form-group input-group">
 <input type="number" step="any" class="form-control" placeholder="" value="0" min="0" name="inplaudiscount[]" id="inplaudiscount0">
 <!-- onchange="calculatelau()" onkeyup="calculatelau()"-->
 <span class="input-group-addon styledcx"<?php //echo DiscountConversion4Lau(); ?>>%</span>
  </div>
</div>


<div class="col-sm-3">
  <label>Total</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa">#</i></span>
 <input type="text" class="form-control" placeholder="" readonly name="inplautotal[]" id="inplautotal0">
 <span class="input-group-addon" id="dellauitem0" style="background:#eee;border-left:#fff solid 1px;color:#ccc;"><i class="fa fa-minus"></i></span>
  </div>
</div>

</div></div>

<!--<div class="col-sm-12">
<div class="col-sm-4"><hr /></div>
<div class="col-sm-4" style="text-align:center;"><a href="javascript:void();" id="addlauitemrow" class="btn btn-xs btn-success btn-block" style="margin-top:10px;">&nbsp;<i class="fa fa-plus"></i> Add Item&nbsp;&nbsp;</a></div>
<div class="col-sm-4"><hr /></div>
</div>-->

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

<div class="col-sm-4">
  <label>Sub Total:</label>
  <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-table"></i></span>
 	<input type="text" class="form-control" placeholder="" readonly name="lautotal" id="lautotal">
  </div>
</div>

                        </div>
                      </div>
                    </div>

<script>
var AllLauPrices = <?php echo json_encode($AllLauPrices); ?>;
</script>
