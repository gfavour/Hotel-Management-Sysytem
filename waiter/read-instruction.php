<?php include_once 'inc/head.php'; ?>

<div class="col-sm-12">
<h1 style="font-size:26px;">Re-Stock Order/Instruction From Admin</h1>
<?php
$sql = select2nav("SELECT count(tblinstruct.id) as ctn FROM tblinstruct INNER JOIN addbar ON tblinstruct.itemid = addbar.id ORDER BY tblinstruct.id","SELECT tblinstruct.*,addbar.name FROM tblinstruct INNER JOIN addbar ON tblinstruct.itemid = addbar.id ORDER BY tblinstruct.id DESC");
if($sql){
				  echo 'Below is/are the list of instructions from the administrator on re-stocking. Kindly do as you are told. Thank you!<br><br>';
				  
					while($rs = mysqli_fetch_assoc($qry)){
					$datetime = date("l, d M Y h:i A",$rs["regtime"]);
					echo '<div class="col-sm-3" style="margin:10px 10px 10px 0; min-height:210px;border-radius:5px;border:#ccc solid 1px;padding:20px; background:#ffc;">					  					  <b>SN: </b>'.$c++.'<br><b>Item Name: </b>'.$rs["name"].'<br><b>Quantity to Re-stock: </b>'.$rs[qty2restock].'<br><b>Date/Time: </b>'.$datetime.'<br><b>Additional Info.: </b><br>'.$rs["message"].'</div>';
					}
					
}else{
echo '<div style="color:#f00;">No instruction passed to manager left undone.</div>';
}
?>
</div>

<?php include_once 'inc/footer.php'; ?>