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
	if ((empty($_POST['cid'])) || (empty($_POST['flight_id'])) || (empty($_POST['seat_id'])) || (empty($_POST['price'])))
	{
		echo "Please fill out all fields";
	}// end if
	else
	{	
		// All fields are valid, put into database
		// Have to validate the inputs and make sure there are no conflicts
		$record = array
		(
			"cid"=>$_POST['cid'],
			"flight_id"=>$_POST['flight_id'],
			"seat_id"=>$_POST['seat_id'],
			"price"=>$_POST['price'],
		);
		$users->add_tickets($record);

	}// end else
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
CID: <input type="text" name="cid" /> </br>
Flight ID: <input type="text" name="flight_id" /> </br>
Seat ID: <input type="text" name="seat_id" /> </br>
Price: <input type="price" name="price" /> </br>
<input type="submit" name="AddTicketSubmit"/>
</form>