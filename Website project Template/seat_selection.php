<?php

header("Content-type: text/javascript");

// This user will also be used in most of the referenced php files here
include("../classes/users.class.php");
$users = new users(); // class from user.class.php that will be used to manipulate the database
	
//$reserved_seats = $users->get_tickets_seat($POST);

//echo json_encode($reserved_seats);

$array = array( "number" => "1");

echo json_encode($array);
 ?>
 

 
 
 