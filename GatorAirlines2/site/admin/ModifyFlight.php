<!-- Produce the Modify Flight form -->
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
// Get the plane_ids of the users from the database
foreach($flights as $flight)
{
	$option .= "<option value=\"" . $flight["flight_id"] . "\">" . $flight["flight_id"] . "</option>";
}// end loop

if (isset($_POST['ModifyFlightSubmit']))
{
	// Save Radio distance
	$_SESSION['AdminStyle']="Admin";
	$_SESSION['table']="Flight";
	$_SESSION['action']="Modify";
	
	// Process submit
	if ($_POST['modFlight']=="")
	{// no one chosen
		print "<script type=\"text/javascript\">"; 
		print "alert('No customer was chosen to modify.')"; 
		print "</script>"; 
	}
	else
	{// customer chosen
		$flag = 0; // flag to check for input errors.
		$message = ""; // message to be given to user if errors are detected.
		
		// Declare rules (patterns) to be evaluated by preg_match
		$timeDate = '/^[A-Za-z0-9 ]+$/';
		$numeric = '/^[0-9]+$/';
		
		if (isset($_POST['plane_idBox']))
		{// plane_id checked
			if (preg_match($numeric,$_POST['plane_id']) == 0 || strlen($_POST['plane_id']) > 30)
			{// plane_id is not valid
				$message .=  "Plane ID is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['plane_id'] = $_POST['plane_id'];
			}
		}
		if (isset($_POST['org_idBox']))
		{// first name checked
			if (preg_match($numeric,$_POST['org_id']) == 0 || strlen($_POST['org_id']) > 30)
			{// First name is not valid
				$message .=  "Organizaiton ID is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['org_id'] = $_POST['org_id'];
			}
		}
		if (isset($_POST['dest_idBox']))
		{// last name checked
			if (preg_match($numeric,$_POST['dest_id']) == 0 || strlen($_POST['dest_id']) > 30)
			{// last name is not valid
				$message .=  "Destination ID is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['dest_id'] = $_POST['dest_id'];
			}
		}
		if (isset($_POST['first_class_costBox']))
		{// first_class_cost checked
			if (preg_match($numeric,$_POST['first_class_cost']) == 0 || strlen($_POST['first_class_cost']) > 30)
			{// Password is not valid
				$message .=  "First class cost is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['first_class_cost'] = $_POST['first_class_cost'];
			}
		}
		if (isset($_POST['coach_class_costBox']))
		{// coach_class_costess checked
			if (preg_match($numeric,$_POST['coach_class_cost']) == 0 || strlen($_POST['coach_class_cost']) > 30)
			{// Address is not valid
				$message .=  "Coach class cost is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['coach_class_cost'] = $_POST['coach_class_cost'];
			}
		}
		if (isset($_POST['depart_timeBox']))
		{// depart_time checked
			if (preg_match($timeDate,$_POST['depart_time']) == 0 || strlen($_POST['depart_time']) > 30)
			{// City is not valid
				$message .=  "Departure time is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['depart_time'] = $_POST['depart_time'];
			}
		}
		if (isset($_POST['arrival_timeBox']))
		{// arrival_time checked
			if (preg_match($timeDate,$_POST['arrival_time']) == 0 || strlen($_POST['arrival_time']) > 30)
			{// State is not valid
				$message .=  "Arrival time is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['arrival_time'] = $_POST['arrival_time'];
			}
		}
		if (isset($_POST['distanceBox']))
		{// distance checked
			if (preg_match($numeric,$_POST['distance']) == 0 || strlen($_POST['distance']) > 30)
			{// Zip is not valid
				$message .=  "Distance is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['distance'] = $_POST['distance'];
			}
		}
		
		// Still need to verify that plane_id does not exist in DB
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
			$key = $_POST['modFlight'];
			$users->modify_Flights($set, $key);
			
			// email customers if flight times are changed
			if (isset($_POST['depart_timeBox']) || isset($_POST['arrival_timeBox']))
			{
				$subject = 'Flight time changes';
				$emails = $users->get_emails_from_flight($_POST['modFlight']);
				$message ="The following have been changed for flight" . $_POST['modFlight'] .":";
				if (isset($_POST['depart_timeBox']))
				{
					$message .="\n The departure time is now " . $_POST['depart_time'];
				}// end if
				if (isset($_POST['arrival_timeBox']))
				{
					$message .="\n The arrival time is now " . $_POST['arrival_time'];
				}// end if
				foreach($emails as $email)
				{
					// In case any of our lines are larger than 70 characters, we should use wordwrap()
					$message = wordwrap($message, 70);
					mail($email,$subject,$message);
				}// end loop
			}// end if
			
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
<script type="text/javascript" src="js/admin/ValidateFlight.js"></script>

<li>Which Flight would you like to modify?</li>
<form id="ModifyFlightForm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<select data-placeholder="Choose a Flight (flight ID)" name="modFlight" class="chosen" style="width:350px;">
		<option value=""></option>
		<?php echo $option; ?>           
	</select>
<li>Which fields would you like to modify from this flight?:</li>
<tr>
	<td width="235">
		<input type="checkbox" class="checkbox" value="1" name="plane_idBox" id="plane_idBox" onclick="enableDisable(this.checked, 'plane_id')" />
	</td>
	<td>
		Plane ID: <input type="text" class="required" name="plane_id" disabled="disabled" id="plane_id" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" class="checkbox" value="1" name="org_idBox" id="org_idBox" onClick="enableDisable(this.checked, 'org_id')" />
	</td>
	<td>
		Organisation ID: <input type="text" class="required" name="org_id" disabled="disabled" id="org_id">
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" class="checkbox" value="1" name="dest_idBox" id="dest_idBox" onClick="enableDisable(this.checked, 'dest_id')" />
	</td>
	<td>
		Destination ID: <input type="text" class="required" name="dest_id" disabled="disabled" id="dest_id" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" class="checkbox" value="1" name="first_class_costBox" id="first_class_costBox" onClick="enableDisable(this.checked, 'first_class_cost')" />
	</td>
	<td>
		First Class Cost: <input type="text" class="required" name="first_class_cost" disabled="disabled" id="first_class_cost" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" class="checkbox" value="1" name="coach_class_costBox" id="coach_class_costBox" onClick="enableDisable(this.checked, 'coach_class_cost')" />
	</td>
	<td>
		Coach Class Cost: <input type="text" class="required" name="coach_class_cost" disabled="disabled" id="coach_class_cost" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" class="checkbox" value="1" name="depart_timeBox" id="depart_timeBox" onClick="enableDisable(this.checked, 'depart_time')" />
	</td>
	<td>
		New Depart Time: <input type="text" class="required" name="depart_time" disabled="disabled" id="depart_time" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" class="checkbox" value="1" name="arrival_timeBox" id="arrival_timeBox" onClick="enableDisable(this.checked, 'arrival_time')" />
	</td>
	<td>
		New Arrival Time: <input type="text" class="required" name="arrival_time" disabled="disabled" id="arrival_time" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" class="checkbox" value="1" name="distanceBox" id="distanceBox" onClick="enableDisable(this.checked, 'distance')" />
	</td>
	<td>
		Distance: <input type="text" class="required" name="distance" disabled="disabled" id="distance" >
	</td> </br>      
</tr>
</br> <input type="submit" name="ModifyFlightSubmit" /> 
</form>