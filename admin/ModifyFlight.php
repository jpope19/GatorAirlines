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
		echo "Please select a Flight to modify";
	}
	else
	{// Flight chosen
		if (isset($_POST['plane_idBox']))
		{// plane_id checked
			$set['plane_id'] = $_POST['plane_id'];
		}
		if (isset($_POST['org_idBox']))
		{// first name checked
			$set['org_id'] = $_POST['org_id'];
		}
		if (isset($_POST['dest_idBox']))
		{// last name checked
			$set['dest_id'] = $_POST['dest_id'];
		}
		if (isset($_POST['first_class_costBox']))
		{// first_class_coeach_cost checked
			$set['first_class_cost'] = $_POST['first_class_cost'];
		}
		if (isset($_POST['coach_class_costBox']))
		{// zip checked
			$set['coach_class_cost'] = $_POST['coach_class_cost'];
		}
		if (isset($_POST['depart_timeBox']))
		{// e_depart_timeess checked
			$set['depart_time'] = $_POST['depart_time'];
		}
		if (isset($_POST['arrival_timeBox']))
		{// e_arrival_time checked
			$set['arrival_time'] = $_POST['arrival_time'];
		}
		if (isset($_POST['distanceBox']))
		{// distance checked
			$set['distance'] = $_POST['distance'];
		}
		
		// The inputs still need to be validated and 
		// database conflicts need to be checked
		$key = $_POST['modFlight'];
		$users->modify_Flights($set, $key);
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

<!-- Jquery that uses Validation plugin to validate form on client side -->
<script type="text/javascript" src="../js/admin/ValidateFlight.js"></script>

<li>Which Flight would you like to modify?</li>
<form id="ModifyFlightForm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<select data-placeholder="Choose a Flight (flight ID)" name="modFlight" class="chosen" style="width:350px;">
		<option value=""></option>
		<?php echo $option; ?>           
	</select>
<li>Which fields would you like to modify from this flight?:</li>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="plane_idBox" id="plane_idBox" onclick="enableDisable(this.checked, 'plane_id')" />
	</td>
	<td>
		Plane ID: <input type="text" class="required" name="plane_id" disabled="disabled" id="plane_id" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="org_idBox" id="org_idBox" onClick="enableDisable(this.checked, 'org_id')" />
	</td>
	<td>
		Organisation ID: <input type="text" class="required" name="org_id" disabled="disabled" id="org_id">
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="dest_idBox" id="dest_idBox" onClick="enableDisable(this.checked, 'dest_id')" />
	</td>
	<td>
		Destination ID: <input type="text" class="required" name="dest_id" disabled="disabled" id="dest_id" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="first_class_costBox" id="first_class_costBox" onClick="enableDisable(this.checked, 'first_class_cost')" />
	</td>
	<td>
		First Class Cost: <input type="text" class="required" name="first_class_cost" disabled="disabled" id="first_class_cost" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="coach_class_costBox" id="coach_class_costBox" onClick="enableDisable(this.checked, 'coach_class_cost')" />
	</td>
	<td>
		Coach Class Cost: <input type="text" class="required" name="coach_class_cost" disabled="disabled" id="coach_class_cost" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="depart_timeBox" id="depart_timeBox" onClick="enableDisable(this.checked, 'depart_time')" />
	</td>
	<td>
		New Depart Time: <input type="text" class="required" name="depart_time" disabled="disabled" id="depart_time" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="arrival_timeBox" id="arrival_timeBox" onClick="enableDisable(this.checked, 'arrival_time')" />
	</td>
	<td>
		New Arrival Time: <input type="text" class="required" name="arrival_time" disabled="disabled" id="arrival_time" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="distanceBox" id="distanceBox" onClick="enableDisable(this.checked, 'distance')" />
	</td>
	<td>
		Distance: <input type="text" class="required" name="distance" disabled="disabled" id="distance" >
	</td> </br>      
</tr>
</br> <input type="submit" name="ModifyFlightSubmit" /> 
</form>