<?php include_once 'inc/head.php'; ?>
<?php 
loadStaff2Array(); 
SetIngredientsArray();
?>
<div>
<div style="text-align:center;">
<h3 class="box-title"><?php echo ($_GET["ingredient"] != '')?$IngredientsArray[$_GET["ingredient"]].'\'s':''; ?> Report Between <?php echo $_REQUEST["datefrom"].' '.hr24to12($_REQUEST["timefrom"]).' - '.$_REQUEST["dateto"].' '.hr24to12($_REQUEST["timeto"]); ?></h3>
</div>  
  
  <div>
				  <?php
				 if ($_REQUEST["ingredient"] != ''){
				  		$filter_staff = " FIND_IN_SET('".mysqli_real_escape_string($conn4as,$_GET["ingredient"])."',addresturant.ingredients) > 0  AND ";
				  }else{
				  		$filter_staff = " ";
				  }
				 				  
				  if ($_REQUEST["timefrom"] != '' && $_REQUEST["timeto"] != ''){
				  		$filter_dt = " TIMESTAMP(order_restaurant.orderdate, order_restaurant.ordertime) BETWEEN TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timefrom"])."') AND TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timeto"])."') ";
				  }else{
				  		$filter_dt = " order_restaurant.orderdate BETWEEN '".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."' AND '".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."' ";
				  }
				  
				  $sql = select("SELECT order_restaurant.*,addresturant.name FROM order_restaurant INNER JOIN addresturant ON order_restaurant.itemid = addresturant.id WHERE ".$filter_staff.$filter_dt." ORDER BY order_restaurant.invoiceid DESC");
				  	
				  if($sql){
				  $IngredientName = $IngredientsArray[$_GET["ingredient"]];
				  	echo '<table class="table table-striped">
						<tr>
						  <th>SN</th>
						  <th>Invoice ID</th>
						  <th>Food</th>
						  <th>Qty.</th>
						  <th>Date</th>
						  <th>Time</th>
						  <th>Amount</th>
						  <th>Raw Product</th>
						</tr>';
					while($rs = mysqli_fetch_assoc($qry)){
							echo '<tr>';
							echo '<td>'.++$c.'</td>';
							echo '<td>'.$rs["invoiceid"].'</td>';
							echo '<td>'.$rs["name"].'</td>';
							echo '<td>'.$rs["qty"].'</td>';
							echo '<td>'.$rs["orderdate"].'</td>';
							echo '<td>'.hr24to12($rs["ordertime"]).'</td>';
							echo '<td>'.$sign.number_format($rs["total"],2).'</td>';
							echo '<td>'.$IngredientName.'</td>';
							echo '</tr>';
					}
					echo '</table>';
					echo '<div style="font-size:20px;"><strong>Approximate Total:</strong> '.$c.' '.$IngredientName.'<div>';
					}else{
						
					}
				?>
			    </div>
  
</div>
<script>window.print();</script>