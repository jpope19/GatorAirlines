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
$record['plane_id'] = 3;
$record['org_id'] = 17;
$record['dest_id'] = 10;
$record['first_class_cost'] = 10;
$record['coach_class_cost'] = 100;
$record['e_depart_time'] = 65464954;
$record['e_arrival_time'] = 464984984;
$record['depart_time'] = 65464954;
$record['arrival_time'] = 464984984;
$record['distance'] = 5000;

// $test = $users->db_conflicts_flights($record);
//$test = $users->db_conflicts_flights($record, $key);
// $test = $users->add_flight($record);
// $test = $users->modify_flights($record, $key);

echo $test;

?>


