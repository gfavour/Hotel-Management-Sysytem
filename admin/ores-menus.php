    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container" style="padding:0;">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border-bottom:#fff solid 1px; padding-left:0;">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro"><li><a data-toggle="tab" href="#" onClick="window.location = 'order-res-home.php';" style="background:#fff;" class="<?php echo $active1; ?>"><i class="fa fa-user"></i> Order Item</a>
                      </li>
                        <li><a data-toggle="tab" href="#" onClick="window.location = 'order-res-lists.php';" style="background:#fff;" class="<?php echo $active2; ?>"><i class="fa fa-glass"></i> Transactions</a>                        </li>
						<?php if($globalrole == 'admin'){ ?>
						<li><a href="index.php" style="background:#fff;"><i class="fa fa-user"></i> Dashboard</a></li>
						<?php }else{ ?>
						<li><a data-toggle="tab" href="#" onClick="window.location = 'resprofile.php?id=<?php echo $globalid; ?>';" style="background:#fff;" class="<?php echo $active4; ?>"><i class="fa fa-user"></i> My Profile</a></li>
						<?php } ?>
						<li><a href="ores-sales-report.php" style="background:#fff;" class="<?php echo $active4a; ?>"><i class="fa fa-user"></i> Sales Report</a></li>
						<li><a data-toggle="tab" href="#" onClick="window.location = '../logout.php';" style="background:#fff;" class="<?php echo $active4; ?>"><i class="fa fa-key"></i> Log Out</a>                                </li>
                    </ul>
              </div>
            </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->