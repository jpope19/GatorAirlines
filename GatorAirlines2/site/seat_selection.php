<?php

header("Content-type: text/javascript");

// This user will also be used in most of the referenced php files here
include("classes/users.class.php");
$users = new users(); // class from user.class.php that will be used to manipulate the database
session_start();
//When this page is linked up to the site when a customer
//goes to the selection page, I need a variable $POST that
//contains the flight id.
//
$array_id = $_SESSION['id_array'];
$num = $_SESSION['id'];
$num = $num -1;
$reserved_seats = $users->get_seat($array_id[$num]); 
//$reserved_seats = $users->get_seat($_POST['button']);
$length = count($reserved_seats);
$array = array($reserved_seats);
for($i=0; $i < $length; $i++){
	$array[$i] = $reserved_seats[$i]['seat_id'];
}
echo json_encode($array);



 ?>


 
 
 