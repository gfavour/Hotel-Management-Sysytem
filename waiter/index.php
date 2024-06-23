<?php 
include('../fxn/connection.php'); 
$globalwid = $_SESSION["wamyi15"];
if ($globalwid != ''){redirect("home.php");}

$logfilename = date("Y-m-d");
$logfilename .= ".txt";

if ($_POST["dwat"] == "stafflogin"){
if ($_POST["username"] == ''){$m = 'Username/Email is required';}
elseif ($_POST["password"] == ''){$m = 'Password is required';}
else{

$pwd = Hashpassword($_REQUEST["password"]);

if(select("SELECT * FROM waiters WHERE username = '".mysqli_escape_string($conn4as,$_POST["username"])."' AND password = '".mysqli_escape_string($conn4as,$pwd)."' ORDER BY id")){
$rs = mysqli_fetch_assoc($qry);
$_SESSION["wamyi15"] = $rs["id"];
$_SESSION["wamyn15"] = $rs["name"];
$_SESSION["wamyup15"] = $rs["usagepermit"];

$log = "[".date("y/m/d h:i:s A")."], Waiter (".$rs["name"].") logged in \r\n=======================================\r\n"; 
WriteToFile("logs/".$logfilename,$log);

redirect("home.php");
}else{
	$m = 'Account  not found';
}
	
}
}
//echo Hashpassword('password');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>BigHMS - Waiter/Waitress</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" />
    <link href="../font-awesome-4.5.0/css/font-awesome.css" rel="stylesheet" />
    <link href="../resources/css/lrstyle.css" rel="stylesheet" />
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="logindiv">
				<!--<h4 style="color:#422874;font-size:30px;">Welcome to Prenox Hotel & Suites</h4>-->
				
				<h1 style="text-align:center; color:#333;">
<img src="../archives/<?php getbizlogo(); echo ($globalbizlogo != '')?$globalbizlogo:'noimage.png'; ?>" style="width:120px; height:120px;" /><br>
<?php echo $globalbizname; ?></h1>
				
                    <?php echo ($m != '')?'<div id="msgbox">'.$m.'</div>':''; ?>
					<div style="font-size:12px; width:80%; margin:0px auto 10px auto; color:#666; line-height:18px;">Fill the form below to login. All fields are required.</div>
        <form name="frm1x" id="frm1x" action="" method="post">
	<input type="hidden" name="dwat" value="stafflogin">
          <div>
			   <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="text" class="form-control" name="username" placeholder="Username or Email" style="padding:25px 15px; font-size:16px;">
             </div>
		  </div>
		  
          <div>
                 <div class="form-group input-group" style="width:100%;">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
            <input type="password" class="form-control" name="password" placeholder="Password" style="padding:25px 15px; font-size:16px;">
			 <input type="hidden" name="accttype" id="accttype" value="staff">
             </div>
		  </div>
        
		  <!--<a href="#">Forgot Your Password?</a>-->  
          <div class="row">
            <div class="col-lg-12">
              <button type="submit" name="submit" class="btn btn-lg btn-danger btn-block btn-flat" style="position:relative; margin-top:10px;">LOG IN</button>
            </div>
          </div>
        </form>
		</div>
        
		<div style="text-align:center;font-size:11px;width:300px;margin:10px auto; line-height:18px; color:#f9f9f9;">Copyright &copy; 2018 Hotel Management System. All rights reserved. <a href="http://www.progmatech.com" target="_blank" style="text-decoration:underline;color:#ff0;">Site Credit</a></div>        

            </div>
        </div>
    </div>
    
    <!--<script src="../resources/js/jquery-1.11.1.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>-->
<style>
body{overflow:auto;}
.wrapper{background-color: #21D4FD;background-image: linear-gradient(180deg, #21D4FD 0%, #B721FF 100%); height:100vh; margin:0; padding:0;}
#loading{ position:fixed; top:49%;left:49%; padding:5px 5px; background:none; border-radius:3px;display:none; z-index:2000;}
.logindiv{ margin:8% auto 0 auto; width:400px;background:rgba(255,255,255,0.9);padding:20px; border-radius:5px; text-align:center;}
@media screen and (max-width: 600px) {
body{background-size:100% 200%;}
.logindiv{ margin:20% auto 0 auto;  width:75%;}
}
</style>

<span id="loading"><img src="../fxn/loading.gif" /></span>

    <script src="../plugins/jQuery/jquery.1.9.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../fxn/psjquery.js"></script>
	
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
