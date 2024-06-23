<?php 
if($globalrole == 'receptionist'){ //receptionist
	$servicetype = $globalrole;
	$shifturl = 'processshiftrec.php';
	include("openshift-inc.php"); 
}
?>
  <body class="hold-transition skin-yellow sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
     <header class="main-header">

        <!-- Logo -->
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>B</b>HM</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Big</b>HMS&nbsp;&nbsp;<i class="fa fa-hotel fa-lg"></i></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less
			  <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i></a>
                <ul class="dropdown-menu">
                  <li></li>                
                </ul>
              </li>
			  -->
			  <li class="dropdown messages-menu">
                <!--<a href="javascript:void();" onClick="ReSync();" class="dropdown-toggle" data-toggle="dropdown" title="Re-sync. all data to online database"><i class="fa fa-cloud-upload"></i></a>-->
              </li>
              <!-- Notifications Menu -->
			  <li class="dropdown notifications-menu">
			  
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<?php 
				if ($globalrole == 'admin' || $globalrole == 'manager'){ $cbslimit = '<li>'.CheckBarStockLimit("bar").'</li>'; }
				if ($globalrole == 'admin' || $globalrole == 'manager'){ $cbslimit .= '<li>'.CheckBarStockLimit("bar2").'</li>'; }
				if ($noteCountImg > 0){echo '<span class="label pull-right bg-red">'.$noteCountImg.'</span>'; } 
				?>
                  <i class="fa fa-bell-o"></i>
                                  </a>
                <ul class="dropdown-menu" style="padding:10px;">
                  <?php echo $cbslimit; ?>                
                </ul>
              </li><!-- /.messages-menu -->
                <!-- Tasks Menu -->
                            <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="<?php echo $globalpic; ?>" class="user-image" alt="<?php echo $globalpic; ?>">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo $globalname; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="<?php echo $globalpic; ?>" class="img-circle" alt="<?php echo $globalpic; ?>">
                    <p><?php echo $globalname.' ('.$globalrole.')'; ?>
                      <small><?php echo ($openedShift != '')?$openedShift:date("jS M Y, h:i:s A"); ?></small>
					  <small><?php echo $sessParams; ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="myprofile.php?id=<?php echo $globalid; ?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                     
					 <?php 
					 if($globalrole == 'receptionist'){
					 	echo '<a href="javascript:LogOutShift();" class="btn btn-default btn-flat">Log out</a>';
					 }else{
					 	echo '<a href="../logout.php" class="btn btn-default btn-flat">Log out</a>';
					 }
					 ?>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
               </ul>
          </div>
        </nav>
      </header>
	  