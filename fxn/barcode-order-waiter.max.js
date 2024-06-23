$('#barcode').keypress(function(e){ 
	var barc = $(this);
	if ( e.which == 13 ) return false;
    if ( e.which == 13 ) e.preventDefault();
	//setTimeout(function(){ barc.select(); },100);	
});

$("input[type='number']").click(function(){
	$(this).select();  
});

/*
idleTimer = null;
idleState = false;
idleWait = 2000;
$(document).ready(function(){
	/ *
	$('*').bind('mousemove keydown scroll', function () { alert('Lopez');
    clearTimeout(idleTimer);
            if (idleState == true) {            
            }
            
            idleState = false;
            
            idleTimer = setTimeout(function () { 
                // Idle Event
                $("#barcodes").focus();
                idleState = true; }, idleWait);
        });
        
        $("body").trigger("mousemove");
	* /
});
*/

//////////////////////////////////////////////////
var getNoItemSel = function(){
	var noitemsel = $(":checkbox:checked").length;
	if($("#chkispaid").is(":checked")) noitemsel = parseInt(noitemsel) - 1;
	$("#noitemsel").html(noitemsel);
}

$("label").click(function(){
	var thisid = $(this).attr("for");
	var chkid = $("#"+thisid);
	var bqid = thisid.split("-")[1];
		
	$("#barcodes").val('');
		   
	if(chkid.is(':checked')){
		$(this).addClass('isselected');
		getNoItemSel();
	}else{
		$(this).removeClass('isselected');
		$("#barquantity"+bqid).val("1");
		getNoItemSel();
	}
});

$('#barcodes').on("change keyup",function(e){
	setTimeout(function(){
	var bclines = [];
	bclines = $('#barcodes').val().split(/\n/);
	
	var result = [];
	$.each(bclines, function(i, ev) {
		if(ev != ''){
			if ($.inArray(ev, result) == -1) result.push(ev);
		}
	});
  
	$.each(result, function(i,bcline){
        if(bcline != ''){
           var thisid = $("#"+bcline).attr("for");
		   var chkid = $("#"+thisid);
		   chkid.prop('checked', true);
		   $("#"+bcline).addClass('isselected');
		   $("#"+bcline).prependTo("#containeritems");
		   getNoItemSel();
        }
    });
	calculatembar();
	},300);
	
});

function Clearcart(){
	$("input:checkbox").prop('checked', false);
	$("label").removeClass('isselected');
	getNoItemSel();
	calculatembar();
}

$("#cmdclearcart").click(function(){
	$("input:checkbox").prop('checked', false);
	$("label").removeClass('isselected');
	getNoItemSel();
	calculatembar();
});

$("#reloadclients").click(function(){
	loading(1);
	$.ajax({url:"../fxn/process1.php?dwat=reloadclientsopt",crossOrigin: true,success:function(r){ $("#clientid").empty().append(r).selectpicker("refresh"); loading(0); },error:function(e){loading(0);}});
});

$('#search').on("change keyup",function(){ 
    $('#containeritems label').hide();
    var txt = $(this).val();
    $('#containeritems label').each(function(){
       if($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1){
           $(this).show();
       }
    });
});

setInterval(function(){
	loading(1);
	$.ajax({url:"../fxn/process1.php?dwat=reloadclientsopt",crossOrigin: true,success:function(r){ $("#clientid").empty().append(r).selectpicker("refresh"); loading(0); },error:function(e){loading(0);}});

},86400000); //1 day - 86400000

$("#caretme").click(function(){
	 $("#sidebarform").toggle();
});