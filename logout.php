<?php
session_start();
$_SESSION=[];
session_unset();
session_destroy();
header("location: halaman_login/login.php");
exit;
?>