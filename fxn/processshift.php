<?php
include(__DIR__.'/connection.php');
//require_once dirname(__FILE__).'/../phpexcel/Classes/PHPExcel.php';
require_once '../phpexcel/Classes/PHPExcel.php';
require_once '../phpexcel/Classes/PHPExcel/IOFactory.php';

$globalid = $_SESSION["amyi15"];
$logfilename = date("Y-m-d");
$logfilename .= ".txt";
$mktoday = strtotime(date("Y-m-d")); //mktime(0,0,0);

if ($_POST["dwat"] == "openshift"){
if ($_POST["uid"] == ''){echo 'UnIdentified Account. Re-login again!';}
else{
$opendate = date("Y-m-d h:i A");
$savefile = date("Y-m-d-h-i-s-A").'-'.$_POST["stype"].'.xls';

if($_POST["stype"] == 'bar1'){
	$sql = "SELECT * FROM addbar ORDER BY id";
	$lastsql = "SELECT * FROM addbar WHERE ORDER BY id";
	$shoptype = 'Bar 1';
}elseif($_POST["stype"] == 'bar2'){
	$sql = "SELECT * FROM addbar2 ORDER BY id";
	$shoptype = 'Bar 2';
}elseif($_POST["stype"] == 'bar3'){
	$sql = "SELECT * FROM addbar3 ORDER BY id";
	$shoptype = 'Bar 3';
}

//check if last shift still open...if yes close it...
$qry3 = mysqli_query($conn4as,"SELECT * FROM tblshifts WHERE servicetype = '".mysqli_real_escape_string($conn4as,$_POST["stype"])."' ORDER BY id DESC LIMIT 1");
$total3 = mysqli_num_rows($qry3);
if($total3 > 0){
$rs3 = mysqli_fetch_assoc($qry3);
$shiftid3 = $rs3["id"];
$openshift3 = $rs3["openshift"];
$closeshift3 = $rs3["closeshift"];
//update excel file..using function...But for now not included
mysqli_query($conn4as,"UPDATE tblshifts SET issync = '2', closeshift = '".mysqli_real_escape_string($conn4as,$opendate)."' WHERE id = '".mysqli_real_escape_string($conn4as,$shiftid3)."' ORDER BY id DESC LIMIT 1");
}
//////////////////////////////////////////////
$qry = mysqli_query($conn4as,$sql);
$total = mysqli_num_rows($qry);

if($total > 0){	
	$objXls = new PHPExcel();
	$objXls->setActiveSheetIndex(0);
	$objXls->getActiveSheet()->setTitle('Open And Close Shift'); //Rename sheet
	
	$objXls->getActiveSheet()->setCellValue('A1', 'Itemid');
	$objXls->getActiveSheet()->setCellValue('B1', 'Name');
	$objXls->getActiveSheet()->setCellValue('C1', 'Overall Items (as at today)');
	$objXls->getActiveSheet()->setCellValue('D1', 'Open Item left');
	$objXls->getActiveSheet()->setCellValue('E1', 'Selling Price');
	$countRow = 2;
	while($rs = mysqli_fetch_assoc($qry)){
		$objXls->getActiveSheet()->setCellValue('A'.$countRow, $rs["id"]);
		$objXls->getActiveSheet()->setCellValue('B'.$countRow, $rs["name"]);
		$objXls->getActiveSheet()->setCellValue('C'.$countRow, $rs["instock"]);
		$objXls->getActiveSheet()->setCellValue('D'.$countRow, $rs["itemleft"]);
		$objXls->getActiveSheet()->setCellValue('E'.$countRow, $rs["price"]);
		$countRow++;
	}
	//echo 'Oh Boy...';
	$objWriter = PHPExcel_IOFactory::createWriter($objXls, 'Excel5');
	$objWriter->save("../backup/shifts/".$savefile); //Save As Excel 95 .xls
	
	$sql1 = "INSERT INTO tblshifts(userid,openshift,closeshift,servicetype,xlsurl) VALUES('".mysqli_real_escape_string($conn4as,$_POST["uid"])."','".		mysqli_real_escape_string($conn4as,$opendate)."','','".mysqli_real_escape_string($conn4as,$_POST["stype"])."','".mysqli_real_escape_string($conn4as,$savefile)."')";
	mysqli_query($conn4as,$sql1);
	
	echo 'NewShiftOpened';
}else{
	echo 'NOITEMTOSHIFT<->'.$shoptype;
}
}
}

if ($_POST["dwat"] == "closeshift"){
if ($_POST["uid"] == ''){echo 'UnIdentified Account. Re-login again!';}
else{
$closedate = date("Y-m-d h:i A");
//$savefile = date("Y-m-d-h-i-A").'.xls';

if($_POST["stype"] == 'bar1'){
	$sql = "SELECT * FROM addbar ORDER BY id";
	$shoptype = 'Bar 1';
}else{
	$sql = "SELECT * FROM addbar2 ORDER BY id";
	$shoptype = 'Bar 2';
}

$qry2 = mysqli_query($conn4as,"SELECT id,xlsurl FROM tblshifts WHERE servicetype = '".mysqli_real_escape_string($conn4as,$_POST["stype"])."' AND userid = '".mysqli_real_escape_string($conn4as,$_POST["uid"])."' ORDER BY id DESC LIMIT 1");
$rs2 = mysqli_fetch_assoc($qry2);

$shiftID = $rs2["id"];
$shiftXlsUrl = $rs2["xlsurl"];

if($shiftID != ''){

$qry = mysqli_query($conn4as,$sql);
$total = mysqli_num_rows($qry);

if($total > 0){	
	//$objXls = new PHPExcel();
	$inputFileType = 'Excel5';
	$inputFileName = "../backup/shifts/".$shiftXlsUrl;
	$objReader = PHPExcel_IOFactory::createReader($inputFileType);
	$objXls = $objReader->load($inputFileName);

	$objXls->setActiveSheetIndex(0);
	
	//$objXls->getActiveSheet()->setCellValue('A1', 'Itemid');
	////$objXls->getActiveSheet()->setCellValue('B1', 'Name');
	//$objXls->getActiveSheet()->setCellValue('C1', 'Overall Items (as at today)');
	//$objXls->getActiveSheet()->setCellValue('D1', 'Item left');
	$objXls->getActiveSheet()->setCellValue('G1', 'Closing Item Left');
	$objXls->getActiveSheet()->setCellValue('H1', 'Qty Sold');
	$objXls->getActiveSheet()->setCellValue('I1', 'Amount');
	$objXls->getActiveSheet()->setCellValue('J1', 'Total Amount');
	$countRow = 2;
	while($rs = mysqli_fetch_assoc($qry)){
		//$itemsold = $rs["itemleft"]
		$objXls->getActiveSheet()->setCellValue('G'.$countRow, $rs["itemleft"]);
		$objXls->getActiveSheet()->setCellValue('H'.$countRow, '=D'.$countRow.'-G'.$countRow);
		$objXls->getActiveSheet()->setCellValue('I'.$countRow, '=H'.$countRow.'*E'.$countRow);
		$countRow++;
	}
	
	$objXls->getActiveSheet()->setCellValue('J2', '=SUM(I2:I'.$countRow.')');
	
	$objWriter = PHPExcel_IOFactory::createWriter($objXls, 'Excel5');
	$objWriter->save("../backup/shifts/".$shiftXlsUrl);
	
	$sql1 = "UPDATE tblshifts SET issync = '2', closeshift = '".mysqli_real_escape_string($conn4as,$closedate)."' WHERE id = '".mysqli_real_escape_string($conn4as,$shiftID)."'";
	mysqli_query($conn4as,$sql1);
	echo 'XShiftClosed';
	
}else{
	echo 'NOITEMTOSHIFT<->'.$shoptype;
}

}else{
	echo 'NOSHIFT2UPDATE<->'.$shoptype;
}
}
}
?>