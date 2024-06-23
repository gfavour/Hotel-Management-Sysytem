<?php include_once 'inc/head.php'; 
loadAllCompany2Array();
?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Manage Guests</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Guests</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
              <strong>Please note: </strong> If you delete any guest, its record including all orders tagged to such guest will be deleted as well.<br /><br />
			  <!--Top Buttons + Search Box -->
			  <div style="margin:0 0 10px 0;"><button class="btn btn-primary btn-sm" style="margin-right:10px;" id="jqbtn1"><i class="fa fa-user"></i> Add Guest</button></div>
			  
		<!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
		<?php include("insert-new-guest.php"); ?>
			  
			  <!-- List of Room -->
			  <div class="box box-primary">
			  <!--box-header -->
			  <div class="box-header with-border">
              
			  <div class="pull-left"><form name="frmsearch" action="" method="get"><input type="hidden" name="dwat" value="search" /><input type="text" name="q" class="form-control input-sm pull-left" placeholder="Search by lastname, firstname, phone" style="width:300px; margin-right:3px;"> <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button> <button type="button" onclick="go2('<?php echo $_SERVER['PHP_SELF']; ?>');" class="btn btn-sm btn-default">All</button></form></div>
			  
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
					$sql = select2nav("SELECT count(id) as ctn FROM addclient WHERE (lastname LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%' OR firstname LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%' OR phone LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%') ORDER BY id","SELECT * FROM addclient WHERE (lastname LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%' OR firstname LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%' OR phone LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%') ORDER BY id");
					}else{
					$sql = select2nav("SELECT count(id) as ctn FROM addclient ORDER BY id","SELECT * FROM addclient ORDER BY id");
					}
					
					if($sql){
				  echo '<table class="table table-striped">
                    <tr>
					  <th>SN</th>
                      <th>Last Name</th>
                      <th>First Name</th>
                      <th>Email</th>
                      <th>Phone No.</th>
                      <th>Company/Host</th>
					  <th>&nbsp;</th>
					  <th>&nbsp;</th>
					  <th>&nbsp;</th>
					  <th>&nbsp;</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
					if ($globalrole == 'admin' && $rs["id"] != 1){
						$delBtn = '<a href="javascript:;" class="btn btn-sm btn-danger" onclick="confirmdel(\'id='.$rs["id"].'&tbl=addclient&dwat=del\',\'../fxn/process1.php\',\'\')">Delete</a>';
					}else{
						$delBtn = '<span class="btn btn-sm btn-default">Delete</span>';
					}
						if($rs["email"] != ''){ $email = $rs["email"]; }else{ $email = '-'; }
						if($rs["phone"] != ''){ $phone = $rs["phone"]; }else{ $phone = '-'; }
						if($rs["company"] != ''){ $company = $rs["company"]; }else{ $company = '-'; }
						
						if($rs["id"] == '1' && $globalrole == 'receptionist'){ $orderbtn = ''; }else{ 
							// $orderbtn = '<a href="order.php?clientid='.$rs["id"].'" class="btn btn-sm btn-primary">Order Now</a>'; 
						}
						
						echo '<tr>';
						//echo '<td><input type="radio" value="'.$rs["id"].'" name="chkid" id="chkid" title="'.$rs["id"].'"></td>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["lastname"].'</td>';
						echo '<td>'.$rs["firstname"].'</td>';
						echo '<td>'.$email.'</td>';
						echo '<td>'.$phone.'</td>';
						echo '<td>'.$allCompanyArray[$company]["name"].'</td>';
						echo '<td style="width:100px;">'.$orderbtn.'</td>';						
						echo '<td style="width:50px;"><a href="editguest.php?id='.$rs["id"].'" class="btn btn-sm btn-info">Edit</a></td>';
						echo ($rs["id"] != '1')?'<td style="width:50px;"><a href="javascript:popupwin(\'printguest.php?id='.$rs["id"].'\',\'600\',\'500\');" class="btn btn-sm btn-warning">Print</a></td>':'<td style="width:50px;"><a href="javascript:;" class="btn btn-sm btn-default">Print</a></td>';
						//echo '<td style="width:100px;"><a href="orderfree.php?clientid='.$rs["id"].'" class="btn btn-sm btn-warning">Order Free</a></td>';
						echo '<td style="width:100px;">'.$delBtn.'</td>';
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