<!-- Produce the Delete Tickets form -->
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
$option = "";
// Get the emails of the users from the database
foreach($tickets as $ticket)
{
	$option .= "<option value=\"" . $ticket["ticket_id"] . "\">" . $ticket["ticket_id"] . "</option>";
}// end loop

if (isset($_POST['DeleteTicketSubmit']))
{
	// Save Radio State
	$_SESSION['AdminStyle']="Admin";
	$_SESSION['table']="Ticket";
	$_SESSION['action']="Delete";
	
	// Process button
	if(isset($_POST['delTicket']))
	{
		foreach($_POST['delTicket'] as $del)
		{
			$users->delete_tickets($del);
		}
	}
	else
	{
		echo "No ticket(s) selected";
	}
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<select data-placeholder="Choose a ticket (ticket ID)" name="delTicket[]" if="delTicket" class="chosen" multiple style="width:350px;">
		<option value=""></option>
		<?php echo $option; ?>           
	</select>
	</br> <input type="submit" name="DeleteTicketSubmit"/> 
</form>