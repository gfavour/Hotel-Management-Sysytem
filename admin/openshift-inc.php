<?php
	//$servicetype = $globalrole;
	//$shifturl = 'processshiftrec.php';
	$isopenshift = 0;
	$qrys = mysqli_query($conn4as,"SELECT * FROM tblshifts WHERE servicetype = '".mysqli_real_escape_string($conn4as,$servicetype)."' ORDER BY id DESC LIMIT 1");
	$totals = mysqli_num_rows($qrys);
	if($totals > 0){
		$rss = mysqli_fetch_assoc($qrys);
		$userid = $rss["userid"];
		$openshift = $rss["openshift"];
		$closeshift = $rss["closeshift"];
		$servicetype = $rss["servicetype"];
		$xlsurl = $rss["xlsurl"];
		if($userid == $globalid && $openshift != '' && $closeshift == ''){ //already opened
			$isopenshift = 0;
		}elseif($userid == $globalid && $openshift != '' && $closeshift != ''){ //already opened
			$openshift = '';
			$isopenshift = 1;
		}elseif($userid != $globalid){ //Not this globalid
			$openshift = '';
			$isopenshift = 1;
		}
	}else{
		$isopenshift = 1;
	}
	//echo date("Y-m-d h:i A");
	?>
	
<div style="width:100%; height:100vh; background:rgba(235,235,235,0.8); position:absolute; z-index:3000;display:<?php echo ($isopenshift == 1)?'block':'none'; ?>;" id="shiftcontainer">
	<div class="col-sm-6 col-sm-offset-3" style="text-align:center; background:#fff;margin-top:5%; padding:50px; border:#00C292 solid 2px;border-radius:5px;">
	<div style="font-size:28px; padding-bottom:10px;">Open/Close Shift or Logout.</div>
				<button id="openshiftbtn" type="button" onclick="SendByAjax('dwat=openshift&stype=<?php echo $servicetype; ?>&uid=<?php echo $globalid; ?>','../fxn/<?php echo $shifturl; ?>','')" class="btn btn-lg btn-info" style="display:block;margin:0 auto 10px auto;width:300px;">OPEN SHIFT</button>
				<button id="closeshiftbtn" type="button" class="btn btn-lg btn-warning" style="display:block;margin:0 auto 10px auto;width:300px;display:none;" onclick="SendByAjax('dwat=closeshift&stype=<?php echo $servicetype; ?>&uid=<?php echo $globalid; ?>','../fxn/<?php echo $shifturl; ?>','')">CLOSE SHIFT & LOGOUT</button>
<button type="button" id="logoutonly" class="btn btn-lg btn-danger" style="display:block;margin:0 auto 10px auto;width:300px;" onclick="window.location = '../logout.php'">LOGOUT</button><br /><a href="javascript:;" id="cancelshift" onclick="CancelLogOutShift();document.body.style.overflow = 'visible';">Cancel & Continue</a>
				</div>
	</div>
	
	<?php 
		if($isopenshift == 1){
			echo '<style>body{overflow:hidden;}</style>';
		} 
	?>
	<?php if($openshift != ''){ $openedShift = "<strong>Opened Shift:</strong> ".$openshift;}else{ $openedShift = '';} ?>