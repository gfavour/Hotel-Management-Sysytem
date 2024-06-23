<style>body{margin:0; padding:0;}</style>
<?php
$sql = select("SELECT hotelname,phone,email,address,logo FROM settings ");
$rs = mysqli_fetch_assoc($qry);

if (is_file("../archives/".$rs["logo"])){$logo = '<img src="../archives/'.$rs["logo"].'" style="width:auto;height:30px;">';}
else{$logo = '<img src="../archives/noimage.png" style="width:auto;height:30px;">';}

echo '<div style="text-align:center; padding:0; margin-bottom:1px; border-bottom:#333 solid 1px;font-size:8px;">';
echo $logo.' <h2 style="margin:0;font-size:8px;"><strong>AIR CANADA FITNESS GAME CLUB</strong></h2>';
echo '<div>'.$rs["address"].'</div>';
echo '<strong>Email:</strong> '.$rs["email"].', <strong>Tel:</strong> '.$rs["phone"].'</div>';
echo '</div>';
?>