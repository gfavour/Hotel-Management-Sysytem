<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Manage Staff</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Staff</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
              
			  <!--Top Buttons + Search Box -->
			  <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">&nbsp;</h3>
				  <div class="box-tools">
				     <div class="input-group" style="padding-left:10px;">
					 <div class="input-group-btn">
						<button class="btn btn-primary btn-sm" style="margin-right:10px;" id="jqbtn1"><i class="fa fa-plus"></i> Add User</button></div>
                     
                    </div>
                  </div>
                </div><!-- /.box-header -->
                </div>
			  
		<!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
		<?php include("insert-new-user.php"); ?>
			  
			  <!-- List of Room -->
			  <div class="box box-primary">
			  <!--box-header -->
			  <div class="box-header with-border">
              <h3 class="box-title">Users List</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
              </div>
            </div>
			<!--box-header -->
               				
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
                  <form name="reservation" id="reservation">
					<?php
					$sql = select2nav("SELECT count(id) as ctn FROM users ORDER BY id","SELECT * FROM users ORDER BY id");
					if($sql){
				  echo '<table class="table table-striped">
                    <tr>
                      <th>S/N</th>
					  <th>Username</th>
                      <th>Last Name</th>
                      <th>First Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Salary</th> 
                      <th>Hiring Date</th>                     
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						$delBtn = '<a href="javascript:;" class="label label-danger" onclick="confirmdel(\'id='.$rs["id"].'&tbl=users&dwat=del\',\'../fxn/process1.php\',\'\')">Delete</a>';
						if($rs["users_role"] == 'admin' && $globalrole != 'admin'){	
						
						}else{
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["username"].'</td>';
						echo '<td>'.$rs["lastname"].'</td>';
						echo '<td>'.$rs["firstname"].'</td>';
						echo '<td>'.$rs["email"].'</td>';
						echo '<td>'.$rs["users_role"].'</td>';
						echo '<td>'.$rs["staff_salary"].'</td>';
						echo '<td>'.$rs["staff_hiring_date"].'</td>';
						echo '<td><a href="editusers.php?id='.$rs["id"].'" class="label label-primary">Edit</a></td>';
						echo '<td>'.$delBtn.'</td>';
						echo '</tr>';
						}
					}
						echo '</table>';
					}else{
					echo '<center>No record found.</center>';
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