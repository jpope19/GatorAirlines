<!-- Produce the Modify Tickets form -->
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
// Get the ticket_ids of the users from the database
foreach($tickets as $ticket)
{
	$option .= "<option value=\"" . $ticket["ticket_id"] . "\">" . $ticket["ticket_id"] . "</option>";
}// end loop

if (isset($_POST['ModifyTicketSubmit']))
{
	// Save Radio State
	$_SESSION['AdminStyle']="Admin";
	$_SESSION['table']="Ticket";
	$_SESSION['action']="Modify";
	
	// Process submit
	if ($_POST['modAirport']=="")
	{// no one chosen
		print "<script type=\"text/javascript\">"; 
		print "alert('No airport was chosen to modify.')"; 
		print "</script>"; 
	}
	else
	{// customer chosen
		$flag = 0; // flag to check for input errors.
		$message = ""; // message to be given to user if errors are detected.
		
		// Declare rules (patterns) to be evaluated by preg_match
		$numeric = '/^[0-9]+$/';
		
		if (isset($_POST['cidBox']))
		{// acid checked
			if (preg_match($numeric,$_POST['cid']) == 0 || strlen($_POST['cid']) > 30)
			{// acid is not valid
				$message .=  "Customer ID is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['cid'] = $_POST['acid'];
			}
		}
		if (isset($_POST['flight_idBox']))
		{// first name checked
			if (preg_match($numeric,$_POST['flight_id']) == 0 || strlen($_POST['flight_id']) > 30)
			{// First name is not valid
				$message .=  "Flight ID is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['flight_id'] = $_POST['aflight_id'];
			}
		}
		if (isset($_POST['seat_idBox']))
		{// seat_id checked
			if (preg_match($numeric,$_POST['seat_id']) == 0 || strlen($_POST['seat_id']) < 0 || strlen($_POST['seat_id']) > 3)
			{// Password is not valid
				$message .=  "Seat ID is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['seat_id'] = $_POST['seat_id'];
			}
		}
		if (isset($_POST['priceBox']))
		{// nameess checked
			if (preg_match($numeric,$_POST['price']) == 0 || strlen($_POST['price']) > 30)
			{// Address is not valid
				$message .=  "Price is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['price'] = $_POST['price'];
			}
		}
		
		// Still need to verify that acid does not exist in DB
		// Update database
		if($flag ==1)
		{// There are errors in input, Notify user that there were errors
			print "<script type=\"text/javascript\">"; 
			print "alert('There were errors in your input.')"; 
			print "</script>";
		}// end if
		else if (!isset($set))
		{// Alert that no modification has been made
			print "<script type=\"text/javascript\">"; 
			print "alert('No modifications were made because no options were chosen.')"; 
			print "</script>";  		
		}// end else if
		else
		{// Valid and existent inputs, modify DB
		// Still have to verify against DB items
			$key = $_POST['modTicket'];
			$users->modify_tickets($set, $key);
		}// end else
	}// end else
}

?>
<!-- Some javascript to enable/disable text boxes based on check boxes -->
<script language="javascript">
    function enableDisable(bEnable, textBoxID)
    {
         document.getElementById(textBoxID).disabled = !bEnable;
    }
</script>

<!-- Jquery that uses Validation plugin to validate form on client side -->
<script type="text/javascript" src="js/admin/ValidateTicket.js"></script>

<li>Which user would you like to modify?</li>
<form id="ModifyTicketForm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<select data-placeholder="Choose a ticket (ticket_id)" name="modTicket" class="chosen" style="width:350px;">
		<option value=""></option>
		<?php echo $option; ?>           
	</select>
<li>Which fields would you like to modify from this user?:</li>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="cidBox" id="cidBox" onClick="enableDisable(this.checked, 'cid')" />
	</td>
	<td>
		Customer ID: <input type="text" class="required" name="cid" disabled="disabled" id="cid">
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="flight_idBox" id="last_idBox" onClick="enableDisable(this.checked, 'flight_id')" />
	</td>
	<td>
		Flight ID: <input type="text" class="required" name="flight_id" disabled="disabled" id="flight_id" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="seat_idBox" id="seat_idBox" onClick="enableDisable(this.checked, 'seat_id')" />
	</td>
	<td>
		Seat ID: <input type="text" class="required" name="seat_id" disabled="disabled" id="seat_id" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="priceBox" id="priceBox" onClick="enableDisable(this.checked, 'price')" />
	</td>
	<td>
		Price: <input type="text" class="required" name="price" disabled="disabled" id="price" >
	</td> </br>
</tr>
</br> <input type="submit" name="ModifyTicketSubmit" /> 
</form>