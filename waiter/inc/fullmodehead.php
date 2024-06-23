<style>
	body{
		background: #9ECC27;
		background: -webkit-linear-gradient(bottom top, #00CC66, #91CC2C, #9ECC27); 
		background: linear-gradient(bottom top, #00CC66, #91CC2C, #9ECC27);
	}
	.touchbox{border-radius:5px; margin:10px; padding:20px; text-align:center;}
	
	#fmodeclick,#fmodemenu{display:inline-block !important; border:#ccc solid 1px; border-radius:3px; padding:5px 10px !important; margin-bottom:10px !important; background:#111; color:#fff;}
	#fmodeclick{margin-right:5px;}
	#fmodeclick a,#fmodemenu a{color:#fff !important;}
	
	.quickmenusbg{ position:absolute; background:rgba(0,0,0,0.5); width:100%; height:100%; z-index:1000;}
	.quickmenus{background:#fff; padding:15px; list-style:none; position:relative; top:15%; margin:auto; width:350px; border-radius:5px; text-align:center; }
	.quickmenus li{padding:0; margin:0;}
	.quickmenus li{ padding:10px; margin-bottom:5px; background:#eee; border-radius:5px;}
</style>
	
<div class="quickmenusbg" style="display:none;">
<ul class="quickmenus">
<li><a href="javascript:;" id="jqRMS">ROOMS</a></li>
<li><a href="javascript:;" id="jqAG">ADD GUEST</a></li>
<li><a href="javascript:;">CHECK IN/OUT</a></li>
<li><a href="javascript:;">APPEND ORDER</a></li>
<li><a href="javascript:;">PRINT INVOICE</a></li>
<HR />
<!--<li><a href="index.php">EXIT QUICK MODE</a></li>-->
<li><a href="javascript:;" id="exitFMmenu">EXIT</a></li>
</ul>
</div>
<script>
var globalroomid;
</script>