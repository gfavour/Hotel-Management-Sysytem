<?php $menuLinkId = basename($_SERVER['PHP_SELF'],".php");

$default = '';

if($menuLinkId === 'index')
{
  $index = 'active';
} else if ($menuLinkId === 'manage-rooms')
{
  $manage_room = 'active';
  $add_room = 'active';
}
else if ($menuLinkId === 'manage-room-facilities')
{
  $manage_room = 'active';
  $add_facilities = 'active';
}
else if ($menuLinkId === 'manage-guests')
{
  $manage_clients = 'active';
  $add_client = 'active';
}
else if ($menuLinkId === 'order')
{
  $manage_clients = 'active';
  $new_order = 'active';
  
}
else if ($menuLinkId === 'order-list')
{
  $manage_clients = 'active';
  $order_list = 'active';
  
}
else if ($menuLinkId === 'customer-order-list')
{
  $manage_clients = 'active';
  $customer_list = 'active';
  
}
/*else if ($menuLinkId === 'client_history')
{
  $manage_clients = 'active';
  $client_history = 'active';
}
else if ($menuLinkId === 'processed')
{
  $manage_clients = 'active';
  $reservation_history = 'active';
  $processed = 'active';
}
else if ($menuLinkId === 'pending')
{
  $manage_clients = 'active';
  $reservation_history = 'active';
  $pending = 'active';
}
else if ($menuLinkId === 'canceled')
{
  $manage_clients = 'active';
  $reservation_history = 'active';
  $canceled = 'active';
}
else if ($menuLinkId === 'deleted')
{
  $manage_clients = 'active';
  $reservation_history = 'active';
  $deleted = 'active';
}*/
else if ($menuLinkId === 'manage-staff')
{
  $manage_users = 'active';
  $add_users = 'active';
}
else if ($menuLinkId === 'departments')
{
  $manage_users = 'active';
  $department = 'active';
}
else if ($menuLinkId === 'manage-bar')
{
  $bartender = 'active';
  $add_bar = 'active';
}
else if ($menuLinkId === 'manage-sport')
{
  $sport_facility = 'active';
}
else if ($menuLinkId === 'manage-resturant')
{
  $resturant = 'active';
}
else if ($menuLinkId === 'manage-spa')
{
  $massage_room = 'active';
}
else if ($menuLinkId === 'manage-laundry')
{
  $laundry = 'active';
}
else if ($menuLinkId === 'report')
{
  $report = 'active';
}
else if ($menuLinkId === 'settings')
{
  $settings = 'active';
}

?>

<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <!--
		  <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo $globalpic; ?>" class="img-circle" title="<?php echo $globalpic; ?>">
            </div>
            <div class="pull-left info">
              <p><?php echo $globalname; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
		  
		  <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
		  -->
		  
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            
			  <?php 
			  if ($globalrole == 'bar'){ 
				//echo '<li><a href="fullmode-receptionist-rooms.php" class="btn btn-sm btn-danger" style="color:#fff; font-size:14px; width:90%;margin:10px auto;">Switch to Quick Mode</a></li>';
			  }
			  ?>
			
            <li><a href="index.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
			
			<?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'receptionist'){ ?>
			<li class="<?php echo $manage_clients; ?>"><a href="manage-guests.php"><i class="fa fa-users"></i><span>Manage Guests</span>  <span class="label pull-right bg-red"><?php echo countrows("select id from addclient"); ?></span></a></li>
			<?php } ?> 
						
			  <li class="treeview <?php echo $manage_orders; ?>"><a href="#"><i class="fa fa-users"></i><span>Manage Order</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
			  <?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'receptionist'){ ?>
               <li class="<?php echo $new_order; ?>"><a href="manage-guests.php"><i class="fa fa-circle-o"></i>New Order</a></li>
			   <li class="<?php echo $append_order; ?>"><a href="append-list.php"><i class="fa fa-circle-o"></i>Append Order</a></li>
			   <?php } ?> 
                <li class="<?php echo $order_list; ?>"><a href="order-list.php"><i class="fa fa-table"></i>Order List <span class="label pull-right bg-yellow"><?php echo countrows("select id from orders"); ?></span></a></li>
				<!--<li><a href="order-searchlist.php"><i class="fa fa-table"></i>Search Customer Invoice</a></li>-->
                </ul></li>
		
		<?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'receptionist'){ ?>
			  <li class="<?php echo $checkinout; ?>"><a href="manage-inout-grid.php"><i class="fa fa-bed"></i><span>Check In/Out</span> <span class="label pull-right bg-yellow"><?php echo returnField("select count(id) AS ctn from order_room where checkstatus = 'in'","ctn"); ?> in</span></a></li>
			  <?php } ?> 
			  
		
			
			<?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'receptionist'){ ?>
              <li class="treeview <?php echo $manage_room; ?>"><a href="#"><i class="fa fa-bed"></i><span>Rooms</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
			  	<li class="<?php echo $checkinout; ?>"><a href="manage-inout.php"><i class="fa fa-bed"></i><span>Booking List</span></a></li>
                <li class="<?php echo $add_room; ?>"><a href="manage-rooms.php"><i class="fa fa-bed"></i>Add Rooms <span class="label pull-right bg-blue"><?php echo countrows("select id from addroom"); ?></span></a></li>
                <li class="<?php echo $add_facilities; ?>"><a href="manage-room-facilities.php"><i class="fa fa-circle-o"></i>Add Room Facilities <span class="label pull-right bg-blue"><?php echo countrows("select id from addroomfacility"); ?></span></a></li>
               </ul>
            </li>
			<?php } ?>
			
			<?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'restaurant'){ ?>
			<li class="<?php echo $resturant; ?>"><a href="manage-resturant.php"><i class="fa fa-cutlery"></i><span>Restaurant</span> <span class="label pull-right bg-yellow"><?php echo countrows("select id from addresturant"); ?></span></a></li>
			<?php } ?>
			
			<?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'laundary'){ ?>
			<li class="<?php echo $laundry; ?>"><a href="manage-laundry.php"><i class="fa fa-table"></i><span>Laundry</span> <span class="label pull-right bg-blue"><?php echo countrows("select id from addlaundary"); ?></span></a></li>
			<?php } ?>
			
			<?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'bar'){ ?>
            <li class="<?php echo $bartender; ?>"><a href="manage-bar.php"><i class="fa fa-glass"></i><span>Bar (Lounge)</span> <span class="label pull-right bg-green"><?php echo countrows("select id from addbar"); ?></span></a></li>
			<li class=""><a href="manage-swimpool.php"><i class="fa fa-gear"></i> <span>Swimming Pool</span> <span class="label pull-right bg-green"><?php echo countrows("select id from addswimpool"); ?></span></a></li>
			<?php } ?>
			
			<?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'sport'){ ?>
            <li class="<?php echo $sport_facility; ?>"><a href="manage-sport.php"><i class="fa fa-trophy"></i><span>Sport Materials</span> <span class="label pull-right bg-red"><?php echo countrows("select id from addsport"); ?></span></a></li>
            <?php } ?>
			
			<?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'spa'){ ?>
<li class="<?php echo $massage_room; ?>"><a href="manage-spa.php"><i class="fa fa-refresh"></i><span>Spa</span> <span class="label pull-right bg-green"><?php echo countrows("select id from addspa"); ?></span></a></li>
		   <?php } ?>

			<?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'spa'){ ?>
			<li class="treeview"><a href="#"><i class="fa fa-gears"></i><span>Gym</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
			   <li><a href="register4gym.php"><i class="fa fa-circle-o"></i>Gym Members</a></li>
			   <li><a href="gympayments.php"><i class="fa fa-circle-o"></i>Gym Payment History</a></li>
			   </ul>
			 </li>
			 <?php } ?>

<?php if ($globalrole == 'admin' || $globalrole == 'manager'){ ?>
<li class="<?php echo $report; ?>"><a href="manage-category.php"><i class="fa fa-book"></i><span>Services Category</span></a></li>
<?php } ?>

<?php if ($globalrole == 'admin' || $globalrole == 'manager'){ ?>
<li class="treeview"><a href="#"><i class="fa fa-building"></i><span>Trend Analysis</span> <i class="fa fa-angle-left pull-right"></i></a>
   <ul class="treeview-menu">
      <li class=""><a href="rooms-trend.php"><i class="fa fa-book"></i> <span>Rooms</span></a></li>
      <li class=""><a href="bar-trend.php"><i class="fa fa-book"></i> <span>Bar</span></a></li>
	  <li class=""><a href="restaurant-trend.php"><i class="fa fa-book"></i> <span>Restaurant</span></a></li>
	  <li class=""><a href="sport-trend.php"><i class="fa fa-book"></i> <span>Sport Materials</span></a></li>
   </ul>
</li>
<?php } ?>

<?php if ($globalrole == 'admin' || $globalrole == 'manager'){ ?>
<li class="treeview"><a href="#"><i class="fa fa-building"></i><span>Reports</span> <i class="fa fa-angle-left pull-right"></i></a>
   <ul class="treeview-menu">
      <li class=""><a href="report.php"><i class="fa fa-book"></i><span>General Reports</span></a></li>
      <li class=""><a href="sss.php"><i class="fa fa-book"></i>SSS Report</a></li>
	  <li class=""><a href="restocklist.php"><i class="fa fa-book"></i>Re-stock History</a></li>
   </ul>
</li>
<?php } ?>

<?php if ($globalrole == 'admin' || $globalrole == 'manager'){ ?>			
<li class="<?php echo $add_users; ?>"><a href="manage-staff.php"><i class="fa fa-user-plus"></i> Manage Staffs <span class="label pull-right bg-red"><?php echo countrows("select id from users"); ?></span></a></li>
<?php } ?>

<?php if ($globalrole == 'admin'){ ?>
<!--<li class="<?php echo $settings; ?>"><a href="backup.php"><i class="fa fa-gear"></i> <span>Backup Database</span></a></li> 
<li class="<?php echo $settings; ?>"><a href="logs.php"><i class="fa fa-gear"></i> <span>Log History</span></a></li> 
<li class="<?php echo $settings; ?>"><a href="settings.php"><i class="fa fa-gear"></i> <span>Settings</span></a></li>-->     

<li class="treeview"><a href="#"><i class="fa fa-building"></i><span>Settings / History</span> <i class="fa fa-angle-left pull-right"></i></a>
   <ul class="treeview-menu">
      <li class=""><a href="settings.php"><i class="fa fa-gear"></i> <span>General Settings</span></a></li>
      <li class=""><a href="logs.php"><i class="fa fa-gear"></i> <span>Log History</span></a></li>
	  <li class=""><a href="backup.php"><i class="fa fa-gear"></i> <span>Backup Database</span></a></li> 
   </ul>
</li>
   
<?php } ?>
<li class=""><a href="../logout.php"><i class="fa fa-gear"></i> <span>Log Out</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>