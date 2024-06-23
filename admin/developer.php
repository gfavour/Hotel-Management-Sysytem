<?php include_once 'inc/head.php'; ?>
<div style="margin:10px auto; width:60%;">
<?php
if(isset($_POST["itemids"])){
foreach($_POST["itemids"] as $theid){
//echo $theid.'-'.$_POST["qty-".$theid].'<br>';
$qty = 0;
$qty = $_POST["qty-".$theid];
$sql .= "UPDATE addbar SET instock='".$qty."', itemleft='".$qty."', newstock'".$qty."', laststockadd='".$qty."', oldremstock='0' WHERE id=".mysqli_real_escape_string($conn4as,$theid).";<br>";
}
echo $sql;
}
?>
<form name="frmx" action="" method="post">
<?php
$sql = select("SELECT * FROM addbar ORDER BY id");
if($sql){

				  echo '<table class="table table-striped">
                    <tr>
                      <th>SN</th>
                      <th>Name</th>
					  <th>Instock</th>
					  <th>Qty Left</th>
                      <th>Add New Qty</th>
                    </tr>';
				  $c=1;
					while($rs = mysqli_fetch_assoc($qry)){
													
						echo '<tr>';
						//echo '<td><input type="radio" value="'.$rs["id"].'" name="chkid" id="chkid" title="'.$rs["id"].'"></td>';
						echo '<td>'.$rs["id"].'</td>';
						echo '<td>'.$rs["name"].'</td>';
						echo '<td>'.$rs["instock"].'</td>';
						echo '<td>'.$rs["itemleft"].'</td>';
						echo '<td nowrap><input type="hidden" value="'.$rs["id"].'" name="itemids[]"><input type="text" value="'.$rs["itemleft"].'" name="qty-'.$rs["id"].'"></td>';
						echo '</tr>';
					}
						echo '</table>';
					
}
?>
<button>Submit</button>
</form>
</div>
<?php include_once 'inc/footer.php'; ?>