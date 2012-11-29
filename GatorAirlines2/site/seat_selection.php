<?php
session_start();
header("Content-type: text/javascript");

// This user will also be used in most of the referenced php files here
include("classes/users.class.php");
$users = new users(); // class from user.class.php that will be used to manipulate the database

//When this page is linked up to the site when a customer
//goes to the selection page, I need a variable $POST that
//contains the flight id.
//

$num = trim($_SESSION['leave_ids']);
$id_array = explode("_", $num);
$this_id = $id_array[0];
$reserved_seats = $users->get_seat($this_id);
$length = count($reserved_seats);
$array = array($reserved_seats);
for($i=0; $i < $length; $i++){
	$array[$i] = $reserved_seats[$i]['seat_id'];
}
echo json_encode($array);


/*
	passengers!
	$record = array();
	$record['cid']
	$record['seat_id']
	
	if(isset($_SESSION['leave_ids'])){
		$ids = trim($_SESSION['leave_ids']);
		$id_array = explode(" ", $ids);
		foreach($id_array as $new_fid){
			$record['price']
			$record['flight_id']
			//insert
		}
	}
	if(isset($_SESSION['return_ids'])){
		$ids = trim($_SESSION['leave_ids']);
		$id_array = explode(" ", $ids);
		foreach($id_array as $new_fid){
			$record['price']
			$record['flight_id']
			//insert
		}
	}

	
*/
 ?>


 
 
 