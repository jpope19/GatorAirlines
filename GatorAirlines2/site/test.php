<?php
session_start();
include("classes/users.class.php");
/*
$user = $_SESSION['u_type'];
echo $user;
Print_r ($_SESSION);
*/

$users = new users();

$key = 1;
$record['cid'] = 5;
$record['travel_distance'] = 14;
// $record['points_left'] = 20;
// $record['price'] = 10;
// $record['coach_class_cost'] = 100;
// $record['e_depart_time'] = 65464954;
// $record['e_arrival_time'] = 464984984;
// $record['depart_time'] = 65464954;
// $record['arrival_time'] = 464984984;
// $record['distance'] = 5000;

// $test = $users->db_conflicts_vip($record);
//$test = $users->db_conflicts_vip($record, $key);
// $test = $users->add_vip($record);
$test = $users->modify_vip($record, $key);

echo $test;

?>


