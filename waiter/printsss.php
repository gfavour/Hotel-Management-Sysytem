<?php include_once 'inc/head.php'; ?>
<?php include_once 'reporthead.php'; ?>
<div>
<div>
<a href="javascript:window.print();" style="position:absolute;right:10px;top:10px;">Print Page</a>		               		
					<div class="box-body table-responsive no-padding" style="margin-top:10px;">
					<h3 class="box-title" style="text-align:center;">SSS Report (List of Accommodations) <?php echo ($_REQUEST["datefrom"] != '')?'<br>From '.$_REQUEST["datefrom"].' - '.$_REQUEST["dateto"]:''; ?></h3>
				  <?php
				  
				  if ($_REQUEST["datefrom"] != ''){
				  $sql = select2nav("SELECT count(order_room.id) as ctn FROM order_room INNER JOIN addclient ON order_room.guestid = addclient.id WHERE (order_room.orderdate BETWEEN '".mysqli_escape_string($conn4as,$_REQUEST["datefrom"])."' AND '".mysqli_escape_string($conn4as,$_REQUEST["dateto"])."') ORDER BY order_room.id DESC","SELECT order_room.*,addclient.lastname,addclient.firstname,addclient.phone FROM order_room INNER JOIN addclient ON order_room.guestid = addclient.id WHERE (order_room.orderdate BETWEEN '".mysqli_escape_string($conn4as,$_REQUEST["datefrom"])."' AND '".mysqli_escape_string($conn4as,$_REQUEST["dateto"])."') ORDER BY order_room.id DESC");	  
				  }else{
				  $sql = select2nav("SELECT count(order_room.id) as ctn FROM order_room INNER JOIN addclient ON order_room.guestid = addclient.id ORDER BY order_room.id DESC","SELECT order_room.*,addclient.lastname,addclient.firstname,addclient.phone FROM order_room INNER JOIN addclient ON order_room.guestid = addclient.id ORDER BY order_room.id DESC");
				  }
				  
				  if($sql){
				  echo '<table class="table table-striped">
                    <tr>
                      <th>SN</th>
                      <th>Invoice ID</th>
                      <th>Lastname</th>
					  <th>Firstname</th>
					  <th>Phone</th>
					  <th nowrap>Room Type</th>
					  <th>Check In</th> 
					  <th>Check Out</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
												
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["invoiceid"].'</td>';
						echo '<td>'.$rs["lastname"].'</td>';
						echo '<td>'.$rs["firstname"].'</td>';
						echo '<td>'.$rs["phone"].'</td>';
						echo '<td>'.getRoomDetails($rs["invoiceid"]).'</td>';
						echo '<td>'.$rs["checkin"].'</td>';
						echo '<td>'.$rs["checkout"].'</td>';
						//echo '<td>'.number_format($rs["total"],2).'</td>';
						echo '</tr>';
					}
						echo '</table>';
					}else{
					echo '<div align="center">No record found.</div>';
					}
					
				?>
			    </div>
				
				<?php echo $nav; ?>
				<!-- /.box-body -->
              </div>
</div>
<?php include_once 'inc/footer.php'; ?><script>//window.print();</script>