<?php include_once 'inc/head.php'; ?>
<div style="text-align:left; padding:30px; border-radius:10px; border:#666 solid 2px;">
<?php include_once 'reporthead.php'; ?>
<?php
echo '<h3 style="text-decoration:underline;margin:30px auto 20px auto;width:50%; text-align:center;">Customer\'s Profile</h3>'; 
$sql = select("SELECT * FROM addclient WHERE id = '".mysqli_real_escape_string($conn4as,$_GET["id"])."' ORDER BY id");
if($sql){
$rs = mysqli_fetch_assoc($qry);

if($rs["phone"] != ''){ $phone = $rs["phone"]; }else{ $phone = 'N/A'; }
if($rs["email"] != ''){ $email = $rs["email"]; }else{ $email = 'N/A'; }
if($rs["city"] != ''){ $city = $rs["city"]; }else{ $city = 'N/A'; }
if($rs["state"] != ''){ $state = $rs["state"]; }else{ $state = 'N/A'; }
if($rs["country"] != ''){ $country = $rs["country"]; }else{ $country = 'N/A'; }

if($rs["pic"] != ''){
		if(file_exists('../archives/'.$rs["pic"])){ $pic = '<img src="../archives/'.$rs["pic"].'" style="height:auto;width:200px;">'; }
		else{ $pic = 'N/A';}
}else{
		$pic = 'N/A';
}

echo '<table class="table">';	
echo '<tr><td><strong>Name: </strong></td><td>'.$rs["title"].' '.$rs["lastname"].' '.$rs["firstname"].'</td></tr>';
echo '<tr><td><strong>Phone Number: </strong></td><td>'.$phone.'</td></tr>';
echo '<tr><td><strong>Email: </strong></td><td>'.$email.'</td></tr>';
echo '<tr><td><strong>City: </strong></td><td>'.$city.'</td></tr>';
echo '<tr><td><strong>State: </strong></td><td>'.$state.'</td></tr>';
echo '<tr><td><strong>Country: </strong></td><td>'.$country.'</td></tr>';
echo '<tr><td colspan="2"><strong>Identification Card / Passport: </strong><br>'.$pic.'</td></tr>';
echo '</table>';
										
}else{
echo '<div style="text-align:center;padding:20px;font-size:20px;">No record found.</div>';
}


?>
</div>
<?php //include("obar-footer.php"); ?>
<style>
body{background:#fff; margin:10px;}
</style>
<script>window.print();</script>