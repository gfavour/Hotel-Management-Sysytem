<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Synchronization</title>
</head>

<body onload="onLLoad('1');" onunload="onLLoad('0');">
<?php
include("../fxn/connection.php");
?>
<h2>Online Synchronization</h2>
<div id="syncnote"></div>
<style>
body{background:#333; margin:5px; padding:0;}h2{margin:10px auto; padding:0; font-size:18px; color: #FFFF66; text-transform: capitalize; overflow:hidden;}
#syncnote{height:83vh; overflow-y:auto; border-radius:10px; background:#444; color:#f5f5f5!important; font:11px/14px Arial, Helvetica, sans-serif; padding:10px;}
</style>
<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script>
StartSync = true;
var onLLoad = function(t){
	if(t == '1'){ 
		localStorage.setItem('dosync','1');	$("#syncnote").prepend("Sync starting...<br>"); StartSync = true; 
	}else{
		localStorage.setItem('dosync','0'); StartSync = false;  
		window.opener.location.reload(); 
	}
}
</script>
<?php
include("sync-footer.php"); 
?>
</body>
</html>
