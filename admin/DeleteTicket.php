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
foreach($customers as $customer)
{
	$option .= "<option value=\"" . $customer["cid"] . "\">" . $customer["email"] . "</option>";
}// end loop

if (isset($_POST['DeleteTicketSubmit']))
{
	// Save Radio State
	$_SESSION['AdminStyle']="Admin";
	$_SESSION['table']="Customer";
	$_SESSION['action']="Delete";
	
	// Process button
	if(isset($_POST['delCustomer']))
	{
		foreach($_POST['delCustomer'] as $del)
		{
			$users->delete_customers($del);
		}
	}
	else
	{
		echo "No users selected";
	}
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<select data-placeholder="Choose a customer (email address)" name="delCustomer[]" if="delCustomer" class="chosen" multiple style="width:350px;">
		<option value=""></option>
		<?php echo $option; ?>           
	</select>
	</br> <input type="submit" name="DeleteTicketSubmit"/> 
</form>