<!-- Produce the Modify Airplanes form -->
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
// Get the plane_ids of the users from the database
foreach($airplanes as $airplane)
{
	$option .= "<option value=\"" . $airplane["plane_id"] . "\">" . $airplane["plane_id"] . "</option>";
}// end loop

if (isset($_POST['ModifyAirplaneSubmit']))
{
	// Save Radio State
	$_SESSION['AdminStyle']="Admin";
	$_SESSION['table']="Airplane";
	$_SESSION['action']="Modify";
	
	// Process submit
	if ($_POST['modAirplane']=="")
	{// no one chosen
		print "<script type=\"text/javascript\">"; 
		print "alert('No airplane was chosen to modify.')"; 
		print "</script>"; 
	}
	else
	{// customer chosen
		$flag = 0; // flag to check for input errors.
		$message = ""; // message to be given to user if errors are detected.
		
		// Declare rules (patterns) to be evaluated by preg_match
		$alphabet = '/^[A-Za-z]+$/';
		$capAlphabet = '/^[A-Z]+$/';
		$numeric = '/^[0-9]+$/';
		
		if (isset($_POST['typeBox']))
		{// type checked
			if (preg_match($alphabet,$_POST['type']) == 0 || strlen($_POST['type']) > 30)
			{// type is not valid
				$message .=  "Type is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['type'] = $_POST['type'];
			}
		}
		if (isset($_POST['chart_addrBox']))
		{// first name checked
			if (preg_match($alphabet,$_POST['chart_addr']) == 0 || strlen($_POST['chart_addr']) > 30)
			{// First name is not valid
				$message .=  "Chart address is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['chart_addr'] = $_POST['chart_addr'];
			}
		}
		if (isset($_POST['num_first_classBox']))
		{// num_first_class checked
			if (preg_match($numeric,$_POST['num_first_class']) == 0 || strlen($_POST['num_first_class']) > 30)
			{// Password is not valid
				$message .=  "The number of first class is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['num_first_class'] = $_POST['num_first_class'];
			}
		}
		if (isset($_POST['num_coach_classBox']))
		{// nameess checked
			if (preg_match($numeric,$_POST['num_coach_class']) == 0 || strlen($_POST['num_coach_class']) > 30)
			{// Address is not valid
				$message .=  "The number of coach class is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['num_coach_class'] = $_POST['num_coach_class'];
			}
		}
		
		// Still need to verify that type does not exist in DB
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
			$key = $_POST['modAirplane'];
			$users->modify_airplanes($set, $key);
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
<script type="text/javascript" src="js/admin/ValidateAirplane.js"></script>

<li>Which user would you like to modify?</li>
<form id="ModifyAirplaneForm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<select data-placeholder="Choose a airplane (plane_id)" name="modAirplane" class="chosen" style="width:350px;">
		<option value=""></option>
		<?php echo $option; ?>           
	</select>
<li>Which fields would you like to modify from this user?:</li>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="typeBox" id="typeBox" onClick="enableDisable(this.checked, 'type')" />
	</td>
	<td>
		Type of Plane: <input type="text" class="required" name="type" disabled="disabled" id="type">
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="chart_addrBox" id="last_idBox" onClick="enableDisable(this.checked, 'chart_addr')" />
	</td>
	<td>
		Chart Address: <input type="text" class="required" name="chart_addr" disabled="disabled" id="chart_addr" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="num_first_classBox" id="num_first_classBox" onClick="enableDisable(this.checked, 'num_first_class')" />
	</td>
	<td>
		Number of First Class Seats: <input type="text" class="required" name="num_first_class" disabled="disabled" id="num_first_class" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="num_coach_classBox" id="num_coach_classBox" onClick="enableDisable(this.checked, 'num_coach_class')" />
	</td>
	<td>
		Number of Coach Class Seats: <input type="text" class="required" name="num_coach_class" disabled="disabled" id="num_coach_class" >
	</td> </br>
</tr>
</br> <input type="submit" name="ModifyAirplaneSubmit" /> 
</form>