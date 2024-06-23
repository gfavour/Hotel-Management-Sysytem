<?php $pagelnk = basename($_SERVER['PHP_SELF'],".php");

$default = '';

if($pagelnk == 'order' || $pagelnk == 'append-list' || $pagelnk == 'order-list'){
  $active1 = 'active';
}elseif($pagelnk == 'manage-inout' || $pagelnk == 'manage-rooms' || $pagelnk == 'manage-room-facilities'){
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
}

?>

<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            
			
            <li><a href="index.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
			
		<?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'receptionist'){ ?>
			<li class="<?php echo $order_list; ?>"><a href="order-list.php"><i class="fa fa-table"></i><span>General Order List</span> <span class="label pull-right bg-yellow"><?php 
				if($globalrole == 'admin' || $globalrole == 'manager'){
					echo countrows("select id from orders"); 
				}elseif($globalrole == 'bar'){
					echo countrows("select id from orders WHERE isbar <> '0'"); 
				}elseif($globalrole == 'bar2'){
					echo countrows("select id from orders WHERE isbar2 <> '0'"); 
				}elseif($globalrole == 'receptionist'){
					echo countrows("select id from orders WHERE isroom <> '0'"); 
				}elseif($globalrole == 'restaurant'){
					echo countrows("select id from orders WHERE isrestaurant <> '0'"); 
				}elseif($globalrole == 'laundary'){
					echo countrows("select id from orders WHERE islaundary <> '0'"); 
				}elseif($globalrole == 'swimmingpool'){
					echo countrows("select id from orders WHERE isswimpool <> '0'"); 
				}elseif($globalrole == 'sport'){
					echo countrows("select id from orders WHERE issport <> '0'"); 
				}elseif($globalrole == 'spa'){
					echo countrows("select id from orders WHERE isspa <> '0'"); 
				}
				
				?></span></a></li>
			<?php } ?>	
			
			
			
			
			
			<?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'store'){ ?>
			<li class="<?php echo $bar; ?>"><a href="store.php"><i class="fa fa-table"></i><span>Store</span> <span class="label pull-right bg-blue"><?php echo countrows("select id from store"); ?></span></a></li>
			<?php } ?>
			
			<?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'bar'){ ?>
            <li class="treeview <?php echo $active7; ?>"><a href="#"><i class="fa fa-bed"></i><span>Bar (Lounge)</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
			 <?php if ($globalrole == 'admin' || $globalrole == 'manager'){ ?> 
			  <li><a href="add-bar.php"><i class="fa fa-glass"></i><span>Add Bar Item</span> <span class="label pull-right bg-green"><?php echo countrows("select id from addbar"); ?></span></a></li>
			<?php } ?>
			<li><a href="manage-bar.php"><i class="fa fa-glass"></i><span>Bar Item List</span> <span class="label pull-right bg-green"><?php echo countrows("select id from addbar"); ?></span></a></li>
			<!--<li><a href="order-bar.php?clientid=1"><i class="fa fa-glass"></i><span>Order</span> <span class="label pull-right bg-green"><?php echo countrows("select id from addbar"); ?></span></a></li>-->
			</ul>
			</li>
			
			<!--<li class=""><a href="manage-swimpool.php"><i class="fa fa-gear"></i><span>Swimming Pool</span> <span class="label pull-right bg-green"><?php //echo countrows("select id from addswimpool"); ?></span></a></li>-->
			
			<?php } ?>
			
			
			<?php if ($globalrole == 'admin' || $globalrole == 'manager' || $globalrole == 'bar2'){ ?>
            <li class="treeview <?php echo $active7a; ?>"><a href="#"><i class="fa fa-bed"></i><span>Bar 2 (Club)</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
			 <?php if ($globalrole == 'admin' || $globalrole == 'manager'){ ?> 
			  <li><a href="add-bar2.php"><i class="fa fa-glass"></i><span>Add Bar Item</span> <span class="label pull-right bg-green"><?php echo countrows("select id from addbar2"); ?></span></a></li>
			<?php } ?>
			<li><a href="manage-bar2.php"><i class="fa fa-glass"></i><span>Bar Item List</span> <span class="label pull-right bg-green"><?php echo countrows("select id from addbar2"); ?></span></a></li>
			</ul>
			</li>
			
			<li class=""><a href="manage-swimpool.php"><i class="fa fa-gear"></i><span>Swimming Pool</span> <span class="label pull-right bg-green"><?php echo countrows("select id from addswimpool"); ?></span></a></li>
			
			<?php } ?>
			
<?php if ($globalrole == 'admin' || $globalrole == 'manager'){ ?>
<li class="<?php echo $report; ?>"><a href="manage-category.php"><i class="fa fa-book"></i><span>Services Category</span></a></li>
<?php } ?>

<?php //if ($globalrole == 'admin' || $globalrole == 'manager'){ ?>
<li class="<?php echo $exp; ?>"><a href="barrequest.php"><i class="fa fa-book"></i><span>Bar Request</span></a></li>
<li class="<?php echo $exp; ?>"><a href="expenditure.php"><i class="fa fa-book"></i><span>Expenditure</span></a></li>
<?php //} ?>

<?php if ($globalrole == 'admin' || $globalrole == 'manager'){ ?>
<li class="treeview <?php echo $active3; ?>"><a href="#"><i class="fa fa-building"></i><span>Trend Analysis</span> <i class="fa fa-angle-left pull-right"></i></a>
   <ul class="treeview-menu">
      <li class=""><a href="bar-trend.php"><i class="fa fa-book"></i> <span>Bar 1</span></a></li>
	  <li class=""><a href="bar2-trend.php"><i class="fa fa-book"></i> <span>Bar 2</span></a></li>
   </ul>
</li>
<?php } ?>

<?php if ($globalrole == 'admin' || $globalrole == 'manager'){ ?>
<li class="treeview <?php echo $active4; ?>"><a href="#"><i class="fa fa-building"></i><span>Reports</span> <i class="fa fa-angle-left pull-right"></i></a>
   <ul class="treeview-menu">
      <li class=""><a href="report.php"><i class="fa fa-book"></i><span>General Report</span></a></li>
	  <li class=""><a href="report-inventory.php"><i class="fa fa-book"></i><span>Stock Report</span></a></li>
	  <li class=""><a href="restocklist.php"><i class="fa fa-book"></i>Re-stock History</a></li>
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
<li class=""><a href="../logout.php"><i class="fa fa-gear"></i><span>Log Out</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>