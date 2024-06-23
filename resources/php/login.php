<?php include('../../fxn/connection.php'); ?>
<?php
$globalid = $stc->data["amyi15"];
if ($globalid != ''){redirect("admin/index.php");}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BigHMS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../font-awesome-4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../css/AdminLTE.min.css">
    <link rel="stylesheet" href="../css/skins/skin-blue.min.css">
  	<link rel="stylesheet" href="../css/css/ps-css.css">
	
  </head>


  <body class="hold-transition login-page">
  
   <div class="login-box">
      <div class="login">
        <a href="../../index.php"><img src="../../login/img/logo.png" style="margin-left:40px;"/></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Please provide your details</p>
		<div id="msgbox"></div>
        <form name="frm1" id="frm1" action="../../fxn/process1.php" method="post">
	<input type="hidden" name="dwat" value="stafflogin">
          <div>
               <div class="form-group input-group" style="width:100%;">
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
                 <select name="accttype" id="accttype" style="width:100%;height:35px;border:solid 1px #ddd;">
                   <option value="choose">Log in As</option>
                   <option value="staff" selected="selected">Staff</option>
                   <!--<option value="guest">Guest</option>-->
                 </select>
              </div>
          </div>
		  <a href="#">Forgot your password?</a>
          <div class="row">
            <div class="col-sm-5">
              <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat" style="position:relative; margin-top:10px;">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
	<style>
#loading{ position:fixed; top:49%;left:49%; padding:5px 5px; border:#ddd solid 0px; background:none; border-radius:3px;display:none; z-index:2000;}
</style>

<span id="loading"><img src="../../fxn/loading.gif" /></span>

    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
	<script src="../../fxn/psjquery.js"></script>
	
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
