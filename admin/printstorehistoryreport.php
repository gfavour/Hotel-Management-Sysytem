<?php include_once 'inc/head.php'; ?>
<?php 
loadStaff2Array(); 
//getBarsItemArrays();
?>
<div>
<div style="text-align:center;">
<h3 class="box-title"><u><?php if($_REQUEST["datefrom"] != '' && $_REQUEST["dateto"] != ''){ echo 'Store History Between '.$_REQUEST["datefrom"].' - '.$_REQUEST["dateto"]; }elseif($_REQUEST["datefrom"] != '' && $_REQUEST["dateto"] == ''){ echo 'Store History From '.$_REQUEST["datefrom"]; }elseif($_REQUEST["datefrom"] == '' && $_REQUEST["dateto"] != ''){ echo 'Store History Till '.$_REQUEST["dateto"]; }else{ echo ' Store History Till Date'; } ?></u></h3>
</div>  
  
<div>
				  <?php
				  if($_REQUEST["datefrom"] != '' && $_REQUEST["dateto"] != ''){ 
				  $sqlqry = " tblstorehistory.regdate BETWEEN '".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."' AND '".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."' "; 
				  }elseif($_REQUEST["datefrom"] != '' && $_REQUEST["dateto"] == ''){ 
				  $sqlqry = " tblstorehistory.regdate >= '".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."' "; 
				  }elseif($_REQUEST["datefrom"] == '' && $_REQUEST["dateto"] != ''){ 
				  $sqlqry = " ";  
				  }
				  
				  if($sqlqry != ''){
				  	$sqlqry = ($_REQUEST["itemname"] != '')?" WHERE tblstorehistory.itemid = '".mysqli_real_escape_string($conn4as,$_REQUEST["itemname"])."' AND ".$sqlqry:" WHERE ".$sqlqry;
				  }else{
				  	$sqlqry = ($_REQUEST["itemname"] != '')?" WHERE tblstorehistory.itemid = '".mysqli_real_escape_string($conn4as,$_REQUEST["itemname"])."' ":" ";
				  }
				  $arrangeby = ($_REQUEST["arrangeby"] != 'DESC' && $_REQUEST["arrangeby"] != 'ASC')?' DESC':' '.$_REQUEST["arrangeby"];
				  
				  if ($sqlqry != ''){
				  $sql = select("SELECT tblstorehistory.*,tblstore.name,tblstore.qtyinstore,tblstore.measure FROM tblstorehistory INNER JOIN tblstore ON tblstorehistory.itemid = tblstore.id ".$sqlqry." ORDER BY tblstorehistory.id ".$arrangeby);	  
				  }else{
				  $sql = select("SELECT tblstorehistory.*,tblstore.name,tblstore.qtyinstore,tblstore.measure FROM tblstorehistory INNER JOIN tblstore ON tblstorehistory.itemid = tblstore.id ORDER BY tblstorehistory.id ".$arrangeby);
				  }
				  
				  
				  if($sql){
				  echo '<table class="table table-bordered">
                    <tr style="background:#eee;">
                      <th>SN</th>
                      <th>Item Name</th>
                      <th>Qty Left</th>
					  <th>Qty Added</th>
					  <th>Qty Removed</th>
					  <th>Total Qty</th>
					  <th>Date/Time</th>
					  <th nowrap>Staff</th> 
                    </tr>';
					
					while($rs = mysqli_fetch_assoc($qry)){
						echo '<tr>';
						echo '<td>'.++$c.'</td>';
						echo '<td>'.$rs["name"].'</td>';
						echo '<td>'.$rs["itemleft"].'</td>';
						echo '<td>'.$rs["newstockadded"].'</td>';
						echo '<td>'.$rs["stockremove"].'</td>';
						echo '<td>'.$rs["qty"].'</td>';
						echo '<td>'.date("Y-m-d h:i A",$rs["regstamp"]).'</td>';
						echo '<td>'.$allstaffs[$rs["staff"]].'</td>';
						echo '</tr>';
					}
						echo '</table>';
					}else{
					echo '<div align="center">No record found.</div>';
					}
					
					
				?>
			    </div>
  
</div>
<script>window.print();</script>