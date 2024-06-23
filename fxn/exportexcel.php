<?php
include(__DIR__.'/connection.php');
$globalid = $_SESSION["amyi15"];
loadStaff2Array();

$arrmerger = array();
$arrmerger = [];

function array_to_csv_download($array, $filename = "export.csv", $delimiter=";") {
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="'.$filename.'";');
    $f = fopen('php://output', 'w');
    foreach ($array as $line) {
        fputcsv($f, $line); //, $delimiter
    }
}

////////////////// EXPORT APPROVED ////////////////////////////
if ($_REQUEST["dwat"] == "1"){
$filename = "general-report.csv";
$flag = false;
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
					$hdecho = 'SN,Invoice ID,Service Rendered,Item Description,Qty,Waiter,Date,Time,Discount,Payment Status,Sub Total,Staff';
					
					}elseif ($_GET["service"] == 'bar2'){
					$hdecho = 'SN,Invoice ID,Service Rendered,Item Description,Qty,Waiter,Date,Time,Discount,Payment Status,Sub Total,Staff';
					  
					}elseif ($_GET["service"] == 'restaurant'){
					$hdecho = 'SN,Invoice ID,Service Rendered,Item Description,Qty,Table No.,Date,Time,Discount,Payment Status,Sub Total,Staff';
					 
					}elseif ($_GET["service"] == 'room'){
					$hdecho = 'SN,Invoice ID,Service Rendered,Room Desc,Check In,Check Out,Date,Time,Discount,Payment Status,Sub Total,Staff';
					
					}else{
					$hdecho = 'SN,Invoice ID,Service Rendered,Date,Time,Discount,Payment Status,Sub Total,Staff';
					}
					array_push($arrmerger,explode(",",$hdecho));

					$c = 1;
					while($rs = mysqli_fetch_assoc($qry)){
						if ($_GET["service"] == 'all'){
							$services = '';
							if ($rs["isroom"] == '1'){$services = 'Room, ';$isroom =1;}
							if ($rs["isbar"] == '1'){$services .= 'Bar, ';$isbar = 1;}
							if ($rs["isrestaurant"] == '1'){$services .= 'Restaurant, ';$isrestaurant = 1;}
							if ($rs["islaundary"] == '1'){$services .= 'Laundary, ';$islaundary = 1;}
							if ($rs["isspa"] == '1'){$services .= 'Spa, ';$isspa = 1;}
							if ($rs["isswimpool"] == '1'){$services .= 'Swimming Pool, ';$isswimpool = 1;}
							if ($rs["issport"] == '1'){$services .= 'Sport ';$issport = 1;}
						}
						$echo  = $c++.',';
						$echo .= $rs["invoiceid"].',';
						$echo .= '"'.$services.'",';
						
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
						$echo .=$rs["total"].',';
						$echo .= ($rs["staffid"] == '')?'N/A':$allstaffs[$rs["staffid"]];
						//$echo .=';';
						array_push($arrmerger,explode(",",$echo)); 
						$grandtotal += $rs["total"];
					}
					 	$gtecho .= ',,,,,,,,Grand Total,'.$grandtotal;
						array_push($arrmerger,explode(",",$gtecho)); 
						array_to_csv_download($arrmerger,$filename,",");
						
}
}

?>