<?php
ob_start();
include(__DIR__.'/connection.php');
require_once '../phpexcel/Classes/PHPExcel.php';
require_once '../phpexcel/Classes/PHPExcel/IOFactory.php';

$savefile = date("Y-m-d-h-i-s-A").'.xls';
$objXls = new PHPExcel();
header('Content-Disposition: attachment; filename="'.$savefile.'"');
header('Content-type: application/vnd.ms-excel');
header('Cache-Control: max-age=0');
	
//$globalid = $_SESSION["amyi15"];

if ($_REQUEST["dwat"] == "Ing2xls"){
if ($_REQUEST["datefrom"] == ''){echo 'Date From is required';}
else{
SetIngredientsArray();
$allIngArray = array();
				 				  
if ($_REQUEST["timefrom"] != '' && $_REQUEST["timeto"] != ''){
$filter_dt = " TIMESTAMP(order_restaurant.orderdate, order_restaurant.ordertime) BETWEEN TIMESTAMP('".mysqli_real_escape_string($conn4as,($_REQUEST["datefrom"])."','".mysqli_real_escape_string($conn4as,($_REQUEST["timefrom"])."') AND TIMESTAMP('".mysqli_real_escape_string($conn4as,($_REQUEST["dateto"])."','".mysqli_real_escape_string($conn4as,($_REQUEST["timeto"])."') ";
}else{
$filter_dt = " order_restaurant.orderdate BETWEEN '".mysqli_real_escape_string($conn4as,($_REQUEST["datefrom"])."' AND '".mysqli_real_escape_string($conn4as,($_REQUEST["dateto"])."' ";
}
  
$sql = "SELECT order_restaurant.*,addresturant.name,addresturant.ingredients FROM order_restaurant INNER JOIN addresturant ON order_restaurant.itemid = addresturant.id WHERE ".$filter_staff.$filter_dt." ORDER BY order_restaurant.invoiceid DESC";
$qry = mysqli_query($conn4as,$sql);
$total = mysqli_num_rows($qry);

if($total > 0){	
	$objXls->setActiveSheetIndex(0);
	$objXls->getActiveSheet()->setTitle('Raw Product Report'); //Rename sheet
	
	$objXls->getActiveSheet()->setCellValue('A1', 'SN');
	$objXls->getActiveSheet()->setCellValue('B1', 'Invoice ID');
	$objXls->getActiveSheet()->setCellValue('C1', 'Food');
	$objXls->getActiveSheet()->setCellValue('D1', 'Qty');
	$objXls->getActiveSheet()->setCellValue('E1', 'Date');
	$objXls->getActiveSheet()->setCellValue('F1', 'Time');
	$objXls->getActiveSheet()->setCellValue('G1', 'Amount');
	$objXls->getActiveSheet()->setCellValue('J1', 'Estimate of Ingredients Used/Sold'); //H,I,...J
	$objXls->getActiveSheet()->setCellValue('J2', 'Ingredient');
	$objXls->getActiveSheet()->setCellValue('K2', 'Quantity');
	$countRow = 2;
	
	//$IngredientName = $IngredientsArray[$_GET["ingredient"]];
	
	while($rs = mysqli_fetch_assoc($qry)){
		$objXls->getActiveSheet()->setCellValue('A'.$countRow, ++$c);
		$objXls->getActiveSheet()->setCellValue('B'.$countRow, $rs["invoiceid"]);
		$objXls->getActiveSheet()->setCellValue('C'.$countRow, $rs["name"]);
		$objXls->getActiveSheet()->setCellValue('D'.$countRow, $rs["qty"]);
		$objXls->getActiveSheet()->setCellValue('E'.$countRow, $rs["orderdate"]);
		$objXls->getActiveSheet()->setCellValue('F'.$countRow, hr24to12($rs["ordertime"]));
		$objXls->getActiveSheet()->setCellValue('G'.$countRow, $rs["total"]);
		$countRow++;
	}
	
	///////////// Start Raw Products Estimate /////////////////////////
	$sqlr = "SELECT order_restaurant.id,addresturant.name,addresturant.ingredients FROM order_restaurant INNER JOIN addresturant ON order_restaurant.itemid = addresturant.id WHERE ".$filter_staff.$filter_dt." ORDER BY order_restaurant.invoiceid DESC";
	$qryr = mysqli_query($conn4as,$sqlr);
	$totalr = mysqli_num_rows($qryr);
	if($totalr > 0){
			while($rsr = mysqli_fetch_assoc($qryr)){
				if($rsr["ingredients"] != ''){
					$allIngArray = array_merge($allIngArray,explode(",",$rsr["ingredients"]));
				}
			}
			$allIngCount = array_count_values($allIngArray);
			if(count($allIngCount) > 0){
					$cRow = 3;
					foreach($allIngCount as $k=>$v){
					$objXls->getActiveSheet()->setCellValue('J'.$cRow, $IngredientsArray[$k]);
					$objXls->getActiveSheet()->setCellValue('K'.$cRow, $v);
					$cRow++;
					}
			}
	}
	///////////// End Raw Products Estimate /////////////////////////
	
	$objWriter = PHPExcel_IOFactory::createWriter($objXls, 'Excel5');
	ob_end_clean();
	$objWriter->save('php://output');
	
	//echo 'Exporting data to excel was successfully.';
}else{
	echo 'Exporting data to excel failed. Try again!';
}
}
}
?>