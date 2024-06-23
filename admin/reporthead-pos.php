<style>body{margin:0; padding:0;}</style>
<?php
$sql = select("SELECT hotelname,phone,email,address,logo,showguestcatlist FROM settings ");
$rs = mysqli_fetch_assoc($qry);
$showGCatList = $rs["showguestcatlist"];
//if (is_file("../archives/".$rs["logo"])){$logo = '<img src="http://localhost/bighms/archives/'.$rs["logo"].'" style="width:auto;height:30px;">';}
//else{$logo = '<img src="http://localhost/bighms/archives/noimage.png" style="width:auto;height:30px;">';}

echo '<div style="text-align:center; padding:0 0 3px 0; margin-bottom:5px; border-bottom:#333 solid 1px;font-size:12px;">';
echo '<h2 style="margin:5px; font-size:16px;"><strong>'.$rs["hotelname"].'</strong></h2>';
echo '<div style="font-size:11px;">'.$rs["address"].'</div>';
echo '<div style="font-size:11px;"><strong>Email:</strong> '.$rs["email"].', <strong>Tel:</strong> '.$rs["phone"].'</div>';
echo '</div>';
?>