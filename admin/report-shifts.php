<?php 
include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php 
//loadStaff2Array(); 
?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Shifts Report</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Shifts Report</li>
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
				
				<div class="col-sm-6">
				<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa"><strong>From:</strong></i></span>
				<input type="date" name="datefrom" class="form-control" title="date from is required" required value="<?php echo $_GET["datefrom"]; ?>" style="width:55%;"><input type="time" name="timefrom" id="timefrom" value="<?php echo $_GET["timefrom"]; ?>" class="form-control" required style="width:45%;">
				</div>
				</div>
				
				<div class="col-sm-6">
				<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa"><strong>To:</strong></i></span>
				<input type="date" name="dateto" class="form-control" title="date from is required" required value="<?php echo $_GET["dateto"]; ?>" style="width:55%;"><input type="time" name="timeto" id="timeto" value="<?php echo $_GET["timeto"]; ?>" class="form-control" required style="width:45%;">
				</div>
				</div>
				
				<div class="col-sm-6">
				<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa"><strong>Staffs</strong></i></span>
				<select name="barman" id="barman" class="form-control">
				<option value="">All</option>
				<?php echo SetBarManOptions($_GET["barman"]); ?>
				</select>
				</div>
				</div>
								
				
				<div class="col-sm-4">
				<button class="btn btn-primary btn-md" style="margin-bottom:10px;"><i class="fa fa-book"></i> Generate Report</button></div>
				</form>
				</div>
				
                </div>
			  
				<div id="msgbox"></div>
		  
		  
			  <div class="box box-info">
			  <div class="box-header with-border">
              <h3 class="box-title"><?php echo ($_GET["datefrom"] != '')?'Open/Close Shift Report Between'.$_REQUEST["datefrom"].' '.hr24to12($_REQUEST["timefrom"]).' - '.$_REQUEST["dateto"].' '.hr24to12($_REQUEST["timeto"]):'Open/Close Shift Report'; ?> </h3>
              <div class="box-tools pull-right">
			  <!--<a href="printshiftreport.php?<?php //echo 'datefrom='.$_REQUEST["datefrom"].'&timefrom='.$_REQUEST["timefrom"].'&timeto='.$_REQUEST["timeto"].'&dateto='.$_REQUEST["dateto"].'&barman='.$_REQUEST["barman"]; ?>" class="label label-info" target="_blank">Print report</a>-->
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
			  				
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
				  if ($_REQUEST["barman"] != ''){
				  		$filter_staff = " userid = '".mysqli_real_escape_string($conn4as,$_GET["barman"])."' ";
				  }else{
				  		$filter_staff = "";
				  }
				 				  
				  if ($_REQUEST["timefrom"] != '' && $_REQUEST["timeto"] != ''){
				  		$filter_staff = ($filter_staff != '')?$filter_staff.' AND ':$filter_staff;
				  		$filter_dt = " TIMESTAMP(STR_TO_DATE(openshift,'%Y-%m-%d %l:%i %p')) >= TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timefrom"])."') AND TIMESTAMP(STR_TO_DATE(closeshift,'%Y-%m-%d %l:%i %p')) <= TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timeto"])."') ";
				  }elseif ($_REQUEST["datefrom"] != '' && $_REQUEST["timefrom"] != ''){
				  		$filter_staff = ($filter_staff != '')?$filter_staff.' AND ':$filter_staff;
				  		$filter_dt = " TIMESTAMP(STR_TO_DATE(openshift,'%Y-%m-%d %l:%i %p')) >= TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timefrom"])."') ";
				  }
				  
				  if($filter_staff == '' && $filter_dt == ''){
				  	$conQry = " ";
				  }else{
				  	$conQry = " WHERE ".$filter_staff.$filter_dt;
				  }
				  
				  $sql = select2nav("SELECT count(id) as ctn FROM tblshifts ".$conQry." ORDER BY id DESC","SELECT * FROM tblshifts ".$conQry." ORDER BY id DESC");
				  
				  if($sql){
				  //$BarManName = $AllBarMan[$_GET["barman"]];
				  	echo '<table class="table table-striped">
						<tr>
						  <th>SN</th>
						  <th>Staff Name</th>
						  <th>Open Shift</th>
						  <th>Close Shift</th>
						  <th>Account Type</th>
						  <th>Excel Path</th>
						</tr>';
					while($rs = mysqli_fetch_assoc($qry)){
							
							if($rs["closeshift"] != ''){
								$delBtn = '<a href="javascript:;" class="label label-danger" onclick="confirmdel(\'id='.$rs["id"].'&dwat=delshift\',\'../fxn/process1.php\',\'\')"><i class="fa fa-trash"></i></a>';
							}else{
								$delBtn = '<span class="label label-grey"><i class="fa fa-trash"></i></span>';
							}
							
							echo '<tr>';
							echo '<td>'.$c++.'</td>';
							echo '<td>'.$allBarMan[$rs["userid"]]["name"].'</td>';
							echo '<td>'.$rs["openshift"].'</td>';
							echo '<td>'.$rs["closeshift"].'</td>';
							echo '<td>'.ucwords($rs["servicetype"]).'</td>';
							echo '<td>'.$rs["xlsurl"].'</td>';
							echo '<td align="center"><a href="ms-excel:ofe|u|'.$ROOTHTTP.'backup/shifts/'.$rs["xlsurl"].'" class="label label-success">Open</a> <a href="../backup/shifts/'.$rs["xlsurl"].'" class="label label-primary">Download</a> '.$delBtn.'</td>';
							echo '</tr>';
					}
					echo '</table>';
				 }else{
						echo '<div align="center">No open/close shift found.</div>';
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