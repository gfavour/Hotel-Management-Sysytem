<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Manage Waiters</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">waiters</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-8">
              
			  <!--Top Buttons + Search Box -->
			  <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">&nbsp;</h3>
				  <div class="box-tools">
				     <div class="input-group" style="padding-left:10px;">
					 <div class="input-group-btn">
						<button class="btn btn-primary btn-sm" style="margin-right:10px;" id="jqbtn1"><i class="fa fa-user"></i> Add New Waiter</button>
						<!--<button class="btn btn-warning btn-sm" style="margin-right:10px;" onclick="openurl('order.php?clientid=',document.reservation.chkid.value,'Please select a guest to add new order')"><i class="fa fa-table"></i> New Order</button>-->
						</div>
                     
                    </div>
                  </div>
                </div><!-- /.box-header -->
                </div>
			  
		<!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
		
		
		<div class="box box-primary" style="margin-top:10px; display:none;" id="jqdiv1">
<div class="box-header">
<h3 class="box-title" style="margin-left:15px;">Register New Waiter</h3>
<div class="box-tools pull-right">
<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
</div>
</div>

<div class="box-body table-responsive">
<form name="frm1" id="frm1" action="../fxn/process1.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dwat" value="addwaiter" />
<!--row-->

<div class="col-sm-12">
<label>Waiter Name/Number</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="name" class="form-control" placeholder="Waiter Name/Number">
</div>
</div>

<div class="col-sm-12">
<label>Username:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="text" name="username" class="form-control" placeholder="Username:">
</div>
</div>

<div class="col-sm-12">
<label>Password:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<input type="password" name="password" class="form-control" placeholder="Password:" value="password">
</div>
</div>

<div class="col-sm-12">
<label>Set Permission:</label>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
<select name="usagepermit" class="form-control">
<?php
echo getWaiterPermitOpt($_REQUEST["usagepermit"]);
?>
</select>
</div>
</div>

<div class="col-md-12" style="margin-top:10px;">
<button class="btn btn-warning btn-md" style="margin-right:10px;"><i class="fa fa-send"></i> Submit</button>
</div>
</form>
</div>
</div>

			  
			  <!-- List of Room -->
			  <div class="box box-primary">
			  <!--box-header -->
			  <div class="box-header with-border">
              
			  <div class="pull-left"><form name="frmsearch" action="" method="get"><input type="hidden" name="dwat" value="search" /><input type="text" name="q" class="form-control input-sm pull-left" placeholder="Search..." style="width:300px; margin-right:3px;"> <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button> <button type="button" onclick="go2('<?php echo $_SERVER['PHP_SELF']; ?>');" class="btn btn-sm btn-default">All</button></form></div>
			  
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
					$sql = select2nav("SELECT count(id) as ctn FROM waiters WHERE (name LIKE '%".$_GET["q"]."%') ORDER BY id","SELECT * FROM waiters WHERE (name LIKE '%".$_GET["q"]."%') ORDER BY id");
					}else{
					$sql = select2nav("SELECT count(id) as ctn FROM waiters ORDER BY id","SELECT * FROM waiters ORDER BY id");
					}
					
					if($sql){
				  echo '<table class="table table-striped">
                    <tr>
					  <th>SN</th>
                      <th>Waiter Name/Number</th>
                      <th>Username</th>
					  <th>Password</th>
					  <th>Permission</th>
					  <th>&nbsp;</th>
					  <th>&nbsp;</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
					$delBtn = '<a href="javascript:;" class="btn btn-sm btn-danger" onclick="confirmdel(\'id='.$rs["id"].'&tbl=waiters&dwat=del\',\'../fxn/process1.php\',\'\')">Delete</a>';						
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["name"].'</td>';
						echo '<td>'.$rs["username"].'</td>';
						echo '<td>*********</td>';		
						echo '<td>'.$waiterPermit[$rs["usagepermit"]].'</td>';		
						echo '<td style="width:50px;"><a href="editwaiters.php?id='.$rs["id"].'" class="btn btn-sm btn-info">Edit</a></td>';
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