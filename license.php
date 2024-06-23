<?php 
include('fxn/connection.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>BigHMS | License</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
    <link href="font-awesome-4.5.0/css/font-awesome.css" rel="stylesheet" />
    <link href="resources/css/lrstyle.css" rel="stylesheet" />
</head>
<body>
<!-- HEADER END-->
    
    <!-- LOGO HEADER END--><!-- MENU SECTION END-->
    <div class="wrapper" style="margin-top:50px;">
        <div class="container">
           
          <div class="row">
			<div class="col-sm-8 col-sm-offset-2">
                    <h4 class="page-head-line" style=" margin-bottom:20px;">error 410: Expired or Invalid License Key! </h4>
                    <div><strong>You are seeing this error page due to the following reasons; </strong>
                      <ul style="margin:0px; padding-left:20px">
                            <li>
                               You are trying to setup bighms for another unregistered hotel. <strong>Please note:</strong> you can only use copy of this bighms for registered hotel.</li>
                          <li>Wrong configuration with respect to registered hotel. Call the vendor or send email to support@progmatech.com for assistance or chat with us on whatsapp for new license key: +2347060624802 </li>
                        </ul>
						<div style="padding:20px; text-align:left;">
						<a href="index.php" target="_blank" class="btn btn-md btn-primary">LOG IN AGAIN</a>
						<a href="https://www.progmatech.com" target="_blank" class="btn btn-md btn-warning">VIEW OUR WEBSITE</a>
            <a href="https://wa.me/+2347060624802" target="_blank" class="btn btn-md btn-success">CHAT WITH US</a>
						</div>
              </div>
            </div>
				
				
          </div>
        </div>
    </div>
    
    <script src="resources/js/jquery-1.11.1.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <style>
#loading{ position:fixed; top:49%;left:49%; padding:5px 5px; border:#ddd solid 0px; background:none; border-radius:3px;display:none; z-index:2000;}
</style>

<span id="loading"><img src="fxn/loading.gif" /></span>

    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
	<script src="fxn/psjquery.js"></script>
	
<script>
//warning, success, info, danger
showalert = function(message,t) {
if (message != ''){
if(t == 'success'){t='success';}
	$('#msgbox').html('<div class="alert alert-'+t+'"><a data-dismiss="alert" class="close" style="text-decoration:none !important;">&times;</a><span>'+message+'</span></div>');
}
}
showalert("<?php echo $_GET["m"]; ?>","success");
</script>
</body>
</html>
