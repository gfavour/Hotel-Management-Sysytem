<?php include_once 'inc/head.php'; 
getServiceCategories("room");
?>
  <body class="hold-transition skin-yellow">
 <div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1 style="border-bottom:#ccc solid 1px; padding-bottom:5px; margin-bottom:5px;">WELCOME TO TROPICAL HOTEL AND SUITES</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Room Lists</li>
          </ol>
		 Kindly Navigate through the List below for your choice of room<br />
		 ROOM LIST
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
			<div id="msgbox"></div>
			<?php
				$CheckedInClient = '';
				$sql = select("SELECT id,roomType,roomrate,categoryid FROM addroom ORDER BY id");
				if($sql){					
				while($rs = mysqli_fetch_assoc($qry)){
					$isCheckedIn = isCheckedIn($rs["id"]);
					if($isCheckedIn == ''){
						$outs .= '<div class="col-sm-3 touchbox btn btn-default"> <div data-toggle="modal" data-target="#mainpics"  ><img src="resource/img/room_pics/rm1.jpg" class="img-responsive"></div><h3 style="margin:5px 0 0 0;">'.$rs["roomType"].'</h3>- '.$AllServiceCats[$rs["categoryid"]]["catname"].' -<br><strong>Price:</strong> '.$cursign.number_format($rs["roomrate"],0).'</div>';
					}
				}
				echo $ins.$outs;
				}
			?>
            </div>
          </div>
       <!-- Modal -->
<div id="mainpics" class="modal fade" role="dialog" style="margin-top: 70px;">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ROOM 00</h4>
      </div>
      <div class="modal-body">
      	<div id="mainpics_carousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#mainpics_carousel" data-slide-to="0" class="active"></li>
    <li data-target="#mainpics_carousel" data-slide-to="1"></li>
    <li data-target="#mainpics_carousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="resource/img/room_pics/rm1.jpg" class="img-responsive" alt="entrance">
    </div>

    <div class="item">
      <img src="resource/img/room_pics/rm2.jpg" class="img-responsive" alt="bed">
    </div>

    <div class="item">
      <img src="resource/img/room_pics/rm3.jpg" class="img-responsive" alt="lamp">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#mainpics_carousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#mainpics_carousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
    </div>

  </div>
</div>
<!------ Modal Ends ----->
</section>
<!-- End Main content -->
<div id="checkoutalert"></div>
</div>

<?php include_once 'inc/footer.php'; ?>