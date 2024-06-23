<?php
$syncUrl = ($OffServerSyncUrl != '')?$OffServerSyncUrl:"";
?>
<script>
var watchNext = null, Nexti = 1;
$(document).ready(function($){
var SyncNote = function(m){
	$("#syncnote").prepend(m+'<br>');
}
    ///// Addclient /////////////
	working1 = false;
    var doSync1 = function(){
        if ( working1 ) { return; }
        working1 = true; 
        $.post("<?php echo $syncUrl.'?t=ac'; ?>",{},function(ret1){ 
		if(ret1 == '1'){ working1 = false; SyncNote("Client records synced."); 
		}else if(ret1 == '2'){ working1 = false; 
		}else{working1 = false;} 
		watchNext = ret1; 
		});
    }
	///// addbar /////////////
	working2 = false;
    var doSync2 = function(){
        if ( working2 ) { return; }
        working2 = true;
        $.post("<?php echo $syncUrl.'?t=ab'; ?>",{},function(ret2){ if(ret2 == '1'){ working2 = false; SyncNote("Bar records synced."); }else if(ret2 == '2'){ working2 = false; }else{working2 = false;} 
		watchNext = ret2; });
    }
	///// addbar2 /////////////
	working3 = false;
    var doSync3 = function(){
        if ( working3 ) { return; }
        working3 = true;
        $.post("<?php echo $syncUrl.'?t=ab2'; ?>",{},function(ret3){ if(ret3 == '1'){ working3 = false; SyncNote("Pool Bar records synced."); }else if(ret3 == '2'){ working3 = false; }else{working3 = false;} 
		watchNext = ret3; });
    }
	///// addcab /////////////
	working4 = false;
    var doSync4 = function(){
        if ( working4 ) { return; }
        working4 = true;
        $.post("<?php echo $syncUrl.'?t=acab'; ?>",{},function(ret4){ if(ret4 == '1'){ working4 = false; SyncNote("Cab records synced."); }else if(ret4 == '2'){ working4 = false; }else{working4 = false;} 
		watchNext = ret4; });
    }
	///// addlaundary /////////////
	working5 = false;
    var doSync5 = function(){
        if ( working5 ) { return; }
        working5 = true;
        $.post("<?php echo $syncUrl.'?t=alau'; ?>",{},function(ret5){ if(ret5 == '1'){ working5 = false; SyncNote("Laundry records synced."); }else if(ret5 == '2'){ working5 = false; }else{working5 = false;} 
		watchNext = ret5; });
    }
	///// addresturant /////////////
	working6 = false;
    var doSync6 = function(){
        if ( working6 ) { return; }
        working6 = true;
        $.post("<?php echo $syncUrl.'?t=ares'; ?>",{},function(ret6){ if(ret6 == '1'){ working6 = false; SyncNote("Restaurant records synced."); }else if(ret6 == '2'){ working6 = false; }else{working6 = false;} 
		watchNext = ret6; });
    }
	///// addroom /////////////
	working7 = false;
    var doSync7 = function(){
        if ( working7 ) { return; }
        working7 = true;
        $.post("<?php echo $syncUrl.'?t=arm'; ?>",{},function(ret7){ if(ret7 == '1'){ working7 = false; SyncNote("Room records synced."); }else if(ret7 == '2'){ working7 = false; }else{working7 = false;} 
		watchNext = ret7; });
    }
	///// addroomfacility /////////////
	working8 = false;
    var doSync8 = function(){
        if ( working8 ) { return; }
        working8 = true;
        $.post("<?php echo $syncUrl.'?t=armfac'; ?>",{},function(ret8){ if(ret8 == '1'){ working8 = false; SyncNote("Room Facilities records synced."); }else if(ret8 == '2'){ working8 = false; }else{working8 = false;}
		watchNext = ret8; });
    }
	///// addspa /////////////
	working9 = false;
    var doSync9 = function(){
        if ( working9 ) { return; }
        working9 = true;
        $.post("<?php echo $syncUrl.'?t=aspa'; ?>",{},function(ret9){ if(ret9 == '1'){ working9 = false; SyncNote("SPA records synced."); }else if(ret9 == '2'){ working9 = false; }else{working9 = false;} 
		watchNext = ret9; });
    }
	///// addsport /////////////
	working10 = false;
    var doSync10 = function(){
        if ( working10 ) { return; }
        working10 = true;
        $.post("<?php echo $syncUrl.'?t=aspo'; ?>",{},function(ret10){ if(ret10 == '1'){ working10 = false; SyncNote("Sport records synced."); }else if(ret10 == '2'){ working10 = false; }else{working10 = false;} 
		watchNext = ret10; });
    }
	///// addswimpool /////////////
	working11 = false;
    var doSync11 = function(){
        if ( working11 ) { return; }
        working11 = true;
        $.post("<?php echo $syncUrl.'?t=aswi'; ?>",{},function(ret11){ if(ret11 == '1'){ working11 = false; SyncNote("Swimming pool records synced."); }else if(ret11 == '2'){ working11 = false; }else{working11 = false;} 
				watchNext = ret11; });
    }
	///// barrequest /////////////
	working12 = false;
    var doSync12 = function(){
        if ( working12 ) { return; }
        working12 = true;
        $.post("<?php echo $syncUrl.'?t=abr'; ?>",{},function(ret12){ if(ret12 == '1'){ working12 = false; SyncNote("Bar request records synced."); }else if(ret12 == '2'){ working12 = false; }else{working12 = false;} 
		watchNext = ret12; });
    }
	///// none /////////////
	var doSync13 = function(){
        watchNext = 1;
    }
	///// ewallet /////////////
	working14 = false;
    var doSync14 = function(){
        if ( working14 ) { return; }
        working14 = true;
        $.post("<?php echo $syncUrl.'?t=aew'; ?>",{},function(ret14){ if(ret14 == '1'){ working14 = false; SyncNote("e-Wallet records synced."); }else if(ret14 == '2'){ working14 = false; }else{working14 = false;} 
		watchNext = ret14; });
    }
	///// expenditure /////////////
	working15 = false;
    var doSync15 = function(){
        if ( working15 ) { return; }
        working15 = true;
        $.post("<?php echo $syncUrl.'?t=aexp'; ?>",{},function(ret15){ if(ret15 == '1'){ working15 = false; SyncNote("Expenditure records synced."); }else if(ret15 == '2'){ working15 = false; }else{working15 = false;}
		 watchNext = ret15; });
    }
	///// gym /////////////
	working16 = false;
    var doSync16 = function(){
        if ( working16 ) { return; }
        working16 = true;
        $.post("<?php echo $syncUrl.'?t=agym'; ?>",{},function(ret16){ if(ret16 == '1'){ working16 = false; SyncNote("Gym records synced."); }else if(ret16 == '2'){ working16 = false; }else{working16 = false;} 
		watchNext = ret16; });
    }
	///// gym1 /////////////
	working17 = false;
    var doSync17 = function(){
        if ( working17 ) { return; }
        working17 = true;
        $.post("<?php echo $syncUrl.'?t=agym1'; ?>",{},function(ret17){ if(ret17 == '1'){ working17 = false; SyncNote("Gym 2 records synced."); }else if(ret17 == '2'){ working17 = false; }else{working17 = false;} 
		watchNext = ret17; });
    }
	///// gymdurations /////////////
	working18 = false;
    var doSync18 = function(){
        if ( working18 ) { return; }
        working18 = true;
        $.post("<?php echo $syncUrl.'?t=agymd'; ?>",{},function(ret18){ if(ret18 == '1'){ working18 = false; SyncNote("Gym Duration records synced."); }else if(ret18 == '2'){ working18 = false; }else{working18 = false;} 
		 watchNext = ret18; });
    }
	///// gympayments /////////////
	working19 = false;
    var doSync19 = function(){        
		if ( working19 ) { return; }
        working19 = true;
        $.post("<?php echo $syncUrl.'?t=agymp'; ?>",{},function(ret19){ if(ret19 == '1'){ working19 = false; SyncNote("Gym payment records synced."); }else if(ret19 == '2'){ working19 = false; }else{working19 = false;} 
		watchNext = ret19; });
		//watchNext = 1;
    }
	///// orders /////////////
	working20 = false;
    var doSync20 = function(){
        if ( working20 ) { return; }
        working20 = true;
        $.post("<?php echo $syncUrl.'?t=aord'; ?>",{},function(ret20){ if(ret20 == '1'){ working20 = false; SyncNote("Order records synced."); }else if(ret20 == '2'){ working20 = false; }else{working20 = false;} 
		watchNext = ret20; });
    }
	///// order_bar /////////////
	working21 = false;
    var doSync21 = function(){
        if ( working21 ) { return; }
        working21 = true;
        $.post("<?php echo $syncUrl.'?t=aordb'; ?>",{},function(ret21){ if(ret21 == '1'){ working21 = false; SyncNote("Bar order records synced."); }else if(ret21 == '2'){ working21 = false; }else{working21 = false;} 
		watchNext = ret21; });
    }
	///// order_bar2 /////////////
	working22 = false;
    var doSync22 = function(){
        if ( working22 ) { return; }
        working22 = true;
        $.post("<?php echo $syncUrl.'?t=aordb2'; ?>",{},function(ret22){ if(ret22 == '1'){ working22 = false; SyncNote("Pool bar order records synced."); }else if(ret22 == '2'){ working22 = false; }else{working22 = false;}
		 	watchNext = ret22;
		});
    }
	///// order_laundary /////////////
	working23 = false;
    var doSync23 = function(){
        if ( working23 ) { return; }
        working23 = true;
        $.post("<?php echo $syncUrl.'?t=aordlau'; ?>",{},function(ret23){ if(ret23 == '1'){ working23 = false; SyncNote("Laundry order records synced."); }else if(ret23 == '2'){ working23 = false; }else{working23 = false;}
		  watchNext = ret23; });
    }
	///// order_restaurant /////////////
	working24 = false;
    var doSync24 = function(){
        if ( working24 ) { return; }
        working24 = true;
        $.post("<?php echo $syncUrl.'?t=aordres'; ?>",{},function(ret24){ if(ret24 == '1'){ working24 = false; SyncNote("Restaurant order records synced."); }else if(ret24 == '2'){ working24 = false; }else{working24 = false;}
		 watchNext = ret24; });
    }
	///// order_room /////////////
	working25 = false;
    var doSync25 = function(){
        if ( working25 ) { return; }
        working25 = true;
        $.post("<?php echo $syncUrl.'?t=aordrm'; ?>",{},function(ret25){ if(ret25 == '1'){ working25 = false; SyncNote("Room order records synced."); }else if(ret25 == '2'){ working25 = false; }else{working25 = false;} 
		watchNext = ret25; });
    }
	///// order_spa /////////////
	working26 = false;
    var doSync26 = function(){
        if ( working26 ) { return; }
        working26 = true;
        $.post("<?php echo $syncUrl.'?t=aordspa'; ?>",{},function(ret26){ if(ret26 == '1'){ working26 = false; SyncNote("SPA order records synced."); }else if(ret26 == '2'){ working26 = false; }else{working26 = false;} 
		watchNext = ret26; });
    }
	///// order_sportitem /////////////
	working27 = false;
    var doSync27 = function(){
        if ( working27 ) { return; }
        working27 = true;
        $.post("<?php echo $syncUrl.'?t=aordspo'; ?>",{},function(ret27){ if(ret27 == '1'){ working27 = false; SyncNote("Sport order records synced."); }else if(ret27 == '2'){ working27 = false; }else{working27 = false;} 
		watchNext = ret27; });
    }
	///// order_swimpool /////////////
	working28 = false;
    var doSync28 = function(){
        if ( working28 ) { return; }
        working28 = true;
        $.post("<?php echo $syncUrl.'?t=aordswi'; ?>",{},function(ret28){ if(ret28 == '1'){ working28 = false; SyncNote("Swimming pool order records synced."); }else if(ret28 == '2'){ working28 = false; }else{working28 = false;} 
		watchNext = ret28; });
    }
	///// paycab /////////////
	working29 = false;
    var doSync29 = function(){
        if ( working29 ) { return; }
        working29 = true;
        $.post("<?php echo $syncUrl.'?t=apay'; ?>",{},function(ret29){ if(ret29 == '1'){ working29 = false; SyncNote("Cab payment records synced."); }else if(ret29 == '2'){ working29 = false; }else{working29 = false;} 
		watchNext = ret29; });
    }
	///// roompictures /////////////
	working30 = false;
    var doSync30 = function(){
        if ( working30 ) { return; }
        working30 = true;
        $.post("<?php echo $syncUrl.'?t=armpic'; ?>",{},function(ret30){ if(ret30 == '1'){ working30 = false; SyncNote("Room picture records synced."); }else if(ret30 == '2'){ working30 = false; }else{working30 = false;}  
		watchNext = ret30; });
    }
	
	
	///// settings /////////////
	//working31 = false;
    var doSync31 = function(){
        //if ( working31 ) { return; }
        //working31 = true;
        //$.post("<?php //echo $syncUrl.'?t=aset'; ?>",{},function(ret31){ if(ret31 == '1'){ working31 = false; SyncNote("Settings synced."); }else if(ret31 == '2'){ working31 = false; }else{working31 = false;} 
		watchNext = 1; //ret31; 
		//});
    }
	///// tablenos /////////////
	working32 = false;
    var doSync32 = function(){
        if ( working32 ) { return; }
        working32 = true;
        $.post("<?php echo $syncUrl.'?t=atblno'; ?>",{},function(ret32){ if(ret32 == '1'){ working32 = false; SyncNote("Table number records synced."); }else if(ret32 == '2'){ working32 = false; }else{working32 = false;}
		 watchNext = ret32; });
    }
	///// tblcategory /////////////
	working33 = false;
    var doSync33 = function(){
        if ( working33 ) { return; }
        working33 = true;
        $.post("<?php echo $syncUrl.'?t=atblcat'; ?>",{},function(ret33){ if(ret33 == '1'){ working33 = false; SyncNote("Categories synced."); }else if(ret33 == '2'){ working33 = false; }else{working33 = false;} 
		watchNext = ret33; });
    }
	///// tblcompany /////////////
	working34 = false;
    var doSync34 = function(){
        if ( working34 ) { return; }
        working34 = true;
        $.post("<?php echo $syncUrl.'?t=atblcom'; ?>",{},function(ret34){ if(ret34 == '1'){ working34 = false; SyncNote("Company records synced."); }else if(ret34 == '2'){ working34 = false; }else{working34 = false;} 
		watchNext = ret34; });
    }
	///// tblingredients /////////////
	working35 = false;
    var doSync35 = function(){
        if ( working35 ) { return; }
        working35 = true;
        $.post("<?php echo $syncUrl.'?t=atbling'; ?>",{},function(ret35){ if(ret35 == '1'){ working35 = false; SyncNote("Ingredient records synced."); }else if(ret35 == '2'){ working35 = false; }else{working35 = false;} 
		watchNext = ret35; });
    }
	///// tblinstruct /////////////
	working36 = false;
    var doSync36 = function(){
        if ( working36 ) { return; }
        working36 = true;
        $.post("<?php echo $syncUrl.'?t=atblins'; ?>",{},function(ret36){ if(ret36 == '1'){ working36 = false; SyncNote("Instruction records synced."); }else if(ret36 == '2'){ working36 = false; }else{working36 = false;} 
		watchNext = ret36; });
    }
	///// tblmcardreason /////////////
	working37 = false;
    var doSync37 = function(){
        if ( working37 ) { return; }
        working37 = true;
        $.post("<?php echo $syncUrl.'?t=atblmc'; ?>",{},function(ret37){ if(ret37 == '1'){ working37 = false; }else if(ret37 == '2'){ working37 = false; }else{working37 = false;} 
		watchNext = ret37; });
    }
	///// tblrestock /////////////
	working38 = false;
    var doSync38 = function(){
        if ( working38 ) { return; }
        working38 = true;
        $.post("<?php echo $syncUrl.'?t=atblresto'; ?>",{},function(ret38){ if(ret38 == '1'){ working38 = false; SyncNote("Stock records synced."); }else if(ret38 == '2'){ working38 = false; }else{working38 = false;} 
		watchNext = ret38; });
    }
	///// tblschedule /////////////
	working39 = false;
    var doSync39 = function(){
        if ( working39 ) { return; }
        working39 = true;
        $.post("<?php echo $syncUrl.'?t=atblsche'; ?>",{},function(ret39){ if(ret39 == '1'){ working39 = false; SyncNote("Schedule records synced."); }else if(ret39 == '2'){ working39 = false; }else{working39 = false;} 
		watchNext = ret39; });
    }
	///// tblshifts /////////////
	working40 = false;
    var doSync40 = function(){
        if ( working40 ) { return; }
        working40 = true;
        $.post("<?php echo $syncUrl.'?t=atblshi'; ?>",{},function(ret40){ if(ret40 == '1'){ working40 = false; SyncNote("Shift records synced."); }else if(ret40 == '2'){ working40 = false; }else{working40 = false;} 
		watchNext = ret40; });
    }
	///// tblstore /////////////
	working41 = false;
    var doSync41 = function(){
        if ( working41 ) { return; }
        working41 = true;
        $.post("<?php echo $syncUrl.'?t=atblstore'; ?>",{},function(ret41){ if(ret41 == '1'){ working41 = false; SyncNote("Store records synced."); }else if(ret41 == '2'){ working41 = false; }else{working41 = false;} 
		watchNext = ret41; });
    }
	///// tblstorehistory /////////////
	working42 = false;
    var doSync42 = function(){
        if ( working42 ) { return; }
        working42 = true;
        $.post("<?php echo $syncUrl.'?t=atblstoreh'; ?>",{},function(ret42){ if(ret42 == '1'){ working42 = false; SyncNote("Store histories synced."); }else if(ret42 == '2'){ working42 = false; }else{working42 = false;} 
		watchNext = ret42; });
    }
	///// tblstoretransfer /////////////
	working43 = false;
    var doSync43 = function(){
        if ( working43 ) { return; }
        working43 = true;
        $.post("<?php echo $syncUrl.'?t=atblstoret'; ?>",{},function(ret43){ if(ret43 == '1'){ working43 = false; SyncNote("Store transfer table synced."); }else if(ret43 == '2'){ working43 = false; }else{working43 = false;}
		 watchNext = ret43; });
    }
	///// users /////////////
	working44 = false;
    var doSync44 = function(){
        if ( working44 ) { return; }
        working44 = true;
        $.post("<?php echo $syncUrl.'?t=ausr'; ?>",{},function(ret44){ if(ret44 == '1'){ working44 = false; SyncNote("User records synced."); }else if(ret44 == '2'){ working44 = false; }else{working44 = false;} 
		watchNext = ret44; });
    }
	///// waiters /////////////
	working45 = false;
    var doSync45 = function(){
        if ( working45 ) { return; }
        working45 = true;
        $.post("<?php echo $syncUrl.'?t=awai'; ?>",{},function(ret45){ if(ret45 == '1'){ working45 = false; SyncNote("Waiter records synced."); }else if(ret45 == '2'){ working45 = false; }else{working45 = false;} 
		watchNext = ret45; });
    }
	
	///////////////////////
	var functions = {1: doSync1,2: doSync2,3: doSync3,4: doSync4,5: doSync5,6: doSync6,7: doSync7,8: doSync8,9: doSync9,10: doSync10,11: doSync11,12: doSync12,13: doSync13,14: doSync14,15: doSync15,16: doSync16,17: doSync17,18: doSync18,19: doSync19,20: doSync20,21: doSync21,22: doSync22,23: doSync23,24: doSync24,25: doSync25,26: doSync26,27: doSync27,28: doSync28,29: doSync29,30: doSync30,31: doSync31,32: doSync32,33: doSync33,34: doSync34,35: doSync35,36: doSync36,37: doSync37,38: doSync38,39: doSync39,40: doSync40,41: doSync41,42: doSync42,43: doSync43,44: doSync44,45: doSync45};
	if(StartSync){
	window.setInterval(function(){
			if(watchNext == null){
				watchNext = 0; 
				SyncNote("Syncing recordset "+Nexti+"...");
				functions[Nexti]();
				Nexti += 1;
			}else if(watchNext > 0 && Nexti < 46){
				watchNext = 0; 
				SyncNote("Syncing recordset "+Nexti+"...");
				functions[Nexti]();
				Nexti += 1;
			}else if(Nexti > 45){
				Nexti = 1;
				watchNext = null;
			}
			//SyncNote("Synchronizing...");
	}, 5000);
	}else{
		SyncNote("Synchronization closed...");
	}
});
</script>