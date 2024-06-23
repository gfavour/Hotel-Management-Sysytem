<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Deposit</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Deposit</li>
          </ol>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-8">
              <div style="margin-bottom:10px;">
			   <button class="btn btn-primary btn-sm" style="margin-right:10px;" id="jqbtn1"><i class="fa fa-money"></i> Add Fund</button>
              </div>
			  
		<!-- Includes for add rooms and facilities -->
		<div id="msgbox"></div>
		<?php include("insert-new-deposit.php"); ?>
			  
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
					$sql = select2nav("SELECT count(id) as ctn FROM addclient WHERE (id <> '1') AND (lastname LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%' OR firstname LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%' OR phone LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%') ORDER BY id","SELECT * FROM addclient WHERE (id <> '1') AND (lastname LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%' OR firstname LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%' OR phone LIKE '%".mysqli_real_escape_string($conn4as,$_GET["q"])."%') ORDER BY id");
					}else{
					$sql = select2nav("SELECT count(id) as ctn FROM addclient WHERE id <> '1' ORDER BY id","SELECT * FROM addclient WHERE id <> '1' ORDER BY id");
					}
					
					if($sql){
				  echo '<table class="table table-striped">
                    <tr>
					  <th>SN</th>
                      <th>Full Name</th>
                      <th>Balance</th>
                      <th>Last Deposit</th>
                      <th>Last Withdraw</th>
					  <th>&nbsp;</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
					if($rs["amount"] != ''){ $amount = $rs["amount"]; }else{ $amount = '0.00'; }						
					if($rs["id"] == '1'){ 
						$orderbtn = ''; 
					}else{ 
						$arr = ['<i class="fa fa-money"></i> Withdraw'=>'withdraw.php?clientid='.$rs["id"],'<i class="fa fa-money"></i> Edit Amount'=>'editwallet.php?clientid='.$rs["id"]];
						$orderbtn = actionDropDown('info','Action',$arr);
					}
						
						echo '<tr>';
						//echo '<td><input type="radio" value="'.$rs["id"].'" name="chkid" id="chkid" title="'.$rs["id"].'"></td>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["lastname"].' '.$rs["firstname"].'</td>';
						echo '<td>'.$amount.'</td>';
						echo '<td>'.$rs["lastdeposit"].'</td>';
						echo '<td>'.$rs["lastwithdraw"].'</td>';
						echo '<td>'.$orderbtn.'</td>';
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