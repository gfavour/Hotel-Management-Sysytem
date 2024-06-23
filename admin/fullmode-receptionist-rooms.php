<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/fullmodehead.php'; ?>

<div class="col-sm-12" style="margin:20px 0;">
        <!-- Page Header -->
        <section class="content-header">
          <h1 id="fm-pagetitle" style="border-bottom:#fff solid 1px; color:#fff;">ROOMS</h1>
          <ul class="breadcrumb">
            <li><span id="fmodeclick"><a href="#"><i class="fa fa-circle-o"></i> FULLSCREEN</a></span> <span id="fmodemenu"><a href="index.php" class="fmode-bars"><i class="fa fa-sign-out"></i> EXIT QUICK MODE</a></span> <span id="fmodemenu"><a href="#" class="fmode-bars"><i class="fa fa-bars"></i> MENU</a></span></li>
          </ul>
        </section>

<!-- Begin Main content -->
<div style="margin:20px 0;">
<div class="col-sm-12" style="padding-left:5px; padding-right:5px;">
<div id="msgbox"></div>
<div id="containerCheckroom2" style="display:none;"></div>
<div id="containerCheckroom" style="display:none;"><?php include("fullmode-order.php"); ?></div>
<div id="containerAddGuest" style="display:none;"><?php include("fullmode-insert-new-guest.php"); ?></div>
<div id="containerRooms">
<?php 
$sql = select("SELECT id,roomType,currentinv FROM addroom ORDER BY id");
if($sql){					
while($rs = mysqli_fetch_assoc($qry)){
$currentinv = $rs["currentinv"];
echo ($currentinv == '')?'<a href="javascript:;" id="'.$rs["id"].'" class="jqCRM-new col-sm-2 touchbox btn-default"><i class="fa fa-hotel fa-2x"></i><br><h3>'.$rs["roomType"].'</h3></a>':'<a href="javascript:;" id="'.$rs["id"].'" class="jqCRM col-sm-2 touchbox btn-warning"><i class="fa fa-hotel fa-2x"></i><br><h3>'.$rs["roomType"].'</h3></a>';
}
}
//echo '<a href="invoices-by-room.php" class="col-sm-3 touchbox btn-warning"><i class="fa fa-hotel fa-2x"></i><br><h3>No Room</h3></a>';
?>
</div>
</div>
<!--sidemenu
<div class="col-sm-2" style="border-left:#fff dotted 1px;">..</div>-->

</div>

<!-- End Main content -->
</div>
<?php include_once 'inc/footer.php'; ?>
<?php include_once 'inc/fullmodefooter.php'; ?>