<?php include_once 'inc/head.php'; ?>

<div class="col-sm-12">
<h1>Re-Stock Instructions</h1>
<?php
$sql = select2nav("SELECT count(tblinstruct.id) as ctn FROM tblinstruct INNER JOIN addbar ON tblinstruct.itemid = addbar.id ORDER BY tblinstruct.id","SELECT tblinstruct.*,addbar.name FROM tblinstruct INNER JOIN addbar ON tblinstruct.itemid = addbar.id ORDER BY tblinstruct.id DESC");
if($sql){
				  echo 'Below are the list of instructions you (admin) sent to the manager (staff) to re-stock. These instruction(s) are yet undone.';
				  echo '<table class="table table-striped" style="margin:10px 0 0 0;">
                    <tr>
					  <th>SN</th>
                      <th>Item Name</th>
					  <th>Qty. Left Before</th>
					  <th>Qty. Instructed</th>
					  <th>Qty. Re-stocked</th>
					  <th>Date/Time</th>
					  <th>Additional Info.</th>
                    </tr>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
					$datetime = date("l, d M Y h:i A",$rs["regtime"]);
					echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["name"].'</td>';
						echo '<td>'.$rs["itemleft"].'</td>';
						echo '<td>'.$rs[qty2restock].'</td>';
						echo '<td>'.$rs["qtyrestocked"].'</td>';
						echo '<td>'.$datetime.'</td>';
						echo '<td>'.$rs["message"].'</td>';
						echo '</tr>';
					}
					echo '</table>';
					
}else{
echo '<div style="color:#f00;">No instruction passed to manager left undone.</div>';
}
?>
</div>

<?php include_once 'inc/footer.php'; ?>