<?php
include('../../Admin/inc/db_connect.php');

if ($_POST["dwat"] == 'getRoomDetails'){
if($_POST["roomid"] == ''){
	echo 'Unknown Room';
}else{
	$sql = "SELECT rate FROM addroom WHERE id = ".$_POST["roomid"];
	$qry = mysqli_query($conn4as,$sql);
	$total = mysqli_num_rows($qry);
	if ($total > 0){
		$rs = mysqli_fetch_assoc($qry);
		echo 'ROOMDETAILS<->'.$rs["rate"];
	}else{
	echo 'Room not found'.$sql;	
	}
}
}
?>