<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php //CheckBarStockLimit("bar"); ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Food Ingredients - Restaurant</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Food Ingredients - Restaurant</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-8">
             <?php if ($globalrole == 'admin' || $globalrole == 'manager'){ ?>
			<a href="javascript:;" class="btn btn-primary btn-sm" style="margin-right:10px; margin-bottom:5px;" id="jqbtn1"><i class="fa fa-plus"></i> Add New Food Ingredient</a>
						<?php } ?>
						
		<div id="msgbox"></div>
		<?php include("insert-food-ingredient.php"); ?>
			  
			  <!-- List of Room -->
			  <div class="col-xs-7 no-padding">
			  <div class="box box-primary">
			  <!--box-header -->
			  <div class="box-header with-border">
              
			  <div class="pull-left"><form name="frmsearch" action="" method="get"><input type="hidden" name="dwat" value="search" /><input type="text" name="q" class="form-control input-sm pull-left" placeholder="Search by item name" style="width:60%; "><div class="input-group-btn"><button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button> <button type="button" onclick="go2('store-restaurant.php');" class="btn btn-sm btn-default">All</button></div></form></div>
			  
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
					$sql = select2nav("SELECT count(id) as ctn FROM tblingredients WHERE (name LIKE '%".$_GET["q"]."%') ORDER BY id DESC","SELECT * FROM tblingredients WHERE (name LIKE '%".$_GET["q"]."%') ORDER BY id DESC");
					}else{
					$sql = select2nav("SELECT count(id) as ctn FROM tblingredients ORDER BY id","SELECT * FROM tblingredients ORDER BY id DESC");
					}
					if($sql){
				  echo '<table class="table table-striped">
                    <tr>
					  <th>SN</th>   
                      <th>Name</th>
                      <th>&nbsp;</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
												
					if ($globalrole == 'admin'){
						$delBtn = '<a href="javascript:;" class="label label-danger" onclick="confirmdel(\'id='.$rs["id"].'&tbl=tblingredients&dwat=del\',\'../fxn/process1.php\',\'\')">Delete</a>';
						$editBtn = '<a href="editingredient.php?id='.$rs["id"].'" class="label label-info">Edit</a>';
					}
					
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["name"].'</td>';
						echo '<td align="center">'.$editBtn.' '.$delBtn.'</td>';
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
          </div>
</section>
<!-- End Main content -->
</div>
<?php include_once 'inc/footer.php'; ?>
