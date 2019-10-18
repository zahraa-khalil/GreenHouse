

<?php
$host='localhost';
$user='greenhouse';
$password='123@gh';
$db='system2';

$con = @(mysqli_connect($host, $user, $password, $db)) ;

if(mysqli_connect_errno()==1045){
	exit('Invalid Username or Password');
	}
elseif(mysqli_connect_errno()==1049){
	exit('Unknown Database');
	}
elseif(mysqli_connect_errno()==2002){
	exit('Database Host Error');
	}

?>
