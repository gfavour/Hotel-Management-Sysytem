<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; loadStaff2Array(); ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Expenditure Management</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Expenses</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
<div class="col-xs-12">
<div id="msgbox"></div>
<div style="padding:0;"><button class="btn btn-primary btn-sm" style="margin-right:10px; margin-bottom:5px;" id="jqbtn1"><i class="fa fa-plus"></i> Add Expenses</button></div>
<?php include("insert-new-expensis.php"); ?>			  
			  <!-- List of Room -->
			  <div class="box box-primary">
			  <!--box-header -->
			  <div class="box-header with-border">
              
			  <div class="pull-left"><form name="frmsearch" action="" method="get"><input type="hidden" name="dwat" value="search" /><input type="text" name="q" class="form-control input-sm pull-left" placeholder="Search by date, staff" style="width:300px; margin-right:3px;"> <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button> <button type="button" onclick="go2('<?php echo $_SERVER['PHP_SELF']; ?>');" class="btn btn-sm btn-default">All</button></form></div>
			  
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
					$sql = select2nav("SELECT count(id) as ctn FROM expenditure WHERE (title LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%') ORDER BY id","SELECT * FROM expenditure WHERE (title LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%' ) ORDER BY id");
					}else{
					$sql = select2nav("SELECT count(id) as ctn FROM expenditure ORDER BY id","SELECT * FROM expenditure ORDER BY id");
					}
					
					if($sql){
				  echo '<table class="table table-striped">
                    <tr>
					  <th>SN</th>
                      <th>Title</th>
                      <th>Date</th>
                      <th>Amount</th>
                      <th>Description</th>
                      <th>Department</th>
                      <th>Approved By</th>
					  <th>&nbsp;</th>
					  <th>&nbsp;</th>
					  <th>&nbsp;</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						
						if($globalrole == 'admin' || $globalrole == 'manager'){
						$delBtn = '<a href="javascript:;" class="label label-danger" onclick="confirmdel(\'id='.$rs["id"].'&dwat=delexp\',\'../fxn/process1.php\',\'\')">Delete</a>';
						$aprBtn = ($rs["approveby"] == '' || $rs["approveby"] == '0')?'<a href="javascript:javascript:;" class="label label-success" onclick="confirmaction(\'Are you sure you want to approve?\',\'id='.$rs["id"].'&dwat=approveExp\',\'../fxn/process1.php\',\'\')">Approve</a>':'<a href="javascript:;" class="label label-default">Approved</a>';
						}else{
						$delBtn = '<a href="javascript:;" class="label label-grey">Delete</a>';
						$aprBtn = '<a href="javascript:;" class="label label-grey">Approve</a>';
						}
						
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["title"].'</td>';
						echo '<td>'.$rs["expdate"].'</td>';
						echo '<td>'.$rs["amount"].'</td>';
						echo ($rs["description"] == '')?'<td>N/A</td>':'<td>'.$rs["description"].'</td>';
						echo '<td>'.$expDept[$rs["dept"]].'</td>';
						echo ($rs["approveby"] == '' || $rs["approveby"] == '0')?'<td>Not set</td>':'<td>'.$allstaffs[$rs["approveby"]].'</td>';
						echo '<td>'.$aprBtn.'</td>';
						echo ($globalrole == 'admin' || $globalrole == 'manager')?'<td><a href="editexp.php?id='.$rs["id"].'" class="label label-warning">Edit</a></td>':'<td><a href="javascript:;" class="label label-grey">Edit</a></td>';
						echo '<td>'.$delBtn.'</td>';
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