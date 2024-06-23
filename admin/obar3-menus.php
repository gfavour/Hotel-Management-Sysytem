    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area" style=" background:#00C292; border-bottom:#fff solid 1px; margin-bottom:10px;">
        <div class="container" style="padding:0;">
            <div class="row">
                <div class="col-xs-12" style="padding:0;">
                    <ul class="nav nav-tabs notika-menu-wrap"><li><a data-toggle="tab" href="#" onClick="window.location = 'order-bar3-home.php';" style="background:#fff;" class="<?php echo $active1; ?>"><i class="fa fa-user"></i> Order Item</a>
                      </li>
                        <li><a href="order-bar3-lists.php" style="background:#fff;" class="<?php echo $active2; ?>"><i class="fa fa-glass"></i> Transactions</a>                        </li>
                        <li><a href="order-swimpool-lists3.php" style="background:#fff;" class="<?php echo $active3; ?>"><i class="fa fa-table"></i> Swimming Pool</a></li>
						<li><a data-toggle="tab" href="#" onClick="window.location = 'order-bar3-waiter-lists.php';" style="background:#fff;" class="<?php echo $active3a; ?>"><i class="fa fa-table"></i> Waiters Order List</a></li>
						<?php if($globalrole == 'admin'){ ?>
						<li><a href="index.php" style="background:#fff;" class="<?php echo $active4; ?>"><i class="fa fa-user"></i> Dashboard</a></li>
						<?php }else{ ?>
						<li><a data-toggle="tab" href="bar3profile.php?id=<?php echo $globalid; ?>" style="background:#fff;" class="<?php echo $active4; ?>"><i class="fa fa-user"></i> My Profile</a></li>
						<?php } ?>
						<li><a href="bar3-sales-report.php" style="background:#fff;" class="<?php echo $active4a; ?>"><i class="fa fa-user"></i> Sales Report</a></li>
						<li><a href="obar3-request.php" style="background:#fff;" class="<?php echo $active4b; ?>"><i class="fa fa-user"></i> Request</a></li>
						<li><a href="#" onClick="LogOutShift()" style="background:#fff;" class="<?php echo $active4; ?>"><i class="fa fa-key"></i> Log Out</a></li>
                    </ul>
              </div>
            </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->