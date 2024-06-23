<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php //CheckBarStockLimit("bar"); ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Manage Bar</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Bar</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
              <?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'bar'){ ?>
			  <!--Top Buttons + Search Box -->
			  <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">&nbsp;</h3>
				  <div class="box-tools">
				     <div class="input-group" style="padding-left:10px;">
					 <div class="input-group-btn">
					    <?php if ($globalrole == 'admin' || $globalrole == 'manager'){ ?>
						<!--<button class="btn btn-primary btn-sm" style="margin-right:10px;" id="jqbtn1x"><i class="fa fa-plus"></i> Add Bar Item</button>-->
						<a href="add-bar.php" class="btn btn-primary btn-sm" style="margin-right:10px;"><i class="fa fa-plus"></i> Add Bar Item</a>
						<?php } ?>
						<!--<a href="order.php?clientid=1" class="btn btn-warning btn-sm" style="margin-right:10px;"><i class="fa fa-plus"></i> New Order</a>-->
						<a href="order-bar-home.php" class="btn btn-warning btn-sm" style="margin-right:10px;"><i class="fa fa-plus"></i> New Order</a>
						<!--<a href="append-list.php" class="btn btn-warning btn-sm" style="margin-right:10px;"><i class="fa fa-plus"></i> Append Order</a>
						manage-guests.php-->
						</div>
                   
                    </div>
                  </div>
                </div><!-- /.box-header -->
                </div>
			  <?php } ?>
		<!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
		<?php //include("insert-new-bar.php"); ?>
			  
			  <!-- List of Room -->
			  <div class="box box-primary">
			  <!--box-header -->
			  <div class="box-header with-border">
              
			  <div class="pull-left"><form name="frmsearch" action="" method="get"><input type="hidden" name="dwat" value="search" /><input type="text" name="q" class="form-control input-sm pull-left" placeholder="Search by item name" style="width:60%; "><div class="input-group-btn"><button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button> <button type="button" onclick="go2('manage-bar.php');" class="btn btn-sm btn-default">All</button><a href="printbarmenu.php" target="_blank" class="btn btn-sm btn-primary">PRINT</a></div></form></div>
			  
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
              </div>
            </div>
			<!--box-header -->
               				
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
                  <form name="reservation" id="reservation">
					<?php
					if ($_GET["dwat"] == 'search'){
					$sql = select2nav("SELECT count(id) as ctn FROM addbar WHERE (name LIKE '%".$_GET["q"]."%') ORDER BY id DESC","SELECT * FROM addbar WHERE (name LIKE '%".$_GET["q"]."%') ORDER BY id DESC");
					}else{
					$sql = select2nav("SELECT count(id) as ctn FROM addbar ORDER BY id","SELECT * FROM addbar ORDER BY id");
					}
					if($sql){
				  echo '<table class="table table-striped">
                    <tr>
					  <th>SN</th>
                      <th>Name</th>
					  <th>Item Type</th>
					  <th>Measurement</th>
                      <th>Overall Stock</th>
					  <th>Item left</th>
					  <th>Quantity</th>
                      <th>Price</th> 
					  <th>Barcode</th>                      
                      <th>&nbsp;</th>
					  <th>&nbsp;</th>
                      <th>&nbsp;</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
												
					if ($globalrole == 'admin'){
						$delBtn = '<a href="javascript:;" class="label label-danger" onclick="confirmdel(\'id='.$rs["id"].'&tbl=addbar&dwat=del\',\'../fxn/process1.php\',\'\')">Delete</a>';
						$restockBtn = '<a href="bar-restock.php?id='.$rs["id"].'" class="label label-primary">Re-Stock</a>';
						$editBtn = '<a href="editbar.php?id='.$rs["id"].'" class="label label-primary">Edit</a>';
					}elseif ($globalrole == 'manager'){
						$delBtn = '<a href="javascript:;" class="label label-default">Delete</a>';
						$restockBtn = '<a href="bar-restock.php?id='.$rs["id"].'" class="label label-primary">Re-Stock</a>';
						$editBtn = '<a href="editbar.php?id='.$rs["id"].'" class="label label-primary">Edit</a>';
					
					}else{
						$delBtn = '<span class="label label-grey">Delete</span>';
						$editBtn = '<span class="label label-grey">Edit</span>';
					}
					
						echo '<tr>';
						//echo '<td><input type="radio" value="'.$rs["id"].'" name="chkid" id="chkid" title="'.$rs["id"].'"></td>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["name"].'</td>';
						echo '<td>'.getOneField("SELECT catname FROM tblcategory WHERE id = ".mysqli_escape_string($conn4as,$rs["categoryid"]),"catname").'</td>';
						echo '<td>'.$rs["measure"].'</td>';
						echo '<td>'.$rs["instock"].'</td>';
						echo '<td>'.$rs["itemleft"].'</td>';
						echo '<td>'.$rs["quantity"].'</td>';
						echo '<td>'.$rs["price"].'</td>';
						echo '<td>'.$rs["barcode"].'</td>';
						echo '<td>'.$editBtn.'</td>';
						echo '<td>'.$restockBtn.'</td>';
						echo '<td>'.$delBtn.'</td>';
						echo '</tr>';
					}
						echo '</table>';
					}else{
					echo '<div align="center">No record found.</div>';
					}
				?>
				</form>
                </div><!-- /.box-body -->
				<?php echo $nav; ?>
              </div><!-- /.box -->
            </div>
          </div>
</section>
<!-- End Main content -->
</div>
<?php include_once 'inc/footer.php'; ?>
