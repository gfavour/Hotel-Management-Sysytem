$(document).ready(function() {

/*************** Real Cross Broswer Ajax JQuery Upload **************/

 function getDoc(frame) {
     var doc = null;
     try {
         if (frame.contentWindow) {
             doc = frame.contentWindow.document;
         }
     } catch(err) {
     }

     if (doc) { // successful getting content
         return doc;
     }

     try { // simply checking may throw in ie8 under ssl or mismatched protocol
         doc = frame.contentDocument ? frame.contentDocument : frame.document;
     } catch(err) {
         // last attempt
         doc = frame.document;
     }
     return doc;
 }

function goform(e,f){
	loading(1);
	var formObj = $(f); //this
	var formURL = formObj.attr("action");
	
if(window.FormData !== undefined) {
	var formData = new FormData(f); //this
		//alert('morning');
		$.ajax({
        	url: formURL,
	        type: 'POST',
			crossOrigin: true,
			data:  formData,
			mimeType:"multipart/form-data",
			contentType: false,
    	    cache: false,
        	processData:false,
			success: function(data, textStatus, jqXHR) {
				loading(0);
				res = data.split("<->");
				data = res[0];
				//alert(data);
				if(data == "RoomFacilityAdded"){
						window.location.href = '?m=New room facility added';
				
				}else if(data == "RoomFacilityUpdated"){
						window.location.href = 'manage-room-facilities.php?m=Room facility updated';
				
				}else if(data == "RETURNSUC"){
						window.location.href = 'returnitems.php?m=Item successfully returned';
				
				}else if(data == "RETURNSUC2"){
						window.location.href = 'returnitems2.php?m=Item successfully returned';
				
				}else if(data == "NewGuestAdded"){
						window.location.href = '?m=New guest added';
				}else if(data == "NewGuestUpdated"){
						window.location.href = 'manage-guests.php?m=Guest updated.';
						
				}else if(data == 'ALoggedin' || data == 'SLoggedin'){
				
				}else if(data == "NRSA"){
						window.location.href = '?m=New Room Successfully added';
				}else if(data == "RSE"){
						window.location.href = 'manage-rooms.php?m=Room updated.';
				}else if(data == "NewResturantAdded"){
						window.location.href = '?m=New restuarant item added';
				}else if(data == "NewResturantUpdated"){
						window.location.href = 'manage-resturant.php?m=Restuarant item updated.';
				}else if(data == "NewLaundryAdded"){
						window.location.href = '?m=New laundry service added';
				}else if(data == "NewLaundryUpdated"){
						window.location.href = 'manage-laundry.php?m=Laundry service updated.';
				
				}else if(data == "NewCategoryAdded"){
						window.location.href = 'manage-category.php?m=New category added.';
						
				}else if(data == "NewUserAdded"){
						window.location.href = '?m=User added';
				}else if(data == "UsersAdded"){
						window.location.href = '?m=New staff successfully added';
				}else if(data == "NewUserAdded"){
						window.location.href = 'manage-staff.php?m=User added';
				
				}else if(data == "STORE2BARADDED"){
						window.location.href = 'store.php?m=New item has been successfully added to bar from store.';
				
				}else if(data == "STORE2BARUPDATED"){
						window.location.href = 'store.php?m=Specified quantity of Item has been successfully added to bar item.';
				
				}else if(data == "NewDeptUpdated"){
						window.location.href = 'departments.php?m=Department updated';
				
				}else if(data == "NewBarAdded"){
						window.location.href = '?m=New bar item added';
						
				}else if(data == "NewStoreAdded"){
						window.location.href = '?m=New item successfully added to store';
				
				}else if(data == "NewStoreUpdated"){
						window.location.href = 'store.php?m=item successfully updated.';
						
				}else if(data == "NewBarUpdated"){
						window.location.href = 'manage-bar.php?m=Bar item updated.';
				
				}else if(data == "NewBar2Updated"){
						window.location.href = 'manage-bar2.php?m=Bar item updated.';
				
				}else if(data == "RestockBarUpdated"){
						window.location.href = 'manage-bar.php?m=bar item re-stocked';
				
				}else if(data == "RestockBar2Updated"){
						window.location.href = 'manage-bar2.php?m=bar item re-stocked';
				
				}else if(data == "NewSportAdded"){
						window.location.href = '?m=New sport item added';
				}else if(data == "NewSportUpdated"){
						window.location.href = 'manage-sport.php?m=Sport item updated.';
				
				}else if(data == "NewSwimpoolAdded"){
						window.location.href = '?m=New swimming pool service added';
						
				}else if(data == "NewSwimpoolUpdated"){
						window.location.href = 'manage-swimpool.php?m=Swimming pool service updated.';
				
				}else if(data == "NewSpaAdded"){
						window.location.href = '?m=New spa service added';
				}else if(data == "NewSpaUpdated"){
						window.location.href = 'manage-spa.php?m=Spa service updated.';
				}else if(data == "SavedSuccessfully"){
						window.location.href = 'settings.php?m=Setting Saved Succesfully.';
				}else if(data == "OSA"){
						window.location.href = '?m=Order successfully added&clientid='+res[1];
				
				}else if(data == "OSARC"){ //$(\'#cmdclearcart\').click()
						showalert('Order successfully added on invoice no '+res[2]+'<br><a href="javascript:$(\'#cmdclearcart\').click(); var wi = window.open(\'ores-invoice-pos.php?printer=pos&invoiceid='+res[2]+'\',\'winreceipt\',\'width=500,height=300,toolbar=no,address=no,scrollbar=no\');wi.focus();" class="btn btn-sm btn-success" style="text-decoration:none;">PRINT RECEIPT</a>',"success");
				
				}else if(data == "WOSABC"){
						showalert('Order successfully submitted with invoice no '+res[2]+'<br>Meet the bar man to take your order and receipt.',"success");
				
				}else if(data == "WOSABC2"){
						showalert('Order successfully submitted with invoice no '+res[2]+'<br>Meet the bar man to take your order and receipt.',"success");
				}else if(data == "WOSABC3"){
						showalert('Order successfully submitted with invoice no '+res[2]+'<br>Meet the bar man to take your order and receipt.',"success");
						
				}else if(data == "OSABC"){ //$(\'#cmdclearcart\').click()
						showalert('Order successfully added on invoice no '+res[2]+'<br><a href="javascript:$(\'#cmdclearcart\').click(); var wi = window.open(\'obar-invoice-pos.php?printer=pos&invoiceid='+res[2]+'\',\'winreceipt\',\'width=500,height=300,toolbar=no,address=no,scrollbar=no\');wi.focus();" class="btn btn-sm btn-success" style="text-decoration:none;">PRINT RECEIPT</a>',"success");
				
				}else if(data == "OSABC2"){ //$(\'#cmdclearcart\').click()
						showalert('Order successfully added on invoice no '+res[2]+'<br><a href="javascript:$(\'#cmdclearcart\').click(); var wi = window.open(\'obar2-invoice-pos.php?printer=pos&invoiceid='+res[2]+'\',\'winreceipt\',\'width=500,height=300,toolbar=no,address=no,scrollbar=no\');wi.focus();" class="btn btn-sm btn-success" style="text-decoration:none;">PRINT RECEIPT</a>',"success");
				
				}else if(data == "OSABC3"){ 
						showalert('Order successfully added on invoice no '+res[2]+'<br><a href="javascript:$(\'#cmdclearcart\').click(); var wi = window.open(\'obar3-invoice-pos.php?printer=pos&invoiceid='+res[2]+'\',\'winreceipt\',\'width=500,height=300,toolbar=no,address=no,scrollbar=no\');wi.focus();" class="btn btn-sm btn-success" style="text-decoration:none;">PRINT RECEIPT</a>',"success");
				
				}else if(data == "OSASP"){
						showalert('Swimming pool service successfully ordered. Invoice ID '+res[2]+'<br><a href="javascript:var wi = window.open(\'obar-invoice-pos.php?printer=pos&invoiceid='+res[2]+'\',\'winreceipt\',\'width=500,height=300,toolbar=no,address=no,scrollbar=no\');wi.focus();" class="btn btn-sm btn-success" style="text-decoration:none;">PRINT RECEIPT</a>',"success");
				
				}else if(data == "OSASP2"){
						showalert('Swimming pool service successfully ordered. Invoice ID '+res[2]+'<br><a href="javascript:var wi = window.open(\'obar2-invoice-pos.php?printer=pos&invoiceid='+res[2]+'\',\'winreceipt\',\'width=500,height=300,toolbar=no,address=no,scrollbar=no\');wi.focus();" class="btn btn-sm btn-success" style="text-decoration:none;">PRINT RECEIPT</a>',"success");
				
				}else if(data == "NewWaiterAdded"){
						window.location.href = '?m=Waiter name/number was successfully added';
				}else if(data == "WaiterUpdated"){
						window.location.href = 'waiters.php?m=Waiter name/number successfully updated';
				
				}else if(data == "NewtblNosAdded"){
						window.location.href = '?m=Table name/number was successfully added';
				}else if(data == "tblNoUpdated"){
						window.location.href = 'manage-tablenos.php?m=Table name/number successfully updated';
				}else if(data == "OSAR"){
						window.location.href = 'manage-inout-grid.php?m=Order successfully added';
				}else if(data == "OSAF"){
						window.location.href = '?m=Free service successfully added&clientid='+res[1];
				}else if(data == "OSU"){
						window.location.href = '?m=Order successfully appended&clientid='+res[1]+'&invoiceid='+res[2];	
				}else if(data == "GYMREG"){
					window.location.href = '?m=You have successfully submit new gym membership application form.';
				}else if(data == "GYMRENEW"){
					window.location.href = 'gympayments.php?m=You have successfully renew a membership account.';
				}else if(data == "NewExpensesAdded"){
					window.location.href = '?m=New Expenses successfully added.';
				}else if(data == "NewBarRequestAdded"){
					window.location.href = '?m=New Bar Request successfully added.';
				}else if(data == "NewSchedulAdded"){
					window.location.href = '?m=New room reservation successfully added.';
				}else{	//alert('mammy'+data); 
					showalert(data,"danger");
					//showmodal(data,"Warning!","#c00");RSE
				}
		    },
		  	error: function(jqXHR, textStatus, errorThrown) {
				loading(0);
				showalert("Error: "+errorThrown,"danger");			
	    	}  
			      
	   });
        e.preventDefault();
   }else{ 
		var iframeId = 'unique' + (new Date().getTime());
		var iframe = $('<iframe src="javascript:false;" name="'+iframeId+'" />');
		iframe.hide();
		formObj.attr('target',iframeId);
		iframe.appendTo('body');
		iframe.load(function(e)
		{
			var doc = getDoc(iframe[0]);
			var docRoot = doc.body ? doc.body : doc.documentElement;
			var data = docRoot.innerHTML;
					if(data == "RoomFacilityAdded"){
						window.location.href = '?m=New room facility added';
					}else if(data == "NRSA"){
						window.location.href = '?m=New Room Successfully added';
					}else{
						showalert(errorThrown,"danger");		
					}
		});
	
	}


}

$("#frm1").submit(function(e){ goform(e,this); });
$("#frm2").submit(function(e){ goform(e,this); });
$("#frm3").submit(function(e){ goform(e,this); });
$("#frm4").submit(function(e){ goform(e,this); });

$("#cmdbar").click(function(){ 
 	$("#frm1").submit();    
});

$("#cmdres").click(function(){ 
 	$("#frm1").submit();    
});

$("#cmdsubmit").click(function(){ 
 	if(confirm('Are you sure you want to do this?')){ $("#frm1").submit(); }else{ return false; }
});

/***************End of Form Submit Script ****************************/
//$("#msgbox").delay(10000).slideUp(500);

function ShowPassedMsg(m){
	//#E8FBFF #D9F8FF
	$("#msgbox").css("background-color","#E8FBFF");
	$("#msgbox").html(m).slideDown(500).delay(5000).slideUp(500);
	$("#loader").fadeOut(10);
}

function ShowFailedMsg(m){
	//#FDEEE3
	$("#msgbox").css("background-color","#FDEEE3");
	$("#msgbox").html(m).slideDown(500).delay(5000).slideUp(500);
	$("#loader").fadeOut(10);
}


$(document).on("click",".lcurve",function(){
	var divId = $(this).attr("id");
    $("#bod-" + divId).slideToggle(500);
});

//======= Drag & Drop =========================
$.fn.drags = function(opt) {

        opt = $.extend({handle:"",cursor:"move"}, opt);

        if(opt.handle === "") {
            var $el = this;
        } else {
            var $el = this.find(opt.handle);
        }

        return $el.css('cursor', opt.cursor).on("mousedown", function(e) {
            if(opt.handle === "") {
                var $drag = $(this).addClass('draggable');
            } else {
                var $drag = $(this).addClass('active-handle').parent().addClass('draggable');
            }
            var z_idx = $drag.css('z-index'),
                drg_h = $drag.outerHeight(),
                drg_w = $drag.outerWidth(),
                pos_y = $drag.offset().top + drg_h - e.pageY,
                pos_x = $drag.offset().left + drg_w - e.pageX;
            $drag.css('z-index', 1000).parents().on("mousemove", function(e) {
                $('.draggable').offset({
                    top:e.pageY + pos_y - drg_h,
                    left:e.pageX + pos_x - drg_w
                }).on("mouseup", function() {
                    $(this).removeClass('draggable').css('z-index', z_idx); 
                });
            });
            e.preventDefault(); // disable selection
        }).on("mouseup", function() {
            if(opt.handle === "") {
                $(this).removeClass('draggable');
            } else {
                $(this).removeClass('active-handle').parent().removeClass('draggable');
            }
        });

    }
	
$(".draggable").mousedown(function(){
	id = $(this).attr("id");
	$("#"+id).drags();
});


$("#jqbtn1").click(function(){
	$("#jqdiv1").slideToggle(300);
});
$("#jqbtn2").click(function(){
	$("#jqdiv2").slideToggle(300);
});

$("#divshowhide1").click(function(){
	$("#divshowhide2").slideToggle(200);				   
});

function ButtonText() {
    
}

$("#tItemByObjs").on("click",function(){
	if ($("#itemnamebydd").is(":visible")) {
        $("#tItemByObjs").text('Select Existing Item Name');
    } else {
        $("#tItemByObjs").text('Add New Name');
    }
	$('#itemnamebydd').toggle(500);
	$('#itemnamebytxt').toggle(500);
	/////////////////////
	
});

})
//============ END OF JQUERY ==============================

function showhidePwd(pwd,cpwd){
	if (pwd.type == 'password'){pwd.type = 'text';cpwd.type = 'text';document.getElementById("showhide").innerHTML="Hide Password";}
	else{pwd.type = 'password';cpwd.type = 'password';document.getElementById("showhide").innerHTML="Show Password";}
}


function loading(n){
	if(n == 1){$("#loading").fadeIn(10);}
	else{$("#loading").fadeOut(10);}
}

function popup(h,m,w,l,t){
	loading(0);
	//$("#popup-box #title").fadeIn(10);
	if (h != ''){ $("#popup-box #title").html(h); }
	if (w == ''){ w = '400'; }
	if (l == ''){ l = '30'; }
	if (t == ''){ t = '35'; }
	if (m != ''){
		$("#popup-box #message").html(m);
		$("#popup-box").animate({"display": "block","width": w+"px","left": l+"%","top": "+"+t+"%"},500);
	}
}

function SendByAjax(qrydata,urllink,reloadlink){
	//loading(1);
	$.ajax({
	crossOrigin: true,
    type: "POST",
    url: urllink,
    data: qrydata,
    cache: false,
    success: function(html){
		loading(0);
		res = html.split("<->");//if (res[0] == 'DEPT'){html = res[0];}
		html = res[0];
		if (html == 'deleted'){
    		window.location.href = reloadlink + "?m=Record successfully deleted";
		}else if(html == 'AnonymousCNBD'){
			window.location.href = reloadlink + "?m=Anonymous can not be deleted";
		}else if (html == 'RSYNDONE'){
    		alert(res[1]);
			//SetReSync();		
		}else if (html == 'RoomDetails'){
    		document.frm1.roomrate.value = res[1];
			document.getElementById("roomoutof").innerHTML = 'Out of '+res[2];
			document.frm1.roomleft.value = res[3];
			if (res[3] <= 0){document.getElementById("rmleftgroup").innerHTML = " [Room occupied. No room left.]";}
			else{document.getElementById("rmleftgroup").innerHTML = "";}
			calculate();
		
		}else if (html == 'BarDetails'){
    		document.frm1.barprice.value = res[1];
			document.getElementById("baroutof").innerHTML = 'Out of '+res[2];
			document.frm1.barleft.value = res[3];
			calculatebar();
		
		}else if(html == "RETURNSUC"){
			window.location.href = 'returnitems.php?m=Item successfully returned&invoiceid='+res[1];
				
		}else if (html == 'resDetails'){
    		document.frm1.resprice.value = res[1];
			document.getElementById("resoutof").innerHTML = 'per '+res[2]+' '+res[3];
			calculateres();
		
		}else if (html == 'lauDetails'){
    		document.frm1.lauprice.value = res[1];
			calculatelau();
		
		}else if (html == 'swimpoolDetails'){
    		document.frm1.swimpoolprice.value = res[1];
			document.getElementById("swimpoolmeasure").innerHTML = 'per '+res[2];
			document.getElementById("swimpoolmeasure2").innerHTML = 'per '+res[2];
			document.getElementById("swimpoolhidmeas").innerHTML = res[2];			
			calculateswimpool();
		
		}else if (html == 'spaDetails'){
    		document.frm1.spaprice.value = res[1];
			calculatespa();
		
		}else if (html == 'spoDetails'){
    		document.frm1.spoprice.value = res[1];
			calculatespo();
		
		}else if (html == 'PaidUnpaid'){
			if (res[3] == 'pending'){
				window.location.reload();
			}else{
    			window.location.href = "?invoiceid="+res[1]+"&m="+res[2];
			}
		}else if (html == 'OrderFlagged'){
    		window.location.href = "?invoiceid="+res[1]+"&m="+res[2];
		
		}else if (html == 'doinout'){
    		window.location.href = "?invoiceid="+res[1]+"&m="+res[2];
		
		}else if (html == 'ExpReqApproved'){
    		window.location.href = "?m=Expenses successfully approved";
			
		}else if (html == 'BarReqApproved'){
    		window.location.href = "?m=Request successfully approved";
		
		}else if (html == 'NewShiftOpened'){
    		window.location.reload();
			
		}else if (html == 'NOITEMTOSHIFT'){
    		alert("Open Shift aborted. No item in "+res[1]);
		
		}else if (html == 'XShiftClosed'){
    		window.location = '../logout.php';
			
		}else if (html == 'NOSHIFT2UPDATE'){
    		alert("Operation aborted. Shift to close from "+res[1]+" not found.");
		
		}else{
			showalert(html,"danger");
			//showmodal(html,"Notice","#c00");
		}
	},
	error: function(jqXHR, textStatus, errorThrown) {
			loading(0);
			showmodal(errorThrown,"Error..","#c00");
	    }  
    });
}

function confirmurl(ask,url){
	if(confirm(ask)){
		window.location.href = url;
	}
}

function confirmaction(ask,d,u,r){
	if(confirm(ask)){
		SendByAjax(d,u,r);
	}
}

function confirmdel(d,u,r){
	if(confirm('Are you sure you want to delete?')){
		SendByAjax(d,u,r);
	}
}

function dopay(s,d,u,r){
	if(confirm('Are you sure you want to tag this record as '+s+'?')){
		SendByAjax(d,u,r);
	}
}

function docheck(s,d,u,r){
	if(confirm('Are you sure you want to tag this record as '+s+'?')){
		SendByAjax(d,u,r);
	}
}

function passurl(url,d){//alert(url+'...'+d)
	loaderPopupOn()
    makePOSTRequest(url, d);
}

function showme(d){
	d.style.display = 'block';
}

function hideme(d){
	d.style.display = 'none';
}

function go2(u){
window.location.href = u;	
}

function ifocus(t,i){
	if (i.value == t){i.value = '';}
}

function iblur(t,i){
	if (i.value == ''){i.value = t;}
}

function ifocuspwd(t,i){
	if (i.value == t){i.value = '';i.type='password';}
}
function iblurpwd(t,i){
	if (i.value == ''){i.value = t;i.type='text';}
}

function getsocial(){
  var myselect = document.frm1.store;
  document.getElementById("facebook").value = myselect.options[myselect.selectedIndex].getAttribute('fb');
  document.getElementById("twitter").value = myselect.options[myselect.selectedIndex].getAttribute('tw');
  document.getElementById("googleplus").value = myselect.options[myselect.selectedIndex].getAttribute('gp');
  document.getElementById("linkedin").value = myselect.options[myselect.selectedIndex].getAttribute('li');
}

function StrStartWith (string, prefix) {
    return string.slice(0, prefix.length) == prefix;
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#passport').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$(document).on("change","#passportfile",function(){
    readURL(this);
});

function getOptions(dis,w,f){
	if (w == 'RoomDetails'){
		SendByAjax("roomid=" + dis.value+"&dwat=RoomDetails","../fxn/process1.php",'');
		
	}else if (w == 'BarDetails'){
		SendByAjax("itemid=" + dis.value+"&dwat=BarDetails","../fxn/process1.php",'');
	
	}else if (w == 'resDetails'){
		SendByAjax("itemid=" + dis.value+"&dwat=resDetails","../fxn/process1.php",'');
	
	}else if (w == 'lauDetails'){
		SendByAjax("itemid=" + dis.value+"&dwat=lauDetails","../fxn/process1.php",'');
		
	}else if (w == 'spaDetails'){
		SendByAjax("itemid=" + dis.value+"&dwat=spaDetails","../fxn/process1.php",'');
	
	}else if (w == 'swimpoolDetails'){
		SendByAjax("itemid=" + dis.value+"&dwat=swimpoolDetails","../fxn/process1.php",'');
		
	}else if (w == 'spoDetails'){
		SendByAjax("itemid=" + dis.value+"&dwat=spoDetails","../fxn/process1.php",'');
	
	}
}

function getDiscount(nor,mnor, d){
	if (nor >= mnor){
		document.frm1.discount.value = d;
	}else{
		document.frm1.discount.value = 0;
	}
	calculate();
}

function ShowHideById(id){
	$('#'+id).slideToggle(500);
	var ids = id.split("-");
	var boxid = ids[1];
	var ischecked = document.getElementById(boxid).checked;
	
	//reservation
	
	if (!ischecked && document.getElementById(boxid).value == 'reservation'){
		document.getElementById("room_type").selectedIndex = '0';
		getOptions(document.getElementById("room_type").value,'RoomDetails','../fxn/process1.php');
	}
	
	//bar
	if (!ischecked && document.getElementById(boxid).value == 'bar'){
		document.getElementById("baritem").selectedIndex = '0';
		getOptions(document.getElementById("baritem").value,'BarDetails','../fxn/process1.php');
	}
	
	//restaurant
	if (!ischecked && document.getElementById(boxid).value == 'restaurant'){
		document.getElementById("resitem").selectedIndex = '0';
		getOptions(document.getElementById("resitem").value,'resDetails','../fxn/process1.php');
	}
	
	//swimming pool..tab-swimpool
	if (!ischecked && document.getElementById(boxid).value == 'swimpool'){
		document.getElementById("swimpoolitem").selectedIndex = '0';
		getOptions(document.getElementById("swimpoolitem").value,'swimpoolDetails','../fxn/process1.php');
	}
	
	//laundary
	if (!ischecked && document.getElementById(boxid).value == 'laundary'){
		document.getElementById("lauitem").selectedIndex = '0';
		getOptions(document.getElementById("lauitem").value,'lauDetails','../fxn/process1.php');
	}
	
	//sport
	if (!ischecked && document.getElementById(boxid).value == 'sport'){
		document.getElementById("spoitem").selectedIndex = '0';
		getOptions(document.getElementById("spoitem").value,'spoDetails','../fxn/process1.php');
	}
	
	//spa
	if (!ischecked && document.getElementById(boxid).value == 'spa'){
		document.getElementById("spaitem").selectedIndex = '0';
		getOptions(document.getElementById("spaitem").value,'spaDetails','../fxn/process1.php');
	}
}

function getCheckInOutInterval(){//alert('Halleluyah');
	var date1 = new Date(document.frm1.checkin.value);
	var date2 = new Date(document.frm1.checkout.value);
	var timeDiff = Math.abs(date2.getTime() - date1.getTime());
	var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
	
	document.frm1.duration.value = diffDays;
	calculate();
}

function getCheckInOutIntervalFree(){
	var date1 = new Date(document.frm1.checkin.value);
	var date2 = new Date(document.frm1.checkout.value);
	var timeDiff = Math.abs(date2.getTime() - date1.getTime());
	var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
	
	document.frm1.duration.value = diffDays;
	document.frm1.bookingtotal.value = 0;
}

function calculate(){
	var roomrate = document.frm1.roomrate.value;
	var noofroom = document.frm1.noofroom.value;
	var duration = document.frm1.duration.value;
	var discount = document.frm1.discount.value;
	var vat = document.frm1.vat.value;
	if (duration == '' || duration == 'NaN'){duration = 0;document.frm1.duration.value = 0;}
	if (roomrate == '' || roomrate == 'NaN'){roomrate = 0;document.frm1.roomrate.value = 0;}
	var bookingtotal = roomrate * noofroom * duration;
	bookingtotal = parseFloat(bookingtotal) + parseFloat((bookingtotal * (vat/100)));
	document.getElementById("ndtotal").value = bookingtotal; //Grand total with no discount
	bookingtotal = bookingtotal - (bookingtotal * (discount/100));
	document.frm1.bookingtotal.value = bookingtotal;
	calculateTotal();
}

function calculatembar(){
var e = document.getElementsByName('barcheck[]');
var dc = document.frm1.bardiscount.value;
var dvat = document.frm1.dvat.value;
var gt = 0;
var gtdc = 0;
var id = 0;

if(dvat == ''){dvat = 0;}

for (var i = 0; i < e.length; ++i){
id = e[i].value;
p = document.getElementById('barprice'+id);
q = document.getElementById('barquantity'+id);
t = document.getElementById('bartotal'+id);

	if (e[i].checked){ //alert(p.value);
		if(q.value == ''){q.value = 1;}
		t.value = parseFloat(q.value) * parseFloat(p.value);
		gt += parseFloat(t.value);
		gtdc += ( parseFloat(t.value) + (parseFloat(t.value) * (dvat/100)) ) - (parseFloat(t.value) * (dc/100)) ;
	}else{
		if(q.value == ''){q.value = 1;}
		t.value = '';
	}
}

if(gt != ''){
	document.frm1.grandtotal.value = gtdc;
	document.getElementById("grandtotal").innerHTML = gtdc.toFixed(2); // - (gt * (dc/100));	
	document.getElementById("nettotal").innerHTML = gt.toFixed(2);
}else{
	document.frm1.grandtotal.value = 0;
	document.getElementById("grandtotal").innerHTML = '0.00';
	document.getElementById("nettotal").innerHTML = '0.00';
}

}

function showservicecharge(v,scVal){
	if(v == 1){
		document.getElementById('servicechargediv').style.display = 'none';
		document.getElementById('servicecharge').value = '0';
	}else{
		document.getElementById('servicechargediv').style.display = 'block';
		document.getElementById('servicecharge').value = scVal;
	}
}

function calculatemres(){
var e = document.getElementsByName('rescheck[]');
var dc = document.frm1.resdiscount.value;
var gt = 0;
var gtdc = 0;
var id = 0;

for (var i = 0; i < e.length; ++i){
id = e[i].value;
p = document.getElementById('resprice'+id);
q = document.getElementById('resquantity'+id);
t = document.getElementById('restotal'+id);

	if (e[i].checked){ //alert(p.value);
		if(q.value == ''){q.value = 1;}
		t.value = parseFloat(q.value) * parseFloat(p.value);
		gt += parseFloat(t.value);
		gtdc += parseFloat(t.value) - (parseFloat(t.value) * (dc/100)) ;
	}else{
		if(q.value == ''){q.value = 1;}
		t.value = '';
	}
}

if(gt != ''){
	document.frm1.grandtotal.value = gtdc;
	document.getElementById("grandtotal").innerHTML = gtdc; // - (gt * (dc/100));	
	
}else{
	document.frm1.grandtotal.value = 0;
	document.getElementById("grandtotal").innerHTML = '0.00';
}

}

function calculatebar(){
	var barprice = document.frm1.barprice.value;
	var barquantity = document.frm1.barquantity.value;
	var bardiscount = document.frm1.bardiscount.value;
	
	if (barquantity == ''){document.frm1.barquantity.value = 1; barquantity = 1;}
	if (bardiscount == ''){document.frm1.bardiscount.value = 0; bardiscount = 0;}
	
	if (barprice < 0 && barprice == ''){barprice = 0;}
	var bartotal = barprice * barquantity;
	bartotal = bartotal - (bartotal * (bardiscount/100));
	document.frm1.bartotal.value = bartotal;
	calculateTotal();
}

function calculateres(){
	var resprice = document.frm1.resprice.value;
	var resquantity = document.frm1.resquantity.value;
	var resdiscount = document.frm1.resdiscount.value;
	
	if (resquantity == ''){document.frm1.resquantity.value = 1; resquantity = 1;}
	if (resdiscount == ''){document.frm1.resdiscount.value = 0; resdiscount = 0;}
	
	if (resprice == ''){resprice = 0;}
	var restotal = resprice * resquantity;
	restotal = restotal - (restotal * (resdiscount/100));
	document.frm1.restotal.value = restotal;
	calculateTotal();
}

function calculatelau(){
	var lauprice = document.frm1.lauprice.value;
	var laudiscount = document.frm1.laudiscount.value;
	
	if (laudiscount == ''){document.frm1.laudiscount.value = 0; laudiscount = 0;}
	
	if (lauprice == ''){lauprice = 0;}
	var lautotal = lauprice;
	lautotal = lautotal - (lautotal * (laudiscount/100));
	document.frm1.lautotal.value = lautotal;
	calculateTotal();
}

function calculateswimpool(){
	var swimpoolprice = document.frm1.swimpoolprice.value;
	var swimpoolduration = document.frm1.swimpoolduration.value;
	var swimpooldiscount = document.frm1.swimpooldiscount.value;
	var swimpoolquantity = document.frm1.swimpoolquantity.value;
	
	if (swimpooldiscount == ''){swimpooldiscount = 0;} //document.frm1.swimpooldiscount.value = 0; 
	if (swimpoolquantity == ''){swimpoolquantity = 0;} //document.frm1.swimpooldiscount.value = 0; 
	if (swimpoolduration == ''){swimpoolduration = 0;}
	if (swimpoolprice == ''){swimpoolprice = 0;}
	var swimpooltotal = swimpoolprice * swimpoolquantity * swimpoolduration;
	swimpooltotal = swimpooltotal - (swimpooltotal * (swimpooldiscount/100));
	document.frm1.swimpooltotal.value = swimpooltotal;
	calculateTotal();
}

function calculatespa(){
	var spaprice = document.frm1.spaprice.value;
	var spadiscount = document.frm1.spadiscount.value;
	var spaquantity = document.frm1.spaquantity.value;
	if (spadiscount == ''){document.frm1.spadiscount.value = 0; spadiscount = 0;}
	if (spaquantity == ''){document.frm1.spaquantity.value = 0; spaquantity = 0;}
	if (spaprice == ''){spaprice = 0;}
	var spatotal = spaprice * spaquantity;
	spatotal = spatotal - (spatotal * (spadiscount/100));
	document.frm1.spatotal.value = spatotal;
	calculateTotal();
}

function calculatespo(){
	var spoprice = document.frm1.spoprice.value;
	var spodiscount = document.frm1.spodiscount.value;
	var spoquantity = document.frm1.spoquantity.value;
	if (spodiscount == ''){document.frm1.spodiscount.value = 0; spodiscount = 0;}
	if (spoquantity == ''){document.frm1.spoquantity.value = 0; spoquantity = 0;}
	if (spoprice == ''){spoprice = 0;}
	var spototal = spoprice * spoquantity;
	spototal = spototal - (spototal * (spodiscount/100));
	document.frm1.spototal.value = spototal;
	calculateTotal();
}

function calculateTotal(){
	if (document.frm1.spototal.value == ''){spototal = 0;}else{spototal = document.frm1.spototal.value;}
	if (document.frm1.spatotal.value == ''){spatotal = 0;}else{spatotal = document.frm1.spatotal.value;}
	if (document.frm1.swimpooltotal.value == ''){swimpooltotal = 0;}else{swimpooltotal = document.frm1.swimpooltotal.value;}
	if (document.frm1.lautotal.value == ''){lautotal = 0;}else{lautotal = document.frm1.lautotal.value;}
	if (document.frm1.restotal.value == ''){restotal = 0;}else{restotal = document.frm1.restotal.value;}
	if (document.frm1.bookingtotal.value == ''){bookingtotal = 0;}else{bookingtotal = document.frm1.bookingtotal.value;}
	if (document.frm1.bartotal.value == ''){bartotal = 0;}else{bartotal = document.frm1.bartotal.value;}
	
	var grandtotal = parseFloat(spototal) + parseFloat(spatotal) + parseFloat(swimpooltotal) + parseFloat(lautotal) + parseFloat(bookingtotal) + parseFloat(bartotal) + parseFloat(restotal);
	document.frm1.grandtotal.value = grandtotal;
	document.getElementById("grandtotal").innerHTML = grandtotal;
}


function onEnter(event) {
    if (event.which == 13 || event.keyCode == 13) {
		document.frm2.cmdsubmit2.click();
        return false;
    }
    return true;
}

function popupwin(u,w,h) {
	   if (w == ''){w="width=300";}else{w="width="+w;}
	   if (h == ''){h="height=400";}else{h="height="+h;}
	   if (u == ''){u='../404.html';}
	  var winx = window.open(u,"win1",w+","+h+",top=50,left=300,fullscreen=0,location=0,scrollbars=yes,resizable=yes,titlebar=0,toolbar=0,status=0,standard=0,menubar=0");
	  winx.focus();
}
   
function openurl(u,i,e){
	if (i == ''){showalert(e,"danger");}
	else{
      window.location.href= u+i;
	}
}

function addStoreItemNewName2Bars(v){
	if(v == ''){
		alert("Item name is required");
	}else{
		if(confirm('Are you sure you want to add new item name?')){
		loading(1);
		var x = document.getElementById("name");
		var option = document.createElement("option");
		option.text = v;
		x.add(option,0);
		loading(0);
		document.getElementById("itemnewname").value = v;
		$(".selectpicker").selectpicker('val',0);
		alert("New item name added.");
		}
	}
}

function iframeExporter(url){
	if (url != ''){
		document.getElementById('iframe').src = url;
	}else{
		document.write('<iframe src="" id="iframe" style="display:none;"></iframe>');
	}
} iframeExporter("");

function LogOutShift(){
	document.getElementById('shiftcontainer').style.display = 'block';
	document.getElementById('openshiftbtn').style.display = 'none';
	document.getElementById('closeshiftbtn').style.display = 'block';
	document.getElementById('logoutonly').style.display = 'block';
	//document.getElementById('cancelshift').style.display = 'block';
}

function CancelLogOutShift(){
	document.getElementById('shiftcontainer').style.display = 'none';
}