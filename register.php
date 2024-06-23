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
    <title>BigHMS | Register </title>
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
                    <h4 class="page-head-line">Register to TestRun BigHMS</h4>

                </div>

            </div>
            <div class="row">
			<div class="col-md-7">
                   <div class="alert alert-info">
                        This is our BigHMS Registration page, please note that this a demo registration page to test run the BigHMS Web application. BigHMS is a system that manages Hotel in-house activities. After registration simply click on <a href="index.php">login</a>                     <br />
                         <strong> Some points and features to note!</strong>
                        <ul>
                            <li>
                                You will have to request for the application before we put up your hotel on our reservation page for booking and advertisement.
                            </li>
                            <li>
                                You can control everything you get from our reservation website and manage it without our interference with our BigHMS 
                            </li>
                            <li>
                                The price is quick cheaper compare to what you will get from our two systems.
                            </li>
                            <li>
                                Easy to use, customizable and Free advert for 6 (six) Months on any kind of order being placed from Big Reservation
                            </li>
                            
                        </ul>
                       
              </div>
                    
              </div>
				
                <div class="col-md-5">
                   <div id="msgbox"></div>
        <form name="frm1" id="frm1" action="fxn/process1.php" method="post">
	<input type="hidden" name="dwat" value="addhotel">
          <div>
               <div class="form-group input-group" style="width:100%;">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" name="lastname" placeholder="Last Name">
             </div>
		  </div>
		  
          <div>
                 <div class="form-group input-group" style="width:100%;">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" name="firstname" placeholder="First Name">
             </div>
		  </div>
          
          <div>
                 <div class="form-group input-group" style="width:100%;">
                <span class="input-group-addon"><i class="fa fa-building"></i></span>
            <input type="text" class="form-control" name="companyname" placeholder="Company Name">
             </div>
		  </div>
          
          <div>
                 <div class="form-group input-group" style="width:100%;">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
            <input type="password" class="form-control" name="password" placeholder="Password">
             </div>
		  </div>
          
                  
          <div>
                 <div class="form-group input-group" style="width:100%;">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="text" class="form-control" name="email" placeholder="Email">
             </div>
		  </div>
          
        
		<div>
            <div class="form-group input-group" style="width:100%;">
              <span class="input-group-addon"><i class="fa fa-users"></i></span> 
                 <select name="usersrole" id="role" style="width:100%;height:32px; padding:6px 0 0 5px;border:solid 1px #ddd;">
                   <option value="choose">Choose Role</option>
                   <option value="admin" selected="selected" >Administrator</option>
					<option value="manager">Manager</option>
					<option value="receptionist">Receptionist</option>
					<option value="staff">Staff</option>
                   <!--<option value="guest">Guest</option>-->
                 </select>
              </div>
          </div>
		  <a href="index.php">Already a registered member? Login</a>
		      <div class="row">
            <div class="col-sm-5">
              <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat" style="position:relative; margin-top:10px;">Register</button>
            </div><!-- /.col -->
          </div>
        </form>

                </div>
                

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
