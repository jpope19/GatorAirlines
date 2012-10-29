<!-- Produce the Add Airport form -->
<?php
/*
CREATE table if not exists airports 
(
	airport_id int auto_increment primary key,
	city varchar(40),
	state varchar(2),
	iata varchar(3),
	name varchar(65)  
); 
*/
// Code for when submit button is hit

if (isset($_POST['AddAirportSubmit']))
{
	// Save Radio State
	$_SESSION['AdminStyle']="Admin";
	$_SESSION['table']="Airport";
	$_SESSION['action']="Add";
	
	// Filter form
	if ((empty($_POST['city'])) || (empty($_POST['state'])) || (empty($_POST['iata'])) ||	(empty($_POST['name'])))
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
		$alphabet = '/^[A-Za-z]+$/';
		$capAlphabet = '/^[A-Z]+$/';
		$name = '/^[A-Za-z ]+$/';
		
		if (preg_match($alphabet,$_POST['city']) == 0 || strlen($_POST['city']) > 30)
		{// acity is not valid
			$message .=  "City is not valid\n";
			$flag = 1;
		}
		if (preg_match($alphabet,$_POST['state']) == 0 || strlen($_POST['state']) > 30)
		{// First name is not valid
			$message .=  "State is not valid\n";
			$flag = 1;
		}
		if (preg_match($capAlphabet,$_POST['iata']) == 0 || strlen($_POST['iata']) < 3 || strlen($_POST['iata']) > 3)
		{// Password is not valid
			$message .=  "IATA is not valid\n";
			$flag = 1;
		}
		if (preg_match($name,$_POST['name']) == 0 || strlen($_POST['name']) > 30)
		{// Address is not valid
			$message .=  "Name is not valid\n";
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
			$record = array
			(
				"city"=>$_POST['city'],
				"state"=>$_POST['state'],
				"iata"=>$_POST['iata'],
				"name"=>$_POST['name'],
			);
			$users->add_airports($record); // add_airports is a function that comes from the users class in users.class.php
		}// end else
	}// end else
}// end if
?>
<!-- Jquery that uses Validation plugin to validate form on client side -->
<script type="text/javascript" src="../js/admin/ValidateAirport.js"></script>

<form id="AddAirportForm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
City: <input type="text" class="required" name="city" /> </br>
State: <input type="text" class="required" name="state" /> </br>
IATA: <input type="text" class="required" name="iata" /> </br>
Airport Name: <input type="text" class="required" name="name" /> </br>
<input type="submit" name="AddAirportSubmit"/>
</form>