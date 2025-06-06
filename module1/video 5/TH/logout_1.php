<?php
session_start();
session_destroy(); 
setcookie('src',1,1);
setcookie('src2',$_SESSION['username_login'],1); 
header('location: login1.php');
exit;
?>