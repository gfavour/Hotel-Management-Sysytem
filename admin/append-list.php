<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Append Order</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manage order</li>
          </ol>
        </section>

<!-- Begin Main content -->
<?php 
if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'receptionist'){ 
	include_once 'append-list-all.php';

}elseif ($globalrole == 'bar'){ 
	include_once 'append-list-bar.php';

}elseif ($globalrole == 'restaurant'){ 
	include_once 'append-list-restaurant.php';

}elseif ($globalrole == 'laundary'){ 
	include_once 'append-list-laundary.php';
	
}elseif ($globalrole == 'sport'){ 
	include_once 'append-list-sport.php';

}elseif ($globalrole == 'spa'){ 
	include_once 'append-list-spa.php';
	
}elseif ($globalrole == 'swimpool'){ 
	include_once 'append-list-swimpool.php';
}
?>
<!-- End Main content -->
</div>
<?php include_once 'inc/footer.php'; ?>