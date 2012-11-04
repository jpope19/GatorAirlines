<?php


include("classes/users.class.php");
$users = new users(); // class from user.class.php that will be used to manipulate the database
	
//When this page is linked up to the site when a customer
//goes to the selection page, I need a variable $POST that
//contains the flight id.
//
$reserved_seats = $users->get_seat(10);
$length = count($reserved_seats);
$array = array($reserved_seats);
//Print_r($array);
//Print_r($reserved_seats);
for($i=0; $i < $length; $i++){
	$array[$i] = $reserved_seats[$i]['seat_id'];
}
//echo json_encode($array[0]);
Print_r($array);

$arrayq = array( 
	
		"number" => "1",
		"num" => "2"
	
);
Print_r($arrayq);
?>


