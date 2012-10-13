<!-- Produce the Modify Airport form -->
<?php
/*
CREATE table if not exists airports 
(
	airport_id int auto_increment primary key,
	city varchar(40),
	state varchar(2),
	iata varchar(3),
	name varchar(65)  
);
*/
$option = "";
// Get the emails of the users from the database
foreach($airports as $airport)
{// $airports is declared in admin.php. This will populate the drop down menu with options
	$option .= "<option value=\"" . $airport['airport_id'] . "\">" . $airport['name'] . "</option>";
}// end loop

if (isset($_POST['ModifyAirportSubmit']))
{
	// Save Radio State
	
	$_SESSION['AdminStyle']="Admin";
	$_SESSION['table']="Airport";
	$_SESSION['action']="Modify";
	
	// Process submit
	if ($_POST['modAirport']=="")
	{// no one chosen
		echo "Please select a airport to modify";
	}
	else
	{// airport chosen
		if (isset($_POST['cityBox']))
		{// city checked
			$set['city'] = $_POST['acity'];
		}
		if (isset($_POST['stateBox']))
		{// state checked
			$set['state'] = $_POST['astate'];
		}
		if (isset($_POST['iataBox']))
		{// iata checked
			$set['iata'] = $_POST['iata'];
		}
		if (isset($_POST['nameBox']))
		{// credit card checked
			$set['name'] = $_POST['name'];
		}		
		
		
		// The code above still needs to be validated (this can be done below too) 
		// and we need to verify that check boxes that were checked were also filled
		// Do this later
		// Update database
		$key = $_POST['modAirport'];
		$users->modify_airports($set, $key);
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

<li>Which Airport would you like to modify?</li>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<select data-placeholder="Choose an Airport" name="modAirport" class="chosen" style="width:350px;">
		<option value=""></option>
		<?php echo $option; ?>           
	</select>
<li>Which fields would you like to modify from this Airport?:</li>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="cityBox" id="cityBox" onClick="enableDisable(this.checked, 'acity')" />
	</td>
	<td>
		City: <input type="text" name="acity" disabled="disabled" id="acity" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="stateBox" id="stateBox" onClick="enableDisable(this.checked, 'astate')" />
	</td>
	<td>
		State: <input type="text" name="astate" disabled="disabled" id="astate" >
	</td> </br>      
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="iataBox" id="iataBox" onClick="enableDisable(this.checked, 'iata')" />
	</td>
	<td>
		IATA: <input type="text" name="iata" disabled="disabled" id="iata" >
	</td> </br> 
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="nameBox" id="nameBox" onClick="enableDisable(this.checked, 'name')" />
	</td>
	<td>
		Airport Name: <input type="text" name="name" disabled="disabled" id="name" >
	</td></br>
        
</tr>
</br> <input type="submit" name="ModifyAirportSubmit" /> 
</form>