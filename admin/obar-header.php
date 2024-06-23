<div class="floatalert" style="display:none;"></div>

<?php
	$isopenshift = 0;
	$qrys = mysqli_query($conn4as,"SELECT * FROM tblshifts WHERE servicetype = 'bar1' ORDER BY id DESC LIMIT 1");
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
	
<div class="header-top-area">
        <div class="container" style="padding:0;">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="padding:0;">
                    <div class="logo-area">
                        <a href="#" style="font-size:1.8em;font-weight:600;color:#fff !important;">HOTEL BAR 1</a>
                    </div>
                </div>
                <div class="col-lg-4 pull-right" style="padding:20px 0 0 0; color:#fff; font-size:18px; text-align:right;"><?php echo ($openshift != '')?"<strong>Opened Shift:</strong> ".$openshift:''; ?></div>
            </div>
        </div>
    </div>
	
	
	<div style="width:100%; height:100vh; background:rgba(235,235,235,0.8); position:absolute; z-index:3000;display:<?php echo ($isopenshift == 1)?'block':'none'; ?>;" id="shiftcontainer">
	<div class="col-sm-6 col-sm-offset-3" style="text-align:center; background:#fff;margin-top:5%; padding:50px; border:#00C292 solid 2px;border-radius:5px;">
	<div style="font-size:28px; padding-bottom:10px;">Use the button below to Open/Close Shift, or Logout.</div>
				<button id="openshiftbtn" type="button" onclick="SendByAjax('dwat=openshift&stype=bar1&uid=<?php echo $globalid; ?>','../fxn/processshift.php','')" class="btn btn-lg btn-info" style="display:block;margin:0 auto 10px auto;width:300px;">OPEN SHIFT</button>
				<button id="closeshiftbtn" type="button" class="btn btn-lg btn-warning" style="display:block;margin:0 auto 10px auto;width:300px;display:none;" onclick="SendByAjax('dwat=closeshift&stype=bar1&uid=<?php echo $globalid; ?>','../fxn/processshift.php','')">CLOSE SHIFT & LOGOUT</button>
<button type="button" id="logoutonly" class="btn btn-lg btn-danger" style="display:block;margin:0 auto 10px auto;width:300px;" onclick="window.location = '../logout.php'">LOGOUT</button>
<br /><a href="javascript:;" id="cancelshift" onclick="CancelLogOutShift();document.body.style.overflow = 'visible';">Cancel & Continue</a>
				</div>
	</div>
	
	<?php 
		if($isopenshift == 1){
			echo '<style>body{overflow:hidden;}</style>';
		} 
	?>