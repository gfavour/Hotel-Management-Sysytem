<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Search Customer Invoice</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Search Customer Invoice</li>
          </ol>
        </section>

<!-- Begin Main content -->
<div class="col-sm-12" style="margin:20px 0;">
<?php 
$sql = select("SELECT id,roomType FROM addroom ORDER BY id");
if($sql){					
while($rs = mysqli_fetch_assoc($qry)){
echo '<a href="invoices-by-room.php?room='.$rs["id"].'" class="col-sm-3 touchbox btn-danger"><i class="fa fa-home fa-2x"></i><br><h3>'.$rs["roomType"].'</h3></a>';
}
}
echo '<a href="invoices-by-room.php" class="col-sm-3 touchbox btn-warning"><i class="fa fa-home fa-2x"></i><br><h3>No Room</h3></a>';
?>
</div>

<!-- End Main content -->
</div>
<?php include_once 'inc/footer.php'; ?>