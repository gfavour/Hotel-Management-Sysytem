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
			echo '1'; //"UPDATE ".$table." SET issync = '1' WHERE id IN ('".$arrIDs."')";
		}else{
			echo '1';
		}
	}else{ echo '1';}
}
//////////////////////////
function GetiData($table){
global $conn4as;

if($table == 'addclient'){
$sql = "SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'title',title,'lastname',lastname,'firstname',firstname,'email',email,'password',password,'phone',phone,'city',city,'state',state,'country',country,'isin',isin,'company',company,'amount',amount,'lastdeposit',lastdeposit,'lastddate',lastddate,'lastwithdraw',lastwithdraw,'lastwdate',lastwdate,'pic',pic,'issync',issync)) AS rcol FROM addclient WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'addbar'){
$sql = "SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'name',name,'categoryid',categoryid,'instock',instock,'itemleft',itemleft,'measure',measure,'quantity',quantity,'costprice',costprice,'price',price,'description',description,'barcode',barcode,'newstock',newstock,'oldremstock',oldremstock,'laststockadd',laststockadd,'datelaststockadd',datelaststockadd,'issync',issync)) AS rcol FROM addbar WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'addbar2'){
$sql = "SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'name',name,'categoryid',categoryid,'instock',instock,'itemleft',itemleft,'measure',measure,'quantity',quantity,'costprice',costprice,'price',price,'description',description,'barcode',barcode,'newstock',newstock,'oldremstock',oldremstock,'laststockadd',laststockadd,'datelaststockadd',datelaststockadd,'issync',issync)) AS rcol FROM addbar2 WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'addcab'){
$sql = "SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'carno',carno,'firstname',firstname,'lastname',lastname,'email',email,'phone',phone,'address',address,'regdate',regdate,'issync',issync)) AS rcol FROM addcab WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'addlaundary'){
$sql = "SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'title', title, 'categoryid',categoryid,'description',description, 'price',price,'issync',issync)) AS rcol FROM addlaundary WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'addrestaurant'){
$sql = "SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'name',name,'categoryid',categoryid,'measure',measure,'quantity',quantity,'price',price,'description',description,'ingredients',ingredients, 'issync',issync)) AS rcol FROM addrestaurant WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'addroom'){
$sql = "SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'roomType',roomType,'categoryid',categoryid,'roomrate',roomrate,'roomDescription',roomDescription,'pic',pic,'roomQuantity',roomQuantity,'roomleft',roomleft,'facilities',facilities,'noofadult',noofadult,'noofchildren',noofchildren,'currentinv',currentinv,'rcardno',rcardno,'rlockno',rlockno,'issync',issync)) AS rcol FROM addroom WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'addroomfacility'){
$sql = "SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'name',name,'description',description, 'issync',issync)) AS rcol FROM addroomfacility WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'addspa'){
$sql = "SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'name',name,'categoryid',categoryid,'measure',measure,'duration',duration,'price',price,'description',description,'issync',issync)) AS rcol FROM addspa WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'addsport'){
$sql = "SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'name',name,'categoryid',categoryid,'status',status,'quantity',quantity,'price',price,'description',description,'issync',issync)) AS rcol FROM addsport WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'addswimpool'){
$sql = "SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'name',name,'categoryid',categoryid,'measure',measure,'duration',duration,'price',price,'description',description,'issync',issync)) AS rcol FROM addswimpool WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'barrequest'){
$sql = "SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'bartype',bartype,'itemname',itemname,'itemid',itemid,'qty',qty,'staffid',staffid,'approveby',approveby,'approvedate',approvedate,'issync',issync)) AS rcol FROM barrequest WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'department'){
$sql = "SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'department_name',department_name,'department_budget',department_budget,'issync',issync)) AS rcol FROM department WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'ewallet'){
$sql = "SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'userid',userid,'lastdeposit',lastdeposit,'lastddate',lastddate,'lastwithdraw',lastwithdraw,'lastwdate',lastwdate,'issync',issync)) AS rcol FROM ewallet WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'expenditure'){
$sql = "SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id,'title',title,'expdate',expdate,'amount',amount,'description',description,'staffid',staffid,'approveby',approveby,'dept',dept,'issync',issync)) AS rcol FROM expenditure WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'gym'){
$sql = "SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'surname',surname,'firstname',firstname,'address',address,'dob',dob,'email',email,'phone',phone,'gender',gender,'nationality',nationality,'origin',origin,'lga',lga,'enametel',enametel,'nokname',nokname,'nokphone',nokphone,'nokaddress',nokaddress,'how2contact', how2contact, 'howuhear', howuhear,'regdate', regdate,'pix', pix, 'currentinv', currentinv, 'issync',issync)) AS rcol FROM gym WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'gym1'){
$sql = "SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'regno',regno,'userid',userid,'goals',goals,'smoker',smoker,'alcoholperwk',alcoholperwk,'ghealth',ghealth,'details',details,'mednotes',mednotes,'waterdaily',waterdaily,'healthdiet',healthdiet,'mmeal',mmeal,'emeal',emeal,'foodweak',foodweak,'issync',issync)) AS rcol FROM gym1 WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'gymdurations'){
$sql = "SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'title',title,'duration',duration,'price',price,'issync',issync)) AS rcol FROM gymdurations WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'gympayments'){
$sql = "SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'userid',userid,'invoiceid',invoiceid,'duration',duration,'startdate',startdate,'enddate',enddate,'membertype',membertype,'regfee',regfee,'debittype',debittype,'paymenttype',paymenttype,'amount',amount,'ddamount',ddamount,'total',total,'amountpaid',amountpaid,'balance',balance, 'ispaid', ispaid, 'status', status, 'issync',issync)) AS rcol FROM gympayments WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'onlineorders'){
//$sql = "SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'hotelid',hotelid,'invoiceid',invoiceid,'customerid',customerid,'customerlname',customerlname,'customerfname',customerfname,'customeremail',customeremail,'customerphone',customerphone,'roomid',roomid,'roomname',roomname,'bookingsite',bookingsite,'adult',adult,'children',children,'noofroom',noofroom,'amount',amount, 'paymenttype', paymenttype, 'ispaid', ispaid,'checkin' checkin, 'checkout',checkout,'status',status ,'issync',issync)) AS rcol FROM onlineorders WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'orders'){
$sql = "SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'invoiceid',invoiceid,'guestid',guestid,'isroom',isroom,'isbar',isbar,'isbar2',isbar2,'issport',issport,'isspa',isspa, 'islaundary',islaundary,'isrestaurant', isrestaurant,'isswimpool',isswimpool, 'orderdate', orderdate, 'ordertime', ordertime, 'checkouttime', checkouttime, 'total', total, 'servicecharge', servicecharge, 'roomfoodcat', roomfoodcat, 'ispaid', ispaid, 'iswallet', iswallet, 'issync',issync)) AS rcol FROM orders WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'order_bar'){
$sql = "SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'invoiceid',invoiceid,'guestid',guestid,'itemid',itemid,'itemdescr',itemdescr,'qty',qty,'discount',discount,'vat',vat,'unitprice',unitprice,'total',total,'servicecharge',servicecharge,'roomitemcat',roomitemcat,'orderdate',orderdate,'ordertime',ordertime,'ispaid',ispaid,'staffid',staffid,'waiter',waiter,'isflag',isflag,'issync',issync)) AS rcol FROM order_bar WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'order_bar2'){
$sql = "SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'invoiceid',invoiceid,'guestid',guestid,'itemid',itemid,'itemdescr',itemdescr,'qty',qty,'discount',discount,'vat',vat,'unitprice',unitprice,'total',total,'servicecharge',servicecharge,'roomitemcat',roomitemcat,'orderdate',orderdate,'ordertime',ordertime,'ispaid',ispaid,'staffid',staffid,'waiter',waiter,'isflag',isflag,'issync',issync)) AS rcol FROM order_bar2 WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'order_laundary'){
$sql ="SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'invoiceid',invoiceid,'guestid',guestid,'itemid',itemid,'descr',descr,'discount',discount,'vat',vat,'unitprice',unitprice,'total',total,'orderdate',orderdate,'ordertime',ordertime,'ispaid',ispaid,'staffid',staffid,'issync',issync)) AS rcol FROM order_laundary WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'order_restaurant'){
$sql ="SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'invoiceid',invoiceid,'guestid',guestid,'itemid',itemid,'descr',descr,'qty',qty,'discount',discount,'vat',vat,'unitprice',unitprice,'total',total,'servicecharge',servicecharge,'roomfoodcat',roomfoodcat,'orderdate',orderdate,'ordertime',ordertime,'ispaid',ispaid,'tableno',tableno,'waiter',waiter,'staffid',staffid,'issync',issync)) AS rcol FROM order_restaurant WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'order_room'){
$sql ="SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'invoiceid',invoiceid,'guestid',guestid,'roomid',roomid,'noofroom',noofroom,'noofperson',noofperson,'checkin',checkin,'checkout',checkout,'timein',timein,'timeout',timeout,'orderdate',orderdate,'ordertime',ordertime,'duration',duration,'discount',discount,'vat',vat,'unitprice',unitprice,'total',total,'checkstatus',checkstatus,'ispaid',ispaid,'staffid',staffid,'issync',issync)) AS rcol FROM order_room WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'order_spa'){
$sql ="SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'invoiceid',invoiceid,'guestid',guestid,'itemid',itemid,'descr',descr,'noofperson',noofperson,'discount',discount,'vat',vat,'unitprice',unitprice,'total',total,'orderdate',orderdate,'ordertime',ordertime,'ispaid',ispaid,'staffid',staffid,'issync',issync)) AS rcol FROM order_spa WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'order_sportitem'){
$sql ="SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'invoiceid',invoiceid,'guestid',guestid,'itemid',itemid,'descr',descr,'tranxtype',tranxtype,'qty',qty,'discount',discount,'vat',vat,'unitprice',unitprice,'total',total,'orderdate',orderdate,'ordertime',ordertime,'ispaid',ispaid,'staffid',staffid,'issync',issync)) AS rcol FROM order_spotitem WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'order_swimpool'){
$sql ="SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'invoiceid',invoiceid,'guestid',guestid,'itemid',itemid,'descr',descr,'noofperson',noofperson,'duration',duration,'discount',discount,'vat',vat,'unitprice',unitprice,'total',total,'orderdate',orderdate,'ordertime',ordertime,'ispaid',ispaid,'staffid',staffid,'issync',issync)) AS rcol FROM order_swimpool WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'otherpictures'){
//$sql ="SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'pictype',pictype,'pic',pic,'issync',issync)) AS rcol FROM otherpictures WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'paycab'){
$sql ="SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'cabid',cabid,'amount',amount,'paydate',paydate,'payrealdate',payrealdate,'staffid',staffid,'issync',issync)) AS rcol FROM paycab WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'roompictures'){
$sql ="SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'roomid',roomid,'pic1',pic1,'pic2',pic2,'pic3',pic3,'pic4',pic4,'pic5',pic5,'pic6',pic6,'pic7',pic7,'pic8',pic8,'pic9',pic9,'pic10',pic10,'pic11',pic11,'pic12',pic12,'issync',issync)) AS rcol FROM roompictures WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'settings'){
$sql ="SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'hotelid',hotelid,'bookingsite',bookingsite,'hotelname',hotelname,'address',address,'state',state,'country',country,'phone',phone,'email',email,'website',website,'promodiscount',promodiscount,'minnoofroom',minnoofroom,'vat',vat,'facebook',facebook, 'twitter',twitter,'youtube',youtube,'googlemap',googlemap,'logo',logo,'loginbgpic',loginbgpic,'baritemlimit',baritemlimit,'servicecharge',servicecharge,'issync',issync)) AS rcol FROM settings WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'tablenos'){
$sql ="SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'name',name,'staffid',staffid,'issync',issync)) AS rcol FROM tablenos WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'tblcategory'){
$sql ="SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'cattype',cattype,'catname',catname,'issync',issync)) AS rcol FROM tblcategory WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'tblcompany'){
$sql ="SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'name',name,'contactperson',contactperson,'address',address,'phone',phone,'regdate',regdate,'issync',issync)) AS rcol FROM tblcompany WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'tblcountry'){
//$sql ="SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id,'country',country)) AS rcol FROM tblcountry WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'tblingredient'){
$sql ="SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'name',name,'issync',issync)) AS rcol FROM tblingredient WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'tblinstruct'){
$sql ="SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'itemid',itemid,'overallstock',overallstock,'itemleft',itemleft,'regdate',regdate,'regtime',regtime,'elapsedate',elapsedate,'qty2restock',qty2restock,'qtyrestocked',qtyrestocked,'message',message,'servicetype',servicetype,'issync',issync)) AS rcol FROM tblinstruct WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'tblmcardreason'){
$sql ="SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'reason',reason,'duration',duration,'staffid',staffid,'regdate',regdate,'issync',issync)) AS rcol FROM tblmcardreason WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'tblrestock'){
$sql ="SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'itemid',itemid,'itemtype',itemtype,'qty',qty,'itemleft',itemleft,'regdate',regdate,'regstamp',regstamp,'staff',staff,'regtime',regtime,'costprice',costprice,'price',price,'newstock',newstock,'oldremstock',oldremstock,'issync',issync)) AS rcol FROM tblrestock WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'tblschedule'){
$sql ="SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'userid',userid,'name',name,'phone',phone,'checkindate',checkindate,'checkoutdate',checkoutdate,'roomid',roomid,'issync',issync)) AS rcol FROM tblschedule WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'tblshifts'){
$sql ="SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'userid',userid,'openshift',openshift,'closeshift',closeshift,'servicetype',xlsurl,'xlsurl','issync',issync)) AS rcol FROM tblshifts WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'tblstate'){
//$sql ="SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'cid',cid,'state',state,'issync',issync)) AS rcol FROM tblstate WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'tblstore'){
$sql ="SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'name',name,'categoryid',categoryid,'qtyinstore',qtyinstore,'measure',measure,'quantity',quantity,'costprice',costprice,'price',price,'barcode',barcode,'newstock',newstock,'oldremstock',oldremstock,'regdate',regdate,'lastupdate',lastupdate,'issync',issync)) AS rcol FROM tblstore WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'tblstorehistory'){
$sql ="SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'itemid',itemid,'itemtype',itemtype,'qty',qty,'itemleft',itemleft,'regdate',regdate,'regstamp',regstamp,'staff',staff,'regtime',regtime,'costprice',costprice,'price',price,'newstockadded',newstockadded,'stockremove',stockremove,'status',status,'issync',issync)) AS rcol FROM tblstorehistory WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'tblstoretransfer'){
$sql ="SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'itemid',itemid,'itemtype',itemtype,'qty',qty,'regdate',regdate,'regstamp',regstamp,'staff',staff,'regtime',regtime,'costprice',costprice,'price',price,'issync',issync)) AS rcol FROM tblstoretransfer WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'users'){
$sql ="SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'username',username,'lastname',lastname,'firstname',firstname,'companyname',companyname,'password',password,'email',email,'users_role',users_role,'date',date,'staff_salary',staff_salary,'staff_hiring_date',staff_hiring_date,'photo',photo,'issync',issync)) AS rcol FROM users WHERE issync <> '1' ORDER BY id LIMIT 100";

}elseif($table == 'waiters'){
$sql ="SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'name',name,'staffid',staffid,'username',username,'password',password,'usagepermit',usagepermit,'issync',issync)) AS rcol FROM waiters WHERE issync <> '1' ORDER BY id LIMIT 100";
}
/////////////
	$qry = mysqli_query($conn4as,$sql);
	$total = mysqli_num_rows($qry);
	if($total > 0){
		$rs = mysqli_fetch_assoc($qry);
		$rcol = $rs["rcol"];
	}else{
		$rcol = '';
	}
	return $rcol;
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