<?php
session_destroy();
setcookie("user","",time() - 3600,"/");
setcookie("pass","",time() - 3600,"/");

header('location: login-user.php');
?>