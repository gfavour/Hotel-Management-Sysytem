<?php $pagelnk = basename($_SERVER['PHP_SELF'],".php");

$default = '';

if($pagelnk == 'order' || $pagelnk == 'append-list' || $pagelnk == 'order-list' || $pagelnk == 'order-company-list'){
  $active1 = 'active';
}elseif($pagelnk == 'manage-inout' || $pagelnk == 'general-transactions'){
  $active0 = 'active';
}elseif($pagelnk == 'manage-rooms' || $pagelnk == 'manage-room-facilities'){
  $active2 = 'active';
}elseif($pagelnk == 'rooms-trend' || $pagelnk == 'bar-trend' || $pagelnk == 'restaurant-trend' || $pagelnk == 'sport-trend'){
  $active3 = 'active';
}elseif($pagelnk == 'report' || $pagelnk == 'sss' || $pagelnk == 'restocklist'){
  $active4 = 'active';
}elseif($pagelnk == 'settings' || $pagelnk == 'logs' || $pagelnk == 'backup'){
  $active5 = 'active';
}elseif($pagelnk == 'register4gym' || $pagelnk == 'gympayments'){
  $active6 = 'active';
}elseif($pagelnk == 'manage-bar' || $pagelnk == 'order-bar' || $pagelnk == 'add-bar' || $pagelnk == 'editbar'){
  $active7 = 'active';
}elseif($pagelnk == 'manage-bar2' || $pagelnk == 'order-bar2' || $pagelnk == 'add-bar2' || $pagelnk == 'editbar2'){
  $active7a = 'active';
}elseif($pagelnk == 'manage-bar3' || $pagelnk == 'order-bar3' || $pagelnk == 'add-bar3' || $pagelnk == 'editbar3'){
  $active7a = 'active';
  }

?>

<aside class="main-sidebar">
        <section class="sidebar">
          
          <ul class="sidebar-menu">
            
			  <?php 
			  if ($globalrole == 'bar'){ 
				//echo '<li><a href="fullmode-receptionist-rooms.php" class="btn btn-sm btn-danger" style="color:#fff; font-size:14px; width:90%;margin:10px auto;">Switch to Quick Mode</a></li>';
			  }
			  ?>
			<li style="padding:15px 0 0 0px;color:#fff;"><a href="#"><i class="fa fa-cloud"></i><span>Remote Access</span><label class="switch pull-right" id="switchtab"><input type="checkbox" id="switchchk" onchange="SetSync();"><span class="slider round"></span></label></a></li>
            <li><a href="index.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
			
			<?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'receptionist'){ ?>
			
			
			<li class="treeview"><a href="#"><i class="fa fa-users"></i><span>Manage Guests</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
			  <li><a href="manage-guests.php"><i class="fa fa-users"></i><span>Guests</span>  <span class="label pull-right bg-red"><?php echo countrows("select id from addclient"); ?></span></a></li>
			  <li><a href="manage-company.php"><i class="fa fa-users"></i><span>Companies</span>  <span class="label pull-right bg-red"><?php echo countrows("select id from tblcompany"); ?></span></a></li>
			  <li><a href="manage-ewallet.php"><i class="fa fa-money"></i><span>Deposit</span>  <span class="label pull-right bg-red"><?php echo countrows("select id from ewallet"); ?></span></a></li>
			  </ul>
			  </li>
			
			<?php } ?> 
					
		<?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'receptionist'){ ?>
			  <li class="<?php echo $checkinout; ?>"><a href="manage-inout-grid.php"><i class="fa fa-bed"></i><span>Room Booking</span> <span class="label pull-right bg-yellow"><?php echo returnField("select count(id) AS ctn from order_room where checkstatus = 'in'","ctn"); ?> in</span></a></li>
			  
			  <li class=""><a href="roomschedule.php"><i class="fa fa-bed"></i><span>Room Reservation</span> <span class="label pull-right bg-green"><?php echo returnField("select count(id) AS ctn from tblschedule","ctn"); ?></span></a></li>
			  
			  <?php } ?> 
			  
		
		
		<?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'receptionist'){ ?>
		<li class="treeview <?php echo $active0; ?>"><a href="#"><i class="fa fa-table"></i><span>Transactions</span> <i class="fa fa-angle-left pull-right"></i></a>
              	<ul class="treeview-menu">
					<li><a href="manage-inout.php"><i class="fa fa-bed"></i><span>Booking Transactions</span></a></li>
					<li><a href="general-transactions.php"><i class="fa fa-table"></i><span>General Transactions</span></a></li>
				</ul>
			</li>
		<?php } ?>	
		
			<li class="treeview <?php echo $active1; ?>"><a href="#"><i class="fa fa-table"></i><span>Manage Invoices</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
			  <?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'receptionist'){ ?>
			  <li><a href="order-company-list.php"><i class="fa fa-table"></i><span>Company Invoices</span></a></li>
			  <?php } ?>
			  <li><a href="order-list.php"><i class="fa fa-table"></i><span>General Invoices</span></a></li>
				</ul>
				</li>
			
			
			
			
			<?php if ($globalrole == 'admin' || $globalrole == 'manager'){ ?>
              <li class="treeview <?php echo $active2; ?>"><a href="#"><i class="fa fa-bed"></i><span>Manage Rooms</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="manage-rooms.php"><i class="fa fa-bed"></i>Rooms <span class="label pull-right bg-blue"><?php echo countrows("select id from addroom"); ?></span></a></li>
                <li><a href="manage-room-facilities.php"><i class="fa fa-circle-o"></i>Room Facilities <span class="label pull-right bg-blue"><?php echo countrows("select id from addroomfacility"); ?></span></a></li>
               </ul>
            </li>
			<?php } ?>
			
			
			<?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'bar' || $globalrole == 'bar2' || $globalrole == 'bar3' || $globalrole == 'store'){ ?>
            <li class="treeview <?php echo $active7; ?>"><a href="#"><i class="fa fa-glass"></i><span>Manage Bars</span> <i class="fa fa-angle-left pull-right"></i></a>
             <ul class="treeview-menu">
			 <?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'bar' || $globalrole == 'store'){ ?>
			 <li><a href="manage-bar.php"><i class="fa fa-glass"></i><span>Bar 1</span></a></li>
			 <?php } ?>
			 <?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'bar2' || $globalrole == 'store'){ ?>
			 <li><a href="manage-bar2.php"><i class="fa fa-glass"></i><span>Bar 2</span></a></li>
			 <?php } ?>
			 <?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'bar3' || $globalrole == 'store'){ ?>
			 <li><a href="manage-bar3.php"><i class="fa fa-glass"></i><span>Bar 3</span></a></li>
			 <?php } ?>
			</ul>
			</li>
						
			<li class=""><a href="manage-swimpool.php"><i class="fa fa-gear"></i><span>Swimming Pool</span> <span class="label pull-right bg-green"><?php echo countrows("select id from addswimpool"); ?></span></a></li>
			
			<?php } ?>
			
			<?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'restaurant'){ ?>
			<li class="<?php echo $resturant; ?>"><a href="manage-resturant.php"><i class="fa fa-cutlery"></i><span>Restaurant</span> <span class="label pull-right bg-yellow"><?php echo countrows("select id from addresturant"); ?></span></a></li>
			<?php } ?>
			
			<?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'laundary' || $globalrole == 'receptionist'){ ?>
			<li class="<?php echo $laundry; ?>"><a href="manage-laundry.php"><i class="fa fa-table"></i><span>Laundry</span> <span class="label pull-right bg-blue"><?php echo countrows("select id from addlaundary"); ?></span></a></li>
			<?php } ?>
			
			<?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'store'){ ?>
			<li class="treeview"><a href="#"><i class="fa fa-table"></i><span>Manage Store</span> <i class="fa fa-angle-left pull-right"></i></a>
             <ul class="treeview-menu">
         <li><a href="store.php"><i class="fa fa-table"></i>Store For Bars<span class="label pull-right bg-blue"><?php echo countrows("select id from tblstore"); ?></span></a></li>
         <li><a href="store-restaurant.php"><i class="fa fa-table"></i>Food Ingredients</a></li>       
             </ul>
            </li>
			<?php } ?>
			
			<?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'sport'){ ?>
            <li class="<?php echo $sport_facility; ?>"><a href="manage-sport.php"><i class="fa fa-trophy"></i><span>Sport Materials</span> <span class="label pull-right bg-red"><?php echo countrows("select id from addsport"); ?></span></a></li>
            <?php } ?>
			
			<?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'spa'){ ?>
<li class=""><a href="manage-spa.php"><i class="fa fa-refresh"></i><span>Manage SPA</span> <span class="label pull-right bg-green"><?php echo countrows("select id from addspa"); ?></span></a></li>
		   <?php } ?>

			<?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'receptionist'){ ?>
			<li class="treeview <?php echo $active6; ?>"><a href="#"><i class="fa fa-gears"></i><span>Manage Cab</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
			   <li><a href="manage-cabs.php"><i class="fa fa-circle-o"></i>Registered Cab</a></li>
			   <li><a href="cabpayments.php"><i class="fa fa-circle-o"></i>Cab Payment History</a></li>
			   </ul>
			 </li>
			 <?php } ?>
			 
			<?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'spa' || $globalrole == 'sport'){ ?>
			<li class="treeview <?php echo $active6; ?>"><a href="#"><i class="fa fa-gears"></i><span>Manage Gym</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
			   <li><a href="register4gym.php"><i class="fa fa-circle-o"></i>Gym Members</a></li>
			   <li><a href="gympayments.php"><i class="fa fa-circle-o"></i>Gym Payment History</a></li>
			   </ul>
			 </li>
			 <?php } ?>

<?php if ($globalrole == 'admin' || $globalrole == 'manager'){ ?>
<li class="<?php echo $report; ?>"><a href="manage-category.php"><i class="fa fa-book"></i><span>Services Category</span></a></li>
<?php } ?>

<?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'store'){ ?>
<li class="<?php echo $exp; ?>"><a href="barrequest.php"><i class="fa fa-book"></i><span>Bar Request</span><span class="label pull-right bg-blue"><?php echo countrows("select id from barrequest"); ?></span></a></li>
<?php } ?>
<li class="<?php echo $exp; ?>"><a href="expenditure.php"><i class="fa fa-book"></i><span>Expenditure</span></a></li>


<?php if ($globalrole == 'admin' || $globalrole == 'manager'){ ?>
<li class="treeview <?php echo $active3; ?>"><a href="#"><i class="fa fa-building"></i><span>Trend Analysis</span> <i class="fa fa-angle-left pull-right"></i></a>
   <ul class="treeview-menu">
      <li class=""><a href="rooms-trend.php"><i class="fa fa-book"></i> <span>Rooms</span></a></li>
      <li class=""><a href="bar-trend.php"><i class="fa fa-book"></i> <span>Bar</span></a></li>
	  <li class=""><a href="bar2-trend.php"><i class="fa fa-book"></i> <span>Pool Bar</span></a></li>
	  <li class=""><a href="restaurant-trend.php"><i class="fa fa-book"></i> <span>Restaurant</span></a></li>
	  <li class=""><a href="sport-trend.php"><i class="fa fa-book"></i> <span>Sport Materials</span></a></li>
   </ul>
</li>
<?php } ?>

<?php if ($globalrole == 'admin' || $globalrole == 'manager'){ ?>
<li class="treeview <?php echo $active4; ?>"><a href="#"><i class="fa fa-building"></i><span>Reports</span> <i class="fa fa-angle-left pull-right"></i></a>
   <ul class="treeview-menu">
      <li class=""><a href="report.php"><i class="fa fa-book"></i><span>General Report</span></a></li>
	  <li class=""><a href="report-ingredients.php"><i class="fa fa-book"></i><span>Restaurant Raw Products</span></a></li>
	  <li class=""><a href="report-shifts.php"><i class="fa fa-book"></i>Open/Close Shifts</a></li>
	  <li class=""><a href="storehistoryreport.php"><i class="fa fa-book"></i>Store History</a></li>
	  <li class=""><a href="storetransferhistoryreport.php"><i class="fa fa-book"></i><span>Store Transfer History</span></a></li>
	  <li class=""><a href="report-inventory.php"><i class="fa fa-book"></i><span>Bar Stock Report</span></a></li>
	  <li class=""><a href="mastercardlog.php"><i class="fa fa-book"></i><span>Master Card Log</span></a></li>
	  <!--<li class=""><a href="restocklist.php"><i class="fa fa-book"></i>Re-stock History</a></li>-->
      <li class=""><a href="sss.php"><i class="fa fa-book"></i>SSS Report</a></li>
   </ul>
</li>
<?php } ?>

<?php if ($globalrole == 'admin' || $globalrole == 'manager'){ ?>			
<li class="treeview <?php echo $active8; ?>"><a href="#"><i class="fa fa-building"></i><span>Manage Staffs</span> <i class="fa fa-angle-left pull-right"></i></a>
   <ul class="treeview-menu">
      <li class=""><a href="manage-staff.php"><i class="fa fa-book"></i><span>Staffs</span></a></li>
      <li class=""><a href="waiters.php"><i class="fa fa-book"></i>Waiters</a></li>
   </ul>
</li>

<?php } ?>

<?php if ($globalrole == 'admin'){ ?>
<!--<li class="<?php echo $settings; ?>"><a href="backup.php"><i class="fa fa-gear"></i> <span>Backup Database</span></a></li> 
<li class="<?php echo $settings; ?>"><a href="logs.php"><i class="fa fa-gear"></i> <span>Log History</span></a></li> 
<li class="<?php echo $settings; ?>"><a href="settings.php"><i class="fa fa-gear"></i> <span>Settings</span></a></li>-->     

<li class="treeview <?php echo $active5; ?>"><a href="#"><i class="fa fa-building"></i><span>Settings / History</span> <i class="fa fa-angle-left pull-right"></i></a>
   <ul class="treeview-menu">
      <li class=""><a href="settings.php"><i class="fa fa-gear"></i> <span>General Settings</span></a></li>
      <li class=""><a href="logs.php"><i class="fa fa-gear"></i> <span>Log History</span></a></li>
	  <li class=""><a href="manage-tablenos.php"><i class="fa fa-gear"></i> <span>Table Numbering</span></a></li>
	  <li class=""><a href="backup.php"><i class="fa fa-gear"></i> <span>Backup Database</span></a></li> 
   </ul>
</li>
   
<?php } ?>
<li class="">
<?php 
	 if($globalrole == 'receptionist'){
	 	echo '<a href="javascript:void();" onclick="LogOutShift();"><i class="fa fa-gear"></i><span>Log Out</span></a>';
	 }else{
	 	echo '<a href="../logout.php"><i class="fa fa-gear"></i><span>Log Out</span></a>';
	 }
?>
</li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
	  <style>
	  .switch {
  position: relative;
  display: inline-block;
  width: 48px; height: 22px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}
.switch .slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.switch .slider:before {
  position: absolute;
  content: "";
  height: 14px;
  width: 14px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

.switch input:checked + .slider {
  background-color: #2196F3;
}

.switch input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

.switch input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}
.switch .slider.round {
  border-radius: 34px;
}

.switch .slider.round:before {
  border-radius: 50%;
}
</style>
