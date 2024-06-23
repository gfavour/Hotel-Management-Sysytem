<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php //loadStaff2Array(); ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>General Order List</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">General order list</li>
          </ol>
        </section>

<!-- Begin Main content -->
<?php 
if ($globalrole == 'admin' || $globalrole == 'manager'){ 
	include_once 'order-list-all.php';

}elseif ($globalrole == 'receptionist'){
	include_once 'order-list-receptionist.php';
	
}elseif ($globalrole == 'bar'){ 
	include_once 'order-list-bar.php';

}elseif ($globalrole == 'bar2'){ 
	include_once 'order-list-bar2.php';
	
}elseif ($globalrole == 'restaurant'){ 
	include_once 'order-list-restaurant.php';

}elseif ($globalrole == 'laundary'){ 
	include_once 'order-list-laundary.php';
	
}elseif ($globalrole == 'sport'){ 
	include_once 'order-list-sport.php';

}elseif ($globalrole == 'spa'){ 
	include_once 'order-list-spa.php';
	
}elseif ($globalrole == 'swimpool'){ 
	include_once 'order-list-swimpool.php';
}
?>


<!-- End Main content -->
</div>
<?php include_once 'inc/footer.php'; ?>