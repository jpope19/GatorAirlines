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
	if ($_POST['modTicket']=="")
	{// no one chosen
		echo "Please select a ticket to modify";
	}
	else
	{// ticket chosen
		if (isset($_POST['cidBox']))
		{// first name checked
			$set['cid'] = $_POST['cid'];
		}
		if (isset($_POST['flight_idBox']))
		{// last name checked
			$set['flight_id'] = $_POST['flight_id'];
		}
		if (isset($_POST['seat_idBox']))
		{// seat_id checked
			$set['seat_id'] = $_POST['seat_id'];
		}
		if (isset($_POST['priceBox']))
		{// priceess checked
			$set['price'] = $_POST['price'];
		}
		
		
		// The code does not validate the inputs. will need to make sure that the 
		// inputs are valid and that they do not conflict with the DB
		$key = $_POST['modTicket'];
		$users->modify_tickets($set, $key);
	}
}

?>
<!-- Some javascript to enable/disable text boxes based on check boxes -->
<script language="javascript">
    function enableDisable(bEnable, textBoxID)
    {
         document.getElementById(textBoxID).disabled = !bEnable;
    }
</script>

<li>Which user would you like to modify?</li>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
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
		Customer ID: <input type="text" name="cid" disabled="disabled" id="cid">
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="flight_idBox" id="last_idBox" onClick="enableDisable(this.checked, 'flight_id')" />
	</td>
	<td>
		Flight ID: <input type="text" name="flight_id" disabled="disabled" id="flight_id" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="seat_idBox" id="seat_idBox" onClick="enableDisable(this.checked, 'seat_id')" />
	</td>
	<td>
		Seat ID: <input type="seat_id" name="seat_id" disabled="disabled" id="seat_id" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="priceBox" id="priceBox" onClick="enableDisable(this.checked, 'price')" />
	</td>
	<td>
		Price: <input type="text" name="price" disabled="disabled" id="price" >
	</td> </br>
</tr>
</br> <input type="submit" name="ModifyTicketSubmit" /> 
</form>