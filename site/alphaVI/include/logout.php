<?php session_start(); ?>
hello world
<?php 

$_SESSION['username'] = null;
$_SESSION['email'] = null;
$_SESSION['user_role'] = null;
 

header("Location: systemLogin.php")


?>