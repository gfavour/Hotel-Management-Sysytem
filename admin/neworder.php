<?php include_once 'inc/head.php'; ?>

<?php include_once 'inc/header.php'; ?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            
          </div>

          <!-- search form (Optional) -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <?php include_once 'inc/sidebar.php'; ?>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            New Order           </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i> Client Manager</li>
            <li class="active">Add Client</li>
          </ol>

        </section>
        <!-- Main content -->
    
	<form name="frm1" id="frm1" action="" method="post">
  <section class="content" >
 
  <div class="panel panel-info" style="padding:15px;">
  <?php
  $invoiceid = time();
  $sql = "SELECT * FROM addclient WHERE id=".mysqli_real_escape_string($conn4as,$_GET["clientid"]);
  $qry = mysqli_query($conn4as,$sql);
  $total = mysqli_num_rows($qry);
  if ($total > 0){
  $rs = mysqli_fetch_assoc($qry);
  	echo '<strong>Name: </strong> '.$rs["title"].' '.$rs["lastname"].' '.$rs["firstname"];
   echo '<br><strong>Email:</strong> '.$rs["email"];
   echo '<br><strong>Phone: </strong> '.$rs["mobile"];
   echo '<br><strong>Customer ID:00</strong> '.$rs["id"];
   echo '<br><strong>Invoice ID:</strong> '.$invoiceid;
  }else{
  	echo 'Error: Unknown Customer.';
  }
  ?>
  <span class="row">
  <input type="hidden" name="clientid" value="<?php echo $_GET['clientid']; ?>">
  <input type="hidden" name="invoiceid" value="<?php echo $_GET['invoiceid']; ?>">
  </span>
  <button class="btn btn-info float-btn-right" type="submit"><i class="fa fa-plus-square-o"></i>&nbsp;ORDER NOW</button>
  </div>
  
   <div class="row" style="text-align:left; margin:20px 0;">
   <div style="font-size:18px; line-height:20px; margin-bottom:10px; text-align:center;">Kindly select the service(s) you want below.</div>
   <div class="col-sm-3">
   <input type="checkbox" name="services" value="reservation" onclick="ShowHideById('tab-reservation')" /> Reservation ?
   </div>
   <div class="col-sm-3">
   <input type="checkbox" name="services" value="reservation" onclick="ShowHideById('tab-bar')" /> Bar Service ?
   </div>
   <div class="col-sm-4">
   <input type="checkbox" name="services" value="reservation" onclick="ShowHideById('tab-restaurant')" /> Restaurant Service ?
   </div>
   <div class="col-sm-3">
   <input type="checkbox" name="services" value="reservation" onclick="ShowHideById('tab-laundary')" /> Laundary Service ?
   </div>
   <div class="col-sm-3">
   <input type="checkbox" name="services" value="reservation" onclick="ShowHideById('tab-spa')" /> Spa Service ?
   </div>
   <div class="col-sm-3">
   <input type="checkbox" name="services" value="reservation" onclick="ShowHideById('tab-sport')" /> Sport Facilities ?
   </div>
   </div>
   
   
  <fieldset id="tab-reservation" class="panel panel-info" style="padding:15px;">
   <legend style="background:#fff; border:#ccc solid 1px; padding:5px; width:200px; font-size:20px; text-align:center;">Reservation</legend>
		<!--Start Row-->      
          
		  <div class="row">
			<p class="hdstyle2">ROOM DETAILS</p>
			<div class="col-sm-3">    
            <label>Choose Room Type</label>
              <?php
              $sql= "SELECT * FROM addroom";
              $query = mysqli_query($conn4as,$sql);

              echo '<div class="form-group input-group">
               <span class="input-group-addon"><i class="fa fa-building-o"></i></span><select name="room_type" id="room_type" title="room_type" onChange=getOptions(this,"RoomDetails","'.$ROOTHTTP.'dist/php/process.php") class=" form-control" required x-moz-errormessage="You must ensure you select a room.">';
              echo '<option value="0" selected>-</option>';
              while($addroom = mysqli_fetch_assoc($query)){
                echo "<option value='".$addroom['id']."'>{$addroom['roomType']}</option>";
}
               echo '</select></div>';
            ?>
			</div>
			
            <div class="col-sm-3">
            <label>Number of Room</label>
              <div class="form-group input-group templatemo-input-icon-contain">
               <span class="input-group-addon"><i class="fa fa-building-o"></i></span> 
                <select name="room_number" id="room_number" title="room_number" class=" form-control">
                      
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                </select>
              </div>
            </div>
                      
           <div  class="col-md-3">
<label>Amount</label>
               <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-money"></i></span>
            <input type="text" class="form-control" placeholder="Amount" id="roomrate" value="">
             </div>
          </div>
		  </div>
		  
		  
			<!--Start Row-->		  
			<div class="row">
			<p class="hdstyle2">SCHEDULE DETAILS</p>            
            <div class="col-md-3">
			<label>When do you arrive?</label>
                <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>
            <input type="text" data-title="Checkin" id="checkin" class="form-control" name="checkin" data-date-format="dd M yyyy" value="29 Dec 2015" data-required="yes">
             </div>
          </div>   

  			<div class="col-md-3">
			<label>when do you leave?</label>
              <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-calendar-minus-o"></i></span>
            <input type="text" id="checkout" class="form-control" name="checkout" data-date-format="dd M yyyy" data-required="true" value="30 Dec 2015" data-title="Checkout">
           </div>
          </div>
           
		   <div class="col-sm-3">
		   <label>Duration</label>
               <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-clock"></i></span>
            <input type="text" class="form-control" placeholder="Duration">
             </div>
          </div>
		  
		  </div><!--End of Row-->
  		
    </fieldset>
	
<fieldset id="tab-bar" class="panel panel-info" style="padding:15px;">
   <legend style="background:#fff; border:#ccc solid 1px; padding:5px; width:200px; font-size:20px; text-align:left;">Bar Service</legend>
      
  </fieldset>
  
  <fieldset id="tab-restaurant" class="panel panel-info" style="padding:15px;">
   <legend style="background:#fff; border:#ccc solid 1px; padding:5px; width:200px; font-size:20px; text-align:left;">Restaurant</legend>
      
  </fieldset>


<fieldset id="tab-sport" class="panel panel-info" style="padding:15px;">
   <legend style="background:#fff; border:#ccc solid 1px; padding:5px; width:200px; font-size:20px; text-align:left;">Sport Facilities</legend>
      
  </fieldset>
  
  
  <fieldset id="tab-spa" class="panel panel-info" style="padding:15px;">
   <legend style="background:#fff; border:#ccc solid 1px; padding:5px; width:200px; font-size:20px; text-align:left;">Spa Services</legend>
      
  </fieldset>

<fieldset id="tab-laundary" class="panel panel-info" style="padding:15px;">
   <legend style="background:#fff; border:#ccc solid 1px; padding:5px; width:200px; font-size:20px; text-align:left;">Laundary Services</legend>
      
  </fieldset>
  
  
  </section>
  </form>
<div id="add_client" class="modal fade" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="add_client" aria-hidden="true">
<!-- /.content-wrapper -->
<!-- Main Footer -->
<?php include_once 'inc/footer.php'; ?>
