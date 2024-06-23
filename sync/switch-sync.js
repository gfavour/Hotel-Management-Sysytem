StartSync = false;
var SetReSync2 = function(){
	localStorage.setItem("dosync",'1'); StartSync = true; SetSwitchChk(true); 
	popupsync('../sync/index.php','','');
}

var SetSync = function(){
	var isChkBtn = document.getElementById("switchchk").checked;
	if(isChkBtn){ 
		localStorage.setItem("dosync",'1'); StartSync = true; SetSwitchChk(true); 
		popupsync('../sync/index.php','','');
	}else if(!isChkBtn){ 
		localStorage.setItem("dosync",'0'); StartSync = false; SetSwitchChk(false); 
	}
	//window.location.reload();
}

var GetSync = function(){
	var dosync = localStorage.getItem("dosync");
	if(dosync == '1'){ 
		StartSync = true; SetSwitchChk(true); return true; 
		//popupsync('../sync/index.php','','');
	}else if(dosync == '0'){ StartSync = false; SetSwitchChk(false); return false;
	}else{ localStorage.setItem("dosync","0"); StartSync = false; SetSwitchChk(false); return false; }
}
var SetSwitchChk = function(c){
	document.getElementById("switchchk").checked = c;
}
//var windows = {};
function popupsync(u,w,h) {
	   if (w == ''){w="width=600";}else{w="width="+w;}
	   if (h == ''){h="height=580";}else{h="height="+h;}
	   if (u == ''){u='../404.html';}
	  var winx = window.open(u,"winsync",w+","+h+",top=50,left=300,fullscreen=0,location=0,scrollbars=yes,resizable=yes,titlebar=0,toolbar=0,status=0,standard=0,menubar=0");
	  //windows["winsync"] = winx;
	  winx.focus();
}

function ReSync(){
	//StartSync = false;
	//SendByAjax('dwat=resync','../fxn/process1.php','');
	SetSync();
}
GetSync();