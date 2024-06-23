<?php include_once 'inc/head.php'; ?>
<?php include_once 'reporthead.php'; ?>
<div>
<?php
$sql = select("SELECT * FROM tblstore ORDER BY id");
if($sql){

				  echo '<table class="table table-striped">
                    <tr>
                      <th>SN</th>
                      <th>Name</th>
                      <th>Qty</th>
					  <th>Cost Price</th>
					  <th>Selling Price</th>
                    </tr>';
				  $c=1;
					while($rs = mysqli_fetch_assoc($qry)){
													
						echo '<tr>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["name"].'</td>';
						echo '<td>'.$rs["qtyinstore"].'</td>';
						echo '<td nowrap>'.$cursign.number_format($rs["costprice"]).'</td>';
						echo '<td nowrap>'.$cursign.number_format($rs["price"]).'</td>';
						echo '</tr>';
					}
						echo '</table>';
					
}
?>
</div>

<?php //include_once 'reportfooter.php'; ?>
<?php include_once 'inc/footer.php'; ?>
<script>window.print();</script>