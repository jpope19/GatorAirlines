<!-- Produce the Add Airplanes form -->
<?php
/*
CREATE table if not exists airplanes 
(
	plane_id int auto_increment primary key,
	type varchar(40),
	chart_addr varchar(50),
	num_first_class int(3),
	num_coach_class int(3)  
);  
*/
// Code for when submit button is hit

if (isset($_POST['AddAirplaneSubmit']))
{
	// Save Radio State
	$_SESSION['AdminStyle']="Admin";
	$_SESSION['table']="Airplane";
	$_SESSION['action']="Add";
	
	// Filter form
	if ((empty($_POST['type'])) || (empty($_POST['chart_addr'])) || (empty($_POST['num_first_class'])) || (empty($_POST['num_coach_class'])))
	{
		echo "Please fill out all fields";
	}// end if
	else
	{	
		// All fields are valid, put into database
		// Have to validate the inputs and make sure there are no conflicts in DB and
		// That they are valid inputs
		$record = array
		(
			"type"=>$_POST['type'],
			"chart_addr"=>$_POST['chart_addr'],
			"num_first_class"=>$_POST['num_first_class'],
			"num_coach_class"=>$_POST['num_coach_class'],
		);
		$users->add_airplane($record);

	}// end else
}
?>
<!-- Jquery that uses Validation plugin to validate form on client side -->
<script type="text/javascript" src="../js/admin/ValidateAirplane.js"></script>

<form id="AddAirplaneForm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
Type of Plane: <input type="text" class="required" name="type" /> </br>
Chart Address: <input type="text" class="required" name="chart_addr" /> </br>
Number of First Class Seats: <input type="text" class="required" name="num_first_class" /> </br>
Number of Coach Class Seats: <input type="text" class="required" name="num_coach_class" /> </br>
<input type="submit" name="AddAirplaneSubmit"/>
</form>