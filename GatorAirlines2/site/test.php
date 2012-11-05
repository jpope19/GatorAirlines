<?php
session_start();
include("classes/users.class.php");
/*
$user = $_SESSION['u_type'];
echo $user;
Print_r ($_SESSION);
*/

$users = new users();

$key = 103;
// $record['airport_id'] = "";
 $record['city'] = "Tallahassee";
//$record['state'] = "FL";
 $record['iata'] = "MSY";
//$record['name'] = "Gainesville International Airport";

//$test = $users->db_conflicts_airports($record);
//$test = $users->db_conflicts_airports($record, $key);
//$test = $users->add_airports($record);
$test = $users->modify_airports($record, $key);

echo $test;

?>


