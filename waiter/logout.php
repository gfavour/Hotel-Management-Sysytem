<?php 
include_once("../fxn/connection.php");
//$stc->expire();
$_SESSION = array();

if (ini_get("session.use_cookies")) {
    //$params = session_get_cookie_params();
    //setcookie(session_name(), session_id(), time() - 1209600); //, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
}

session_destroy();
redirect("index.php");
?>