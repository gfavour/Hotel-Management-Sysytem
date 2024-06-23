<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php 
include_once 'inc/sidebar.php'; 
loadDurations();
?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Gym Members</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">gym members</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
              <strong>Note: </strong> To fill new membership application form click <strong>register new member</strong> button below to register member.<br />
			  <!--Top Buttons + Search Box -->
			  <button class="btn btn-primary btn-sm" style="margin:10px 0;" id="jqbtn1"><i class="fa fa-user"></i> Register New Member</button>
			  
		<!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
		<?php include("insert-new-gym.php"); ?>
			  
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
					$sql = select2nav("SELECT count(gym.id) as ctn FROM gym INNER JOIN gym1 ON gym.id = gym1.userid INNER JOIN gympayments ON gym.id = gympayments.userid WHERE (gym.surname LIKE '%".$_GET["q"]."%' OR gym.firstname LIKE '%".$_GET["q"]."%' OR gym.phone LIKE '%".$_GET["q"]."%' OR gym1.regno LIKE '%".$_GET["q"]."%') AND (gym.currentinv = gympayments.invoiceid) ORDER BY gym.id DESC","SELECT gym.*,gym1.regno,gympayments.invoiceid,gympayments.duration,gympayments.startdate,gympayments.enddate,gympayments.amount,gympayments.amountpaid FROM gym INNER JOIN gym1 ON gym.id = gym1.userid INNER JOIN gympayments ON gym.id = gympayments.userid WHERE (gym.surname LIKE '%".$_GET["q"]."%' OR gym.firstname LIKE '%".$_GET["q"]."%' OR gym.phone LIKE '%".$_GET["q"]."%' OR gym1.regno LIKE '%".$_GET["q"]."%') AND (gym.currentinv = gympayments.invoiceid) ORDER BY gym.id DESC");
					}else{
					$sql = select2nav("SELECT count(gym.id) as ctn FROM gym INNER JOIN gym1 ON gym.id = gym1.userid INNER JOIN gympayments ON gym.id = gympayments.userid WHERE (gym.currentinv = gympayments.invoiceid) ORDER BY gym.id DESC","SELECT gym.*,gym1.regno,gympayments.invoiceid,gympayments.duration,gympayments.startdate,gympayments.enddate,gympayments.amount,gympayments.amountpaid FROM gym INNER JOIN gym1 ON gym.id = gym1.userid INNER JOIN gympayments ON gym.id = gympayments.userid WHERE (gym.currentinv = gympayments.invoiceid) ORDER BY gym.id DESC");
					}
					
					if($sql){
				  echo '<table class="table table-striped">
                    <tr>
					  <th>SN</th>
                      <th>CWF No</th>
					  <th>Surname</th>
                      <th>First Name</th>
                      <th>Email</th>
                      <th>Phone No.</th>
					  <th>Duration</th>
					  <th>Start Date</th>
					  <th>End Date</th>
					  <th>Due Amount</th>
					  <th>Amount Paid</th>
					  <th>&nbsp;</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
					if ($globalrole == 'admin'){
						$delBtn = '<a href="javascript:;" onclick="confirmdel(\'id='.$rs["id"].'&tbl=gym&dwat=del\',\'../fxn/process1.php\',\'\')">Delete</a>';
					}else{
						$delBtn = '<a href="javascript:;">Delete</a>';
					}
						echo '<tr>';
						/*
						
            <li><a href="gymform.php?id='.$rs["id"].'&invoiceid='.$rs["currentinv"].'" target="_Blank">Print Form</a></li>
			<li><a href="editgym.php?id='.$rs["id"].'">Edit Form</a></li>
						*/
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["regno"].'</td>';
						echo '<td>'.$rs["surname"].'</td>';
						echo '<td>'.$rs["firstname"].'</td>';
						echo '<td>'.$rs["email"].'</td>';
						echo '<td>'.$rs["phone"].'</td>';
						echo '<td>'.$rs["duration"].' mth(s)</td>';
						echo '<td>'.$rs["startdate"].'</td>';
						echo '<td>'.$rs["enddate"].'</td>';
						echo '<td>'.$sign.number_format($rs["amount"],0).'</td>';
						echo '<td>'.$sign.number_format($rs["amountpaid"],0).'</td>';
						echo '<td>';
						echo '<div class="btn-group dropup">
        <button type="button" data-toggle="dropdown" class="btn btn-sm btn-danger dropdown-toggle dropdown-toggle-split">Action <span class="caret"></span></button>
        <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="gymreceipt.php?id='.$rs["id"].'&invoiceid='.$rs["currentinv"].'" target="_Blank">Receipt</a></li>
            <li class="divider"></li>
            <li>'.$delBtn.'</li>
        </ul>
    </div>';
						echo '</td></tr>';
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