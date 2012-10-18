<!-- Produce the Delete Tickets form -->
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
$option = "";
// Get the emails of the users from the database
foreach($airplanes as $airplane)
{
	$option .= "<option value=\"" . $airplane["plane_id"] . "\">" . $airplane["plane_id"] . "</option>";
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
			$users->delete_airplanes($del);
		}
	}
	else
	{
		echo "No airplane(s) selected";
	}
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<select data-placeholder="Choose a airplane (airplane ID)" name="delTicket[]" if="delTicket" class="chosen" multiple style="width:350px;">
		<option value=""></option>
		<?php echo $option; ?>           
	</select>
	</br> <input type="submit" name="DeleteTicketSubmit"/> 
</form>