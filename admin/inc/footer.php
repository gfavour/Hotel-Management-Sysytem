  
	  </div>
    <!-- jQuery 2.1.4 -->
    <?php include("../fxn/jq-html.php"); ?>
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../resources/js/jquery-ui.js"></script>
    <!-- Bootstrap 3.3.5 -->
   <script src="../bootstrap/js/popper.min.js"></script>
   <script src="../bootstrap/js/bootstrap.min.js"></script>
   <script src="../bootstrap/js/bootstrap-select.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../resources/js/app.min.js"></script>
    <script src="../plugins/validator.js"></script>
    <script src="../plugins/book_calculator.js"></script>
    <script src="../plugins/datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="../js/jquery.ui.datepicker-tr.js"> </script>
    
     <script>
         $(function () {
        $('div[name="showthis"]').hide();

        //show it when the checkbox is clicked
        $('input[name="checkbox"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('div[name="showthis"]').fadeIn();
            } else {
                $('div[name="showthis"]').hide();
            }
        });
    });
    </script> 

    <script>
    $(function () {
    $('div[name="amount"]').hide();

    $('option[name="executive"]').on('click', function () {
            if ($(this).prop('selected')) {
                $('div[name="amount"]').fadeIn();
            } else {
              
                  $('div[name="amount"]').hide();
               }
        });
    });
    </script>
		 
<script src="../fxn/psjquery.js"></script>

<script>
//warning, success, info, danger
showalert = function(message,t) {
if (message != ''){
if(t == 'success'){t='success';}
	$('#msgbox').fadeIn().html('<div class="alert alert-'+t+'"><a class="close" data-dismiss="alert" style="text-decoration:none;">&times;</a><span>'+message+'</span></div>').delay(30000).slideUp(500);
}
}

showalert("<?php echo $_GET["m"]; ?>","success");
showmodal = function(message,h,b) {
		$('#myModal').modal('toggle');
		$('.modal-header').css({backgroundColor: b});
        $('#modalhead').html(h);
		$('#modalcontent').html(message);
}

$(function() {
  $('[data-toggle="popover"]').popover();
});


$(".floatmsg").delay(10000).fadeOut();
$("#cancelfloatmsg").click(function(){
	$('.floatmsg').hide();
});
///////////////////////////////////
$("#addlauitemrow").click(function(){
	var $div = $('div[id^="lauitemrow"]:last'); //dellauitem0
	var num = SlashId4rmDiv($div); num += 1;
	var $Clone = $div.clone().prop('id','lauitemrow'+num );
	$Clone.find('select[id^="inplauitem"]').attr("id","inplauitem"+num);
	$Clone.find('input[id^="inplauprice"]').attr("id","inplauprice"+num);
	$Clone.find('input[id^="inplaudiscount"]').attr("id","inplaudiscount"+num);
	$Clone.find('input[id^="inplautotal"]').attr("id","inplautotal"+num);
	$Clone.find('span[id^="dellauitem"]').attr({"id":"dellauitem"+num,"style":"background:#f00;color:#fff;border:#f00;border-left:#fff solid 1px;cursor:pointer;"});
	$("#lauitemrows").append($Clone);
});
///////////////////////////
$(document).on("change","select[id^='inplauitem']",function(){
	var vID = $(this).val();
	var id = SlashId4rmDiv($(this)); //parseInt($(this).prop('id').match(/\d+/g),10);
	var price = AllLauPrices[vID]["price"];
	var laudiscount = $("#inplaudiscount"+id).val();
	var laprice = price;
	if(laudiscount == ''){laudiscount = 0;$("#inplaudiscount"+id).val(0); }
	if (laprice == ''){laprice = 0; $("#inplauprice"+id).val(0); }
	lautotal = parseFloat(laprice) - (parseFloat(laprice) * parseFloat(laudiscount)/100);
	$("#inplauprice"+id).val(price);
	$("#inplautotal"+id).val(lautotal);
	GetTotalByLau();
});
///////////////////////////
$(document).on("keyup keypress change","input[id^='inplaudiscount']",function(){
	var laudiscount = $(this).val();
	var id = SlashId4rmDiv($(this));
	if(laudiscount == ''){laudiscount = 0;}
	var lauprice = $("#inplauprice"+id).val();
	if (lauprice == ''){lauprice = 0;}
	var lautotal = parseFloat(lauprice) - (parseFloat(lauprice) * parseFloat(laudiscount)/100);
	$("#inplautotal"+id).val(lautotal);
	GetTotalByLau();
});
///////////////////////////
$(document).on("keyup keypress change","input[id^='inplauprice']",function(){
	var vID = $(this).val();
	var id = SlashId4rmDiv($(this));
	$("#inplautotal"+id).val(vID);
	GetTotalByLau();
});
///////////////////////////
$(document).on("click","span[id^='dellauitem']",function(){
	var num = SlashId4rmDiv($(this));
	if(num > 0){ $("#lauitemrow"+num).remove(); GetTotalByLau(); }
});
////////////////////////////////
function GetTotalByLau(){
	var $el = $('input[name="inplautotal[]"]');
	var IDnum = null;
	var subtotal = 0;
	var total = 0;
	$el.each(function(){
		total = $(this).val();
		subtotal = parseFloat(subtotal) + parseFloat(total);
		//IDnum = SlashId4rmDiv($(this));
	});
	$('input[name="lautotal"]').val(subtotal);
	calculateTotal(); //psjquery.js
}
////////////////////////////////
function SlashId4rmDiv($div){
	return parseInt( $div.prop("id").match(/\d+/g), 10 );
}
//////////////////////////////
setInterval(function(){
$.ajax({url:"backuprun.php",crossOrigin: true,success:function(r){  },error:function(e){ }});
},600000); //1200000, 20mins
</script>
<script src="../sync/switch-sync.js"></script>
<?php mysqli_free_result(); ?>
  </body>
</html>