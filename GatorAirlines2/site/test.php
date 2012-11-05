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
// $record['cid'] = 5;
// $record['travel_distance'] = 14;
// $set['email'] = 'cavasquez@ufl.edu';
$set['password'] = 'password';
$key = 500;
$email = 'cavasquez@ufl.edu';
$password = $set['password'];
// $record['points_left'] = 20;
// $record['price'] = 10;
// $record['coach_class_cost'] = 100;
// $record['e_depart_time'] = 65464954;
// $record['e_arrival_time'] = 464984984;
// $record['depart_time'] = 65464954;
// $record['arrival_time'] = 464984984;
// $record['distance'] = 5000;

$salt1 = $users->get_salt($key);
// echo $salt[0]['salt'];
$set['password'] = $users->generateHash($set['password'], $salt1[0]['salt']);
 // Print_r ($test);
// echo $set['password'];

$cid = $users->get_cid($email);
$salt2 = $users->get_salt($cid[0]['cid']);
$password = $users->generateHash($password, $salt2[0]['salt']); // hash the password to compare it to the "real" hashed password
echo $password;

?>


