<?php
$invoiceid = $_GET["invoiceid"];
$guestid = getGuestIdByInvoiceId($invoiceid);
$c = 0;
$sql = select("SELECT orders.*,order_room.checkin,order_room.checkout,addclient.lastname,addclient.firstname,addclient.phone,addclient.company FROM orders INNER JOIN order_room ON orders.invoiceid = order_room.invoiceid INNER JOIN addclient ON orders.guestid = addclient.id WHERE orders.invoiceid = '".mysqli_real_escape_string($conn4as,$invoiceid)."' ORDER BY orders.id DESC");
	if($sql){				  
		while($rs = mysqli_fetch_assoc($qry)){		
						$checkin = $rs["checkin"];
						$checkout = $rs["checkout"];
						$roomid = $rs["roomid"];
						$paystatus = $rs["paystatus"];
						
						$companydetails = ($rs["company"] != '')?GetCompanyDetails4Invoice($rs["company"]):'';
						GetRoomDetails4Invoice($invoiceid,$guestid);
						$totalDeposit = 0;
						$totalDebit = 0;
						$totalCharge = 0;
						$totalBal = 0;
						echo '<div style="padding-bottom:10px;"><table width="100%"><tr><td width="60%" valign="bottom"><div>'.$companydetails.'<br>'.$customerdetails.'</div></td><td width="40%" valign="bottom"><div>'.$roomdetails.'</div></td></tr></table></div>';
						
						echo '<table width="100%" cellpadding="2" cellspacing="2"><tr class="linetopbtm"><td>SN.</td><td>Date</td><td>Description</td><td>&nbsp;</td><td>Charges (NGN)</td><td>Debit (NGN)</td><td>Deposit (NGN)</td></tr>';
						
						//Deposits....
						GetGuestWalletBalance($rs["guestid"]);
						
						if ($rs["isroom"] == '1'){ 
							GetInvoicesByServices('room',$rs["invoiceid"],$rs["guestid"],$checkin,$checkout,$roomid); 
						}
						//if ($rs["isbar"] == '1'){
							GetInvoicesByServices('bar',$rs["invoiceid"],$rs["guestid"],$checkin,$checkout,$roomid);
						//}
						//if ($rs["isbar2"] == '1'){
							GetInvoicesByServices('bar2',$rs["invoiceid"],$rs["guestid"],$checkin,$checkout,$roomid);
						//}
							GetInvoicesByServices('bar3',$rs["invoiceid"],$rs["guestid"],$checkin,$checkout,$roomid);
						//if ($rs["isrestaurant"] == '1'){
							GetInvoicesByServices('res',$rs["invoiceid"],$rs["guestid"],$checkin,$checkout,$roomid);
						//}
						//if ($rs["islaundary"] == '1'){
							GetInvoicesByServices('lau',$rs["invoiceid"],$rs["guestid"],$checkin,$checkout,$roomid);
						//}
						//if ($rs["isspa"] == '1'){
							GetInvoicesByServices('spa',$rs["invoiceid"],$rs["guestid"],$checkin,$checkout,$roomid);
						//}
						//if ($rs["isswimpool"] == '1'){
							GetInvoicesByServices('swi',$rs["invoiceid"],$rs["guestid"],$checkin,$checkout,$roomid);
						//}
						//if ($rs["issport"] == '1'){
							GetInvoicesByServices('spo',$rs["invoiceid"],$rs["guestid"],$checkin,$checkout,$roomid);
						//}
						
						$totalBalance = $totalCharge + $totalDebit;
						$totalGDeposit = $totalDeposit;
						if($totalBalance > 0){
							if($totalBalance >= $totalDeposit && $totalDeposit > 0){
								$totalBalance = $totalBalance - $totalDeposit;
								$totalGDeposit = 0;
							}elseif($totalBalance < $totalDeposit && $totalDeposit > 0){
								$totalGDeposit = $totalDeposit - $totalBalance;
								$totalBalance = 0;
							}
						}
						echo '<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';						
						echo '<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td class="linetopbtm"><strong>Total: </strong></td><td class="linetopbtm">'.number_format($totalCharge,2).'</td><td class="linetopbtm">'.number_format($totalDebit,2).'</td><td class="linetopbtm">'.number_format($totalDeposit,2).'</td></tr>';
						echo '<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td class="linetopbtm"><strong>Balance: </strong></td><td class="linetopbtm">'.number_format($totalBalance,2).'</td><td class="linetopbtm">&nbsp;</td><td class="linetopbtm">'.number_format($totalGDeposit,2).'</td></tr></table>';
					}
					}else{
						echo '<table width="100%" cellpadding="2" cellspacing="2"><tr class="linetopbtm"><td>SN</td><td>Date</td><td>Description</td><td>Charges (NGN)</td><td>Debit (NGN)</td><td>Deposit (NGN)</td></tr>';
						echo '<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table>';
					}
?>

<?php
function GetCompanyDetails4Invoice($companyid){
global $conn4as;
$qry = mysqli_query($conn4as,"SELECT * FROM tblcompany WHERE id = '".mysqli_real_escape_string($conn4as,$companyid)."' ORDER BY id DESC");
$total = mysqli_num_rows($qry);
if($total > 0){
	$rs = mysqli_fetch_assoc($qry);
	$companydetails = '';
	$companydetails .= strtoupper($rs["name"]).'<br>';
	$companydetails .= strtoupper($rs["address"]).'<br>';
	return $companydetails;
}else{
	return '';
}
}

function GetRoomDetails4Invoice($invoiceid,$guestid){
global $conn4as,$customerdetails,$roomdetails;
$sql = "SELECT order_room.*,addclient.lastname,addclient.firstname,addclient.phone,addclient.company,addroom.roomType FROM order_room INNER JOIN addclient ON order_room.guestid = addclient.id INNER JOIN addroom ON order_room.roomid = addroom.id WHERE order_room.invoiceid = '".mysqli_real_escape_string($conn4as,$invoiceid)."' AND order_room.guestid = '".mysqli_real_escape_string($conn4as,$guestid)."' ORDER BY order_room.id DESC";
$qry = mysqli_query($conn4as,$sql);
$total = mysqli_num_rows($qry);
	if($total > 0){				  
		while($rs = mysqli_fetch_assoc($qry)){						
			if ($rs["company"] != ''){$companyid = $rs["company"];}else{$companyid = '';}						
			$customerdetails .= ucwords(strtolower($rs["firstname"])).', '.ucwords(strtolower($rs["lastname"])).'<br>INFORMATION INVOICE';
			$roomdetails = '<table>';
			$roomdetails .= '<tr><td class="width200">Room No. </td><td nowrap>: '.$rs["roomType"].'</td></td>';
			$roomdetails .= '<tr><td class="width200">Check In Date </td><td nowrap>: '.$rs["checkin"].'</td></td>';
			$roomdetails .= '<tr><td class="width200">Check Out Date </td><td nowrap>: '.$rs["checkout"].'</td></td>';
			//$roomdetails .= '<tr><td class="width200">Check In Time. </td><td nowrap>: '.$rs["ordertime"].'</td></td>';
			//$roomdetails .= '<tr><td class="width200">Check Out Time. </td><td>: '.$rs["timeout"].'</td></td>';
			$roomdetails .= '<tr><td class="width200">Cashier No. </td><td nowrap>: 0'.$rs["staffid"].'</td></td>';
			$roomdetails .= '<tr><td class="width200">Membership No. </td><td nowrap>: 00'.$guestid.'</td></td>';
			$roomdetails .= '</table>';
		}
	}
}
///////////
function GetGuestWalletBalance($guestid){
global $conn4as,$c,$totalCharge,$totalDeposit,$totalDebit;
$sql = "SELECT amount FROM addclient WHERE id = '".mysqli_real_escape_string($conn4as,$guestid)."' ORDER BY id DESC";
$row = '';
$qry = mysqli_query($conn4as,$sql);
$total = mysqli_num_rows($qry);
	if($total > 0){				  
		$rs = mysqli_fetch_assoc($qry);	
		$totalDeposit += $rs["amount"];
		$credit = number_format($rs["amount"],2);
		$charge = '-';
		$debit = '-';
		$today = date("Y-m-d");
			$row .= '<tr class="padTDbody">';				
			$row .= '<td valign="top">'.++$c.'</td>';
			$row .= '<td valign="top">'.$today.'</td>';
			$row .= '<td valign="top">Balance in wallet as at '.$today.'</td>';			
			$row .= '<td valign="top">&nbsp;</td>';
			$row .= '<td valign="top">'.$charge.'</td>';
			$row .= '<td valign="top">'.$debit.'</td>';
			$row .= '<td valign="top">'.$credit.'</td>';
			$row .= '</tr>';
		echo $row;
	}
}
//////////////////
function GetInvoicesByServices($type,$invoiceid,$guestid,$checkin,$checkout,$roomid){
global $conn4as,$c,$totalCharge,$totalBal,$totalDeposit,$totalDebit;

if($type == 'room'){
$sql = "SELECT orders.paystatus,order_room.*,addroom.roomType FROM order_room INNER JOIN addroom ON order_room.roomid = addroom.id INNER JOIN orders ON order_room.invoiceid = orders.invoiceid WHERE order_room.invoiceid = '".mysqli_real_escape_string($conn4as,$invoiceid)."' AND order_room.guestid = '".mysqli_real_escape_string($conn4as,$guestid)."' ORDER BY order_room.id DESC";

}elseif($type == 'bar'){
$sql = "SELECT orders.paystatus,order_bar.*,addbar.name FROM order_bar INNER JOIN addbar ON order_bar.itemid = addbar.id INNER JOIN orders ON order_bar.invoiceid = orders.invoiceid WHERE (order_bar.invoiceid = '".mysqli_real_escape_string($conn4as,$invoiceid)."' OR order_bar.roomid = '".mysqli_real_escape_string($conn4as,$roomid)."') AND order_bar.guestid = '".mysqli_real_escape_string($conn4as,$guestid)."' AND (order_bar.orderdate BETWEEN '".mysqli_real_escape_string($conn4as,$checkin)."' AND '".mysqli_real_escape_string($conn4as,$checkout)."') ORDER BY order_bar.id DESC";

}elseif($type == 'bar2'){
$sql = "SELECT orders.paystatus,order_bar2.*,addbar2.name FROM order_bar2 INNER JOIN addbar2 ON order_bar2.itemid = addbar2.id INNER JOIN orders ON order_bar2.invoiceid = orders.invoiceid WHERE (order_bar2.invoiceid = '".mysqli_real_escape_string($conn4as,$invoiceid)."' OR order_bars.roomid = '".mysqli_real_escape_string($conn4as,$roomid)."') AND order_bar2.guestid = '".mysqli_real_escape_string($conn4as,$guestid)."' AND (order_bar2.orderdate BETWEEN '".mysqli_real_escape_string($conn4as,$checkin)."' AND '".mysqli_real_escape_string($conn4as,$checkout)."') ORDER BY order_bar2.id DESC";

}elseif($type == 'bar3'){
$sql = "SELECT orders.paystatus,order_bar3.*,addbar3.name FROM order_bar3 INNER JOIN addbar3 ON order_bar3.itemid = addbar3.id INNER JOIN orders ON order_bar3.invoiceid = orders.invoiceid WHERE (order_bar3.invoiceid = '".mysqli_real_escape_string($conn4as,$invoiceid)."' OR order_bars.roomid = '".mysqli_real_escape_string($conn4as,$roomid)."') AND order_bar3.guestid = '".mysqli_real_escape_string($conn4as,$guestid)."' AND (order_bar3.orderdate BETWEEN '".mysqli_real_escape_string($conn4as,$checkin)."' AND '".mysqli_real_escape_string($conn4as,$checkout)."') ORDER BY order_bar3.id DESC";

}elseif($type == 'res'){
$sql = "SELECT orders.paystatus,order_restaurant.*,addresturant.name FROM order_restaurant INNER JOIN addresturant ON order_restaurant.itemid = addresturant.id INNER JOIN orders ON order_restaurant.invoiceid = orders.invoiceid WHERE (order_restaurant.invoiceid = '".mysqli_real_escape_string($conn4as,$invoiceid)."' OR order_restaurant.roomid = '".mysqli_real_escape_string($conn4as,$roomid)."') AND order_restaurant.guestid = '".mysqli_real_escape_string($conn4as,$guestid)."' AND (order_restaurant.orderdate BETWEEN '".mysqli_real_escape_string($conn4as,$checkin)."' AND '".mysqli_real_escape_string($conn4as,$checkout)."') ORDER BY order_restaurant.id DESC";

}elseif($type == 'lau'){
$sql = "SELECT orders.paystatus,order_laundary.*,addlaundary.title AS name FROM order_laundary INNER JOIN addlaundary ON order_laundary.itemid = addlaundary.id INNER JOIN orders ON order_laundary.invoiceid = orders.invoiceid WHERE (order_laundary.invoiceid = '".mysqli_real_escape_string($conn4as,$invoiceid)."' OR order_laundary.roomid = '".mysqli_real_escape_string($conn4as,$roomid)."') AND order_laundary.guestid = '".mysqli_real_escape_string($conn4as,$guestid)."' AND (order_laundary.orderdate BETWEEN '".mysqli_real_escape_string($conn4as,$checkin)."' AND '".mysqli_real_escape_string($conn4as,$checkout)."') ORDER BY order_laundary.id DESC";

}elseif($type == 'spa'){
$sql = "SELECT orders.paystatus,order_spa.*,addspa.name FROM order_spa INNER JOIN addspa ON order_spa.itemid = addspa.id INNER JOIN orders ON order_spa.invoiceid = orders.invoiceid WHERE (order_spa.invoiceid = '".mysqli_real_escape_string($conn4as,$invoiceid)."' OR order_spa.roomid = '".mysqli_real_escape_string($conn4as,$roomid)."') AND order_spa.guestid = '".mysqli_real_escape_string($conn4as,$guestid)."' AND (order_spa.orderdate BETWEEN '".mysqli_real_escape_string($conn4as,$checkin)."' AND '".mysqli_real_escape_string($conn4as,$checkout)."') ORDER BY order_spa.id DESC";

}elseif($type == 'spo'){
$sql = "SELECT orders.paystatus,order_sportitem.*,addsport.name FROM order_sportitem INNER JOIN addsport ON order_sportitem.itemid = addsport.id INNER JOIN orders ON order_sportitem.invoiceid = orders.invoiceid WHERE (order_sportitem.invoiceid = '".mysqli_real_escape_string($conn4as,$invoiceid)."' OR order_sportitem.roomid = '".mysqli_real_escape_string($conn4as,$roomid)."') AND order_sportitem.guestid = '".mysqli_real_escape_string($conn4as,$guestid)."' AND (order_sportitem.orderdate BETWEEN '".mysqli_real_escape_string($conn4as,$checkin)."' AND '".mysqli_real_escape_string($conn4as,$checkout)."') ORDER BY order_sportitem.id DESC";

}elseif($type == 'swi'){
$sql = "SELECT orders.paystatus,order_swimpool.*,addswimpool.name FROM order_swimpool INNER JOIN addswimpool ON order_swimpool.itemid = addswimpool.id INNER JOIN orders ON order_swimpool.invoiceid = orders.invoiceid WHERE (order_swimpool.invoiceid = '".mysqli_real_escape_string($conn4as,$invoiceid)."' OR order_swimpool.roomid = '".mysqli_real_escape_string($conn4as,$roomid)."') AND order_swimpool.guestid = '".mysqli_real_escape_string($conn4as,$guestid)."' AND (order_swimpool.orderdate BETWEEN '".mysqli_real_escape_string($conn4as,$checkin)."' AND '".mysqli_real_escape_string($conn4as,$checkout)."') ORDER BY order_swimpool.id DESC";

}elseif($type == 'deposit'){
//$sql = "SELECT * FROM orders WHERE (invoiceid <> '".mysqli_real_escape_string($conn4as,$invoiceid)."' AND guestid = '".mysqli_real_escape_string($conn4as,$guestid)."') AND (orderdate BETWEEN '".mysqli_real_escape_string($conn4as,$checkin)."' AND '".mysqli_real_escape_string($conn4as,$checkout)."') AND paystatus <> '' ORDER BY id DESC";
}

$row = '';
$qry = mysqli_query($conn4as,$sql);
$total = mysqli_num_rows($qry);
	if($total > 0){				  
		while($rs = mysqli_fetch_assoc($qry)){
		$paystatus = $rs["paystatus"];	
			if($paystatus == 'cw'){ //Credit wallet
				$totalDeposit += $rs["total"];
				$credit = number_format($rs["total"],2);
				$charge = "-";
				$debit = "-";
			}elseif($paystatus == 'dw' && $rs["ispaid"] == '1'){ //Paid By Deposit
				//$totalDeposit += -1 * $rs["total"];
				$totalDebit += -1 * $rs["total"];
				$totalCharge += $rs["total"];
				$credit = '-'; number_format(-1 * $rs["total"],2);
				$charge = number_format($rs["total"],2);
				$debit = number_format(-1 * $rs["total"],2);
			}else{
				if($rs["ispaid"] == '1' && $paystatus != 'dw' && $paystatus != 'cw'){ //Paid by cash
					$totalDebit += -1 * $rs["total"];
					$totalCharge += $rs["total"];
					$charge = number_format($rs["total"],2);
					$credit = "-";
					$debit = number_format(-1 * $rs["total"],2);
				}else{ //unpaid......adjust pay by deposit / by cash...to switch here for proper placement.
					$totalCharge += $rs["total"];
					$charge = number_format($rs["total"],2);
					$credit = "-";
					$debit = "-";
				}
			}
						
			$row .= '<tr class="padTDbody">';				
			$row .= '<td valign="top">'.++$c.'</td>';
			$row .= '<td valign="top">'.$rs["orderdate"].'</td>';
			
			if($type == 'room'){
				$row .= '<td valign="top">Room Booking Service<br>'.$rs["roomType"].': INVOICE # '.$rs["invoiceid"].'<br>Duration: '.$rs["duration"].' day(s)</td>';
			}elseif($type == 'res'){
				$row .= '<td valign="top">Restaurant Service ('.$rs["roomfoodcat"].'): INVOICE # '.$rs["invoiceid"].'</td>';
			}elseif($type == 'bar' || $type == 'bar2' || $type == 'bar3'){
				$row .= '<td valign="top">Bar Service: INVOICE # '.$rs["invoiceid"].'</td>';
			}elseif($type == 'swi'){
				$row .= '<td valign="top">Swimming Pool Service : INVOICE # '.$rs["invoiceid"].'</td>';
			}elseif($type == 'spa'){
				$row .= '<td valign="top">SPA Service : INVOICE # '.$rs["invoiceid"].'</td>';
			
			}elseif($type == 'spo'){
				$row .= '<td valign="top">Sport/Sport Material Service : INVOICE # '.$rs["invoiceid"].'</td>';
			
			}elseif($type == 'lau'){
				$row .= '<td valign="top">Laundry Service : INVOICE # '.$rs["invoiceid"].'</td>';
			}elseif($type == 'desposit'){
				$row .= ($rs["paystatus"] == 'cw')?'<td valign="top">Wallet debited: INVOICE # '.$rs["invoiceid"].'</td>':'<td valign="top">Deposit: INVOICE # '.$rs["invoiceid"].'</td>';
			}else{
				$row .= '<td valign="top">Wallet credited: INVOICE # '.$rs["invoiceid"].'</td>';
			}
			
			$row .= '<td valign="top">&nbsp;</td>';
			$row .= '<td valign="top">'.$charge.'</td>';
			$row .= '<td valign="top">'.$debit.'</td>';
			$row .= '<td valign="top">'.$credit.'</td>';
			$row .= '</tr>';
		}
	}
	echo $row;
}
?>