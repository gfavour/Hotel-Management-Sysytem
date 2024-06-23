<?php
include("sync-server-inc.php");
////////////////////////////////////
$postdata = file_get_contents("php://input");
$reqs = json_decode($postdata,true);
$resIDs = [];
$table = "addsport";
///////////////////////////////////
include("sync-server-start.php");
?>