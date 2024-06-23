
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
    

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
		 
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

$(".floatmsg").delay(20000).fadeOut(500);
</script>
<?php
mysqli_free_result();
?>
  </body>
</html>