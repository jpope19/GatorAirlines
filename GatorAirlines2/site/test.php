<?php
session_start();
include("classes/users.class.php");
/*
$user = $_SESSION['u_type'];
echo $user;
Print_r ($_SESSION);
*/

$users = new users();

$key = 5;
$record['cid'] = 10;
$record['flight_id'] = 14;
$record['seat_id'] = 15;
$record['price'] = 10;
// $record['coach_class_cost'] = 100;
// $record['e_depart_time'] = 65464954;
// $record['e_arrival_time'] = 464984984;
// $record['depart_time'] = 65464954;
// $record['arrival_time'] = 464984984;
// $record['distance'] = 5000;

//$test = $users->db_conflicts_tickets($record);
//$test = $users->db_conflicts_tickets($record, $key);
// $test = $users->add_tickets($record);
$test = $users->modify_tickets($record, $key);

echo $test;

?>


