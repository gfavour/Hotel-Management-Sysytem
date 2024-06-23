<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Cabs Payment</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Cabs Payment</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-11">
              <a href="manage-cabs.php" style="margin-right:10px; margin-bottom:5px;" class="btn btn-sm btn-primary"><i class="fa fa-car"></i> Pay Cab</a>
						
			  
		<!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
			  <!-- List of Room -->
			  <div class="box box-primary">
			  <!--box-header -->
			  <div class="box-header with-border">
              
			  <div class="pull-left"><form name="frmsearch" action="" method="get"><input type="hidden" name="dwat" value="search" /><span class="input-sm pull-left"><strong>From: </strong></span><input type="date" name="dfrom" class="form-control input-sm pull-left" style="width:200px; margin-right:3px;"><span class="input-sm pull-left"><strong>To: </strong></span><input type="date" name="dto" class="form-control input-sm pull-left" style="width:200px; margin-right:3px;"> <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button> <button type="button" onclick="go2('<?php echo $_SERVER['PHP_SELF']; ?>');" class="btn btn-sm btn-default">All</button> <button type="button" onclick="go2('<?php echo "printcab.php?dfrom=".$_REQUEST["dfrom"]."&dto=".$_REQUEST["dto"]; ?>');" class="btn btn-sm btn-info">Print</button></form></div>
			  
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
					$sql = select2nav("SELECT count(paycab.id) as ctn FROM paycab INNER JOIN addcab ON paycab.cabid = addcab.id WHERE (paycab.payrealdate BETWEEN '".mysqli_real_escape_string($conn4as,$_GET["dfrom"])."' AND '".mysqli_real_escape_string($conn4as,$_GET["dto"])."') ORDER BY paycab.id","SELECT paycab.*,addcab.carno,addcab.lastname,addcab.firstname,addcab.phone FROM paycab INNER JOIN addcab ON paycab.cabid = addcab.id WHERE (paycab.payrealdate BETWEEN '".mysqli_real_escape_string($conn4as,$_GET["dfrom"])."' AND '".mysqli_real_escape_string($conn4as,$_GET["dto"])."') ORDER BY paycab.id DESC");
					}else{
					$sql = select2nav("SELECT count(paycab.id) as ctn FROM paycab INNER JOIN addcab ON paycab.cabid = addcab.id ORDER BY paycab.id","SELECT paycab.*,addcab.carno,addcab.lastname,addcab.firstname,addcab.phone FROM paycab INNER JOIN addcab ON paycab.cabid = addcab.id ORDER BY paycab.id DESC");
					}
					
					if($sql){
				  echo '<table class="table table-striped">
                    <tr>
					  <th>SN</th>
                      <th>Car Number</th>
					  <th>Name</th>
                      <th>Phone No.</th>
                      <th>Amount</th>
					  <th>Date/Time</th>
					  <th>&nbsp;</th>
					  <th>&nbsp;</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
					if ($globalrole == 'admin'){
						$delBtn = '<a href="javascript:;" class="btn btn-xs btn-danger" onclick="confirmdel(\'id='.$rs["id"].'&tbl=paycab&dwat=del\',\'../fxn/process1.php\',\'\')">Delete</a>';
						$editBtn = '<a href="editpayment.php?id='.$rs["id"].'" class="btn btn-xs btn-info">Edit Payment</a>';
					}else{
						$delBtn = '<span class="btn btn-xs btn-default">Delete</span>';
						$editBtn = '<span class="btn btn-xs btn-default">Edit Payment</span>';
					}
						if($rs["phone"] != ''){ $phone = $rs["phone"]; }else{ $phone = 'N/A'; }
						
						echo '<tr>';
						//echo '<td><input type="radio" value="'.$rs["id"].'" name="chkid" id="chkid" title="'.$rs["id"].'"></td>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["carno"].'</td>';
						echo '<td>'.$rs["lastname"].' '.$rs["firstname"].'</td>';
						echo '<td>'.$phone.'</td>';
						echo '<td>'.$rs["amount"].'</td>';
						echo '<td>'.date("Y-m-d h:i A",$rs["paydate"]).'</td>';
						echo '<td>'.$editBtn.'</td>';
						echo '<td>'.$delBtn.'</td>';
						echo '</tr>';
					}
						echo '</table>';
					}else{
					echo '<div align="center">No cab found.</div>';
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