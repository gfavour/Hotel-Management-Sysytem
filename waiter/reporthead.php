<?php
$sql = select("SELECT hotelname,phone,email,address,website,logo FROM settings ");
$rs = mysqli_fetch_assoc($qry);

if (is_file("../archives/".$rs["logo"])){$logo = '<img src="../archives/'.$rs["logo"].'" style="width:auto;height:30px;">';}
else{$logo = '<img src="../archives/noimage.png" style="width:auto;height:30px;">';}

echo '<div style="text-align:center; padding:0 10px 10px 10px; margin-bottom:10px; border-bottom:#333 solid 3px;">';
echo $logo.' <h2 style="margin:0 0 5px 0;">'.$rs["hotelname"].'</h2>';
echo '<div>'.$rs["address"].'</div>';
echo '<div><strong>Email:</strong> '.$rs["email"].', <strong>Tel:</strong> '.$rs["phone"].' <strong>Website:</strong> '.$rs["website"].'</div>';
echo '</div>';
?>