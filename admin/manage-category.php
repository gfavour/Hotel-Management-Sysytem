<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Services Category</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">category</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
              
			  <!--Top Buttons + Search Box -->
			  <?php if ($globalrole == 'admin' || $globalrole == 'manager'){ ?>
			  <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">&nbsp;</h3>
				  <div class="box-tools">
				     <div class="input-group" style="padding-left:10px;">
					 <div class="input-group-btn">
						<button class="btn btn-primary btn-sm" style="margin-right:10px;" id="jqbtn1"><i class="fa fa-plus"></i> Add Category</button></div>
                     
                    </div>
                  </div>
                </div><!-- /.box-header -->
                </div>
			  <?php } ?>
		<!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
		<?php 
			include("insert-category.php");
		?>
			  <!-- List of tegoriesc -->
			 <?php
					$sql = select("SELECT * FROM tblcategory ORDER BY cattype");
					if($sql){
					
					$ishead = '';$isbtm = 1;
					echo '<div class="box box-primary width50per" style="clear:both"><div class="box-body table-responsive" style="margin:10px 0 0 0;">';
				    echo '<table class="table table-striped"><tr><th>SN</th><th>Category</th><th>&nbsp;</th><th>&nbsp;</th></tr>';
					
					while($rs = mysqli_fetch_assoc($qry)){
					
					if ($firsttype == ''){$ishead = $rs["cattype"];$firsttype=1;echo '<h4 style="margin:0 0 10px 0;color:#c00;">'.strtoupper($rs["cattype"]).'</h4>';}
					
					if ($ishead != $rs["cattype"] && $firsttype == 1){
					echo $row;
					echo '</table>';
					echo '</div></div>';
					$row = '';
					$c = 0;
					echo '<div class="box box-primary width50per" style="clear:both"><div class="box-body table-responsive" style="margin:10px 0 0 0;">';
				    echo '<h4 style="margin:0 0 10px 0;color:#c00;">'.strtoupper($rs["cattype"]).'</h4>';
					echo '<table class="table table-striped"><tr><th>SN</th><th>Category</th><th>&nbsp;</th><th>&nbsp;</th></tr>';
					$ishead = $rs["cattype"];$firsttype=1;
					}
					
					if ($globalrole == 'admin'){
					$delBtn = '<a href="javascript:;" class="btn btn-sm btn-danger" onclick="confirmdel(\'id='.$rs["id"].'&tbl=tblcategory&cty='.$rs["cattype"].'&dwat=del\',\'../fxn/process1.php\',\'\')">Delete</a>';
					$editBtn = '<a href="editcategory.php?id='.$rs["id"].'" class="btn btn-sm btn-primary">Edit</a>';
					}elseif ($globalrole == 'manager'){
					$delBtn = '<a href="#" class="btn btn-sm btn-default">Delete</a>';
					$editBtn = '<a href="editcategory.php?id='.$rs["id"].'" class="btn btn-sm btn-primary">Edit</a>';
					}else{
					$delBtn = '<a href="#" class="btn btn-sm btn-default">Delete</a>';
					$editBtn = '<a href="#" class="btn btn-sm btn-default">Edit</a>';
					}
						
						$row .= '<tr>';
						$row .= '<td>'.++$c.'</td>';
						$row .= '<td width="300">'.$rs["catname"].'</td>';
						$row .= '<td>'.$delBtn.'</td>';
						$row .= '<td>'.$editBtn.'</td>';
						$row .= '</tr>';
					}
					
					echo $row;
					echo '</table>';
					echo '</div></div>';
					$row = '';
					
					}else{
					echo '<div align="left">No category found.<br>Click <strong>"Add category"</strong> button above to add new categor(ies).</div>';
					}
				?>
                
            </div>
          </div>
</section>
<!-- End Main content -->
</div>
<?php include_once 'inc/footer.php'; ?>