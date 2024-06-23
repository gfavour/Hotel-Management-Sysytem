<?php
include("sync-server-inc.php");
////////////////////////////////////
$postdata = file_get_contents("php://input");
$reqs = json_decode($postdata,true);
$resIDs = [];
$table = "order_bar2";
///////////////////////////////////
include("sync-server-start.php");
?>