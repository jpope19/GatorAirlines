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
	if ((empty($_POST['type'])) || (empty($_POST['chart_addr'])) || (empty($_POST['num_first_class'])) ||	(empty($_POST['num_coach_class'])))
	{
		print "<script type=\"text/javascript\">"; 
		print "alert('Please fill out all fields.')"; 
		print "</script>"; 
	}// end if
	else
	{	
		$flag = 0; // flag to check for input errors.
		$message = ''; // message to be given to user if errors are detected.
		
		// Declare rules (patterns) to be evaluated by preg_match
		$alphabet = '/^[A-Za-z]+$/';
		$capAlphabet = '/^[A-Z]+$/';
		$numeric = '/^[0-9]+$/';
		
		if (preg_match($alphabet,$_POST['type']) == 0 || strlen($_POST['type']) > 30)
		{// type is not valid
			$message = 'Type is not valid\n';
			$flag = 1;
		}
		if (preg_match($alphabet,$_POST['chart_addr']) == 0 || strlen($_POST['chart_addr']) > 30)
		{// First name is not valid
			$message = 'Chart Address is not valid\n';
			$flag = 1;
		}
		if (preg_match($numeric,$_POST['num_first_class']) == 0 || strlen($_POST['num_coach_class']) > 30)
		{// Password is not valid
			$message = 'The number of first class is not valid\n';
			$flag = 1;
		}
		if (preg_match($numeric,$_POST['num_coach_class']) == 0 || strlen($_POST['num_coach_class']) > 30)
		{// Address is not valid
			$message = 'The number of coach class is not valid\n';
			$flag = 1;
		}
		
		// Deal with errors or lack of errors
		if ($flag == 1)
		{// Notify user that there were errors
			print "<script type=\"text/javascript\">"; 
			print "alert('$message')"; 
			print "</script>";
		}// end if
		else
		{// All fields are valid, put into database
		// Still have to check against DB for existing items
			$record = array
			(
				"type"=>$_POST['type'],
				"chart_addr"=>$_POST['chart_addr'],
				"num_first_class"=>$_POST['num_first_class'],
				"num_coach_class"=>$_POST['num_coach_class'],
			);
			$users->add_airplane($record);
		}// end else
	}// end else
}
?>
<!-- Jquery that uses Validation plugin to validate form on client side -->
<script type="text/javascript" src="js/admin/ValidateAirplane.js"></script>

<form id="AddAirplaneForm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
Type of Plane: <input type="text" class="required" name="type" /> </br>
Chart Address: <input type="text" class="required" name="chart_addr" /> </br>
Number of First Class Seats: <input type="text" class="required" name="num_first_class" /> </br>
Number of Coach Class Seats: <input type="text" class="required" name="num_coach_class" /> </br>
<input type="submit" name="AddAirplaneSubmit"/>
</form>