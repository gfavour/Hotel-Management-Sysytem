$("input[type='number']").click(function(){
	$(this).select();  
});

var getNoItemSel = function(){
	var noitemsel = $(":checkbox:checked").length;
	if($("#chkispaid").is(":checked")) noitemsel = parseInt(noitemsel) - 1;
	$("#noitemsel").html(noitemsel);
}

$("label").click(function(){
	var thisid = $(this).attr("for");
	var chkid = $("#"+thisid);
	var bqid = thisid.split("-")[1];
		
	//$("#barcodes").val('');
		   
	if(chkid.is(':checked')){
		$(this).addClass('isselected');
		getNoItemSel();
	}else{
		$(this).removeClass('isselected');
		$("#resquantity"+bqid).val("1");
		getNoItemSel();
	}
});


$("#cmdclearcart").click(function(){
	$("input:checkbox").prop('checked', false);
	$("label").removeClass('isselected');
	getNoItemSel();
	calculatemres();
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