$("input[type='number']").click(function(){$(this).select()});var getNoItemSel=function(){var a=$(":checkbox:checked").length;$("#chkispaid").is(":checked")&&(a=parseInt(a)-1),$("#noitemsel").html(a)};$("label").click(function(){var a=$(this).attr("for"),b=$("#"+a),c=a.split("-")[1];b.is(":checked")?($(this).addClass("isselected"),getNoItemSel()):($(this).removeClass("isselected"),$("#resquantity"+c).val("1"),getNoItemSel())}),$("#cmdclearcart").click(function(){$("input:checkbox").prop("checked",!1),$("label").removeClass("isselected"),getNoItemSel(),calculatemres()}),$("#reloadclients").click(function(){loading(1),$.ajax({url:"../fxn/process1.php?dwat=reloadclientsopt",crossOrigin:!0,success:function(a){$("#clientid").empty().append(a).selectpicker("refresh"),loading(0)},error:function(){loading(0)}})}),$("#search").on("change keyup",function(){$("#containeritems label").hide();var a=$(this).val();$("#containeritems label").each(function(){-1!=$(this).text().toUpperCase().indexOf(a.toUpperCase())&&$(this).show()})}),setInterval(function(){loading(1),$.ajax({url:"../fxn/process1.php?dwat=reloadclientsopt",crossOrigin:!0,success:function(a){$("#clientid").empty().append(a).selectpicker("refresh"),loading(0)},error:function(){loading(0)}})},864e5);