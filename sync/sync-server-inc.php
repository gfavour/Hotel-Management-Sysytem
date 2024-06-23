<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Max-Age: 3600');
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
   if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
      header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
   if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
      header("Access-Control-Allow-Headers:  {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
      exit(0);
}

//include('../fxn/connection.php');

$dbmhost = "localhost";
$dbmusername = "mohostco_me"; 
$dbmpassword = 'Phil@#3810';
$mdatabase = "bighms";
/*
$dbmhost = "localhost";
$dbmusername = "buyrexco_hmstestuser"; 
$dbmpassword = '(*,jbxZ{WdW+';
$mdatabase = "buyrexco_hmstest";
*/
$conn4as = mysqli_connect($dbmhost, $dbmusername, $dbmpassword, $mdatabase) or die("Database connection failed");
//mysqli_select_db($conn4as,$mdatabase);
///////////////////////
function GetInsertKeys($arr){
	$inskeys = '';
	foreach($arr as $k=>$vs){
		$inskeys .= ($inskeys == '')?$k:",".$k;
	}
	return $inskeys;
}
//////////////////////
function GetInsertVals($vs){
	$insVS = '';
	foreach($vs as $v){
		if($v == ''){ 
			$insVS .= ($insVS == '')?"NULL":",NULL";
		}else{
			$insVS .= ($insVS == '')?"'".$v."'":",'".$v."'";
		}
	}
	return $insVS;
}
//////////////////////
function DoUpdate($arr,$tbl){
global $conn4as;
	$setVs = '';
	foreach($arr as $k=>$v){
		if($v == ''){
			$setVs .= ($setVs == '')?" SET ".$k."= NULL":",".$k." = NULL";
		}else{
			$setVs .= ($setVs == '')?" SET ".$k."='".mysqli_real_escape_string($conn4as,$v)."'":",".$k."='".mysqli_real_escape_string($conn4as,$v)."'";
		}
	}
	if($setVs != ''){
		$id = $arr["id"];
		mysqli_query($conn4as,"UPDATE ".$tbl." ".$setVs." WHERE id = '".$id."'");
		//$errVal = "UPDATE ".$tbl." ".$setVs." WHERE id = '".$id."'<br>-------<br>";
		//error_log(print_r($errVal, TRUE));
		return '1';
	}else{
		return '0';
	}
}
?>