<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php 
include_once 'inc/sidebar.php'; 
loadDurations();
?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Gym Payment History</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">gym payment history</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
            <div id="msgbox"></div>
			  
			  <!-- List of Room -->
			  <div class="box box-primary">
			  <!--box-header -->
			  <div class="box-header with-border">
              
			  <div class="pull-left"><form name="frmsearch" action="" method="get"><input type="hidden" name="dwat" value="search" /><input type="text" name="q" class="form-control input-sm pull-left" placeholder="Search by lastname" style="width:60%; "><div class="input-group-btn"><button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button> <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="btn btn-sm btn-default">All</a></div></form></div>
			  
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
              </div>
            </div>
			<!--box-header -->
               				
				<div class="box-body no-padding" style="margin-top:10px;">
                  <form name="reservation" id="reservation">
					<?php
					if ($_GET["dwat"] == 'search'){
					$sql = select2nav("SELECT count(gym.id) as ctn FROM gym INNER JOIN gym1 ON gym.id = gym1.userid INNER JOIN gympayments ON gym.id = gympayments.userid WHERE (gym.surname LIKE '%".$_GET["q"]."%' OR gym.firstname LIKE '%".$_GET["q"]."%' OR gym.phone LIKE '%".$_GET["q"]."%' OR gym1.regno LIKE '%".$_GET["q"]."%') ORDER BY gympayments.id DESC","SELECT gym.id,gym.surname,gym.firstname,gym.phone,gym1.regno,gympayments.invoiceid,gympayments.duration,gympayments.startdate,gympayments.enddate,gympayments.amount,gympayments.amountpaid FROM gym INNER JOIN gym1 ON gym.id = gym1.userid INNER JOIN gympayments ON gym.id = gympayments.userid WHERE (gym.surname LIKE '%".$_GET["q"]."%' OR gym.firstname LIKE '%".$_GET["q"]."%' OR gym.phone LIKE '%".$_GET["q"]."%' OR gym1.regno LIKE '%".$_GET["q"]."%') ORDER BY gympayments.id DESC");
					}else{
					$sql = select2nav("SELECT count(gym.id) as ctn FROM gym INNER JOIN gym1 ON gym.id = gym1.userid INNER JOIN gympayments ON gym.id = gympayments.userid ORDER BY gympayments.id DESC","SELECT gym.id,gym.surname,gym.firstname,gym.phone,gym1.regno,gympayments.invoiceid,gympayments.duration,gympayments.startdate,gympayments.enddate,gympayments.amount,gympayments.amountpaid FROM gym INNER JOIN gym1 ON gym.id = gym1.userid INNER JOIN gympayments ON gym.id = gympayments.userid ORDER BY gympayments.id DESC");
					}
					
					if($sql){
				  echo '<table class="table table-striped">
                    <tr>
					  <th>SN</th>
                      <th>CWF No</th>
					  <th>Name</th>
                      <th>Phone No.</th>
					  <th>Duration</th>
					  <th>Start Date</th>
					  <th>End Date</th>
					  <th>Due Amount</th>
					  <th>Amount Paid</th>
					  <th>Status</th>
					  <th>&nbsp;</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
					if ($globalrole == 'admin'){
						$delBtn = '<a href="javascript:;" onclick="confirmdel(\'id='.$rs["id"].'&tbl=gym&dwat=del\',\'../fxn/process1.php\',\'\')">Delete</a>';
					}else{
						$delBtn = '<a href="javascript:;">Delete</a>';
					}
						$nowtimestamp = time();
						$enddate = strtotime($rs["enddate"]);
						if($enddate < $nowtimestamp){ 
							$status = '<span class="red">Expired</span>'; 
							$btn = '<a href="gymrenew.php?id='.$rs["id"].'" class="btn btn-sm btn-warning">Renew</a>';
						}else{ 
							$status = '<span class="green">Valid</span>'; 
							$btn = '<a href="gymreceipt.php?id='.$rs["id"].'&invoiceid='.$rs["currentinv"].'" class="btn btn-sm btn-info">Receipt</a>';
						}
						
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["regno"].'</td>';
						echo '<td>'.$rs["surname"].' '.$rs["firstname"].'</td>';
						echo '<td>'.$rs["phone"].'</td>';
						echo '<td>'.$rs["duration"].' month(s)</td>';
						echo '<td>'.$rs["startdate"].'</td>';
						echo '<td>'.$rs["enddate"].'</td>';
						echo '<td>'.$sign.number_format($rs["amount"],0).'</td>';
						echo '<td>'.$sign.number_format($rs["amountpaid"],0).'</td>';
						echo '<td>'.$status.'</td>';
						echo '<td>'.$btn.'</td></tr>';
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