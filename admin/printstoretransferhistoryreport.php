<?php include_once 'inc/head.php'; ?>
<?php 
loadStaff2Array(); 
//getBarsItemArrays();
?>
<div>
<div style="text-align:center;">
<h3 class="box-title"><u><?php if($_REQUEST["datefrom"] != '' && $_REQUEST["dateto"] != ''){ echo 'Item Transfer History Between '.$_REQUEST["datefrom"].' - '.$_REQUEST["dateto"]; }elseif($_REQUEST["datefrom"] != '' && $_REQUEST["dateto"] == ''){ echo 'Item Transfer History From '.$_REQUEST["datefrom"]; }elseif($_REQUEST["datefrom"] == '' && $_REQUEST["dateto"] != ''){ echo 'Item Transfer History Till '.$_REQUEST["dateto"]; }else{ echo ' Item Transfer History Till Date'; } ?></u></h3>
</div>  
  
<div>
				  <?php
				  if($_REQUEST["datefrom"] != '' && $_REQUEST["dateto"] != ''){ 
				  $sqlqry = " tblstoretransfer.regdate BETWEEN '".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."' AND '".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."' "; 
				  }elseif($_REQUEST["datefrom"] != '' && $_REQUEST["dateto"] == ''){ 
				  $sqlqry = " tblstoretransfer.regdate >= '".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."' "; 
				  }elseif($_REQUEST["datefrom"] == '' && $_REQUEST["dateto"] != ''){ 
				  $sqlqry = " ";  
				  }
				  
				  if($sqlqry != ''){
				  $sqlqry = ($_REQUEST["itemname"] != '')?" WHERE tblstoretransfer.itemid = '".mysqli_real_escape_string($conn4as,$_REQUEST["itemname"])."' AND ".$sqlqry:" WHERE ".$sqlqry;
				  }else{
				  $sqlqry = ($_REQUEST["itemname"] != '')?" WHERE tblstoretransfer.itemid = '".mysqli_real_escape_string($conn4as,$_REQUEST["itemname"])."' ":" ";
				  }
				  $arrangeby = ($_REQUEST["arrangeby"] != 'DESC' && $_REQUEST["arrangeby"] != 'ASC')?' DESC':' '.$_REQUEST["arrangeby"];
				  
				  if ($sqlqry != ''){
				  $sql = select("SELECT tblstoretransfer.*,tblstore.name,tblstore.qtyinstore,tblstore.measure FROM tblstoretransfer INNER JOIN tblstore ON tblstoretransfer.itemid = tblstore.id ".$sqlqry." ORDER BY tblstoretransfer.id ".$arrangeby);
				  }else{
				  $sql = select("SELECT tblstoretransfer.*,tblstore.name,tblstore.qtyinstore,tblstore.measure FROM tblstoretransfer INNER JOIN tblstore ON tblstoretransfer.itemid = tblstore.id ORDER BY tblstoretransfer.id ".$arrangeby);
				  }
				  
				  
				  if($sql){
				  echo '<table class="table table-striped">
                    <tr>
                      <th>SN</th>
                      <th>Item Name</th>
                      <th>Bar Type</th>
					  <th>Qty Transferred</th>
					  <th>Date/Time</th>
					  <th nowrap>Transfered By</th> 
                    </tr>';
					
					while($rs = mysqli_fetch_assoc($qry)){
						echo '<tr>';
						echo '<td>'.++$c.'</td>';
						echo '<td>'.$rs["name"].'</td>';
						echo '<td>'.$barTypes[$rs["itemtype"]].'</td>';
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
<script>//window.print();</script>