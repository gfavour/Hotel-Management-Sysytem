<?php
define('ADMINPATH',"admin/");
define('INCPATH',"admin/inc/");
define('RESOURCEPATH',"resources/");
define('ARCHIVESPATH',"archives/");

$licenseKey = 'YYd6fYBnbWJjiXWLtZqAfoN9mJGVf2tpYYA';
$KeyName4Hotel = 'BigHMS';

$HostUrl = rtrim($_SERVER['HTTP_HOST'],"/");
$cursign = '&#8358;';
$MysqlExePath = "C:\\xampp\\mysql\\bin";

$sitefolder = 'bighms';
$portalfolder = '';
$companyemail = 'info@bighms.com';
if($sitefolder != ''){ $sitefolder .= '/';}
if ($portalfolder != ''){$portalfolder .= '/';}

$OnServerSyncUrl = ""; //http://bighms.com/portal/sync/
$OffServerSyncUrl = "http://localhost/".$sitefolder."/sync/sync-local.php";

$RemoteNgNoLogin = false; //Disable Login to Remote Access Web-console
$RemoteNgUser = 'user'; //User to Remote Access Web-console
$RemoteNgPass = 'P@#$55w0rD'; //Password to Remote Access Web-console
$domain = $_SERVER['HTTP_HOST'];

if($_SERVER['HTTP_HOST']=='localhost' || strpos($HostUrl, 'ngrok.io') !== false){
	$dbmhost = "localhost"; //localhost
	$dbmusername = "root";
	$dbmpassword = '';
	$mdatabase = "bighms";
}else{
	$dbmhost = "127.0.0.1";
	$dbmusername = "root";
	$dbmpassword = '';
	$mdatabase = "bighms";
}


$DIR1 = __DIR__ ;
//$DIR2 = explode("admin",$DIR1);
$ROOTFILE = addslashes($DIR2[0]);
$ROOTHTTP = "http://".$domain."/".$sitefolder.$portalfolder;
?>