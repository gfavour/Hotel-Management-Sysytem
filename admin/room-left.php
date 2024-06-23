<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Room Left</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Rooms</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-9">
              
			  <!--Top Buttons + Search Box -->
			  <?php if ($globalrole == 'admin'){ ?>
			  <!--<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">&nbsp;</h3>
				  <div class="box-tools">
				     <div class="input-group" style="padding-left:10px;">
					 <div class="input-group-btn">
						<button class="btn btn-primary btn-sm" style="margin-right:10px;" id="jqbtn1"><i class="fa fa-plus"></i> Add Room</button><button class="btn btn-primary btn-sm" style="margin-right:10px;" id="jqbtn2"><i class="fa fa-plus"></i> Add Room Facility</button></div>
                     
                    </div>
                  </div>
                </div>
                </div>-->
			  <?php } ?>
		<!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
		<?php 
			include("insert-new-room.php");
			include("insert-new-room-facility.php"); 
		?>
			  <!-- List of Room -->
			  <div class="box box-primary">
			  <!--box-header -->
			  <div class="box-header with-border">
              
			  <div class="pull-left"><form name="frmsearch" action="" method="post"><input type="text" name="q" class="form-control input-sm pull-left" placeholder="Search" style="width:60%; "><div class="input-group-btn"><button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button></div></form></div>
			  
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
              </div>
            </div>
			<!--box-header -->
               				
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
                  
					<?php
					$sql = select2nav("SELECT count(addroom.id) as ctn FROM addroom INNER JOIN tblcategory ON addroom.categoryid = tblcategory.id ORDER BY addroom.id","SELECT addroom.*,tblcategory.catname FROM addroom INNER JOIN tblcategory ON addroom.categoryid = tblcategory.id ORDER BY addroom.id");
					if($sql){
				  echo '<table class="table table-striped">
                    <tr>
                      <th>SN</th>
                      <th>Room Number</th>
					  <th>Room Type</th>
                      <th>Rate</th>
                      <th>No. of Room </th>
                      <th>Room Left (Availability)</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
						$delBtn = '<a href="javascript:;" class="label label-danger" onclick="confirmdel(\'id='.$rs["id"].'&dwat=delroom\',\'../fxn/process1.php\',\'\')">Delete</a>';
								
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["roomType"].'</td>';
						echo '<td>'.$rs["catname"].'</td>';
						echo '<td>'.$rs["roomrate"].'</td>';
						echo '<td>'.$rs["roomQuantity"].'</td>';
						echo '<td>'.$rs["roomleft"].'</td>';
						//echo ($globalrole == 'admin' || $globalrole == 'manager')?'<td><a href="editroom.php?id='.$rs["id"].'" class="label label-primary">Edit</a></td>':'<td><a href="#" class="label label-default">Edit</a></td>';
						//echo ($globalrole == 'admin')?'<td>'.$delBtn.'</td>':'<td><a href="#" class="label label-default">Delete</a></td>';
						echo '</tr>';
					}
						echo '</table>';
					}else{
					echo '<div align="center">No record found.</div>';
					}
				?>
                </div><!-- /.box-body -->
				<?php echo $nav; ?>
              </div><!-- /.box -->
            </div>
          </div>
</section>
<!-- End Main content -->
</div>
<?php include_once 'inc/footer.php'; ?>