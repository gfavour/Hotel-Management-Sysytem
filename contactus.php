<?php include('fxn/connection.php'); ?>
<?php
$globalid = $stc->data["amyi15"];
if ($globalid != ''){redirect("admin/index.php");}
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
    <title>BigHMS</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="font-awesome-4.5.0/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="resources/css/lrstyle.css" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    

    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
              <div class="col-md-12">
                    <h4 class="page-head-line">CONTACT US </h4>
                    </div>
            </div>
            <div class="row">
			<div class="col-md-6">
              <div class="alert alert-info">
                <p>MR FRANCIS <br />
                        <strong>Call: </strong>+234-8029981816<br />
				        <strong>Email:</strong> sales@bighms.com, support@bighms.com</p>
                
              </div>
               </div><div class="col-md-6">
              <div class="alert alert-info">
                <p>MR RASHEED <br />
                  <strong>Call: </strong>+234-7039090014<br />
                  <strong>Email: </strong>sales@bighms.com, support@bighms.com</p>
              </div>
               </div>
				
                <div style="text-align:center;"><a href="index.php">Login</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="register.php">Register</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="contactus.php">Contact Us</a> </div>
                

            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="resources/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
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
