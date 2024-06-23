<?php
include("../fxn/connection.php");
///////////////////////
function StartHere($dotbl,$tbl,$serverUrl){
global $conn4as;
$table = $tbl;
	$res = GetiData($table);
	if($res != ''){
		$svres = callAPI('POST', $serverUrl, $res);
		if($svres != ''){
			$arrIDs = implode("','",explode(",",$svres));
			mysqli_query($conn4as,"UPDATE ".$table." SET issync = '1' WHERE id IN ('".$arrIDs."')");
			echo '1';
		}else{
			echo '2';
		}
	}else{ echo '3';}
}
//////////////////////////
function GetiData($table){
global $conn4as;

if($table == 'addclient'){
$sql = "SELECT * FROM addclient WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'addbar'){
$sql = "SELECT * FROM addbar WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'addbar2'){
$sql = "SELECT * FROM addbar2 WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'addcab'){
$sql = "SELECT * FROM addcab WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'addlaundary'){
$sql = "SELECT * FROM addlaundary WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'addresturant'){
$sql = "SELECT * FROM addresturant WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'addroom'){
$sql = "SELECT * FROM addroom WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'addroomfacility'){
$sql = "SELECT * FROM addroomfacility WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'addspa'){
$sql = "SELECT * FROM addspa WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'addsport'){
$sql = "SELECT * FROM addsport WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'addswimpool'){
$sql = "SELECT * FROM addswimpool WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'barrequest'){
$sql = "SELECT * FROM barrequest WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'department'){
$sql = "SELECT * FROM department WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'ewallet'){
$sql = "SELECT * FROM ewallet WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'expenditure'){
$sql = "SELECT * FROM expenditure WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'gym'){
$sql = "SELECT * FROM gym WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'gym1'){
$sql = "SELECT * FROM gym1 WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'gymdurations'){
$sql = "SELECT * FROM gymdurations WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'gympayments'){
$sql = "SELECT * FROM gympayments WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'onlineorders'){
//$sql = "SELECT * FROM onlineorders WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'orders'){
$sql = "SELECT * FROM orders WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'order_bar'){
$sql = "SELECT * FROM order_bar WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'order_bar2'){
$sql = "SELECT * FROM order_bar2 WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'order_laundary'){
$sql ="SELECT * FROM order_laundary WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'order_restaurant'){
$sql ="SELECT * FROM order_restaurant WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'order_room'){
$sql ="SELECT * FROM order_room WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'order_spa'){
$sql ="SELECT * FROM order_spa WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'order_sportitem'){
$sql ="SELECT * FROM order_spotitem WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'order_swimpool'){
$sql ="SELECT * FROM order_swimpool WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'otherpictures'){
//$sql ="SELECT * FROM otherpictures WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'paycab'){
$sql ="SELECT * FROM paycab WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'roompictures'){
$sql ="SELECT * FROM roompictures WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'settings'){
$sql ="SELECT * FROM settings WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'tablenos'){
$sql ="SELECT * FROM tablenos WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'tblcategory'){
$sql ="SELECT * FROM tblcategory WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'tblcompany'){
$sql ="SELECT * FROM tblcompany WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'tblcountry'){
//$sql ="SELECT * FROM tblcountry WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'tblingredients'){
$sql ="SELECT * FROM tblingredients WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'tblinstruct'){
$sql ="SELECT * FROM tblinstruct WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'tblmcardreason'){
$sql ="SELECT * FROM tblmcardreason WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'tblrestock'){
$sql ="SELECT * FROM tblrestock WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'tblschedule'){
$sql ="SELECT * FROM tblschedule WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'tblshifts'){
$sql ="SELECT * FROM tblshifts WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'tblstate'){
//$sql ="SELECT * FROM tblstate WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'tblstore'){
$sql ="SELECT * FROM tblstore WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'tblstorehistory'){
$sql ="SELECT * FROM tblstorehistory WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'tblstoretransfer'){
$sql ="SELECT * FROM tblstoretransfer WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'users'){
$sql ="SELECT * FROM users WHERE issync <> '1' ORDER BY id LIMIT 50";

}elseif($table == 'waiters'){
$sql ="SELECT * FROM waiters WHERE issync <> '1' ORDER BY id LIMIT 50";
}
/////////////
	$qry = mysqli_query($conn4as,$sql);
	$total = mysqli_num_rows($qry);
	if($total > 0){
		while($rs = mysqli_fetch_assoc($qry)){
			$rcol[] = $rs;
		}
		return json_encode($rcol);
	}else{
		return '';
	}	
}

//////////////
function callAPI($method, $url, $data){
   $curl = curl_init();
   switch ($method){
      case "POST":
         curl_setopt($curl, CURLOPT_POST, 1);
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
         break;
      case "PUT":
         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
         break;
      default:
         if ($data)
            $url = sprintf("%s?%s", $url, http_build_query($data));
   }
   // OPTIONS:
   curl_setopt($curl, CURLOPT_URL, $url);
   curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
   // EXECUTE:
   $result = curl_exec($curl);
   if(!$result){ return '';}
   curl_close($curl);
   return $result;
}
/////////////////
?>