<?php 
include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php 
loadStaff2Array(); 
SetIngredientsArray();
?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Restaurant Raw Products Report</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Restaurant Raw Products Report</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-10">
              
			  <!--Top Buttons + Search Box -->
			  <div class="box">
                <!-- /.box-header -->
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				<form name="frm" action="" method="get">
				<input type="hidden" name="dwat" value="searchreport" />
				
				<div class="col-sm-6">
				<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa"><strong>From:</strong></i></span>
				<input type="date" name="datefrom" class="form-control" required title="date from is required" value="<?php echo $_GET["datefrom"]; ?>" style="width:55%;"><input type="time" name="timefrom" id="timefrom" value="<?php echo $_GET["timefrom"]; ?>" class="form-control" style="width:45%;">
				</div>
				</div>
				
				<div class="col-sm-6">
				<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa"><strong>To:</strong></i></span>
				<input type="date" name="dateto" class="form-control" required title="date from is required" value="<?php echo $_GET["dateto"]; ?>" style="width:55%;"><input type="time" name="timeto" id="timeto" value="<?php echo $_GET["timeto"]; ?>" class="form-control" style="width:45%;">
				</div>
				</div>
				
				<!--<div class="col-sm-6">
				<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa"><strong>Raw Product / Ingredient</strong></i></span>
				<select name="ingredient" id="ingredient" class="form-control">
				<option value=""></option>
				<?php //echo SetIngredientsOptions($_GET["ingredient"]); ?>
				</select>
				</div>
				</div>-->
								
				
				<div class="col-sm-4">
				<button class="btn btn-primary btn-md" style="margin-bottom:10px;"><i class="fa fa-book"></i> Generate Report</button></div>
				</form>
				</div>
				
                </div>
			  
				<div id="msgbox"></div>
		  
		  
			  <div class="box box-info">
			  <div class="box-header with-border">
              <h3 class="box-title"><?php //echo ($_GET["ingredient"] != '')?$IngredientsArray[$_GET["ingredient"]].'\'s':''; ?>List of Ingredients Used Between <?php echo $_REQUEST["datefrom"].' '.hr24to12($_REQUEST["timefrom"]).' - '.$_REQUEST["dateto"].' '.hr24to12($_REQUEST["timeto"]); ?></h3>
              <div class="box-tools pull-right">
			  <a href="javascript:;" onclick="iframeExporter('../fxn/downloadxls.php?dwat=Ing2xls&<?php echo 'datefrom='.$_REQUEST["datefrom"].'&timefrom='.$_REQUEST["timefrom"].'&timeto='.$_REQUEST["timeto"].'&dateto='.$_REQUEST["dateto"]; ?>');" class="label label-success" data-toggle="tooltip" data-placement="top" title="Export to excel">Export To Excel</a>
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
			  				
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
				  if ($_REQUEST["ingredient"] != ''){
				  		//$filter_staff = " FIND_IN_SET('".mysqli_real_escape_string($conn4as,$_GET["ingredient"])."',addresturant.ingredients) > 0 ";
				  }else{
				  		$filter_staff = " ";
				  }
				 				  
				  if ($_REQUEST["timefrom"] != '' && $_REQUEST["timeto"] != ''){
				  	//$filter_staff = ($filter_staff != '')?$filter_staff.' AND ':$filter_staff;
				  		$filter_dt = " TIMESTAMP(order_restaurant.orderdate, order_restaurant.ordertime) BETWEEN TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timefrom"])."') AND TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timeto"])."') ";
				  }else{
				  	//$filter_staff = ($filter_staff != '')?$filter_staff.' AND ':$filter_staff;
				  		$filter_dt = " order_restaurant.orderdate BETWEEN '".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."' AND '".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."' ";
				  }
				  
				  $sql = select2nav("SELECT count(order_restaurant.id) as ctn FROM order_restaurant INNER JOIN addresturant ON order_restaurant.itemid = addresturant.id WHERE ".$filter_staff.$filter_dt." ORDER BY order_restaurant.invoiceid DESC","SELECT order_restaurant.*,addresturant.name,addresturant.ingredients FROM order_restaurant INNER JOIN addresturant ON order_restaurant.itemid = addresturant.id WHERE ".$filter_staff.$filter_dt." ORDER BY order_restaurant.invoiceid DESC");
				  	
				  if($sql){
				  $IngredientName = $IngredientsArray[$_GET["ingredient"]];
				  	echo '<table class="table table-striped">
						<tr>
						  <th>SN</th>
						  <th>Invoice ID</th>
						  <th>Food</th>
						  <th>Qty.</th>
						  <th>Date</th>
						  <th>Time</th>
						  <th>Amount</th>
						</tr>';
					while($rs = mysqli_fetch_assoc($qry)){
							echo '<tr>';
							echo '<td>'.$c++.'</td>';
							echo '<td>'.$rs["invoiceid"].'</td>';
							echo '<td>'.$rs["name"].'</td>';
							echo '<td>'.$rs["qty"].'</td>';
							echo '<td>'.$rs["orderdate"].'</td>';
							echo '<td>'.hr24to12($rs["ordertime"]).'</td>';
							echo '<td>'.$sign.number_format($rs["total"],2).'</td>';
							echo '</tr>';
					}
					echo '</table>';
					
					echo '<div>'.GetRawEstimate("SELECT order_restaurant.id,addresturant.name,addresturant.ingredients FROM order_restaurant INNER JOIN addresturant ON order_restaurant.itemid = addresturant.id WHERE ".$filter_staff.$filter_dt." ORDER BY order_restaurant.invoiceid DESC").'</div>';
				 }else{
						echo '<div align="center">No record found.</div>';
				 }
					
					
				?>
			    </div>
				
              </div>			  
			  
            </div>
          </div>
</section>
<!-- End Main content -->
</div>
<?php include_once 'inc/footer.php'; ?>