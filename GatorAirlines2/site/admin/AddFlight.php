<!-- Produce the Add Flight form -->
<?php
/*
CREATE table if not exists flights 
(
	flight_id int auto_increment primary key,
	plane_id int,
	org_id int,
	dest_id int,
	first_class_cost int(4),
	coach_class_cost int(4),
	e_depart_time varchar(30),
	e_arrival_time varchar(30),
	depart_time varchar(30),
	arrival_time varchar(30),
	distance int(5)
);
*/
// Code for when submit button is hit

if (isset($_POST['AddFlightSubmit']))
{
	// Save Radio distance
	$_SESSION['AdminStyle']="Admin";
	$_SESSION['table']="Flight";
	$_SESSION['action']="Add";
	
	// Filter form
	if ((empty($_POST['plane_id'])) || (empty($_POST['org_id'])) || (empty($_POST['dest_id'])) || (empty($_POST['first_class_cost'])) || (empty($_POST['coach_class_cost'])) ||	(empty($_POST['e_depart_time'])) || (empty($_POST['e_arrival_time'])) || (empty($_POST['distance'])))
	{
		echo "Please fill out all fields";
	}// end if
	else
	{	
		// Have to validate fields and make sure there are no DB conflicts
		// Do this in the future
		$record = array
		(
			"plane_id"=>$_POST['plane_id'],
			"org_id"=>$_POST['org_id'],
			"dest_id"=>$_POST['dest_id'],
			"first_class_cost"=>$_POST['first_class_cost'],
			"coach_class_cost"=>$_POST['coach_class_cost'],
			"e_depart_time"=>$_POST['e_depart_time'],
			"e_arrival_time"=>$_POST['e_arrival_time'],
			"distance"=>$_POST['distance'],
		);
		$users->add_Flights($record);
		
	}// end else
}
?>
<!-- Jquery that uses Validation plugin to validate form on client side -->
<script type="text/javascript" src="../js/admin/ValidateFlight.js"></script>

<form id="AddFlightForm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
Plane ID: <input type="text" class="required" name="plane_id" /> </br>
Organization ID: <input type="text" class="required" name="org_id" /> </br>
Destination ID: <input type="text" class="required" name="dest_id" /> </br>
First Class Cost: <input type="text" class="required" name="first_class_cost" /> </br>
Coach Class Cost: <input type="text" class="required" name="coach_class_cost" /> </br>
Estimated Departure Time: <input type="text" class="required" name="e_depart_time" /> </br>
Estimated Arrival Time: <input type="text" class="required" name="e_arrival_time" /> </br>
Distance: <input type="text" class="required" name="distance" /> </br>
<input type="submit" name="AddFlightSubmit"/>
</form>