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
	if ((empty($_POST['plane_id'])) || (empty($_POST['org_id'])) || (empty($_POST['dest_id'])) || (empty($_POST['first_class_cost'])) ||	(empty($_POST['coach_class_cost'])) || (empty($_POST['e_depart_time'])) || (empty($_POST['e_arrival_time'])) || (empty($_POST['distance'])))
	{
		print "<script type=\"text/javascript\">"; 
		print "alert('Please fill out all fields.')"; 
		print "</script>"; 
	}// end if
	else
	{	
		$flag = 0; // flag to check for input errors.
		$message = ""; // message to be given to user if errors are detected.
		
		// Declare rules (patterns) to be evaluated by preg_match
		$timeDate = '/^[A-Za-z0-9 ]+$/';
		$numeric = '/^[0-9]+$/';
		
		if (preg_match($numeric,$_POST['plane_id']) == 0 || strlen($_POST['plane_id']) > 30)
		{// plane_id is not valid
			$message .=  "Plane ID is not valid\n";
			$flag = 1;
		}
		if (preg_match($numeric,$_POST['org_id']) == 0 || strlen($_POST['org_id']) > 30)
		{// First name is not valid
			$message .=  "organization ID is not valid\n";
			$flag = 1;
		}
		if (preg_match($numeric,$_POST['dest_id']) == 0 || strlen($_POST['dest_id']) > 30)
		{// last name is not valid
			$message .=  "Destination ID is not valid\n";
			$flag = 1;
		}
		if (preg_match($numeric,$_POST['first_class_cost']) == 0 || strlen($_POST['first_class_cost']) > 30)
		{// Password is not valid
			$message .=  "First class cost is not valid\n";
			$flag = 1;
		}
		if (preg_match($numeric,$_POST['coach_class_cost']) == 0 || strlen($_POST['coach_class_cost']) > 30)
		{// Address is not valid
			$message .=  "Coach class cost is not valid\n";
			$flag = 1;
		}
		if (preg_match($timeDate,$_POST['e_depart_time']) == 0 || strlen($_POST['e_depart_time']) > 30)
		{// City is not valid
			$message .=  "Estimated departure time is not valid\n";
			$flag = 1;
		}
		if (preg_match($timeDate,$_POST['e_arrival_time']) == 0 || strlen($_POST['e_arrival_time']) > 30)
		{// State is not valid
			$message .=  "Estimated arrival time is not valid\n";
			$flag = 1;
		}
		if (preg_match($numeric,$_POST['distance']) == 0 || strlen($_POST['distance']) > 30)
		{// Zip is not valid
			$message .=  "Distance is not valid\n";
			$flag = 1;
		}
		
		// Deal with errors or lack of errors
		if ($flag == 1)
		{// Notify user that there were errors
			print "<script type=\"text/javascript\">"; 
			print "alert('There were errors in your input.')"; 
			print "</script>";
		}// end if
		else
		{// All fields are valid, put into database
			// For the future, will have to hash and salt first_class_cost
			// Also will need to check for existing plane_ids
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
	}// end else
}
?>
<!-- Jquery that uses Validation plugin to validate form on client side -->
<script type="text/javascript" src="js/admin/ValidateFlight.js"></script>

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