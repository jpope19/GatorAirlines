<!-- Produce the Modify Tickets form -->
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

if (isset($_POST['ModifyTicketSubmit']))
{
	// Save Radio State
	$_SESSION['AdminStyle']="Admin";
	$_SESSION['table']="Ticket";
	$_SESSION['action']="Modify";
	
	// Process submit
	if ($_POST['modTicket']=="")
	{// no one chosen
		echo "Please select a airplane to modify";
	}
	else
	{// airplane chosen
		if (isset($_POST['typeBox']))
		{// first name checked
			$set['type'] = $_POST['type'];
		}
		if (isset($_POST['chart_addrBox']))
		{// last name checked
			$set['chart_addr'] = $_POST['chart_addr'];
		}
		if (isset($_POST['num_first_classBox']))
		{// num_first_class checked
			$set['num_first_class'] = $_POST['num_first_class'];
		}
		if (isset($_POST['num_coach_classBox']))
		{// num_coach_classess checked
			$set['num_coach_class'] = $_POST['num_coach_class'];
		}
		
		
		// The code does not validate the inputs. will need to make sure that the 
		// inputs are valid and that they do not conflict with the DB
		$key = $_POST['modTicket'];
		$users->modify_airplanes($set, $key);
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
	<select data-placeholder="Choose a airplane (plane_id)" name="modTicket" class="chosen" style="width:350px;">
		<option value=""></option>
		<?php echo $option; ?>           
	</select>
<li>Which fields would you like to modify from this user?:</li>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="typeBox" id="typeBox" onClick="enableDisable(this.checked, 'type')" />
	</td>
	<td>
		Type of Plane: <input type="text" name="type" disabled="disabled" id="type">
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="chart_addrBox" id="last_idBox" onClick="enableDisable(this.checked, 'chart_addr')" />
	</td>
	<td>
		Chart Address: <input type="text" name="chart_addr" disabled="disabled" id="chart_addr" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="num_first_classBox" id="num_first_classBox" onClick="enableDisable(this.checked, 'num_first_class')" />
	</td>
	<td>
		Number of First Class Seats: <input type="num_first_class" name="num_first_class" disabled="disabled" id="num_first_class" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="num_coach_classBox" id="num_coach_classBox" onClick="enableDisable(this.checked, 'num_coach_class')" />
	</td>
	<td>
		Number of Coach Class Seats: <input type="text" name="num_coach_class" disabled="disabled" id="num_coach_class" >
	</td> </br>
</tr>
</br> <input type="submit" name="ModifyTicketSubmit" /> 
</form>