<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php //CheckBarStockLimit("bar"); ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Store</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Store For Bars</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-8">
              <?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'store'){ ?>
			  <div style="margin-bottom:10px">
					    <?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'store'){ ?>
						<!--<button class="btn btn-primary btn-sm" style="margin-right:10px;" id="jqbtn1x"><i class="fa fa-plus"></i> Add Bar Item</button>-->
						<a href="add-bar-2-store.php" class="btn btn-primary btn-sm" style="margin-right:10px;"><i class="fa fa-plus"></i> Add New Item to Store</a>
						<?php } ?>
						</div>
			  <?php } ?>
		<!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
		<?php //include("insert-new-bar.php"); ?>
			  
			  <!-- List of Room -->
			  <div class="box box-primary">
			  <!--box-header -->
			  <div class="box-header with-border">
              
			  <div class="pull-left"><form name="frmsearch" action="" method="get"><input type="hidden" name="dwat" value="search" /><input type="text" name="q" class="form-control input-sm pull-left" placeholder="Search by item name" style="width:60%; "><div class="input-group-btn"><button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button> <button type="button" onclick="go2('store.php');" class="btn btn-sm btn-default">All</button><a href="printstoreitems.php" target="_blank" class="btn btn-sm btn-primary">PRINT</a></div></form></div>
			  
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
					$sql = select2nav("SELECT count(id) as ctn FROM tblstore WHERE (name LIKE '%".$_GET["q"]."%') ORDER BY id DESC","SELECT * FROM tblstore WHERE (name LIKE '%".$_GET["q"]."%') ORDER BY id DESC");
					}else{
					$sql = select2nav("SELECT count(id) as ctn FROM tblstore ORDER BY id","SELECT * FROM tblstore ORDER BY id DESC");
					}
					if($sql){
				  echo '<table class="table table-striped">
                    <tr>
					  <th>SN</th>   
                      <th>Name</th>
					  <th>Qty Left</th>         
                      <th>Barcode</th>
					  <th>&nbsp;</th>
					  <th>&nbsp;</th>
					  <th>&nbsp;</th>
                      <th>&nbsp;</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
												
					if ($globalrole == 'admin'){
						$delBtn = '<span class="label label-grey">Delete</span>';
						$historyBtn = '<a href="storetransferhistoryreport.php?itemname='.$rs["id"].'" class="label label-primary">Transfer History</a>';
						$editBtn = '<a href="editstore.php?id='.$rs["id"].'" class="label label-info">Manage</a>';
					}elseif ($globalrole == 'manager' || $globalrole == 'store'){
						$delBtn = '<a href="javascript:;" class="label label-default">Delete</a>';
						$historyBtn = '<a href="storetransferhistoryreport.php?itemname='.$rs["id"].'" class="label label-primary">Transfer History</a>';
						$editBtn = '<a href="editstore.php?id='.$rs["id"].'" class="label label-info">Manage</a>';					
					}else{
						$delBtn = '<span class="label label-grey">Delete</span>';
						$editBtn = '<span class="label label-grey">Manage</span>';
					}
					$restockBtn = '<a href="bar-store-restock.php?id='.$rs["id"].'" class="label label-primary">Transfer</a>';
					
						if($rs["barcode"] != ''){ $barcode = $rs["barcode"]; }else{ $barcode = '-'; }
						echo '<tr>';
						//echo '<td><input type="radio" value="'.$rs["id"].'" name="chkid" id="chkid" title="'.$rs["id"].'"></td>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["name"].'</td>';
						//echo '<td>'.getOneField("SELECT catname FROM tblcategory WHERE id = ".mysqli_real_escape_string($conn4as,$rs["categoryid"]),"catname").'</td>';
						echo '<td>'.$rs["qtyinstore"].'</td>';
						//echo '<td>'.$rs["costprice"].'</td>';
						//echo '<td>'.$rs["price"].'</td>';
						echo '<td>'.$barcode.'</td>';
						echo '<td>'.$editBtn.'</td>';
						echo '<td>'.$restockBtn.'</td>';
						echo '<td>'.$historyBtn.'</td>';
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
