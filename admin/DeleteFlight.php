<!-- Produce the Delete Flight form -->
<?php
/*
CREATE table if not exists flights 
(
	flight_id int auto_increment primary key,
	plane_id int,
	org_id int,
	dest_id int,
	first_class_cost int(4),
	coach_class_cost int(4),
	e_depart_time varchar(30),
	e_arrival_time varchar(30),
	depart_time varchar(30),
	arrival_time varchar(30),
	distance int(5)
);  
*/
$option = "";
// Get the flight_ids of the users from the database
foreach($flights as $flight)
{
	$option .= "<option value=\"" . $flight["flight_id"] . "\">" . $flight["flight_id"] . "</option>";
}// end loop

if (isset($_POST['DeleteFlightSubmit']))
{
	// Save Radio distance
	$_SESSION['AdminStyle']="Admin";
	$_SESSION['table']="Flight";
	$_SESSION['action']="Delete";
	
	// Process button
	if(isset($_POST['delFlight']))
	{
		foreach($_POST['delFlight'] as $del)
		{
			$users->delete_Flights($del);
		}
	}
	else
	{
		echo "No users selected";
	}
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<select data-placeholder="Choose a Flight (flight id)" name="delFlight[]" if="delFlight" class="chosen" multiple style="width:350px;">
		<option value=""></option>
		<?php echo $option; ?>           
	</select>
	</br> <input type="submit" name="DeleteFlightSubmit"/> 
</form>