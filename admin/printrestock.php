<?php include_once 'inc/head.php'; ?>
<?php include_once 'reporthead.php'; ?>
<div>
<div>
<a href="javascript:window.print();" style="position:absolute;right:10px;top:10px;">Print Page</a>		               		
					<div class="box-body table-responsive no-padding" style="margin-top:10px;">
					<h3 class="box-title" style="text-align:center;">Restock History (List of Items Re-stocked) <?php echo ($_REQUEST["datefrom"] != '')?'<br>From '.$_REQUEST["datefrom"].' - '.$_REQUEST["dateto"]:''; ?></h3>
				  <?php
				  				  
				  if ($_REQUEST["datefrom"] != ''){
				  $sql = select2nav("SELECT count(tblrestock.id) as ctn FROM tblrestock INNER JOIN addbar ON tblrestock.itemid = addbar.id WHERE (tblrestock.regdate BETWEEN '".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."' AND '".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."') ORDER BY tblrestock.id","SELECT tblrestock.*,addbar.name,addbar.measure FROM tblrestock INNER JOIN addbar ON tblrestock.itemid = addbar.id WHERE (tblrestock.regdate BETWEEN '".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."' AND '".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."') ORDER BY tblrestock.id");	  
				  }else{
				  $sql = select2nav("SELECT count(tblrestock.id) as ctn FROM tblrestock INNER JOIN addbar ON tblrestock.itemid = addbar.id ORDER BY tblrestock.id","SELECT tblrestock.*,addbar.name,addbar.measure FROM tblrestock INNER JOIN addbar ON tblrestock.itemid = addbar.id ORDER BY tblrestock.id");
				  }
				  
				  if($sql){
				  echo '<table class="table table-striped">
                    <tr>
                      <th>SN</th>
                      <th>Item Name</th>
                      <th>Qty Left Before</th>
					  <th>Qty Added</th>
					  <th>Date/Time</th>
					  <th nowrap>Staff</th> 
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
												
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["name"].'</td>';
						echo '<td>'.$rs["itemleft"].'</td>';
						echo '<td>'.$rs["qty"].'</td>';
						echo '<td>'.date("l, d M Y h:i A",$rs["regstamp"]).'</td>';
						echo '<td>'.$rs["staff"].'</td>';
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
<?php include_once 'inc/footer.php'; ?><script>window.print();</script>