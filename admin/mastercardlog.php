<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Master Card Log</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Master Card Log</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-10">
			
			<div class="box">
                <!-- /.box-header -->
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				<form name="frm" action="" method="get">
				<input type="hidden" name="dwat" value="searchreport" />
				<div class="col-sm-4">
				<div class="form-group input-group">
				<span class="input-group-addon"><strong>From:</strong></span>
				<input type="date" name="datefrom" class="form-control" title="date from is required" value="">
				</div>
				</div>
				
				<div class="col-sm-4">
				<div class="form-group input-group">
				<span class="input-group-addon"><strong>To:</strong></span>
				<input type="date" name="dateto" class="form-control" title="date from is required" value="">
				</div>
				</div>
				
				<div class="col-sm-4">
				<button class="btn btn-primary btn-md" style="margin-bottom:10px;"><i class="fa fa-book"></i> Search</button> <a href="print-masterlog.php?<?php echo $_SERVER['QUERY_STRING']; ?>" class="btn btn-info btn-md" style="margin-bottom:10px;">Print</a></div>
				</form>
				</div>
				
                </div>
				
				
               <div id="msgbox"></div>
		       <div class="box box-info">
			  
			  <!--box-header -->
			  
			<!--box-header -->
               				
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
				  <?php
				  if($_REQUEST["datefrom"] != '' && $_REQUEST["dateto"] != ''){ 
				  $sqlqry = " tblmcardreason.regdate BETWEEN '".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."' AND '".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."' "; 
				  }elseif($_REQUEST["datefrom"] != '' && $_REQUEST["dateto"] == ''){ 
				  $sqlqry = " tblmcardreason.regdate >= '".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."' "; 
				  }elseif($_REQUEST["datefrom"] == '' && $_REQUEST["dateto"] != ''){ 
				  $sqlqry = " ";  
				  }
				  
				  if($sqlqry != ''){ $sqlqry = ' WHERE '.$sqlqry; }
				  
				  if ($_REQUEST["datefrom"] != ''){
				  $sql = select2nav("SELECT count(id) as ctn FROM tblmcardreason ".$sqlqry." ORDER BY id DESC","SELECT * FROM tblmcardreason ".$sqlqry." ORDER BY id DESC");	  
				  }else{
				  $sql = select2nav("SELECT count(id) as ctn FROM tblmcardreason ORDER BY id DESC","SELECT * FROM tblmcardreason ORDER BY id DESC");
				  }
				  
				  
				  if($sql){
				  echo '<table class="table table-striped">
                    <tr>
                      <th>SN</th>
                      <th>Duration</th>
					  <th>Reason</th>
                      <th>Date</th>
					  <th>&nbsp;</th> 
                    </tr>';
					
					while($rs = mysqli_fetch_assoc($qry)){
						
						$delBtn = '<a href="javascript:;" class="label label-lg label-danger" onclick="confirmdel(\'id='.$rs["id"].'&tbl=tblmcardreason&dwat=del\',\'../fxn/process1.php\',\'\')">DELETE</a>';
								
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["duration"].'</td>';
						echo '<td>'.$rs["reason"].'</td>';
						echo '<td>'.date("Y-m-d h:i:s A",$rs["regdate"]).'</td>';
						echo '<td>'.$delBtn.'</td>';
						echo '</tr>';
					}
						echo '</table>';
					}else{
					echo '<div align="center">No record found.</div>';
					}
					
					
				?>
			    </div>
				<?php echo $nav; ?>
              </div>			  
			  
            </div>
          </div>
</section>
<!-- End Main content -->
</div>
<?php include_once 'inc/footer.php'; ?>