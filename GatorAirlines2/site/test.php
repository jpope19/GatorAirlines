<?php
session_start();
include("classes/users.class.php");
/*
$user = $_SESSION['u_type'];
echo $user;
Print_r ($_SESSION);
*/

$users = new users();

$key = 2;
$record['type'] = "B50";
// $record['chart_addr'] = "Tallahassee";
// $record['num_first_class'] = 10;
// $record['num_coach_class'] = 100;
// $record['name'] = "Gainesville International Airport";

//$test = $users->db_conflicts_airplanes($record);
//$test = $users->db_conflicts_airplanes($record, $key);
// $test = $users->add_airplane($record);
$test = $users->modify_airplanes($record, $key);

echo $test;

?>


