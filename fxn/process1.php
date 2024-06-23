<?php
include(__DIR__.'/connection.php');
$globalid = $_SESSION["amyi15"];

$logfilename = date("Y-m-d");
$logfilename .= ".txt";
$mktoday = strtotime(date("Y-m-d")); //mktime(0,0,0);

if ($_POST["dwat"] == "addfoodingredient"){
	$ings = explode(",",$_POST["name"]);
	$cn = count($ings);
	//foreach($_POST["name"] as $n){ if($n != ''){ $n = 1; } }
	if ($cn <= 0){echo 'Name of ingredient is required';}
	else{
		foreach($ings as $n){
			if ($n != ''){
				$sql .= ($sql == '')?"INSERT INTO tblingredients(name) VALUES('".mysqli_real_escape_string($conn4as,trim($n))."')":", ('".mysqli_real_escape_string($conn4as,trim($n))."')";
			}
		}
		mysqli_query($conn4as,$sql);
		redirect("?m=Ingredient(s) successfully added");
	}
}

if ($_POST["dwat"] == "write2bkupfile"){
	if ($_POST["time"] == ''){echo 'Time is required';}
	else{
	if ($_POST["interval"] == 'w'){
		$log = $_POST["interval"].",".$_POST["weekday"].",".$_POST["time"].",".$_POST["seldrive"].",".date("Y-m-d",strtotime("-2 days")); 
	}else{
		$log = $_POST["interval"].",".$_POST["mdate"].",".$_POST["time"].",".$_POST["seldrive"].",".date("Y-m-d",strtotime("-2 days")); 
	}
		unlink("../backup/backup-scheduled.txt");
		WriteToFile("../backup/backup-scheduled.txt",$log);
		redirect('?m=Database Backup scheduled successfully');
	}
}

if ($_POST["dwat"] == "stafflogin"){
	if ($_POST["username"] == ''){echo 'Username/Email is required';}
	elseif ($_POST["password"] == ''){echo 'Password is required';}
	elseif ($_POST["accttype"] == ''){echo 'Account type is required';}
	else{
		if ($_POST["accttype"] == 'staff'){
		$pwd = md5(urldecode($_REQUEST["password"]));
		if(select("SELECT * FROM users WHERE (username = '".mysqli_real_escape_string($conn4as,urldecode($_POST["username"]))."' OR email = '".mysqli_real_escape_string($conn4as,urldecode($_POST["username"]))."') AND password = '".mysqli_real_escape_string($conn4as,$pwd)."' ORDER BY id")){
$rs = mysqli_fetch_assoc($qry);
//echo 'am....'.$rs["id"];
$_SESSION["amyi15"] = $rs["id"];
$_SESSION["amyn15"] = $rs["lastname"].' '.$rs["firstname"];
$_SESSION["amyem15"] = $rs["email"];
$_SESSION["role15"] = $rs["users_role"];
$_SESSION["photo15"] = $rs["photo"];
$_SESSION["hotelid"] = $rs["hotelid"];
$_SESSION["bookingsite"] = $rs["bookingsite"];

$log = "[".date("y/m/d h:i:s A")."], <br>Staff logged in, <br>STAFF: ".$_SESSION["amyn15"]." (ID: ".$_SESSION["amyi15"].")\r\n=======================================\r\n"; 
WriteToFile("../logs/".$logfilename,$log);
		
/*
$stc->data["amyi15"] = $rs["id"];
$stc->data["amyn15"] = $rs["lastname"].' '.$rs["firstname"];
$stc->data["amyem15"] = $rs["email"];
$stc->data["role15"] = $rs["users_role"];
$stc->data["photo15"] = $rs["photo"];
*/
	//if ($stc->save()){
		//echo 'ALoggedin';
		redirect($portalpath.'admin/index.php');
	//}else{ 
		//echo 'Session not permitting. Contact the administrator.';
	//} 

	
	}else{
		echo 'Account  not found';
	}
	
	}else{
		echo 'Sorry guest login disabled for now.';
	}
	
}
}

/***********Room facilities************/
if ($_POST["dwat"] == "addroomfacility"){
if ($_POST["name"] == ''){echo 'Name of facility is required';}
else{
$facilities = explode(",",$_POST["name"]);
$sql1 = "INSERT INTO addroomfacility(name,description) VALUES";
foreach($facilities as $facility){
if ($sql == ""){$sql = "('".mysqli_real_escape_string($conn4as,$facility)."','".mysqli_real_escape_string($conn4as,$_POST["description"])."')";}
else{$sql .= ",('".mysqli_real_escape_string($conn4as,$facility)."','".mysqli_real_escape_string($conn4as,$_POST["description"])."')";}
}
$sql = $sql1.$sql;
mysqli_query($conn4as,$sql);
echo 'RoomFacilityAdded';
}
}

if ($_POST["dwat"] == "editroomfacility"){
if ($_POST["name"] == ''){echo 'Name of facility is required';}
else{
$sql = "UPDATE addroomfacility SET issync = '2',name = '".mysqli_real_escape_string($conn4as,$_POST["name"])."',description='".mysqli_real_escape_string($conn4as,$_POST["description"])."' WHERE id =".mysqli_real_escape_string($conn4as,$_POST["hidid"]);
mysqli_query($conn4as,$sql);
echo 'RoomFacilityUpdated';
}
}


/********ADD ROOM ******/
if ($_POST["dwat"] == "addroom"){
if ($_POST["roomtype"] == ''){echo 'Room number is required';}
elseif ($_POST["categoryid"] == ''){echo 'Room type is required';}
else if ($_POST["roomrate"] == '' || validate($_POST["roomrate"],"0-9")){echo 'Room rate is required. Numeric value only, no comma';}
else if ($_POST["quantity"] == '' || validate($_POST["quantity"],"0-9")){echo 'Room quantity is required. Numeric value only, no comma';}
else if ($_POST["maxadult"] == ''){echo 'No of maximum adult per room is required';}
else if ($_POST["maxchild"] == ''){echo 'No of maximum children per room is required';}
//else if ($_POST["roomDescription"] == ''){echo 'Room description is required';}
//else if ($_FILES["file1"]['name'] == ''){echo 'You must attach picture file to image 01.';}
else{
$facilities = $_POST["facility"];
foreach($_POST["facility"] as $facility){
if ($f == ""){$f = mysqli_real_escape_string($conn4as,$facility);}
else{$f .= ",".mysqli_real_escape_string($conn4as,$facility);}
}

$time = time();
//$file1 = uploader("../archives/","ufile1",$time);
if (!empty($_FILES['ufile1']['tmp_name'])){$file1 = uploader("../archives/","ufile1",$time);}else{$file1 = "";}
if (!empty($_FILES['ufile2']['tmp_name'])){$file2 = uploader("../archives/","ufile2",$time);}else{$file2 = "";}
if (!empty($_FILES['ufile3']['tmp_name'])){$file3 = uploader("../archives/","ufile3",$time);}else{$file3 = "";}
if (!empty($_FILES['ufile4']['tmp_name'])){$file4 = uploader("../archives/","ufile4",$time);}else{$file4 = "";}
if (!empty($_FILES['ufile5']['tmp_name'])){$file5 = uploader("../archives/","ufile5",$time);}else{$file5 = "";}
if (!empty($_FILES['ufile6']['tmp_name'])){$file6 = uploader("../archives/","ufile6",$time);}else{$file6 = "";}
if (!empty($_FILES['ufile7']['tmp_name'])){$file7 = uploader("../archives/","ufile7",$time);}else{$file7 = "";}
if (!empty($_FILES['ufile8']['tmp_name'])){$file8 = uploader("../archives/","ufile8",$time);}else{$file8 = "";}
if (!empty($_FILES['ufile9']['tmp_name'])){$file9 = uploader("../archives/","ufile9",$time);}else{$file9 = "";}
if (!empty($_FILES['ufile10']['tmp_name'])){$file10 = uploader("../archives/","ufile10",$time);}else{$file10 = "";}
if (!empty($_FILES['ufile11']['tmp_name'])){$file11 = uploader("../archives/","ufile11",$time);}else{$file11 = "";}
if (!empty($_FILES['ufile12']['tmp_name'])){$file12 = uploader("../archives/","ufile12",$time);}else{$file12 = "";}

$sql = "INSERT INTO addroom(roomType, categoryid, roomrate, roomDescription, pic, roomQuantity, roomleft, facilities, noofadult, noofchildren,rcardno,rlockno) VALUES('".mysqli_real_escape_string($conn4as,$_POST["roomtype"])."','".mysqli_real_escape_string($conn4as,$_POST["categoryid"])."','".mysqli_real_escape_string($conn4as,$_POST["roomrate"])."','".mysqli_real_escape_string($conn4as,$_POST["roomDescription"])."','".mysqli_real_escape_string($conn4as,$file1)."','".mysqli_real_escape_string($conn4as,$_POST["quantity"])."','".mysqli_real_escape_string($conn4as,$_POST["quantity"])."','".mysqli_real_escape_string($conn4as,$f)."','".mysqli_real_escape_string($conn4as,$_POST["maxadult"])."','".mysqli_real_escape_string($conn4as,$_POST["maxchild"])."','".mysqli_real_escape_string($conn4as,$_POST["rcardno"])."','".mysqli_real_escape_string($conn4as,$_POST["rlockno"])."')";
mysqli_query($conn4as,$sql);
$jrid = mysqli_insert_id($conn4as);

$sql = "INSERT INTO roompictures(roomid, pic1, pic2, pic3, pic4, pic5, pic6, pic7, pic8, pic9, pic10, pic11, pic12) VALUES('".mysqli_real_escape_string($conn4as,$jrid)."','".mysqli_real_escape_string($conn4as,$file1)."','".mysqli_real_escape_string($conn4as,$file2)."','".mysqli_real_escape_string($conn4as,$file3)."','".mysqli_real_escape_string($conn4as,$file4)."','".mysqli_real_escape_string($conn4as,$file5)."','".mysqli_real_escape_string($conn4as,$file6)."','".mysqli_real_escape_string($conn4as,$file7)."','".mysqli_real_escape_string($conn4as,$file8)."','".mysqli_real_escape_string($conn4as,$file9)."','".mysqli_real_escape_string($conn4as,$file10)."','".mysqli_real_escape_string($conn4as,$file11)."','".mysqli_real_escape_string($conn4as,$file12)."')";
mysqli_query($conn4as,$sql);

$log = "[".date("y/m/d h:i:s A")."], <br>Room added, <br>BY STAFF: ".$_SESSION["amyn15"]."(".$_SESSION["amyi15"]."), <br>ROOM ID: ".$jrid.", <br>ROOM NUMBER: ".$_POST["roomtype"].", <br>".get4Email("SELECT catname FROM tblcategory WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["categoryid"])." ORDER BY id","catname","ROOM TYPE")."RATE: ".$_POST["roomrate"]."\r\n=======================================\r\n"; 
WriteToFile("../logs/".$logfilename,$log);
		
echo 'NRSA';
}
}

if ($_POST["dwat"] == "editroom"){
if ($_POST["roomtype"] == ''){echo 'Room number is required';}
elseif ($_POST["categoryid"] == ''){echo 'Room type is required';}
else if ($_POST["roomrate"] == '' || validate($_POST["roomrate"],"0-9")){echo 'Room rate is required. Numeric value only, no comma';}
else if ($_POST["quantity"] == '' || validate($_POST["quantity"],"0-9")){echo 'Room quantity is required. Numeric value only, no comma';}
else if ($_POST["maxadult"] == ''){echo 'No of maximum adult per room is required';}
else if ($_POST["maxchild"] == ''){echo 'No of maximum children per room is required';}
//else if ($_POST["roomDescription"] == ''){echo 'Room description is required';}
//else if ($_FILES["ufile1"]['name'] == ''){echo 'You must attach picture file to image 01.';}
else{
$facilities = $_POST["facility"];
foreach($_POST["facility"] as $facility){
if ($f == ""){$f = mysqli_real_escape_string($conn4as,$facility);}
else{$f .= ",".mysqli_real_escape_string($conn4as,$facility);}
}

$time = time();
if ($_FILES['ufile1']['tmp_name'] != ''){$file1 = uploader("../archives/","ufile1",$time);}else{$file1 = $_POST[hidufile1];}
if (!empty($_FILES['ufile2']['tmp_name'])){$file2 = uploader("../archives/","ufile2",$time);}else{$file2 = $_POST[hidufile2];}
if (!empty($_FILES['ufile3']['tmp_name'])){$file3 = uploader("../archives/","ufile3",$time);}else{$file3 = $_POST[hidufile3];}
if (!empty($_FILES['ufile4']['tmp_name'])){$file4 = uploader("../archives/","ufile4",$time);}else{$file4 = $_POST[hidufile4];}
if (!empty($_FILES['ufile5']['tmp_name'])){$file5 = uploader("../archives/","ufile5",$time);}else{$file5 = $_POST[hidufile5];}
if (!empty($_FILES['ufile6']['tmp_name'])){$file6 = uploader("../archives/","ufile6",$time);}else{$file6 = $_POST[hidufile6];}
if (!empty($_FILES['ufile7']['tmp_name'])){$file7 = uploader("../archives/","ufile7",$time);}else{$file7 = $_POST[hidufile7];}
if (!empty($_FILES['ufile8']['tmp_name'])){$file8 = uploader("../archives/","ufile8",$time);}else{$file8 = $_POST[hidufile8];}
if (!empty($_FILES['ufile9']['tmp_name'])){$file9 = uploader("../archives/","ufile9",$time);}else{$file9 = $_POST[hidufile9];}
if (!empty($_FILES['ufile10']['tmp_name'])){$file10 = uploader("../archives/","ufile10",$time);}else{$file10 = $_POST[hidufile10];}
if (!empty($_FILES['ufile11']['tmp_name'])){$file11 = uploader("../archives/","ufile11",$time);}else{$file11 = $_POST[hidufile11];}
if (!empty($_FILES['ufile12']['tmp_name'])){$file12 = uploader("../archives/","ufile12",$time);}else{$file12 = $_POST[hidufile12];}

$sql = select("select roomleft from addroom WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]));
$rs1 = mysqli_fetch_assoc($qry);
$rmleft = $rs1["roomleft"];
	
if ($_POST["quantity"] > $_POST["hidqty"]){
	$left = $_POST["quantity"] - $_POST["hidqty"];
	if ($rmleft == 0){$left = 0;}else{$left = $rmleft + $left;}
}else if ($_POST["quantity"] < $_POST["hidqty"]){
	$left = $_POST["hidqty"] - $_POST["quantity"];
	if ($_POST["quantity"] < $rmleft){if ($rmleft == 0){$left = 0;}else{$left = $_POST["quantity"];}}
	else{
	if ($rmleft == 0){$left = 0;}else{$left = $rmleft - $left;}
	}
}else{
	$left = $rmleft;
}

$sql = "UPDATE addroom SET issync = '2',roomType='".mysqli_real_escape_string($conn4as,$_POST["roomtype"])."', categoryid='".mysqli_real_escape_string($conn4as,$_POST["categoryid"])."', roomrate='".mysqli_real_escape_string($conn4as,$_POST["roomrate"])."', roomDescription='".mysqli_real_escape_string($conn4as,$_POST["roomDescription"])."', pic='".mysqli_real_escape_string($conn4as,$file1)."', roomQuantity='".mysqli_real_escape_string($conn4as,$_POST["quantity"])."', roomleft='".mysqli_real_escape_string($conn4as,$left)."', facilities='".mysqli_real_escape_string($conn4as,$f)."', noofadult='".mysqli_real_escape_string($conn4as,$_POST["maxadult"])."', noofchildren='".mysqli_real_escape_string($conn4as,$_POST["maxchild"])."', rcardno = '".mysqli_real_escape_string($conn4as,$_POST["rcardno"])."', rlockno = '".mysqli_real_escape_string($conn4as,$_POST["rlockno"])."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);

mysqli_query($conn4as,$sql);
$jrid = $_POST["hidid"];

$sql = "UPDATE roompictures SET issync = '2',pic1='".mysqli_real_escape_string($conn4as,$file1)."', pic2='".mysqli_real_escape_string($conn4as,$file2)."', pic3='".mysqli_real_escape_string($conn4as,$file3)."', pic4='".mysqli_real_escape_string($conn4as,$file4)."', pic5='".mysqli_real_escape_string($conn4as,$file5)."', pic6='".mysqli_real_escape_string($conn4as,$file6)."', pic7='".mysqli_real_escape_string($conn4as,$file7)."', pic8='".mysqli_real_escape_string($conn4as,$file8)."', pic9='".mysqli_real_escape_string($conn4as,$file9)."', pic10='".mysqli_real_escape_string($conn4as,$file10)."', pic11='".mysqli_real_escape_string($conn4as,$file11)."', pic12='".mysqli_real_escape_string($conn4as,$file12)."' WHERE roomid = '".mysqli_real_escape_string($conn4as,$_POST["hidid"])."'";
mysqli_query($conn4as,$sql);

echo 'RSE';

$log = "[".date("y/m/d h:i:s A")."], <br>Room Editted, <br>BY STAFF: ".$_SESSION["amyn15"]."(".$_SESSION["amyi15"]."), <br>ROOM ID: ".$_POST["hidid"].", <br>ROOM NUMBER: ".$_POST["roomtype"].", <br>".get4Email("SELECT catname FROM tblcategory WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["categoryid"])." ORDER BY id","catname","ROOM TYPE")."RATE: ".$_POST["roomrate"]."\r\n=======================================\r\n";  
WriteToFile("../logs/".$logfilename,$log);

}
}

if ($_POST["dwat"] == "delroom"){
	if ($_POST["id"] == ''){echo 'Undefined record.';}
	else{
		if(delete('addroom',"id = ".mysqli_real_escape_string($conn4as,$_POST["id"]))){
		delete('roompictures',"roomid = ".mysqli_real_escape_string($conn4as,$_POST["id"]));
			echo 'deleted';
		}else{
			echo 'Could not delete record.';
		}
	}
}

if ($_POST["dwat"] == "del"){
	if ($_POST["id"] == ''){echo 'Undefined record.';}
	else if ($_POST["tbl"] == ''){echo 'Undefined source.';}
	else{
		if ($_POST["tbl"] == 'addclient'){
			$isAnonymous = returnField("SELECT id FROM addclient WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["id"]),"id");
			if ($isAnonymous != 1){
			delete("orders","guestid = '".mysqli_real_escape_string($conn4as,$_POST["id"])."'");
			delete("order_room","guestid = '".mysqli_real_escape_string($conn4as,$_POST["id"])."'");
			delete("order_bar","guestid = '".mysqli_real_escape_string($conn4as,$_POST["id"])."'");
			delete("order_swimpool","guestid = '".mysqli_real_escape_string($conn4as,$_POST["id"])."'");
			delete("order_laundary","guestid = '".mysqli_real_escape_string($conn4as,$_POST["id"])."'");
			delete("order_restaurant","guestid = '".mysqli_real_escape_string($conn4as,$_POST["id"])."'");
			delete("order_spa","guestid = '".mysqli_real_escape_string($conn4as,$_POST["id"])."'");
			delete("order_sportitem","guestid = '".mysqli_real_escape_string($conn4as,$_POST["id"])."'");
			delete($_POST["tbl"],"id = ".mysqli_real_escape_string($conn4as,$_POST["id"]));
			echo 'deleted';
			}else{
			echo 'AnonymousCNBD';
			}
		}else if ($_POST["tbl"] == 'tblcategory'){
			if ($_POST["cty"] == 'room'){ $qry = mysqli_query($conn4as,"SELECT id FROM addroom WHERE categoryid = '".mysqli_real_escape_string($conn4as,$_POST["id"])."'"); $total = mysqli_num_rows($qry);}
			else if ($_POST["cty"] == 'bar'){ $qry = mysqli_query($conn4as,"SELECT id FROM addbar WHERE categoryid = '".mysqli_real_escape_string($conn4as,$_POST["id"])."'"); $total = mysqli_num_rows($qry);}
			else if ($_POST["cty"] == 'restaurant'){ $qry = mysqli_query($conn4as,"SELECT id FROM addresturant WHERE categoryid = '".mysqli_real_escape_string($conn4as,$_POST["id"])."'"); $total = mysqli_num_rows($qry);}
			else if ($_POST["cty"] == 'laundary'){ $qry = mysqli_query($conn4as,"SELECT id FROM addlaundary WHERE categoryid = '".mysqli_real_escape_string($conn4as,$_POST["id"])."'"); $total = mysqli_num_rows($qry);}
			else if ($_POST["cty"] == 'sport'){ $qry = mysqli_query($conn4as,"SELECT id FROM addsport WHERE categoryid = '".mysqli_real_escape_string($conn4as,$_POST["id"])."'"); $total = mysqli_num_rows($qry);}
			else if ($_POST["cty"] == 'spa'){ $qry = mysqli_query($conn4as,"SELECT id FROM addspa WHERE categoryid = '".mysqli_real_escape_string($conn4as,$_POST["id"])."'"); $total = mysqli_num_rows($qry);}
			
			if($total > 0){
				echo 'Deletion aborted. Other record(s) under '.$_POST["cty"].' is attached to this category.';
			}else{
				delete($_POST["tbl"],"id = ".mysqli_real_escape_string($conn4as,$_POST["id"]));
				echo 'deleted';
			}
		}else{
			if(delete($_POST["tbl"],"id = ".mysqli_real_escape_string($conn4as,$_POST["id"]))){
				echo 'deleted';
			}else{
				echo 'Could not delete record.';
			}
		}
	}
}

/*********** Manage category ************/
if ($_POST["dwat"] == "addcategory"){
if ($_POST["cattype"] == ''){echo 'Type of Category is required';}
else if ($_POST["catname"] == ''){echo 'Category is required';}
else{

$sql = "INSERT INTO tblcategory(cattype,catname) VALUES('".mysqli_real_escape_string($conn4as,$_POST["cattype"])."','".mysqli_real_escape_string($conn4as,$_POST["catname"])."')";

mysqli_query($conn4as,$sql);
echo 'NewCategoryAdded';
}
}

if ($_POST["dwat"] == "editcategory"){
if ($_POST["cattype"] == ''){echo 'Type of Category is required';}
else if ($_POST["catname"] == ''){echo 'Category is required';}
else{

$sql = "UPDATE tblcategory SET issync = '2',cattype='".mysqli_real_escape_string($conn4as,$_POST["cattype"])."',catname='".mysqli_real_escape_string($conn4as,$_POST["catname"])."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);

mysqli_query($conn4as,$sql);
redirect("manage-category.php?id=".$_POST["hidid"]."&m=Category succesfully updated");
}
}

if ($_POST["dwat"] == "addwaiter"){
if ($_POST["name"] == ''){echo 'Waiter name/number is required';}
elseif ($_POST["username"] == ''){echo 'Waiter username is required';}
elseif ($_POST["password"] == ''){echo 'Waiter password is required';}
else{
	$pwd = HashPassword($_POST["password"]);
	$sql = "INSERT INTO waiters(name,staffid,username,password,usagepermit) VALUES('".mysqli_real_escape_string($conn4as,$_POST["name"])."','".mysqli_real_escape_string($conn4as,$globalid)."','".mysqli_real_escape_string($conn4as,$_POST["username"])."','".mysqli_real_escape_string($conn4as,$pwd)."','".mysqli_real_escape_string($conn4as,$_POST["usagepermit"])."')";
	mysqli_query($conn4as,$sql);
	echo 'NewWaiterAdded';
}
}

if ($_POST["dwat"] == "editwaiter"){
if ($_POST["name"] == ''){echo 'Waiter name/number is required';}
elseif ($_POST["username"] == ''){echo 'Waiter username is required';}
elseif (newWaiterExist($_POST["hidid"],$_POST["name"])){echo 'Waiter name already exist. Use another name';}
elseif (newWaiterUsernameExist($_POST["hidid"],$_POST["username"])){echo 'Username already exist. Use another username';}
else{
	if ($_POST["password"] != ''){
		$pwd = HashPassword($_POST["password"]);
	}else{
		$pwd = $_POST["hidpwd"];
	}
	
	$sql = "UPDATE waiters SET issync = '2',name = '".mysqli_real_escape_string($conn4as,$_POST["name"])."',staffid = '".mysqli_real_escape_string($conn4as,$globalid)."',username = '".mysqli_real_escape_string($conn4as,$_POST["username"])."',password = '".mysqli_real_escape_string($conn4as,$pwd)."',usagepermit = '".mysqli_real_escape_string($conn4as,$_POST["usagepermit"])."'  WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);
	mysqli_query($conn4as,$sql);
	
if($_POST["hidname"] != $_POST["name"]){
mysqli_query($conn4as,"UPDATE order_bar SET issync = '2',waiter = '".mysqli_real_escape_string($conn4as,$_POST["name"])."' WHERE LOWER(waiter) = '".mysqli_real_escape_string($conn4as,strtolower($_POST["hidname"]))."'");
mysqli_query($conn4as,"UPDATE order_bar2 SET issync = '2',waiter = '".mysqli_real_escape_string($conn4as,$_POST["name"])."' WHERE LOWER(waiter) = '".mysqli_real_escape_string($conn4as,strtolower($_POST["hidname"]))."'");
}
	
	echo 'WaiterUpdated';
}
}

if ($_POST["dwat"] == "addtableno"){
if ($_POST["name"] == ''){echo 'Table name/number is required';}
else{
	$sql = "INSERT INTO tablenos(name,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["name"])."','".mysqli_real_escape_string($conn4as,$globalid)."')";
	mysqli_query($conn4as,$sql);
	echo 'NewtblNosAdded';
}
}

if ($_POST["dwat"] == "edittableno"){
if ($_POST["name"] == ''){echo 'Table name/number is required';}
else{
	$sql = "UPDATE tablenos SET issync = '2',name = '".mysqli_real_escape_string($conn4as,$_POST["name"])."',staffid = '".mysqli_real_escape_string($conn4as,$globalid)."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);
	mysqli_query($conn4as,$sql);
	echo 'tblNoUpdated';
}
}

/********** Manage Cab **********************/
if ($_POST["dwat"] == "paycab"){
if ($_POST["cabid"] == ''){echo 'Cab details is required';}
else if ($_POST["amount"] == ''){echo 'Amount is required';}
else{
$time = time();
$payrealdate = date("Y-m-d");
$sql = "INSERT INTO paycab(cabid,amount,paydate,payrealdate,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["cabid"])."','".mysqli_real_escape_string($conn4as,$_POST["amount"])."','".mysqli_real_escape_string($conn4as,$time)."','".mysqli_real_escape_string($conn4as,$payrealdate)."','".mysqli_real_escape_string($conn4as,$globalid)."')";

mysqli_query($conn4as,$sql);
redirect("manage-cabs.php?m=Cab payment successfully recorded");
}
}

if ($_POST["dwat"] == "addcab"){
if ($_POST["lastname"] == ''){echo 'Last Name is required';}
else if ($_POST["firstname"] == ''){echo 'First Name is required';}
else if ($_POST["phone"] == ''){echo 'Phone number is required';}
else if ($_POST["carno"] == ''){echo 'Car plate number is required';}
else{
$time = time();
$sql = "INSERT INTO addcab(carno,lastname,firstname,email,phone,address,regdate) VALUES('".mysqli_real_escape_string($conn4as,$_POST["carno"])."','".mysqli_real_escape_string($conn4as,$_POST["lastname"])."','".mysqli_real_escape_string($conn4as,$_POST["firstname"])."','".mysqli_real_escape_string($conn4as,$_POST["email"])."','".mysqli_real_escape_string($conn4as,$_POST["phone"])."','".mysqli_real_escape_string($conn4as,$_POST["address"])."','".mysqli_real_escape_string($conn4as,$time)."')";

mysqli_query($conn4as,$sql);
redirect("?m=New cab successfully added");
}
}

if ($_POST["dwat"] == "editcab"){
if ($_POST["lastname"] == ''){echo 'Last Name is required';}
else if ($_POST["firstname"] == ''){echo 'First Name is required';}
else if ($_POST["phone"] == ''){echo 'Phone number is required';}
else if ($_POST["carno"] == ''){echo 'Car plate number is required';}
else{
$sql = "UPDATE addcab SET issync = '2',carno='".mysqli_real_escape_string($conn4as,$_POST["carno"])."',lastname='".mysqli_real_escape_string($conn4as,$_POST["lastname"])."',firstname='".mysqli_real_escape_string($conn4as,$_POST["firstname"])."',email='".mysqli_real_escape_string($conn4as,$_POST["email"])."',phone='".mysqli_real_escape_string($conn4as,$_POST["phone"])."',address='".mysqli_real_escape_string($conn4as,$_POST["address"])."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);

mysqli_query($conn4as,$sql);
redirect("manage-cabs.php?m=Cab successfully updated");
}
}

/*********** Manage Guest ************/
if ($_POST["dwat"] == "addguest"){
if ($_POST["lastname"] == ''){echo 'Last Name is required';}
else if ($_POST["firstname"] == ''){echo 'First Name is required';}
//else if (!isValidEmail($_POST["email"])){echo 'Email address is required';}
//else if ($_POST["phone"] == ''){echo 'Phone number is required';}
else{
$time = time();
if (!empty($_FILES['pic']['tmp_name'])){$pic = uploader("../archives/","pic",$time);}else{$pic = "";}

$sql = "INSERT INTO addclient(title,lastname,firstname,email,password,phone,city,state,country,company,pic) VALUES('".mysqli_real_escape_string($conn4as,$_POST["title"])."','".mysqli_real_escape_string($conn4as,$_POST["lastname"])."','".mysqli_real_escape_string($conn4as,$_POST["firstname"])."','".mysqli_real_escape_string($conn4as,$_POST["email"])."','password','".mysqli_real_escape_string($conn4as,$_POST["phone"])."','".mysqli_real_escape_string($conn4as,$_POST["city"])."','".mysqli_real_escape_string($conn4as,$_POST["state"])."','".mysqli_real_escape_string($conn4as,$_POST["country"])."','".mysqli_real_escape_string($conn4as,$_POST["company"])."','".mysqli_real_escape_string($conn4as,$pic)."')";

mysqli_query($conn4as,$sql);
echo 'NewGuestAdded';
}
}

if ($_POST["dwat"] == "editguest"){
if ($_POST["lastname"] == ''){echo 'Last Name is required';}
else if ($_POST["firstname"] == ''){echo 'First Name is required';}
//else if (!isValidEmail($_POST["email"])){echo 'Email address is required';}
//else if ($_POST["phone"] == ''){echo 'Phone number is required';}
else{
$time = time();
if (!empty($_FILES['pic']['tmp_name'])){$pic = uploader("../archives/","pic",$time); unlink("../archives/".$_POST["hidpic"]); }else{$pic = $_POST["hidpic"];}

$sql = "UPDATE addclient SET issync = '2',title='".mysqli_real_escape_string($conn4as,$_POST["title"])."',lastname='".mysqli_real_escape_string($conn4as,$_POST["lastname"])."',firstname='".mysqli_real_escape_string($conn4as,$_POST["firstname"])."',email='".mysqli_real_escape_string($conn4as,$_POST["email"])."',phone='".mysqli_real_escape_string($conn4as,$_POST["phone"])."',city='".mysqli_real_escape_string($conn4as,$_POST["city"])."',state='".mysqli_real_escape_string($conn4as,$_POST["state"])."',country ='".mysqli_real_escape_string($conn4as,$_POST["country"])."',company ='".mysqli_real_escape_string($conn4as,$_POST["company"])."',pic ='".mysqli_real_escape_string($conn4as,$pic)."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);

mysqli_query($conn4as,$sql);
echo 'NewGuestUpdated';
}
}

/*********** Manage Restaurant ************/
if ($_POST["dwat"] == "addresturant"){
if ($_POST["name"] == ''){echo 'Food title (name) is required';}
elseif ($_POST["categoryid"] == ''){echo 'Food type is required';}
else if ($_POST["quantity"] == '' || validate($_POST["quantity"],"0-9")){echo 'Quantity is required. Numeric value only, no comma';}
else if ($_POST["price"] == '' || validate($_POST["price"],"0-9")){echo 'Price is required. Numeric value only, no comma';}
else{
/*
foreach($_POST["chkingredient"] as $chking){
	if($chking != ''){
	 	$allchking .= ($allchking == '')?$chking:','.$chking;
	}
}
*/
$allchking = implode(",",$_POST["chkingredient"]);

$sql = "INSERT INTO addresturant(name,categoryid,measure,quantity,price,description,ingredients) VALUES('".mysqli_real_escape_string($conn4as,$_POST["name"])."','".mysqli_real_escape_string($conn4as,$_POST["categoryid"])."','".mysqli_real_escape_string($conn4as,$_POST["measure"])."','".mysqli_real_escape_string($conn4as,$_POST["quantity"])."','".mysqli_real_escape_string($conn4as,$_POST["price"])."','".mysqli_real_escape_string($conn4as,$_POST["description"])."','".mysqli_real_escape_string($conn4as,$allchking)."')";

mysqli_query($conn4as,$sql);
echo 'NewResturantAdded';
}
}

if ($_POST["dwat"] == "editresturant"){
if ($_POST["name"] == ''){echo 'Food Title (Name) is required';}
elseif ($_POST["categoryid"] == ''){echo 'Food type is required';}
else if ($_POST["quantity"] == '' || validate($_POST["quantity"],"0-9")){echo 'quantity is required. Numeric value only, no comma';}
else if ($_POST["price"] == '' || validate($_POST["price"],"0-9")){echo 'Price is required. Numeric value only, no comma';}
else{
$allchking = implode(",",$_POST["chkingredient"]);
$sql = "UPDATE addresturant SET issync = '2',name = '".mysqli_real_escape_string($conn4as,$_POST["name"])."',categoryid = '".mysqli_real_escape_string($conn4as,$_POST["categoryid"])."',measure='".mysqli_real_escape_string($conn4as,$_POST["measure"])."',quantity='".mysqli_real_escape_string($conn4as,$_POST["quantity"])."',price='".mysqli_real_escape_string($conn4as,$_POST["price"])."',description='".mysqli_real_escape_string($conn4as,$_POST["description"])."',ingredients='".mysqli_real_escape_string($conn4as,$allchking)."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);

mysqli_query($conn4as,$sql);
echo 'NewResturantUpdated';
}
}


/*********** Manage Laundry ************/
if ($_POST["dwat"] == "addlaundry"){
if ($_POST["title"] == ''){echo 'Title is required';}
else if ($_POST["price"] == '' || validate($_POST["price"],"0-9")){echo 'Price is required. Numeric value only, no comma';}
else{

$sql = "INSERT INTO addlaundary(title,description,price) VALUES('".mysqli_real_escape_string($conn4as,$_POST["title"])."','".mysqli_real_escape_string($conn4as,$_POST["description"])."','".mysqli_real_escape_string($conn4as,$_POST["price"])."')";

mysqli_query($conn4as,$sql);
echo 'NewLaundryAdded';
}
}

if ($_POST["dwat"] == "editlaundary"){
if ($_POST["title"] == ''){echo 'Title is required';}
else if ($_POST["price"] == '' || validate($_POST["price"],"0-9")){echo 'Price is required. Numeric value only, no comma';}
else{

$sql = "UPDATE addlaundary SET issync = '2',title = '".mysqli_real_escape_string($conn4as,$_POST["title"])."',price='".mysqli_real_escape_string($conn4as,$_POST["price"])."',description='".mysqli_real_escape_string($conn4as,$_POST["description"])."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);

mysqli_query($conn4as,$sql);
echo 'NewLaundryUpdated';
}
}


/*********** Departments ************/
if ($_POST["dwat"] == "department"){
if ($_POST["department_name"] == ''){echo 'Name is required';}
else if ($_POST["department_budget"] == ''){echo 'Budget is required';}
else{

$sql = "INSERT INTO department(department_name,department_budget) VALUES('".mysqli_real_escape_string($conn4as,$_POST["department_name"])."','".mysqli_real_escape_string($conn4as,$_POST["department_budget"])."' )";

mysqli_query($conn4as,$sql);
echo 'NewDeparmentAdded';
}
}

if ($_POST["dwat"] == "editdept"){
if ($_POST["department_name"] == ''){echo 'Name is required';}
else if ($_POST["department_budget"] == ''){echo 'Budget is required';}
else{

$sql = "UPDATE department SET issync = '2',department_name = '".mysqli_real_escape_string($conn4as,$_POST["department_name"])."',department_budget='".mysqli_real_escape_string($conn4as,$_POST["department_budget"])."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);

mysqli_query($conn4as,$sql);
echo 'NewDepartmentUpdated';
}
}

/*********** Manage Users ************/
if ($_POST["dwat"] == "users"){
if ($_POST["username"] == ''){echo 'Username is required';}
else if ($_POST["lastname"] == ''){echo 'Lastname is required';}
else if ($_POST["firstname"] == ''){echo 'Firstname is required';}
else if ($_POST["password"] == ''){echo 'Password is required';}
else if ($_POST["usersrole"] == ''){echo 'User role is required';}
else{
$time = time();
$file1 = uploader("../archives/","file1",$time);

$psd = md5($_POST["password"]);
$sql = "INSERT INTO users(username,lastname,firstname,password,email,users_role,staff_salary,staff_hiring_date,photo) VALUES('".mysqli_real_escape_string($conn4as,$_POST["username"])."','".mysqli_real_escape_string($conn4as,$_POST["lastname"])."','".mysqli_real_escape_string($conn4as,$_POST["firstname"])."','".mysqli_real_escape_string($conn4as,$psd)."','".mysqli_real_escape_string($conn4as,$_POST["email"])."','".mysqli_real_escape_string($conn4as,$_POST["usersrole"])."','".mysqli_real_escape_string($conn4as,$_POST["salary"])."','".mysqli_real_escape_string($conn4as,$_POST["hiredate"])."','".mysqli_real_escape_string($conn4as,$file1)."')";

mysqli_query($conn4as,$sql);
echo 'UsersAdded';
}
}

if ($_POST["dwat"] == "editusers"){
if ($_POST["username"] == ''){echo 'Username is required';}
else if ($_POST["lastname"] == ''){echo 'Lastname is required';}
else if ($_POST["firstname"] == ''){echo 'Firstname is required';}
//else if ($_POST["password"] == ''){echo 'Password is required';}
else if ($_POST["usersrole"] == ''){echo 'User role is required';}
else{

$time = time();
$file1 = uploader("../archives/","file1",$time);

if ($file1 == ''){$file1 = $_POST[hidfile1];}else{
unlink("../archives/".$_POST[hidfile1]);
}
if ($_POST["password"] == ""){$pwd = $_POST["hidpwd"];}else{$pwd = md5($_POST["password"]);}

$sql = "UPDATE users SET issync = '2',username = '".mysqli_real_escape_string($conn4as,$_POST["username"])."',lastname='".mysqli_real_escape_string($conn4as,$_POST["lastname"])."',firstname='".mysqli_real_escape_string($conn4as,$_POST["firstname"])."',password='".mysqli_real_escape_string($conn4as,$pwd)."',email='".mysqli_real_escape_string($conn4as,$_POST["email"])."',users_role='".mysqli_real_escape_string($conn4as,$_POST["usersrole"])."',staff_salary='".mysqli_real_escape_string($conn4as,$_POST["salary"])."',staff_hiring_date='".mysqli_real_escape_string($conn4as,$_POST["hiredate"])."',photo='".mysqli_real_escape_string($conn4as,$file1)."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);

mysqli_query($conn4as,$sql);
echo 'Staff details updated';
}
}



if ($_POST["dwat"] == "editprofile"){
if ($_POST["username"] == ''){echo 'Username is required';}
else if ($_POST["lastname"] == ''){echo 'Lastname is required';}
else if ($_POST["firstname"] == ''){echo 'Firstname is required';}
//else if ($_POST["password"] == ''){echo 'Password is required';}
else{

$time = time();
$file1 = uploader("../archives/","file1",$time);

if ($file1 == ''){$file1 = $_POST[hidfile1];}else{
unlink("../archives/".$_POST[hidfile1]);
}

if ($_POST["password"] == ""){$pwd = $_POST["hidpwd"];}else{$pwd = md5($_POST["password"]);}

$sql = "UPDATE users SET issync = '2',username = '".mysqli_real_escape_string($conn4as,$_POST["username"])."',lastname='".mysqli_real_escape_string($conn4as,$_POST["lastname"])."',firstname='".mysqli_real_escape_string($conn4as,$_POST["firstname"])."',password='".mysqli_real_escape_string($conn4as,$pwd)."',email='".mysqli_real_escape_string($conn4as,$_POST["email"])."',photo='".mysqli_real_escape_string($conn4as,$file1)."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);

mysqli_query($conn4as,$sql);
echo 'Profile successfully updated';
}
}

$sql = select("SELECT email FROM users WHERE email = '".mysqli_real_escape_string($conn4as,$_POST["email"])."'");
if ($_POST["dwat"] == "addhotel"){
	if ($_POST["lastname"] == ''){
		echo 'Lastname is required';}
		elseif ($_POST["firstname"] == ''){
			echo 'Firstname is required';}
			elseif ($_POST["companyname"] == ''){
				echo 'Your Company Name is required';}
				elseif ($sql != 0){
					echo 'Email address existed! Try Another';}
				   elseif ($_POST["password"] == ''){
					   echo 'Password is required';}
					   elseif ($_POST["usersrole"] == ''){
						   echo 'User role is required';
						   }else{
		$time = time();

$psd = md5 ($_POST["password"]);
$sql = "INSERT INTO users(lastname,firstname,companyname,password,email,users_role) VALUES('".mysqli_real_escape_string($conn4as,$_POST["lastname"])."','".mysqli_real_escape_string($conn4as,$_POST["firstname"])."','".mysqli_real_escape_string($conn4as,$_POST["companyname"])."','".mysqli_real_escape_string($conn4as,$psd)."','".mysqli_real_escape_string($conn4as,$_POST["email"])."','".mysqli_real_escape_string($conn4as,$_POST["usersrole"])."')";

mysqli_query($conn4as,$sql);
echo 'HotelAddedSuccessfuly';
}
}
/////////////////////////////////////////////////
/********** Manage Bar 3 *****************/
if ($_POST["dwat"] == "addbar3"){
if ($_POST["name"] == ''){echo 'Item name is required';}
else if ($_POST["categoryid"] == ''){echo 'Item type is required';}
else if ($_POST["instock"] == '' || validate($_POST["instock"],"0-9")){echo 'Number of items in stock is required. Numeric value only, no comma';}
else if ($_POST["quantity"] == '' || validate($_POST["quantity"],"0-9")){echo 'Quantity is required. Numeric value only, no comma';}
else if ($_POST["price"] == '' || validate($_POST["price"],"0-9")){echo 'Selling Price is required. Numeric value only, no comma';}
else if ($_POST["costprice"] == '' || validate($_POST["price"],"0-9")){echo 'Cost Price is required. Numeric value only, no comma';}
else if ($_POST["costprice"] > $_POST["price"]){echo 'Cost Price must be less than selling price.';}
else{
$time = time();
$sql = "INSERT INTO addbar3(name,categoryid,instock,itemleft,measure,quantity,price,description,barcode,costprice,newstock,oldremstock,laststockadd,datelaststockadd) VALUES('".mysqli_real_escape_string($conn4as,$_POST["name"])."','".mysqli_real_escape_string($conn4as,$_POST["categoryid"])."','".mysqli_real_escape_string($conn4as,$_POST["instock"])."','".mysqli_real_escape_string($conn4as,$_POST["instock"])."','".mysqli_real_escape_string($conn4as,$_POST["measure"])."','".mysqli_real_escape_string($conn4as,$_POST["quantity"])."','".mysqli_real_escape_string($conn4as,$_POST["price"])."','".mysqli_real_escape_string($conn4as,$_POST["description"])."','".mysqli_real_escape_string($conn4as,$_POST["barcode"])."','".mysqli_real_escape_string($conn4as,$_POST["costprice"])."','".mysqli_real_escape_string($conn4as,$_POST["instock"])."','0','".mysqli_real_escape_string($conn4as,$_POST["instock"])."','".mysqli_real_escape_string($conn4as,$time)."')";
mysqli_query($conn4as,$sql);
$newitemid2 = mysqli_insert_id($conn4as);

//////// ADD TO RESTOCK TABLE .........................
//$time = time();
$regdate = date("Y-m-d");
$regtime = date("H:i:s");
$sql = "INSERT INTO tblrestock(itemid, itemtype, qty, itemleft, regdate, regstamp, staff, regtime, costprice, price, newstock) VALUES('".mysqli_real_escape_string($conn4as,$newitemid2)."','bar','".mysqli_real_escape_string($conn4as,$_POST["instock"])."','".mysqli_real_escape_string($conn4as,$_POST["instock"])."','".mysqli_real_escape_string($conn4as,$regdate)."','".mysqli_real_escape_string($conn4as,$time)."','".mysqli_real_escape_string($conn4as,$globalid)."','".mysqli_real_escape_string($conn4as,$regtime)."','".mysqli_real_escape_string($conn4as,$_POST["costprice"])."','".mysqli_real_escape_string($conn4as,$_POST["price"])."','".mysqli_real_escape_string($conn4as,$_POST["instock"])."')";

echo 'NewBarAdded';
}
}

if ($_POST["dwat"] == "editbar3"){
if ($_POST["name"] == ''){echo 'Title is required';}
else if ($_POST["categoryid"] == ''){echo 'Item type is required';}
else if ($_POST["quantity"] == '' || validate($_POST["quantity"],"0-9")){echo 'Quantity is required. Numeric value only, no comma';}
else if ($_POST["price"] == '' || validate($_POST["price"],"0-9")){echo 'Selling Price is required. Numeric value only, no comma';}
else if ($_POST["costprice"] == '' || validate($_POST["price"],"0-9")){echo 'Cost Price is required. Numeric value only, no comma';}
else if ($_POST["costprice"] > $_POST["price"]){echo 'Cost Price must be less than selling price.';}
else{
$sql = select("select itemleft,instock,newstock,laststockadd from addbar3 WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]));
$rs1 = mysqli_fetch_assoc($qry);
$rmleft = $rs1["itemleft"];
$instock = $rs1["instock"];
$newstock = $rs1["newstock"];
//$oldremstock = $rs1["oldremstock"];
$laststockadd = $rs1["laststockadd"];
//costprice..

if($_POST["deductqty"] > 0 && isNumeric($_POST["deductqty"]) && $_POST["deductqty"] <= $rmleft){
	$left = $rmleft - $_POST["deductqty"];
	$instock = $instock - $_POST["deductqty"];
	$newstock = ($_POST["deductqty"] <= $newstock)?$newstock - $_POST["deductqty"]:'0';
	$laststockadd = ($_POST["deductqty"] <= $laststockadd)?$laststockadd - $_POST["deductqty"]:'0';
}else{
	$left = $rmleft;
}

$sql = "UPDATE addbar3 SET issync = '2',name = '".mysqli_real_escape_string($conn4as,$_POST["name"])."',categoryid = '".mysqli_real_escape_string($conn4as,$_POST["categoryid"])."',instock = '".mysqli_real_escape_string($conn4as,$instock)."',itemleft = '".mysqli_real_escape_string($conn4as,$left)."', measure='".mysqli_real_escape_string($conn4as,$_POST["measure"])."',quantity='".mysqli_real_escape_string($conn4as,$_POST["quantity"])."',price='".mysqli_real_escape_string($conn4as,$_POST["price"])."',description='".mysqli_real_escape_string($conn4as,$_POST["description"])."',barcode='".mysqli_real_escape_string($conn4as,$_POST["barcode"])."',costprice='".mysqli_real_escape_string($conn4as,$_POST["costprice"])."',newstock='".mysqli_real_escape_string($conn4as,$newstock)."',laststockadd='".mysqli_real_escape_string($conn4as,$laststockadd)."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);
mysqli_query($conn4as,$sql);

EditReStockList('bar3',$_POST["hidid"],$_POST["deductqty"],$_POST["price"],$_POST["costprice"]);

echo 'NewBar3Updated';
}
}

if ($_POST["dwat"] == "restockbar3"){
if ($_POST["restock"] == '' || validate($_POST["restock"],"0-9")){echo 'Numeric value is required, no comma';}
elseif ($_POST["restock"] == 0){echo 'Nothing to add. Value must be more than zero.';}
else{

$sql = select("select name,instock,itemleft,price,costprice from addbar3 WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]));
$rs1 = mysqli_fetch_assoc($qry);
$itemleft = $rs1["itemleft"];
$itemleft1 = $rs1["itemleft"];
$instock = $rs1["instock"];
$name = $rs1["name"];
$price = $rs1["price"];
$costprice = $rs1["costprice"];

$itemleft = $itemleft + $_POST["restock"];
$instock = $instock + $_POST["restock"];
$oldremstock = $itemleft1;
$newstock = $itemleft;
$laststockadd = $_POST["restock"];
$datelaststockadd = time();

$sql = "UPDATE addbar3 SET issync = '2',  instock = '".mysqli_real_escape_string($conn4as,$instock)."',itemleft = '".mysqli_real_escape_string($conn4as,$itemleft)."',oldremstock = '".mysqli_real_escape_string($conn4as,$oldremstock)."',newstock = '".mysqli_real_escape_string($conn4as,$newstock)."',laststockadd = '".mysqli_real_escape_string($conn4as,$laststockadd)."',datelaststockadd = '".mysqli_real_escape_string($conn4as,$datelaststockadd)."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);
mysqli_query($conn4as,$sql);

Add2ReStockList('bar3',$_POST["hidid"],$_POST["restock"],$itemleft1,$newstock,$price,$costprice);
UpdateInstructions('bar3',$_POST["hidid"],$_POST["restock"]);

echo 'RestockBar3Updated';
$log = "[".date("y/m/d h:i:s A")."], <br>Bar 3 re-stocked, <br>BY STAFF: ".$_SESSION["amyn15"].", <br>ITEM NAME:".$_POST["hidname"].", <br>QUANTITY BEFORE RE-STOCK:".$itemleft1.", <br>QUANTITY ADDED:".$_POST["restock"]."\r\n=======================================\r\n"; 
WriteToFile("../logs/".$logfilename,$log);
//send email...
$params = "emsubject=Bar 3 (".$name.") re-stocked by ".$_SESSION["amyn15"];
$params .= "&msg=".$log;
sendAsyncURL($httppath."/fxn/sendmail/index.php", $params);

}
}

/////////////////////////////////////////////////
/********** Manage Bar 2 *****************/
if ($_POST["dwat"] == "addbar2"){
if ($_POST["name"] == ''){echo 'Item name is required';}
else if ($_POST["categoryid"] == ''){echo 'Item type is required';}
else if ($_POST["instock"] == '' || validate($_POST["instock"],"0-9")){echo 'Number of items in stock is required. Numeric value only, no comma';}
else if ($_POST["quantity"] == '' || validate($_POST["quantity"],"0-9")){echo 'Quantity is required. Numeric value only, no comma';}
else if ($_POST["price"] == '' || validate($_POST["price"],"0-9")){echo 'Selling Price is required. Numeric value only, no comma';}
else if ($_POST["costprice"] == '' || validate($_POST["price"],"0-9")){echo 'Cost Price is required. Numeric value only, no comma';}
else if ($_POST["costprice"] > $_POST["price"]){echo 'Cost Price must be less than selling price.';}
else{
$time = time();
$sql = "INSERT INTO addbar2(name,categoryid,instock,itemleft,measure,quantity,price,description,barcode,costprice,newstock,oldremstock,laststockadd,datelaststockadd) VALUES('".mysqli_real_escape_string($conn4as,$_POST["name"])."','".mysqli_real_escape_string($conn4as,$_POST["categoryid"])."','".mysqli_real_escape_string($conn4as,$_POST["instock"])."','".mysqli_real_escape_string($conn4as,$_POST["instock"])."','".mysqli_real_escape_string($conn4as,$_POST["measure"])."','".mysqli_real_escape_string($conn4as,$_POST["quantity"])."','".mysqli_real_escape_string($conn4as,$_POST["price"])."','".mysqli_real_escape_string($conn4as,$_POST["description"])."','".mysqli_real_escape_string($conn4as,$_POST["barcode"])."','".mysqli_real_escape_string($conn4as,$_POST["costprice"])."','".mysqli_real_escape_string($conn4as,$_POST["instock"])."','0','".mysqli_real_escape_string($conn4as,$_POST["instock"])."','".mysqli_real_escape_string($conn4as,$time)."')";
mysqli_query($conn4as,$sql);
$newitemid2 = mysqli_insert_id($conn4as);

//////// ADD TO RESTOCK TABLE .........................
//$time = time();
$regdate = date("Y-m-d");
$regtime = date("H:i:s");
$sql = "INSERT INTO tblrestock(itemid, itemtype, qty, itemleft, regdate, regstamp, staff, regtime, costprice, price, newstock) VALUES('".mysqli_real_escape_string($conn4as,$newitemid2)."','bar','".mysqli_real_escape_string($conn4as,$_POST["instock"])."','".mysqli_real_escape_string($conn4as,$_POST["instock"])."','".mysqli_real_escape_string($conn4as,$regdate)."','".mysqli_real_escape_string($conn4as,$time)."','".mysqli_real_escape_string($conn4as,$globalid)."','".mysqli_real_escape_string($conn4as,$regtime)."','".mysqli_real_escape_string($conn4as,$_POST["costprice"])."','".mysqli_real_escape_string($conn4as,$_POST["price"])."','".mysqli_real_escape_string($conn4as,$_POST["instock"])."')";

echo 'NewBarAdded';
}
}

if ($_POST["dwat"] == "editbar2"){
if ($_POST["name"] == ''){echo 'Title is required';}
else if ($_POST["categoryid"] == ''){echo 'Item type is required';}
else if ($_POST["quantity"] == '' || validate($_POST["quantity"],"0-9")){echo 'Quantity is required. Numeric value only, no comma';}
else if ($_POST["price"] == '' || validate($_POST["price"],"0-9")){echo 'Selling Price is required. Numeric value only, no comma';}
else if ($_POST["costprice"] == '' || validate($_POST["price"],"0-9")){echo 'Cost Price is required. Numeric value only, no comma';}
else if ($_POST["costprice"] > $_POST["price"]){echo 'Cost Price must be less than selling price.';}
else{
$sql = select("select itemleft,instock,newstock,laststockadd from addbar2 WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]));
$rs1 = mysqli_fetch_assoc($qry);
$rmleft = $rs1["itemleft"];
$instock = $rs1["instock"];
$newstock = $rs1["newstock"];
//$oldremstock = $rs1["oldremstock"];
$laststockadd = $rs1["laststockadd"];
//costprice..

if($_POST["deductqty"] > 0 && isNumeric($_POST["deductqty"]) && $_POST["deductqty"] <= $rmleft){
	$left = $rmleft - $_POST["deductqty"];
	$instock = $instock - $_POST["deductqty"];
	$newstock = ($_POST["deductqty"] <= $newstock)?$newstock - $_POST["deductqty"]:'0';
	$laststockadd = ($_POST["deductqty"] <= $laststockadd)?$laststockadd - $_POST["deductqty"]:'0';
}else{
	$left = $rmleft;
}

$sql = "UPDATE addbar2 SET issync = '2',name = '".mysqli_real_escape_string($conn4as,$_POST["name"])."',categoryid = '".mysqli_real_escape_string($conn4as,$_POST["categoryid"])."',instock = '".mysqli_real_escape_string($conn4as,$instock)."',itemleft = '".mysqli_real_escape_string($conn4as,$left)."', measure='".mysqli_real_escape_string($conn4as,$_POST["measure"])."',quantity='".mysqli_real_escape_string($conn4as,$_POST["quantity"])."',price='".mysqli_real_escape_string($conn4as,$_POST["price"])."',description='".mysqli_real_escape_string($conn4as,$_POST["description"])."',barcode='".mysqli_real_escape_string($conn4as,$_POST["barcode"])."',costprice='".mysqli_real_escape_string($conn4as,$_POST["costprice"])."',newstock='".mysqli_real_escape_string($conn4as,$newstock)."',laststockadd='".mysqli_real_escape_string($conn4as,$laststockadd)."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);
mysqli_query($conn4as,$sql);

EditReStockList('bar2',$_POST["hidid"],$_POST["deductqty"],$_POST["price"],$_POST["costprice"]);

echo 'NewBar2Updated';
}
}

if ($_POST["dwat"] == "restockbar2"){
if ($_POST["restock"] == '' || validate($_POST["restock"],"0-9")){echo 'Numeric value is required, no comma';}
elseif ($_POST["restock"] == 0){echo 'Nothing to add. Value must be more than zero.';}
else{

$sql = select("select name,instock,itemleft,price,costprice from addbar2 WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]));
$rs1 = mysqli_fetch_assoc($qry);
$itemleft = $rs1["itemleft"];
$itemleft1 = $rs1["itemleft"];
$instock = $rs1["instock"];
$name = $rs1["name"];
$price = $rs1["price"];
$costprice = $rs1["costprice"];

$itemleft = $itemleft + $_POST["restock"];
$instock = $instock + $_POST["restock"];
$oldremstock = $itemleft1;
$newstock = $itemleft;
$laststockadd = $_POST["restock"];
$datelaststockadd = time();

$sql = "UPDATE addbar2 SET issync = '2',  instock = '".mysqli_real_escape_string($conn4as,$instock)."',itemleft = '".mysqli_real_escape_string($conn4as,$itemleft)."',oldremstock = '".mysqli_real_escape_string($conn4as,$oldremstock)."',newstock = '".mysqli_real_escape_string($conn4as,$newstock)."',laststockadd = '".mysqli_real_escape_string($conn4as,$laststockadd)."',datelaststockadd = '".mysqli_real_escape_string($conn4as,$datelaststockadd)."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);
mysqli_query($conn4as,$sql);

Add2ReStockList('bar2',$_POST["hidid"],$_POST["restock"],$itemleft1,$newstock,$price,$costprice);
UpdateInstructions('bar2',$_POST["hidid"],$_POST["restock"]);

echo 'RestockBar2Updated';
$log = "[".date("y/m/d h:i:s A")."], <br>Bar 2 re-stocked, <br>BY STAFF: ".$_SESSION["amyn15"].", <br>ITEM NAME:".$_POST["hidname"].", <br>QUANTITY BEFORE RE-STOCK:".$itemleft1.", <br>QUANTITY ADDED:".$_POST["restock"]."\r\n=======================================\r\n"; 
WriteToFile("../logs/".$logfilename,$log);
//send email...
$params = "emsubject=Bar 2 (".$name.") re-stocked by ".$_SESSION["amyn15"];
$params .= "&msg=".$log;
sendAsyncURL($httppath."/fxn/sendmail/index.php", $params);

}
}



/*********** Manage Bar ************/
if ($_POST["dwat"] == "add2store"){
if ($_POST["name"] == '' && $_POST["itemnewname"] == ''){echo 'Item name is required';}
else if ($_POST["itemqty"] == '' || validate($_POST["itemqty"],"0-9")){echo 'Number of items to add is required. Numeric value only, no comma';}
//else if ($_POST["price"] == '' || validate($_POST["price"],"0-9")){echo 'Selling Price is required. Numeric value only, no comma';}
//else if ($_POST["costprice"] == '' || validate($_POST["price"],"0-9")){echo 'Cost Price is required. Numeric value only, no comma';}
//else if ($_POST["costprice"] > $_POST["price"]){echo 'Cost Price must be less than selling price.';}
else{

$time = time();
if($_POST["name"] != ''){
$itemname = strtoupper($_POST["name"]);
$isNewName = 0;
}else{
$itemname = strtoupper($_POST["itemnewname"]);
$isNewName = 1;
}

$qry = mysqli_query($conn4as,"SELECT id,name FROM tblstore WHERE name = '".strtoupper($itemname)."'");
$total = mysqli_num_rows($qry);

if($total > 0){
$rs1 = mysqli_fetch_assoc($qry);
echo 'Sorry item already exist. You can click <a href="#">here</a> to update the <a href="#">quantity/details</a> or add another new name.';
}else{

$sql = "INSERT INTO tblstore(name,categoryid,qtyinstore,measure,quantity,price,barcode,costprice,newstock,oldremstock,regdate,lastupdate) VALUES('".mysqli_real_escape_string($conn4as,$itemname)."','".mysqli_real_escape_string($conn4as,$_POST["categoryid"])."','".mysqli_real_escape_string($conn4as,$_POST["itemqty"])."','".mysqli_real_escape_string($conn4as,$_POST["measure"])."','".mysqli_real_escape_string($conn4as,$_POST["quantity"])."','".mysqli_real_escape_string($conn4as,$_POST["price"])."','".mysqli_real_escape_string($conn4as,$_POST["barcode"])."','".mysqli_real_escape_string($conn4as,$_POST["costprice"])."','".mysqli_real_escape_string($conn4as,$_POST["itemqty"])."','0','".mysqli_real_escape_string($conn4as,$time)."','".mysqli_real_escape_string($conn4as,$time)."')";
mysqli_query($conn4as,$sql);
$newitemid = mysqli_insert_id($conn4as);

//////// ADD TO RESTOCK TABLE .........................
$time = time();
$regdate = date("Y-m-d");
$regtime = date("H:i:s");
$sql = "INSERT INTO tblstorehistory(itemid, itemtype, qty, itemleft, regdate, regstamp, staff, regtime, costprice, price, newstockadded,status) VALUES('".mysqli_real_escape_string($conn4as,$newitemid)."','store','".mysqli_real_escape_string($conn4as,$_POST["itemqty"])."','0','".mysqli_real_escape_string($conn4as,$regdate)."','".mysqli_real_escape_string($conn4as,$time)."','".mysqli_real_escape_string($conn4as,$globalid)."','".mysqli_real_escape_string($conn4as,$regtime)."','".mysqli_real_escape_string($conn4as,$_POST["costprice"])."','".mysqli_real_escape_string($conn4as,$_POST["price"])."','".mysqli_real_escape_string($conn4as,$_POST["itemqty"])."','r')";
mysqli_query($conn4as,$sql);

//////IF $isNewName == 1 (new name).....send it to bars....coming soon 
echo 'NewStoreAdded';
}
}
}


/***************** Edit Store Item ****************************/
if ($_POST["dwat"] == "edit2store"){
if ($_POST["name"] == '' && $_POST["itemnewname"] == ''){echo 'Item name is required';}
else if ($_POST["itemqty"] == '' || validate($_POST["itemqty"],"0-9")){echo 'Number of items to add is required. Numeric value only, no comma';}
//else if ($_POST["price"] == '' || validate($_POST["price"],"0-9")){echo 'Selling Price is required. Numeric value only, no comma';}
//else if ($_POST["costprice"] == '' || validate($_POST["price"],"0-9")){echo 'Cost Price is required. Numeric value only, no comma';}
//else if ($_POST["costprice"] > $_POST["price"]){echo 'Cost Price must be less than selling price.';}
else{

$sql = select("select qtyinstore,newstock,oldremstock from tblstore WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]));
$rs1 = mysqli_fetch_assoc($qry);
$rmleft = $rs1["qtyinstore"];
$qtyinstore = $rs1["qtyinstore"];
$newstock = $rs1["newstock"];
$oldremstock = $rs1["oldremstock"];
//costprice..

$itemaqty = ($_POST["itemaqty"] == '' || $_POST["itemaqty"] < 0)?'0':$_POST["itemaqty"];
$itemdqty = ($_POST["itemdqty"] == '')?'0':$_POST["itemdqty"];
$addleft = $_POST["hidqty"] + $_POST["itemaqty"];
$delleft = $_POST["hidqty"] - $_POST["itemdqty"];

if($_POST["hidqty"] > $delleft){ //REMOVED...$_POST["hidqty"] > $_POST["itemqty"]
	$changeinqty = $_POST["itemdqty"]; //$_POST["hidqty"] - $_POST["itemqty"];
	$left = $delleft; //$_POST["itemqty"];
	$status = 'deduct';
	if($changeinqty > $newstock){ $newstock = 0; }else{ $newstock -= $changeinqty; }
	if($changeinqty > $oldremstock){ $oldremstock = 0; }else{ $oldremstock -= $changeinqty; }
	
	EditStoreHistory('store',$_POST["hidid"],$changeinqty,$_POST["price"],$_POST["costprice"],'edit'); //remove
	
}elseif($_POST["hidqty"] < $addleft){ //ADDED.....$_POST["itemqty"]
	$changeinqty = $_POST["itemaqty"]; //$_POST["itemqty"] - $_POST["hidqty"];
	$left = $addleft;  //$_POST["itemqty"]
	$status = 'addup';
	$newstock = $changeinqty;
	$oldremstock = $_POST["hidqty"];
	//add 2 history...
	EditStoreHistory('store',$_POST["hidid"],$changeinqty,$_POST["price"],$_POST["costprice"],'add');
}else{ //No change in qty...
	$changeinqty = 0;  //$_POST["itemqty"] - $_POST["hidqty"]
	$newstock = $changeinqty;
	$left = $_POST["itemqty"];
	$oldremstock = $_POST["hidqty"];
}

$sql = "UPDATE tblstore SET issync = '2',  name = '".mysqli_real_escape_string($conn4as,$_POST["name"])."',categoryid = '".mysqli_real_escape_string($conn4as,$_POST["categoryid"])."',qtyinstore = '".mysqli_real_escape_string($conn4as,$left)."',measure='".mysqli_real_escape_string($conn4as,$_POST["measure"])."',quantity='".mysqli_real_escape_string($conn4as,$_POST["quantity"])."',price='".mysqli_real_escape_string($conn4as,$_POST["price"])."',barcode='".mysqli_real_escape_string($conn4as,$_POST["barcode"])."',costprice='".mysqli_real_escape_string($conn4as,$_POST["costprice"])."',newstock='".mysqli_real_escape_string($conn4as,$newstock)."',oldremstock='".mysqli_real_escape_string($conn4as,$oldremstock)."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);
mysqli_query($conn4as,$sql);

echo 'NewStoreUpdated';
}
}


/*********** Manage Bar ************/
if ($_POST["dwat"] == "addbar"){
if ($_POST["name"] == ''){echo 'Item name is required';}
else if ($_POST["categoryid"] == ''){echo 'Item type is required';}
else if ($_POST["instock"] == '' || validate($_POST["instock"],"0-9")){echo 'Number of items in stock is required. Numeric value only, no comma';}
else if ($_POST["quantity"] == '' || validate($_POST["quantity"],"0-9")){echo 'Quantity is required. Numeric value only, no comma';}
else if ($_POST["price"] == '' || validate($_POST["price"],"0-9")){echo 'Selling Price is required. Numeric value only, no comma';}
else if ($_POST["costprice"] == '' || validate($_POST["price"],"0-9")){echo 'Cost Price is required. Numeric value only, no comma';}
else if ($_POST["costprice"] > $_POST["price"]){echo 'Cost Price must be less than selling price.';}
else{
$time = time();
$sql = "INSERT INTO addbar(name,categoryid,instock,itemleft,measure,quantity,price,description,barcode,costprice,newstock,oldremstock,laststockadd,datelaststockadd) VALUES('".mysqli_real_escape_string($conn4as,$_POST["name"])."','".mysqli_real_escape_string($conn4as,$_POST["categoryid"])."','".mysqli_real_escape_string($conn4as,$_POST["instock"])."','".mysqli_real_escape_string($conn4as,$_POST["instock"])."','".mysqli_real_escape_string($conn4as,$_POST["measure"])."','".mysqli_real_escape_string($conn4as,$_POST["quantity"])."','".mysqli_real_escape_string($conn4as,$_POST["price"])."','".mysqli_real_escape_string($conn4as,$_POST["description"])."','".mysqli_real_escape_string($conn4as,$_POST["barcode"])."','".mysqli_real_escape_string($conn4as,$_POST["costprice"])."','".mysqli_real_escape_string($conn4as,$_POST["instock"])."','0','".mysqli_real_escape_string($conn4as,$_POST["instock"])."','".mysqli_real_escape_string($conn4as,$time)."')";
mysqli_query($conn4as,$sql);
$newitemid = mysqli_insert_id($conn4as);

//////// ADD TO RESTOCK TABLE .........................
//$time = time();
$regdate = date("Y-m-d");
$regtime = date("H:i:s");
$sql = "INSERT INTO tblrestock(itemid, itemtype, qty, itemleft, regdate, regstamp, staff, regtime, costprice, price, newstock) VALUES('".mysqli_real_escape_string($conn4as,$newitemid)."','bar','".mysqli_real_escape_string($conn4as,$_POST["instock"])."','".mysqli_real_escape_string($conn4as,$_POST["instock"])."','".mysqli_real_escape_string($conn4as,$regdate)."','".mysqli_real_escape_string($conn4as,$time)."','".mysqli_real_escape_string($conn4as,$globalid)."','".mysqli_real_escape_string($conn4as,$regtime)."','".mysqli_real_escape_string($conn4as,$_POST["costprice"])."','".mysqli_real_escape_string($conn4as,$_POST["price"])."','".mysqli_real_escape_string($conn4as,$_POST["instock"])."')";

mysqli_query($conn4as,$sql);
echo 'NewBarAdded';
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

$sql = select("select itemleft,instock,newstock,laststockadd from addbar WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]));
$rs1 = mysqli_fetch_assoc($qry);
$rmleft = $rs1["itemleft"];
$instock = $rs1["instock"];
$newstock = $rs1["newstock"];
//$oldremstock = $rs1["oldremstock"];
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

$sql = "UPDATE addbar SET issync = '2',  name = '".mysqli_real_escape_string($conn4as,$_POST["name"])."',categoryid = '".mysqli_real_escape_string($conn4as,$_POST["categoryid"])."',instock = '".mysqli_real_escape_string($conn4as,$instock)."',itemleft = '".mysqli_real_escape_string($conn4as,$left)."', measure='".mysqli_real_escape_string($conn4as,$_POST["measure"])."',quantity='".mysqli_real_escape_string($conn4as,$_POST["quantity"])."',price='".mysqli_real_escape_string($conn4as,$_POST["price"])."',description='".mysqli_real_escape_string($conn4as,$_POST["description"])."',barcode='".mysqli_real_escape_string($conn4as,$_POST["barcode"])."',costprice='".mysqli_real_escape_string($conn4as,$_POST["costprice"])."',newstock='".mysqli_real_escape_string($conn4as,$newstock)."',laststockadd='".mysqli_real_escape_string($conn4as,$laststockadd)."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);
mysqli_query($conn4as,$sql);

EditReStockList('bar',$_POST["hidid"],$_POST["deductqty"],$_POST["price"],$_POST["costprice"]);

echo 'NewBarUpdated';
}
}


if ($_POST["dwat"] == "restockbar"){
if ($_POST["restock"] == '' || validate($_POST["restock"],"0-9")){echo 'Numeric value is required, no comma';}
elseif ($_POST["restock"] == 0){echo 'Nothing to add. Value must be more than zero.';}
else{

$sql = select("select name,instock,itemleft,price,costprice from addbar WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]));
$rs1 = mysqli_fetch_assoc($qry);
$itemleft = $rs1["itemleft"];
$itemleft1 = $rs1["itemleft"];
$instock = $rs1["instock"];
$name = $rs1["name"];
$price = $rs1["price"];
$costprice = $rs1["costprice"];

$itemleft = $itemleft + $_POST["restock"];
$instock = $instock + $_POST["restock"];
$oldremstock = $itemleft1;
$newstock = $itemleft;
$laststockadd = $_POST["restock"];
$datelaststockadd = time();

$sql = "UPDATE addbar SET issync = '2',  instock = '".mysqli_real_escape_string($conn4as,$instock)."',itemleft = '".mysqli_real_escape_string($conn4as,$itemleft)."',oldremstock = '".mysqli_real_escape_string($conn4as,$oldremstock)."',newstock = '".mysqli_real_escape_string($conn4as,$newstock)."',laststockadd = '".mysqli_real_escape_string($conn4as,$laststockadd)."',datelaststockadd = '".mysqli_real_escape_string($conn4as,$datelaststockadd)."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);
mysqli_query($conn4as,$sql);

Add2ReStockList('bar',$_POST["hidid"],$_POST["restock"],$itemleft1,$newstock,$price,$costprice);
UpdateInstructions('bar',$_POST["hidid"],$_POST["restock"]);

echo 'RestockBarUpdated';
$log = "[".date("y/m/d h:i:s A")."], <br>Bar item re-stocked, <br>BY STAFF: ".$_SESSION["amyn15"].", <br>ITEM NAME:".$_POST["hidname"].", <br>QUANTITY BEFORE RE-STOCK:".$itemleft1.", <br>QUANTITY ADDED:".$_POST["restock"]."\r\n=======================================\r\n"; 
WriteToFile("../logs/".$logfilename,$log);
//send email...
$params = "emsubject=Bar Items (".$name.") re-stocked by ".$_SESSION["amyn15"];
$params .= "&msg=".$log;
sendAsyncURL($httppath."/fxn/sendmail/index.php", $params);

}
}


/*********** Manage Sport ************/
if ($_POST["dwat"] == "addsport"){
if ($_POST["name"] == ''){echo 'Item Name is required';}
else if ($_POST["quantity"] == '' || validate($_POST["quantity"],"0-9")){echo 'Quantity is required. Numeric value only, no comma';}
else if ($_POST["price"] == '' || validate($_POST["price"],"0-9")){echo 'Price is required. Numeric value only, no comma';}
else{

$sql = "INSERT INTO addsport(name,status,quantity,price,description) VALUES('".mysqli_real_escape_string($conn4as,$_POST["name"])."','".mysqli_real_escape_string($conn4as,$_POST["measure"])."','".mysqli_real_escape_string($conn4as,$_POST["quantity"])."','".mysqli_real_escape_string($conn4as,$_POST["price"])."','".mysqli_real_escape_string($conn4as,$_POST["description"])."')";

mysqli_query($conn4as,$sql);
echo 'NewSportAdded';

$log = "[".date("y/m/d h:i:s A")."], <br>Sport item added, <br>BY STAFF: ".$_SESSION["amyn15"]." (ID: ".$_SESSION["amyi15"]."), <br>ITEM NAME:".$_POST["name"].", <br>QUANTITY:".$_POST["quantity"].", <br>UNIT PRICE:".$_POST["price"]."\r\n=======================================\r\n"; 
WriteToFile("../logs/".$logfilename,$log);

}
}

if ($_POST["dwat"] == "editsport"){
if ($_POST["name"] == ''){echo 'Item Name is required';}
else if ($_POST["quantity"] == '' || validate($_POST["quantity"],"0-9")){echo 'Quantity is required. Numeric value only, no comma';}
else if ($_POST["price"] == '' || validate($_POST["price"],"0-9")){echo 'Price is required. Numeric value only, no comma';}
else{

$sql = "UPDATE addsport SET issync = '2',  name = '".mysqli_real_escape_string($conn4as,$_POST["name"])."',status='".mysqli_real_escape_string($conn4as,$_POST["measure"])."',quantity='".mysqli_real_escape_string($conn4as,$_POST["quantity"])."',price='".mysqli_real_escape_string($conn4as,$_POST["price"])."',description='".mysqli_real_escape_string($conn4as,$_POST["description"])."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);

mysqli_query($conn4as,$sql);
echo 'NewSportUpdated';
}
}

/*********** Manage Swiiming pool ************/
if ($_POST["dwat"] == "addswimpool"){
if ($_POST["name"] == ''){echo 'Swimming pool name/number is required';}
else if ($_POST["price"] == '' || validate($_POST["price"],"0-9")){echo 'Price is required. Numeric value only, no comma';}
else{

$sql = "INSERT INTO addswimpool(name,measure,duration,price,description) VALUES('".mysqli_real_escape_string($conn4as,$_POST["name"])."','".mysqli_real_escape_string($conn4as,$_POST["measure"])."','".mysqli_real_escape_string($conn4as,$_POST["duration"])."','".mysqli_real_escape_string($conn4as,$_POST["price"])."','".mysqli_real_escape_string($conn4as,$_POST["description"])."')";

mysqli_query($conn4as,$sql);
echo 'NewSwimpoolAdded';
}
}

if ($_POST["dwat"] == "editswimpool"){
if ($_POST["name"] == ''){echo 'Swimming pool name/number is required';}
else if ($_POST["price"] == '' || validate($_POST["price"],"0-9")){echo 'Price is required. Numeric value only, no comma';}
else{

$sql = "UPDATE addswimpool SET issync = '2',  name = '".mysqli_real_escape_string($conn4as,$_POST["name"])."',measure='".mysqli_real_escape_string($conn4as,$_POST["measure"])."',duration='".mysqli_real_escape_string($conn4as,$_POST["duration"])."',price='".mysqli_real_escape_string($conn4as,$_POST["price"])."',description='".mysqli_real_escape_string($conn4as,$_POST["description"])."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);

mysqli_query($conn4as,$sql);
echo 'NewSwimpoolUpdated';
}
}


/*********** Manage Spa ************/
if ($_POST["dwat"] == "addspa"){
if ($_POST["name"] == ''){echo 'Item Name is required';}
else if ($_POST["price"] == '' || validate($_POST["price"],"0-9")){echo 'Price is required. Numeric value only, no comma';}
else{

$sql = "INSERT INTO addspa(name,measure,duration,price,description) VALUES('".mysqli_real_escape_string($conn4as,$_POST["name"])."','".mysqli_real_escape_string($conn4as,$_POST["measure"])."','".mysqli_real_escape_string($conn4as,$_POST["duration"])."','".mysqli_real_escape_string($conn4as,$_POST["price"])."','".mysqli_real_escape_string($conn4as,$_POST["description"])."')";

mysqli_query($conn4as,$sql);
echo 'NewSpaAdded';
}
}

if ($_POST["dwat"] == "editspa"){
if ($_POST["name"] == ''){echo 'Item Name is required';}
else if ($_POST["price"] == '' || validate($_POST["price"],"0-9")){echo 'Price is required. Numeric value only, no comma';}
else{

$sql = "UPDATE addspa SET issync = '2',  name = '".mysqli_real_escape_string($conn4as,$_POST["name"])."',measure='".mysqli_real_escape_string($conn4as,$_POST["measure"])."',duration='".mysqli_real_escape_string($conn4as,$_POST["duration"])."',price='".mysqli_real_escape_string($conn4as,$_POST["price"])."',description='".mysqli_real_escape_string($conn4as,$_POST["description"])."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);

mysqli_query($conn4as,$sql);
echo 'NewSpaUpdated';
}
}

/*********** Settings ************/
if ($_POST["dwat"] == "settings"){
if ($_POST["hotel_name"] == ''){echo 'Hotel Name is required';}
else{
$sql = select("SELECT id FROM settings ORDER BY id");
$time = time();
if($_POST["showguestcatlist"] == '1'){ $showguestcatlist = 1; }else{ $showguestcatlist = 0;}
if($sql){
$file1 = uploader("../archives/","file1",$time);
$file2 = uploader("../archives/","file2",$time);

if ($file1 != ''){ unlink("../archives/".$_POST[hidfile1]); }else{$file1 = $_POST[hidfile1];}
if ($file2 != ''){unlink("../archives/".$_POST[hidfile2]); }else{$file2 = $_POST[hidfile2];}

$sql = "UPDATE settings SET issync = '2',  hotelid = '".mysqli_real_escape_string($conn4as,$_POST["hotelid"])."',bookingsite = '".mysqli_real_escape_string($conn4as,$_POST["bookingsite"])."',hotelname = '".mysqli_real_escape_string($conn4as,$_POST["hotel_name"])."',address = '".mysqli_real_escape_string($conn4as,$_POST["address"])."',phone='".mysqli_real_escape_string($conn4as,$_POST["phone"])."',email='".mysqli_real_escape_string($conn4as,$_POST["email"])."',website='".mysqli_real_escape_string($conn4as,$_POST["website"])."',state='".mysqli_real_escape_string($conn4as,$_POST["state"])."',country='".mysqli_real_escape_string($conn4as,$_POST["country"])."',promodiscount='".mysqli_real_escape_string($conn4as,$_POST["book_promo_discount"])."',minnoofroom='".mysqli_real_escape_string($conn4as,$_POST["min_no_room"])."',vat='".mysqli_real_escape_string($conn4as,$_POST["vat"])."',facebook='".mysqli_real_escape_string($conn4as,$_POST["facebook_links"])."',twitter='".mysqli_real_escape_string($conn4as,$_POST["twitter_links"])."',youtube='".mysqli_real_escape_string($conn4as,$_POST["youtube_links"])."',googlemap='".mysqli_real_escape_string($conn4as,$_POST["google_map"])."',logo='".mysqli_real_escape_string($conn4as,$file1)."',loginbgpic='".mysqli_real_escape_string($conn4as,$file2)."',baritemlimit='".mysqli_real_escape_string($conn4as,$_POST["baritemlimit"])."',servicecharge='".mysqli_real_escape_string($conn4as,$_POST["servicecharge"])."',showguestcatlist = '".mysqli_real_escape_string($conn4as,$showguestcatlist)."'  WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);
mysqli_query($conn4as,$sql);

}else{
$file1 = uploader("../archives/","file1",$time);
$file2 = uploader("../archives/","file2",$time);

$sql = "INSERT INTO settings(hotelid,bookingsite,hotelname,address,phone,email,website,state,country,promodiscount,minnoofroom,vat,facebook,twitter,youtube,googlemap,logo,loginbgpic,baritemlimit,servicecharge,showguestcatlist) VALUES('".mysqli_real_escape_string($conn4as,$_POST["hotelid"])."','".mysqli_real_escape_string($conn4as,$_POST["bookingsite"])."','".mysqli_real_escape_string($conn4as,$_POST["hotel_name"])."','".mysqli_real_escape_string($conn4as,$_POST["address"])."','".mysqli_real_escape_string($conn4as,$_POST["phone"])."','".mysqli_real_escape_string($conn4as,$_POST["email"])."','".mysqli_real_escape_string($conn4as,$_POST["website"])."','".mysqli_real_escape_string($conn4as,$_POST["state"])."','".mysqli_real_escape_string($conn4as,$_POST["country"])."','".mysqli_real_escape_string($conn4as,$_POST["book_promo_discount"])."','".mysqli_real_escape_string($conn4as,$_POST["min_no_room"])."','".mysqli_real_escape_string($conn4as,$_POST["vat"])."','".mysqli_real_escape_string($conn4as,$_POST["facebook_links"])."','".mysqli_real_escape_string($conn4as,$_POST["twitter_links"])."','".mysqli_real_escape_string($conn4as,$_POST["youtube_links"])."','".mysqli_real_escape_string($conn4as,$_POST["google_map"])."','".mysqli_real_escape_string($conn4as,$file1)."','".mysqli_real_escape_string($conn4as,$file2)."','".mysqli_real_escape_string($conn4as,$_POST["baritemlimit"])."','".mysqli_real_escape_string($conn4as,$_POST["servicecharge"])."','".mysqli_real_escape_string($conn4as,$showguestcatlist)."')";
mysqli_query($conn4as,$sql);
}
$_SESSION["hotelid"] = $_POST["hotelid"];
$_SESSION["bookingsite"] = $_POST["bookingsite"];

echo 'SavedSuccessfully';
}
}

/***********Room Amount************/
if ($_POST["dwat"] == "RoomDetails"){
$sql = select("select roomrate,roomQuantity,roomleft from addroom where id = ".mysqli_real_escape_string($conn4as,$_POST["roomid"]));
if ($sql){
$rs = mysqli_fetch_assoc($qry);
echo 'RoomDetails<->'.$rs["roomrate"].'<->'.$rs["roomQuantity"].'<->'.$rs["roomleft"];
}else{
echo 'RoomDetails<->0<->0<->0';
}
}

if ($_POST["dwat"] == "RoomDetails2"){
$sql = select("select roomrate,roomQuantity,roomleft from addroom where id = ".mysqli_real_escape_string($conn4as,$_POST["roomid"]));
if ($sql){
$rs = mysqli_fetch_assoc($qry);
echo 'RoomDetails<->'.$rs["roomrate"].'<->'.$rs["roomQuantity"].'<->1';
}else{
echo 'RoomDetails<->0<->0<->0';
}
}

if ($_POST["dwat"] == "BarDetails"){
$sql = select("select price,instock,itemleft from addbar where id = ".mysqli_real_escape_string($conn4as,$_POST["itemid"]));
if ($sql){
$rs = mysqli_fetch_assoc($qry);
echo 'BarDetails<->'.$rs["price"].'<->'.$rs["instock"].'<->'.$rs["itemleft"];
}else{
echo 'BarDetails<->0<->0<->0';
}
}

if ($_POST["dwat"] == "resDetails"){
$sql = select("select price,quantity,measure from addresturant where id = ".mysqli_real_escape_string($conn4as,$_POST["itemid"]));
if ($sql){
$rs = mysqli_fetch_assoc($qry);
echo 'resDetails<->'.$rs["price"].'<->'.$rs["quantity"].'<->'.$rs["measure"];
}else{
echo 'resDetails<->0<->0<->.';
}
}

if ($_POST["dwat"] == "lauDetails"){
$sql = select("select price from addlaundary where id = ".mysqli_real_escape_string($conn4as,$_POST["itemid"]));
if ($sql){
$rs = mysqli_fetch_assoc($qry);
echo 'lauDetails<->'.$rs["price"];
}else{
echo 'lauDetails<->0<->0<->0';
}
}

if ($_POST["dwat"] == "spaDetails"){
$sql = select("select price from addspa where id = ".mysqli_real_escape_string($conn4as,$_POST["itemid"]));
if ($sql){
$rs = mysqli_fetch_assoc($qry);
echo 'spaDetails<->'.$rs["price"];
}else{
echo 'spaDetails<->0';
}
}

if ($_POST["dwat"] == "swimpoolDetails"){
$sql = select("select price,measure from addswimpool where id = ".mysqli_real_escape_string($conn4as,$_POST["itemid"]));
if ($sql){
$rs = mysqli_fetch_assoc($qry);
echo 'swimpoolDetails<->'.$rs["price"].'<->'.$rs["measure"];
}else{
echo 'swimpoolDetails<->0';
}
}

if ($_POST["dwat"] == "spoDetails"){
$sql = select("select price from addsport where id = ".mysqli_real_escape_string($conn4as,$_POST["itemid"]));
if ($sql){
$rs = mysqli_fetch_assoc($qry);
echo 'spoDetails<->'.$rs["price"];
}else{
echo 'spoDetails<->0';
}
}

// order multiple restaurant
if ($_POST["dwat"] == "ordermres"){
if ($_POST["resorderdate"] == ""){
		echo "order date is required";
}else{
		
		 $time = date("y/m/d");
		 $ordertime = date("H:i");
		 
		 $log = "<br><br>[".date("y/m/d h:i:s A")."], <br>New Order Added, <br>BY STAFF: ".$_SESSION["amyn15"]."(".$_SESSION["amyi15"]."), <br>INVOICE ID: ".$_POST["invoiceid"]; 
		 
		//insert bar
		$bdc = $_POST["resdiscount"];
		$bdate = $_POST["resorderdate"];
		$ctn = count($_POST["rescheck"]);
		$grandtotal = $_POST["grandtotal"];
		
		for($i = 0; $i < $ctn; ++$i){
			$bc = $_POST["rescheck"][$i];
			
			if ($bc != ''){
			
			$bp = $_POST["resprice".$bc];
			$bq = $_POST["resquantity".$bc];
			$bt = $_POST["restotal".$bc];
			
			if($sqladd == ''){
			$sqladd = "INSERT INTO order_restaurant(invoiceid, guestid, itemid, qty, discount, unitprice, total, orderdate, ordertime, ispaid,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$bc)."','".mysqli_real_escape_string($conn4as,$bq)."','".mysqli_real_escape_string($conn4as,$bdc)."','".mysqli_real_escape_string($conn4as,$bp)."','".mysqli_real_escape_string($conn4as,$bt)."','".mysqli_real_escape_string($conn4as,$bdate)."','".mysqli_real_escape_string($conn4as,$ordertime)."','0','".mysqli_real_escape_string($conn4as,$globalid)."')";
			}else{
			$sqladd .= ", ('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$bc)."','".mysqli_real_escape_string($conn4as,$bq)."','".mysqli_real_escape_string($conn4as,$bdc)."','".mysqli_real_escape_string($conn4as,$bp)."','".mysqli_real_escape_string($conn4as,$bt)."','".mysqli_real_escape_string($conn4as,$bdate)."','".mysqli_real_escape_string($conn4as,$ordertime)."','0','".mysqli_real_escape_string($conn4as,$globalid)."')";
			}
			$b = '1'; $nooforderadded += 1;
			//mysqli_query($conn4as,"UPDATE addresturant SET itemleft = itemleft - ".mysqli_real_escape_string($conn4as,$bq)." WHERE id = ".mysqli_real_escape_string($conn4as,$bc));
			}
		} //foreach
		
		//insert to orders table
		if ($nooforderadded < 1){
			echo 'No item ordered.';
		}else{
		$sqladd .= ';';
		mysqli_query($conn4as,$sqladd);
		//mysqli_query($conn4as,$sqlupdates);
		$sql = "INSERT INTO orders(invoiceid, guestid, isroom, isbar, isbar2, issport, isspa, islaundary, isrestaurant, orderdate, ordertime, total,ispaid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','0','0','0','0','0','0','".mysqli_real_escape_string($conn4as,$b)."','".mysqli_real_escape_string($conn4as,$time)."','".mysqli_real_escape_string($conn4as,$ordertime)."','".mysqli_real_escape_string($conn4as,$grandtotal)."','0')";
		mysqli_query($conn4as,$sql);
		echo 'OSA<->'.$_POST["clientid"];
		
		 //save log....
		WriteToFile("../logs/".$logfilename,$log."\r\n=======================================\r\n");
		$params = "emsubject=New order made. Invoice ID: ".$_POST["invoiceid"];
		$params .= "&msg=".$log;
		sendAsyncURL($httppath."/fxn/sendmail/index.php", $params);
		}
		
	}
}

// order multiple bar
if ($_POST["dwat"] == "ordermbar"){
if ($_POST["barorderdate"] == ""){
		echo "order date is required";
}else{
		
		 $time = date("Y-m-d");
		 $ordertime = date("H:i");
		 
		 $log = "<br><br>[".date("Y-m-d h:i:s A")."], <br>New Order Added, <br>BY STAFF: ".$_SESSION["amyn15"]."(".$_SESSION["amyi15"]."), <br>INVOICE ID: ".$_POST["invoiceid"]; 
		 
		//insert bar
		$bdc = $_POST["bardiscount"];
		$bdate = $_POST["barorderdate"];
		$ctn = count($_POST["barcheck"]);
		$grandtotal = $_POST["grandtotal"];
		
		for($i = 0; $i < $ctn; ++$i){
			$bc = $_POST["barcheck"][$i];
			
			if ($bc != ''){
			
			$bp = $_POST["barprice".$bc];
			$bq = $_POST["barquantity".$bc];
			$bt = $_POST["bartotal".$bc];
			
			if($sqladd == ''){
			$sqladd = "INSERT INTO order_bar(invoiceid, guestid, itemid, qty, discount, unitprice, total, orderdate,ordertime, ispaid,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$bc)."','".mysqli_real_escape_string($conn4as,$bq)."','".mysqli_real_escape_string($conn4as,$bdc)."','".mysqli_real_escape_string($conn4as,$bp)."','".mysqli_real_escape_string($conn4as,$bt)."','".mysqli_real_escape_string($conn4as,$bdate)."','".mysqli_real_escape_string($conn4as,$ordertime)."','0','".mysqli_real_escape_string($conn4as,$globalid)."')";
			}else{
			$sqladd .= ", ('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$bc)."','".mysqli_real_escape_string($conn4as,$bq)."','".mysqli_real_escape_string($conn4as,$bdc)."','".mysqli_real_escape_string($conn4as,$bp)."','".mysqli_real_escape_string($conn4as,$bt)."','".mysqli_real_escape_string($conn4as,$bdate)."','".mysqli_real_escape_string($conn4as,$ordertime)."','0','".mysqli_real_escape_string($conn4as,$globalid)."')";
			}
			$b = '1'; $nooforderadded += 1;
			//$sqlupdates .= "UPDATE addbar SET issync = '2',  itemleft = itemleft - ".mysqli_real_escape_string($conn4as,$bq)." WHERE id = ".mysqli_real_escape_string($conn4as,$bc).";";
			mysqli_query($conn4as,"UPDATE addbar SET issync = '2',  itemleft = itemleft - ".mysqli_real_escape_string($conn4as,$bq)." WHERE id = ".mysqli_real_escape_string($conn4as,$bc));
			}
		} //foreach
		
		//insert to orders table
		if ($nooforderadded < 1){
			echo 'No item ordered.';
		}else{
		$sqladd .= ';';
		mysqli_query($conn4as,$sqladd);
		//mysqli_query($conn4as,$sqlupdates);
		$sql = "INSERT INTO orders(invoiceid, guestid, isroom, isbar, isbar2, issport, isspa, islaundary, isrestaurant, orderdate, ordertime, total,ispaid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','0','".mysqli_real_escape_string($conn4as,$b)."','0','0','0','0','0','".mysqli_real_escape_string($conn4as,$time)."','".mysqli_real_escape_string($conn4as,$ordertime)."','".mysqli_real_escape_string($conn4as,$grandtotal)."','0')";
		mysqli_query($conn4as,$sql);
		echo 'OSA<->'.$_POST["clientid"];
		//echo $sqladd."<br>".$sqlupdates;
		//echo "<br>".$sql."<br>".$nooforderadded; 
		 //save log....
		WriteToFile("../logs/".$logfilename,$log."\r\n=======================================\r\n");
		$params = "emsubject=New order made. Invoice ID: ".$_POST["invoiceid"];
		$params .= "&msg=".$log;
		sendAsyncURL($httppath."/fxn/sendmail/index.php", $params);
		}
		
	}
}

////// START BAR 2 MULTIPLE ORDER ///////////////////////////////////////////////
if ($_POST["dwat"] == "ordermbar2code"){
if($_POST["clientid"] == ''){
	echo "Customer name is required.";
}elseif($_POST["clientid"] != '1' && ($_POST["servicecharge"] == '' || $_POST["servicecharge"] < 0)){
	echo "Room service charge is required";
}elseif($_POST["clientid"] != '1' && $_POST["rmitemcategory"] == ''){
	echo "Room service category is required";
//}elseif($_POST["chkispaid"] == '' && $_POST["clientid"] == '1'){
	//echo "Anonymous customer's order must be marked as paid. No credit!";
}else{
		//insert bar
		$bar2bdc = $_POST["bardiscount"];
		$bar2bdate = date("Y-m-d"); //$_POST["barorderdate"];
		$bar2ctn = count($_POST["barcheck"]);
		$bar2grandtotal = $_POST["grandtotal"];
		$bar2chkispaid = $_POST["chkispaid"];
		$rmitemcategory = $_POST["rmitemcategory"];
		
		if($_POST["clientid"] == '1'){ 
		$guestroomid = ""; $clientid = $_POST["clientid"];
		}else{ 
		$guestroomid = ""; $clientid = getGuestRoomByInvoiceId($_POST["clientid"]); 
		}
		
		if($_POST["dvat"] == '' || $_POST["dvat"] < 0 || !is_numeric($_POST["dvat"])){ 
			$dvat = 0; 
		}else{
			$dvat = $_POST["dvat"];
		}
		
		if($_POST["servicecharge"] == '' || $_POST["servicecharge"] < 0 || !is_numeric($_POST["servicecharge"])){ 
			$servicecharge2 = 0; 
		}else{ 
			if($clientid == '1'){
				$servicecharge2 = 0;
			}else{
				$servicecharge2 = $_POST["servicecharge"];
				$bar2grandtotal += $servicecharge2;
			}
		}
		
		if($bar2chkispaid == '1'){ $bar2flagpaid = '1'; }else{ $bar2flagpaid = '0'; }
		$bar2guestid = $clientid;
		
		if($bar2guestid == 1){
			$bar2invoiceid = time();
			$bar2InvExist = 0;
		}else{
			$bar2invoiceid = GetAnInhouseGuestPendingInvoice($bar2guestid);
			if($bar2invoiceid == ''){
				$bar2invoiceid = time();
				$bar2InvExist = 0;
			}else{
				//if($bar2chkispaid == '1'){ $bar2invoiceid = time(); $bar2InvExist = 0; }
				//else{ $bar2InvExist = 1; }
				$bar2invoiceid = time(); $bar2InvExist = 0;
			}
		}
		
		$bar2time = date("Y-m-d");
		$bar2ordertime = date("H:i");
		
		$bar2log = "<br><br>[".date("Y-m-d h:i:s A")."], <br>New Order From Bar-2, <br>BY STAFF: ".$_SESSION["amyn15"]."(".$_SESSION["amyi15"]."), <br>INVOICE ID: ".$bar2invoiceid.", <br>Total: ".$bar2grandtotal;
		
		//validate qty before insertion......
			$arrayids2 = implode(",",$_POST["barcheck"]);
			$cnoMsg2 = '';
				$qrya2 = mysqli_query($conn4as,"SELECT id,name,itemleft,measure FROM addbar2 WHERE id IN (".mysqli_real_escape_string($conn4as,$arrayids2).") ORDER BY id");
				$totala2 = mysqli_num_rows($qrya2);
				if($totala2 > 0){
					while($rsa2 = mysqli_fetch_assoc($qrya2)){
						$ida2 = $rsa2["id"];
						if($rsa2["itemleft"] < $_POST["barquantity".$ida2]){
							$cnoMsg2 .= $rsa2["name"].' remains '.$rsa2["itemleft"].' in stock.<br>';
						}					
					}
				}
		mysqli_free_result($qrya2);
		
		if($cnoMsg2 != ''){
		echo $cnoMsg2.'Re-stock insufficient item(s) to place order.';
		}else{
			// $servicecharge2Added = '';
			for($bar2i = 0; $bar2i < $bar2ctn; ++$bar2i){
				$bar2bc = $_POST["barcheck"][$bar2i];
				
				if ($bar2bc != ''){
				
				$bar2bp = $_POST["barprice".$bar2bc];
				$bar2bq = $_POST["barquantity".$bar2bc];
				$bar2bt = $_POST["bartotal".$bar2bc];
				$bar2disctotal = ($bar2bt + ($bar2bt * ($dvat/100))) - ($bar2bt * ($bar2bdc/100)); //bt...with service charge  + $servicecharge2
				
				
				if($bar2sqladd == ''){
					$servicecharge2Added = $servicecharge2; 
					$bar2disctotal += $servicecharge2;
				$bar2sqladd = "INSERT INTO order_bar2(invoiceid, guestid, roomid, itemid, qty, discount, vat, unitprice, total,servicecharge,roomitemcat, orderdate, ordertime, ispaid,staffid,waiter) VALUES('".mysqli_real_escape_string($conn4as,$bar2invoiceid)."','".mysqli_real_escape_string($conn4as,$bar2guestid)."','".mysqli_real_escape_string($conn4as,$guestroomid)."','".mysqli_real_escape_string($conn4as,$bar2bc)."','".mysqli_real_escape_string($conn4as,$bar2bq)."','".mysqli_real_escape_string($conn4as,$bar2bdc)."','".mysqli_real_escape_string($conn4as,$dvat)."','".mysqli_real_escape_string($conn4as,$bar2bp)."','".mysqli_real_escape_string($conn4as,$bar2disctotal)."','".mysqli_real_escape_string($conn4as,$servicecharge2Added)."','".mysqli_real_escape_string($conn4as,$rmitemcategory)."','".mysqli_real_escape_string($conn4as,$bar2bdate)."','".mysqli_real_escape_string($conn4as,$bar2ordertime)."','".mysqli_real_escape_string($conn4as,$bar2flagpaid)."','".mysqli_real_escape_string($conn4as,$globalid)."','".mysqli_real_escape_string($conn4as,$_POST["waiter"])."')";
				}else{
					$servicecharge2Added = 0;
				$bar2sqladd .= ", ('".mysqli_real_escape_string($conn4as,$bar2invoiceid)."','".mysqli_real_escape_string($conn4as,$bar2guestid)."','".mysqli_real_escape_string($conn4as,$guestroomid)."','".mysqli_real_escape_string($conn4as,$bar2bc)."','".mysqli_real_escape_string($conn4as,$bar2bq)."','".mysqli_real_escape_string($conn4as,$bar2bdc)."','".mysqli_real_escape_string($conn4as,$dvat)."','".mysqli_real_escape_string($conn4as,$bar2bp)."','".mysqli_real_escape_string($conn4as,$bar2disctotal)."','".mysqli_real_escape_string($conn4as,$servicecharge2Added)."','".mysqli_real_escape_string($conn4as,$rmitemcategory)."','".mysqli_real_escape_string($conn4as,$bar2bdate)."','".mysqli_real_escape_string($conn4as,$bar2ordertime)."','".mysqli_real_escape_string($conn4as,$bar2flagpaid)."','".mysqli_real_escape_string($conn4as,$globalid)."','".mysqli_real_escape_string($conn4as,$_POST["waiter"])."')";
				}
				$b2 = '1'; $bar2nooforderadded += 1;
				//$sqlupdates .= "UPDATE addbar SET issync = '2',  itemleft = itemleft - ".mysqli_real_escape_string($conn4as,$bq)." WHERE id = ".mysqli_real_escape_string($conn4as,$bc).";";
				mysqli_query($conn4as,"UPDATE addbar2 SET issync = '2', itemleft = itemleft - ".mysqli_real_escape_string($conn4as,$bar2bq)." WHERE id = ".mysqli_real_escape_string($conn4as,$bar2bc));
				}
			} //foreach
					
			//insert to orders table
			if ($bar2nooforderadded < 1){
				echo 'No item ordered.';
			}else{
			$bar2sqladd .= ';';
			mysqli_query($conn4as,$bar2sqladd);
			//mysqli_query($conn4as,$sqlupdates);
			if($bar2InvExist == '1'){
				if($servicecharge2 > 0){
				$bar2sql = "UPDATE orders SET issync = '2', isbar2 = '".mysqli_real_escape_string($conn4as,$b2)."', total = total + ".mysqli_real_escape_string($conn4as,$bar2grandtotal).", servicecharge = servicecharge + ".mysqli_real_escape_string($conn4as,$servicecharge2)." WHERE invoiceid = '".mysqli_real_escape_string($conn4as,$bar2invoiceid)."' AND guestid = '".mysqli_real_escape_string($conn4as,$bar2guestid)."'";
				}else{
				$bar2sql = "UPDATE orders SET issync = '2', isbar2 = '".mysqli_real_escape_string($conn4as,$b2)."', total = total + ".mysqli_real_escape_string($conn4as,$bar2grandtotal)." WHERE invoiceid = '".mysqli_real_escape_string($conn4as,$bar2invoiceid)."' AND guestid = '".mysqli_real_escape_string($conn4as,$bar2guestid)."'";
				}
			}else{
				$bar2sql = "INSERT INTO orders(invoiceid, guestid, roomid, isroom, isbar, isbar2, issport, isspa, islaundary, isrestaurant, isswimpool, orderdate, ordertime, total,servicecharge,ispaid) VALUES('".mysqli_real_escape_string($conn4as,$bar2invoiceid)."','".mysqli_real_escape_string($conn4as,$bar2guestid)."','".mysqli_real_escape_string($conn4as,$guestroomid)."','0','0','".mysqli_real_escape_string($conn4as,$b2)."','0','0','0','0','0','".mysqli_real_escape_string($conn4as,$bar2time)."','".mysqli_real_escape_string($conn4as,$bar2ordertime)."','".mysqli_real_escape_string($conn4as,$bar2grandtotal)."','".mysqli_real_escape_string($conn4as,$servicecharge2)."','".mysqli_real_escape_string($conn4as,$bar2flagpaid)."')";
			}
			
			mysqli_query($conn4as,$bar2sql);
			echo 'OSABC2<->'.$bar2guestid.'<->'.$bar2invoiceid;
			//echo $sqladd."<br>".$sqlupdates;
			//echo "<br>".$sql."<br>".$nooforderadded; 
			//save log....
			WriteToFile("../logs/".$logfilename,$bar2log."\r\n=======================================\r\n");
			$params = "emsubject=New item(s) ordered from bar-2. Invoice ID: ".$bar2invoiceid;
			$params .= "&msg=".$bar2log;
			sendAsyncURL($httppath."/fxn/sendmail/index.php", $params);
			}
		}//validation ends here........
	}
}
////// END BAR 2 MULTIPLE ORDER /////////////////////////////////////////////////

////// START BAR 3 MULTIPLE ORDER ///////////////////////////////////////////////
if ($_POST["dwat"] == "ordermbar3code"){
if($_POST["clientid"] == ''){
	echo "Customer name is required.";
}elseif($_POST["clientid"] != '1' && ($_POST["servicecharge"] == '' || $_POST["servicecharge"] < 0)){
	echo "Room service charge is required";
}elseif($_POST["clientid"] != '1' && $_POST["rmitemcategory"] == ''){
	echo "Room service category is required";
//}elseif($_POST["chkispaid"] == '' && $_POST["clientid"] == '1'){
	//echo "Anonymous customer's order must be marked as paid. No credit!";
}else{
		//insert bar
		$bar3bdc = $_POST["bardiscount"];
		$bar3bdate = date("Y-m-d"); //$_POST["barorderdate"];
		$bar3ctn = count($_POST["barcheck"]);
		$bar3grandtotal = $_POST["grandtotal"];
		$bar3chkispaid = $_POST["chkispaid"];
		$rmitemcategory = $_POST["rmitemcategory"];
		
		if($_POST["clientid"] == '1'){ 
		$guestroomid = ""; $clientid = $_POST["clientid"];
		}else{ 
		$guestroomid = ""; $clientid = getGuestRoomByInvoiceId($_POST["clientid"]); 
		}
		
		if($_POST["dvat"] == '' || $_POST["dvat"] < 0 || !is_numeric($_POST["dvat"])){ 
			$dvat = 0; 
		}else{
			$dvat = $_POST["dvat"];
		}
		
		if($_POST["servicecharge"] == '' || $_POST["servicecharge"] < 0 || !is_numeric($_POST["servicecharge"])){ 
			$servicecharge2 = 0; 
		}else{ 
			if($clientid == '1'){
				$servicecharge2 = 0;
			}else{
				$servicecharge2 = $_POST["servicecharge"];
				$bar3grandtotal += $servicecharge2;
			}
		}
		
		if($bar3chkispaid == '1'){ $bar3flagpaid = '1'; }else{ $bar3flagpaid = '0'; }
		$bar3guestid = $clientid;
		
		if($bar3guestid == 1){
			$bar3invoiceid = time();
			$bar3InvExist = 0;
		}else{
			$bar3invoiceid = GetAnInhouseGuestPendingInvoice($bar3guestid);
			if($bar3invoiceid == ''){
				$bar3invoiceid = time();
				$bar3InvExist = 0;
			}else{
				//if($bar3chkispaid == '1'){ $bar3invoiceid = time(); $bar3InvExist = 0; }
				//else{ $bar3InvExist = 1; }
				$bar3invoiceid = time(); $bar3InvExist = 0;
			}
		}
		
		$bar3time = date("Y-m-d");
		$bar3ordertime = date("H:i");
		
		$bar3log = "<br><br>[".date("Y-m-d h:i:s A")."], <br>New Order From Bar-3, <br>BY STAFF: ".$_SESSION["amyn15"]."(".$_SESSION["amyi15"]."), <br>INVOICE ID: ".$bar3invoiceid.", <br>Total: ".$bar3grandtotal;
		
		//validate qty before insertion......
			$arrayids2 = implode(",",$_POST["barcheck"]);
			$cnoMsg2 = '';
				$qrya2 = mysqli_query($conn4as,"SELECT id,name,itemleft,measure FROM addbar3 WHERE id IN (".mysqli_real_escape_string($conn4as,$arrayids2).") ORDER BY id");
				$totala2 = mysqli_num_rows($qrya2);
				if($totala2 > 0){
					while($rsa2 = mysqli_fetch_assoc($qrya2)){
						$ida2 = $rsa2["id"];
						if($rsa2["itemleft"] < $_POST["barquantity".$ida2]){
							$cnoMsg2 .= $rsa2["name"].' remains '.$rsa2["itemleft"].' in stock.<br>';
						}					
					}
				}
		mysqli_free_result($qrya2);
		
		if($cnoMsg2 != ''){
		echo $cnoMsg2.'Re-stock insufficient item(s) to place order.';
		}else{
			// $servicecharge2Added = '';
			for($bar3i = 0; $bar3i < $bar3ctn; ++$bar3i){
				$bar3bc = $_POST["barcheck"][$bar3i];
				
				if ($bar3bc != ''){
				
				$bar3bp = $_POST["barprice".$bar3bc];
				$bar3bq = $_POST["barquantity".$bar3bc];
				$bar3bt = $_POST["bartotal".$bar3bc];
				$bar3disctotal = ($bar3bt + ($bar3bt * ($dvat/100))) - ($bar3bt * ($bar3bdc/100)); //bt...with service charge  + $servicecharge2
				
				
				if($bar3sqladd == ''){
					$servicecharge2Added = $servicecharge2; 
					$bar3disctotal += $servicecharge2;
				$bar3sqladd = "INSERT INTO order_bar3(invoiceid, guestid, roomid, itemid, qty, discount, vat, unitprice, total,servicecharge,roomitemcat, orderdate, ordertime, ispaid,staffid,waiter) VALUES('".mysqli_real_escape_string($conn4as,$bar3invoiceid)."','".mysqli_real_escape_string($conn4as,$bar3guestid)."','".mysqli_real_escape_string($conn4as,$guestroomid)."','".mysqli_real_escape_string($conn4as,$bar3bc)."','".mysqli_real_escape_string($conn4as,$bar3bq)."','".mysqli_real_escape_string($conn4as,$bar3bdc)."','".mysqli_real_escape_string($conn4as,$dvat)."','".mysqli_real_escape_string($conn4as,$bar3bp)."','".mysqli_real_escape_string($conn4as,$bar3disctotal)."','".mysqli_real_escape_string($conn4as,$servicecharge2Added)."','".mysqli_real_escape_string($conn4as,$rmitemcategory)."','".mysqli_real_escape_string($conn4as,$bar3bdate)."','".mysqli_real_escape_string($conn4as,$bar3ordertime)."','".mysqli_real_escape_string($conn4as,$bar3flagpaid)."','".mysqli_real_escape_string($conn4as,$globalid)."','".mysqli_real_escape_string($conn4as,$_POST["waiter"])."')";
				}else{
					$servicecharge2Added = 0;
				$bar3sqladd .= ", ('".mysqli_real_escape_string($conn4as,$bar3invoiceid)."','".mysqli_real_escape_string($conn4as,$bar3guestid)."','".mysqli_real_escape_string($conn4as,$guestroomid)."','".mysqli_real_escape_string($conn4as,$bar3bc)."','".mysqli_real_escape_string($conn4as,$bar3bq)."','".mysqli_real_escape_string($conn4as,$bar3bdc)."','".mysqli_real_escape_string($conn4as,$dvat)."','".mysqli_real_escape_string($conn4as,$bar3bp)."','".mysqli_real_escape_string($conn4as,$bar3disctotal)."','".mysqli_real_escape_string($conn4as,$servicecharge2Added)."','".mysqli_real_escape_string($conn4as,$rmitemcategory)."','".mysqli_real_escape_string($conn4as,$bar3bdate)."','".mysqli_real_escape_string($conn4as,$bar3ordertime)."','".mysqli_real_escape_string($conn4as,$bar3flagpaid)."','".mysqli_real_escape_string($conn4as,$globalid)."','".mysqli_real_escape_string($conn4as,$_POST["waiter"])."')";
				}
				$b2 = '1'; $bar3nooforderadded += 1;
				//$sqlupdates .= "UPDATE addbar SET issync = '2',  itemleft = itemleft - ".mysqli_real_escape_string($conn4as,$bq)." WHERE id = ".mysqli_real_escape_string($conn4as,$bc).";";
				mysqli_query($conn4as,"UPDATE addbar3 SET issync = '2', itemleft = itemleft - ".mysqli_real_escape_string($conn4as,$bar3bq)." WHERE id = ".mysqli_real_escape_string($conn4as,$bar3bc));
				}
			} //foreach
					
			//insert to orders table
			if ($bar3nooforderadded < 1){
				echo 'No item ordered.';
			}else{
			$bar3sqladd .= ';';
			mysqli_query($conn4as,$bar3sqladd);
			//mysqli_query($conn4as,$sqlupdates);
			if($bar3InvExist == '1'){
				if($servicecharge2 > 0){
				$bar3sql = "UPDATE orders SET issync = '2', isbar3 = '".mysqli_real_escape_string($conn4as,$b2)."', total = total + ".mysqli_real_escape_string($conn4as,$bar3grandtotal).", servicecharge = servicecharge + ".mysqli_real_escape_string($conn4as,$servicecharge2)." WHERE invoiceid = '".mysqli_real_escape_string($conn4as,$bar3invoiceid)."' AND guestid = '".mysqli_real_escape_string($conn4as,$bar3guestid)."'";
				}else{
				$bar3sql = "UPDATE orders SET issync = '2', isbar3 = '".mysqli_real_escape_string($conn4as,$b2)."', total = total + ".mysqli_real_escape_string($conn4as,$bar3grandtotal)." WHERE invoiceid = '".mysqli_real_escape_string($conn4as,$bar3invoiceid)."' AND guestid = '".mysqli_real_escape_string($conn4as,$bar3guestid)."'";
				}
			}else{
				$bar3sql = "INSERT INTO orders(invoiceid, guestid, roomid, isroom, isbar, isbar2, isbar3, issport, isspa, islaundary, isrestaurant, isswimpool, orderdate, ordertime, total,servicecharge,ispaid) VALUES('".mysqli_real_escape_string($conn4as,$bar3invoiceid)."','".mysqli_real_escape_string($conn4as,$bar3guestid)."','".mysqli_real_escape_string($conn4as,$guestroomid)."','0','0','0','".mysqli_real_escape_string($conn4as,$b2)."','0','0','0','0','0','".mysqli_real_escape_string($conn4as,$bar3time)."','".mysqli_real_escape_string($conn4as,$bar3ordertime)."','".mysqli_real_escape_string($conn4as,$bar3grandtotal)."','".mysqli_real_escape_string($conn4as,$servicecharge2)."','".mysqli_real_escape_string($conn4as,$bar3flagpaid)."')";
			}
			
			mysqli_query($conn4as,$bar3sql);
			echo 'OSABC3<->'.$bar3guestid.'<->'.$bar3invoiceid;
			//echo $sqladd."<br>".$sqlupdates;
			//echo "<br>".$sql."<br>".$nooforderadded; 
			//save log....
			WriteToFile("../logs/".$logfilename,$bar3log."\r\n=======================================\r\n");
			$params = "emsubject=New item(s) ordered from bar-3. Invoice ID: ".$bar3invoiceid;
			$params .= "&msg=".$bar3log;
			sendAsyncURL($httppath."/fxn/sendmail/index.php", $params);
			}
		}//validation ends here........
	}
}
////// END BAR 3 MULTIPLE ORDER /////////////////////////////////////////////////

// order multiple bar from barcode area
if ($_POST["dwat"] == "ordermbarcode"){
//exit();
if($_POST["clientid"] == ''){
	echo "Customer name is required.";
}elseif($_POST["clientid"] != '1' && ($_POST["servicecharge"] == '' || $_POST["servicecharge"] < 0)){
	echo "Room service charge is required";
}elseif($_POST["clientid"] != '1' && $_POST["rmitemcategory"] == ''){
	echo "Room service category is required";
//}elseif($_POST["chkispaid"] == '' && $_POST["clientid"] == '1'){
	//echo "Anonymous customer's order must be marked as paid. No credit!";
}else{
		//insert bar
		
		$barbdc = $_POST["bardiscount"];
		$barbdate = date("Y-m-d"); //$_POST["barorderdate"];
		$barctn = count($_POST["barcheck"]);
		$bargrandtotal = $_POST["grandtotal"];
		$barchkispaid = $_POST["chkispaid"];
		$rmitemcategory = $_POST["rmitemcategory"];
		
		if($_POST["clientid"] == '1'){ 
		$guestroomid = ""; $clientid = $_POST["clientid"];
		}else{ 
		$guestroomid = ""; $clientid = getGuestRoomByInvoiceId($_POST["clientid"]); 
		}
			
		if($_POST["dvat"] == '' || $_POST["dvat"] < 0 || !is_numeric($_POST["dvat"])){ 
			$dvat = 0; 
		}else{
			$dvat = $_POST["dvat"];
		}
		
		if($_POST["servicecharge"] == '' || $_POST["servicecharge"] < 0 || !is_numeric($_POST["servicecharge"])){ 
			$servicecharge = 0; 
		}else{ 
			if($clientid == '1'){
				$servicecharge = 0;
			}else{
				$servicecharge = $_POST["servicecharge"];
				$bargrandtotal += $servicecharge;
			}
		}
		
		if($barchkispaid == '1'){ $barflagpaid = '1'; }else{ $barflagpaid = '0'; }
		$barguestid = $clientid;
		
		if($barguestid == 1){
			$barinvoiceid = time();
			$barInvExist = 0;
		}else{
			$barinvoiceid = GetAnInhouseGuestPendingInvoice($barguestid);
			if($barinvoiceid == ''){
				$barinvoiceid = time();
				$barInvExist = 0;
			}else{
				//if($barchkispaid == '1'){ $barinvoiceid = time(); $barInvExist = 0; 
				//}else{ $barInvExist = 1; }
				$barinvoiceid = time(); $barInvExist = 0;
			}
		}
		
		$bartime = date("Y-m-d");
		$barordertime = date("H:i");
		
		$barlog = "<br><br>[".date("Y-m-d h:i:s A")."], <br>New Order From Bar-1, <br>BY STAFF: ".$_SESSION["amyn15"]."(".$_SESSION["amyi15"]."), <br>INVOICE ID: ".$barinvoiceid.", <br>Total: ".$bargrandtotal;
		
		//validate qty before insertion......
			$arrayids = implode(",",$_POST["barcheck"]);
			$cnoMsg = '';
				$qrya = mysqli_query($conn4as,"SELECT id,name,itemleft,measure FROM addbar WHERE id IN (".mysqli_real_escape_string($conn4as,$arrayids).") ORDER BY id");
				$totala = mysqli_num_rows($qrya);
				if($totala > 0){
					while($rsa = mysqli_fetch_assoc($qrya)){
						$ida = $rsa["id"];
						if($rsa["itemleft"] < $_POST["barquantity".$ida]){
							$cnoMsg .= $rsa["name"].' remains '.$rsa["itemleft"].' in stock.<br>';
						}					
					}
				}
		mysqli_free_result($qrya);
		
		if($cnoMsg != ''){
		echo $cnoMsg.'Re-stock insufficient item(s) to place order.';
		}else{
			// $servicechargeAdded = '';
			for($bari = 0; $bari < $barctn; ++$bari){
				$barbc = $_POST["barcheck"][$bari];
				
				if ($barbc != ''){
				
				$barbp = $_POST["barprice".$barbc];
				$barbq = $_POST["barquantity".$barbc];
				$barbt = $_POST["bartotal".$barbc];
				$bardisctotal = ($barbt + ($barbt * ($dvat/100))) - ($barbt * ($barbdc/100)); //bt...with service charge  + $servicecharge
				
				/*
				if($servicechargeAdded == ''){ 
					$servicechargeAdded = $servicecharge; 
					$bardisctotal += $servicecharge;
				}else{ $servicechargeAdded = 0; }
				*/
				
				if($barsqladd == ''){
					$servicechargeAdded = $servicecharge; 
					$bardisctotal += $servicecharge;
				$barsqladd = "INSERT INTO order_bar(invoiceid, guestid, roomid, itemid, qty, discount, vat, unitprice, total,servicecharge,roomitemcat, orderdate, ordertime, ispaid,staffid,waiter) VALUES('".mysqli_real_escape_string($conn4as,$barinvoiceid)."','".mysqli_real_escape_string($conn4as,$barguestid)."','".mysqli_real_escape_string($conn4as,$guestroomid)."','".mysqli_real_escape_string($conn4as,$barbc)."','".mysqli_real_escape_string($conn4as,$barbq)."','".mysqli_real_escape_string($conn4as,$barbdc)."','".mysqli_real_escape_string($conn4as,$dvat)."','".mysqli_real_escape_string($conn4as,$barbp)."','".mysqli_real_escape_string($conn4as,$bardisctotal)."','".mysqli_real_escape_string($conn4as,$servicechargeAdded)."','".mysqli_real_escape_string($conn4as,$rmitemcategory)."','".mysqli_real_escape_string($conn4as,$barbdate)."','".mysqli_real_escape_string($conn4as,$barordertime)."','".mysqli_real_escape_string($conn4as,$barflagpaid)."','".mysqli_real_escape_string($conn4as,$globalid)."','".mysqli_real_escape_string($conn4as,$_POST["waiter"])."')";
				}else{
					$servicechargeAdded = 0;
				$barsqladd .= ", ('".mysqli_real_escape_string($conn4as,$barinvoiceid)."','".mysqli_real_escape_string($conn4as,$barguestid)."','".mysqli_real_escape_string($conn4as,$guestroomid)."','".mysqli_real_escape_string($conn4as,$barbc)."','".mysqli_real_escape_string($conn4as,$barbq)."','".mysqli_real_escape_string($conn4as,$barbdc)."','".mysqli_real_escape_string($conn4as,$dvat)."','".mysqli_real_escape_string($conn4as,$barbp)."','".mysqli_real_escape_string($conn4as,$bardisctotal)."','".mysqli_real_escape_string($conn4as,$servicechargeAdded)."','".mysqli_real_escape_string($conn4as,$rmitemcategory)."','".mysqli_real_escape_string($conn4as,$barbdate)."','".mysqli_real_escape_string($conn4as,$barordertime)."','".mysqli_real_escape_string($conn4as,$barflagpaid)."','".mysqli_real_escape_string($conn4as,$globalid)."','".mysqli_real_escape_string($conn4as,$_POST["waiter"])."')";
				}
				$b = '1'; $barnooforderadded += 1;
				//$sqlupdates .= "UPDATE addbar SET issync = '2', itemleft = itemleft - ".mysqli_real_escape_string($conn4as,$bq)." WHERE id = ".mysqli_real_escape_string($conn4as,$bc).";";
				mysqli_query($conn4as,"UPDATE addbar SET issync = '2', itemleft = itemleft - ".mysqli_real_escape_string($conn4as,$barbq)." WHERE id = ".mysqli_real_escape_string($conn4as,$barbc));
				}
			} //foreach
					
			//insert to orders table
			if ($barnooforderadded < 1){
				echo 'No item ordered.';
			}else{
			$barsqladd .= ';';
			mysqli_query($conn4as,$barsqladd);
			//mysqli_query($conn4as,$sqlupdates);
			if($barInvExist == '1'){
				if($servicecharge > 0){
				$barsql = "UPDATE orders SET issync = '2', isbar = '".mysqli_real_escape_string($conn4as,$b)."', total = total + ".mysqli_real_escape_string($conn4as,$bargrandtotal).", servicecharge = servicecharge + ".mysqli_real_escape_string($conn4as,$servicecharge)." WHERE invoiceid = '".mysqli_real_escape_string($conn4as,$barinvoiceid)."' AND guestid = '".mysqli_real_escape_string($conn4as,$barguestid)."'";
				}else{
				$barsql = "UPDATE orders SET issync = '2', isbar = '".mysqli_real_escape_string($conn4as,$b)."', total = total + ".mysqli_real_escape_string($conn4as,$bargrandtotal)." WHERE invoiceid = '".mysqli_real_escape_string($conn4as,$barinvoiceid)."' AND guestid = '".mysqli_real_escape_string($conn4as,$barguestid)."'";
				}
			}else{
				$barsql = "INSERT INTO orders(invoiceid, guestid, roomid, isroom, isbar, isbar2, issport, isspa, islaundary, isrestaurant, isswimpool, orderdate, ordertime, total,servicecharge,ispaid) VALUES('".mysqli_real_escape_string($conn4as,$barinvoiceid)."','".mysqli_real_escape_string($conn4as,$barguestid)."','".mysqli_real_escape_string($conn4as,$guestroomid)."','0','".mysqli_real_escape_string($conn4as,$b)."','0','0','0','0','0','0','".mysqli_real_escape_string($conn4as,$bartime)."','".mysqli_real_escape_string($conn4as,$barordertime)."','".mysqli_real_escape_string($conn4as,$bargrandtotal)."','".mysqli_real_escape_string($conn4as,$servicecharge)."','".mysqli_real_escape_string($conn4as,$barflagpaid)."')";
			}
			
			mysqli_query($conn4as,$barsql);
			echo 'OSABC<->'.$barguestid.'<->'.$barinvoiceid;
			//echo $sqladd."<br>".$sqlupdates;
			//echo "<br>".$sql."<br>".$nooforderadded; 
			 //save log....
			WriteToFile("../logs/".$logfilename,$barlog."\r\n=======================================\r\n");
			$params = "emsubject=New item(s) ordered from bar-1. Invoice ID: ".$barinvoiceid;
			$params .= "&msg=".$barlog;
			sendAsyncURL($httppath."/fxn/sendmail/index.php", $params);
			}
		}//validation ends here........
	}
}


if ($_POST["dwat"] == "ordermrescode"){
if($_POST["clientid"] == ''){
	echo "Customer name is required.";
}elseif($_POST["clientid"] != '1' && ($_POST["servicecharge"] == '' || $_POST["servicecharge"] < 0)){
	echo "Room service charge is required";
}elseif($_POST["clientid"] != '1' && $_POST["rmfoodcategory"] == ''){
	echo "Room service food category is required";
//}elseif($_POST["chkispaid"] == '' && $_POST["clientid"] == '1'){
	//echo "Anonymous customer's order must be marked as paid. No credit!";
}else{
		//insert res
		$resbdc = $_POST["resdiscount"];
		$resbdate = date("Y-m-d"); //$_POST["resorderdate"];
		$resctn = count($_POST["rescheck"]);
		$resgrandtotal = $_POST["grandtotal"];
		$reschkispaid = $_POST["chkispaid"];
		$roomfoodcat = $_POST["rmfoodcategory"];
		
		if($_POST["clientid"] == '1'){ 
		$guestroomid = ""; $clientid = $_POST["clientid"];
		}else{ 
		$guestroomid = ""; $clientid = getGuestRoomByInvoiceId($_POST["clientid"]); 
		}
		
		if($_POST["servicecharge"] == '' || $_POST["servicecharge"] < 0 || !is_numeric($_POST["servicecharge"])){ 
			$rservicecharge = 0; 
		}else{ 
			if($clientid == '1'){
				$rservicecharge = 0;
			}else{
				$rservicecharge = $_POST["servicecharge"];
				$resgrandtotal += $rservicecharge;
			}
		}
		
		if($reschkispaid == '1'){ $resflagpaid = '1'; }else{ $resflagpaid = '0'; }
		$resguestid = $clientid;
		
		if($resguestid == 1){
			$resinvoiceid = time();
			$resInvExist = 0;
		}else{
			$resinvoiceid = GetAnInhouseGuestPendingInvoice($resguestid);
			if($resinvoiceid == ''){
				$resinvoiceid = time();
				$resInvExist = 0;
			}else{
				//if($reschkispaid == '1'){ $resinvoiceid = time(); $resInvExist = 0; }
				//else{ $resInvExist = 1; }
				$resinvoiceid = time(); $resInvExist = 0;
			}
		}
		
		$restime = date("Y-m-d");
		$resordertime = date("H:i");
		
		$reslog = "<br><br>[".date("Y-m-d h:i:s A")."], <br>New Food Ordered, <br>BY STAFF: ".$_SESSION["amyn15"]."(".$_SESSION["amyi15"]."), <br>INVOICE ID: ".$resinvoiceid.", <br>Total: ".$resgrandtotal;
				
		for($resi = 0; $resi < $resctn; ++$resi){
			$resbc = $_POST["rescheck"][$resi];
			
			if ($resbc != ''){
			
			$resbp = $_POST["resprice".$resbc];
			$resbq = $_POST["resquantity".$resbc];
			$resbt = $_POST["restotal".$resbc];
			$resdisctotal = $resbt - ($resbt * ($resbdc/100)); //bt
			
			/*
			if($rservicechargeAdded == ''){ 
				$rservicechargeAdded = $rservicecharge; 
				$resdisctotal += $rservicecharge;
			}else{ $rservicechargeAdded = 0; }
			*/
				
			if($ressqladd == ''){
				$rservicechargeAdded = $rservicecharge; 
				$resdisctotal += $rservicecharge;
			$ressqladd = "INSERT INTO order_restaurant(invoiceid, guestid, roomid, itemid, qty, discount, unitprice, total, servicecharge, roomfoodcat,orderdate, ordertime, ispaid,tableno,waiter,staffid) VALUES('".mysqli_real_escape_string($conn4as,$resinvoiceid)."','".mysqli_real_escape_string($conn4as,$resguestid)."','".mysqli_real_escape_string($conn4as,$guestroomid)."','".mysqli_real_escape_string($conn4as,$resbc)."','".mysqli_real_escape_string($conn4as,$resbq)."','".mysqli_real_escape_string($conn4as,$resbdc)."','".mysqli_real_escape_string($conn4as,$resbp)."','".mysqli_real_escape_string($conn4as,$resdisctotal)."','".mysqli_real_escape_string($conn4as,$rservicechargeAdded)."','".mysqli_real_escape_string($conn4as,$roomfoodcat)."','".mysqli_real_escape_string($conn4as,$resbdate)."','".mysqli_real_escape_string($conn4as,$resordertime)."','".mysqli_real_escape_string($conn4as,$resflagpaid)."','".mysqli_real_escape_string($conn4as,$_POST["tableno"])."','".mysqli_real_escape_string($conn4as,$_POST["waiter"])."','".mysqli_real_escape_string($conn4as,$globalid)."')";
			}else{
				$rservicechargeAdded = 0;
			$ressqladd .= ", ('".mysqli_real_escape_string($conn4as,$resinvoiceid)."','".mysqli_real_escape_string($conn4as,$resguestid)."','".mysqli_real_escape_string($conn4as,$guestroomid)."','".mysqli_real_escape_string($conn4as,$resbc)."','".mysqli_real_escape_string($conn4as,$resbq)."','".mysqli_real_escape_string($conn4as,$resbdc)."','".mysqli_real_escape_string($conn4as,$resbp)."','".mysqli_real_escape_string($conn4as,$resdisctotal)."','".mysqli_real_escape_string($conn4as,$rservicechargeAdded)."','".mysqli_real_escape_string($conn4as,$roomfoodcat)."','".mysqli_real_escape_string($conn4as,$resbdate)."','".mysqli_real_escape_string($conn4as,$resordertime)."','".mysqli_real_escape_string($conn4as,$resflagpaid)."','".mysqli_real_escape_string($conn4as,$_POST["tableno"])."','".mysqli_real_escape_string($conn4as,$_POST["waiter"])."','".mysqli_real_escape_string($conn4as,$globalid)."')";
			}
			$b = '1'; $resnooforderadded += 1;
			mysqli_query($conn4as,"UPDATE addresturant SET issync = '2', itemleft = itemleft - ".mysqli_real_escape_string($conn4as,$resbq)." WHERE id = ".mysqli_real_escape_string($conn4as,$resbc));
			}
		} //foreach
		
		//insert to orders table
		if ($resnooforderadded < 1){
			echo 'No item ordered.';
		}else{
		$ressqladd .= ';';
		mysqli_query($conn4as,$ressqladd);
		//mysqli_query($conn4as,$sqlupdates);
		if($resInvExist == '1'){
			if($rservicecharge > 0){
			$ressql = "UPDATE orders SET issync = '2', isrestaurant = '".mysqli_real_escape_string($conn4as,$b)."', total = total + ".mysqli_real_escape_string($conn4as,$resgrandtotal).", servicecharge = servicecharge + ".mysqli_real_escape_string($conn4as,$rservicecharge)." WHERE invoiceid = '".mysqli_real_escape_string($conn4as,$resinvoiceid)."' AND guestid = '".mysqli_real_escape_string($conn4as,$resguestid)."'";
			}else{
			$ressql = "UPDATE orders SET issync = '2', isrestaurant = '".mysqli_real_escape_string($conn4as,$b)."', total = total + ".mysqli_real_escape_string($conn4as,$resgrandtotal)." WHERE invoiceid = '".mysqli_real_escape_string($conn4as,$resinvoiceid)."' AND guestid = '".mysqli_real_escape_string($conn4as,$resguestid)."'";
			}
		}else{
			$ressql = "INSERT INTO orders(invoiceid, guestid, roomid, isroom, isbar, isbar2, issport, isspa, islaundary, isrestaurant, orderdate, ordertime, total,servicecharge,roomfoodcat,ispaid) VALUES('".mysqli_real_escape_string($conn4as,$resinvoiceid)."','".mysqli_real_escape_string($conn4as,$resguestid)."','".mysqli_real_escape_string($conn4as,$guestroomid)."','0','0','0','0','0','0','".mysqli_real_escape_string($conn4as,$b)."','".mysqli_real_escape_string($conn4as,$resbdate)."','".mysqli_real_escape_string($conn4as,$resordertime)."','".mysqli_real_escape_string($conn4as,$resgrandtotal)."','".mysqli_real_escape_string($conn4as,$rservicecharge)."','".mysqli_real_escape_string($conn4as,$roomfoodcat)."','".mysqli_real_escape_string($conn4as,$resflagpaid)."')";
		}
		
		mysqli_query($conn4as,$ressql);
		echo 'OSARC<->'.$resguestid.'<->'.$resinvoiceid;
		//echo $sqladd."<br>".$sqlupdates;
		//echo "<br>".$sql."<br>".$nooforderadded; 
		//save log....
		WriteToFile("../logs/".$logfilename,$reslog."\r\n=======================================\r\n");
		$params = "emsubject=New food item(s) ordered. Invoice ID: ".$resinvoiceid;
		$params .= "&msg=".$reslog;
		sendAsyncURL($httppath."/fxn/sendmail/index.php", $params);
		}
		
	}
}


if ($_POST["dwat"] == "orderswimpbarcode"){
if($_POST["clientid"] == ''){ echo "Customer name is required.";}
elseif($_POST["chkispaid"] == '' && $_POST["clientid"] == '1'){ echo "Anonymous customer's order must be marked as paid. No credit!";}
elseif ($_POST["swimpoolitem"] == ''){$e=1; $m .= 'Type of Swimming pool service is required';}
else if ($_POST["swimpoolprice"] == '' || validate($_POST["swimpoolprice"],"0-9")){$e=1; $m .= 'Price under swimming pool is required. Numeric value only no comma';}
else if ($_POST["swimpoolduration"] == ''){$e=1; $m .= 'Duration under swimming pool is required';}
else if ($_POST["swimpoolquantity"] == ''){$e=1; $m .= 'Number of person under swimming pool is required';}
else if ($_POST["swimpoolorderdate"] == '' || $_POST["swimpoolorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under swimming pool is required';}
else if (strtotime(str_replace("/","-",$_POST["swimpoolorderdate"])) < $mktoday){$e=1; $m .= 'Back date not allowed under swimming pool.';}
else if ($_POST["swimpooltotal"] == '' || validate($_POST["swimpooltotal"],"0-9")){$e=1; $m .= 'Total amount under swimming pool is required.';}
else{
		
		//insert swimming pool details
		$grandtotal = $_POST["total"];
		
		$chkispaid = $_POST["chkispaid"];
		if($chkispaid == '1'){ $flagpaid = '1'; }else{ $flagpaid = '0'; }
		$guestid = $_POST["clientid"]; 
		
		if($guestid == 1){
			$invoiceid = time();
			$InvExist = 0;
		}else{
			$invoiceid = GetAnInhouseGuestPendingInvoice($guestid);
			if($invoiceid == ''){
				$invoiceid = time();
				$InvExist = 0;
			}else{
				if($chkispaid == '1'){ $invoiceid = time(); }
				else{ $InvExist = 1; $guestroomid = getRoomIDByInvoiceId($invoiceid); }
			}
		}
		
		$time = date("Y-m-d");
		$ordertime = date("H:i");
		$log = "<br><br>[".date("Y-m-d h:i:s A")."], <br>New Swimming pool service ordered, <br>Staff: ".$_SESSION["amyn15"]."(".$_SESSION["amyi15"]."), <br>Invoice ID: ".$invoiceid;
		
		$sql = "INSERT INTO order_swimpool(invoiceid, guestid, roomid, itemid, descr, noofperson, duration, discount, unitprice, total, orderdate, ordertime, ispaid, staffid) VALUES('".mysqli_real_escape_string($conn4as,$invoiceid)."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$guestroomid)."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolitem"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolitemdescr"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolquantity"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolduration"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpooldiscount"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolprice"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpooltotal"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolorderdate"])."','".mysqli_real_escape_string($conn4as,$ordertime)."','".mysqli_real_escape_string($conn4as,$flagpaid)."','".mysqli_real_escape_string($conn4as,$globalid)."')";
		 mysqli_query($conn4as,$sql);
		 
		 $log .= ", <br><br>SERVICE: Swimming Pool, <br>".get4Email("SELECT name FROM addswimpool WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["swimpoolitem"])." ORDER BY id","name","Name")." NO OF PERSON: ".$_POST["swimpoolquantity"]." DURATION: ".$_POST["swimpoolduration"].' per '.$_POST["swimpoolhidmeas"].", <br>TOTAL AMOUNT: ".$_POST["swimpooltotal"];
		
		if($InvExist == '1'){
			$sql = "UPDATE orders SET issync = '2', isswimpool = '1', total = total + ".mysqli_real_escape_string($conn4as,$_POST["swimpooltotal"])." WHERE invoiceid = '".mysqli_real_escape_string($conn4as,$invoiceid)."' AND guestid = '".mysqli_real_escape_string($conn4as,$_POST["clientid"])."'";
		}else{
			$sql = "INSERT INTO orders(invoiceid, guestid, roomid, isroom, isbar, isbar2, issport, isspa, isswimpool, islaundary, isrestaurant, orderdate, ordertime, total,ispaid) VALUES('".mysqli_real_escape_string($conn4as,$invoiceid)."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$guestroomid)."','0','0','0','0','0','1','0','0','".mysqli_real_escape_string($conn4as,$time)."','".mysqli_real_escape_string($conn4as,$ordertime)."','".mysqli_real_escape_string($conn4as,$_POST["swimpooltotal"])."','".mysqli_real_escape_string($conn4as,$flagpaid)."')";
		}
		
		mysqli_query($conn4as,$sql);
		echo 'OSASP<->'.$_POST["clientid"].'<->'.$invoiceid;
		
		WriteToFile("../logs/".$logfilename,$log."\r\n=======================================\r\n");
		$params = "emsubject=New swimming pool service ordered. Invoice ID: ".$invoiceid;
		$params .= "&msg=".$log;
		sendAsyncURL($httppath."/fxn/sendmail/index.php", $params);		
	}
}


if ($_POST["dwat"] == "orderswimpbarcode2"){
if($_POST["clientid"] == ''){ echo "Customer name is required.";}
elseif($_POST["chkispaid"] == '' && $_POST["clientid"] == '1'){ echo "Anonymous customer's order must be marked as paid. No credit!";}
elseif ($_POST["swimpoolitem"] == ''){$e=1; $m .= 'Type of Swimming pool service is required';}
else if ($_POST["swimpoolprice"] == '' || validate($_POST["swimpoolprice"],"0-9")){$e=1; $m .= 'Price under swimming pool is required. Numeric value only no comma';}
else if ($_POST["swimpoolduration"] == ''){$e=1; $m .= 'Duration under swimming pool is required';}
else if ($_POST["swimpoolquantity"] == ''){$e=1; $m .= 'Number of person under swimming pool is required';}
else if ($_POST["swimpoolorderdate"] == '' || $_POST["swimpoolorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under swimming pool is required';}
else if (strtotime(str_replace("/","-",$_POST["swimpoolorderdate"])) < $mktoday){$e=1; $m .= 'Back date not allowed under swimming pool.';}
else if ($_POST["swimpooltotal"] == '' || validate($_POST["swimpooltotal"],"0-9")){$e=1; $m .= 'Total amount under swimming pool is required.';}
else{
		
		//insert swimming pool details
		$grandtotal = $_POST["total"];
		
		$chkispaid = $_POST["chkispaid"];
		if($chkispaid == '1'){ $flagpaid = '1'; }else{ $flagpaid = '0'; }
		$guestid = $_POST["clientid"];
		
		if($guestid == 1){
			$invoiceid = time();
			$InvExist = 0;
		}else{
			$invoiceid = GetAnInhouseGuestPendingInvoice($guestid);
			if($invoiceid == ''){
				$invoiceid = time();
				$InvExist = 0;
			}else{
				if($chkispaid == '1'){ $invoiceid = time(); }
				else{ $InvExist = 1; $guestroomid = getRoomIDByInvoiceId($invoiceid); }
			}
		}
		
		$time = date("Y-m-d");
		$ordertime = date("H:i");
		$log = "<br><br>[".date("Y-m-d h:i:s A")."], <br>New Swimming pool service ordered, <br>Staff: ".$_SESSION["amyn15"]."(".$_SESSION["amyi15"]."), <br>Invoice ID: ".$invoiceid;
		
		$sql = "INSERT INTO order_swimpool(invoiceid, guestid, roomid, itemid, descr, noofperson, duration, discount, unitprice, total, orderdate, ordertime, ispaid, staffid) VALUES('".mysqli_real_escape_string($conn4as,$invoiceid)."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$guestroomid)."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolitem"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolitemdescr"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolquantity"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolduration"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpooldiscount"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolprice"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpooltotal"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolorderdate"])."','".mysqli_real_escape_string($conn4as,$ordertime)."','".mysqli_real_escape_string($conn4as,$flagpaid)."','".mysqli_real_escape_string($conn4as,$globalid)."')";
		 mysqli_query($conn4as,$sql);
		 
		 $log .= ", <br><br>SERVICE: Swimming Pool, <br>".get4Email("SELECT name FROM addswimpool WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["swimpoolitem"])." ORDER BY id","name","Name")." NO OF PERSON: ".$_POST["swimpoolquantity"]." DURATION: ".$_POST["swimpoolduration"].' per '.$_POST["swimpoolhidmeas"].", <br>TOTAL AMOUNT: ".$_POST["swimpooltotal"];
		
		if($InvExist == '1'){
			$sql = "UPDATE orders SET issync = '2', isswimpool = '1', total = total + ".mysqli_real_escape_string($conn4as,$_POST["swimpooltotal"])." WHERE invoiceid = '".mysqli_real_escape_string($conn4as,$invoiceid)."' AND guestid = '".mysqli_real_escape_string($conn4as,$_POST["clientid"])."'";
		}else{
			$sql = "INSERT INTO orders(invoiceid, guestid, roomid, isroom, isbar, isbar2, issport, isspa, isswimpool, islaundary, isrestaurant, orderdate, ordertime, total,ispaid) VALUES('".mysqli_real_escape_string($conn4as,$invoiceid)."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$guestroomid)."','0','0','0','0','0','1','0','0','".mysqli_real_escape_string($conn4as,$time)."','".mysqli_real_escape_string($conn4as,$ordertime)."','".mysqli_real_escape_string($conn4as,$_POST["swimpooltotal"])."','".mysqli_real_escape_string($conn4as,$flagpaid)."')";
		}
		
		mysqli_query($conn4as,$sql);
		echo 'OSASP2<->'.$_POST["clientid"].'<->'.$invoiceid;
		
		WriteToFile("../logs/".$logfilename,$log."\r\n=======================================\r\n");
		$params = "emsubject=New swimming pool service ordered. Invoice ID: ".$invoiceid;
		$params .= "&msg=".$log;
		sendAsyncURL($httppath."/fxn/sendmail/index.php", $params);		
	}
}

// order 
if ($_POST["dwat"] == "order"){
	//booking
	// ('.strtotime(str_replace("/","-",$_POST["checkin"])).' - '.$mktoday.')
	//$_POST["pay4rmewallet"] == '1'
	if ($_POST["clientid"] == ''){$e=1; $m .= 'Client name is required';}
	elseif($_POST["clientid"] == '1'){ $clientid = 1; $roomID = ''; }
	elseif($_POST["clientid"] != '1' && $_POST["clientid"] != ''){ 
			$resArr = [];
			RoomInfoByGuestID($_POST["clientid"]);
			if(count($resArr) > 0){
				$roomID = $resArr["roomid"];
				$roomType = $resArr["roomType"];
				$clientid = $resArr["guestid"];
				$roomInvID = $resArr["invoiceid"];
			}
			if($clientid == ''){ $e = 1; $m .= 'Client information is missing. Check if client is still in the room.'; }
			if($roomID == ''){ $e = 1; $m .= 'Room information is missing. Check if client is still in the room.'; }
	}
	
	if (isset($_POST["chkroom"])){
		if ($_POST["room_type"] == ''){$e=1; $m .= 'Room type is required';}
		else if ($_POST["roomrate"] == '' || validate($_POST["roomrate"],"0-9")){$e=1; $m .= 'Room unit price is required. Only numeric value is allowed. No comma';}
		else if ($_POST["roomleft"] == 0 || $_POST["roomleft"] == ''){$e=1; $m .= 'Room not available.';}
		else if ($_POST["noofroom"] == ''){$e=1; $m .= 'Number of room is required';}
		else if ($_POST["roomleft"] < $_POST["noofroom"]){$e=1; $m .= 'Room not enough.';}
		else if ($_POST["pay4rmewallet"] == '1' && !isDepositEnough($clientid,$_POST["bookingtotal"]) ){$e=1; $m .= 'Insufficient fund in customer\'s e-wallet.';}
		
		else if ($_POST["noofperson"] == ''){$e=1; $m .= 'Number of person to occupy the room is required';}
		else if (strtotime(str_replace("/","-",$_POST["checkin"])) < $mktoday){$e=1; $m .= 'Back date is not allowed. Check your check in date';}
		else if (strtotime(str_replace("/","-",$_POST["checkout"])) < $mktoday){$e=1; $m .= 'Back date is not allowed. Check your check out date';}
		else if ($_POST["checkin"] == '' || $_POST["checkin"] == 'mm/dd/yyyy'){$e=1; $m .= 'Date to check in is required';}
		else if ($_POST["checkout"] == '' || $_POST["checkout"] == 'mm/dd/yyyy'){$e=1; $m .= 'Date to check out is required';}
		else if ($_POST["duration"] == '' || $_POST["duration"] == '0'){$e=1; $m .= 'Duration is required.';}
		else if ($_POST["bookingtotal"] == '' || $_POST["bookingtotal"] == '0' || validate($_POST["bookingtotal"],"0-9")){$e=1; $m .= 'Total amount under reservation is required and can not be zero. Only numeric value allowed. No comma';}
		else if(validateB4ClaimingRoom($_POST["checkin"],$_POST["checkout"],$_POST["room_type"],'reserve') && $_POST['reserveid'] == ''){ $e=1; $m .= 'Room has already been reserved, choose another room.'; }
		else if(validateB4ClaimingRoom($_POST["checkin"],$_POST["checkout"],$_POST["room_type"],'isin')){ $e=1; $m .= 'Room has already been occupied. Check-out customer in the room to check-in new customer'; }
	}
	//Bar
	if (isset($_POST["chkbar"])){
		if ($_POST["baritem"] == ''){$e=1; $m .= 'Bar item is required';}
		else if ($_POST["barprice"] == '' || validate($_POST["barprice"],"0-9")){$e=1; $m .= 'Bar item unit price is required. Numeric value only, no comma';}
		else if ($_POST["barquantity"] == ''){$e=1; $m .= 'Quantity under bar service is required';}
		else if ($_POST["barleft"] < $_POST["barquantity"]){$e=1; $m .= 'Item (drink) not enough.';}
		else if ($_POST["barorderdate"] == '' || $_POST["barorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under bar service is required';}
		else if (strtotime(str_replace("/","-",$_POST["barorderdate"])) < $mktoday){$e=1; $m .= 'Back date not allowed.';}
		else if ($_POST["bartotal"] == '' || validate($_POST["bartotal"],"0-9")){$e=1; $m .= 'Total amount under bar is required. Numeric value only. no comma';}
	}
	
	//restaurant
	if (isset($_POST["chkrestaurant"])){
		if ($_POST["resitem"] == ''){$e=1; $m .= 'food item is required';}
		else if ($_POST["resprice"] == '' || validate($_POST["resprice"],"0-9")){$e=1; $m .= 'food item unit price is required. Numeric value only no comma';}
		else if ($_POST["resquantity"] == ''){$e=1; $m .= 'Quantity of food order is required';}
		else if ($_POST["resorderdate"] == '' || $_POST["resorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under restaurant service is required';}
		else if (strtotime(str_replace("/","-",$_POST["resorderdate"])) < $mktoday){$e=1; $m .= 'Back date not allowed.';}
		else if ($_POST["restotal"] == '' || validate($_POST["restotal"],"0-9")){$e=1; $m .= 'Total amount under restaurant service is required. Numeric value only no comma';}
	}
	//laundary
	if (isset($_POST["chklaundary"])){
		foreach($_POST["inplauitem"] as $lauitem){ if ($lauitem == ''){$e=1; $m .= 'Laundry service type is required';} }
		foreach($_POST["inplauprice"] as $lauprice){ if ($lauprice == '' || validate($lauprice,"0-9")){$e=1; $m .= 'One or more unit price(s) not correct. Numeric value only no comma';} }
		//if ($_POST["lauitem"][0] == ''){$e=1; $m .= 'Laundry service type is required';}
		//else if ($_POST["lauprice"] == '' || validate($_POST["lauprice"],"0-9")){$e=1; $m .= 'Unit price under laundary is required. Numeric value only no comma';}
		if ($_POST["lauorderdate"] == '' || $_POST["lauorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under laundary is required';}
		else if (strtotime(str_replace("/","-",$_POST["lauorderdate"])) < $mktoday){$e=1; $m .= 'Back date not allowed.';}
		else if ($_POST["lautotal"] == '' || validate($_POST["lautotal"],"0-9")){$e=1; $m .= 'Sub-total under laundary is required. Numeric value only no comma.';}
	}
	//spa service
	if (isset($_POST["chkspa"])){
		if ($_POST["spaitem"] == ''){$e=1; $m .= 'Type of Spa service is required';}
		else if ($_POST["spaprice"] == '' || validate($_POST["spaprice"],"0-9")){$e=1; $m .= 'Price under spa is required. Numeric value only no comma';}
		else if ($_POST["spaquantity"] == ''){$e=1; $m .= 'Quantity under spa is required';}
		else if ($_POST["spaorderdate"] == '' || $_POST["spaorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under spa is required';}
		else if (strtotime(str_replace("/","-",$_POST["spaorderdate"])) < $mktoday){$e=1; $m .= 'Back date not allowed.';}
		else if ($_POST["spatotal"] == '' || validate($_POST["spatotal"],"0-9")){$e=1; $m .= 'Total amount under spa is required. Numeric value only no comma';}
	}
	//swimpool service
	if (isset($_POST["chkswimpool"])){
		if ($_POST["swimpoolitem"] == ''){$e=1; $m .= 'Type of Swimming pool service is required';}
		else if ($_POST["swimpoolprice"] == '' || validate($_POST["swimpoolprice"],"0-9")){$e=1; $m .= 'Price under swimming pool is required. Numeric value only no comma';}
		else if ($_POST["swimpoolduration"] == ''){$e=1; $m .= 'Duration under swimming pool is required';}
		else if ($_POST["swimpoolquantity"] == ''){$e=1; $m .= 'Number of person under swimming pool is required';}
		else if ($_POST["swimpoolorderdate"] == '' || $_POST["swimpoolorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under swimming pool is required';}
		else if (strtotime(str_replace("/","-",$_POST["swimpoolorderdate"])) < $mktoday){$e=1; $m .= 'Back date not allowed under swimming pool.';}
		else if ($_POST["swimpooltotal"] == '' || validate($_POST["swimpooltotal"],"0-9")){$e=1; $m .= 'Total amount under swimming pool is required.';}
	}
	//sport service
	if (isset($_POST["chksport"])){
		if ($_POST["spoitem"] == ''){$e=1; $m .= 'Type of sport material is required';}
		//else if ($_POST["spoprice"] == ''){$e=1; $m .= 'Unit Price under sport material is required';}
		else if ($_POST["spoquantity"] == ''){$e=1; $m .= 'Quantity under sport material is required';}
		else if ($_POST["spoorderdate"] == '' || $_POST["spoorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under sport material is required';}
		else if (strtotime(str_replace("/","-",$_POST["spoorderdate"])) < $mktoday){$e=1; $m .= 'Back date not allowed.';}
		else if ($_POST["spototal"] == '' || validate($_POST["spototal"],"0-9")){$e=1; $m .= 'Total amount under sport material is required. Numeric value only no comma';}
	}
	
	//Make Payment and Do Status.....
		 if($_POST["paystatus"] == '1'){
		 	$tagispaid = deductMyWallet($clientid,$_POST["grandtotal"]);
			if($tagispaid != '1'){ $e = 1; $m .= 'Insufficient fund in e-wallet.'; }
		 }else if($_POST["paystatus"] == '2'){
		 	$tagispaid = 1;
		 }else{
		 	$tagispaid = '0';
		 }
		 
	//............
	if ($e == 1){
		echo $m;
	}else{
		
		 $time = date("Y-m-d");
		 $ordertime = date("H:i");
		 
		 $log = "<br><br>[".date("y/m/d h:i:s A")."], <br>New Order Added, <br>BY STAFF: ".$_SESSION["amyn15"]."(".$_SESSION["amyi15"]."), <br>INVOICE ID: ".$_POST["invoiceid"]; 
		 		
		//insert laundary
		if (isset($_POST["chklaundary"])){
			 
			 foreach($_POST["inplauitem"] as $k=>$lauitem){
			 	$inplauitem = $lauitem;
				$inplauprice = $_POST["inplauprice"][$k];
				$inplaudiscount = $_POST["inplaudiscount"][$k];
				$inplautotal = $_POST["inplautotal"][$k];
				$sqllau .= ($sqllau == '')?" VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$clientid)."','".mysqli_real_escape_string($conn4as,$roomID)."','".mysqli_real_escape_string($conn4as,$inplauitem)."','".mysqli_real_escape_string($conn4as,$_POST["lauitemdescr"])."','".mysqli_real_escape_string($conn4as,$inplaudiscount)."','".mysqli_real_escape_string($conn4as,$inplauprice)."','".mysqli_real_escape_string($conn4as,$inplautotal)."','".mysqli_real_escape_string($conn4as,$_POST["lauorderdate"])."','".mysqli_real_escape_string($conn4as,$ordertime)."','".mysqli_real_escape_string($conn4as,$tagispaid)."','".mysqli_real_escape_string($conn4as,$globalid)."')":",('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$clientid)."','".mysqli_real_escape_string($conn4as,$roomID)."','".mysqli_real_escape_string($conn4as,$inplauitem)."','".mysqli_real_escape_string($conn4as,$_POST["lauitemdescr"])."','".mysqli_real_escape_string($conn4as,$inplaudiscount)."','".mysqli_real_escape_string($conn4as,$inplauprice)."','".mysqli_real_escape_string($conn4as,$inplautotal)."','".mysqli_real_escape_string($conn4as,$_POST["lauorderdate"])."','".mysqli_real_escape_string($conn4as,$ordertime)."','".mysqli_real_escape_string($conn4as,$tagispaid)."','".mysqli_real_escape_string($conn4as,$globalid)."')";
			 }
		 
		 $sql = "INSERT INTO order_laundary(invoiceid, guestid, roomid, itemid, descr, discount, unitprice, total, orderdate, ordertime, ispaid,staffid) ".$sqllau;
		 mysqli_query($conn4as,$sql);
		 $l = '1'; $nooforderadded += 1;
		 //$log .= ", <br><br>SERVICE: Laundary, <br>".get4Email("SELECT title FROM addlaundary WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["lauitem"])." ORDER BY id","title","Item Name")." QUANTITY: ".$_POST["barquantity"].", <br>TOTAL AMOUNT: ".$_POST["lautotal"];
		}else{
		 $l = '0';
		}
		
		/*//insert restaurant
		if (isset($_POST["chkrestaurant"])){
		  $sql = "INSERT INTO order_restaurant(invoiceid, guestid, itemid, descr, qty, discount, unitprice, total, orderdate, ordertime, ispaid,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$clientid)."','".mysqli_real_escape_string($conn4as,$_POST["resitem"])."','".mysqli_real_escape_string($conn4as,$_POST["resitemdescr"])."','".mysqli_real_escape_string($conn4as,$_POST["resquantity"])."','".mysqli_real_escape_string($conn4as,$_POST["resdiscount"])."','".mysqli_real_escape_string($conn4as,$_POST["resprice"])."','".mysqli_real_escape_string($conn4as,$_POST["restotal"])."','".mysqli_real_escape_string($conn4as,$_POST["resorderdate"])."','".mysqli_real_escape_string($conn4as,$ordertime)."','0','".mysqli_real_escape_string($conn4as,$globalid)."')";
		 mysqli_query($conn4as,$sql);
		 $res = '1'; $nooforderadded += 1;
		 $log .= ", <br><br>SERVICE: Restaurant, <br>".get4Email("SELECT addresturant.name,tblcategory.catname FROM addresturant INNER JOIN tblcategory ON addresturant.categoryid = tblcategory.id WHERE addresturant.id = ".mysqli_real_escape_string($conn4as,$_POST["resitem"])." ORDER BY addresturant.id","name,catname","Food Name,Food Type")." QUANTITY: ".$_POST["resquantity"].", <br>TOTAL AMOUNT: ".$_POST["restotal"];
		 
		}else{
		 $res = '0';
		}*/
		
		//insert spa
		if (isset($_POST["chkspa"])){
		$sql = "INSERT INTO order_spa(invoiceid, guestid, roomid,itemid, descr, noofperson, discount, unitprice, total, orderdate, ordertime,ispaid,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$clientid)."','".mysqli_real_escape_string($conn4as,$roomID)."','".mysqli_real_escape_string($conn4as,$_POST["spaitem"])."','".mysqli_real_escape_string($conn4as,$_POST["spaitemdescr"])."','".mysqli_real_escape_string($conn4as,$_POST["spaquantity"])."','".mysqli_real_escape_string($conn4as,$_POST["spadiscount"])."','".mysqli_real_escape_string($conn4as,$_POST["spaprice"])."','".mysqli_real_escape_string($conn4as,$_POST["spatotal"])."','".mysqli_real_escape_string($conn4as,$_POST["spaorderdate"])."','".mysqli_real_escape_string($conn4as,$ordertime)."','".mysqli_real_escape_string($conn4as,$tagispaid)."','".mysqli_real_escape_string($conn4as,$globalid)."')";
		 mysqli_query($conn4as,$sql);
		 $spa = '1'; $nooforderadded += 1;
		 $log .= ", <br><br>SERVICE: Spa, <br>".get4Email("SELECT name FROM addspa WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["spaitem"])." ORDER BY id","name","Name")." NO OF PERSON: ".$_POST["spaquantity"].", <br>TOTAL AMOUNT: ".$_POST["spatotal"];
		}else{
		 $spa = '0';
		}
		
		
		//insert swimpool
		if (isset($_POST["chkswimpool"])){
		$sql = "INSERT INTO order_swimpool(invoiceid, guestid, roomid, itemid, descr, noofperson, duration, discount, unitprice, total, orderdate, ordertime, ispaid,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$clientid)."','".mysqli_real_escape_string($conn4as,$roomID)."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolitem"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolitemdescr"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolquantity"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolduration"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpooldiscount"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolprice"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpooltotal"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolorderdate"])."','".mysqli_real_escape_string($conn4as,$ordertime)."','".mysqli_real_escape_string($conn4as,$tagispaid)."','".mysqli_real_escape_string($conn4as,$globalid)."')";
		 mysqli_query($conn4as,$sql);
		 $swimpool = '1'; $nooforderadded += 1;
		 $log .= ", <br><br>SERVICE: Swimming Pool Service, <br>".get4Email("SELECT name FROM addswimpool WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["swimpoolitem"])." ORDER BY id","name","Name")." NO OF PERSON: ".$_POST["swimpoolquantity"]." DURATION: ".$_POST["swimpoolduration"].' per '.$_POST["swimpoolhidmeas"].", <br>TOTAL AMOUNT: ".$_POST["swimpooltotal"];
		}else{
		 $swimpool = '0';
		}
		
		
		//insert sport materials
		if (isset($_POST["chksport"])){
		 $sql = "INSERT INTO order_sportitem(invoiceid, guestid, roomid, itemid, descr, tranxtype, qty, discount, unitprice, total, orderdate, ordertime, ispaid,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$clientid)."','".mysqli_real_escape_string($conn4as,$roomID)."','".mysqli_real_escape_string($conn4as,$_POST["spoitem"])."','".mysqli_real_escape_string($conn4as,$_POST["spoitemdescr"])."','".mysqli_real_escape_string($conn4as,$_POST["tranxtype"])."','".mysqli_real_escape_string($conn4as,$_POST["spoquantity"])."','".mysqli_real_escape_string($conn4as,$_POST["spodiscount"])."','".mysqli_real_escape_string($conn4as,$_POST["spoprice"])."','".mysqli_real_escape_string($conn4as,$_POST["spototal"])."','".mysqli_real_escape_string($conn4as,$_POST["spoorderdate"])."','".mysqli_real_escape_string($conn4as,$ordertime)."','".mysqli_real_escape_string($conn4as,$tagispaid)."','".mysqli_real_escape_string($conn4as,$globalid)."')";
		 mysqli_query($conn4as,$sql);
		 $spo = '1'; $nooforderadded += 1;
		 $log .= ", <br><br>SERVICE: Sport Materials, <br>".get4Email("SELECT name FROM addsport WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["spoitem"])." ORDER BY id","name","Item Name")." QUANTITY: ".$_POST["spoquantity"].", <br>TOTAL AMOUNT: ".$_POST["spototal"];
		}else{
		 $spo = '0';
		}
		
		//insert to orders table
		if ($nooforderadded < 1){
			echo 'No item ordered.';
		}else{
			if($r == '1' && $b != '1' && $spo != '1' && $spa != '1' && $swimpool != '1' && $l != '1' && $res != '1'){
			$sql = "INSERT INTO orders(invoiceid, guestid, roomid, isroom, isbar, issport, isspa, isswimpool, islaundary, isrestaurant, orderdate, ordertime, total,ispaid,issync) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$clientid)."','".mysqli_real_escape_string($conn4as,$roomID)."','".mysqli_real_escape_string($conn4as,$r)."','".mysqli_real_escape_string($conn4as,$b)."','".mysqli_real_escape_string($conn4as,$spo)."','".mysqli_real_escape_string($conn4as,$spa)."','".mysqli_real_escape_string($conn4as,$swimpool)."','".mysqli_real_escape_string($conn4as,$l)."','".mysqli_real_escape_string($conn4as,$res)."','".mysqli_real_escape_string($conn4as,$time)."','".mysqli_real_escape_string($conn4as,$ordertime)."','".mysqli_real_escape_string($conn4as,$_POST["grandtotal"])."','".mysqli_real_escape_string($conn4as,$tagispaid)."','0')";
			}else{
			$sql = "INSERT INTO orders(invoiceid, guestid, roomid, isroom, isbar, issport, isspa, isswimpool, islaundary, isrestaurant, orderdate, ordertime, total,ispaid,issync) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$clientid)."','".mysqli_real_escape_string($conn4as,$roomID)."','".mysqli_real_escape_string($conn4as,$r)."','".mysqli_real_escape_string($conn4as,$b)."','".mysqli_real_escape_string($conn4as,$spo)."','".mysqli_real_escape_string($conn4as,$spa)."','".mysqli_real_escape_string($conn4as,$swimpool)."','".mysqli_real_escape_string($conn4as,$l)."','".mysqli_real_escape_string($conn4as,$res)."','".mysqli_real_escape_string($conn4as,$time)."','".mysqli_real_escape_string($conn4as,$ordertime)."','".mysqli_real_escape_string($conn4as,$_POST["grandtotal"])."','".mysqli_real_escape_string($conn4as,$tagispaid)."','0')";
			}
		 mysqli_query($conn4as,$sql);
		 ////////////////////////////save log....
		 WriteToFile("../logs/".$logfilename,$log."\r\n=======================================\r\n");
		 $params = "emsubject=New order made. Invoice ID: ".$_POST["invoiceid"]."&msg=".$log;
		 sendAsyncURL($httppath."/fxn/sendmail/index.php", $params);
		 ////////////////////////////////////////////
		 if($r == '1'){
		 	//remove from reservation.....if
			if($_POST['reserveid'] != ''){
				mysqli_query($conn4as,"DELETE FROM tblschedule WHERE id = '".mysqli_real_escape_string($conn4as,$_POST['reserveid'])."'");
			}
			echo 'OSAR<->'.$clientid;
		 }else{
		 	echo 'OSA<->'.$clientid;
		 }
		 
		}
		
	}
}

if ($_POST["dwat"] == "cancelorder"){
	if ($_POST["id"] == ''){echo 'Undefined record.';}
	else{
		if(uORd('update onlineorders SET issync = "2", status = "3" WHERE id = '.mysqli_real_escape_string($conn4as,$_POST["id"]))){
		echo 'Order successfully cancelled';
		$log = "[".date("y/m/d h:i:s A")."], <br>Order cancelled, <br>BY STAFF: ".$_SESSION["amyn15"]."(".$_SESSION["amyi15"].")\r\n=======================================\r\n"; 
		WriteToFile("../logs/".$logfilename,$log);
		}else{
			echo 'Cancelling order aborted.';
		}
	}
}


if ($_POST["dwat"] == "delorder"){
	if ($_POST["invoiceid"] == ''){echo 'Undefined record.';}
	else{
		if(delete('orders',"invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'")){
		delete('order_room',"invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		delete('order_restaurant',"invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		delete('order_bar',"invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		delete('order_bar2',"invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		delete('order_spa',"invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		delete('order_swimpool',"invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		delete('order_sportitem',"invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		delete('order_laundary',"invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
			echo 'deleted';
			$log = "[".date("y/m/d h:i:s A")."], <br>Order deleted, <br>BY STAFF: ".$_SESSION["amyn15"]."(".$_SESSION["amyi15"]."), <br>INVOICE ID: ".$_POST["invoiceid"]."\r\n=======================================\r\n"; 
			WriteToFile("../logs/".$logfilename,$log);
		}else{
			echo 'Could not delete record.';
		}
	}
}

//////// BAR 1 DELETE ///////////
if ($_POST["dwat"] == "delbarorder"){
	if ($_POST["invoiceid"] == ''){echo 'Undefined record.';}
	else{
		$howmuch = 0;
		$howmany = getBarRecCountsByInvoice('bar',$_POST["invoiceid"],$_POST["id"]);
		$qry = mysqli_query($conn4as,"SELECT id,isroom,isbar,isbar2,issport,isspa,islaundary,isrestaurant,isswimpool FROM orders WHERE invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."' ORDER BY id");
		$total = mysqli_num_rows($qry);
		if($total > 0){
			while($rs = mysqli_fetch_assoc($qry)){
				$id = $rs["id"];
				$isroom = $rs["isroom"];
				$isbar = $rs["isbar"];
				$isbar2 = $rs["isbar2"];
				$issport = $rs["issport"];
				$isspa = $rs["isspa"];
				$islaundary = $rs["islaundary"];
				$isrestaurant = $rs["isrestaurant"];
				$isswimpool = $rs["isswimpool"];
				if($isbar == '1' && ($isroom <> "1" && $isbar2 <> "1" && $issport <> "1" && $isspa <> "1" && $islaundary <> "1" && $isrestaurant <> "1" && $isswimpool <> "1")){
					//check how many in bar....
					if($howmany > 1){
					delete('order_bar',"id = '".mysqli_real_escape_string($conn4as,$_POST["id"])."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
					uORd("UPDATE orders SET issync = '2', total = total - '".mysqli_real_escape_string($conn4as,$howmuch)."' WHERE id = '".mysqli_real_escape_string($conn4as,$id)."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");	
					}else{
						delete('order_bar',"id = '".mysqli_real_escape_string($conn4as,$_POST["id"])."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
						delete('orders',"id = '".mysqli_real_escape_string($conn4as,$id)."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");	
					}
				}else{
					if($howmany > 1){
						delete('order_bar',"id = '".mysqli_real_escape_string($conn4as,$_POST["id"])."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
						uORd("UPDATE orders SET issync = '2', total = total - '".mysqli_real_escape_string($conn4as,$howmuch)."' WHERE id = '".mysqli_real_escape_string($conn4as,$id)."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");	
					}else{
						delete('order_bar',"id = '".mysqli_real_escape_string($conn4as,$_POST["id"])."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
						uORd("UPDATE orders SET issync = '2', isbar = '0',total = total - '".mysqli_real_escape_string($conn4as,$howmuch)."' WHERE id = '".mysqli_real_escape_string($conn4as,$id)."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
					}
				}
			}
			
			echo 'deleted';
			$log = "[".date("y/m/d h:i:s A")."], <br>Order from bar 1 deleted, <br>BY STAFF: ".$_SESSION["amyn15"]."(".$_SESSION["amyi15"]."), <br>INVOICE ID: ".$_POST["invoiceid"]."\r\n=======================================\r\n"; 
			WriteToFile("../logs/".$logfilename,$log);
			
		}else{
			echo 'Could not delete record.';
		}
	}
}

//////// BAR 2 DELETE ///////////
if ($_POST["dwat"] == "delbar2order"){
	if ($_POST["invoiceid"] == ''){echo 'Undefined record.';}
	else{
		$howmuch = 0;
		$howmany = getBarRecCountsByInvoice('bar2',$_POST["invoiceid"],$_POST["id"]);
		$qry = mysqli_query($conn4as,"SELECT id,isroom,isbar,isbar2,issport,isspa,islaundary,isrestaurant,isswimpool FROM orders WHERE invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."' ORDER BY id");
		$total = mysqli_num_rows($qry);
		if($total > 0){
			while($rs = mysqli_fetch_assoc($qry)){
				$id = $rs["id"];
				$isroom = $rs["isroom"];
				$isbar = $rs["isbar"];
				$isbar2 = $rs["isbar2"];
				$issport = $rs["issport"];
				$isspa = $rs["isspa"];
				$islaundary = $rs["islaundary"];
				$isrestaurant = $rs["isrestaurant"];
				$isswimpool = $rs["isswimpool"];
				if($isbar2 == '1' && ($isroom <> "1" && $isbar <> "1" && $issport <> "1" && $isspa <> "1" && $islaundary <> "1" && $isrestaurant <> "1" && $isswimpool <> "1")){
					if($howmany > 1){
					delete('order_bar2',"id = '".mysqli_real_escape_string($conn4as,$_POST["id"])."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
					uORd("UPDATE orders SET issync = '2', total = total - '".mysqli_real_escape_string($conn4as,$howmuch)."' WHERE id = '".mysqli_real_escape_string($conn4as,$id)."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");	
					}else{
						delete('order_bar2',"id = '".mysqli_real_escape_string($conn4as,$_POST["id"])."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
						delete('orders',"id = '".mysqli_real_escape_string($conn4as,$id)."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");	
					}
				}else{
					if($howmany > 1){
						delete('order_bar2',"id = '".mysqli_real_escape_string($conn4as,$_POST["id"])."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
						uORd("UPDATE orders SET issync = '2', total = total - '".mysqli_real_escape_string($conn4as,$howmuch)."' WHERE id = '".mysqli_real_escape_string($conn4as,$id)."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");	
					}else{
						delete('order_bar2',"id = '".mysqli_real_escape_string($conn4as,$_POST["id"])."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
						uORd("UPDATE orders SET issync = '2', isbar2 = '0',total = total - '".mysqli_real_escape_string($conn4as,$howmuch)."' WHERE id = '".mysqli_real_escape_string($conn4as,$id)."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
					}
				}
			}
			
			echo 'deleted';
			$log = "[".date("y/m/d h:i:s A")."], <br>Order from bar 2 deleted, <br>BY STAFF: ".$_SESSION["amyn15"]."(".$_SESSION["amyi15"]."), <br>INVOICE ID: ".$_POST["invoiceid"]."\r\n=======================================\r\n"; 
			WriteToFile("../logs/".$logfilename,$log);
			
		}else{
			echo 'Could not delete record.';
		}
	}
}
//////////////////
if ($_POST["dwat"] == "delshift"){
	if ($_POST["id"] == ''){echo 'Undefined record.';}
	else{
		$qry = mysqli_query($conn4as,"SELECT id,xlsurl FROM tblshifts WHERE id = '".mysqli_real_escape_string($conn4as,$_POST["id"])."'");
		$rs = mysqli_fetch_assoc($qry);
		$xlsurl = $rs["xlsurl"];
		
		if(delete('tblshifts',"id = '".mysqli_real_escape_string($conn4as,$_POST["id"])."'")){
			unlink("../backup/shifts/".$xlsurl);
			echo 'deleted';
		}else{
			echo 'Could not delete record.';
		}
	}
}

//tag check in and out
if ($_POST["dwat"] == "doinout"){
	if ($_POST["id"] == ''){echo 'Undefined record.';}
	else{
			if ($_POST["s"] == 'in'){
			/*
			
			$sql = select("SELECT noofroom FROM order_room WHERE id =".mysqli_real_escape_string($conn4as,$_POST["id"]));
		
		if ($sql){
		$rs = mysqli_fetch_assoc($qry);
		$noofrm = $rs["noofroom"];
		
			if ($noofrm > 0){
				$roomno = getField("SELECT roomType FROM addroom WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["roomid"]), "roomType");
				
			}else{
				echo 'Room count failed. Operation aborted.';
			}
		}else{
				echo 'Operation aborted. Data could not be accessed.';
		}
			*/
				//$sql = select("SELECT noofroom FROM order_room WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["id"]));
				//if ($sql){
				$roomno = getField("SELECT roomType FROM addroom WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["roomid"]), "roomType");
				uORd("update order_room SET issync = '2', checkstatus = 'in' where id = ".mysqli_real_escape_string($conn4as,$_POST["id"]));
				uORd("update addroom SET issync = '2', roomleft = '0',currentinv = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."' where id = ".mysqli_real_escape_string($conn4as,$_POST["roomid"]));
				echo 'doinout<->'.$_POST["invoiceid"].'<->Customer has been successfully checked in. Invoice ID is '.$_POST["invoiceid"];
				
				$log = "[".date("y/m/d h:i:s A")."], <br>Customer Checked In, <br>BY STAFF: ".$_SESSION["amyn15"]."(ID: ".$_SESSION["amyi15"]."), <br>ROOM: ".$roomno.", <br>INVOICE ID: ".$_POST["invoiceid"]."\r\n=======================================\r\n"; 
				WriteToFile("../logs/".$logfilename,$log);
				
				$params = "emsubject=Guest checked in. Invoice ID: ".$_POST["invoiceid"];
		 		$params .= "&msg=".$log;
		 		sendAsyncURL($httppath."/fxn/sendmail/index.php", $params);
		 		//}else{ }
			}elseif ($_POST["s"] == 'out'){
				mysqli_query($conn4as,"UPDATE order_room SET issync = '2', checkstatus = 'out' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["id"]));
				mysqli_query($conn4as,"UPDATE addroom SET issync = '2', roomleft = '1',currentinv = '' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["roomid"]));
				echo 'doinout<->'.$_POST["invoiceid"].'<->Customer has been successfully checked out. Invoice ID is '.$_POST["invoiceid"];
				
				$log = "[".date("y/m/d h:i:s A")."], <br>Guest Checked Out, <br>BY STAFF: ".$_SESSION["amyn15"]."(".$_SESSION["amyi15"]."), <br>ROOM: ".$roomno.", <br>INVOICE ID: ".$_POST["invoiceid"]."\r\n=======================================\r\n"; 
				WriteToFile("../logs/".$logfilename,$log);
				$params = "emsubject=Guest checked out. Invoice ID: ".$_POST["invoiceid"];
		 		$params .= "&msg=".$log;
		 		sendAsyncURL($httppath."/fxn/sendmail/index.php", $params);
			}
				///////////////////////////
	}
}

if ($_POST["dwat"] == "flagorder"){
	if ($_POST["invoiceid"] == ''){echo 'Undefined record.';}
	else{
		uORd("update order_bar SET issync = '2', isflag = '1' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		uORd("update order_bar2 SET issync = '2', isflag = '1' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		//uORd("update order_swimpool SET issync = '2', isflag = '1' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		echo 'OrderFlagged<->'.$_POST["invoiceid"].'<->Order with Invoice '.$_POST["invoiceid"].' successfully processed.';
	}
}

if ($_POST["dwat"] == "paidunpaid"){
	if ($_POST["invoiceid"] == ''){echo 'Undefined record.';}
	else{
		if ($_POST["s"] == 'dopaid'){
		uORd("update orders SET issync = '2', ispaid = '1' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		uORd("update order_room SET issync = '2', ispaid = '1' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		uORd("update order_restaurant SET issync = '2', ispaid = '1' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		uORd("update order_bar SET issync = '2', ispaid = '1' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		uORd("update order_bar2 SET issync = '2', ispaid = '1' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		uORd("update order_swimpool SET issync = '2', ispaid = '1' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		uORd("update order_spa SET issync = '2', ispaid = '1' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		uORd("update order_sportitem SET issync = '2', ispaid = '1' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		uORd("update order_laundary SET issync = '2', ispaid = '1' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		
		if(isset($_POST["frm"]) && $_POST["frm"] == 'pending'){ $pend = "<->pending"; }else{ $pend = "<->nil"; }
		echo 'PaidUnpaid<->'.$_POST["invoiceid"].'<->Invoice '.$_POST["invoiceid"].' successfully marked as paid'.$pend;
		
		$log = "[".date("y/m/d h:i:s A")."], <br>Payment made, <br>By Staff: ".$_SESSION["amyn15"]." (ID: ".$_SESSION["amyi15"]."), <br>INVOICE ID: ".$_POST["invoiceid"]."\r\n=======================================\r\n"; 
		WriteToFile("../logs/".$logfilename,$log);
		
		$params = "emsubject=Payment made on Invoice ID: ".$_POST["invoiceid"];
		$params .= "&msg=".$log;
		sendAsyncURL($httppath."/fxn/sendmail/index.php", $params);
			
		}else if ($_POST["s"] == 'dounpaid'){
		$qry = mysqli_query($conn4as,"SELECT total,guestid FROM orders WHERE ispaid = '1' AND paystatus = 'dw' AND invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		$rs = mysqli_fetch_assoc($qry);
		$totalew = mysqli_num_rows($qry);
		if($totalew >0){
			$totalamt = $rs["total"];
			$guestid = $rs["guestid"];
			uORd("update addclient SET issync = '2', amount = amount + ".mysqli_real_escape_string($conn4as,$totalamt)." where id = '".mysqli_real_escape_string($conn4as,$guestid)."'");
		}
		uORd("update orders SET issync = '2', ispaid = '0' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		uORd("update order_room SET issync = '2', ispaid = '0' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		uORd("update order_restaurant SET issync = '2', ispaid = '0' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		uORd("update order_bar SET issync = '2', ispaid = '0' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		uORd("update order_swimpool SET issync = '2', ispaid = '0' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		uORd("update order_spa SET issync = '2', ispaid = '0' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		uORd("update order_sportitem SET issync = '2', ispaid = '0' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		uORd("update order_laundary SET issync = '2', ispaid = '0' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		
		if(isset($_POST["frm"]) && $_POST["frm"] == 'pending'){ $pend = "<->pending"; }else{ $pend = "<->nil"; }
		echo 'PaidUnpaid<->'.$_POST["invoiceid"].'<->Invoice '.$_POST["invoiceid"].' successfully marked as unpaid'.$pend;
		
		$log = "[".date("y/m/d h:i:s A")."], <br>Order marked As unpaid, <br>BY STAFF: ".$_SESSION["amyn15"]."(ID: ".$_SESSION["amyi15"]."), <br>INVOICE ID: ".$_POST["invoiceid"]."\r\n=======================================\r\n"; 
		WriteToFile("../logs/".$logfilename,$log);
		$params = "emsubject=Order marked As unpaid on Invoice ID: ".$_POST["invoiceid"];
		$params .= "&msg=".$log;
		//sendAsyncURL($httppath."/fxn/sendmail/index.php", $params);
		
		}
	}
}

//append order
if ($_POST["dwat"] == 'appendorder'){

	/*/booking
	if (isset($_POST["chkroom"])){
		if ($_POST["room_type"] == ''){$e=1; $m .= 'Room type is required';}
		else if ($_POST["roomrate"] == ''){$e=1; $m .= 'Room unit price is required';}
		else if ($_POST["roomleft"] == 0 || $_POST["roomleft"] == ''){$e=1; $m .= 'No Room left.';}
		else if ($_POST["noofroom"] == ''){$e=1; $m .= 'Number of room is required';}
		else if ($_POST["noofperson"] == ''){$e=1; $m .= 'Number of person to occupy the room is required';}
		else if ($_POST["checkin"] == '' || $_POST["checkin"] == 'mm/dd/yyyy'){$e=1; $m .= 'Date to check in is required';}
		else if ($_POST["checkout"] == '' || $_POST["checkout"] == 'mm/dd/yyyy'){$e=1; $m .= 'Date to check out is required';}
		else if ($_POST["duration"] == ''){$e=1; $m .= 'Duration is required';}
		else if ($_POST["bookingtotal"] == ''){$e=1; $m .= 'Total amount under reservation is required';}
	}
	//Bar
	if (isset($_POST["chkbar"])){
		if ($_POST["baritem"] == ''){$e=1; $m .= 'Bar item is required';}
		else if ($_POST["barprice"] == ''){$e=1; $m .= 'Bar item unit price is required';}
		else if ($_POST["barquantity"] == ''){$e=1; $m .= 'Quantity under bar service is required';}
		else if ($_POST["barorderdate"] == '' || $_POST["barorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under bar service is required';}
		else if ($_POST["bartotal"] == ''){$e=1; $m .= 'Total amount under bar is required';}
	}
	//restaurant
	if (isset($_POST["chkrestaurant"])){
		if ($_POST["resitem"] == ''){$e=1; $m .= 'food item is required';}
		else if ($_POST["resprice"] == ''){$e=1; $m .= 'food item unit price is required';}
		else if ($_POST["resquantity"] == ''){$e=1; $m .= 'Quantity of food order is required';}
		else if ($_POST["resorderdate"] == '' || $_POST["barorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under restaurant service is required';}
		else if ($_POST["restotal"] == ''){$e=1; $m .= 'Total amount under restaurant service is required';}
	}
	//laundary
	if (isset($_POST["chklaundary"])){
		if ($_POST["lauitem"] == ''){$e=1; $m .= 'Laundry service type is required';}
		else if ($_POST["lauprice"] == ''){$e=1; $m .= 'Unit price under laundary is required';}
		//else if ($_POST["lauquantity"] == ''){$e=1; $m .= 'Quantity under laundary is required';}
		else if ($_POST["lauorderdate"] == '' || $_POST["barorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under laundary is required';}
		else if ($_POST["lautotal"] == ''){$e=1; $m .= 'Total amount under laundary is required';}
	}
	//spa service
	if (isset($_POST["chkspa"])){
		if ($_POST["spaitem"] == ''){$e=1; $m .= 'Type of Spa service is required';}
		else if ($_POST["spaprice"] == ''){$e=1; $m .= 'Price under spa is required';}
		else if ($_POST["spaquantity"] == ''){$e=1; $m .= 'Quantity under spa is required';}
		else if ($_POST["spaorderdate"] == '' || $_POST["spaorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under spa is required';}
		else if ($_POST["spatotal"] == ''){$e=1; $m .= 'Total amount under laundary is required';}
	}
	//sport service
	if (isset($_POST["chksport"])){
		if ($_POST["spoitem"] == ''){$e=1; $m .= 'Type of sport material is required';}
		//else if ($_POST["spoprice"] == ''){$e=1; $m .= 'Unit Price under sport material is required';}
		else if ($_POST["spoquantity"] == ''){$e=1; $m .= 'Quantity under sport material is required';}
		else if ($_POST["spoorderdate"] == '' || $_POST["spoorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under sport material is required';}
		else if ($_POST["spototal"] == ''){$e=1; $m .= 'Total amount under sport material is required';}
	}*/
	
	//booking
	if (isset($_POST["chkroom"])){
		if ($_POST["room_type"] == ''){$e=1; $m .= 'Room type is required';}
		else if ($_POST["roomrate"] == '' || validate($_POST["roomrate"],"0-9")){$e=1; $m .= 'Room unit price is required. Only numeric value is allowed. No comma';}
		else if ($_POST["roomleft"] == 0 || $_POST["roomleft"] == ''){$e=1; $m .= 'No Room left.';}
		else if ($_POST["noofroom"] == ''){$e=1; $m .= 'Number of room is required';}
		else if ($_POST["noofperson"] == ''){$e=1; $m .= 'Number of person to occupy the room is required';}
		else if ($_POST["checkin"] == '' || $_POST["checkin"] == 'mm/dd/yyyy'){$e=1; $m .= 'Date to check in is required';}
		else if ($_POST["checkout"] == '' || $_POST["checkout"] == 'mm/dd/yyyy'){$e=1; $m .= 'Date to check out is required';}
		else if ($_POST["duration"] == ''){$e=1; $m .= 'Duration is required';}
		else if ($_POST["bookingtotal"] == '' || $_POST["bookingtotal"] == '0' || validate($_POST["bookingtotal"],"0-9")){$e=1; $m .= 'Total amount under reservation is required and can not be zero. Only numeric value allowed. No comma';}
	}
	//Bar
	if (isset($_POST["chkbar"])){
		if ($_POST["baritem"] == ''){$e=1; $m .= 'Bar item is required';}
		else if ($_POST["barprice"] == '' || validate($_POST["barprice"],"0-9")){$e=1; $m .= 'Bar item unit price is required. Numeric value only, no comma';}
		else if ($_POST["barquantity"] == ''){$e=1; $m .= 'Quantity under bar service is required';}
		else if ($_POST["barorderdate"] == '' || $_POST["barorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under bar service is required';}
		else if ($_POST["bartotal"] == '' || validate($_POST["bartotal"],"0-9")){$e=1; $m .= 'Total amount under bar is required. Numeric value only. no comma';}
	}
	//restaurant
	if (isset($_POST["chkrestaurant"])){
		if ($_POST["resitem"] == ''){$e=1; $m .= 'food item is required';}
		else if ($_POST["resprice"] == '' || validate($_POST["resprice"],"0-9")){$e=1; $m .= 'food item unit price is required. Numeric value only no comma';}
		else if ($_POST["resquantity"] == ''){$e=1; $m .= 'Quantity of food order is required';}
		else if ($_POST["resorderdate"] == '' || $_POST["barorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under restaurant service is required';}
		else if ($_POST["restotal"] == '' || validate($_POST["restotal"],"0-9")){$e=1; $m .= 'Total amount under restaurant service is required. Numeric value only no comma';}
	}
	//laundary
	if (isset($_POST["chklaundary"])){
		if ($_POST["lauitem"] == ''){$e=1; $m .= 'Laundry service type is required';}
		else if ($_POST["lauprice"] == '' || validate($_POST["lauprice"],"0-9")){$e=1; $m .= 'Unit price under laundary is required. Numeric value only no comma';}
		//else if ($_POST["lauquantity"] == ''){$e=1; $m .= 'Quantity under laundary is required';}
		else if ($_POST["lauorderdate"] == '' || $_POST["barorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under laundary is required';}
		else if ($_POST["lautotal"] == '' || validate($_POST["lautotal"],"0-9")){$e=1; $m .= 'Total amount under laundary is required. Numeric value only no comma';}
	}
	//spa service
	if (isset($_POST["chkspa"])){
		if ($_POST["spaitem"] == ''){$e=1; $m .= 'Type of Spa service is required';}
		else if ($_POST["spaprice"] == '' || validate($_POST["spaprice"],"0-9")){$e=1; $m .= 'Price under spa is required. Numeric value only no comma';}
		else if ($_POST["spaquantity"] == ''){$e=1; $m .= 'Quantity under spa is required';}
		else if ($_POST["spaorderdate"] == '' || $_POST["spaorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under spa is required';}
		else if ($_POST["spatotal"] == '' || validate($_POST["spatotal"],"0-9")){$e=1; $m .= 'Total amount under laundary is required. Numeric value only no comma';}
	}
	
	//swimpool service
	if (isset($_POST["chkswimpool"])){
		if ($_POST["swimpoolitem"] == ''){$e=1; $m .= 'Type of Swimming pool service is required';}
		else if ($_POST["swimpoolprice"] == '' || validate($_POST["swimpoolprice"],"0-9")){$e=1; $m .= 'Price under swimming pool is required. Numeric value only no comma';}
		else if ($_POST["swimpoolduration"] == ''){$e=1; $m .= 'Duration under swimming pool is required';}
		else if ($_POST["swimpoolquantity"] == ''){$e=1; $m .= 'Number of person under swimming pool is required';}
		else if ($_POST["swimpoolorderdate"] == '' || $_POST["swimpoolorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under swimming pool is required';}
		else if (strtotime(str_replace("/","-",$_POST["swimpoolorderdate"])) < $mktoday){$e=1; $m .= 'Back date not allowed under swimming pool.';}
		else if ($_POST["swimpooltotal"] == '' || validate($_POST["swimpooltotal"],"0-9")){$e=1; $m .= 'Total amount under swimming pool is required.';}
	}
	
	//sport service
	if (isset($_POST["chksport"])){
		if ($_POST["spoitem"] == ''){$e=1; $m .= 'Type of sport material is required';}
		//else if ($_POST["spoprice"] == ''){$e=1; $m .= 'Unit Price under sport material is required';}
		else if ($_POST["spoquantity"] == ''){$e=1; $m .= 'Quantity under sport material is required';}
		else if ($_POST["spoorderdate"] == '' || $_POST["spoorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under sport material is required';}
		else if ($_POST["spototal"] == '' || validate($_POST["spototal"],"0-9")){$e=1; $m .= 'Total amount under sport material is required. Numeric value only no comma';}
	}
	
	//............
	if ($e == 1){
		echo $m;
	}else{
		
		 $time = date("y/m/d");
		 $ordertime = date("H:i");
		 
		 $log = "[".date("y/m/d h:i:s A")."], <br>Order Appended, <br>BY STAFF: ".$_SESSION["amyn15"]."(".$_SESSION["amyi15"]."), <br>INVOICE ID: ".$_POST["invoiceid"];
		 
		 
		//insert room
		if (isset($_POST["chkroom"])){
		 $sql = "INSERT INTO order_room(invoiceid, guestid, roomid, noofroom, noofperson, checkin, checkout, orderdate, ordertime, duration, discount, vat, unitprice, total, checkstatus, ispaid,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$_POST["room_type"])."','".mysqli_real_escape_string($conn4as,$_POST["noofroom"])."','".mysqli_real_escape_string($conn4as,$_POST["noofperson"])."','".mysqli_real_escape_string($conn4as,$_POST["checkin"])."','".mysqli_real_escape_string($conn4as,$_POST["checkout"])."','".mysqli_real_escape_string($conn4as,$time)."','".mysqli_real_escape_string($conn4as,$ordertime)."','".mysqli_real_escape_string($conn4as,$_POST["duration"])."','".mysqli_real_escape_string($conn4as,$_POST["discount"])."','".mysqli_real_escape_string($conn4as,$_POST["vat"])."','".mysqli_real_escape_string($conn4as,$_POST["roomrate"])."','".mysqli_real_escape_string($conn4as,$_POST["bookingtotal"])."','in','0','".mysqli_real_escape_string($conn4as,$globalid)."')";
		 mysqli_query($conn4as,$sql);
		 $r = '1'; $nooforderadded = 1;
		 uORd("UPDATE addroom SET issync = '2', roomleft = roomleft - ".mysqli_real_escape_string($conn4as,$_POST["noofroom"])." WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["room_type"]));
		 $log .= ", <br><br>SERVICE: Room reservation, <br>".get4Email("SELECT addroom.roomType,tblcategory.catname FROM addroom INNER JOIN tblcategory ON addroom.categoryid = tblcategory.id WHERE addroom.id = ".mysqli_real_escape_string($conn4as,$_POST["room_type"])." ORDER BY addroom.id","roomType,catname","Room Number,Room Type")." NO OF ROOM: ".$_POST["noofroom"].", <br>DURATION: ".$_POST["duration"].", <br>TOTAL AMOUNT: ".$_POST["bookingtotal"];
		 
		}else{
		 $r = '0';
		}
		
		//insert bar
		if (isset($_POST["chkbar"])){
		 $sql = "INSERT INTO order_bar(invoiceid, guestid, itemid, itemdescr, qty, discount, unitprice, total, orderdate, ordertime, ispaid,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$_POST["baritem"])."','".mysqli_real_escape_string($conn4as,$_POST["baritemdescr"])."','".mysqli_real_escape_string($conn4as,$_POST["barquantity"])."','".mysqli_real_escape_string($conn4as,$_POST["bardiscount"])."','".mysqli_real_escape_string($conn4as,$_POST["barprice"])."','".mysqli_real_escape_string($conn4as,$_POST["bartotal"])."','".mysqli_real_escape_string($conn4as,$_POST["barorderdate"])."','".mysqli_real_escape_string($conn4as,$ordertime)."','0','".mysqli_real_escape_string($conn4as,$globalid)."')";
		 mysqli_query($conn4as,$sql);
		 $b = '1'; $nooforderadded += 1;
		 uORd("UPDATE addbar SET issync = '2', itemleft = itemleft - ".mysqli_real_escape_string($conn4as,$_POST["barquantity"])." WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["baritem"]));
		 
$log .= ", <br><br>SERVICE: Bar, <br>".get4Email("SELECT addbar.name,tblcategory.catname FROM addbar INNER JOIN tblcategory ON addbar.categoryid = tblcategory.id WHERE addbar.id = ".mysqli_real_escape_string($conn4as,$_POST["baritem"])." ORDER BY addbar.id","name,catname","Item Name,Item Type")." QUANTITY: ".$_POST["barquantity"].", <br>TOTAL AMOUNT: ".$_POST["bartotal"];
		}else{
		 $b = '0';
		}
		
		//insert laundary
		if (isset($_POST["chklaundary"])){
		 $sql = "INSERT INTO order_laundary(invoiceid, guestid, itemid, descr, discount, unitprice, total, orderdate, ordertime, ispaid,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$_POST["lauitem"])."','".mysqli_real_escape_string($conn4as,$_POST["lauitemdescr"])."','".mysqli_real_escape_string($conn4as,$_POST["laudiscount"])."','".mysqli_real_escape_string($conn4as,$_POST["lauprice"])."','".mysqli_real_escape_string($conn4as,$_POST["lautotal"])."','".mysqli_real_escape_string($conn4as,$_POST["lauorderdate"])."','".mysqli_real_escape_string($conn4as,$ordertime)."','0','".mysqli_real_escape_string($conn4as,$globalid)."')";
		 mysqli_query($conn4as,$sql);
		 $l = '1'; $nooforderadded += 1;
		 $log .= ", <br><br>SERVICE: Laundary, <br>".get4Email("SELECT title FROM addlaundary WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["lauitem"])." ORDER BY id","title","Item Name")." QUANTITY: ".$_POST["barquantity"].", <br>TOTAL AMOUNT: ".$_POST["lautotal"];
		}else{
		 $l = '0';
		}
		
		//insert restaurant
		if (isset($_POST["chkrestaurant"])){
		  $sql = "INSERT INTO order_restaurant(invoiceid, guestid, itemid, descr, qty, discount, unitprice, total, orderdate, ordertime, ispaid,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$_POST["resitem"])."','".mysqli_real_escape_string($conn4as,$_POST["resitemdescr"])."','".mysqli_real_escape_string($conn4as,$_POST["resquantity"])."','".mysqli_real_escape_string($conn4as,$_POST["resdiscount"])."','".mysqli_real_escape_string($conn4as,$_POST["resprice"])."','".mysqli_real_escape_string($conn4as,$_POST["restotal"])."','".mysqli_real_escape_string($conn4as,$_POST["resorderdate"])."','".mysqli_real_escape_string($conn4as,$ordertime)."','0','".mysqli_real_escape_string($conn4as,$globalid)."')";
		 mysqli_query($conn4as,$sql);
		 $res = '1'; $nooforderadded += 1;
		 $log .= ", <br><br>SERVICE: Restaurant, <br>".get4Email("SELECT addresturant.name,tblcategory.catname FROM addresturant INNER JOIN tblcategory ON addresturant.categoryid = tblcategory.id WHERE addresturant.id = ".mysqli_real_escape_string($conn4as,$_POST["resitem"])." ORDER BY addresturant.id","name,catname","Food Name,Food Type")." QUANTITY: ".$_POST["resquantity"].", <br>TOTAL AMOUNT: ".$_POST["restotal"];
		}else{
		 $res = '0';
		}
		
		//insert spa
		if (isset($_POST["chkspa"])){
		$sql = "INSERT INTO order_spa(invoiceid, guestid, itemid, descr, noofperson, discount, unitprice, total, orderdate, ordertime, ispaid,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$_POST["spaitem"])."','".mysqli_real_escape_string($conn4as,$_POST["spaitemdescr"])."','".mysqli_real_escape_string($conn4as,$_POST["spaquantity"])."','".mysqli_real_escape_string($conn4as,$_POST["spadiscount"])."','".mysqli_real_escape_string($conn4as,$_POST["spaprice"])."','".mysqli_real_escape_string($conn4as,$_POST["spatotal"])."','".mysqli_real_escape_string($conn4as,$_POST["spaorderdate"])."','".mysqli_real_escape_string($conn4as,$ordertime)."','0','".mysqli_real_escape_string($conn4as,$globalid)."')";
		 mysqli_query($conn4as,$sql);
		 $spa = '1'; $nooforderadded += 1;
		 $log .= ", <br><br>SERVICE: Spa, <br>".get4Email("SELECT name FROM addspa WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["spaitem"])." ORDER BY id","name","Name")." NO OF PERSON: ".$_POST["spaquantity"].", <br>TOTAL AMOUNT: ".$_POST["spatotal"];
		}else{
		 $spa = '0';
		}
		
		
		//insert swimpool
		if (isset($_POST["chkswimpool"])){
		$sql = "INSERT INTO order_swimpool(invoiceid, guestid, itemid, descr, noofperson, duration, discount, unitprice, total, orderdate,ordertime,ispaid,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolitem"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolitemdescr"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolquantity"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolduration"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpooldiscount"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolprice"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpooltotal"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolorderdate"])."','".mysqli_real_escape_string($conn4as,$ordertime)."','0','".mysqli_real_escape_string($conn4as,$globalid)."')";
		 mysqli_query($conn4as,$sql);
		 $swimpool = '1'; $nooforderadded += 1;
		 $log .= ", <br><br>SERVICE: Swimming Pool, <br>".get4Email("SELECT name FROM addswimpool WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["swimpoolitem"])." ORDER BY id","name","Name")." NO OF PERSON: ".$_POST["swimpoolquantity"]." DURATION: ".$_POST["swimpoolduration"].' per '.$_POST["swimpoolhidmeas"].", <br>TOTAL AMOUNT: ".$_POST["swimpooltotal"];
		}else{
		 $swimpool = '0';
		}
		
		//insert sport materials
		if (isset($_POST["chksport"])){
		 $sql = "INSERT INTO order_sportitem(invoiceid, guestid, itemid, descr, tranxtype, qty, discount, unitprice, total, orderdate, ordertime, ispaid,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$_POST["spoitem"])."','".mysqli_real_escape_string($conn4as,$_POST["spoitemdescr"])."','".mysqli_real_escape_string($conn4as,$_POST["tranxtype"])."','".mysqli_real_escape_string($conn4as,$_POST["spoquantity"])."','".mysqli_real_escape_string($conn4as,$_POST["spodiscount"])."','".mysqli_real_escape_string($conn4as,$_POST["spoprice"])."','".mysqli_real_escape_string($conn4as,$_POST["spototal"])."','".mysqli_real_escape_string($conn4as,$_POST["spoorderdate"])."','".mysqli_real_escape_string($conn4as,$ordertime)."','0','".mysqli_real_escape_string($conn4as,$globalid)."')";
		 mysqli_query($conn4as,$sql);
		 $spo = '1'; $nooforderadded += 1;
		 $log .= ", <br><br>SERVICE: Sport Materials, <br>".get4Email("SELECT name FROM addsport WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["spoitem"])." ORDER BY id","name","Item Name")." QUANTITY: ".$_POST["spoquantity"].", <br>TOTAL AMOUNT: ".$_POST["spototal"];
		}else{
		 $spo = '0';
		}
		
		//insert to orders table
		if ($nooforderadded < 1){
			echo 'No item ordered.';
		}else{
			//recalculate grandtotal
			$sql = select("SELECT total FROM orders WHERE invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
			if($sql){
			$rs = mysqli_fetch_assoc($qry);
			$oldtotal = $rs["total"];
			$newtotal = $oldtotal + $_POST["grandtotal"];
			//update orders table............
			
			if ($r == 1){
				if ($lbl == ''){$lbl = "isroom = '1'";}
				else{$lbl .= ",isroom = '1'";}
			}
			
			if ($b == 1){
				if ($lbl == ''){$lbl = "isbar='1'";}
				else{$lbl .= ",isbar='1'";}
			}
			
			if ($spo == 1){
				if ($lbl == ''){$lbl = "issport='1'";}
				else{$lbl .= ",issport='1'";}
			}
			
			if ($spa == 1){
				if ($lbl == ''){$lbl = "isspa='1'";}
				else{$lbl .= ",isspa='1'";}
			}
			
			if ($swimpool == 1){
				if ($lbl == ''){$lbl = "isswimpool='1'";}
				else{$lbl .= ",isswimpool='1'";}
			}
			
			if ($res == 1){
				if ($lbl == ''){$lbl = "isrestaurant='1'";}
				else{$lbl .= ",isrestaurant='1'";}
			}
			
			if ($l == 1){
				if ($lbl == ''){$lbl = "islaundary='1'";}
				else{$lbl .= ",islaundary='1'";}
			}
			
			$sql = "UPDATE orders SET issync = '2', ".$lbl.", total = '".mysqli_real_escape_string($conn4as,$newtotal)."' WHERE invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'";
			mysqli_query($conn4as,$sql);
		    echo 'OSU<->'.$_POST["clientid"].'<->'.$_POST["invoiceid"];
			
			}else{
			$sql = "INSERT INTO orders(invoiceid, guestid, isroom, isbar, issport, isspa, isswimpool, islaundary, isrestaurant, orderdate, ordertime, total,ispaid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$r)."','".mysqli_real_escape_string($conn4as,$b)."','".mysqli_real_escape_string($conn4as,$spo)."','".mysqli_real_escape_string($conn4as,$spa)."','".mysqli_real_escape_string($conn4as,$swimpool)."','".mysqli_real_escape_string($conn4as,$l)."','".mysqli_real_escape_string($conn4as,$res)."','".mysqli_real_escape_string($conn4as,$time)."','".mysqli_real_escape_string($conn4as,$ordertime)."','".mysqli_real_escape_string($conn4as,$_POST["grandtotal"])."','0')";
		 mysqli_query($conn4as,$sql);
		 echo 'OSA<->'.$_POST["clientid"];
			}
			WriteToFile("../logs/".$logfilename,$log."\r\n=======================================\r\n");
			$params = "emsubject=Order appended. Invoice ID: ".$_POST["invoiceid"];
			$params .= "&msg=".$log;
			sendAsyncURL($httppath."/fxn/sendmail/index.php", $params);
			
	  }
	}

}

// free order 
if ($_POST["dwat"] == "orderfree"){
	//booking
	
	if (isset($_POST["chkroom"])){
		if ($_POST["room_type"] == ''){$e=1; $m .= 'Room type is required';}
		else if ($_POST["roomrate"] == '' || validate($_POST["roomrate"],"0-9")){$e=1; $m .= 'Room unit price is required. Only numeric value is allowed. No comma';}
		else if ($_POST["roomleft"] == 0 || $_POST["roomleft"] == ''){$e=1; $m .= 'Room not available.';}
		else if ($_POST["noofroom"] == ''){$e=1; $m .= 'Number of room is required';}
		else if ($_POST["roomleft"] < $_POST["noofroom"]){$e=1; $m .= 'Room not enough.';}
		else if ($_POST["noofperson"] == ''){$e=1; $m .= 'Number of person to occupy the room is required';}
		else if (strtotime(str_replace("/","-",$_POST["checkin"])) < $mktoday){$e=1; $m .= 'Back date not allowed ('.strtotime(str_replace("/","-",$_POST["checkin"])).' - '.$mktoday.')';}
		else if ($_POST["checkin"] == '' || $_POST["checkin"] == 'mm/dd/yyyy'){$e=1; $m .= 'Date to check in is required';}
		else if ($_POST["checkout"] == '' || $_POST["checkout"] == 'mm/dd/yyyy'){$e=1; $m .= 'Date to check out is required';}
		else if ($_POST["duration"] == ''){$e=1; $m .= 'Duration is required';}
		//else if ($_POST["bookingtotal"] == '' || $_POST["bookingtotal"] == '0' || validate($_POST["bookingtotal"],"0-9")){$e=1; $m .= 'Total amount under reservation is required and can not be zero. Only numeric value allowed. No comma';}
	}
	//Bar
	if (isset($_POST["chkbar"])){
		if ($_POST["baritem"] == ''){$e=1; $m .= 'Bar item is required';}
		else if ($_POST["barprice"] == '' || validate($_POST["barprice"],"0-9")){$e=1; $m .= 'Bar item unit price is required. Numeric value only, no comma';}
		else if ($_POST["barquantity"] == ''){$e=1; $m .= 'Quantity under bar service is required';}
		else if ($_POST["barleft"] < $_POST["barquantity"]){$e=1; $m .= 'Item (drink) not enough.';}
		else if ($_POST["barorderdate"] == '' || $_POST["barorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under bar service is required';}
		else if (strtotime(str_replace("/","-",$_POST["barorderdate"])) < $mktoday){$e=1; $m .= 'Back date not allowed.';}
		//else if ($_POST["bartotal"] == '' || validate($_POST["bartotal"],"0-9")){$e=1; $m .= 'Total amount under bar is required. Numeric value only. no comma';}
	}
	//restaurant
	if (isset($_POST["chkrestaurant"])){
		if ($_POST["resitem"] == ''){$e=1; $m .= 'food item is required';}
		else if ($_POST["resprice"] == '' || validate($_POST["resprice"],"0-9")){$e=1; $m .= 'food item unit price is required. Numeric value only no comma';}
		else if ($_POST["resquantity"] == ''){$e=1; $m .= 'Quantity of food order is required';}
		else if ($_POST["resorderdate"] == '' || $_POST["resorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under restaurant service is required';}
		else if (strtotime(str_replace("/","-",$_POST["resorderdate"])) < $mktoday){$e=1; $m .= 'Back date not allowed.';}
		//else if ($_POST["restotal"] == '' || validate($_POST["restotal"],"0-9")){$e=1; $m .= 'Total amount under restaurant service is required. Numeric value only no comma';}
	}
	//laundary
	if (isset($_POST["chklaundary"])){
		if ($_POST["lauitem"] == ''){$e=1; $m .= 'Laundry service type is required';}
		else if ($_POST["lauprice"] == '' || validate($_POST["lauprice"],"0-9")){$e=1; $m .= 'Unit price under laundary is required. Numeric value only no comma';}
		//else if ($_POST["lauquantity"] == ''){$e=1; $m .= 'Quantity under laundary is required';}
		else if ($_POST["lauorderdate"] == '' || $_POST["lauorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under laundary is required';}
		else if (strtotime(str_replace("/","-",$_POST["lauorderdate"])) < $mktoday){$e=1; $m .= 'Back date not allowed.';}
		//else if ($_POST["lautotal"] == '' || validate($_POST["lautotal"],"0-9")){$e=1; $m .= 'Total amount under laundary is required. Numeric value only no comma';}
	}
	//spa service
	if (isset($_POST["chkspa"])){
		if ($_POST["spaitem"] == ''){$e=1; $m .= 'Type of Spa service is required';}
		else if ($_POST["spaprice"] == '' || validate($_POST["spaprice"],"0-9")){$e=1; $m .= 'Price under spa is required. Numeric value only no comma';}
		else if ($_POST["spaquantity"] == ''){$e=1; $m .= 'Quantity under spa is required';}
		else if ($_POST["spaorderdate"] == '' || $_POST["spaorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under spa is required';}
		else if (strtotime(str_replace("/","-",$_POST["spaorderdate"])) < $mktoday){$e=1; $m .= 'Back date not allowed.';}
		//else if ($_POST["spatotal"] == '' || validate($_POST["spatotal"],"0-9")){$e=1; $m .= 'Total amount under laundary is required. Numeric value only no comma';}
	}
	
	//swimpool service
	if (isset($_POST["chkswimpool"])){
		if ($_POST["swimpoolitem"] == ''){$e=1; $m .= 'Type of Swimming pool service is required';}
		else if ($_POST["swimpoolprice"] == '' || validate($_POST["swimpoolprice"],"0-9")){$e=1; $m .= 'Price under swimming pool is required. Numeric value only no comma';}
		else if ($_POST["swimpoolduration"] == ''){$e=1; $m .= 'Duration under swimming pool is required';}
		else if ($_POST["swimpoolquantity"] == ''){$e=1; $m .= 'Number of person under swimming pool is required';}
		else if ($_POST["swimpoolorderdate"] == '' || $_POST["swimpoolorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under swimming pool is required';}
		else if (strtotime(str_replace("/","-",$_POST["swimpoolorderdate"])) < $mktoday){$e=1; $m .= 'Back date not allowed under swimming pool.';}
		else if ($_POST["swimpooltotal"] == '' || validate($_POST["swimpooltotal"],"0-9")){$e=1; $m .= 'Total amount under swimming pool is required.';}
	}
	
	//sport service
	if (isset($_POST["chksport"])){
		if ($_POST["spoitem"] == ''){$e=1; $m .= 'Type of sport material is required';}
		//else if ($_POST["spoprice"] == ''){$e=1; $m .= 'Unit Price under sport material is required';}
		else if ($_POST["spoquantity"] == ''){$e=1; $m .= 'Quantity under sport material is required';}
		else if ($_POST["spoorderdate"] == '' || $_POST["spoorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under sport material is required';}
		else if (strtotime(str_replace("/","-",$_POST["spoorderdate"])) < $mktoday){$e=1; $m .= 'Back date not allowed.';}
		//else if ($_POST["spototal"] == '' || validate($_POST["spototal"],"0-9")){$e=1; $m .= 'Total amount under sport material is required. Numeric value only no comma';}
	}

	//............
	if ($e == 1){
		echo $m;
	}else{
		
		 $time = date("y/m/d");
		 $ordertime = date("H:i");
		 
		 $log = "<br><br>[".date("y/m/d h:i:s A")."], <br>New Order Added, <br>BY STAFF: ".$_SESSION["amyn15"]."(".$_SESSION["amyi15"]."), <br>INVOICE ID: ".$_POST["invoiceid"]; 
		 
		//insert room
		if (isset($_POST["chkroom"])){
		 $sql = "INSERT INTO order_room(invoiceid, guestid, roomid, noofroom, noofperson, checkin, checkout, orderdate, ordertime, duration, discount, vat, unitprice, total, checkstatus, ispaid,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$_POST["room_type"])."','".mysqli_real_escape_string($conn4as,$_POST["noofroom"])."','".mysqli_real_escape_string($conn4as,$_POST["noofperson"])."','".mysqli_real_escape_string($conn4as,$_POST["checkin"])."','".mysqli_real_escape_string($conn4as,$_POST["checkout"])."','".mysqli_real_escape_string($conn4as,$time)."','".mysqli_real_escape_string($conn4as,$ordertime)."','".mysqli_real_escape_string($conn4as,$_POST["duration"])."','".mysqli_real_escape_string($conn4as,$_POST["discount"])."','".mysqli_real_escape_string($conn4as,$_POST["vat"])."','".mysqli_real_escape_string($conn4as,$_POST["roomrate"])."','".mysqli_real_escape_string($conn4as,$_POST["bookingtotal"])."','','0','".mysqli_real_escape_string($conn4as,$globalid)."')";//in
		 mysqli_query($conn4as,$sql);
		 $r = '1'; $nooforderadded = 1;
		 //uORd("UPDATE addroom SET issync = '2', roomleft = roomleft - ".mysqli_real_escape_string($conn4as,$_POST["noofroom"])." WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["room_type"]));
		 $log .= ", <br><br>SERVICE: Room reservation (Free Service), <br>".get4Email("SELECT addroom.roomType,tblcategory.catname FROM addroom INNER JOIN tblcategory ON addroom.categoryid = tblcategory.id WHERE addroom.id = ".mysqli_real_escape_string($conn4as,$_POST["room_type"])." ORDER BY addroom.id","roomType,catname","Room Number,Room Type")." NO OF ROOM: ".$_POST["noofroom"].", <br>DURATION: ".$_POST["duration"].", <br>TOTAL AMOUNT: ".$_POST["bookingtotal"];
		}else{
		 $r = '0';
		}
		
		//insert bar
		if (isset($_POST["chkbar"])){
		 $sql = "INSERT INTO order_bar(invoiceid, guestid, itemid, itemdescr, qty, discount, unitprice, total, orderdate, ordertime, ispaid,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$_POST["baritem"])."','".mysqli_real_escape_string($conn4as,$_POST["baritemdescr"])."','".mysqli_real_escape_string($conn4as,$_POST["barquantity"])."','".mysqli_real_escape_string($conn4as,$_POST["bardiscount"])."','".mysqli_real_escape_string($conn4as,$_POST["barprice"])."','".mysqli_real_escape_string($conn4as,$_POST["bartotal"])."','".mysqli_real_escape_string($conn4as,$_POST["barorderdate"])."','".mysqli_real_escape_string($conn4as,$ordertime)."','0','".mysqli_real_escape_string($conn4as,$globalid)."')";
		 mysqli_query($conn4as,$sql);
		 $b = '1'; $nooforderadded += 1;
		 uORd("UPDATE addbar SET issync = '2', itemleft = itemleft - ".mysqli_real_escape_string($conn4as,$_POST["barquantity"])." WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["baritem"]));
		 $log .= ", <br><br>SERVICE: Bar (Free Service), <br>".get4Email("SELECT addbar.name,tblcategory.catname FROM addbar INNER JOIN tblcategory ON addbar.categoryid = tblcategory.id WHERE addbar.id = ".mysqli_real_escape_string($conn4as,$_POST["baritem"])." ORDER BY addbar.id","name,catname","Item Name,Item Type")." QUANTITY: ".$_POST["barquantity"].", <br>TOTAL AMOUNT: ".$_POST["bartotal"];
		 
		}else{
		 $b = '0';
		}
		
		//insert laundary
		if (isset($_POST["chklaundary"])){
		 $sql = "INSERT INTO order_laundary(invoiceid, guestid, itemid, descr, discount, unitprice, total, orderdate, ordertime, ispaid,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$_POST["lauitem"])."','".mysqli_real_escape_string($conn4as,$_POST["lauitemdescr"])."','".mysqli_real_escape_string($conn4as,$_POST["laudiscount"])."','".mysqli_real_escape_string($conn4as,$_POST["lauprice"])."','".mysqli_real_escape_string($conn4as,$_POST["lautotal"])."','".mysqli_real_escape_string($conn4as,$_POST["lauorderdate"])."','".mysqli_real_escape_string($conn4as,$ordertime)."','0','".mysqli_real_escape_string($conn4as,$globalid)."')";
		 mysqli_query($conn4as,$sql);
		 $l = '1'; $nooforderadded += 1;
		 $log .= ", <br><br>SERVICE: Laundary (Free Service), <br>".get4Email("SELECT title FROM addlaundary WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["lauitem"])." ORDER BY id","title","Item Name")." QUANTITY: ".$_POST["barquantity"].", <br>TOTAL AMOUNT: ".$_POST["lautotal"];
		}else{
		 $l = '0';
		}
		
		//insert restaurant
		if (isset($_POST["chkrestaurant"])){
		  $sql = "INSERT INTO order_restaurant(invoiceid, guestid, itemid, descr, qty, discount, unitprice, total, orderdate, ordertime, ispaid,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$_POST["resitem"])."','".mysqli_real_escape_string($conn4as,$_POST["resitemdescr"])."','".mysqli_real_escape_string($conn4as,$_POST["resquantity"])."','".mysqli_real_escape_string($conn4as,$_POST["resdiscount"])."','".mysqli_real_escape_string($conn4as,$_POST["resprice"])."','".mysqli_real_escape_string($conn4as,$_POST["restotal"])."','".mysqli_real_escape_string($conn4as,$_POST["resorderdate"])."','".mysqli_real_escape_string($conn4as,$ordertime)."','0','".mysqli_real_escape_string($conn4as,$globalid)."')";
		 mysqli_query($conn4as,$sql);
		 $res = '1'; $nooforderadded += 1;
		 $log .= ", <br><br>SERVICE: Restaurant (Free Service), <br>".get4Email("SELECT addresturant.name,tblcategory.catname FROM addresturant INNER JOIN tblcategory ON addresturant.categoryid = tblcategory.id WHERE addresturant.id = ".mysqli_real_escape_string($conn4as,$_POST["resitem"])." ORDER BY addresturant.id","name,catname","Food Name,Food Type")." QUANTITY: ".$_POST["resquantity"].", <br>TOTAL AMOUNT: ".$_POST["restotal"];
		 
		}else{
		 $res = '0';
		}
		
		//insert swimpool
		if (isset($_POST["chkswimpool"])){
		$sql = "INSERT INTO order_swimpool(invoiceid, guestid, itemid, descr, noofperson, duration, discount, unitprice, total, orderdate,ordertime, ispaid,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolitem"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolitemdescr"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolquantity"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolduration"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpooldiscount"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolprice"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpooltotal"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolorderdate"])."','".mysqli_real_escape_string($conn4as,$ordertime)."','0','".mysqli_real_escape_string($conn4as,$globalid)."')";
		 mysqli_query($conn4as,$sql);
		 $swimpool = '1'; $nooforderadded += 1;
		 $log .= ", <br><br>SERVICE: Swimming Pool Service (Free), <br>".get4Email("SELECT name FROM addswimpool WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["swimpoolitem"])." ORDER BY id","name","Name")." NO OF PERSON: ".$_POST["swimpoolquantity"]." DURATION: ".$_POST["swimpoolduration"].' per '.$_POST["swimpoolhidmeas"].", <br>TOTAL AMOUNT: ".$_POST["swimpooltotal"];
		}else{
		 $swimpool = '0';
		}
		
		//insert spa
		if (isset($_POST["chkspa"])){
		$sql = "INSERT INTO order_spa(invoiceid, guestid, itemid, descr, noofperson, discount, unitprice, total, orderdate, ordertime, ispaid,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$_POST["spaitem"])."','".mysqli_real_escape_string($conn4as,$_POST["spaitemdescr"])."','".mysqli_real_escape_string($conn4as,$_POST["spaquantity"])."','".mysqli_real_escape_string($conn4as,$_POST["spadiscount"])."','".mysqli_real_escape_string($conn4as,$_POST["spaprice"])."','".mysqli_real_escape_string($conn4as,$_POST["spatotal"])."','".mysqli_real_escape_string($conn4as,$_POST["spaorderdate"])."','".mysqli_real_escape_string($conn4as,$ordertime)."','0','".mysqli_real_escape_string($conn4as,$globalid)."')";
		 mysqli_query($conn4as,$sql);
		 $spa = '1'; $nooforderadded += 1;
		 $log .= ", <br><br>SERVICE: Spa (Free Service), <br>".get4Email("SELECT name FROM addspa WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["spaitem"])." ORDER BY id","name","Name")." NO OF PERSON: ".$_POST["spaquantity"].", <br>TOTAL AMOUNT: ".$_POST["spatotal"];
		}else{
		 $spa = '0';
		}
		
		
		//insert sport materials
		if (isset($_POST["chksport"])){
		 $sql = "INSERT INTO order_sportitem(invoiceid, guestid, itemid, descr, tranxtype, qty, discount, unitprice, total, orderdate, ordertime, ispaid,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$_POST["spoitem"])."','".mysqli_real_escape_string($conn4as,$_POST["spoitemdescr"])."','".mysqli_real_escape_string($conn4as,$_POST["tranxtype"])."','".mysqli_real_escape_string($conn4as,$_POST["spoquantity"])."','".mysqli_real_escape_string($conn4as,$_POST["spodiscount"])."','".mysqli_real_escape_string($conn4as,$_POST["spoprice"])."','".mysqli_real_escape_string($conn4as,$_POST["spototal"])."','".mysqli_real_escape_string($conn4as,$_POST["spoorderdate"])."','".mysqli_real_escape_string($conn4as,$ordertime)."','0','".mysqli_real_escape_string($conn4as,$globalid)."')";
		 mysqli_query($conn4as,$sql);
		 $spo = '1'; $nooforderadded += 1;
		 $log .= ", <br><br>SERVICE: Sport Materials (Free Service), <br>".get4Email("SELECT name FROM addsport WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["spoitem"])." ORDER BY id","name","Item Name")." QUANTITY: ".$_POST["spoquantity"].", <br>TOTAL AMOUNT: ".$_POST["spototal"];
		}else{
		 $spo = '0';
		}
		
		//insert to orders table
		if ($nooforderadded < 1){
			echo 'No free item/service ordered.';
		}else{
			$sql = "INSERT INTO orders(invoiceid, guestid, isroom, isbar, issport, isspa, islaundary, isrestaurant, orderdate, ordertime, total,ispaid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$r)."','".mysqli_real_escape_string($conn4as,$b)."','".mysqli_real_escape_string($conn4as,$spo)."','".mysqli_real_escape_string($conn4as,$spa)."','".mysqli_real_escape_string($conn4as,$l)."','".mysqli_real_escape_string($conn4as,$res)."','".mysqli_real_escape_string($conn4as,$time)."','".mysqli_real_escape_string($conn4as,$ordertime)."','".mysqli_real_escape_string($conn4as,$_POST["grandtotal"])."','0')";
		 mysqli_query($conn4as,$sql);
		 echo 'OSAF<->'.$_POST["clientid"];
		 
		 //save log....
		 WriteToFile("../logs/".$logfilename,$log."\r\n=======================================\r\n");
		 
		 $params = "emsubject=New Free Service rendered. Invoice ID: ".$_POST["invoiceid"];
		 $params .= "&msg=".$log;
		 sendAsyncURL($httppath."/fxn/sendmail/index.php", $params);
		}
		
	}
}

//Admin Restock instruction...........
if ($_POST["dwat"] == "aOrderRestock"){
if ($_POST["id"] == ''){echo 'Unknown item';}
else{
$qry = mysqli_query($conn4as,"SELECT * FROM addbar WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["id"])." ORDER BY id");
$rs = mysqli_fetch_assoc($qry);
$itemid = $rs["id"];
$itemname = $rs["name"];
$instock = $rs["instock"];
$itemleft = $rs["itemleft"];
$qty = $_POST["qval"];
$adinfo = $_POST["adinfo"];
$regdate = date("Y-m-d");
$timestamp = time();
$elapsedate = time() + (86400 * 3);

if($qty == '' || $qty < 0){
	echo 'Quantity is required. Please enter the number of '.$itemname.' you want your manager (staff) to re-stock.';
}else{
	mysqli_query($conn4as,"INSERT INTO tblinstruct(itemid,overallstock,itemleft,regdate,regtime,elapsedate,qty2restock,qtyrestocked,message) VALUES('".mysqli_real_escape_string($conn4as,$itemid)."','".mysqli_real_escape_string($conn4as,$instock)."','".mysqli_real_escape_string($conn4as,$itemleft)."','".mysqli_real_escape_string($conn4as,$regdate)."','".mysqli_real_escape_string($conn4as,$timestamp)."','".mysqli_real_escape_string($conn4as,$elapsedate)."','".mysqli_real_escape_string($conn4as,$qty)."','0','".mysqli_real_escape_string($conn4as,$adinfo)."')");
echo 'You have succesfully sent order to re-stock '.$itemname;
}

}
}

///////////////////////Insert GYM
if ($_POST["dwat"] == "addgym1"){
if ($_POST["lastname"] == ''){echo 'Surname is required';}
elseif ($_POST["firstname"] == ''){echo 'First Name is required';}
elseif ($_POST["address"] == ''){echo 'Address is required';}
elseif ($_POST["dob"] == ''){echo 'Date of Birth is required';}
elseif ($_POST["phone"] == ''){echo 'Mobile number is required';}
elseif ($_POST["gender"] == ''){echo 'Gender is required';}
elseif ($_POST["occupation"] == ''){echo 'Occupation is required';}
elseif ($_POST["nokname"] == ''){echo 'Next of kin name is required';}
elseif ($_POST["nokphone"] == ''){echo 'Next of kin mobile number is required';}

elseif ($_POST["duration"] == ''){echo 'Membership duration is required';}
elseif ($_POST["membertype"] == ''){echo 'Membership Type is required';}
elseif ($_POST["regfee"] == ''){echo 'Registration Fee is required';}
elseif ($_POST["paymenttype"] == ''){echo 'Payment Type is required';}
elseif ($_POST["amount"] == '' && $_POST["ddamount"] == ''){echo 'Payment Amount or DD Amount Fee is required';}
else{
$regdate = time();
$invoice = time();
$file1 = uploader("../archives/","file1",$regdate);
//if (!empty($_FILES['file1']['tmp_name'])){$file1 = uploader("../archives/","ufile1",$time);}else{$file1 = "";}

//gym first tanle
mysqli_query($conn4as,"INSERT INTO gym(surname, firstname, address, dob, email, phone, gender, nationality, origin, lga, enametel, nokname, nokphone, nokaddress, how2contact, howuhear, regdate, pix,currentinv) VALUES('".mysqli_real_escape_string($conn4as,$_POST["lastname"])."','".mysqli_real_escape_string($conn4as,$_POST["firstname"])."','".mysqli_real_escape_string($conn4as,$_POST["address"])."','".mysqli_real_escape_string($conn4as,$_POST["dob"])."','".mysqli_real_escape_string($conn4as,$_POST["email"])."','".mysqli_real_escape_string($conn4as,$_POST["phone"])."','".mysqli_real_escape_string($conn4as,$_POST["gender"])."','".mysqli_real_escape_string($conn4as,$_POST["country"])."','".mysqli_real_escape_string($conn4as,$_POST["origin"])."','".mysqli_real_escape_string($conn4as,$_POST["lga"])."','".mysqli_real_escape_string($conn4as,$_POST["enametel"])."','".mysqli_real_escape_string($conn4as,$_POST["nokname"])."','".mysqli_real_escape_string($conn4as,$_POST["nokphone"])."','".mysqli_real_escape_string($conn4as,$_POST["nokaddress"])."','".mysqli_real_escape_string($conn4as,$_POST[how2contact])."','".mysqli_real_escape_string($conn4as,$_POST["howuhear"])."','".mysqli_real_escape_string($conn4as,$regdate)."','".mysqli_real_escape_string($conn4as,$file1)."','".mysqli_real_escape_string($conn4as,$invoice)."')");
$newid = mysqli_insert_id($conn4as);

//gym second table
foreach($_POST["goals"] as $goal){ $goals .= ($goals == '')?$goal:','.$goal; }
foreach($_POST["ghealths"] as $ghealth){ $ghealths .= ($ghealths == '')?$ghealth:','.$ghealth; }
$regno = ZeroPrefixRegNo($newid);

mysqli_query($conn4as,"INSERT INTO gym1(regno,userid, goals, smoker, alcoholperwk, ghealth, mednotes, waterdaily, healthdiet, mmeal, emeal, foodweak) VALUES('".mysqli_real_escape_string($conn4as,$regno)."','".mysqli_real_escape_string($conn4as,$newid)."','".mysqli_real_escape_string($conn4as,$goals)."','".mysqli_real_escape_string($conn4as,$_POST["smoker"])."','".mysqli_real_escape_string($conn4as,$_POST["alcoholperwk"])."','".mysqli_real_escape_string($conn4as,$ghealths)."','".mysqli_real_escape_string($conn4as,$_POST["mednotes"])."','".mysqli_real_escape_string($conn4as,$_POST["waterdaily"])."','".mysqli_real_escape_string($conn4as,$_POST["healthdiet"])."','".mysqli_real_escape_string($conn4as,$_POST["mmeal"])."','".mysqli_real_escape_string($conn4as,$_POST["emeal"])."','".mysqli_real_escape_string($conn4as,$_POST["foodweak"])."')");

//gym payment table
//id,title,duration,price
loadDurations();
$duration = $gymDurations[$_POST["duration"]][2];
$startdate = date("Y-m-d");
$enddate = GetFutureDate($startdate,$duration,'months');
$dueamount = $gymDurations[$_POST["duration"]][3];
$regfee = $_POST["regfee"];
$ddamount = $_POST["ddamount"];
$amountpaid = $_POST["amount"];
$total = $dueamount + $regfee + $ddamount;
$balance = $total - $amountpaid;

mysqli_query($conn4as,"INSERT INTO gympayments(userid, invoiceid, duration, startdate, enddate, membertype, regfee, debittype, paymenttype, amount, ddamount, total, amountpaid, ispaid, status) VALUES('".mysqli_real_escape_string($conn4as,$newid)."','".mysqli_real_escape_string($conn4as,$invoice)."','".mysqli_real_escape_string($conn4as,$duration)."','".mysqli_real_escape_string($conn4as,$startdate)."','".mysqli_real_escape_string($conn4as,$enddate)."','".mysqli_real_escape_string($conn4as,$_POST["membertype"])."','".mysqli_real_escape_string($conn4as,$regfee)."','".mysqli_real_escape_string($conn4as,$_POST["debittype"])."','".mysqli_real_escape_string($conn4as,$_POST["paymenttype"])."','".mysqli_real_escape_string($conn4as,$dueamount)."','".mysqli_real_escape_string($conn4as,$ddamount)."','".mysqli_real_escape_string($conn4as,$total)."','".mysqli_real_escape_string($conn4as,$amountpaid)."','1','new')");

echo 'GYMREG';
}
}

///////////////////////Renew GYM
if ($_POST["dwat"] == "editgym1"){
if ($_POST["duration"] == ''){echo 'Membership duration is required';}
elseif ($_POST["membertype"] == ''){echo 'Membership Type is required';}
elseif ($_POST["paymenttype"] == ''){echo 'Payment Type is required';}
elseif ($_POST["amount"] == '' && $_POST["ddamount"] == ''){echo 'Payment Amount or DD Amount Fee is required';}
else{
$regdate = time();
$invoice = time();

//gym first table
mysqli_query($conn4as,"UPDATE gym SET issync = '2', currentinv = '".mysqli_real_escape_string($conn4as,$invoice)."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]));
$newid = mysqli_insert_id($conn4as);

//gym payment table
loadDurations();
$duration = $gymDurations[$_POST["duration"]][2];
$startdate = date("Y-m-d");
$enddate = GetFutureDate($startdate,$duration,'months');
$dueamount = $gymDurations[$_POST["duration"]][3];
$regfee = $_POST["regfee"];
$ddamount = $_POST["ddamount"];
$amountpaid = $_POST["amount"];
$total = $dueamount + $regfee + $ddamount;
$balance = $total - $amountpaid;

mysqli_query($conn4as,"INSERT INTO gympayments(userid, invoiceid, duration, startdate, enddate, membertype, regfee, debittype, paymenttype, amount, ddamount, total, amountpaid, ispaid, status) VALUES('".mysqli_real_escape_string($conn4as,$_POST["hidid"])."','".mysqli_real_escape_string($conn4as,$invoice)."','".mysqli_real_escape_string($conn4as,$duration)."','".mysqli_real_escape_string($conn4as,$startdate)."','".mysqli_real_escape_string($conn4as,$enddate)."','".mysqli_real_escape_string($conn4as,$_POST["membertype"])."','".mysqli_real_escape_string($conn4as,$regfee)."','".mysqli_real_escape_string($conn4as,$_POST["debittype"])."','".mysqli_real_escape_string($conn4as,$_POST["paymenttype"])."','".mysqli_real_escape_string($conn4as,$dueamount)."','".mysqli_real_escape_string($conn4as,$ddamount)."','".mysqli_real_escape_string($conn4as,$total)."','".mysqli_real_escape_string($conn4as,$amountpaid)."','1','renew')");

echo 'GYMRENEW';
}
}

if ($_GET["dwat"] == "reloadclientsopt"){
 echo OptionWithRoomCustomers_RoomNoOnly();
}

if ($_GET["dwat"] == "isDue4CheckOut"){
$today = date("Y-m-d");
 $qry = mysqli_query($conn4as,"SELECT order_room.invoiceid,order_room.roomid, addroom.roomType FROM order_room INNER JOIN addroom ON order_room.roomid = addroom.id WHERE order_room.checkout = '".mysqli_real_escape_string($conn4as,$today)."' AND order_room.checkstatus = 'in' ORDER BY order_room.id");
 $total = mysqli_num_rows($qry);
 if($total > 0){
 	$rs = mysqli_fetch_assoc($qry);
	$alertmsg = '<b>'.strtoupper($rs["roomType"]).' is checking out today!</b><br>Prepare to process respective invoice(s)';
 }else{
 	$alertmsg = '';
 }
 echo $alertmsg;
}

if ($_POST["dwat"] == "returnitem"){
$invoiceid = $_POST["invoiceid"];
$itemid = $_POST["id"];
$rqty = $_POST["rqty"];

if($invoiceid == ''){ echo 'Invoice id is missing.';}
elseif($itemid == ''){ echo 'Item id is missing.';}
elseif($rqty == '' || $rqty == '0'){ echo 'Quantity to return must be greater than zero.';}
else{
$qry = mysqli_query($conn4as,"SELECT id,itemid,invoiceid,qty,discount,unitprice,total,servicecharge FROM order_bar WHERE id = ".mysqli_real_escape_string($conn4as,$itemid)." AND invoiceid = '".mysqli_real_escape_string($conn4as,$invoiceid)."' ORDER BY id");
$rstotal = mysqli_num_rows($qry);

if($rstotal > 0){
	$rs = mysqli_fetch_assoc($qry);
	$id = $rs["id"];
	$itemid = $rs["itemid"];
	$invoiceid = $rs["invoiceid"];
	$qty = $rs["qty"];
	$discount = $rs["discount"];
	$unitprice = $rs["unitprice"];
	$total = $rs["total"];
	$servicecharge = $rs["servicecharge"];
	
	if($qty < $rqty){
		echo 'Operation aborted. Quantity to return is more than initial quantity ordered.';		
	}else{
		if($servicecharge > 0){ $total -= $servicecharge; }
		$newqty = $qty - $rqty;
		$eachtotal = $total / $qty;
		$ramt = $rqty * $eachtotal; //$rqty * $unitprice;
		$newtotal = $eachtotal * $newqty; //$total - $ramt;
		$msg = $rqty.' quantity returned';
		if($servicecharge > 0){ $newtotal += $servicecharge; }
		
		mysqli_query($conn4as,"UPDATE order_bar SET issync = '2', itemdescr = '".mysqli_real_escape_string($conn4as,$msg)."', qty = '".mysqli_real_escape_string($conn4as,$newqty)."', total = '".mysqli_real_escape_string($conn4as,$newtotal)."' WHERE id = ".mysqli_real_escape_string($conn4as,$id)); 				 		//select from orders
		$qry = mysqli_query($conn4as,"SELECT id,invoiceid,total FROM orders WHERE invoiceid = '".mysqli_real_escape_string($conn4as,$invoiceid)."' ORDER BY id");
		$rs = mysqli_fetch_assoc($qry);
		$gtotal = $rs["total"];
		$gnewtotal = $gtotal - $ramt;
		mysqli_query($conn4as,"UPDATE orders SET issync = '2', total = '".mysqli_real_escape_string($conn4as,$gnewtotal)."' WHERE invoiceid = '".mysqli_real_escape_string($conn4as,$invoiceid)."'");
		mysqli_query($conn4as,"UPDATE addbar SET issync = '2', itemleft = itemleft + ".mysqli_real_escape_string($conn4as,$rqty)." WHERE id = '".mysqli_real_escape_string($conn4as,$itemid)."'");
		echo 'RETURNSUC<->'.$invoiceid;
	}
	
}else{
	echo 'Item not found..';
}

}
}

if ($_POST["dwat"] == "returnitem2"){
$invoiceid = $_POST["invoiceid"];
$itemid = $_POST["id"];
$rqty = $_POST["rqty"];

if($invoiceid == ''){ echo 'Invoice id is missing.';}
elseif($itemid == ''){ echo 'Item id is missing.';}
elseif($rqty == '' || $rqty == '0'){ echo 'Quantity to return must be greater than zero.';}
else{
$qry = mysqli_query($conn4as,"SELECT id,itemid,invoiceid,qty,discount,unitprice,total,servicecharge FROM order_bar2 WHERE id = ".mysqli_real_escape_string($conn4as,$itemid)." AND invoiceid = '".mysqli_real_escape_string($conn4as,$invoiceid)."' ORDER BY id");
$rstotal = mysqli_num_rows($qry);

if($rstotal > 0){
	$rs = mysqli_fetch_assoc($qry);
	$id = $rs["id"];
	$itemid = $rs["itemid"];
	$invoiceid = $rs["invoiceid"];
	$qty = $rs["qty"];
	$discount = $rs["discount"];
	$unitprice = $rs["unitprice"];
	$total = $rs["total"];
	$servicecharge = $rs["servicecharge"];
	
	if($qty < $rqty){
		echo 'Operation aborted. Quantity to return is more than initial quantity ordered.';		
	}else{
		if($servicecharge > 0){ $total -= $servicecharge; }
		$newqty = $qty - $rqty;
		$eachtotal = $total / $qty;
		$ramt = $rqty * $eachtotal; //$rqty * $unitprice;
		$newtotal = $eachtotal * $newqty; //$total - $ramt;
		$msg = $rqty.' quantity returned';
		if($servicecharge > 0){ $newtotal += $servicecharge; }
		
		mysqli_query($conn4as,"UPDATE order_bar2 SET issync = '2', itemdescr = '".mysqli_real_escape_string($conn4as,$msg)."', qty = '".mysqli_real_escape_string($conn4as,$newqty)."', total = '".mysqli_real_escape_string($conn4as,$newtotal)."' WHERE id = ".mysqli_real_escape_string($conn4as,$id)); 				 		//select from orders
		$qry = mysqli_query($conn4as,"SELECT id,invoiceid,total FROM orders WHERE invoiceid = '".mysqli_real_escape_string($conn4as,$invoiceid)."' ORDER BY id");
		$rs = mysqli_fetch_assoc($qry);
		$gtotal = $rs["total"];
		$gnewtotal = $gtotal - $ramt;
		mysqli_query($conn4as,"UPDATE orders SET issync = '2', total = '".mysqli_real_escape_string($conn4as,$gnewtotal)."' WHERE invoiceid = '".mysqli_real_escape_string($conn4as,$invoiceid)."'");
		mysqli_query($conn4as,"UPDATE addbar2 SET issync = '2', itemleft = itemleft + ".mysqli_real_escape_string($conn4as,$rqty)." WHERE id = '".mysqli_real_escape_string($conn4as,$itemid)."'");
		echo 'RETURNSUC2<->'.$invoiceid;
	}
	
}else{
	echo 'Item not found..';
}

}
}

if ($_POST["dwat"] == "transferguest"){
$hidid = $_POST["hidid"];
$hidinvoiceid = $_POST["hidinvoiceid"];
$hidroomid = $_POST["hidroomid"];
$hidroomname = $_POST["hidroomname"];
$hidroomrate = $_POST["hidroomrate"];
$hidtotal = $_POST["hidtotal"];
$hidispaid = $_POST["hidispaid"];
$hiddiscount = $_POST["hiddiscount"];
$hidduration = $_POST["hidduration"];

if($_POST["hidvat"] == ''){ $hidvat = 0; }else{ $hidvat = $_POST["hidvat"]; }

$transfertype = $_POST["transfertype"];
$roomid = $_POST["roomname"];

if($_POST["discount"] == ''){ $discount = 0; }else{ $discount = $_POST["discount"]; }

if($transfertype == ''){ echo 'Transfer type is required.';}
elseif($roomid == ''){ echo 'Room name is required.';}
else{

$qry = mysqli_query($conn4as,"SELECT id,roomType,roomrate FROM addroom WHERE id = ".mysqli_real_escape_string($conn4as,$roomid));
$rs = mysqli_fetch_assoc($qry);
$roomrate = $rs["roomrate"];
$roomname = $rs["roomType"];
//echo $hidroomname.' '.$hidroomrate.' - '.$roomname.' '.$roomrate;
if($transfertype == 'cr'){
	if($roomrate == $hidroomrate){
		mysqli_query($conn4as,"UPDATE order_room SET issync = '2', roomid = '".mysqli_real_escape_string($conn4as,$roomid)."' WHERE id = ".mysqli_real_escape_string($conn4as,$hidid));
		mysqli_query($conn4as,"UPDATE addroom SET issync = '2', roomleft = '0',currentinv = '".mysqli_real_escape_string($conn4as,$hidinvoiceid)."' WHERE id = ".mysqli_real_escape_string($conn4as,$roomid));
		mysqli_query($conn4as,"UPDATE addroom SET issync = '2', roomleft = '1',currentinv = '' WHERE id = ".mysqli_real_escape_string($conn4as,$hidroomid));
		
		redirect('manage-inout-grid.php?m=You have successfully changed room from '.$hidroomname.' to '.$roomname);
	}else{
		echo 'Move customer to another room of the same price ('.$cursign.number_format($hidroomrate).').';		
	}

}elseif($transfertype == 'ur'){
	if($roomrate > $hidroomrate){
	//calculate new total after discount....
	$totalrate = $roomrate * $hidduration;
	$caldiscount = $totalrate * ($discount/100);
	$calvat = $totalrate * ($hidvat/100);	
	$total = ($totalrate + $calvat) - ($caldiscount);
	//Now update order_room table....
	mysqli_query($conn4as,"UPDATE order_room SET issync = '2', roomid = '".mysqli_real_escape_string($conn4as,$roomid)."',discount = '".mysqli_real_escape_string($conn4as,$discount)."',unitprice = '".mysqli_real_escape_string($conn4as,$roomrate)."',total = '".mysqli_real_escape_string($conn4as,$total)."' WHERE id = ".mysqli_real_escape_string($conn4as,$hidid));
	
	mysqli_query($conn4as,"UPDATE addroom SET issync = '2', roomleft = '0',currentinv = '".mysqli_real_escape_string($conn4as,$hidinvoiceid)."' WHERE id = ".mysqli_real_escape_string($conn4as,$roomid));
	mysqli_query($conn4as,"UPDATE addroom SET issync = '2', roomleft = '1',currentinv = '' WHERE id = ".mysqli_real_escape_string($conn4as,$hidroomid));
		
	// update orders table........
	
	$oldtotal = mysqli_fetch_assoc(mysqli_query($conn4as,"SELECT total FROM orders WHERE invoiceid = '".mysqli_real_escape_string($conn4as,$hidinvoiceid)."'"))["total"];
	$nowtotal = ($oldtotal - $hidtotal) + $total;
	mysqli_query($conn4as,"UPDATE orders SET issync = '2', total = '".mysqli_real_escape_string($conn4as,$nowtotal)."' WHERE invoiceid = '".mysqli_real_escape_string($conn4as,$hidinvoiceid)."'");
	
	$extra = $total - $hidtotal;
	$m = ' Collect amount of '.$extra.' from customer to balance your account.';
	
	$msg = 'You have successfully upgraded customer from '.$hidroomname.' ('.$hidroomrate.') to '.$roomname.' ('.$roomrate.'). '.$m;
	redirect('manage-inout-grid.php?m='.$msg);
	
	}else{
		echo 'Room rate to upgrade to must be higher than the current room rate ('.$cursign.number_format($hidroomrate).'). Downgrade not allowed.';
	}
//................

}
}
}

/********************** New Codes ********************/
/***** Add Deposit *****************************************************/
if ($_POST["dwat"] == "adddeposit"){
if ($_POST["guest"] == ''){echo 'Select customer to fund.';}
else if ($_POST["amount"] == ''){echo 'Amount is required';}
else if ($_POST["amount"] <= 0){echo 'Amount must be greater than zero';}
else{
$time = time();
$lastdtime = date("H:i:s");
$lastddate = date("Y-m-d");
$amt = $_POST["amount"];
$qry2 = mysqli_query($conn4as,"SELECT amount FROM addclient WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["guest"]));
$rs2 = mysqli_fetch_assoc($qry2);
$amount = $rs2["amount"];
$newamount = $amount + $amt;
$sql = "UPDATE addclient SET amount = '".mysqli_real_escape_string($conn4as,$newamount)."', lastdeposit = ".mysqli_real_escape_string($conn4as,$amt).", lastddate = '".mysqli_real_escape_string($conn4as,$lastddate)."',issync = '2' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["guest"]);
mysqli_query($conn4as,$sql);

$qry = mysqli_query($conn4as,"SELECT id,lastname,firstname FROM addclient WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["guest"]));
$rs = mysqli_fetch_assoc($qry);
$name = $rs["lastname"].' '.$rs["firstname"];
$name = ($name != '')?strtoupper($name):'Guest';

/////// ORDER TABLE iNSERT ///////////////////////
$invoiceid = $time;
$sqldep = "INSERT INTO orders(invoiceid, guestid, isroom, isbar, issport, isspa, isswimpool, islaundary, isrestaurant, orderdate, ordertime, total,ispaid,paystatus) VALUES('".mysqli_real_escape_string($conn4as,$invoiceid)."','".mysqli_real_escape_string($conn4as,$_POST["guest"])."','0','0','0','0','0','0','0','".mysqli_real_escape_string($conn4as,$lastddate)."','".mysqli_real_escape_string($conn4as,$lastdtime)."','".mysqli_real_escape_string($conn4as,$amt)."','1','cw')";
mysqli_query($conn4as,$sqldep);
/////////////////////////////////////////

$log = "[".date("y/m/d h:i:s A")."],<br>STAFF: ".$_SESSION["amyn15"]." (ID: ".$_SESSION["amyi15"]."),<br>Deposited ".number_format($_POST["amount"],2)." to ".strtoupper($name)." (ID: ".$_POST["guest"].") e-wallet \r\n=======================================\r\n"; 
WriteToFile("../logs/".$logfilename,$log);

redirect('manage-ewallet.php?m='.number_format($_POST["amount"],2).' successfully added to '.$name.' e-wallet');
}
}

if ($_POST["dwat"] == "editwallet"){
if ($_POST["hidid"] == ''){echo 'Customer ID is required.';}
else if ($_POST["amount"] == ''){echo 'Amount is required';}
//else if ($_POST["amount"] <= 0){echo 'Amount must be greater than zero';}
else{
$sql = "SELECT amount FROM addclient WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);
$qry = mysqli_query($conn4as,$sql);
$total = mysqli_num_rows($qry);
if($total > 0){
$rs = mysqli_fetch_assoc($qry);
$oldamt = $rs["amount"];
$time = time();
$lastdtime = date("H:i:s");
$lastddate = date("Y-m-d");
$sql = "UPDATE addclient SET issync = '2', amount = ".mysqli_real_escape_string($conn4as,$_POST["amount"])." WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);
mysqli_query($conn4as,$sql);

$name = $_POST["lastname"].' '.$_POST["firstname"];
$name = ($name != '')?strtoupper($name):'Guest';
//////////// SUBMIT TO ORDER ///////////////////////
$invoiceid = 'D'.$time;
if($_POST["amount"] > $oldamt){
	$diffamt = $_POST["amount"] - $oldamt;
	$sqldep = "INSERT INTO orders(invoiceid, guestid, isroom, isbar, issport, isspa, isswimpool, islaundary, isrestaurant, orderdate, ordertime, total,ispaid,paystatus) VALUES('".mysqli_real_escape_string($conn4as,$invoiceid)."','".mysqli_real_escape_string($conn4as,$_POST["guest"])."','0','0','0','0','0','0','0','".mysqli_real_escape_string($conn4as,$lastddate)."','".mysqli_real_escape_string($conn4as,$lastdtime)."','".mysqli_real_escape_string($conn4as,$diffamt)."','1','cw')";
	mysqli_query($conn4as,$sqldep);
}elseif($_POST["amount"] < $oldamt){
	$diffamt = $oldamt - $_POST["amount"];
	$sqldep = "INSERT INTO orders(invoiceid, guestid, isroom, isbar, issport, isspa, isswimpool, islaundary, isrestaurant, orderdate, ordertime, total,ispaid,paystatus) VALUES('".mysqli_real_escape_string($conn4as,$invoiceid)."','".mysqli_real_escape_string($conn4as,$_POST["hidid"])."','0','0','0','0','0','0','0','".mysqli_real_escape_string($conn4as,$lastddate)."','".mysqli_real_escape_string($conn4as,$lastdtime)."','".mysqli_real_escape_string($conn4as,$diffamt)."','1','ew')";
	mysqli_query($conn4as,$sqldep);
}

///////////////////////////////////////////////////
$log = "[".date("y/m/d h:i:s A")."],<br>STAFF: ".$_SESSION["amyn15"]." (ID: ".$_SESSION["amyi15"]."),<br>Updated ".strtoupper($name)." (ID: ".$_POST["hidid"].") e-wallet fund from ".number_format($_POST["hidamount"],2)." to ".number_format($_POST["amount"],2)."\r\n=======================================\r\n"; 
WriteToFile("../logs/".$logfilename,$log);

redirect('manage-ewallet.php?m='.$name.' e-wallet fund successfully updated from '.number_format($_POST["hidamount"],2).' to '.number_format($_POST["amount"],2) );
}else{
echo 'Wallet not found.';
}
}
}

if ($_POST["dwat"] == "doWithdraw"){
if ($_POST["hidid"] == ''){echo 'Customer ID is required.';}
else if ($_POST["amount"] == ''){echo 'Amount to withdraw is required';}
else if ($_POST["amount"] <= 0){echo 'Amount must be greater than zero';}
else if ($_POST["amount"] > $_POST["hidamount"]){echo 'Insufficient fund.';}
else if ($globalid == ""){echo 'Account not recognized.';}
else{
$totaldebt = getOverallDebt($_POST["hidid"]);
$deposit = GetMyDeposit($_POST["hidid"]); //$_POST["hidamount"];
if($deposit >= $totaldebt){ $availfund = $deposit - $totaldebt; }
else{ $availfund = 0; }

if($_POST["amount"] > $availfund){
	echo 'Insufficient fund due to overall debt.';
}else{
$newDeposit = $availfund - $_POST["amount"];
$time = time();
$lastdtime = date("H:i:s");
$lastwdate = date("Y-m-d");
$sql = "UPDATE addclient SET issync = '2', amount = '".mysqli_real_escape_string($conn4as,$newDeposit)."',lastwithdraw = '".mysqli_real_escape_string($conn4as,$_POST["amount"])."', lastwdate = '".mysqli_real_escape_string($conn4as,$lastwdate)."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);
mysqli_query($conn4as,$sql);

/////////////// ORDER TABLE /////////////////
$invoiceid = 'D'.$time;
$sqldep = "INSERT INTO orders(invoiceid, guestid, isroom, isbar, issport, isspa, isswimpool, islaundary, isrestaurant, orderdate, ordertime, total,ispaid,paystatus) VALUES('".mysqli_real_escape_string($conn4as,$invoiceid)."','".mysqli_real_escape_string($conn4as,$_POST["hidid"])."','0','0','0','0','0','0','0','".mysqli_real_escape_string($conn4as,$lastddate)."','".mysqli_real_escape_string($conn4as,$lastdtime)."','".mysqli_real_escape_string($conn4as,$_POST["amount"])."','1','ww')";
mysqli_query($conn4as,$sqldep);
////////////////////////////////////////////

$name = $_POST["lastname"].' '.$_POST["firstname"];
$name = ($name != '')?strtoupper($name):'Guest';

$log = "[".date("y/m/d h:i:s A")."],<br>STAFF: ".$_SESSION["amyn15"]." (ID: ".$_SESSION["amyi15"]."),<br>Withdrawed ".number_format($_POST["amount"],2)." from ".strtoupper($name)." (ID: ".$_POST["hidid"].") e-wallet. Amount Before Withdraw: ".number_format($deposit,2)."\r\n=======================================\r\n"; 
WriteToFile("../logs/".$logfilename,$log);
redirect('manage-ewallet.php?m=Successfully withdrawed '.number_format($_POST["amount"],2).' from '.$name.' e-wallet' );
}
}
}

//////////////////// BAR REQUEST ///////////////////////
if ($_POST["dwat"] == "addbarrequest"){
if ($_POST["bartype"] == ''){echo 'Bar tye is required';}
else if ($_POST["barname"] == ''){echo 'Bar name is required';}
else if ($_POST["qty"] == ''){echo 'Quantity is required';}
else{
if ($_POST["bartype"] == '1'){ $bartype = 'bar'; }
elseif ($_POST["bartype"] == '2'){ $bartype = 'bar2'; }
$itemid = $_POST["barname"];
$itemname = $_POST["barlabel"];
$time = time();
$QtyInStore = CheckQtyInStore($itemid,$itemname);
if($QtyInStore < $_POST["qty"]){
echo ($QtyInStore <= 0)?'No '.$itemname.' in store, contact the Manager or Administrator.':'Insufficient Item. Only '.$QtyInStore.' of '.$itemname.' left in store.';
}else{
$sql = "INSERT INTO barrequest(bartype,itemname,itemid,qty,staffid,approveby,approvedate) VALUES('".mysqli_real_escape_string($conn4as,$bartype)."','".mysqli_real_escape_string($conn4as,$itemname)."','".mysqli_real_escape_string($conn4as,$itemid)."','".mysqli_real_escape_string($conn4as,$_POST["qty"])."','".mysqli_real_escape_string($conn4as,$globalid)."','','".mysqli_real_escape_string($conn4as,$time)."')";
mysqli_query($conn4as,$sql);
echo 'NewBarRequestAdded';
}
}
}

if ($_POST["dwat"] == "addbarrequestSaved"){
if ($_POST["bartype"] == ''){echo 'Bar tye is required';}
else if ($_POST["barname"] == ''){echo 'Bar name is required';}
else if ($_POST["qty"] == ''){echo 'Quantity is required';}
else{
if ($_POST["bartype"] == '1'){ $bartype = 'bar'; }
elseif ($_POST["bartype"] == '2'){ $bartype = 'bar2'; }
$itemid = $_POST["barname"];
$itemname = $_POST["barlabel"];
$time = time();
$QtyInStore = CheckQtyInStore($itemid,$itemname);
if($QtyInStore < $_POST["qty"]){
echo ($QtyInStore <= 0)?'No '.$itemname.' in store, contact the Manager or Administrator.':'Insufficient Item. Only '.$QtyInStore.' of '.$itemname.' left in store.';
}else{
$sql = "INSERT INTO barrequest(bartype,itemname,itemid,qty,staffid,approveby,approvedate) VALUES('".mysqli_real_escape_string($conn4as,$bartype)."','".mysqli_real_escape_string($conn4as,$itemname)."','".mysqli_real_escape_string($conn4as,$itemid)."','".mysqli_real_escape_string($conn4as,$_POST["qty"])."','".mysqli_real_escape_string($conn4as,$globalid)."','','".mysqli_real_escape_string($conn4as,$time)."')";
mysqli_query($conn4as,$sql);
echo 'NewBarRequestAdded';
}
}
}

//////////////////// RASHEED CODE ///////////////////////
if ($_POST["dwat"] == "addexp"){
if ($_POST["title"] == ''){echo 'Title is required';}
else if ($_POST["amount"] == ''){echo 'Amount is required';}
else{
$sql = "INSERT INTO expenditure(title,amount,expdate,description,staffid,approveby,dept) VALUES('".mysqli_real_escape_string($conn4as,$_POST["title"])."','".mysqli_real_escape_string($conn4as,$_POST["amount"])."','".mysqli_real_escape_string($conn4as,$_POST["expdate"])."','".mysqli_real_escape_string($conn4as,$_POST["description"])."','".mysqli_real_escape_string($conn4as,$globalid)."','','".mysqli_real_escape_string($conn4as,$_POST["dept"])."')";
mysqli_query($conn4as,$sql);
echo 'NewExpensesAdded';
}
}

if ($_POST["dwat"] == "editexp"){
if ($_POST["title"] == ''){echo 'Title is required';}
else if ($_POST["amount"] == ''){echo 'Amount is required';}
else{
$sql = "UPDATE expenditure SET issync = '2', title = '".mysqli_real_escape_string($conn4as,$_POST["title"])."',amount='".mysqli_real_escape_string($conn4as,$_POST["amount"])."',expdate='".mysqli_real_escape_string($conn4as,$_POST["expdate"])."',description='".mysqli_real_escape_string($conn4as,$_POST["description"])."',staffid='".mysqli_real_escape_string($conn4as,$globalid)."',dept='".mysqli_real_escape_string($conn4as,$_POST["dept"])."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);
mysqli_query($conn4as,$sql);
//echo 'ExpensesEditted';
redirect("expenditure.php?m=Record successfully updated");
}
}

if ($_POST["dwat"] == "approveExp"){
if ($_POST["id"] == ''){echo 'Record does not exist.';}
else{
	$sql = "UPDATE expenditure SET issync = '2', approveby = '".mysqli_real_escape_string($conn4as,$globalid)."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["id"]);
	mysqli_query($conn4as,$sql);
	echo 'ExpReqApproved';
}
}

if ($_POST["dwat"] == "approveBarReq"){
if ($_POST["id"] == ''){echo 'Record does not exist.';}
else{
	$sql = "UPDATE barrequest SET issync = '2', approveby = '".mysqli_real_escape_string($conn4as,$globalid)."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["id"]);
	mysqli_query($conn4as,$sql);
	echo 'BarReqApproved';
}
}

if ($_POST["dwat"] == "delbarrequest"){
if ($_POST["id"] == ''){echo 'Record does not exist.';}
else{
	$sql = "DELETE FROM barrequest WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["id"]);
	mysqli_query($conn4as,$sql);
	redirect("?m=Record successfully deleted");
}
}

if ($_POST["dwat"] == "delexp"){
if ($_POST["id"] == ''){echo 'Record does not exist.';}
else{
	$sql = "DELETE FROM expenditure WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["id"]);
	mysqli_query($conn4as,$sql);
	redirect("?m=Record successfully deleted");
}
}

if ($_REQUEST["dwat"] == "getBar2WaiterAlert"){
 $qry = mysqli_query($conn4as,"SELECT count(id) AS ctn FROM order_bar2 WHERE isflag = '0'");
 $rs = mysqli_fetch_assoc($qry);
 $ctn = $rs["ctn"];
 if($ctn > 0){ 	
	$wAlert = ($ctn > 1)?'You have '.$ctn.' awaiting order requests from waiter(s).':'You have '.$ctn.' awaiting order request from waiter.';
 }else{
 	$wAlert = '';
 }
 echo $wAlert;
}

if ($_REQUEST["dwat"] == "getBarWaiterAlert"){
 $qry = mysqli_query($conn4as,"SELECT count(id) AS ctn FROM order_bar WHERE isflag = '0'");
 $rs = mysqli_fetch_assoc($qry);
 $ctn = $rs["ctn"];
 if($ctn > 0){ 	
	$wAlert = ($ctn > 1)?'You have '.$ctn.' awaiting order requests from waiter(s).':'You have '.$ctn.' awaiting order request from waiter.';
 }else{
 	$wAlert = '';
 }
 echo $wAlert;
}

if ($_POST["dwat"] == "addschedule"){
$MyDepositBal = GetMyDeposit($_POST["clientid"]);
$noofdays = GetDaysBetweenDates($_POST["checkin"],$_POST["checkout"]);

if ($_POST["clientid"] == ''){echo 'Client Name is required';}
else if ($_POST["roomname"] == ''){echo 'Room is required.';}
else if (strtotime(str_replace("/","-",$_POST["checkin"])) < $mktoday){echo 'Back date is not allowed. Adjust the check-in date';}
else if ($_POST["checkin"] == '' || $_POST["checkin"] == 'mm/dd/yyyy'){echo 'Date to check in is required';}
else if (strtotime(str_replace("/","-",$_POST["checkout"])) < $mktoday){echo 'Back date is not allowed. Adjust the check-out date';}
else if ($_POST["checkout"] == '' || $_POST["checkout"] == 'mm/dd/yyyy'){echo 'Expected check out date is required';}
else if (validateB4ClaimingRoom($_POST["checkin"],$_POST["checkout"],$_POST["roomname"],'reserve')){echo 'Room has already been reserved with the date. Choose another room.';}
else if ($_POST["paystatus"] == ''){echo 'Payment status is required';}
//else if ($_POST["paystatus"] == '1' && $MyDepositBal < $totalamount){echo 'Insufficient fund in the wallet. Please fund the wallet.';}
else if($noofdays < 1){ echo 'You need to reserve room at least for a day.';}
else{
	if(validateB4ClaimingRoom($_POST["checkin"],$_POST["checkout"],$_POST["roomname"],'book')){
		echo 'Sorry, room is already occupied for the date choosen. Choose another date.';
	}else{
	
	$orderdate = time();
	
	if ($_POST["paystatus"] == '1'){
		$debitres = GetBookingDueAmountnPay($_POST["roomname"],$_POST["checkin"],$_POST["checkout"],$noofdays,$_POST["clientid"],$MyDepositBal);
		
		if($debitres < 1){
			echo ($debitres == 0)?'Insufficient fund in your wallet.':'No wallet attached to this account. Create a new wallet and fund it.';
		}else{
		$sql = "INSERT INTO tblschedule(userid,name,phone,checkindate,checkoutdate,roomid,paystatus,orderdate,amount) VALUES('".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$_POST["name"])."','".mysqli_real_escape_string($conn4as,$_POST["phone"])."','".mysqli_real_escape_string($conn4as,$_POST["checkin"])."','".mysqli_real_escape_string($conn4as,$_POST["checkout"])."','".mysqli_real_escape_string($conn4as,$_POST["roomname"])."','".mysqli_real_escape_string($conn4as,$_POST["paystatus"])."','".mysqli_real_escape_string($conn4as,$orderdate)."','".mysqli_real_escape_string($conn4as,$debitres)."')";
		mysqli_query($conn4as,$sql);
		echo 'NewSchedulAdded';
		}
	}else{
	$sql = "INSERT INTO tblschedule(userid,name,phone,checkindate,checkoutdate,roomid,paystatus,orderdate) VALUES('".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$_POST["name"])."','".mysqli_real_escape_string($conn4as,$_POST["phone"])."','".mysqli_real_escape_string($conn4as,$_POST["checkin"])."','".mysqli_real_escape_string($conn4as,$_POST["checkout"])."','".mysqli_real_escape_string($conn4as,$_POST["roomname"])."','".mysqli_real_escape_string($conn4as,$_POST["paystatus"])."','".mysqli_real_escape_string($conn4as,$orderdate)."')";
	mysqli_query($conn4as,$sql);
	echo 'NewSchedulAdded';
	}
	}
}
}

if ($_POST["dwat"] == "delschedule"){
	if ($_POST["id"] == ''){echo 'Undefined record.';}
	else{
		$qry = mysqli_query($conn4as,"SELECT id,userid,paystatus,amount FROM tblschedule WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["id"]));
		$total = mysqli_num_rows($qry);
		$rs = mysqli_fetch_assoc($qry);
		if($total > 0){
		$amount = $rs["amount"];
		$userid = $rs["userid"];
		$paystatus = $rs["paystatus"];
		
		if(delete('tblschedule',"id = ".mysqli_real_escape_string($conn4as,$_POST["id"]))){
			if($amount > 0 && $paystatus == '1'){
				mysqli_query($conn4as,"UPDATE addclient SET issync = '2', amount = amount + ".mysqli_real_escape_string($conn4as,$amount)." WHERE id = ".mysqli_real_escape_string($conn4as,$userid));
			}
			echo 'deleted';
		}else{
			echo 'Could not delete record.';
		}
		}else{
			echo 'Reservation not found.';
		}
	}
}

/*********** Send New Item Name to Bars ************/
if ($_POST["dwat"] == "transfer2bar"){

if ($_POST["storeitemid"] == ''){echo 'Item from store not found. Try again';}
else if ($_POST["bartype"] == ''){echo 'Type of bar is required';}
else if ($_POST["barname"] == '' && $_POST["chkaddasnew"] != '1'){echo 'Select the bar item to restock.';}
else if ($_POST["barqty"] == '' || validate($_POST["barqty"],"0-9")){echo 'Quantity is required. Numeric value only, no comma';}
else{
$storeid = $_POST["storeitemid"];
$addasnew = $_POST["chkaddasnew"];
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
	echo 'Insufficient quantity.';
}else{
if($bartype == '3'){
$bartable = 'addbar3';
////////////////////
if($addasnew == '1'){ 
//.....add to bar3, bar3 add history, get leftover qty & update store, then add transfer history to tblstorehistory table ....
$sql = "INSERT INTO addbar3(name,categoryid,instock,itemleft,measure,quantity,price,description,barcode,costprice,newstock,oldremstock,laststockadd,datelaststockadd) VALUES('".mysqli_real_escape_string($conn4as,$storename)."','".mysqli_real_escape_string($conn4as,$storecatid)."','".mysqli_real_escape_string($conn4as,$barqty)."','".mysqli_real_escape_string($conn4as,$barqty)."','".mysqli_real_escape_string($conn4as,$storemeasure)."','".mysqli_real_escape_string($conn4as,$storequantity)."','".mysqli_real_escape_string($conn4as,$storeprice)."','','".mysqli_real_escape_string($conn4as,$storebarcode)."','".mysqli_real_escape_string($conn4as,$storecostprice)."','".mysqli_real_escape_string($conn4as,$barqty)."','0','".mysqli_real_escape_string($conn4as,$barqty)."','".mysqli_real_escape_string($conn4as,$time)."')";
mysqli_query($conn4as,$sql);
$newitemid = mysqli_insert_id($conn4as);

$regdate = date("Y-m-d");
$regtime = date("H:i:s");
$sql = "INSERT INTO tblrestock(itemid, itemtype, qty, itemleft, regdate, regstamp, staff, regtime, costprice, price, newstock) VALUES('".mysqli_real_escape_string($conn4as,$newitemid)."','bar3','".mysqli_real_escape_string($conn4as,$barqty)."','".mysqli_real_escape_string($conn4as,$barqty)."','".mysqli_real_escape_string($conn4as,$regdate)."','".mysqli_real_escape_string($conn4as,$time)."','".mysqli_real_escape_string($conn4as,$globalid)."','".mysqli_real_escape_string($conn4as,$regtime)."','".mysqli_real_escape_string($conn4as,$storecostprice)."','".mysqli_real_escape_string($conn4as,$storeprice)."','".mysqli_real_escape_string($conn4as,$barqty)."')";
mysqli_query($conn4as,$sql);

$newstoreqty = $storeqty - $barqty;
mysqli_query($conn4as,"UPDATE tblstore SET issync = '2', qtyinstore = ".mysqli_real_escape_string($conn4as,$newstoreqty)." WHERE id = ".mysqli_real_escape_string($conn4as,$storeid));
EditStoreHistory('store',$storeid,$barqty,$storeprice,$storecostprice,'remove');
EditStoreTransfer('bar3',$storeid,$barqty,$storeprice,$storecostprice);
echo 'STORE2BARADDED';
}else{ 
//.....update qty in bar3, bar3 update history, get leftover qty & update store, then add transfer history to tblstorehistory table ....
UpdateBar4rmStore('bar3',$barname,'addbar3',$barqty);
$newstoreqty = $storeqty - $barqty;
mysqli_query($conn4as,"UPDATE tblstore SET issync = '2', qtyinstore = ".mysqli_real_escape_string($conn4as,$newstoreqty)." WHERE id = ".mysqli_real_escape_string($conn4as,$storeid));
EditStoreHistory('store',$storeid,$barqty,$storeprice,$storecostprice,'remove');
EditStoreTransfer('bar3',$storeid,$barqty,$storeprice,$storecostprice);
echo 'STORE2BARUPDATED';
}
///////////////////////

}elseif($bartype == '2'){
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
EditStoreHistory('store',$storeid,$barqty,$storeprice,$storecostprice,'remove');
EditStoreTransfer('bar2',$storeid,$barqty,$storeprice,$storecostprice);
echo 'STORE2BARADDED';
}else{ 
//.....update qty in bar2, bar2 update history, get leftover qty & update store, then add transfer history to tblstorehistory table ....
UpdateBar4rmStore('bar2',$barname,'addbar2',$barqty);
$newstoreqty = $storeqty - $barqty;
mysqli_query($conn4as,"UPDATE tblstore SET issync = '2', qtyinstore = ".mysqli_real_escape_string($conn4as,$newstoreqty)." WHERE id = ".mysqli_real_escape_string($conn4as,$storeid));
EditStoreHistory('store',$storeid,$barqty,$storeprice,$storecostprice,'remove');
EditStoreTransfer('bar2',$storeid,$barqty,$storeprice,$storecostprice);
echo 'STORE2BARUPDATED';
}
///////////////////////
}elseif($bartype == '1'){
$bartable = 'addbar';
////////////////////
if($addasnew == '1'){ 
//.....add to bar, bar add history, get leftover qty & update store, then add transfer history to tblstorehistory table ....
$sql = "INSERT INTO addbar(name,categoryid,instock,itemleft,measure,quantity,price,description,barcode,costprice,newstock,oldremstock,laststockadd,datelaststockadd) VALUES('".mysqli_real_escape_string($conn4as,$storename)."','".mysqli_real_escape_string($conn4as,$storecatid)."','".mysqli_real_escape_string($conn4as,$barqty)."','".mysqli_real_escape_string($conn4as,$barqty)."','".mysqli_real_escape_string($conn4as,$storemeasure)."','".mysqli_real_escape_string($conn4as,$storequantity)."','".mysqli_real_escape_string($conn4as,$storeprice)."','','".mysqli_real_escape_string($conn4as,$storebarcode)."','".mysqli_real_escape_string($conn4as,$storecostprice)."','".mysqli_real_escape_string($conn4as,$barqty)."','0','".mysqli_real_escape_string($conn4as,$barqty)."','".mysqli_real_escape_string($conn4as,$time)."')";
mysqli_query($conn4as,$sql);
$newitemid = mysqli_insert_id($conn4as);

$regdate = date("Y-m-d");
$regtime = date("H:i:s");
$sql = "INSERT INTO tblrestock(itemid, itemtype, qty, itemleft, regdate, regstamp, staff, regtime, costprice, price, newstock) VALUES('".mysqli_real_escape_string($conn4as,$newitemid)."','bar','".mysqli_real_escape_string($conn4as,$barqty)."','".mysqli_real_escape_string($conn4as,$barqty)."','".mysqli_real_escape_string($conn4as,$regdate)."','".mysqli_real_escape_string($conn4as,$time)."','".mysqli_real_escape_string($conn4as,$globalid)."','".mysqli_real_escape_string($conn4as,$regtime)."','".mysqli_real_escape_string($conn4as,$storecostprice)."','".mysqli_real_escape_string($conn4as,$storeprice)."','".mysqli_real_escape_string($conn4as,$barqty)."')";
mysqli_query($conn4as,$sql);

$newstoreqty = $storeqty - $barqty;
mysqli_query($conn4as,"UPDATE tblstore SET issync = '2', qtyinstore = ".mysqli_real_escape_string($conn4as,$newstoreqty)." WHERE id = ".mysqli_real_escape_string($conn4as,$storeid));
EditStoreHistory('store',$storeid,$barqty,$storeprice,$storecostprice,'remove');
EditStoreTransfer('bar',$storeid,$barqty,$storeprice,$storecostprice);
echo 'STORE2BARADDED';
}else{ 
//.....update qty in bar, bar update history, get leftover qty & update store, then add transfer history to tblstorehistory table ....
UpdateBar4rmStore('bar',$barname,'addbar',$barqty);
$newstoreqty = $storeqty - $barqty;
mysqli_query($conn4as,"UPDATE tblstore SET issync = '2', qtyinstore = ".mysqli_real_escape_string($conn4as,$newstoreqty)." WHERE id = ".mysqli_real_escape_string($conn4as,$storeid));
EditStoreHistory('store',$storeid,$barqty,$storeprice,$storecostprice,'remove');
EditStoreTransfer('bar',$storeid,$barqty,$storeprice,$storecostprice);
echo 'STORE2BARUPDATED';
}
///////////////////////

}else{
echo 'No bar selected.';	
}
} //end of qty validation...
}else{
echo 'Store item not found.';	
}
}
}
/////////////////////////New 2020/////////////////////
if ($_POST["dwat"] == "orderbycard"){
	if (isset($_POST["chkroom"])){
		if ($_POST["clientid"] == ''){$e=1; $m .= 'Client name is required';}
		else if ($_POST["room_type"] == ''){$e=1; $m .= 'Room type is required';}
		else if ($_POST["roomrate"] == '' || validate($_POST["roomrate"],"0-9")){$e=1; $m .= 'Room unit price is required. Only numeric value is allowed. No comma';}
		else if ($_POST["roomleft"] == 0 || $_POST["roomleft"] == ''){$e=1; $m .= 'Room not available.';}
		else if ($_POST["noofroom"] == ''){$e=1; $m .= 'Number of room is required';}
		else if ($_POST["roomleft"] < $_POST["noofroom"]){$e=1; $m .= 'Room not enough.';}
		else if ($_POST["paystatus"] != '1' && $_POST["pay4rmewallet"] == '1' && !isDepositEnough($_POST["clientid"],$_POST["bookingtotal"]) ){$e=1; $m .= 'Insufficient fund in customer\'s e-wallet.';}
		
		else if ($_POST["noofperson"] == ''){$e=1; $m .= 'Number of person to occupy the room is required';}
		else if (strtotime(str_replace("/","-",$_POST["checkin"])) < $mktoday){$e=1; $m .= 'Back date is not allowed. Check your check in date';}
		else if (strtotime(str_replace("/","-",$_POST["checkout"])) < $mktoday){$e=1; $m .= 'Back date is not allowed. Check your check out date';}
		else if ($_POST["checkin"] == '' || $_POST["checkin"] == 'mm/dd/yyyy'){$e=1; $m .= 'Date to check in is required';}
		else if ($_POST["checkout"] == '' || $_POST["checkout"] == 'mm/dd/yyyy'){$e=1; $m .= 'Date to check out is required';}
		else if ($_POST["duration"] == '' || $_POST["duration"] == '0'){$e=1; $m .= 'Duration is required.';}
		else if ($_POST["bookingtotal"] == '' || $_POST["bookingtotal"] == '0' || validate($_POST["bookingtotal"],"0-9")){$e=1; $m .= 'Total amount under reservation is required and can not be zero. Only numeric value allowed. No comma';}
		else if(validateB4ClaimingRoom($_POST["checkin"],$_POST["checkout"],$_POST["room_type"],'reserve') && $_POST['reserveid'] == ''){ $e=1; $m .= 'Room has already been reserved, choose another room.'; }
		else if(validateB4ClaimingRoom($_POST["checkin"],$_POST["checkout"],$_POST["room_type"],'isin')){ $e=1; $m .= 'Room has already been occupied. Check-out customer in the room to check-in new customer'; }
	}
	//Bar
	if (isset($_POST["chkbar"])){
		if ($_POST["baritem"] == ''){$e=1; $m .= 'Bar item is required';}
		else if ($_POST["barprice"] == '' || validate($_POST["barprice"],"0-9")){$e=1; $m .= 'Bar item unit price is required. Numeric value only, no comma';}
		else if ($_POST["barquantity"] == ''){$e=1; $m .= 'Quantity under bar service is required';}
		else if ($_POST["barleft"] < $_POST["barquantity"]){$e=1; $m .= 'Item (drink) not enough.';}
		else if ($_POST["barorderdate"] == '' || $_POST["barorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under bar service is required';}
		else if (strtotime(str_replace("/","-",$_POST["barorderdate"])) < $mktoday){$e=1; $m .= 'Back date not allowed.';}
		else if ($_POST["bartotal"] == '' || validate($_POST["bartotal"],"0-9")){$e=1; $m .= 'Total amount under bar is required. Numeric value only. no comma';}
	}
	
	//restaurant
	if (isset($_POST["chkrestaurant"])){
		if ($_POST["resitem"] == ''){$e=1; $m .= 'food item is required';}
		else if ($_POST["resprice"] == '' || validate($_POST["resprice"],"0-9")){$e=1; $m .= 'food item unit price is required. Numeric value only no comma';}
		else if ($_POST["resquantity"] == ''){$e=1; $m .= 'Quantity of food order is required';}
		else if ($_POST["resorderdate"] == '' || $_POST["resorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under restaurant service is required';}
		else if (strtotime(str_replace("/","-",$_POST["resorderdate"])) < $mktoday){$e=1; $m .= 'Back date not allowed.';}
		else if ($_POST["restotal"] == '' || validate($_POST["restotal"],"0-9")){$e=1; $m .= 'Total amount under restaurant service is required. Numeric value only no comma';}
	}
	//laundary
	if (isset($_POST["chklaundary"])){
		if ($_POST["lauitem"] == ''){$e=1; $m .= 'Laundry service type is required';}
		else if ($_POST["lauprice"] == '' || validate($_POST["lauprice"],"0-9")){$e=1; $m .= 'Unit price under laundary is required. Numeric value only no comma';}
		//else if ($_POST["lauquantity"] == ''){$e=1; $m .= 'Quantity under laundary is required';}
		else if ($_POST["lauorderdate"] == '' || $_POST["lauorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under laundary is required';}
		else if (strtotime(str_replace("/","-",$_POST["lauorderdate"])) < $mktoday){$e=1; $m .= 'Back date not allowed.';}
		else if ($_POST["lautotal"] == '' || validate($_POST["lautotal"],"0-9")){$e=1; $m .= 'Total amount under laundary is required. Numeric value only no comma';}
	}
	//spa service
	if (isset($_POST["chkspa"])){
		if ($_POST["spaitem"] == ''){$e=1; $m .= 'Type of Spa service is required';}
		else if ($_POST["spaprice"] == '' || validate($_POST["spaprice"],"0-9")){$e=1; $m .= 'Price under spa is required. Numeric value only no comma';}
		else if ($_POST["spaquantity"] == ''){$e=1; $m .= 'Quantity under spa is required';}
		else if ($_POST["spaorderdate"] == '' || $_POST["spaorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under spa is required';}
		else if (strtotime(str_replace("/","-",$_POST["spaorderdate"])) < $mktoday){$e=1; $m .= 'Back date not allowed.';}
		else if ($_POST["spatotal"] == '' || validate($_POST["spatotal"],"0-9")){$e=1; $m .= 'Total amount under spa is required. Numeric value only no comma';}
	}
	//swimpool service
	if (isset($_POST["chkswimpool"])){
		if ($_POST["swimpoolitem"] == ''){$e=1; $m .= 'Type of Swimming pool service is required';}
		else if ($_POST["swimpoolprice"] == '' || validate($_POST["swimpoolprice"],"0-9")){$e=1; $m .= 'Price under swimming pool is required. Numeric value only no comma';}
		else if ($_POST["swimpoolduration"] == ''){$e=1; $m .= 'Duration under swimming pool is required';}
		else if ($_POST["swimpoolquantity"] == ''){$e=1; $m .= 'Number of person under swimming pool is required';}
		else if ($_POST["swimpoolorderdate"] == '' || $_POST["swimpoolorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under swimming pool is required';}
		else if (strtotime(str_replace("/","-",$_POST["swimpoolorderdate"])) < $mktoday){$e=1; $m .= 'Back date not allowed under swimming pool.';}
		else if ($_POST["swimpooltotal"] == '' || validate($_POST["swimpooltotal"],"0-9")){$e=1; $m .= 'Total amount under swimming pool is required.';}
	}
	//sport service
	if (isset($_POST["chksport"])){
		if ($_POST["spoitem"] == ''){$e=1; $m .= 'Type of sport material is required';}
		//else if ($_POST["spoprice"] == ''){$e=1; $m .= 'Unit Price under sport material is required';}
		else if ($_POST["spoquantity"] == ''){$e=1; $m .= 'Quantity under sport material is required';}
		else if ($_POST["spoorderdate"] == '' || $_POST["spoorderdate"] == 'mm/dd/yyyy'){$e=1; $m .= 'Order Date under sport material is required';}
		else if (strtotime(str_replace("/","-",$_POST["spoorderdate"])) < $mktoday){$e=1; $m .= 'Back date not allowed.';}
		else if ($_POST["spototal"] == '' || validate($_POST["spototal"],"0-9")){$e=1; $m .= 'Total amount under sport material is required. Numeric value only no comma';}
	}

	//............
	if ($e == 1){
		echo $m;
	}else{
		
		 $time = date("Y-m-d");
		 $ordertime = date("H:i");
		 
		 $log = "<br><br>[".date("y/m/d h:i:s A")."], <br>New Order Added, <br>BY STAFF: ".$_SESSION["amyn15"]."(".$_SESSION["amyi15"]."), <br>INVOICE ID: ".$_POST["invoiceid"]; 
		 
		//insert room
		if (isset($_POST["chkroom"])){
		 //Check & Make Payment to tag this record as paid, if deposit is selected...
		 if($_POST["pay4rmewallet"] == '1' && $_POST["paystatus"] != '1'){
		 	$tagispaid = deductMyWallet($_POST["clientid"],$_POST["bookingtotal"]);
			$paystatus = 'dw';
		 }else{
		 	if($_POST["paystatus"] == '1'){
				$tagispaid = '1'; $paystatus = 'dw';
			}elseif($_POST["paystatus"] == '2'){
				$tagispaid = '1'; $paystatus = '';
			}else{
				$tagispaid = '0'; $paystatus = '';
			}
		 }
		 $sql = "INSERT INTO order_room(invoiceid, guestid, roomid, noofroom, noofperson, checkin, checkout, orderdate, ordertime, duration, discount, vat, unitprice, total, checkstatus, ispaid,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$_POST["room_type"])."','".mysqli_real_escape_string($conn4as,$_POST["noofroom"])."','".mysqli_real_escape_string($conn4as,$_POST["noofperson"])."','".mysqli_real_escape_string($conn4as,$_POST["checkin"])."','".mysqli_real_escape_string($conn4as,$_POST["checkout"])."','".mysqli_real_escape_string($conn4as,$time)."','".mysqli_real_escape_string($conn4as,$ordertime)."','".mysqli_real_escape_string($conn4as,$_POST["duration"])."','".mysqli_real_escape_string($conn4as,$_POST["discount"])."','".mysqli_real_escape_string($conn4as,$_POST["vat"])."','".mysqli_real_escape_string($conn4as,$_POST["roomrate"])."','".mysqli_real_escape_string($conn4as,$_POST["bookingtotal"])."','in','".mysqli_real_escape_string($conn4as,$tagispaid)."','".mysqli_real_escape_string($conn4as,$globalid)."')";//in
		 mysqli_query($conn4as,$sql);
		 $r = '1'; $nooforderadded = 1;
		 
		 mysqli_query($conn4as,"UPDATE addroom SET issync = '2', roomleft = 0, currentinv = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["room_type"]));
		 
		 ///$log .= ", <br><br>SERVICE: Room Booking, <br>".get4Email("SELECT addroom.roomType,tblcategory.catname FROM addroom INNER JOIN tblcategory ON addroom.categoryid = tblcategory.id WHERE addroom.id = ".mysqli_real_escape_string($conn4as,$_POST["room_type"])." ORDER BY addroom.id","roomType,catname","Room Number,Room Type")." NO OF ROOM: ".$_POST["noofroom"].", <br>DURATION: ".$_POST["duration"].", <br>TOTAL AMOUNT: ".$_POST["bookingtotal"];
		 $log .= ", <br><br>SERVICE: Room Booking,<br>Room: ".$_POST["roomnoname"].", No of Room: ".$_POST["noofroom"].", Check-in Date: ".$_POST["checkin"].", Check-out Date: ".$_POST["checkout"].", Duration: ".$_POST["duration"].", <br>Total Amount: ".$_POST["bookingtotal"];
		}else{
		 $r = '0';
		}
		
		//insert bar
		if (isset($_POST["chkbar"])){
		 $sql = "INSERT INTO order_bar(invoiceid, guestid, itemid, itemdescr, qty, discount, unitprice, total, orderdate, ordertime, ispaid,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$_POST["baritem"])."','".mysqli_real_escape_string($conn4as,$_POST["baritemdescr"])."','".mysqli_real_escape_string($conn4as,$_POST["barquantity"])."','".mysqli_real_escape_string($conn4as,$_POST["bardiscount"])."','".mysqli_real_escape_string($conn4as,$_POST["barprice"])."','".mysqli_real_escape_string($conn4as,$_POST["bartotal"])."','".mysqli_real_escape_string($conn4as,$_POST["barorderdate"])."','".mysqli_real_escape_string($conn4as,$ordertime)."','0','".mysqli_real_escape_string($conn4as,$globalid)."')";
		 mysqli_query($conn4as,$sql);
		 $b = '1'; $nooforderadded += 1;
		 uORd("UPDATE addbar SET issync = '2', itemleft = itemleft - ".mysqli_real_escape_string($conn4as,$_POST["barquantity"])." WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["baritem"]));
		 $log .= ", <br><br>SERVICE: Bar, <br>".get4Email("SELECT addbar.name,tblcategory.catname FROM addbar INNER JOIN tblcategory ON addbar.categoryid = tblcategory.id WHERE addbar.id = ".mysqli_real_escape_string($conn4as,$_POST["baritem"])." ORDER BY addbar.id","name,catname","Item Name,Item Type")." QUANTITY: ".$_POST["barquantity"].", <br>TOTAL AMOUNT: ".$_POST["bartotal"];
		 
		}else{
		 $b = '0';
		}
		
		//insert laundary
		if (isset($_POST["chklaundary"])){
		 $sql = "INSERT INTO order_laundary(invoiceid, guestid, itemid, descr, discount, unitprice, total, orderdate, ordertime, ispaid,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$_POST["lauitem"])."','".mysqli_real_escape_string($conn4as,$_POST["lauitemdescr"])."','".mysqli_real_escape_string($conn4as,$_POST["laudiscount"])."','".mysqli_real_escape_string($conn4as,$_POST["lauprice"])."','".mysqli_real_escape_string($conn4as,$_POST["lautotal"])."','".mysqli_real_escape_string($conn4as,$_POST["lauorderdate"])."','".mysqli_real_escape_string($conn4as,$ordertime)."','0','".mysqli_real_escape_string($conn4as,$globalid)."')";
		 mysqli_query($conn4as,$sql);
		 $l = '1'; $nooforderadded += 1;
		 $log .= ", <br><br>SERVICE: Laundary, <br>".get4Email("SELECT title FROM addlaundary WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["lauitem"])." ORDER BY id","title","Item Name")." QUANTITY: ".$_POST["barquantity"].", <br>TOTAL AMOUNT: ".$_POST["lautotal"];
		}else{
		 $l = '0';
		}
		
		//insert restaurant
		if (isset($_POST["chkrestaurant"])){
		  $sql = "INSERT INTO order_restaurant(invoiceid, guestid, itemid, descr, qty, discount, unitprice, total, orderdate, ordertime, ispaid,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$_POST["resitem"])."','".mysqli_real_escape_string($conn4as,$_POST["resitemdescr"])."','".mysqli_real_escape_string($conn4as,$_POST["resquantity"])."','".mysqli_real_escape_string($conn4as,$_POST["resdiscount"])."','".mysqli_real_escape_string($conn4as,$_POST["resprice"])."','".mysqli_real_escape_string($conn4as,$_POST["restotal"])."','".mysqli_real_escape_string($conn4as,$_POST["resorderdate"])."','".mysqli_real_escape_string($conn4as,$ordertime)."','0','".mysqli_real_escape_string($conn4as,$globalid)."')";
		 mysqli_query($conn4as,$sql);
		 $res = '1'; $nooforderadded += 1;
		 $log .= ", <br><br>SERVICE: Restaurant, <br>".get4Email("SELECT addresturant.name,tblcategory.catname FROM addresturant INNER JOIN tblcategory ON addresturant.categoryid = tblcategory.id WHERE addresturant.id = ".mysqli_real_escape_string($conn4as,$_POST["resitem"])." ORDER BY addresturant.id","name,catname","Food Name,Food Type")." QUANTITY: ".$_POST["resquantity"].", <br>TOTAL AMOUNT: ".$_POST["restotal"];
		 
		}else{
		 $res = '0';
		}
		
		//insert spa
		if (isset($_POST["chkspa"])){
		$sql = "INSERT INTO order_spa(invoiceid, guestid, itemid, descr, noofperson, discount, unitprice, total, orderdate, ordertime,ispaid,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$_POST["spaitem"])."','".mysqli_real_escape_string($conn4as,$_POST["spaitemdescr"])."','".mysqli_real_escape_string($conn4as,$_POST["spaquantity"])."','".mysqli_real_escape_string($conn4as,$_POST["spadiscount"])."','".mysqli_real_escape_string($conn4as,$_POST["spaprice"])."','".mysqli_real_escape_string($conn4as,$_POST["spatotal"])."','".mysqli_real_escape_string($conn4as,$_POST["spaorderdate"])."','".mysqli_real_escape_string($conn4as,$ordertime)."','0','".mysqli_real_escape_string($conn4as,$globalid)."')";
		 mysqli_query($conn4as,$sql);
		 $spa = '1'; $nooforderadded += 1;
		 $log .= ", <br><br>SERVICE: Spa, <br>".get4Email("SELECT name FROM addspa WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["spaitem"])." ORDER BY id","name","Name")." NO OF PERSON: ".$_POST["spaquantity"].", <br>TOTAL AMOUNT: ".$_POST["spatotal"];
		}else{
		 $spa = '0';
		}
		
		
		//insert swimpool
		if (isset($_POST["chkswimpool"])){
		$sql = "INSERT INTO order_swimpool(invoiceid, guestid, itemid, descr, noofperson, duration, discount, unitprice, total, orderdate, ordertime, ispaid,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolitem"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolitemdescr"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolquantity"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolduration"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpooldiscount"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolprice"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpooltotal"])."','".mysqli_real_escape_string($conn4as,$_POST["swimpoolorderdate"])."','".mysqli_real_escape_string($conn4as,$ordertime)."','0','".mysqli_real_escape_string($conn4as,$globalid)."')";
		 mysqli_query($conn4as,$sql);
		 $swimpool = '1'; $nooforderadded += 1;
		 $log .= ", <br><br>SERVICE: Swimming Pool Service, <br>".get4Email("SELECT name FROM addswimpool WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["swimpoolitem"])." ORDER BY id","name","Name")." NO OF PERSON: ".$_POST["swimpoolquantity"]." DURATION: ".$_POST["swimpoolduration"].' per '.$_POST["swimpoolhidmeas"].", <br>TOTAL AMOUNT: ".$_POST["swimpooltotal"];
		}else{
		 $swimpool = '0';
		}
		
		
		//insert sport materials
		if (isset($_POST["chksport"])){
		 $sql = "INSERT INTO order_sportitem(invoiceid, guestid, itemid, descr, tranxtype, qty, discount, unitprice, total, orderdate, ordertime, ispaid,staffid) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$_POST["spoitem"])."','".mysqli_real_escape_string($conn4as,$_POST["spoitemdescr"])."','".mysqli_real_escape_string($conn4as,$_POST["tranxtype"])."','".mysqli_real_escape_string($conn4as,$_POST["spoquantity"])."','".mysqli_real_escape_string($conn4as,$_POST["spodiscount"])."','".mysqli_real_escape_string($conn4as,$_POST["spoprice"])."','".mysqli_real_escape_string($conn4as,$_POST["spototal"])."','".mysqli_real_escape_string($conn4as,$_POST["spoorderdate"])."','".mysqli_real_escape_string($conn4as,$ordertime)."','0','".mysqli_real_escape_string($conn4as,$globalid)."')";
		 mysqli_query($conn4as,$sql);
		 $spo = '1'; $nooforderadded += 1;
		 $log .= ", <br><br>SERVICE: Sport Materials, <br>".get4Email("SELECT name FROM addsport WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["spoitem"])." ORDER BY id","name","Item Name")." QUANTITY: ".$_POST["spoquantity"].", <br>TOTAL AMOUNT: ".$_POST["spototal"];
		}else{
		 $spo = '0';
		}
		
		//insert to orders table
		if ($nooforderadded < 1){
			echo 'No item ordered.';
		}else{
			if($r == '1' && $b != '1' && $spo != '1' && $spa != '1' && $swimpool != '1' && $l != '1' && $res != '1'){
			$sql = "INSERT INTO orders(invoiceid, guestid, roomid, isroom, isbar, issport, isspa, isswimpool, islaundary, isrestaurant, orderdate, ordertime, total,ispaid,paystatus) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$_POST["room_type"])."','".mysqli_real_escape_string($conn4as,$r)."','".mysqli_real_escape_string($conn4as,$b)."','".mysqli_real_escape_string($conn4as,$spo)."','".mysqli_real_escape_string($conn4as,$spa)."','".mysqli_real_escape_string($conn4as,$swimpool)."','".mysqli_real_escape_string($conn4as,$l)."','".mysqli_real_escape_string($conn4as,$res)."','".mysqli_real_escape_string($conn4as,$time)."','".mysqli_real_escape_string($conn4as,$ordertime)."','".mysqli_real_escape_string($conn4as,$_POST["grandtotal"])."','".mysqli_real_escape_string($conn4as,$tagispaid)."','".mysqli_real_escape_string($conn4as,$paystatus)."')";
			}else{
			$sql = "INSERT INTO orders(invoiceid, guestid, roomid, isroom, isbar, issport, isspa, isswimpool, islaundary, isrestaurant, orderdate, ordertime, total,ispaid,paystatus) VALUES('".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."','".mysqli_real_escape_string($conn4as,$_POST["clientid"])."','".mysqli_real_escape_string($conn4as,$_POST["room_type"])."','".mysqli_real_escape_string($conn4as,$r)."','".mysqli_real_escape_string($conn4as,$b)."','".mysqli_real_escape_string($conn4as,$spo)."','".mysqli_real_escape_string($conn4as,$spa)."','".mysqli_real_escape_string($conn4as,$swimpool)."','".mysqli_real_escape_string($conn4as,$l)."','".mysqli_real_escape_string($conn4as,$res)."','".mysqli_real_escape_string($conn4as,$time)."','".mysqli_real_escape_string($conn4as,$ordertime)."','".mysqli_real_escape_string($conn4as,$_POST["grandtotal"])."','0','".mysqli_real_escape_string($conn4as,$paystatus)."')";
			}
		 mysqli_query($conn4as,$sql);
		 ////////////////////////////save log....
		 WriteToFile("../logs/".$logfilename,$log."\r\n=======================================\r\n");
		 $params = "emsubject=New order made. Invoice ID: ".$_POST["invoiceid"]."&msg=".$log;
		 sendAsyncURL($httppath."/fxn/sendmail/index.php", $params);
		 ////////////////////////////////////////////
		 if($r == '1'){
		 	//remove from reservation.....if
			if($_POST['reserveid'] != ''){
				mysqli_query($conn4as,"DELETE FROM tblschedule WHERE id = '".mysqli_real_escape_string($conn4as,$_POST['reserveid'])."'");
			}
			redirect('orderconfirm.php?cid='.$_POST["clientid"].'&invid='.$_POST["invoiceid"]);
		 }else{
		 	redirect('orderconfirm.php?cid='.$_POST["clientid"].'&invid='.$_POST["invoiceid"]);
		 }
		 
		}
		
	}

}
/*********** Manage Company 2021 Codes ************/
if ($_POST["dwat"] == "addcompany"){
if ($_POST["name"] == ''){echo 'Company Name is required';}
else if ($_POST["phone"] == ''){echo 'Phone number is required';}
else{
$time = time();

$sql = "INSERT INTO tblcompany(name,contactperson,address,phone,regdate) VALUES('".mysqli_real_escape_string($conn4as,$_POST["name"])."','".mysqli_real_escape_string($conn4as,$_POST["contactperson"])."','".mysqli_real_escape_string($conn4as,$_POST["address"])."','".mysqli_real_escape_string($conn4as,$_POST["phone"])."','".mysqli_real_escape_string($conn4as,$time)."')";

mysqli_query($conn4as,$sql);
echo 'NewCompanyAdded';
}
}

if ($_POST["dwat"] == "editcompany"){
if ($_POST["name"] == ''){echo 'Company Name is required';}
else if ($_POST["phone"] == ''){echo 'Phone number is required';}
else{
$time = time();
$sql = "UPDATE tblcompany SET issync = '2', name='".mysqli_real_escape_string($conn4as,$_POST["name"])."',contactperson='".mysqli_real_escape_string($conn4as,$_POST["contactperson"])."',address='".mysqli_real_escape_string($conn4as,$_POST["address"])."',phone='".mysqli_real_escape_string($conn4as,$_POST["phone"])."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);

mysqli_query($conn4as,$sql);
redirect('manage-company.php?m=Company details successfully updated!');
}
}
/////////////////
if($_POST["dwat"] == 'pay4rmwallet'){
	if ($_POST["invoiceid"] == ''){echo 'Undefined record.';}
	else{
		if ($_POST["s"] == 'dopaid'){
			$qry6 = mysqli_query($conn4as,"SELECT orders.total,orders.guestid,addclient.amount FROM orders INNER JOIN addclient ON orders.guestid = addclient.id WHERE orders.invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
			$rs6 = mysqli_fetch_assoc($qry6);
			$guestid = $rs6["guestid"];
			$xTotal = $rs6["total"];
			$xDeposit = $rs6["amount"];
			
		if($xTotal > $xDeposit){
			echo 'Deposited Fund is lesser than the debt. Deposit additional fund to this account to clear the debt.';
		}else{
		$nDeposit = $xDeposit - $xTotal;
		uORd("update addclient SET issync = '2', amount = '".mysqli_real_escape_string($conn4as,$nDeposit)."' where id = '".mysqli_real_escape_string($conn4as,$guestid)."'");
		
		uORd("update orders SET issync = '2', ispaid = '1',paystatus = 'dw' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		uORd("update order_room SET issync = '2', ispaid = '1' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		uORd("update order_restaurant SET issync = '2', ispaid = '1' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		uORd("update order_bar SET issync = '2', ispaid = '1' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		uORd("update order_bar2 SET issync = '2', ispaid = '1' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		uORd("update order_swimpool SET issync = '2', ispaid = '1' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		uORd("update order_spa SET issync = '2', ispaid = '1' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		uORd("update order_sportitem SET issync = '2', ispaid = '1' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		uORd("update order_laundary SET issync = '2', ispaid = '1' where invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
		
		if(isset($_POST["frm"]) && $_POST["frm"] == 'pending'){ $pend = "<->pending"; }else{ $pend = "<->nil"; }
		echo 'PaidUnpaid<->'.$_POST["invoiceid"].'<->Invoice '.$_POST["invoiceid"].' payment successful'.$pend;
		
		$log = "[".date("y/m/d h:i:s A")."], <br>Payment made by deposit, <br>By Staff: ".$_SESSION["amyn15"]." (ID: ".$_SESSION["amyi15"]."), <br>INVOICE ID: ".$_POST["invoiceid"]."\r\n=======================================\r\n"; 
		WriteToFile("../logs/".$logfilename,$log);
		
		$params = "emsubject=Payment made on Invoice ID: ".$_POST["invoiceid"];
		$params .= "&msg=".$log;
		sendAsyncURL($httppath."/fxn/sendmail/index.php", $params);
		}
		
		}else if ($_POST["s"] == 'dounpaid'){}
	}

}
///////// Restaurant New Delete Function For Admin /////////////////
if ($_POST["dwat"] == "delresorder"){
	if ($_POST["invoiceid"] == ''){echo 'Undefined record.';}
	else{
		$howmuch = 0;
		$howmany = getBarRecCountsByInvoice('res',$_POST["invoiceid"],$_POST["id"]);
		$qry = mysqli_query($conn4as,"SELECT id,isroom,isbar,isbar2,issport,isspa,islaundary,isrestaurant,isswimpool FROM orders WHERE invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."' ORDER BY id");
		$total = mysqli_num_rows($qry);
		if($total > 0){
			while($rs = mysqli_fetch_assoc($qry)){
				$id = $rs["id"];
				$isroom = $rs["isroom"];
				$isbar = $rs["isbar"];
				$isbar2 = $rs["isbar2"];
				$issport = $rs["issport"];
				$isspa = $rs["isspa"];
				$islaundary = $rs["islaundary"];
				$isrestaurant = $rs["isrestaurant"];
				$isswimpool = $rs["isswimpool"];
				if($isrestaurant == '1' && ($isroom <> "1" && $isbar2 <> "1" && $issport <> "1" && $isspa <> "1" && $islaundary <> "1" && $isbar <> "1" && $isswimpool <> "1")){
					//check how many in bar....
					if($howmany > 1){
					delete('order_restaurant',"id = '".mysqli_real_escape_string($conn4as,$_POST["id"])."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
					uORd("UPDATE orders SET issync = '2', total = total - '".mysqli_real_escape_string($conn4as,$howmuch)."' WHERE id = '".mysqli_real_escape_string($conn4as,$id)."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");	
					}else{
						delete('order_restaurant',"id = '".mysqli_real_escape_string($conn4as,$_POST["id"])."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
						delete('orders',"id = '".mysqli_real_escape_string($conn4as,$id)."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");	
					}
				}else{
					if($howmany > 1){
						delete('order_restaurant',"id = '".mysqli_real_escape_string($conn4as,$_POST["id"])."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
						uORd("UPDATE orders SET issync = '2', total = total - '".mysqli_real_escape_string($conn4as,$howmuch)."' WHERE id = '".mysqli_real_escape_string($conn4as,$id)."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");	
					}else{
						delete('order_restaurant',"id = '".mysqli_real_escape_string($conn4as,$_POST["id"])."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
						uORd("UPDATE orders SET issync = '2', isrestaurant = '0',total = total - '".mysqli_real_escape_string($conn4as,$howmuch)."' WHERE id = '".mysqli_real_escape_string($conn4as,$id)."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$_POST["invoiceid"])."'");
					}
				}
			}
			
			echo 'deleted';
			$log = "[".date("y/m/d h:i:s A")."], <br>Order from restaurant deleted, <br>BY STAFF: ".$_SESSION["amyn15"]."(".$_SESSION["amyi15"]."), <br>INVOICE ID: ".$_POST["invoiceid"]."\r\n=======================================\r\n"; 
			WriteToFile("../logs/".$logfilename,$log);
			
		}else{
			echo 'Could not delete record.';
		}
	}
}
//////////////
if ($_POST["dwat"] == "editingredient"){
	if ($_POST["name"] == ''){echo 'Ingredient Name is required';}
	else{
		$sql = "UPDATE tblingredients SET issync = '2', name='".mysqli_real_escape_string($conn4as,$_POST["name"])."' WHERE id = ".mysqli_real_escape_string($conn4as,$_POST["hidid"]);
		mysqli_query($conn4as,$sql);
		redirect("store-restaurant.php?id=".$_POST["hidid"]."&m=Ingredient succesfully updated");
	}
}
/////////////////////
if ($_POST["dwat"] == "cancelbooking"){
$hidid = $_POST["hidid"];
$hidinvoiceid = $_POST["hidinvoiceid"];
$hidroomid = $_POST["hidroomid"];
$hidroomname = $_POST["hidroomname"];
$hidroomrate = $_POST["hidroomrate"];
$hidtotal = $_POST["hidtotal"];
$hidispaid = $_POST["hidispaid"];
$hidpaystatus = $_POST["hidpaystatus"];
$hiddiscount = $_POST["hiddiscount"];
$hidduration = $_POST["hidduration"];
$remduration = $_POST["remduration"];
$remduration = $_POST["remduration"];
$isAdmin = ValidateAdminManager($_POST["adminpwd"]);

if($remduration == ''){ echo 'Enter number of days to remove.';}
elseif($remduration > $hidduration){ echo 'Number of days to remove cannot be greater than duration.';}
elseif($hidroomid == ''){ echo 'Room name is required.';}
elseif(!$isAdmin){ echo 'You need admin or manager right to cancel/update booking';}
else{
if (select("SELECT order_room.*,orders.total AS gtotal FROM order_room inner join orders on order_room.invoiceid = orders.invoiceid WHERE order_room.invoiceid = '".mysqli_real_escape_string($conn4as,$hidinvoiceid)."' AND order_room.id = '".mysqli_real_escape_string($conn4as,$hidid)."' ORDER BY order_room.id DESC")){
  $rs = mysqli_fetch_assoc($qry);
  $guestid = $rs["guestid"];
  $roomid = $rs["roomid"];
  $checkin = $rs["checkin"];
  $checkout = $rs["checkout"];
  $today = date("Y-m-d");
  $todaystamp = strtotime($today.' 23:59');
  $duration = $rs["duration"];
  $checkstatus = $rs["checkstatus"];
  $newduration = $duration - $remduration; 
  $vat = $rs["vat"];
  $unitprice = $rs["unitprice"];
  $total = $rs["total"];
  $gtotal = $rs["gtotal"];
  $discountper = ($rs["discount"] > 0)?$rs["discount"]:'0';
  $discount = $total * ($discountper/100); //NB: in value not percentage
  $remdiscount = ($discount/$duration) * $remduration;
  $deductamt = ($unitprice * $remduration) - $remdiscount;
  $newtotal = $total - $deductamt;
    
  if($newduration == '0'){ //if newduration is zero.
  	$Gnewtotal = $gtotal - $total;
	//automatically checkout
  	mysqli_query($conn4as,"UPDATE order_room SET issync = '2', checkstatus = 'out', checkout = '".mysqli_real_escape_string($conn4as,$checkin)."', duration = '0', total = '0' WHERE id = '".mysqli_real_escape_string($conn4as,$hidid)."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$hidinvoiceid)."'");
	mysqli_query($conn4as,"UPDATE orders SET issync = '2', total = '".mysqli_real_escape_string($conn4as,$Gnewtotal)."' WHERE guestid = '".mysqli_real_escape_string($conn4as,$guestid)."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$hidinvoiceid)."'");
	mysqli_query($conn4as,"UPDATE addroom SET issync = '2', roomleft = '1',currentinv = '' WHERE id = ".mysqli_real_escape_string($conn4as,$roomid));
	
	$log = "[".date("y/m/d h:i:s A")."], <br>Booking cancellation by staff: ".$_SESSION["amyn15"]."(".$_SESSION["amyi15"]."), <br>ROOM: ".$hidroomname.", <br>INVOICE ID: ".$hidinvoiceid."\r\n=======================================\r\n";
	WriteToFile("../logs/".$logfilename,$log);
	$params = "emsubject=Booking Cancelled. Invoice ID: ".$hidinvoiceid;
	$params .= "&msg=".$log;
	sendAsyncURL($httppath."/fxn/sendmail/index.php", $params);
	redirect('manage-inout-grid.php?m=You have successfully cancelled booking with invoice id '.$invoiceid);
	
  }elseif($newduration > 0 && $newduration < $duration){
  	$newcheckout = date('Y-m-d', strtotime($checkin.'+ '.$newduration.' days'));
	$newcheckoutstamp = strtotime($newcheckout.' 12:00');
	$Gnewtotal = $gtotal - $deductamt;
	
	if($newcheckoutstamp < $todaystamp){
		echo 'Due to new duration '.$newduration.' days(s), check-out date ('.$newcheckout.') is past.';
	}else{
		mysqli_query($conn4as,"UPDATE order_room SET issync = '2', checkout = '".mysqli_real_escape_string($conn4as,$newcheckout)."', duration = '".mysqli_real_escape_string($conn4as,$newduration)."', total = '".mysqli_real_escape_string($conn4as,$newtotal)."' WHERE id = '".mysqli_real_escape_string($conn4as,$hidid)."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$hidinvoiceid)."'");
		mysqli_query($conn4as,"UPDATE orders SET issync = '2', total = '".mysqli_real_escape_string($conn4as,$Gnewtotal)."' WHERE guestid = '".mysqli_real_escape_string($conn4as,$guestid)."' AND invoiceid = '".mysqli_real_escape_string($conn4as,$hidinvoiceid)."'");
		
		if($hidpaystatus == 'dw' && $hidispaid == '1'){  RefundByUserId($guestid,$deductamt); }
		
		$log = "[".date("y/m/d h:i:s A")."], <br>Booking checkout date reduced by staff: ".$_SESSION["amyn15"]."(".$_SESSION["amyi15"]."), <br>ROOM: ".$hidroomname.", <br>INVOICE ID: ".$hidinvoiceid."\r\n=======================================\r\n";
		WriteToFile("../logs/".$logfilename,$log);
		$params = "emsubject=Booking Check-out date reduced. Invoice ID: ".$hidinvoiceid;
		$params .= "&msg=".$log;
		sendAsyncURL($httppath."/fxn/sendmail/index.php", $params);
		redirect('manage-inout-grid.php?m=You have successfully updated booking with invoice id '.$invoiceid);
	}
  }
  
  }else{
  	echo 'Order not found.';
  }
}
}
//////////////////
if ($_POST["dwat"] == "resync"){
	$qryt = mysqli_query($conn4as,"SELECT table_name FROM information_schema.tables WHERE table_schema='".mysqli_real_escape_string($conn4as,$mdatabase)."'");
	$rstotal = mysqli_num_rows($qryt);
	if($rstotal > 0){
		while($rstbls = mysqli_fetch_assoc($qryt)){
			mysqli_query($conn4as,"UPDATE ".$rstbls["table_name"]." SET issync = '2'");
		    //$tup .= "UPDATE ".$rstbls["table_name"]." SET issync = '2'<br>";
			$ct++;
		}
		echo "RSYNDONE<->".$ct." records re-scheduled for synchronization. Start syncing...";
	}	
}
?>