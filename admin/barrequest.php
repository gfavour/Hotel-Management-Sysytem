<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; loadStaff2Array(); ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Bar Request</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Bar Request</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
<div class="col-xs-10">
<div style="margin-bottom:10px"><button class="btn btn-primary btn-sm" style="" id="jqbtn1"><i class="fa fa-plus"></i> Add New Request</button></div>
<div id="msgbox"></div>
<?php include("insert-new-barrequest.php"); ?>			  
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
               				
				<div class="box-body table-responsive no-padding">
                  <form name="reservation" id="reservation">
					<?php
					if ($_GET["dwat"] == 'search'){
					$sql = select2nav("SELECT count(id) as ctn FROM barrequest WHERE (itemname LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%') ORDER BY id","SELECT * FROM barrequest WHERE (itemname LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%' ) ORDER BY id");
					}else{
					$sql = select2nav("SELECT count(id) as ctn FROM barrequest ORDER BY id","SELECT * FROM barrequest ORDER BY id");
					}
					
					if($sql){
				  echo '<table class="table table-striped">
                    <tr>
					  <th>SN</th>
                      <th>Item Name</th>
                      <th>Bar Type</th>
                      <th>Quantity</th>
                      <th>Request By</th>
                      <th>Approved By</th>
					  <th>Date</th>
					  <th>&nbsp;</th>
					  <th>&nbsp;</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						
						if($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'store'){
						$delBtn = '<a href="javascript:;" class="label label-danger" onclick="confirmdel(\'id='.$rs["id"].'&dwat=delbarrequest\',\'../fxn/process1.php\',\'\')">Delete</a>';
						$aprBtn = ($rs["approveby"] == '' || $rs["approveby"] == '0')?'<a href="javascript:javascript:;" class="label label-success" onclick="confirmaction(\'Are you sure you want to approve?\',\'id='.$rs["id"].'&dwat=approveBarReq\',\'../fxn/process1.php\',\'\')">Approve</a>':'<a href="javascript:;" class="label label-default">Approved</a>';
						}else{
						$delBtn = '<a href="javascript:;" class="label label-grey">Delete</a>';
						$aprBtn = '<a href="javascript:;" class="label label-grey">Approve</a>';
						}
						
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["itemname"].'</td>';
						echo '<td>'.$barTypes[$rs["bartype"]].'</td>';
						echo '<td>'.$rs["qty"].'</td>';
						echo '<td>'.$allstaffs[$rs["staffid"]].'</td>';
						echo ($rs["approveby"] == '' || $rs["approveby"] == '0')?'<td>Not set</td>':'<td>'.$allstaffs[$rs["approveby"]].'</td>';
						echo '<td>'.$aprBtn.'</td>';
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