<script>
var elem = document.documentElement;

function openFullscreen() {
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.mozRequestFullScreen) { /* Firefox */
    elem.mozRequestFullScreen();
  } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari and Opera */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE/Edge */
    elem.msRequestFullscreen();
  }
}

function closeFullscreen() {
  if (document.exitFullscreen) {
    document.exitFullscreen();
  } else if (document.mozCancelFullScreen) {
    document.mozCancelFullScreen();
  } else if (document.webkitExitFullscreen) {
    document.webkitExitFullscreen();
  } else if (document.msExitFullscreen) {
    document.msExitFullscreen();
  }
}

$(document).ready(function(){
	var fmodeflag = false;
	
	/*
	setInterval(function(){
		if(fmodeflag){ openFullscreen(); }
	},100);
	 */
	
	$("#fmodeclick").on("click",function(){
		if(!fmodeflag){
			openFullscreen();
			$("#fmodeclick").html('<a href="javascript:closeFullscreen();"><i class="fa fa-sign-out"></i> EXIT FULLSCREEN</a>');
			fmodeflag = true;
		}else{
			closeFullscreen();
			$("#fmodeclick").html('<a href="javascript:openFullscreen();"><i class="fa fa-sign-out"></i> FULLSCREEN</a>');
			fmodeflag = false;
		}
	});
	
	$("#exitFMmenu").on("click",function(){
		$(".quickmenusbg").hide(300);
	});
	
	$("#fmodemenu").on("click",function(){
		$(".quickmenusbg").show(300);
	});
	
	$("#jqAG").on("click",function(){
		$(".quickmenusbg").hide(300);
		$("#containerRooms").hide(300);
		$("#containerCheckroom2").hide(300);
		$("#containerCheckRoom").hide(300);
		$("#containerAddGuest").show(300);
		fmpagetitle('ADD NEW GUEST');
	});
	
	$("#jqRMS").on("click",function(){
		$(".quickmenusbg").hide(300);
		$("#containerAddGuest").hide(300);
		$("#containerCheckroom2").hide(300);
		$("#containerCheckroom").hide(300);
		$("#containerRooms").show(300);
		fmpagetitle('ROOMS');
	});
	
	$(".jqCRM-new").on("click",function(){
		var timestamp = new Date().getTime();
		var newinvoice = timestamp.toString().substring(0,10);
		globalroomid = $(this).attr("id");
		globalroomname = $('h3').html();
		$(".quickmenusbg").hide(300);
		$("#containerAddGuest").hide(300);
		$("#containerRooms").hide(300);
		$("#containerCheckroom2").hide(300);
		$("#containerCheckroom").show(300);
		fmpagetitle(globalroomname+' - INVOICE: '+newinvoice);
	});
	
	$(".jqCRM").on("click",function(){
		globalroomid = $(this).attr("id");
		$(".quickmenusbg").hide(300);
		$("#containerAddGuest").hide(300);
		$("#containerRooms").hide(300);
		$("#containerCheckroom").hide(300);
		$("#containerCheckroom2").show(300);
		fmpagetitle('ROOM '+globalroomid+' - Occupied');
	});
	
});

//document.getElementById("fmodeclick").addEventListener("click", function(){ 
//});

function fmpagetitle(txt){
	if(txt == ''){
	txt = 'ROOMS';
	}
	$("#fm-pagetitle").html(txt);
}
</script>
<?php
mysqli_free_result();
?>