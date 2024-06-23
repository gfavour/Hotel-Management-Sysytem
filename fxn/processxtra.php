<?php
include(__DIR__.'/connection.php');
$globalid = $_SESSION["amyi15"];

//NB: Update bar 1 & bar 2 dropdown list...let it pull from array seperately on bartype select to use their id to update bars...

/*********** Manage Bar ************/
if ($_POST["dwat"] == "transfer2bar"){
if ($_POST["storeitemid"] == ''){echo 'Item from store not found. Try again';}
else if ($_POST["bartype"] == ''){echo 'Type of bar is required';}
else if ($_POST["barname"] == '' && $_POST["chkaddasnew"] != '1'){echo 'Select the bar item to restock.';}
else if ($_POST["barqty"] == '' || validate($_POST["barqty"],"0-9")){echo 'Quantity is required. Numeric value only, no comma';}
else{
$time = time();
$storeid = $_POST["storeitemid"];
$addasnew = $_POST["addasnew"];
$bartype = $_POST["bartype"];
$barname = $_POST["barname"]; //this is barid
$barqty = $_POST["barqty"];

$qry = mysqli_query($conn4as,"SELECT * FROM tblstore WHERE id = ".mysqli_real_escape_string($conn4as,$storeid)." ORDER BY id");
$total = mysqli_num_rows($qry);
if($total > 0){
$rs = mysqli_fetch_assoc($qry);
$storename = $rs["name"];
$storeqty = $rs["qtyinstore"];
$storeprice = $rs["price"];
$storecostprice = $rs["costprice"];
$storebarcode = $rs["barcode"];
$storecatid = $rs["categoryid"];
$storemeasure = $rs["measure"];
$storequantity = $rs["quantity"];
$time = time();

//valiate if storeqty is >= barqty.....
if($storeqty < $barqty){
	echo 'Insufficient quantity in store. Adjust the quantity to send to bar.';
}else{
if($bartype == '2'){
$bartable = 'addbar2';
////////////////////
if($addasnew == '1'){ 
//.....add to bar2, bar2 add history, get leftover qty & update store, then add transfer history to tblstorehistory table ....
$sql = "INSERT INTO addbar2(name,categoryid,instock,itemleft,measure,quantity,price,description,barcode,costprice,newstock,oldremstock,laststockadd,datelaststockadd) VALUES('".mysqli_real_escape_string($conn4as,$storename)."','".mysqli_real_escape_string($conn4as,$storecatid)."','".mysqli_real_escape_string($conn4as,$barqty)."','".mysqli_real_escape_string($conn4as,$barqty)."','".mysqli_real_escape_string($conn4as,$storemeasure)."','".mysqli_real_escape_string($conn4as,$storequantity)."','".mysqli_real_escape_string($conn4as,$storeprice)."','','".mysqli_real_escape_string($conn4as,$storebarcode)."','".mysqli_real_escape_string($conn4as,$storecostprice)."','".mysqli_real_escape_string($conn4as,$barqty)."','0','".mysqli_real_escape_string($conn4as,$barqty)."','".mysqli_real_escape_string($conn4as,$time)."')";
mysqli_query($conn4as,$sql);
$newitemid = mysqli_insert_id($conn4as);

$regdate = date("Y-m-d");
$regtime = date("H:i:s");
$sql = "INSERT INTO tblrestock(itemid, itemtype, qty, itemleft, regdate, regstamp, staff, regtime, costprice, price, newstock) VALUES('".mysqli_real_escape_string($conn4as,$newitemid)."','bar2','".mysqli_real_escape_string($conn4as,$barqty)."','".mysqli_real_escape_string($conn4as,$barqty)."','".mysqli_real_escape_string($conn4as,$regdate)."','".mysqli_real_escape_string($conn4as,$time)."','".mysqli_real_escape_string($conn4as,$globalid)."','".mysqli_real_escape_string($conn4as,$regtime)."','".mysqli_real_escape_string($conn4as,$storecostprice)."','".mysqli_real_escape_string($conn4as,$storeprice)."','".mysqli_real_escape_string($conn4as,$barqty)."')";
mysqli_query($conn4as,$sql);

$newstoreqty = $storeqty - $barqty;
mysqli_query($conn4as,"UPDATE tblstore SET issync = '2', qtyinstore = ".mysqli_real_escape_string($conn4as,$newstoreqty)." WHERE id = ".mysqli_real_escape_string($conn4as,$storeid));
//EditStoreHistory('bar2',$storeid,$barqty,$storecostprice,$storeprice,'remove');
echo 'STORE2BARADDED';
}else{ 
//.....update qty in bar2, bar2 update history, get leftover qty & update store, then add transfer history to tblstorehistory table ....
UpdateBar4rmStore('bar2',$barname,'addbar2',$barqty);
$newstoreqty = $storeqty - $barqty;
mysqli_query($conn4as,"UPDATE tblstore SET issync = '2', qtyinstore = ".mysqli_real_escape_string($conn4as,$newstoreqty)." WHERE id = ".mysqli_real_escape_string($conn4as,$storeid));
//EditStoreHistory('bar2',$storeid,$barqty,$storecostprice,$storeprice,'remove');
echo 'STORE2BARADDED';
}
///////////////////////
}elseif($bartype == '1'){
$bartable = 'addbar1';

if($addasnew == '1'){}
else{ }

}else{
echo 'No bar selected.';	
}
} //end of qty validation...




}else{
echo 'Store item not found.';	
}

}
}

if ($_POST["dwat"] == "editbar"){
if ($_POST["name"] == ''){echo 'Title is required';}
else if ($_POST["categoryid"] == ''){echo 'Item type is required';}
//else if ($_POST["instock"] == '' || validate($_POST["instock"],"0-9")){echo 'Number of items in stock is required. Numeric value only, no comma';}
else if ($_POST["quantity"] == '' || validate($_POST["quantity"],"0-9")){echo 'Quantity is required. Numeric value only, no comma';}
else if ($_POST["price"] == '' || validate($_POST["price"],"0-9")){echo 'Selling Price is required. Numeric value only, no comma';}
else if ($_POST["costprice"] == '' || validate($_POST["price"],"0-9")){echo 'Cost Price is required. Numeric value only, no comma';}
else if ($_POST["costprice"] > $_POST["price"]){echo 'Cost Price must be less than selling price.';}
else{

$sql = select("select itemleft,instock,newstock,laststockadd from addbar WHERE id = ".mysqli_real_escape_string($conn4as,$barname));
$rs1 = mysqli_fetch_assoc($qry);
$rmleft = $rs1["itemleft"];
$instock = $rs1["instock"];
$newstock = $rs1["newstock"];
$laststockadd = $rs1["laststockadd"];
//costprice..

if($_POST["deductqty"] > 0 && isNumeric($_POST["deductqty"]) && $_POST["deductqty"] <= $rmleft){
	$left = $rmleft - $_POST["deductqty"];
	$instock = $instock - $_POST["deductqty"];
	$newstock = ($_POST["deductqty"] <= $newstock)?($newstock - $_POST["deductqty"]):'0';
	$laststockadd = ($_POST["deductqty"] <= $laststockadd)?($laststockadd - $_POST["deductqty"]):'0';
}else{
	$left = $rmleft;
}

$sql = "UPDATE addbar SET issync = '2', name = '".mysqli_real_escape_string($conn4as,$_POST["name"])."',categoryid = '".mysqli_real_escape_string($conn4as,$_POST["categoryid"])."',instock = '".mysqli_real_escape_string($conn4as,$instock)."',itemleft = '".mysqli_real_escape_string($conn4as,$left)."', measure='".mysqli_real_escape_string($conn4as,$_POST["measure"])."',quantity='".mysqli_real_escape_string($conn4as,$_POST["quantity"])."',price='".mysqli_real_escape_string($conn4as,$_POST["price"])."',description='".mysqli_real_escape_string($conn4as,$_POST["description"])."',barcode='".mysqli_real_escape_string($conn4as,$_POST["barcode"])."',costprice='".mysqli_real_escape_string($conn4as,$_POST["costprice"])."',newstock='".mysqli_real_escape_string($conn4as,$newstock)."',laststockadd='".mysqli_real_escape_string($conn4as,$laststockadd)."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);
mysqli_query($conn4as,$sql);

EditReStockList('bar',$_POST["hidid"],$_POST["deductqty"],$_POST["price"],$_POST["costprice"]);

echo 'NewBarUpdated';
}
}


function UpdateBar4rmStore($bartype,$barname,$bartable,$barqty){
global $conn4as;
//$bartype: bar or bar2....$barname is barid
$sql = select("select name,instock,itemleft,price,costprice from ".$bartable." WHERE id = ".mysqli_real_escape_string($conn4as,$barname));
$rs1 = mysqli_fetch_assoc($qry);
$itemleft = $rs1["itemleft"];
$itemleft1 = $rs1["itemleft"];
$instock = $rs1["instock"];
$name = $rs1["name"];
$price = $rs1["price"];
$costprice = $rs1["costprice"];
$restock = $barqty;

$itemleft = $itemleft + $restock;
$instock = $instock + $restock;
$oldremstock = $itemleft1;
$newstock = $itemleft;
$laststockadd = $restock;
$datelaststockadd = time();

$sql = "UPDATE ".$bartable." SET issync = '2', instock = '".mysqli_real_escape_string($conn4as,$instock)."',itemleft = '".mysqli_real_escape_string($conn4as,$itemleft)."',oldremstock = '".mysqli_real_escape_string($conn4as,$oldremstock)."',newstock = '".mysqli_real_escape_string($conn4as,$newstock)."',laststockadd = '".mysqli_real_escape_string($conn4as,$laststockadd)."',datelaststockadd = '".mysqli_real_escape_string($conn4as,$datelaststockadd)."' WHERE id = ".mysqli_real_escape_string($conn4as,$barname);
mysqli_query($conn4as,$sql);

Add2ReStockList($bartype,$barname,$restock,$itemleft1,$newstock,$price,$costprice);
UpdateInstructions($bartype,$barname,$restock);
}


/*

if ($_POST["storeitemid"] == ''){echo 'Item from store not found. Try again';}
else if ($_POST["bartype"] == ''){echo 'Type of bar is required';}
else if ($_POST["barname"] == '' && $_POST["chkaddasnew"] != '1'){echo 'Select the bar item to restock.';}
else if ($_POST["barqty"] == '' || validate($_POST["barqty"],"0-9")){echo 'Quantity is required. Numeric value only, no comma';}
else{
$time = time();
$storeid = $_POST["storeitemid"];

$qry = mysqli_query($conn4as,"SELECT * FROM tblstore WHERE id = ".mysqli_real_escape_string($conn4as,$storeid)." ORDER BY id");
$total = mysqli_num_rows($qry);
if($total > 0){
$rs = mysqli_fetch_assoc($qry);
$storename = $rs["name"];
$storeqty = $rs["qtyinstore"];
$storeprice = $rs["price"];
$storecostprice = $rs["costprice"];
$storebarcode = $rs["barcode"];
$storecategoryid = $rs["categoryid"];
$storemeasure = $rs["measure"];

if ($_POST["bartype"] == '1'){
	$bartable = 'addbar';
}else{
	$bartable = 'addbar2';
}

if($_POST["chkaddasnew"] == '1'){

$sql = "INSERT INTO ".$bartable."(name,categoryid,instock,itemleft,measure,quantity,price,description,barcode,costprice,newstock,oldremstock,laststockadd,datelaststockadd) VALUES('".mysqli_real_escape_string($conn4as,$_POST["name"])."','".mysqli_real_escape_string($conn4as,$_POST["categoryid"])."','".mysqli_real_escape_string($conn4as,$_POST["instock"])."','".mysqli_real_escape_string($conn4as,$_POST["instock"])."','".mysqli_real_escape_string($conn4as,$_POST["measure"])."','".mysqli_real_escape_string($conn4as,$_POST["quantity"])."','".mysqli_real_escape_string($conn4as,$_POST["price"])."','".mysqli_real_escape_string($conn4as,$_POST["description"])."','".mysqli_real_escape_string($conn4as,$_POST["barcode"])."','".mysqli_real_escape_string($conn4as,$_POST["costprice"])."','".mysqli_real_escape_string($conn4as,$_POST["instock"])."','0','".mysqli_real_escape_string($conn4as,$_POST["instock"])."','".mysqli_real_escape_string($conn4as,$time)."')";
mysqli_query($conn4as,$sql);
$newitemid = mysqli_insert_id($conn4as);

}else{

$sql = "UPDATE SET issync = '2', ".$bartable."(name,categoryid,instock,itemleft,measure,quantity,price,description,barcode,costprice,newstock,oldremstock,laststockadd,datelaststockadd) VALUES('".mysqli_real_escape_string($conn4as,$_POST["name"])."','".mysqli_real_escape_string($conn4as,$_POST["categoryid"])."','".mysqli_real_escape_string($conn4as,$_POST["instock"])."','".mysqli_real_escape_string($conn4as,$_POST["instock"])."','".mysqli_real_escape_string($conn4as,$_POST["measure"])."','".mysqli_real_escape_string($conn4as,$_POST["quantity"])."','".mysqli_real_escape_string($conn4as,$_POST["price"])."','".mysqli_real_escape_string($conn4as,$_POST["description"])."','".mysqli_real_escape_string($conn4as,$_POST["barcode"])."','".mysqli_real_escape_string($conn4as,$_POST["costprice"])."','".mysqli_real_escape_string($conn4as,$_POST["instock"])."','0','".mysqli_real_escape_string($conn4as,$_POST["instock"])."','".mysqli_real_escape_string($conn4as,$time)."')";
mysqli_query($conn4as,$sql);
$newitemid = mysqli_insert_id($conn4as);

}

}else{
echo 'Selected item from store not found...';
}
}

*/
?>