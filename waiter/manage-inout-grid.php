<?php include_once 'inc/head.php'; ?>
<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<div class="content-wrapper">
        <!-- Page Header -->
        <section class="content-header">
          <h1 style="border-bottom:#ccc solid 1px; padding-bottom:5px; margin-bottom:5px;">Manage Check In/Out</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manage in/out</li>
          </ol>
		  Below are rooms in the hotels. Room with orange color denote occupied room. Click on any available room to<br />check in client. Click here to view past <a href="manage-inout.php">booking lists</a>
        </section>

<!-- Begin Main content -->
<section class="content">
<div class="row">
            <div class="col-xs-12">
			<div id="msgbox"></div>
			<?php
				$CheckedInClient = '';
				$sql = select("SELECT id,roomType,roomrate FROM addroom ORDER BY id");
				if($sql){					
				while($rs = mysqli_fetch_assoc($qry)){
					$isCheckedIn = isCheckedIn($rs["id"]);
					if($isCheckedIn == ''){
						$outs .= '<a href="order-noclient.php?roomid='.$rs["id"].'" class="col-sm-3 touchbox btn btn-default"><i class="fa fa-hotel fa-2x"></i><br><h3 style="margin:5px 0;">'.$rs["roomType"].'</h3><strong>Price:</strong> '.$cursign.number_format($rs["roomrate"],0).'</a>';
					}elseif($isCheckedIn == 'in'){
						$ins .= '<div class="col-sm-3 touchbox btn btn-warning" style="cursor:text;"><i class="fa fa-hotel fa-2x"></i><br><h3 style="margin:5px 0;">'.$rs["roomType"].'</h3><strong>Price:</strong> '.$cursign.number_format($rs["roomrate"],0).'<br>'.$CheckedInClient.'</div>';
					
					}elseif($isCheckedIn == 'new'){
						$outs .= '<div class="col-sm-3 touchbox btn btn-warning" style="cursor:text;"><i class="fa fa-hotel fa-2x"></i><br><h3 style="margin:5px 0;">'.$rs["roomType"].'</h3><strong>Price:</strong> '.$cursign.number_format($rs["roomrate"],0).'<br>'.$CheckedInClient.'</div>';					
					}
				}
				echo $ins.$outs;
				}
			?>
            </div>
          </div>
</section>
<!-- End Main content -->
<div id="checkoutalert"></div>
</div>
<?php include_once 'inc/footer.php'; ?>
<script>
setInterval(function(){
$.ajax({url:"../fxn/process1.php?dwat=isDue4CheckOut",crossOrigin: true,success:function(r){ 
	if(r != ''){
		$("#checkoutalert").html('<div class="floatmsg2">'+r+'</div>');
	}
},error:function(e){}});
},5000);
</script>