<!-- Produce the Add Tickets form -->
<?php
/*
CREATE table if not exists tickets 
(
		ticket_id int auto_increment primary key,
		cid int,
		flight_id int,
		seat_id int,
		price int(4)  
);   
*/
// Code for when submit button is hit

if (isset($_POST['AddTicketSubmit']))
{
	// Save Radio State
	$_SESSION['AdminStyle']="Admin";
	$_SESSION['table']="Ticket";
	$_SESSION['action']="Add";
	
	// Filter form
	if ((empty($_POST['cid'])) || (empty($_POST['flight_id'])) || (empty($_POST['seat_id'])) ||	(empty($_POST['price'])))
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
		$numeric = '/^[0-9]+$/';
		
		if (preg_match($numeric,$_POST['cid']) == 0 || strlen($_POST['cid']) > 30)
		{// acid is not valid
			$message .=  "Customer ID is not valid\n";
			$flag = 1;
		}
		if (preg_match($numeric,$_POST['flight_id']) == 0 || strlen($_POST['flight_id']) > 30)
		{// First name is not valid
			$message .=  "Flight ID is not valid\n";
			$flag = 1;
		}
		if (preg_match($numeric,$_POST['seat_id']) == 0 || strlen($_POST['seat_id']) < 3 || strlen($_POST['seat_id']) > 3)
		{// Password is not valid
			$message .=  "Seat ID is not valid\n";
			$flag = 1;
		}
		if (preg_match($numeric,$_POST['price']) == 0 || strlen($_POST['price']) > 30)
		{// Address is not valid
			$message .=  "Price is not valid\n";
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
				"cid"=>$_POST['cid'],
				"flight_id"=>$_POST['flight_id'],
				"seat_id"=>$_POST['seat_id'],
				"price"=>$_POST['price'],
			);
			$users->add_tickets($record);
		}// end else
	}// end else
}
?>
<!-- Jquery that uses Validation plugin to validate form on client side -->
<script type="text/javascript" src="js/admin/ValidateTicket.js"></script>

<form id="AddTicketForm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
Customer ID: <input type="text" class="required" name="cid" /> </br>
Flight ID: <input type="text" class="required" name="flight_id" /> </br>
Seat ID: <input type="text" class="required" name="seat_id" /> </br>
Price: <input type="text" class="required" name="price" /> </br>
<input type="submit" name="AddTicketSubmit"/>
</form>