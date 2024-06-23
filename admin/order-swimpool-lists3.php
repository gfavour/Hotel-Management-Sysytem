<?php include("obar3-head.php"); ?>
<body>

    <!-- Start Header Top Area -->
    <?php include("obar3-header.php"); ?>
    <!-- End Header Top Area -->
    <?php include("obar3-menus.php"); ?>
    <!-- Start Status area -->
    <div class="notika-status-area" style="padding:0px;">
        <div class="container" style="padding:0px;">
		 
		 
<div class="row" style="padding:0px;">
<div class="col-sm-12" style="padding:0px;">  
<div id="msgbox"></div>
<?php include("order-swimpool-inc2.php"); ?>
<div>
		
			  <!-- List of Room -->
			  <div class="box box-primary">
			  <!--box-header -->
			  <div class="box-header with-border">
			  
              <div class="pull-left"><form name="frmsearch" action="" method="post"><input type="hidden" name="dwat" value="search" /><input type="text" name="q" class="form-control input-sm pull-left" placeholder="Search by invoice id, lastname, firstname" style="width:60%; "><div class="input-group-btn"><button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button> <button type="button" onClick="go2('<?php echo $_SERVER['PHP_SELF']; ?>');" class="btn btn-sm btn-default">All</button></div></form></div>
			  
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>-->
              </div>
            </div>
			<!--box-header -->
               				
				<div class="box-body table-responsive no-padding" style="margin-top:10px;">
                  <form name="reservation" id="reservation">
					<?php
					if ($_POST["dwat"] == 'search'){
					$sql = select2nav("SELECT count(order_swimpool.id) as ctn FROM order_swimpool INNER JOIN addclient ON order_swimpool.guestid = addclient.id WHERE (addclient.lastname LIKE '%".$_POST["q"]."%' OR addclient.firstname LIKE '%".$_POST["q"]."%' OR order_swimpool.invoiceid LIKE '%".$_POST["q"]."%') ORDER BY order_swimpool.id DESC","SELECT order_swimpool.*,addclient.lastname,addclient.firstname FROM order_swimpool INNER JOIN addclient ON order_swimpool.guestid = addclient.id WHERE (addclient.lastname LIKE '%".$_POST["q"]."%' OR addclient.firstname LIKE '%".$_POST["q"]."%' OR order_swimpool.invoiceid LIKE '%".$_POST["q"]."%') ORDER BY order_swimpool.id DESC");
					
					}else{
					$sql = select2nav("SELECT count(order_swimpool.id) as ctn FROM order_swimpool INNER JOIN addclient ON order_swimpool.guestid = addclient.id ORDER BY order_swimpool.id DESC","SELECT order_swimpool.*, addclient.lastname,addclient.firstname FROM order_swimpool INNER JOIN addclient ON order_swimpool.guestid = addclient.id ORDER BY order_swimpool.id DESC");
					}
					
					if($sql){
				  echo '<table class="table table-striped">
                    <tr>
                      <th>SN</th>
                      <th>Invoice ID</th>
                      <th>Guest</th>
					  <th nowrap>Service Rendered</th>
					  <th>Date/Time</th> 
					  <th>Total ('.$cursign.')</th> 
					  <th>Status</th>                      
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
					$services = '';
					if ($globalrole == 'admin'){
					$delBtn = '<a href="javascript:;" class="label label-danger" onclick="confirmdel(\'id='.$rs["id"].'&invoiceid='.$rs["invoiceid"].'&dwat=delorder\',\'../fxn/process1.php\',\'\')">Delete</a>';
					}else{
						$delBtn = '<span class="label label-grey">Delete</span>';
					}
					
					    if ($rs["ispaid"] == '1'){$ispaid = 'Paid';}else{$ispaid = 'Unpaid';}
						$services = 'Swimming pool';
						echo '<tr>';
						//echo '<td><input type="radio" value="'.$rs["id"].'" name="chkid" id="chkid" title="'.$rs["id"].'"></td>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["invoiceid"].'</td>';
						echo '<td>'.$rs["lastname"].' '.$rs["firstname"].'</td>';
						//echo '<td><a href="customer-list.php?guestid='.$rs["guestid"].'">'.$rs["lastname"].' '.$rs["firstname"].'</a></td>';
						echo '<td>'.$services.'</td>';
						echo '<td>'.$rs["orderdate"].' '.$rs["ordertime"].'</td>';
						echo '<td>'.number_format($rs["total"],2).'</td>';
						echo '<td>'.$ispaid.'</td>';
						echo '<td><a href="obar3-printinvoice.php?invoiceid='.$rs["invoiceid"].'" class="label label-primary">Receipt</a></td>';
						echo '<td>'.$delBtn.'</td>';
						echo '</tr>';
						$services = '';
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
		 
		 
		 </div>
    </div>
    <!-- End Status area-->
    <!-- Start Sale Statistic area-->
 
<?php include("obar3-footer.php"); ?>
</body>
</html>