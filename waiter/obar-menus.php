<!-- Mobile Menu start -- >
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav"><li><a data-toggle="collapse" href="#">Manage Order</a></li>
                                <li><a data-toggle="collapse" href="#">Bar (Lounge)</a>                                </li>
                                <li><a data-toggle="collapse"  href="#">Swimming Pool</a>                                </li>
                                <li><a data-toggle="collapse" href="../logout.php">Log Out</a>                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container" style="padding:0;">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border-bottom:#fff solid 1px; padding-left:0;">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro"><li><a data-toggle="tab" href="#" onClick="window.location = 'order-bar-home.php';" style="background:#fff;" class="<?php echo $active1; ?>"><i class="fa fa-user"></i> Order Bar Item</a>
                      </li>
                        <li><a data-toggle="tab" href="#" onClick="window.location = 'order-bar-lists.php';" style="background:#fff;" class="<?php echo $active2; ?>"><i class="fa fa-glass"></i> Bar Order Lists</a>                        </li>
                        <li><a data-toggle="tab" href="#" onClick="window.location = 'order-swimpool-lists.php';" style="background:#fff;" class="<?php echo $active3; ?>"><i class="fa fa-table"></i> Swimming Pool</a>                        </li>
						<li><a data-toggle="tab" href="#" onClick="window.location = 'barprofile.php?id=<?php echo $globalid; ?>';" style="background:#fff;" class="<?php echo $active4; ?>"><i class="fa fa-user"></i> My Profile</a></li>
						<li><a data-toggle="tab" href="#" onClick="window.location = '../logout.php';" style="background:#fff;" class="<?php echo $active4; ?>"><i class="fa fa-key"></i> Log Out</a></li>
                    </ul>
              </div>
            </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->