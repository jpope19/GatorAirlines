<?php
session_start();
include("classes/users.class.php");
/*
$user = $_SESSION['u_type'];
echo $user;
Print_r ($_SESSION);
*/
$users = new users();
$testvar = "cavasquez@ufl.edu";
//$test = $users->email_exists($testvar);
//echo $test;
//echo $test[0]['COUNT(email)'];
//Print_r($test);
$message = "hello";
if (isset($test) && $test == 1)
{
	echo 'yes';
}
else
{
	echo 'no';
}


?>


