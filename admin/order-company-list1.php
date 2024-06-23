<?php include_once 'inc/head.php'; 
loadAllCompany2Array();
getAllOrderRoomArrays();
?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php //loadStaff2Array(); ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1>Company - Individual Invoices</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Company invoices</li>
          </ol>
        </section>

<!-- Begin Main content -->
<?php 
if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'receptionist'){ 
	include_once 'order-clist-all1.php';

/*}elseif ($globalrole == 'bar'){ 
	include_once 'order-list-bar.php';

}elseif ($globalrole == 'bar2'){ 
	include_once 'order-list-bar2.php';
	
}elseif ($globalrole == 'bar3'){ 
	include_once 'order-list-bar3.php';
	
}elseif ($globalrole == 'restaurant'){ 
	include_once 'order-list-restaurant.php';*/
}
?>


<!-- End Main content -->
</div>
<?php include_once 'inc/footer.php'; ?>