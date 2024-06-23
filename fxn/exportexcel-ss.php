<?php
include(__DIR__.'/connection.php');
$globalid = $_SESSION["amyi15"];

$arrmerger = array();
$arrmerger = [];

////////////////// EXPORT APPROVED WITHDRAWALS FROM ADMIN////////////////////////////
if ($_REQUEST["dwat"] == "1"){
$filename = "general-report.csv";
//header("Content-Disposition: attachment; filename=".$filename."");
//header("Content-Type: application/vnd.ms-excel");
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="'.$filename.'"');

$flag = false;

$fp = fopen('php://output', 'wb');
//$fp = fopen($file1,"w");

///////////////////////
if ($_GET["ispaid"] == '2'){$filter_ispaid = " ";}
				   else{
				  		if ($_GET["service"] == 'all'){
							$filter_ispaid = " ispaid = '".mysqli_real_escape_string($conn4as,$_GET["ispaid"])."' AND ";
						
						}elseif ($_GET["service"] == 'room'){
							$filter_ispaid = " ispaid = '".mysqli_real_escape_string($conn4as,$_GET["ispaid"])."' AND ";
						
						}elseif ($_GET["service"] == 'bar'){
							$filter_ispaid = " order_bar.ispaid = '".mysqli_real_escape_string($conn4as,$_GET["ispaid"])."' AND ";
						
						}elseif ($_GET["service"] == 'bar2'){
							$filter_ispaid = " order_bar2.ispaid = '".mysqli_real_escape_string($conn4as,$_GET["ispaid"])."' AND ";
						
						}elseif ($_GET["service"] == 'restaurant'){
							$filter_ispaid = " order_restaurant.ispaid = '".mysqli_real_escape_string($conn4as,$_GET["ispaid"])."' AND ";
						
						}elseif ($_GET["service"] == 'spa'){
							$filter_ispaid = " ispaid = '".mysqli_real_escape_string($conn4as,$_GET["ispaid"])."' AND ";
						
						}elseif ($_GET["service"] == 'swimpool'){
							$filter_ispaid = " ispaid = '".mysqli_real_escape_string($conn4as,$_GET["ispaid"])."' AND ";
						
						}elseif ($_GET["service"] == 'laundary'){
							$filter_ispaid = " ispaid = '".mysqli_real_escape_string($conn4as,$_GET["ispaid"])."' AND ";
						
						}elseif ($_GET["service"] == 'sport'){
							$filter_ispaid = " ispaid = '".mysqli_real_escape_string($conn4as,$_GET["ispaid"])."' AND ";
						
						}
				   }
				  
				   if ($_REQUEST["staffid"] != ''){
				  		if ($_GET["service"] == 'all'){
							$filter_staff = " ";
						}elseif ($_GET["service"] == 'room'){
							$filter_staff = " order_room.staffid = '".mysqli_real_escape_string($conn4as,$_GET["staffid"])."' AND ";					
						}elseif ($_GET["service"] == 'bar'){
							$filter_staff = " order_bar.staffid = '".mysqli_real_escape_string($conn4as,$_GET["staffid"])."' AND ";
						}elseif ($_GET["service"] == 'bar2'){
							$filter_staff = " order_bar2.staffid = '".mysqli_real_escape_string($conn4as,$_GET["staffid"])."' AND ";
						}elseif ($_GET["service"] == 'restaurant'){
							$filter_staff = " order_restaurant.staffid = '".mysqli_real_escape_string($conn4as,$_GET["staffid"])."' AND ";
						}elseif ($_GET["service"] == 'spa'){
							$filter_staff = " order_spa.staffid = '".mysqli_real_escape_string($conn4as,$_GET["staffid"])."' AND ";
						}elseif ($_GET["service"] == 'swimpool'){
							$filter_staff = " order_swimpool.staffid = '".mysqli_real_escape_string($conn4as,$_GET["staffid"])."' AND ";
						}elseif ($_GET["service"] == 'laundary'){
							$filter_staff = " order_laundary.staffid = '".mysqli_real_escape_string($conn4as,$_GET["staffid"])."' AND ";
						}elseif ($_GET["service"] == 'sport'){
							$filter_staff = " order_sportitem.staffid = '".mysqli_real_escape_string($conn4as,$_GET["staffid"])."' AND ";
						}
				  }else{
				  		$filter_staff = " ";
				  }
				  
				  
				   if ($_REQUEST["timefrom"] != '' && $_REQUEST["timeto"] != ''){
				  		$fromInv = $_REQUEST["timefrom"];
						$toInv = $_REQUEST["timeto"];
						
						if ($_GET["service"] == 'all'){
				  		$filter_dt = " TIMESTAMP(orderdate, ordertime) BETWEEN TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timefrom"])."') AND TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timeto"])."') ";
						
						}elseif ($_GET["service"] == 'room'){
							$filter_dt = " TIMESTAMP(order_room.orderdate, order_room.ordertime) BETWEEN TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timefrom"])."') AND TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timeto"])."') ";
										
						}elseif ($_GET["service"] == 'bar'){
							$filter_dt = " TIMESTAMP(order_bar.orderdate, order_bar.ordertime) BETWEEN TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timefrom"])."') AND TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timeto"])."') ";
						
						}elseif ($_GET["service"] == 'bar2'){
							$filter_dt = " TIMESTAMP(order_bar2.orderdate, order_bar2.ordertime) BETWEEN TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timefrom"])."') AND TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timeto"])."') ";
							
						}elseif ($_GET["service"] == 'restaurant'){
							$filter_dt = " TIMESTAMP(order_restaurant.orderdate, order_restaurant.ordertime) BETWEEN TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timefrom"])."') AND TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timeto"])."') ";
							
						}elseif ($_GET["service"] == 'spa'){
							$filter_dt = " TIMESTAMP(order_spa.orderdate, order_spa.ordertime) BETWEEN TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timefrom"])."') AND TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timeto"])."') ";
							
						}elseif ($_GET["service"] == 'swimpool'){
							$filter_dt = " TIMESTAMP(order_swimpool.orderdate, order_swimpool.ordertime) BETWEEN TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timefrom"])."') AND TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timeto"])."') ";
							
						}elseif ($_GET["service"] == 'laundary'){
							$filter_dt = " TIMESTAMP(order_laundary.orderdate, order_laundary.ordertime) BETWEEN TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timefrom"])."') AND TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timeto"])."') ";
							
						}elseif ($_GET["service"] == 'sport'){
							$filter_dt = " TIMESTAMP(order_sportitem.orderdate, order_sportitem.ordertime) BETWEEN TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timefrom"])."') AND TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timeto"])."') ";
						}
						
				  }else{
				  		$filter_dt = " orderdate BETWEEN '".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."' AND '".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."' ";
				  }
//////////////////
if ($_GET["service"] == 'all'){
				  $sql = select("SELECT * FROM orders WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id DESC");
				  
				  }elseif ($_GET["service"] == 'room'){
				  $sql = select("SELECT order_room.*,addroom.roomType FROM order_room INNER JOIN addroom ON order_room.roomid = addroom.id WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY order_room.id DESC");
				  $services = 'Room';
				  
				  }elseif ($_GET["service"] == 'bar'){
				  $sql = select("SELECT order_bar.*,addbar.name FROM order_bar INNER JOIN addbar ON order_bar.itemid = addbar.id WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY order_bar.id DESC");
				  $services = 'Bar';
				  
				  }elseif ($_GET["service"] == 'bar2'){
				  $sql = select("SELECT order_bar2.*,addbar2.name FROM order_bar2 INNER JOIN addbar2 ON order_bar2.itemid = addbar2.id WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY order_bar2.id DESC");
				  $services = 'Pool Bar';
				  
				  }elseif ($_GET["service"] == 'restaurant'){
				  $sql = select("SELECT order_restaurant.*,addresturant.name FROM order_restaurant INNER JOIN addresturant ON order_restaurant.itemid = addresturant.id WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY order_restaurant.id");
				  $services = 'Restaurant';
				  
				  }elseif ($_GET["service"] == 'spa'){
				  $sql = select("SELECT * FROM order_spa WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id");
				  $services = 'Spa';
				  
				  }elseif ($_REQUEST["service"] == 'swimpool'){
				  $sql = select("SELECT * FROM order_swimpool WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id");
				  $services = 'Swimming Pool';
				  
				  }elseif ($_GET["service"] == 'laundary'){
				  $sql = select("SELECT * FROM order_laundary WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id");
				  $services = 'Laundary';
				  
				  }elseif ($_GET["service"] == 'sport'){
				  $sql = select("SELECT * FROM order_sportitem WHERE ".$filter_staff.$filter_ispaid.$filter_dt." ORDER BY id");
				  $services = 'Sport Materials';
				  
				  }
///////////////////////
	if($sql){
		if ($_GET["service"] == 'bar'){
$echo = explode(',','SN,Invoice ID,Service Rendered,Item Description,Qty,Waiter,Date,Time,Discount,Payment Status,Sub Total,Staff,;');
					$arrmerger = array_merge($arrmerger,$echo);
					
					}elseif ($_GET["service"] == 'bar2'){
					$echo = explode('SN,Invoice ID,Service Rendered,Item Description,Qty,Waiter,Date,Time,Discount,Payment Status,Sub Total,Staff,;');
					$arrmerger = array_merge($arrmerger,$echo);
					  
					}elseif ($_GET["service"] == 'restaurant'){
					$echo = explode('SN,Invoice ID,Service Rendered,Item Description,Qty,Table No.,Date,Time,Discount,Payment Status,Sub Total,Staff,;');
					$arrmerger = array_merge($arrmerger,$echo);
					 
					}elseif ($_GET["service"] == 'room'){
					$echo = explode('SN,Invoice ID,Service Rendered,Room Desc,Check In,Check Out,Date,Time,Discount,Payment Status,Sub Total,Staff,;');
					$arrmerger = array_merge($arrmerger,$echo);
					
					}else{
					$echo = explode('SN,Invoice ID,Service Rendered,Date,Time,Discount,Payment Status,Sub Total,Staff,;');
					$arrmerger = array_merge($arrmerger,$echo);
					}
					
					
				    $c = 1;
					while($rs = mysqli_fetch_assoc($qry)){
						if ($_GET["service"] == 'all'){
							$services = '';
							if ($rs["isroom"] == '1'){$services = 'Room: ';$isroom =1;}
							if ($rs["isbar"] == '1'){$services .= 'Bar: ';$isbar = 1;}
							if ($rs["isrestaurant"] == '1'){$services .= 'Restaurant: ';$isrestaurant = 1;}
							if ($rs["islaundary"] == '1'){$services .= 'Laundary: ';$islaundary = 1;}
							if ($rs["isspa"] == '1'){$services .= 'Spa: ';$isspa = 1;}
							if ($rs["isswimpool"] == '1'){$services .= 'Swimming Pool: ';$isswimpool = 1;}
							if ($rs["issport"] == '1'){$services .= 'Sport ';$issport = 1;}
						}
						$echo  = $c++.',';
						$echo .=$rs["invoiceid"].',';
						$echo .='"'.$services.'",';
						
						if ($_GET["service"] == 'bar'){
							$echo .='"'.$rs["name"].'",';
							$echo .=$rs["qty"].',';
							$echo .='"'.$rs["waiter"].'",';
							$echo .=$rs["orderdate"].',';
							$echo .=hr24to12($rs["ordertime"]).',';
							$echo .=$rs["discount"].'%,';
						}elseif ($_GET["service"] == 'bar2'){
							$echo .='"'.$rs["name"].'",';
							$echo .=$rs["qty"].',';
							$echo .='"'.$rs["waiter"].'",';
							$echo .=$rs["orderdate"].',';
							$echo .=hr24to12($rs["ordertime"]).',';
							$echo .=$rs["discount"].'%,';
						}elseif ($_GET["service"] == 'restaurant'){
							$echo .='"'.$rs["name"].'",';
							$echo .=$rs["qty"].',';
							$echo .='"'.$rs["tableno"].'",';
							$echo .=$rs["orderdate"].',';
							$echo .=hr24to12($rs["ordertime"]).',';
							$echo .=$rs["discount"].'%,';
						}elseif ($_GET["service"] == 'room'){
							$echo .='"'.$rs["roomType"].'",';
							$echo .=$rs["checkin"].',';
							$echo .=$rs["checkout"].',';
							$echo .=$rs["orderdate"].',';
							$echo .=hr24to12($rs["ordertime"]).',';
							$echo .=$rs["discount"].'%,';
						}else{
							$echo .=$rs["orderdate"].',';
							$echo .=hr24to12($rs["ordertime"]).',';
							$echo .=$rs["discount"].'%,';
						}
						
						$echo .=($rs["ispaid"] == '1')?'Paid,':'UnPaid,';
						$echo .='"'.$rs["total"].'",';
						$echo .='"'.$allstaffs[$rs["staffid"]].'",';
						$echo .=';';
						$arrmerger = array_merge($arrmerger,explode(",",$echo));
						$grandtotal += $rs["total"];
						fputcsv($fp,explode(",",$echo),",");
					}
						$echo .='Grand Total:, "'.$grandtotal.'"';
						//$arrmerger = array_merge($arrmerger,explode(",",'Grand Total:, "'.$grandtotal.'",;'));
						
						//foreach ($arrmerger as $line){
  								//fputcsv($file,explode(',',$line));
						//}
  
	}
}




///////// EXPORT MY WAITHDRAWALS /////////////////////
if ($_REQUEST["dwat"] == "2"){
$filename = "my-withdrawals.xls";
header("Content-Disposition: attachment; filename='".$filename."'");
header("Content-Type: application/vnd.ms-excel");
$flag = false;
$sql = select("SELECT users.memberid AS 'Member ID',CONCAT(users.lastname,' ',users.firstname) AS Name,withdraw.amount AS 'Withdrawal Amount',withdraw.percent AS 'Withdrawal Percentage',withdraw.totalcontribution AS 'Share Balance',withdraw.reqdate AS Date FROM withdraw INNER JOIN users ON withdraw.userid = users.id WHERE withdraw.userid = '".mysqli_real_escape_string($conn4as,$globalid)."' ORDER BY withdraw.id");
	if($sql){
		while ($rs = mysqli_fetch_assoc($qry)){
			if (!$flag) {
				echo implode("\t", array_keys($rs))."\r\n";
				$flag = true;
			}
			echo implode("\t", array_values($rs))."\r\n";
		}
	}
}

///////// export expenses /////////////////////
if ($_REQUEST["dwat"] == "23"){
$year = $_REQUEST["yrs"];

if($year != ''){
$hding = $year.' Expenses';
$filename = "expenses-for-year-".$year.".xls";
}else{
$hding = 'All Expenses';
$filename = "all-expenses.xls";
}

header("Content-Disposition: attachment; filename='".$filename."'");
header("Content-Type: application/vnd.ms-excel");
$flag = false;
$c=1;

if ($year != ''){
	$totalexp = returnField("SELECT SUM(amount) AS totalexp FROM expenses WHERE (expdate LIKE '%".$year."%')","totalexp");
	$sql = select("SELECT * FROM expenses WHERE expdate LIKE '%".$year."%' ORDER BY id");
}else{
	$totalexp = returnField("SELECT SUM(amount) AS totalexp FROM expenses","totalexp");
	$sql = select("SELECT * FROM expenses ORDER BY id");
}

	if($sql){
	echo '<table><tr><td colspan="6">'.$hding.'</td></tr><tr><td>SN</td><td>Title</td><td>Amount</td><td>Date</td><td>Short Note</td></tr>';
	
		while ($rs = mysqli_fetch_assoc($qry)){
			echo '<tr>';
			echo '<td>'.$c++.'</td>';
			echo '<td>'.$rs["title"].'</td>';
			echo '<td>'.number_format($rs["amount"],2).'</td>';
			echo '<td>'.$rs["expdate"].'</td>';
			echo '<td>'.$rs["shortnote"].'</td>';
			echo '</tr>';     		
		}
			echo '<tr>';
			echo '<td></td>';
			echo '<td></td>';
			echo '<td></td>';
			echo '<td><strong>Total Expenses</strong></td>';
			echo '<td>'.number_format($totalexp,2).'</td>';
			echo '</tr>';
		echo '</table>';
	}
}


if ($_REQUEST["dwat"] == "Ing2xls"){
$filename = date("Y-m-d-h-i-s-A").'.csv';
header("Content-Disposition: attachment; filename='".$filename."'");
header("Content-Type: application/vnd.ms-excel");
$flag = false;


if ($_REQUEST["ingredient"] == ''){echo 'Raw Product/Ingredient is required';}
else{
SetIngredientsArray($_REQUEST["ingredient"]);

if ($_REQUEST["ingredient"] != ''){
	$filter_staff = " FIND_IN_SET('".mysqli_real_escape_string($conn4as,$_REQUEST["ingredient"])."',addresturant.ingredients) > 0 ";
}else{
	$filter_staff = " ";
}
				 				  
if ($_REQUEST["timefrom"] != '' && $_REQUEST["timeto"] != ''){
$filter_staff = ($filter_staff != '')?$filter_staff.' AND ':$filter_staff;
$filter_dt = " TIMESTAMP(order_restaurant.orderdate, order_restaurant.ordertime) BETWEEN TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timefrom"])."') AND TIMESTAMP('".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."','".mysqli_real_escape_string($conn4as,$_REQUEST["timeto"])."') ";
}else{
$filter_staff = ($filter_staff != '')?$filter_staff.' AND ':$filter_staff;
$filter_dt = " order_restaurant.orderdate BETWEEN '".mysqli_real_escape_string($conn4as,$_REQUEST["datefrom"])."' AND '".mysqli_real_escape_string($conn4as,$_REQUEST["dateto"])."' ";
}
  
$sql = "SELECT order_restaurant.*,addresturant.name FROM order_restaurant INNER JOIN addresturant ON order_restaurant.itemid = addresturant.id WHERE ".$filter_staff.$filter_dt." ORDER BY order_restaurant.invoiceid DESC";
$qry = mysqli_query($conn4as,$sql);
$total = mysqli_num_rows($qry);

if($total > 0){	
	echo '<table class="table table-striped"><tr><th>SN</th><th>Invoice ID</th><th>Food</th><th>Qty.</th><th>Date</th><th>Time</th><th>Amount</th><th>Raw Product</th></tr>';	
	$IngredientName = $IngredientsArray[$_GET["ingredient"]];
	
	while($rs = mysqli_fetch_assoc($qry)){
		echo '<tr>';
		echo '<td>'.$c++.'</td>';
		echo '<td>'.$rs["invoiceid"].'</td>';
		echo '<td>'.$rs["name"].'</td>';
		echo '<td>'.$rs["qty"].'</td>';
		echo '<td>'.$rs["orderdate"].'</td>';
		echo '<td>'.hr24to12($rs["ordertime"]).'</td>';
		echo '<td>'.$rs["total"].'</td>';
		echo '<td>'.$IngredientName.'</td>';
		echo '</tr>';
	}
	echo '</table>';
}else{
	echo 'Exporting data to excel failed. Try again!';
}
}

}

fclose($fp);
?>
