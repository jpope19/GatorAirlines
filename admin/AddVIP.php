<?php

	


// Code for when submit button is hit
if (isset($_POST['AddVIPSubmit']))
{
	//Save Radio State
	$_SESSION['AdminStyle']="Admin";
	$_SESSION['table']="VIP";
	$_SESSION['action']="Add";
	
	//Filter form
	if ( (empty($_POST['email'])) || (empty($_POST['totalDistanceTraveled'])) || (empty($_POST['rewardPoints'])) || (empty($_POST['joinDate'])))
	{
		print "<script type=\"text/javascript\">";
		print "alert('Please fill out all fields.')";
		print "</script>";
	}
	else 
	{
		$flag = 0;	//flag to check for input errors.
		$message = "";	//message to be given to user if errors are detected.
		
		//Declare rules (pattern) to be evaluated by preg_match
		$alphabet = '/^[A-Za-z]+$/';
		$alphaNumeric = '/^[A-Za-z0-9]+$/';
		$numeric = '/^[0-9]+$/';
		$address = '/^[A-Za-z0-9 ]+$/';
		$name = '/^[A-Za-z ]+$/';
		$date = '/^(1[0-2]|0?[1-9])/(3[01]|[12][0-9]|0?[1-9])/(?:[0-9]{2})?[0-9]{2}$/';
		
		
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		{
			//email is not valid
			$message .= "E-mail is not valid\n";
			$flag = 1;
		}
		if (preg_match($numeric, $_POST['totalDistanceTraveled']) < 0)
		{
			//total distance is not valid, ie. it is a negative number
			//COME BACK TO MODIFY WHEN VIP STANDARDS ARE SET!!!!
			$message .= "Total Distance is not valid\n";
			$flag = 1;
		}
		if (preg_match($numeric, $_POST['rewardPoints']) < 0)
		{
			//reward points is not valid
			$message .= "Reward Points are not valid\n";
			$flag = 1;
		}
		//NEED TO DO ERROR CHECKING FOR JOIN DATE
		
		if (preg_match($date))
		{
			//join date is not valid
			$message .= "Join date is not valid\n";
			$flag = 1;
		}
		
		
		//Deal with errors or lack of errors
		if ($flag == 1)
		{
			//Notify user that there were errors
			print "<script type=\"text/javascript\">";
			print "alert('There were errors in your input.')";
			print "</script>";
		}
		else 
		{
			//All fields are valid, put into database
			//Need to check for existing emails
			$record = array
			(
				"email"=>$_POST['email'],
				"totalDistanceTraveled"=>$_POST['totalDistanceTraveled'],
				"rewardPoints"=>$_POST['rewardPoints'],
				"joinDate"=>$_POST['joinDate']
			);
			//add_vip is a function that comes from the users class in users.class.php
			$user->add_vip($record);
		}
	}
}
?>

<head>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
    <script>
    $(function() {
        $( "#date" ).datepicker();
    });
    </script>
</head>

<form id="AddVIPForm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
Email: <input type="text" class="required email" name="email" /> </br>
Total Distance Traveled: <input type="text" class="required" name="totalDistanceTraveled" /> </br>
Reward Points: <input type="text" class="required" name="rewardPoints" /> </br>
Join Date: <input type="text" class="required" name="joinDate" id="date" /> </br>
<input class="submit" type="submit" name="AddVIPSubmit"/>
</form>

		
		