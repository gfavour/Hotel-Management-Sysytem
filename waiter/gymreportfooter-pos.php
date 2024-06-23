<?php
$sql = select("SELECT lastname,firstname,users_role	FROM users WHERE id = ".mysqli_escape_string($conn4as,$globalid));
$rs = mysqli_fetch_assoc($qry);
echo '<div style="text-align:left; font-size:8px; padding:1px 1px; margin-top:5px;">';
echo '<div style="margin:0 auto; border-top:#ccc dotted 1px;">Customer</div>';
echo '<div style="margin:5px auto 0 auto; border-top:#ccc dotted 1px;">'.$rs["lastname"].' '.$rs["firstname"].' ('.$rs["users_role"].')</div>';
echo '</div>';
?>