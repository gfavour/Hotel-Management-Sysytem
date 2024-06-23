<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Re-Stock History</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Re-Stock History</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
              
			  <!--Top Buttons + Search Box -->
			  <div class="box">
                <!-- /.box-header -->
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				<form name="frm" action="" method="get">
				<input type="hidden" name="dwat" value="searchreport" />
				
				<div class="col-sm-4">
				<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa"><strong>From:</strong></i></span>
				<input type="date" name="datefrom" class="form-control" required title="date from is required" value="">
				</div>
				</div>
				
				<div class="col-sm-4">
				<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa"><strong>To:</strong></i></span>
				<input type="date" name="dateto" class="form-control" required title="date from is required" value="">
				</div>
				</div>

				
				<div class="col-sm-4">
				<button class="btn btn-primary btn-md" style="margin-bottom:10px;"><i class="fa fa-book"></i> Generate</button></div>
				</form>
				</div>
				
                </div>
			  
		<!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
		  
		  
			  <div class="box box-info">
			  
			  <!--box-header -->
			  <div class="box-header with-border">
              <h3 class="box-title">List of Items Re-stocked <?php echo ($_REQUEST["datefrom"] != '')?' Between '.$_REQUEST["datefrom"].' - '.$_REQUEST["dateto"]:''; ?></h3>
              <div class="box-tools pull-right">
			  <a href="printrestock.php?<?php echo 'datefrom='.$_REQUEST["datefrom"].'&dateto='.$_REQUEST["dateto"]; ?>" class="label label-info" target="_blank">Print</a>
			  
			 <!-- <a href="javascript:;" class="label label-primary" data-toggle="tooltip" data-placement="top" title="Export to excel" onclick="iframeExporter('../fxn/exportexcel.php?<?php //echo 'datefrom='.$_REQUEST["datefrom"].'&dateto='.$_REQUEST["dateto"]; ?>&dwat=2');">Export To Excel</a>-->
			  
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
              </div>
            </div>
			<!--box-header -->
               				
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
				  
				  if ($_REQUEST["datefrom"] != ''){
				  $sql = select2nav("SELECT count(tblrestock.id) as ctn FROM tblrestock INNER JOIN addbar ON tblrestock.itemid = addbar.id WHERE (tblrestock.regdate BETWEEN '".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."' AND '".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."') ORDER BY tblrestock.id DESC","SELECT tblrestock.*,addbar.name,addbar.measure FROM tblrestock INNER JOIN addbar ON tblrestock.itemid = addbar.id WHERE (tblrestock.regdate BETWEEN '".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."' AND '".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."') ORDER BY tblrestock.id DESC");	  
				  }else{
				  $sql = select2nav("SELECT count(tblrestock.id) as ctn FROM tblrestock INNER JOIN addbar ON tblrestock.itemid = addbar.id ORDER BY tblrestock.id DESC","SELECT tblrestock.*,addbar.name,addbar.measure FROM tblrestock INNER JOIN addbar ON tblrestock.itemid = addbar.id ORDER BY tblrestock.id DESC");
				  }
				  
				  
				  if($sql){
				  echo '<table class="table table-striped">
                    <tr>
                      <th>SN</th>
                      <th>Item Name</th>
                      <th>Qty Left</th>
					  <th>Qty Added</th>
					  <th>Total Stock</th>
					  <th>Selling Price</th>
					  <th>Cost Price</th>
					  <th>Date/Time</th>
					  <th nowrap>Staff</th> 
                    </tr>';
					
					while($rs = mysqli_fetch_assoc($qry)){
												
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["name"].'</td>';
						echo '<td>'.$rs["itemleft"].'</td>';
						echo '<td>'.$rs["qty"].'</td>';
						echo '<td>'.$rs["newstock"].'</td>';
						echo '<td>'.$rs["price"].'</td>';
						echo '<td>'.$rs["costprice"].'</td>';
						echo '<td>'.date("l, d M Y h:i A",$rs["regstamp"]).'</td>';
						echo '<td>'.$rs["staff"].'</td>';
						echo '</tr>';
					}
						echo '</table>';
					}else{
					echo '<div align="center">No record found.</div>';
					}
					
					
				?>
			    </div>
				<?php echo $nav; ?>
              </div>			  
			  
            </div>
          </div>
</section>
<!-- End Main content -->
</div>
<?php include_once 'inc/footer.php'; ?>