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
    <title>BigHMS | Login </title>
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
                <div class="col-md-12">
                    <h4 class="page-head-line">Staff Login</h4>

                </div>

            </div>
            <div class="row">
			
			<div class="col-md-7">
                    
                    <div>
                         <strong> Instructions on how to Use our BigHMS web application!</strong>
                        <ul>
                            <li>
                               Login with the Email and Password you use during registration
                            </li>
                            <li>
                                You will be registered as adminstrator to access the full features of the application, anything you do from the BigHMS web application will be uploaded on BIg Reservation for advertising and booking, but the program is disabled now only to be released on hotel request as everybody that visit our demo site might not be hotel owner!
                            </li>
                            <li>
                               Contact Us for request and inquieries 
                            </li>
                            
                        </ul>
                       
                    </div>
                </div>
				
				
                <div class="col-md-5 alert alert-success">
                    <div id="msgbox"></div>
        <form name="frm1" id="frm1" action="fxn/process1.php" method="post">
	<input type="hidden" name="dwat" value="stafflogin">
          <div>
			   <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="text" class="form-control" name="username" placeholder="Email">
             </div>
		  </div>
		  
          <div>
                 <div class="form-group input-group" style="width:100%;">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
            <input type="password" class="form-control" name="password" placeholder="Password">
             </div>
		  </div>
        <?php //echo md5('password'); ?>
		<div>
            <div class="form-group input-group" style="width:100%;">
              <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                 <select name="accttype" id="accttype" style="width:100%;height:32px; padding:6px 0 0 5px;border:solid 1px #ddd;">
                   <option value="choose">Log in As</option>
                   <option value="staff" selected="selected">Staff</option>
                   <!--<option value="guest">Guest</option>-->
                 </select>
            </div>
          </div>
		  <a href="register.php"><i class="fa fa-user"></i> I don't have an account yet</a>  <a href="#">Forgot your password?</a>
          <div class="row">
            <div class="col-sm-5">
              <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat" style="position:relative; margin-top:10px;">Sign In</button>
            </div>
          </div>
        </form>

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
