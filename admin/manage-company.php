<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Manage Companies</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Companies</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-10">
              <strong>Please note: </strong> If you delete any company below it may affect guest records so be careful.<br /><br />
			  
			  <div style="margin:0 0 10px 0;"><button class="btn btn-primary btn-sm" style="margin-right:10px;" id="jqbtn1"><i class="fa fa-user"></i> Add New Company</button></div>
			  
		<!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
		<?php include("insert-new-company.php"); ?>
			  
			  <!-- List of Room -->
			  <div class="box box-primary">
			  <!--box-header -->
			  <div class="box-header with-border">
              
			  <div class="pull-left"><form name="frmsearch" action="" method="get"><input type="hidden" name="dwat" value="search" /><input type="text" name="q" class="form-control input-sm pull-left" placeholder="Search by company, contact-person, phone" style="width:300px; margin-right:3px;"> <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button> <button type="button" onclick="go2('<?php echo $_SERVER['PHP_SELF']; ?>');" class="btn btn-sm btn-default">All</button></form></div>
			  
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
					$sql = select2nav("SELECT count(id) as ctn FROM tblcompany WHERE (name LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%' OR contactperson LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%' OR phone LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%') ORDER BY id","SELECT * FROM tblcompany WHERE (name LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%' OR contactperson LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%' OR phone LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%') ORDER BY id");
					}else{
					$sql = select2nav("SELECT count(id) as ctn FROM tblcompany ORDER BY id","SELECT * FROM tblcompany ORDER BY id");
					}
					
					if($sql){
				  echo '<table class="table table-striped table-bordered">
                    <tr>
					  <th>SN</th>
                      <th>Company Name</th>
                      <th>Contact Person</th>
                      <th>Phone</th>
                      <th>Address</th>
					  <th>&nbsp;</th>
					  <th>&nbsp;</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
					$delBtn = '<a href="javascript:;" class="btn btn-sm btn-danger" onclick="confirmdel(\'id='.$rs["id"].'&tbl=tblcompany&dwat=del\',\'../fxn/process1.php\',\'\')">Delete</a>';
						if($rs["phone"] != ''){ $phone = $rs["phone"]; }else{ $phone = '-'; }
						if($rs["address"] != ''){ $address = $rs["address"]; }else{ $address = '-'; }
						if($rs["contactperson"] != ''){ $contactperson = $rs["contactperson"]; }else{ $contactperson = '-'; }
						
						echo '<tr>';
						//echo '<td><input type="radio" value="'.$rs["id"].'" name="chkid" id="chkid" title="'.$rs["id"].'"></td>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["name"].'</td>';
						echo '<td>'.$contactperson.'</td>';
						echo '<td>'.$phone.'</td>';
						echo '<td>'.$address.'</td>';
						echo '<td style="width:50px;"><a href="editcompany.php?id='.$rs["id"].'" class="btn btn-sm btn-info">Edit</a></td>';
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