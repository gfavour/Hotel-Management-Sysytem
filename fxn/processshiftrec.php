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

if($_POST["stype"] == 'receptionist'){
	$sql = "SELECT addroom.id,addroom.roomType,addroom.roomrate,addroom.currentinv AS occupied,addroom.rcardno,order_room.checkin,order_room.checkout,order_room.vat,order_room.discount,order_room.total FROM addroom INNER JOIN order_room ON addroom.id = order_room.roomid WHERE addroom.currentinv = order_room.invoiceid";
	$shoptype = 'Receptionist';
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
	$objXls->getActiveSheet()->setTitle('Room Open Shift'); //Rename sheet
	
	$objXls->getActiveSheet()->setCellValue('A2', 'Room Type');
	$objXls->getActiveSheet()->setCellValue('B2', 'Room Rate');
	$objXls->getActiveSheet()->setCellValue('C2', 'Invoice');
	$objXls->getActiveSheet()->setCellValue('D2', 'Room Occupied');
	$objXls->getActiveSheet()->setCellValue('E2', 'Room Card No');
	$objXls->getActiveSheet()->setCellValue('F2', 'Check-In Date');
	$objXls->getActiveSheet()->setCellValue('G2', 'Check-Out Date');
	$objXls->getActiveSheet()->setCellValue('H2', 'Vat');
	$objXls->getActiveSheet()->setCellValue('I2', 'Discount');
	$objXls->getActiveSheet()->setCellValue('J2', 'Total');
	
	$countRow = 3;
	while($rs = mysqli_fetch_assoc($qry)){
		$objXls->getActiveSheet()->setCellValue('A'.$countRow, $rs["roomType"]);
		$objXls->getActiveSheet()->setCellValue('B'.$countRow, $rs["roomrate"]);
		$objXls->getActiveSheet()->setCellValue('C'.$countRow, $rs["occupied"]);
		if($rs["occupied"] != ''){ $occupied = 'Yes'; }else{ $occupied = 'No'; }
		$objXls->getActiveSheet()->setCellValue('D'.$countRow, $occupied);
		$objXls->getActiveSheet()->setCellValue('E'.$countRow, $rs["rcardno"]);
		$objXls->getActiveSheet()->setCellValue('F'.$countRow, $rs["checkin"]);
		$objXls->getActiveSheet()->setCellValue('G'.$countRow, $rs["checkout"]);
		$objXls->getActiveSheet()->setCellValue('H'.$countRow, $rs["vat"]);
		$objXls->getActiveSheet()->setCellValue('I'.$countRow, $rs["discount"]);
		$objXls->getActiveSheet()->setCellValue('J'.$countRow, $rs["total"]);
		$GrandTotal += $rs["total"];
		$GTotalVat += $rs["vat"];
		$GTotalDisc += $rs["discount"];
		$countRow++;
	}
	/////////GRAND TOTAL //////////////////
	$objXls->getActiveSheet()->setCellValue('G'.$countRow, "Grand Total: ");
	$objXls->getActiveSheet()->setCellValue('H'.$countRow, $GTotalVat);
	$objXls->getActiveSheet()->setCellValue('I'.$countRow, $GTotalDisc);
	$objXls->getActiveSheet()->setCellValue('J'.$countRow, $GrandTotal);
	////////////////////////////////
	$objWriter = PHPExcel_IOFactory::createWriter($objXls, 'Excel5');
	$objWriter->save("../backup/shifts/".$savefile); //Save As Excel 95 .xls
	
	$sql1 = "INSERT INTO tblshifts(userid,openshift,closeshift,servicetype,xlsurl) VALUES('".mysqli_real_escape_string($conn4as,$_POST["uid"])."','".		mysqli_real_escape_string($conn4as,$opendate)."','','".mysqli_real_escape_string($conn4as,$_POST["stype"])."','".mysqli_real_escape_string($conn4as,$savefile)."')";
	mysqli_query($conn4as,$sql1);
	
	echo 'NewShiftOpened';
}else{
	$objXls = new PHPExcel();
	$objXls->setActiveSheetIndex(0);
	$objXls->getActiveSheet()->setTitle('Open Shift'); //Rename sheet
	
	$objXls->getActiveSheet()->setCellValue('A1', 'No sales');
	$objWriter = PHPExcel_IOFactory::createWriter($objXls, 'Excel5');
	$objWriter->save("../backup/shifts/".$savefile); //Save As Excel 95 .xls
	
	$sql1 = "INSERT INTO tblshifts(userid,openshift,closeshift,servicetype,xlsurl) VALUES('".mysqli_real_escape_string($conn4as,$_POST["uid"])."','".		mysqli_real_escape_string($conn4as,$opendate)."','','".mysqli_real_escape_string($conn4as,$_POST["stype"])."','".mysqli_real_escape_string($conn4as,$savefile)."')";
	mysqli_query($conn4as,$sql1);
	
	echo 'NewShiftOpened';
	//echo 'NOITEMTOSHIFT<->'.$shoptype;
}
}
}

if ($_POST["dwat"] == "closeshift"){
if ($_POST["uid"] == ''){echo 'UnIdentified Account. Re-login again!';}
else{
$closedate = date("Y-m-d h:i A");
//$savefile = date("Y-m-d-h-i-A").'.xls';

$qry2 = mysqli_query($conn4as,"SELECT id,xlsurl,openshift FROM tblshifts WHERE servicetype = '".mysqli_real_escape_string($conn4as,$_POST["stype"])."' AND userid = '".mysqli_real_escape_string($conn4as,$_POST["uid"])."' ORDER BY id DESC LIMIT 1");
$rs2 = mysqli_fetch_assoc($qry2);

$shiftID = $rs2["id"];
$shiftXlsUrl = $rs2["xlsurl"];
$openshift = $rs2["openshift"];
$openshift = explode(" ",$openshift);
$startdate = $openshift[0];
$starttime = date("H:i:s", strtotime($openshift[1]." ".$openshift[2]));
	
if($shiftID != ''){

$sql = "SELECT addroom.id,addroom.roomType,addroom.roomrate,addroom.currentinv AS occupied,addroom.rcardno,order_room.checkin,order_room.checkout,order_room.vat,order_room.discount,order_room.total FROM addroom INNER JOIN order_room ON addroom.id = order_room.roomid WHERE addroom.currentinv = order_room.invoiceid AND order_room.orderdate >= '".mysqli_real_escape_string($conn4as,$startdate)."' AND order_room.ordertime >= '".mysqli_real_escape_string($conn4as,$starttime)."'";
$shoptype = 'Receptionist';
	
$qry = mysqli_query($conn4as,$sql);
$total = mysqli_num_rows($qry);

if($total > 0){
	$inputFileType = 'Excel5';
	$inputFileName = "../backup/shifts/".$shiftXlsUrl;
	if(!file_exists($inputFileName)){ 
		$objXls = new PHPExcel();
	}else{ 
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objXls = $objReader->load($inputFileName);
	}
	
	$objXls->createSheet(1);
	$objXls->setActiveSheetIndex(1);
	$objXls->getActiveSheet()->setTitle('Room Close Shift');

	//$objXls->getActiveSheet()->setCellValue('A1', 'CLOSE SHIFT - ROOM OCCUPANCY DETAILS');
	
	$objXls->getActiveSheet()->setCellValue('A1', 'Room Type');
	$objXls->getActiveSheet()->setCellValue('B1', 'Room Rate');
	$objXls->getActiveSheet()->setCellValue('C1', 'Invoice');
	$objXls->getActiveSheet()->setCellValue('D1', 'Room Occupied');
	$objXls->getActiveSheet()->setCellValue('E1', 'Room Card No');
	$objXls->getActiveSheet()->setCellValue('F1', 'Check-In Date');
	$objXls->getActiveSheet()->setCellValue('G1', 'Check-Out Date');
	$objXls->getActiveSheet()->setCellValue('H1', 'Vat');
	$objXls->getActiveSheet()->setCellValue('I1', 'Discount');
	$objXls->getActiveSheet()->setCellValue('J1', 'Total');
	
	$countRow = 2;
	while($rs = mysqli_fetch_assoc($qry)){
		$objXls->getActiveSheet()->setCellValue('A'.$countRow, $rs["roomType"]);
		$objXls->getActiveSheet()->setCellValue('B'.$countRow, $rs["roomrate"]);
		$objXls->getActiveSheet()->setCellValue('C'.$countRow, $rs["occupied"]);
		if($rs["occupied"] != ''){ $occupied = 'Yes'; }else{ $occupied = 'No'; }
		$objXls->getActiveSheet()->setCellValue('D'.$countRow, $occupied);
		$objXls->getActiveSheet()->setCellValue('E'.$countRow, $rs["rcardno"]);
		$objXls->getActiveSheet()->setCellValue('F'.$countRow, $rs["checkin"]);
		$objXls->getActiveSheet()->setCellValue('G'.$countRow, $rs["checkout"]);
		$objXls->getActiveSheet()->setCellValue('H'.$countRow, $rs["vat"]);
		$objXls->getActiveSheet()->setCellValue('I'.$countRow, $rs["discount"]);
		$objXls->getActiveSheet()->setCellValue('J'.$countRow, $rs["total"]);
		$GTotalVat += $rs["vat"];
		$GTotalDisc += $rs["discount"];
		$GTotal += $rs["total"];
		$countRow++;
	}
	
	$objXls->getActiveSheet()->setCellValue('G'.$countRow, "Grand Total:");
	$objXls->getActiveSheet()->setCellValue('H'.$countRow, $GTotalVat);
	$objXls->getActiveSheet()->setCellValue('I'.$countRow, $GTotalDisc);
	$objXls->getActiveSheet()->setCellValue('J'.$countRow, $GTotal);
	
	//$objWriter = PHPExcel_IOFactory::createWriter($objXls, 'Excel5');
	//$objWriter->save("../backup/shifts/".$shiftXlsUrl);
	//////////////////CHECK OTHER SERVICES...LAUNDRY//////////////////////////
	
	$sql = "SELECT order_laundary.id,order_laundary.invoiceid,order_laundary.itemid,order_laundary.discount,order_laundary.vat,order_laundary.unitprice,order_laundary.total,order_laundary.orderdate,order_laundary.ordertime,order_laundary.ispaid,addlaundary.title FROM order_laundary INNER JOIN addlaundary ON order_laundary.itemid = addlaundary.id WHERE order_laundary.orderdate >= '".mysqli_real_escape_string($conn4as,$startdate)."' AND order_laundary.ordertime >= '".mysqli_real_escape_string($conn4as,$starttime)."'";
	$qry = mysqli_query($conn4as,$sql);
	$total = mysqli_num_rows($qry);
	
	if($total > 0){	
		$objXls->createSheet(2);
		$objXls->setActiveSheetIndex(2);
		$objXls->getActiveSheet()->setTitle('Laundry Close Shift');
		
		$objXls->getActiveSheet()->setCellValue('A1', 'Item Name');
		$objXls->getActiveSheet()->setCellValue('B1', 'Invoice');
		$objXls->getActiveSheet()->setCellValue('C1', 'Date/Time');
		$objXls->getActiveSheet()->setCellValue('D1', 'Vat');
		$objXls->getActiveSheet()->setCellValue('E1', 'Discount');
		$objXls->getActiveSheet()->setCellValue('F1', 'Total');
		$countRow = 2;
		while($rs = mysqli_fetch_assoc($qry)){
			$objXls->getActiveSheet()->setCellValue('A'.$countRow, $rs["title"]);
			$objXls->getActiveSheet()->setCellValue('B'.$countRow, $rs["invoiceid"]);
			$objXls->getActiveSheet()->setCellValue('C'.$countRow, $rs["orderdate"].' '.$rs["ordertime"]);
			$objXls->getActiveSheet()->setCellValue('D'.$countRow, $rs["vat"]);
			$objXls->getActiveSheet()->setCellValue('E'.$countRow, $rs["discount"]);
			$objXls->getActiveSheet()->setCellValue('F'.$countRow, $rs["total"]);
			$GTotal2 += $rs["total"];
			$GTotalVat2 += $rs["vat"];
			$GTotalDisc2 += $rs["discount"];
			$countRow++;
		}
		
		$objXls->getActiveSheet()->setCellValue('C'.$countRow, "Grand Total:");
		$objXls->getActiveSheet()->setCellValue('D'.$countRow, $GTotalVat2);
		$objXls->getActiveSheet()->setCellValue('E'.$countRow, $GTotalDisc2);
		$objXls->getActiveSheet()->setCellValue('F'.$countRow, $GTotal2);
	}
	//////////////////////////////////////////////////////////////////
	$objWriter = PHPExcel_IOFactory::createWriter($objXls, 'Excel5');
	$objWriter->save("../backup/shifts/".$shiftXlsUrl);
	
	$sql1 = "UPDATE tblshifts SET issync = '2', closeshift = '".mysqli_real_escape_string($conn4as,$closedate)."' WHERE id = '".mysqli_real_escape_string($conn4as,$shiftID)."'";
	mysqli_query($conn4as,$sql1);
	
	echo 'XShiftClosed';
	
}else{
	$sql1 = "UPDATE tblshifts SET issync = '2', closeshift = '".mysqli_real_escape_string($conn4as,$closedate)."' WHERE id = '".mysqli_real_escape_string($conn4as,$shiftID)."'";
	mysqli_query($conn4as,$sql1);
	echo 'XShiftClosed';
	//echo 'NOITEMTOSHIFT<->'.$shoptype;
}

}else{
	echo 'NOSHIFT2UPDATE<->'.$shoptype;
}
}
}
?>