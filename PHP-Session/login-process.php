<?php
session_start();

$_SESSION["username"] 	= $_POST['username'];
$_SESSION["email"] 	= $_POST['email'];

//session_regenerate_id();
$_SESSION["id"] 		= session_id();
$_SESSION["name"] 		= session_name();
$_SESSION["save_path"] 		= session_save_path();
$_SESSION["module_name"] 	= session_module_name();
$_SESSION["cookie_params"] 	= session_get_cookie_params();
$_SESSION["cache_limiter"]	= session_cache_limiter();
$_SESSION["cache_expire"] 	= session_cache_expire();
$_SESSION["status"] 		= session_status();

header("Location: index.php");
?>