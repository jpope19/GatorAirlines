<!-- Produce the Modify VIP form -->
<?php

$option = "";
// Get the emails of the vips from the database
foreach($vip as $vip)
{// $vip is declared in admin.php. This will populate the drop down menu with options
	$option .= "<option value=\"" . $vip['vip_id'] . "\">" . $vip['email'] . "</option>";
}// end loop

if (isset($_POST['ModifyVIPSubmit']))
{
	// Save Radio State
	
	$_SESSION['AdminStyle']="Admin";
	$_SESSION['table']="VIP";
	$_SESSION['action']="Modify";
	
	// Process submit
	if ($_POST['modVIP']=="")
	{// no one chosen
		print "<script type=\"text/javascript\">"; 
		print "alert('No VIP was chosen to modify.')"; 
		print "</script>"; 
	}
	else
	{// vip chosen
		$flag = 0; // flag to check for input errors.
		$message = ""; // message to be given to user if errors are detected.
		
		// Declare rules (patterns) to be evaluated by preg_match
		$alphabet = '/^[A-Za-z]+$/';
		$alphaNumeric = '/^[A-Za-z0-9]+$/';
		$numeric = '/^[0-9]+$/';
		$address = '/^[A-Za-z0-9 ]+$/';
		$name = '/^[A-Za-z ]+$/';
		
		if (isset($_POST['vemailBox']))
		{// email checked
			if (!filter_var($_POST['vemail'], FILTER_VALIDATE_EMAIL))
			{// email is not valid
				$message .=  "E-mail is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['email'] = $_POST['vemail'];
			}
		}
		if (isset($_POST['total_distance_traveledBox']))
		{// distance checked
			if (preg_match($numeric, $_POST['totalDistanceTraveled']) < 0)
			{// Distance is not valid
				$message .=  "Total distance traveled is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['totalDistanceTraveled'] = $_POST['totalDistanceTraveled'];
			}
		}
		if (isset($_POST['reward_pointsBox']))
		{// reward points checked
			if (preg_match($numeric, $_POST['rewardPoints']) < 0)
			{// reward points is not valid
				$message .=  "Reward points is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['rewardPoints'] = $_POST['rewardPoints'];
			}
		}
		//MODIFY LATER
		/*
		if (isset($_POST['join_dateBox']))
		{// join date checked
			if ()
			{// Join date is not valid
				$message .=  "Join date is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['joinDate'] = $_POST['joinDate'];
			}
		}
		*/
		
		
		// Still need to verify that email does not exist in DB
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
			$key = $_POST['modVIP'];
			$users->modify_vip($set, $key);
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
<script type="text/javascript" src="../js/admin/ValidateVIP.js"></script>

<li>Which VIP would you like to modify?</li>
<form id="ModifyVIPForm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<select data-placeholder="Choose a VIP (email address)" name="modVIP" class="chosen" style="width:350px;">
		<option value=""></option>
		<?php echo $option; ?>           
	</select>
<li>Which fields would you like to modify from this user?:</li>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="vemailBox" id="vemailBox" onclick="enableDisable(this.checked, 'vemail')" />
	</td>
	<td>
		Email: <input type="text" name="vemail" id="vemail" disabled="disabled" class="required email" id="vemail" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="total_distance_traveledBox" id="total_distance_traveledBox" onClick="enableDisable(this.checked, 'totalDistanceTraveled')" />
	</td>
	<td>
		Total Distance Traveled: <input type="text" name="totalDistanceTraveled" id="totalDistanceTraveled" disabled="disabled" class="required" id="totalDistanceTraveled">
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="reward_pointsBox" id="reward_pointsBox" onClick="enableDisable(this.checked, 'rewardPoints')" />
	</td>
	<td>
		Reward Points: <input type="text" name="rewardPoints" id="rewardPoints" disabled="disabled" class="required" id="rewardPoints" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="join_dateBox" id="join_dateBox" onClick="enableDisable(this.checked, 'joinDate')" />
	</td>
	<td>
		Join Date: <input type="text" name="joinDate" id="joinDate" disabled="disabled" class="required" id="joinDate" >
	</td> </br>
</tr>
</br> <input type="submit" name="ModifyVIPSubmit" /> 
</form>