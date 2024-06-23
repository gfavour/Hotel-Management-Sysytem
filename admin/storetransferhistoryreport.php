<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php
loadStaff2Array();
?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Store Transfer History</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Store Transfer History</li>
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
				<span class="input-group-addon"><strong>From:</strong></span>
				<input type="date" name="datefrom" class="form-control" title="date from is required" value="">
				</div>
				</div>
				
				<div class="col-sm-4">
				<div class="form-group input-group">
				<span class="input-group-addon"><strong>To:</strong></span>
				<input type="date" name="dateto" class="form-control" title="date from is required" value="">
				</div>
				</div>

				<div class="col-sm-4">
				<div class="form-group input-group">
				<span class="input-group-addon"><strong>Item Name:</strong></span>
				<select name="itemname" id="itemname" class="form-control">
				<option value="">All</option>
				<?php
					echo SetStoreItemsOptions($_REQUEST["itemname"]);
				?>
				</select>
				</div>
				</div>
				
				<div class="col-sm-4">
				<div class="form-group input-group">
				<span class="input-group-addon"><strong>Order:</strong></span>
				<select name="arrangeby" id="arrangeby" class="form-control">
				<option value="DESC">DESCENDING ORDER</option>
				<option value="ASC">ASCENDING ORDER</option>
				</select>
				</div>
				</div>
				
				<div class="col-sm-4">
				<button class="btn btn-primary btn-md" style="margin-bottom:10px;"><i class="fa fa-book"></i> Search</button></div>
				</form>
				</div>
				
                </div>
			  
		<!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
		  
		  
			  <div class="box box-info">
			  
			  <!--box-header -->
			  <div class="box-header with-border">
              <h3 class="box-title"><?php if($_REQUEST["datefrom"] != '' && $_REQUEST["dateto"] != ''){ echo 'Item Transfer History Between '.$_REQUEST["datefrom"].' - '.$_REQUEST["dateto"]; }elseif($_REQUEST["datefrom"] != '' && $_REQUEST["dateto"] == ''){ echo 'Item Transfer History From '.$_REQUEST["datefrom"]; }elseif($_REQUEST["datefrom"] == '' && $_REQUEST["dateto"] != ''){ echo 'Item Transfer History Till '.$_REQUEST["dateto"]; }else{ echo ' Item Transfer History Till Date'; } ?></h3>
              <div class="box-tools pull-right">
			  <a href="printstoretransferhistoryreport.php?<?php echo 'itemname='.$_REQUEST["itemname"].'&datefrom='.$_REQUEST["datefrom"].'&dateto='.$_REQUEST["dateto"].'&arrangeby='.$_REQUEST["arrangeby"]; ?>" class="label label-info" target="_blank">Print</a>
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
              </div>
            </div>
			<!--box-header -->
               				
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
				  if($_REQUEST["datefrom"] != '' && $_REQUEST["dateto"] != ''){ 
				  $sqlqry = " tblstoretransfer.regdate BETWEEN '".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."' AND '".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."' "; 
				  }elseif($_REQUEST["datefrom"] != '' && $_REQUEST["dateto"] == ''){ 
				  $sqlqry = " tblstoretransfer.regdate >= '".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."' "; 
				  }elseif($_REQUEST["datefrom"] == '' && $_REQUEST["dateto"] != ''){ 
				  $sqlqry = " ";  
				  }
				  
				  if($sqlqry != ''){
				  	$sqlqry = ($_REQUEST["itemname"] != '')?" WHERE tblstoretransfer.itemid = '".mysqli_real_escape_string($conn4as,$_REQUEST["itemname"])."' AND ".$sqlqry:" WHERE ".$sqlqry;
				  }else{
				  	$sqlqry = ($_REQUEST["itemname"] != '')?" WHERE tblstoretransfer.itemid = '".mysqli_real_escape_string($conn4as,$_REQUEST["itemname"])."' ":" ";
				  }
				  
				  $arrangeby = ($_REQUEST["arrangeby"] != 'DESC' && $_REQUEST["arrangeby"] != 'ASC')?' DESC':' '.$_REQUEST["arrangeby"];
				  
				  if ($sqlqry != ''){
				  $sql = select2nav("SELECT count(tblstoretransfer.id) as ctn FROM tblstoretransfer INNER JOIN tblstore ON tblstoretransfer.itemid = tblstore.id ".$sqlqry." ORDER BY tblstoretransfer.id ".$arrangeby,"SELECT tblstoretransfer.*,tblstore.name,tblstore.qtyinstore,tblstore.measure FROM tblstoretransfer INNER JOIN tblstore ON tblstoretransfer.itemid = tblstore.id ".$sqlqry." ORDER BY tblstoretransfer.id ".$arrangeby);
				  }else{
				  $sql = select2nav("SELECT count(tblstoretransfer.id) as ctn FROM tblstoretransfer INNER JOIN tblstore ON tblstoretransfer.itemid = tblstore.id ORDER BY tblstoretransfer.id ".$arrangeby,"SELECT tblstoretransfer.*,tblstore.name,tblstore.qtyinstore,tblstore.measure FROM tblstoretransfer INNER JOIN tblstore ON tblstoretransfer.itemid = tblstore.id ORDER BY tblstoretransfer.id ".$arrangeby);
				  }
				  
				  
				  if($sql){
				  echo '<table class="table table-striped">
                    <tr>
                      <th>SN</th>
                      <th>Item Name</th>
                      <th>Bar Type</th>
					  <th>Qty Transferred</th>
					  <th>Date/Time</th>
					  <th nowrap>Transfered By</th> 
                    </tr>';
					
					while($rs = mysqli_fetch_assoc($qry)){
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["name"].'</td>';
						echo '<td>'.$barTypes[$rs["itemtype"]].'</td>';
						echo '<td>'.$rs["qty"].'</td>';
						echo '<td>'.date("Y-m-d h:i A",$rs["regstamp"]).'</td>';
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