<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Manage Cabs</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Cabs</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-11">
              <button class="btn btn-primary btn-sm" style="margin-right:10px; margin-bottom:5px;" id="jqbtn1"><i class="fa fa-user"></i> Add New Cab</button>
						
			  
		<!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
		<?php include("insert-new-cab.php"); ?>
			  
			  <!-- List of Room -->
			  <div class="box box-primary">
			  <!--box-header -->
			  <div class="box-header with-border">
              
			  <div class="pull-left"><form name="frmsearch" action="" method="get"><input type="hidden" name="dwat" value="search" /><input type="text" name="q" class="form-control input-sm pull-left" placeholder="Search by car plate number" style="width:300px; margin-right:3px;"> <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button> <button type="button" onclick="go2('<?php echo $_SERVER['PHP_SELF']; ?>');" class="btn btn-sm btn-default">All</button></form></div>
			  
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
					$sql = select2nav("SELECT count(id) as ctn FROM addcab WHERE (lastname LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%' OR firstname LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%' OR carno LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%') ORDER BY id","SELECT * FROM addcab WHERE (lastname LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%' OR firstname LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%' OR carno LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%') ORDER BY id");
					}else{
					$sql = select2nav("SELECT count(id) as ctn FROM addcab ORDER BY id","SELECT * FROM addcab ORDER BY id DESC");
					}
					
					if($sql){
				  echo '<table class="table table-striped">
                    <tr>
					  <th>SN</th>
                      <th>Car Number</th>
					  <th>Last Name</th>
                      <th>First Name</th>
                      <th>Email</th>
                      <th>Phone No.</th>
                      <th>Address</th>
					  <th>&nbsp;</th>
					  <th>&nbsp;</th>
					  <th>&nbsp;</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
					if ($globalrole == 'admin'){
						$delBtn = '<a href="javascript:;" class="btn btn-xs btn-danger" onclick="confirmdel(\'id='.$rs["id"].'&tbl=addcab&dwat=del\',\'../fxn/process1.php\',\'\')">Delete</a>';
						$payBtn = '<a href="paycab.php?id='.$rs["id"].'" class="btn btn-xs btn-warning">Make Payment</a>';
					}else{
						$payBtn = '<span class="btn btn-xs btn-default">Make Payment</span>';
						$delBtn = '<span class="btn btn-xs btn-default">Delete</span>';
					}
						if($rs["email"] != ''){ $email = $rs["email"]; }else{ $email = 'N/A'; }
						if($rs["phone"] != ''){ $phone = $rs["phone"]; }else{ $phone = 'N/A'; }
						if($rs["address"] != ''){ $address = $rs["address"]; }else{ $address = 'N/A'; }
						
						echo '<tr>';
						//echo '<td><input type="radio" value="'.$rs["id"].'" name="chkid" id="chkid" title="'.$rs["id"].'"></td>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["carno"].'</td>';
						echo '<td>'.$rs["lastname"].'</td>';
						echo '<td>'.$rs["firstname"].'</td>';
						echo '<td>'.$email.'</td>';
						echo '<td>'.$phone.'</td>';
						echo '<td>'.$address.'</td>';
						echo '<td>'.$payBtn.'</td>';						
						echo '<td><a href="editcab.php?id='.$rs["id"].'" class="btn btn-xs btn-info">Edit Details</a></td>';
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