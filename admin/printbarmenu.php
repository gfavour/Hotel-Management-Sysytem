<?php include_once 'inc/head.php'; ?>
<?php include_once 'reporthead.php'; ?>
<div>
<?php
$sql = select("SELECT * FROM addbar ORDER BY id");
if($sql){

				  echo '<table class="table table-striped">
                    <tr>
                      <th>SN</th>
                      <th>Name</th>
					  <th>Item Type</th>
                      <th>Price</th>
                    </tr>';
				  $c=1;
					while($rs = mysqli_fetch_assoc($qry)){
													
						echo '<tr>';
						//echo '<td><input type="radio" value="'.$rs["id"].'" name="chkid" id="chkid" title="'.$rs["id"].'"></td>';
						echo '<td>'.$c++.'</td>';
						echo '<td>'.$rs["name"].'</td>';
						echo '<td>'.getOneField("SELECT catname FROM tblcategory WHERE id = ".mysqli_real_escape_string($conn4as,$rs["categoryid"]),"catname").'</td>';
						echo '<td nowrap>'.$cursign.number_format($rs["price"]).' per '.$rs["quantity"].' '.$rs["measure"].'</td>';
						echo '</tr>';
					}
						echo '</table>';
					
}
?>
</div>

<?php //include_once 'reportfooter.php'; ?>
<?php include_once 'inc/footer.php'; ?>
<script>window.print();</script>