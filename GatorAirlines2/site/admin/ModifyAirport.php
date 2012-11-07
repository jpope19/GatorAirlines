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
// Get the acitys of the users from the database
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
		print "<script type=\"text/javascript\">"; 
		print "alert('No airport was chosen to modify.')"; 
		print "</script>"; 
	}
	else
	{// customer chosen
		$flag = 0; // flag to check for input errors.
		$message = ''; // message to be given to user if errors are detected.
		
		// Declare rules (patterns) to be evaluated by preg_match
		$alphabet = '/^[A-Za-z]+$/';
		$capAlphabet = '/^[A-Z]+$/';
		$name = '/^[A-Za-z ]+$/';
		
		if (isset($_POST['acityBox']))
		{// acity checked
			if (preg_match($name,$_POST['acity']) == 0 || strlen($_POST['acity']) > 30)
			{// acity is not valid
				$message = 'City is not valid\n';
				$flag = 1;
			}
			else
			{
				$set['city'] = $_POST['acity'];
			}
		}
		if (isset($_POST['astateBox']))
		{// first name checked
			if (preg_match($name,$_POST['astate']) == 0 || strlen($_POST['astate']) > 30)
			{// First name is not valid
				$message = 'State is not valid\n';
				$flag = 1;
			}
			else
			{
				$set['state'] = $_POST['astate'];
			}
		}
		if (isset($_POST['iataBox']))
		{// iata checked
			if (preg_match($capAlphabet,$_POST['iata']) == 0 || strlen($_POST['iata']) < 3 || strlen($_POST['iata']) > 3)
			{// Password is not valid
				$message = 'IATA is not valid\n';
				$flag = 1;
			}
			else
			{
				$set['iata'] = $_POST['iata'];
			}
		}
		if (isset($_POST['nameBox']))
		{// nameess checked
			if (preg_match($name,$_POST['name']) == 0 || strlen($_POST['name']) > 30)
			{// Address is not valid
				$message = 'Name is not valid\n';
				$flag = 1;
			}
			else
			{
				$set['name'] = $_POST['name'];
			}
		}
		
		// Still need to verify that acity does not exist in DB
		// Update database
		if($flag ==1)
		{// There are errors in input, Notify user that there were errors
			print "<script type=\"text/javascript\">"; 
			print "alert('$message')"; 
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
			$key = $_POST['modAirport'];
			$users->modify_airports($set, $key);
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
<script type="text/javascript" src="js/admin/ValidateAirport.js"></script>

<li>Which Airport would you like to modify?</li>
<form id="ModifyAirportForm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<select data-placeholder="Choose an Airport" name="modAirport" class="chosen" style="width:350px;">
		<option value=""></option>
		<?php echo $option; ?>           
	</select>
<li>Which fields would you like to modify from this Airport?:</li>
<tr>
	<td width="235">
		<input type="checkbox" class="checkbox" value="1" name="acityBox" id="acityBox" onClick="enableDisable(this.checked, 'acity')" />
	</td>
	<td>
		City: <input type="text" name="acity" disabled="disabled" id="acity" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" class="checkbox" value="1" name="astateBox" id="astateBox" onClick="enableDisable(this.checked, 'astate')" />
	</td>
	<td>
		State: <input type="text" name="astate" disabled="disabled" id="astate" >
	</td> </br>      
</tr>
<tr>
	<td width="235">
		<input type="checkbox" class="checkbox" value="1" name="iataBox" id="iataBox" onClick="enableDisable(this.checked, 'iata')" />
	</td>
	<td>
		IATA: <input type="text" name="iata" disabled="disabled" id="iata" >
	</td> </br> 
</tr>
<tr>
	<td width="235">
		<input type="checkbox" class="checkbox" value="1" name="nameBox" id="nameBox" onClick="enableDisable(this.checked, 'name')" />
	</td>
	<td>
		Airport Name: <input type="text" name="name" disabled="disabled" id="name" >
	</td></br>
        
</tr>
</br> <input type="submit" name="ModifyAirportSubmit" /> 
</form>