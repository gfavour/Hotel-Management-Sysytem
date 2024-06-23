<?php include_once 'inc/head.php'; ?>
<?php 
$sql = select("SELECT hotelname,phone,email,address,website,logo FROM settings ");
$rs = mysqli_fetch_assoc($qry);
echo '<div style="text-align:center; padding:0; margin-bottom:20px;">';
echo '<h2 style="margin:0 0 10px 0;font-size:26px;font-weight:600;">'.strtoupper($rs["hotelname"]).'</h2>';
$footertxt = '<div style="text-align:center; padding:10px; margin-top:100%;width:100%; position:absolute; bottom:10px;border-top:#666 solid 2px;">'.$rs["address"].'<br><strong class="fa fa-phone"></strong> '.$rs["phone"].', <strong class="fa fa-envelope"></strong> '.$rs["email"].', <strong class="fa fa-globe"></strong> '.$rs["website"].'</div>';
echo '</div>';
?>
<div style="padding:10px">
<?php include('invoice-company-inc.php'); ?>
</div>
<?php 
echo $footertxt;
?>
<?php //include('inc/footer.php'); ?>
<script>window.print();</script>
<style>
.linetopbtm,.linetopbtm td{border-bottom:#333 2px solid; border-top:#333 2px solid; padding:10px 0; font-weight:bold}
.width200{width:200px; font-weight:600;padding:3px 1px;}
.padTDbody td{padding-top:5px;padding-bottom:5px;}
</style>