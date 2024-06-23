<?php
$sql = select("SELECT lastname,firstname,users_role	FROM users WHERE id = ".mysqli_escape_string($conn4as,$globalid));
$rs = mysqli_fetch_assoc($qry);
echo '<div style="text-align:left; font-size:12px; padding:1px 1px; margin-top:80px;">';
echo '<div style="margin:0 auto; border-top:#000 dotted 1px;">Customer Name</div>';
echo '<div style="margin:20px auto 100px auto; border-top:#000 dotted 1px;">Signature</div>';
//'.$rs["lastname"].' '.$rs["firstname"].' ('.$rs["users_role"].')
echo '</div>';
?>