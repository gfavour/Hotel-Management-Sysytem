<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php
loadStaff2Array();
$storeid = $_REQUEST["id"];
?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Transfer History</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Transfer History</li>
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
				<input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" />
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
              <h3 class="box-title">Item Transfer from store to bar between <?php echo ($_REQUEST["datefrom"] != '')?' Between '.$_REQUEST["datefrom"].' - '.$_REQUEST["dateto"]:''; ?></h3>
              <div class="box-tools pull-right">
			  <a href="printstorehistory.php?<?php echo 'id='.$storeid.'&datefrom='.$_REQUEST["datefrom"].'&dateto='.$_REQUEST["dateto"]; ?>" class="label label-info" target="_blank">Print</a>
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
              </div>
            </div>
			<!--box-header -->
               				
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
				  
				  if ($_REQUEST["datefrom"] != ''){
				  $sql = select2nav("SELECT count(tblstoretransfer.id) as ctn FROM tblstoretransfer INNER JOIN tblstore ON tblstoretransfer.itemid = tblstore.id WHERE (tblstoretransfer.regdate BETWEEN '".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."' AND '".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."') ORDER BY tblstoretransfer.id DESC","SELECT tblstoretransfer.*,tblstore.name,tblstore.measure FROM tblstoretransfer INNER JOIN tblstore ON tblstoretransfer.itemid = tblstore.id WHERE (tblstoretransfer.regdate BETWEEN '".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."' AND '".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."') ORDER BY tblstoretransfer.id DESC");	  
				  }else{
				  $sql = select2nav("SELECT count(tblstoretransfer.id) as ctn FROM tblstoretransfer INNER JOIN tblstore ON tblstoretransfer.itemid = tblstore.id ORDER BY tblstoretransfer.id DESC","SELECT tblstoretransfer.*,tblstore.name,tblstore.measure FROM tblstoretransfer INNER JOIN tblstore ON tblstoretransfer.itemid = tblstore.id ORDER BY tblstoretransfer.id DESC");
				  }
				  
				  
				  if($sql){
				  echo '<table class="table table-striped">
                    <tr>
                      <th>SN</th>
                      <th>Item Name</th>
                      <th>Bar Type</th>
					  <th>Qty Transferred</th>
					  <th>Date/Time</th>
					  <th nowrap>Staff</th> 
                    </tr>';
					
					while($rs = mysqli_fetch_assoc($qry)){
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["name"].'</td>';
						echo '<td>'.$barTypes[$rs["itemtype"]].'</td>';
						echo '<td>'.$rs["qty"].'</td>';
						echo '<td>'.date("l, d M Y h:i A",$rs["regstamp"]).'</td>';
						echo '<td>'.$allstaffs[$rs["staff"]].'</td>';
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