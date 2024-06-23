<?php
//session_start();
//session_regenerate_id(false); //true

$secure = false; // Set to true if using https else leave as false
session_name('bhmsid');
ini_set("session.use_cookies", 1);
ini_set("session.cookie_httponly", 1);
ini_set('session.use_only_cookies', 1); // Forces sessions to only use cookies. 
ini_set('session.entropy_file', '/dev/urandom'); // better session id's
ini_set('session.entropy_length', '512'); // and going overkill with entropy length for maximum security
ini_set('session.cookie_lifetime', 1209600); //24 hours 3600*24*7*2 = 604800.
ini_set('session.gc_maxlifetime', 1209600);

$params = session_get_cookie_params(); // Gets current cookies params.
//session_set_cookie_params($params["lifetime"], $params["path"], $params["domain"], $params["secure"], $params["httponly"]); 
setcookie(session_name(), session_id(), time() + 1209600);
$sessParams = 'Session Lifetime: '.$params["lifetime"];

//session_start();
//session_regenerate_id(true);

?>