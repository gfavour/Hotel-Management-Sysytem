<?php
error_reporting(0);
session_start();
//session_regenerate_id();

$FXNDIR = __DIR__ ;
$DIR3 = explode("fxn",$FXNDIR);
$BHMSDIR = $DIR3[0];
include($BHMSDIR."config.php");

$sign = '&#8358; ';

$filepath = $BHMSDIR;
$httppath = "http://".$domain.'/'.$sitefolder;
$portalpath = "http://".$domain.'/'.$sitefolder.$portalfolder;
$fxnhttppath = "http://".$domain.'/'.$sitefolder.$portalfolder.'fxn/';
$fxnfilepath = $FXNDIR."/";
//$urlr = $_SERVER['HTTP_REFERER'];

$conn4as = mysqli_connect($dbmhost, $dbmusername, $dbmpassword,$mdatabase) or mysqli_error($conn4as);
//mysqli_select_db($conn4as,$mdatabase);

include($fxnfilepath."allfunctions.php");
include($fxnfilepath."session.php");
//$stc = new session();
?>