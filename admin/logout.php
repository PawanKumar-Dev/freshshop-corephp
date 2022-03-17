<?php 

session_start();

session_destroy();
setcookie("loginUserCookie", $username, time() - 86400 ,  "/");
setcookie("loginPassCookie", $password, time() - 86400,  "/");

header('Location: http://localhost/freshshop/login.php');
exit;

?>