function showhidePwd(a,b){"password"==a.type?(a.type="text",b.type="text",document.getElementById("showhide").innerHTML="Hide Password"):(a.type="password",b.type="password",document.getElementById("showhide").innerHTML="Show Password")}function loading(a){1==a?$("#loading").fadeIn(10):$("#loading").fadeOut(10)}function popup(a,b,c,d,e){loading(0),""!=a&&$("#popup-box #title").html(a),""==c&&(c="400"),""==d&&(d="30"),""==e&&(e="35"),""!=b&&($("#popup-box #message").html(b),$("#popup-box").animate({display:"block",width:c+"px",left:d+"%",top:"+"+e+"%"},500))}function SendByAjax(a,b,c){$.ajax({crossOrigin:!0,type:"POST",url:b,data:a,cache:!1,success:function(a){loading(0),res=a.split("<->"),a=res[0],"deleted"==a?window.location.href=c+"?m=Record successfully deleted":"AnonymousCNBD"==a?window.location.href=c+"?m=Anonymous can not be deleted":"RSYNDONE"==a?alert(res[1]):"RoomDetails"==a?(document.frm1.roomrate.value=res[1],document.getElementById("roomoutof").innerHTML="Out of "+res[2],document.frm1.roomleft.value=res[3],document.getElementById("rmleftgroup").innerHTML=res[3]<=0?" [Room occupied. No room left.]":"",calculate()):"BarDetails"==a?(document.frm1.barprice.value=res[1],document.getElementById("baroutof").innerHTML="Out of "+res[2],document.frm1.barleft.value=res[3],calculatebar()):"RETURNSUC"==a?window.location.href="returnitems.php?m=Item successfully returned&invoiceid="+res[1]:"resDetails"==a?(document.frm1.resprice.value=res[1],document.getElementById("resoutof").innerHTML="per "+res[2]+" "+res[3],calculateres()):"lauDetails"==a?(document.frm1.lauprice.value=res[1],calculatelau()):"swimpoolDetails"==a?(document.frm1.swimpoolprice.value=res[1],document.getElementById("swimpoolmeasure").innerHTML="per "+res[2],document.getElementById("swimpoolmeasure2").innerHTML="per "+res[2],document.getElementById("swimpoolhidmeas").innerHTML=res[2],calculateswimpool()):"spaDetails"==a?(document.frm1.spaprice.value=res[1],calculatespa()):"spoDetails"==a?(document.frm1.spoprice.value=res[1],calculatespo()):"PaidUnpaid"==a?"pending"==res[3]?window.location.reload():window.location.href="?invoiceid="+res[1]+"&m="+res[2]:"OrderFlagged"==a?window.location.href="?invoiceid="+res[1]+"&m="+res[2]:"doinout"==a?window.location.href="?invoiceid="+res[1]+"&m="+res[2]:"ExpReqApproved"==a?window.location.href="?m=Expenses successfully approved":"BarReqApproved"==a?window.location.href="?m=Request successfully approved":"NewShiftOpened"==a?window.location.reload():"NOITEMTOSHIFT"==a?alert("Open Shift aborted. No item in "+res[1]):"XShiftClosed"==a?window.location="../logout.php":"NOSHIFT2UPDATE"==a?alert("Operation aborted. Shift to close from "+res[1]+" not found."):showalert(a,"danger")},error:function(a,b,c){loading(0),showmodal(c,"Error..","#c00")}})}function confirmurl(a,b){confirm(a)&&(window.location.href=b)}function confirmaction(a,b,c,d){confirm(a)&&SendByAjax(b,c,d)}function confirmdel(a,b,c){confirm("Are you sure you want to delete?")&&SendByAjax(a,b,c)}function dopay(a,b,c,d){confirm("Are you sure you want to tag this record as "+a+"?")&&SendByAjax(b,c,d)}function docheck(a,b,c,d){confirm("Are you sure you want to tag this record as "+a+"?")&&SendByAjax(b,c,d)}function passurl(a,b){loaderPopupOn(),makePOSTRequest(a,b)}function showme(a){a.style.display="block"}function hideme(a){a.style.display="none"}function go2(a){window.location.href=a}function ifocus(a,b){b.value==a&&(b.value="")}function iblur(a,b){""==b.value&&(b.value=a)}function ifocuspwd(a,b){b.value==a&&(b.value="",b.type="password")}function iblurpwd(a,b){""==b.value&&(b.value=a,b.type="text")}function getsocial(){var a=document.frm1.store;document.getElementById("facebook").value=a.options[a.selectedIndex].getAttribute("fb"),document.getElementById("twitter").value=a.options[a.selectedIndex].getAttribute("tw"),document.getElementById("googleplus").value=a.options[a.selectedIndex].getAttribute("gp"),document.getElementById("linkedin").value=a.options[a.selectedIndex].getAttribute("li")}function StrStartWith(a,b){return a.slice(0,b.length)==b}function readURL(a){if(a.files&&a.files[0]){var b=new FileReader;b.onload=function(a){$("#passport").attr("src",a.target.result)},b.readAsDataURL(a.files[0])}}function getOptions(a,b){"RoomDetails"==b?SendByAjax("roomid="+a.value+"&dwat=RoomDetails","../fxn/process1.php",""):"BarDetails"==b?SendByAjax("itemid="+a.value+"&dwat=BarDetails","../fxn/process1.php",""):"resDetails"==b?SendByAjax("itemid="+a.value+"&dwat=resDetails","../fxn/process1.php",""):"lauDetails"==b?SendByAjax("itemid="+a.value+"&dwat=lauDetails","../fxn/process1.php",""):"spaDetails"==b?SendByAjax("itemid="+a.value+"&dwat=spaDetails","../fxn/process1.php",""):"swimpoolDetails"==b?SendByAjax("itemid="+a.value+"&dwat=swimpoolDetails","../fxn/process1.php",""):"spoDetails"==b&&SendByAjax("itemid="+a.value+"&dwat=spoDetails","../fxn/process1.php","")}function getDiscount(a,b,c){document.frm1.discount.value=a>=b?c:0,calculate()}function ShowHideById(a){$("#"+a).slideToggle(500);var b=a.split("-"),c=b[1],d=document.getElementById(c).checked;d||"reservation"!=document.getElementById(c).value||(document.getElementById("room_type").selectedIndex="0",getOptions(document.getElementById("room_type").value,"RoomDetails","../fxn/process1.php")),d||"bar"!=document.getElementById(c).value||(document.getElementById("baritem").selectedIndex="0",getOptions(document.getElementById("baritem").value,"BarDetails","../fxn/process1.php")),d||"restaurant"!=document.getElementById(c).value||(document.getElementById("resitem").selectedIndex="0",getOptions(document.getElementById("resitem").value,"resDetails","../fxn/process1.php")),d||"swimpool"!=document.getElementById(c).value||(document.getElementById("swimpoolitem").selectedIndex="0",getOptions(document.getElementById("swimpoolitem").value,"swimpoolDetails","../fxn/process1.php")),d||"laundary"!=document.getElementById(c).value||(document.getElementById("lauitem").selectedIndex="0",getOptions(document.getElementById("lauitem").value,"lauDetails","../fxn/process1.php")),d||"sport"!=document.getElementById(c).value||(document.getElementById("spoitem").selectedIndex="0",getOptions(document.getElementById("spoitem").value,"spoDetails","../fxn/process1.php")),d||"spa"!=document.getElementById(c).value||(document.getElementById("spaitem").selectedIndex="0",getOptions(document.getElementById("spaitem").value,"spaDetails","../fxn/process1.php"))}function getCheckInOutInterval(){var a=new Date(document.frm1.checkin.value),b=new Date(document.frm1.checkout.value),c=Math.abs(b.getTime()-a.getTime()),d=Math.ceil(c/864e5);document.frm1.duration.value=d,calculate()}function getCheckInOutIntervalFree(){var a=new Date(document.frm1.checkin.value),b=new Date(document.frm1.checkout.value),c=Math.abs(b.getTime()-a.getTime()),d=Math.ceil(c/864e5);document.frm1.duration.value=d,document.frm1.bookingtotal.value=0}function calculate(){var a=document.frm1.roomrate.value,b=document.frm1.noofroom.value,c=document.frm1.duration.value,d=document.frm1.discount.value,e=document.frm1.vat.value;(""==c||"NaN"==c)&&(c=0,document.frm1.duration.value=0),(""==a||"NaN"==a)&&(a=0,document.frm1.roomrate.value=0);var f=a*b*c;f=parseFloat(f)+parseFloat(f*(e/100)),document.getElementById("ndtotal").value = f,f-=f*(d/100),document.frm1.bookingtotal.value=f,calculateTotal()}function calculatembar(){var a=document.getElementsByName("barcheck[]"),b=document.frm1.bardiscount.value,c=document.frm1.dvat.value,d=0,e=0,f=0;""==c&&(c=0);for(var g=0;g<a.length;++g)f=a[g].value,p=document.getElementById("barprice"+f),q=document.getElementById("barquantity"+f),t=document.getElementById("bartotal"+f),a[g].checked?(""==q.value&&(q.value=1),t.value=parseFloat(q.value)*parseFloat(p.value),d+=parseFloat(t.value),e+=parseFloat(t.value)+parseFloat(t.value)*(c/100)-parseFloat(t.value)*(b/100)):(""==q.value&&(q.value=1),t.value="");""!=d?(document.frm1.grandtotal.value=e,document.getElementById("grandtotal").innerHTML=e.toFixed(2),document.getElementById("nettotal").innerHTML=d.toFixed(2)):(document.frm1.grandtotal.value=0,document.getElementById("grandtotal").innerHTML="0.00",document.getElementById("nettotal").innerHTML="0.00")}function showservicecharge(a,b){1==a?(document.getElementById("servicechargediv").style.display="none",document.getElementById("servicecharge").value="0"):(document.getElementById("servicechargediv").style.display="block",document.getElementById("servicecharge").value=b)}function calculatemres(){for(var a=document.getElementsByName("rescheck[]"),b=document.frm1.resdiscount.value,c=0,d=0,e=0,f=0;f<a.length;++f)e=a[f].value,p=document.getElementById("resprice"+e),q=document.getElementById("resquantity"+e),t=document.getElementById("restotal"+e),a[f].checked?(""==q.value&&(q.value=1),t.value=parseFloat(q.value)*parseFloat(p.value),c+=parseFloat(t.value),d+=parseFloat(t.value)-parseFloat(t.value)*(b/100)):(""==q.value&&(q.value=1),t.value="");""!=c?(document.frm1.grandtotal.value=d,document.getElementById("grandtotal").innerHTML=d):(document.frm1.grandtotal.value=0,document.getElementById("grandtotal").innerHTML="0.00")}function calculatebar(){var a=document.frm1.barprice.value,b=document.frm1.barquantity.value,c=document.frm1.bardiscount.value;""==b&&(document.frm1.barquantity.value=1,b=1),""==c&&(document.frm1.bardiscount.value=0,c=0),a<0&&""==a&&(a=0);var d=a*b;d-=d*(c/100),document.frm1.bartotal.value=d,calculateTotal()}function calculateres(){var a=document.frm1.resprice.value,b=document.frm1.resquantity.value,c=document.frm1.resdiscount.value;""==b&&(document.frm1.resquantity.value=1,b=1),""==c&&(document.frm1.resdiscount.value=0,c=0),""==a&&(a=0);var d=a*b;d-=d*(c/100),document.frm1.restotal.value=d,calculateTotal()}function calculatelau(){var a=document.frm1.lauprice.value,b=document.frm1.laudiscount.value;""==b&&(document.frm1.laudiscount.value=0,b=0),""==a&&(a=0);var c=a;c-=c*(b/100),document.frm1.lautotal.value=c,calculateTotal()}function calculateswimpool(){var a=document.frm1.swimpoolprice.value,b=document.frm1.swimpoolduration.value,c=document.frm1.swimpooldiscount.value,d=document.frm1.swimpoolquantity.value;""==c&&(c=0),""==d&&(d=0),""==b&&(b=0),""==a&&(a=0);var e=a*d*b;e-=e*(c/100),document.frm1.swimpooltotal.value=e,calculateTotal()}function calculatespa(){var a=document.frm1.spaprice.value,b=document.frm1.spadiscount.value,c=document.frm1.spaquantity.value;""==b&&(document.frm1.spadiscount.value=0,b=0),""==c&&(document.frm1.spaquantity.value=0,c=0),""==a&&(a=0);var d=a*c;d-=d*(b/100),document.frm1.spatotal.value=d,calculateTotal()}function calculatespo(){var a=document.frm1.spoprice.value,b=document.frm1.spodiscount.value,c=document.frm1.spoquantity.value;""==b&&(document.frm1.spodiscount.value=0,b=0),""==c&&(document.frm1.spoquantity.value=0,c=0),""==a&&(a=0);var d=a*c;d-=d*(b/100),document.frm1.spototal.value=d,calculateTotal()}function calculateTotal(){spototal=""==document.frm1.spototal.value?0:document.frm1.spototal.value,spatotal=""==document.frm1.spatotal.value?0:document.frm1.spatotal.value,swimpooltotal=""==document.frm1.swimpooltotal.value?0:document.frm1.swimpooltotal.value,lautotal=""==document.frm1.lautotal.value?0:document.frm1.lautotal.value,restotal=""==document.frm1.restotal.value?0:document.frm1.restotal.value,bookingtotal=""==document.frm1.bookingtotal.value?0:document.frm1.bookingtotal.value,bartotal=""==document.frm1.bartotal.value?0:document.frm1.bartotal.value;var a=parseFloat(spototal)+parseFloat(spatotal)+parseFloat(swimpooltotal)+parseFloat(lautotal)+parseFloat(bookingtotal)+parseFloat(bartotal)+parseFloat(restotal);document.frm1.grandtotal.value=a,document.getElementById("grandtotal").innerHTML=a}function onEnter(a){return 13==a.which||13==a.keyCode?(document.frm2.cmdsubmit2.click(),!1):!0}function popupwin(a,b,c){b=""==b?"width=300":"width="+b,c=""==c?"height=400":"height="+c,""==a&&(a="../404.html");var d=window.open(a,"win1",b+","+c+",top=50,left=300,fullscreen=0,location=0,scrollbars=yes,resizable=yes,titlebar=0,toolbar=0,status=0,standard=0,menubar=0");d.focus()}function openurl(a,b,c){""==b?showalert(c,"danger"):window.location.href=a+b}function addStoreItemNewName2Bars(a){if(""==a)alert("Item name is required");else if(confirm("Are you sure you want to add new item name?")){loading(1);var b=document.getElementById("name"),c=document.createElement("option");c.text=a,b.add(c,0),loading(0),document.getElementById("itemnewname").value=a,$(".selectpicker").selectpicker("val",0),alert("New item name added.")}}function iframeExporter(a){""!=a?document.getElementById("iframe").src=a:document.write('<iframe src="" id="iframe" style="display:none;"></iframe>')}function LogOutShift(){document.getElementById("shiftcontainer").style.display="block",document.getElementById("openshiftbtn").style.display="none",document.getElementById("closeshiftbtn").style.display="block",document.getElementById("logoutonly").style.display="block"}function CancelLogOutShift(){document.getElementById("shiftcontainer").style.display="none"}$(document).ready(function(){function a(a){var b=null;try{a.contentWindow&&(b=a.contentWindow.document)}catch(c){}if(b)return b;try{b=a.contentDocument?a.contentDocument:a.document}catch(c){b=a.document}return b}function b(b,c){loading(1);var d=$(c),e=d.attr("action");if(void 0!==window.FormData){var f=new FormData(c);$.ajax({url:e,type:"POST",crossOrigin:!0,data:f,mimeType:"multipart/form-data",contentType:!1,cache:!1,processData:!1,success:function(a){loading(0),res=a.split("<->"),a=res[0],"RoomFacilityAdded"==a?window.location.href="?m=New room facility added":"RoomFacilityUpdated"==a?window.location.href="manage-room-facilities.php?m=Room facility updated":"RETURNSUC"==a?window.location.href="returnitems.php?m=Item successfully returned":"RETURNSUC2"==a?window.location.href="returnitems2.php?m=Item successfully returned":"NewGuestAdded"==a||"NewCompanyAdded"==a?window.location.href="?m=New record successfully added":"NewGuestUpdated"==a?window.location.href="manage-guests.php?m=Guest updated.":"ALoggedin"==a||"SLoggedin"==a||("NRSA"==a?window.location.href="?m=New Room Successfully added":"RSE"==a?window.location.href="manage-rooms.php?m=Room updated.":"NewResturantAdded"==a?window.location.href="?m=New restuarant item added":"NewResturantUpdated"==a?window.location.href="manage-resturant.php?m=Restuarant item updated.":"NewLaundryAdded"==a?window.location.href="?m=New laundry service added":"NewLaundryUpdated"==a?window.location.href="manage-laundry.php?m=Laundry service updated.":"NewCategoryAdded"==a?window.location.href="manage-category.php?m=New category added.":"NewUserAdded"==a?window.location.href="?m=User added":"UsersAdded"==a?window.location.href="?m=New staff successfully added":"NewUserAdded"==a?window.location.href="manage-staff.php?m=User added":"STORE2BARADDED"==a?window.location.href="store.php?m=New item has been successfully added to bar from store.":"STORE2BARUPDATED"==a?window.location.href="store.php?m=Specified quantity of Item has been successfully added to bar item.":"NewDeptUpdated"==a?window.location.href="departments.php?m=Department updated":"NewBarAdded"==a?window.location.href="?m=New bar item added":"NewStoreAdded"==a?window.location.href="?m=New item successfully added to store":"NewStoreUpdated"==a?window.location.href="store.php?m=item successfully updated.":"NewBarUpdated"==a?window.location.href="manage-bar.php?m=Bar item updated.":"NewBar2Updated"==a?window.location.href="manage-bar2.php?m=Bar item updated.":"RestockBarUpdated"==a?window.location.href="manage-bar.php?m=bar item re-stocked":"RestockBar2Updated"==a?window.location.href="manage-bar2.php?m=bar item re-stocked":"NewSportAdded"==a?window.location.href="?m=New sport item added":"NewSportUpdated"==a?window.location.href="manage-sport.php?m=Sport item updated.":"NewSwimpoolAdded"==a?window.location.href="?m=New swimming pool service added":"NewSwimpoolUpdated"==a?window.location.href="manage-swimpool.php?m=Swimming pool service updated.":"NewSpaAdded"==a?window.location.href="?m=New spa service added":"NewSpaUpdated"==a?window.location.href="manage-spa.php?m=Spa service updated.":"SavedSuccessfully"==a?window.location.href="settings.php?m=Setting Saved Succesfully.":"OSA"==a?window.location.href="?m=Order successfully added&clientid="+res[1]:"OSARC"==a?(showalert("Order successfully added with invoice no "+res[2]+"<br><a href=\"javascript:$('#cmdclearcart').click(); var wi = window.open('ores-invoice-pos.php?printer=pos&invoiceid="+res[2]+"','winreceipt','width=500,height=300,toolbar=no,address=no,scrollbar=no');wi.focus();\" class=\"btn btn-sm btn-success\" style=\"text-decoration:none;\">PRINT RECEIPT</a>","success"),$("#cmdclearcart").click()):"WOSABC"==a?showalert("Order successfully submitted with invoice no "+res[2]+"<br>Meet the bar man to take your order and receipt.","success"):"WOSABC2"==a?showalert("Order successfully submitted with invoice no "+res[2]+"<br>Meet the bar man to take your order and receipt.","success"):"WOSABC3"==a?showalert("Order successfully submitted with invoice no "+res[2]+"<br>Meet the bar man to take your order and receipt.","success"):"OSABC"==a?(showalert("Order successfully added with invoice no "+res[2]+"<br><a href=\"javascript:$('#cmdclearcart').click(); var wi = window.open('obar-invoice-pos.php?printer=pos&invoiceid="+res[2]+"','winreceipt','width=500,height=300,toolbar=no,address=no,scrollbar=no');wi.focus();\" class=\"btn btn-sm btn-success\" style=\"text-decoration:none;\">PRINT RECEIPT</a>","success"),$("#cmdclearcart").click()):"OSABC2"==a?(showalert("Order successfully added with invoice no "+res[2]+"<br><a href=\"javascript:$('#cmdclearcart').click(); var wi = window.open('obar2-invoice-pos.php?printer=pos&invoiceid="+res[2]+"','winreceipt','width=500,height=300,toolbar=no,address=no,scrollbar=no');wi.focus();\" class=\"btn btn-sm btn-success\" style=\"text-decoration:none;\">PRINT RECEIPT</a>","success"),$("#cmdclearcart").click()):"OSABC3"==a?(showalert("Order successfully added with invoice no "+res[2]+"<br><a href=\"javascript:$('#cmdclearcart').click(); var wi = window.open('obar3-invoice-pos.php?printer=pos&invoiceid="+res[2]+"','winreceipt','width=500,height=300,toolbar=no,address=no,scrollbar=no');wi.focus();\" class=\"btn btn-sm btn-success\" style=\"text-decoration:none;\">PRINT RECEIPT</a>","success"),$("#cmdclearcart").click()):"OSASP"==a?showalert("Swimming pool service successfully ordered. Invoice ID "+res[2]+"<br><a href=\"javascript:var wi = window.open('obar-invoice-pos.php?printer=pos&invoiceid="+res[2]+"','winreceipt','width=500,height=300,toolbar=no,address=no,scrollbar=no');wi.focus();\" class=\"btn btn-sm btn-success\" style=\"text-decoration:none;\">PRINT RECEIPT</a>","success"):"OSASP2"==a?showalert("Swimming pool service successfully ordered. Invoice ID "+res[2]+"<br><a href=\"javascript:var wi = window.open('obar2-invoice-pos.php?printer=pos&invoiceid="+res[2]+"','winreceipt','width=500,height=300,toolbar=no,address=no,scrollbar=no');wi.focus();\" class=\"btn btn-sm btn-success\" style=\"text-decoration:none;\">PRINT RECEIPT</a>","success"):"NewWaiterAdded"==a?window.location.href="?m=Waiter name/number was successfully added":"WaiterUpdated"==a?window.location.href="waiters.php?m=Waiter name/number successfully updated":"NewtblNosAdded"==a?window.location.href="?m=Table name/number was successfully added":"tblNoUpdated"==a?window.location.href="manage-tablenos.php?m=Table name/number successfully updated":"OSAR"==a?window.location.href="manage-inout-grid.php?m=Order successfully added":"OSAF"==a?window.location.href="?m=Free service successfully added&clientid="+res[1]:"OSU"==a?window.location.href="?m=Order successfully appended&clientid="+res[1]+"&invoiceid="+res[2]:"GYMREG"==a?window.location.href="?m=You have successfully submit new gym membership application form.":"GYMRENEW"==a?window.location.href="gympayments.php?m=You have successfully renew a membership account.":"NewExpensesAdded"==a?window.location.href="?m=New Expenses successfully added.":"NewBarRequestAdded"==a?window.location.href="?m=New Bar Request successfully added.":"NewSchedulAdded"==a?window.location.href="?m=New room reservation successfully added.":showalert(a,"danger"))},error:function(a,b,c){loading(0),showalert("Error: "+c,"danger")}}),b.preventDefault()}else{var g="unique"+(new Date).getTime(),h=$('<iframe src="javascript:false;" name="'+g+'" />');h.hide(),d.attr("target",g),h.appendTo("body"),h.load(function(){var c=a(h[0]),d=c.body?c.body:c.documentElement,e=d.innerHTML;"RoomFacilityAdded"==e?window.location.href="?m=New room facility added":"NRSA"==e?window.location.href="?m=New Room Successfully added":showalert(errorThrown,"danger")})}}$("#frm1").submit(function(a){b(a,this)}),$("#frm2").submit(function(a){b(a,this)}),$("#frm3").submit(function(a){b(a,this)}),$("#frm4").submit(function(a){b(a,this)}),$("#cmdbar").click(function(){$("#frm1").submit()}),$("#cmdres").click(function(){$("#frm1").submit()}),$("#cmdsubmit").click(function(){return confirm("Are you sure you want to do this?")?void $("#frm1").submit():!1}),$(document).on("click",".lcurve",function(){var a=$(this).attr("id");$("#bod-"+a).slideToggle(500)}),$.fn.drags=function(a){if(a=$.extend({handle:"",cursor:"move"},a),""===a.handle)var b=this;else var b=this.find(a.handle);return b.css("cursor",a.cursor).on("mousedown",function(b){if(""===a.handle)var c=$(this).addClass("draggable");else var c=$(this).addClass("active-handle").parent().addClass("draggable");var d=c.css("z-index"),e=c.outerHeight(),f=c.outerWidth(),g=c.offset().top+e-b.pageY,h=c.offset().left+f-b.pageX;c.css("z-index",1e3).parents().on("mousemove",function(a){$(".draggable").offset({top:a.pageY+g-e,left:a.pageX+h-f}).on("mouseup",function(){$(this).removeClass("draggable").css("z-index",d)})}),b.preventDefault()}).on("mouseup",function(){""===a.handle?$(this).removeClass("draggable"):$(this).removeClass("active-handle").parent().removeClass("draggable")})},$(".draggable").mousedown(function(){id=$(this).attr("id"),$("#"+id).drags()}),$("#jqbtn1").click(function(){$("#jqdiv1").slideToggle(300)}),$("#jqbtn2").click(function(){$("#jqdiv2").slideToggle(300)}),$("#divshowhide1").click(function(){$("#divshowhide2").slideToggle(200)}),$("#tItemByObjs").on("click",function(){$("#tItemByObjs").text($("#itemnamebydd").is(":visible")?"Select Existing Item Name":"Add New Name"),$("#itemnamebydd").toggle(500),$("#itemnamebytxt").toggle(500)})}),$(document).on("change","#passportfile",function(){readURL(this)}),iframeExporter("");