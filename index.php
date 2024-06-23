<?php 
include('fxn/connection.php'); 
//echo md5("111");
$globalid = $_SESSION["amyi15"];
$globalrole = $_SESSION["role15"];
if ($globalid != '' && $globalrole != 'bar' && $globalrole != 'bar2' && $globalrole != 'restaurant'){redirect("admin/index.php");}
elseif ($globalid != '' && $globalrole == 'bar'){redirect("admin/order-bar-home.php");}
elseif ($globalid != '' && $globalrole == 'bar2'){redirect("admin/order-bar2-home.php");}
elseif ($globalid != '' && $globalrole == 'restaurant'){redirect("admin/order-res-home.php");}

$globalbizlogo = '';
$globalbizname = '';
$globalbizbgpic = '';

$logfilename = date("Y-m-d");
$logfilename .= ".txt";

if ($_POST["dwat"] == "stafflogin"){
	if ($_POST["username"] == ''){$m = 'Username/Email is required';}
	elseif ($_POST["password"] == ''){$m = 'Password is required';}
	elseif ($_POST["accttype"] == ''){$m = 'Account type is required';}
	else{
		if ($_POST["accttype"] == 'staff'){
		$pwd = md5(urldecode($_REQUEST["password"]));
		if(select("SELECT * FROM users WHERE (username = '".mysqli_real_escape_string($conn4as,urldecode($_POST["username"]))."' OR email = '".mysqli_real_escape_string($conn4as,urldecode($_POST["username"]))."') AND password = '".mysqli_real_escape_string($conn4as,$pwd)."' ORDER BY id")){
$rs = mysqli_fetch_assoc($qry);
//echo 'am....'.$rs["id"];
$_SESSION["amyi15"] = $rs["id"];
$_SESSION["amyn15"] = $rs["lastname"].' '.$rs["firstname"];
$_SESSION["amyem15"] = $rs["email"];
$_SESSION["role15"] = $rs["users_role"];
$globalrole = $rs["users_role"];
$_SESSION["photo15"] = $rs["photo"];
$_SESSION["hotelid"] = $rs["hotelid"];
$_SESSION["bookingsite"] = $rs["bookingsite"];

$globalrole = $_SESSION["role15"];

$log = "[".date("y/m/d h:i:s A")."], <br>Staff logged in, <br>STAFF: ".$_SESSION["amyn15"]." (ID: ".$_SESSION["amyi15"].")\r\n=======================================\r\n"; 
WriteToFile("logs/".$logfilename,$log);

if ($globalrole == 'bar'){
	$gotopage = 'admin/order-bar-home.php';

}elseif ($globalrole == 'bar2'){
	$gotopage = 'admin/order-bar2-home.php';

}elseif ($globalrole == 'restaurant'){
	$gotopage = 'admin/order-res-home.php';

}else{
	$gotopage = 'admin/index.php';
}
redirect($gotopage); //$portalpath.
	
	}else{
		$m = 'Account  not found';
	}
	
	}else{
		$m = 'Sorry guest login disabled for now.';
	}
	
}
}
getbizlogo(); 
if(!file_exists('archives/'.$globalbizlogo) || $globalbizlogo == ''){ $globalbizlogo = 'logo.png'; }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Hotel Management System</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
    <link href="font-awesome-4.5.0/css/font-awesome.css" rel="stylesheet" />
    <link href="resources/css/lrstyle.css" rel="stylesheet" />
</head>
<body>

    <div class="wrapper" style="">
        <div class="container">
            <div class="row">
                <div class="logindiv">
				<!--<h4 style="color:#422874;font-size:30px;">Welcome to Prenox Hotel & Suites</h4>-->
				
				<h2 style="text-align:center; color:#333;">
<img src="archives/<?php echo ($globalbizlogo != '')?$globalbizlogo:'noimage.png'; ?>" style="width:120px; height:120px;" /><br>
<?php echo $globalbizname; ?><br clear="all">
<!--<b style="color:#FF9900;">Login</b>--></h2>
				
                    <?php echo ($m != '')?'<div id="msgbox">'.$m.'</div>':''; ?>
					<div style="font-size:12px; width:80%; margin:10px auto; color:#666; line-height:18px;">Fill the form below to login. All fields are required.</div>
        <form name="frm1x" id="frm1x" action="" method="post">
	<input type="hidden" name="dwat" value="stafflogin">
          <div>
			   <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="text" class="form-control" name="username" placeholder="Username or Email">
             </div>
		  </div>
		  
          <div>
                 <div class="form-group input-group" style="width:100%;">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
            <input type="password" class="form-control" name="password" placeholder="Password">
			 <input type="hidden" name="accttype" id="accttype" value="staff">
             </div>
		  </div>
        
		  <!--<a href="#">Forgot Your Password?</a>-->  
          <div class="row">
            <div class="col-lg-12">
              <button type="submit" name="submit" class="btn btn-danger btn-block btn-flat" style="position:relative; margin-top:10px;">LOG IN</button>
            </div>
          </div>
        </form>
		</div>
        
		<div style="text-align:center;font-size:12px;width:300px;margin:10px auto; line-height:18px; color:#333;">Copyright &copy; 2018 - <?php echo date("Y"); ?> Big Hotel Management System. All rights reserved. <a href="http://www.progmatech.com" target="_blank" style="text-decoration:underline;">Site Credit</a></div>        

            </div>
        </div>
    </div>
    
    <!--<script src="resources/js/jquery-1.11.1.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>-->
    <style>
body{ background:<?php echo (!file_exists('archives/'.$globalbizbgpic) || $globalbizbgpic == '')?'url(archives/bg.jpg) ':'url(archives/'.$globalbizbgpic.') '; ?> #eee no-repeat; background-size:cover;}
#loading{ position:fixed; top:49%;left:49%; padding:5px 5px; background:none; border-radius:3px;display:none; z-index:2000;}
.logindiv{ margin:8% auto 0 auto; width:400px;background:rgba(255,255,255,0.9);padding:20px; border-radius:5px; text-align:center;}
@media screen and (max-width: 600px) {
body{background-size:100% 200%;}
.logindiv{ margin:20% auto 0 auto;  width:90%;}
}
</style>

<span id="loading"><img src="fxn/loading.gif" /></span>

    <script src="plugins/jQuery/jquery.1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
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
