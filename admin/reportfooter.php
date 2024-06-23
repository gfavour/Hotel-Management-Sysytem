<?php
$sql = select("SELECT lastname,firstname,users_role	FROM users WHERE id = ".mysqli_real_escape_string($conn4as,$globalid));
$rs = mysqli_fetch_assoc($qry);
echo '<div style="text-align:center; padding:10px 10px; margin-top:70px;">';
echo '<div style="margin:0 auto; width:70%; border-top:#ccc solid 1px;">Customer Name</div>';
echo '<div style="margin:30px auto 0 auto; width:70%; border-top:#ccc solid 1px;">Signature</div>';
//'.$rs["lastname"].' '.$rs["firstname"].' ('.$rs["users_role"].')
echo '</div>';
?>