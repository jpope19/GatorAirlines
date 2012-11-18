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
$reserved_seats = $users->get_seat($_SESSION["F"]); 
//$reserved_seats = $users->get_seat($_POST['button']);
$length = count($reserved_seats);
$array = array($reserved_seats);
for($i=0; $i < $length; $i++){
	$array[$i] = $reserved_seats[$i]['seat_id'];
}
echo json_encode($array);



//This is a test array commet everything below and uncommet above
//once this page has been linked.
// $array = array( 
	
		// "number" => "1",
		// "num" => "2"
	
// );

// echo json_encode($array);
 ?>


 
 
 