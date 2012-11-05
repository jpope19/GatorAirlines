<?php
session_start();
include("classes/users.class.php");
/*
$user = $_SESSION['u_type'];
echo $user;
Print_r ($_SESSION);
*/

$users = new users();
/*
$record['email'] = "cavasquez@ufl.edu";
$record['first_name'] = "Carlos";
$record['last_name'] = "Vasquez";
$record['password'] = "password";
$record['addr'] = "123 4th St";
$record['city'] = "Gainesville";
$record['state'] = "FL";
$record['zip'] = "33029";
$record['cc_num'] = "341335673042097";
$record['u_type'] = "1";
*/
$key = 433;
$record['password'] = "password";

//$res = $users->db_conflicts_customers ($record);
//$test = $users->email_exists($record['email']);
//echo $res;
//echo $test;
//$test = $users->db_conflicts_customers($record, $key);
//echo $test;
$test = $users->modify_customers($record, $key);


?>


