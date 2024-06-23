<?php include_once 'inc/head.php'; ?>
<?php
function DODO($itemid, $itemleft, $costprice, $price, $newstock){
global $conn4as;

	$insqry = '';
	$regdate = date("Y-m-d");
	$regtime = date("H:i:s");
	$regstamp = time();
	
	if($insqry == ''){
	$insqry = "INSERT INTO tblrestock(itemid,itemtype,qty,itemleft,regdate,regstamp,staff,regtime,costprice,price,newstock) VALUES('".mysqli_real_escape_string($conn4as,$itemid)."','bar','0','".mysqli_real_escape_string($conn4as,$itemleft)."','".mysqli_real_escape_string($conn4as,$regdate)."','".mysqli_real_escape_string($conn4as,$regstamp)."','5','".mysqli_real_escape_string($conn4as,$regtime)."','".mysqli_real_escape_string($conn4as,$costprice)."','".mysqli_real_escape_string($conn4as,$price)."','".mysqli_real_escape_string($conn4as,$newstock)."')";
	}else{
	$insqry .= ",('".mysqli_real_escape_string($conn4as,$itemid)."','bar','0','".mysqli_real_escape_string($conn4as,$itemleft)."','".mysqli_real_escape_string($conn4as,$regdate)."','".mysqli_real_escape_string($conn4as,$regstamp)."','5','".mysqli_real_escape_string($conn4as,$regtime)."','".mysqli_real_escape_string($conn4as,$costprice)."','".mysqli_real_escape_string($conn4as,$price)."','".mysqli_real_escape_string($conn4as,$newstock)."')";
	}
	mysqli_query($conn4as,$insqry);
}

$sql = select("SELECT * FROM addbar ORDER BY id");
if($sql){
while($rs = mysqli_fetch_assoc($qry)){
	$itemid = $rs["id"];
	$itemleft = $rs["itemleft"];
	$costprice = $rs["costprice"];
	$price = $rs["price"]; 
	$newstock = $rs["newstock"];
	DODO($itemid,$itemleft, $costprice,$price,$newstock);
}
echo 'tblrestock updated...';
}
/*
if($_GET["dwat"] == 'reload-afresh-existing-bar-tables'){
mysqli_query($conn4as,"UPDATE addbar SET itemleft = '0' WHERE itemleft < 0");
echo 'Addbar1 table negative values set to zero...<br>';
mysqli_query($conn4as,"UPDATE addbar2 SET itemleft = '0' WHERE itemleft < 0");
echo 'Addbar2 table negative values set to zero...<br>';
echo '==================================<br>';
mysqli_query($conn4as,"UPDATE addbar SET instock = itemleft, costprice = '0', newstock=itemleft, oldremstock='0', laststockadd=itemleft");
echo 'Addbar 1 table updated...<br>';
mysqli_query($conn4as,"UPDATE addbar2 SET instock = itemleft, costprice = '0', newstock=itemleft, oldremstock='0', laststockadd=itemleft");
echo 'Addbar 2 table updated...<br>';
}
//================= TRUNCATING=========================
if($_GET["dwat"] == 'truncate'){
mysqli_query($conn4as,"TRUNCATE expenditure");
mysqli_query($conn4as,"TRUNCATE addbar");
mysqli_query($conn4as,"TRUNCATE addbar2");
mysqli_query($conn4as,"TRUNCATE addclient");
mysqli_query($conn4as,"TRUNCATE addlaundary");
mysqli_query($conn4as,"TRUNCATE addresturant");
mysqli_query($conn4as,"TRUNCATE addroom");
mysqli_query($conn4as,"TRUNCATE addspa");
mysqli_query($conn4as,"TRUNCATE addsport");
mysqli_query($conn4as,"TRUNCATE addswimpool");
mysqli_query($conn4as,"TRUNCATE orders");
mysqli_query($conn4as,"TRUNCATE order_bar");
mysqli_query($conn4as,"TRUNCATE order_bar2");
mysqli_query($conn4as,"TRUNCATE order_laundary");
mysqli_query($conn4as,"TRUNCATE order_restaurant");
mysqli_query($conn4as,"TRUNCATE order_room");
mysqli_query($conn4as,"TRUNCATE order_spa");
mysqli_query($conn4as,"TRUNCATE order_sportitem");
mysqli_query($conn4as,"TRUNCATE order_swimpool");
mysqli_query($conn4as,"TRUNCATE tblinstruct");
mysqli_query($conn4as,"TRUNCATE tblrestock");
mysqli_query($conn4as,"TRUNCATE ewallet");
mysqli_query($conn4as,"TRUNCATE tblrestock");
mysqli_query($conn4as,"TRUNCATE users");
mysqli_query($conn4as,"TRUNCATE waiters");
echo 'TRUNCATING....<br>';
echo '20 Tables successfully truncated.<br>';
}
*/
?>