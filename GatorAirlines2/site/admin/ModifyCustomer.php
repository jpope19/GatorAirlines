<!-- Produce the Modify Customer form -->
<?php
/*
CREATE table if not exists customers 
(
	cid int auto_increment primary key,
	email varchar(30) not null,
	first_name varchar(30),
	last_name varchar(30),
	password varchar(30),
	addr varchar(30),
	city varchar(30),
	state varchar(30),
	zip int(5),
	cc_num int(16),
	u_type int(2)   
*/
$option = "";
// Get the emails of the users from the database
foreach($customers as $customer)
{// $customers is declared in admin.php. This will populate the drop down menu with options
	$option .= "<option value=\"" . $customer['cid'] . "\">" . $customer['email'] . "</option>";
}// end loop

if (isset($_POST['ModifyCustomerSubmit']))
{
	// Save Radio State
	
	$_SESSION['AdminStyle']="Admin";
	$_SESSION['table']="Customer";
	$_SESSION['action']="Modify";
	
	// Process submit
	if ($_POST['modCustomer']=="")
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
		$alphabet = '/^[A-Za-z]+$/';
		$alphaNumeric = '/^[A-Za-z0-9]+$/';
		$numeric = '/^[0-9]+$/';
		$address = '/^[A-Za-z0-9 ]+$/';
		$name = '/^[A-Za-z ]+$/';
		
		if (isset($_POST['emailBox']))
		{// email checked
			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
			{// email is not valid
				$message .=  "E-mail is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['email'] = $_POST['email'];
			}
		}
		if (isset($_POST['first_nameBox']))
		{// first name checked
			if (preg_match($alphabet,$_POST['first_name']) == 0 || strlen($_POST['first_name']) > 30)
			{// First name is not valid
				$message .=  "First name is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['first_name'] = $_POST['first_name'];
			}
		}
		if (isset($_POST['last_nameBox']))
		{// last name checked
			if (preg_match($alphabet,$_POST['last_name']) == 0 || strlen($_POST['last_name']) > 30)
			{// last name is not valid
				$message .=  "Last is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['last_name'] = $_POST['last_name'];
			}
		}
		if (isset($_POST['passwordBox']))
		{// password checked
			if (strlen($_POST['password']) < 8 || strlen($_POST['password']) > 30)
			{// Password is not valid
				$message .=  "Password is incorrect size\n";
				$flag = 1;
			}
			else
			{
				$set['password'] = $_POST['password'];
			}
		}
		if (isset($_POST['addrBox']))
		{// address checked
			if (preg_match($address,$_POST['addr']) == 0 || strlen($_POST['addr']) > 30)
			{// Address is not valid
				$message .=  "Address is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['addr'] = $_POST['addr'];
			}
		}
		if (isset($_POST['cityBox']))
		{// city checked
			if (preg_match($name,$_POST['city']) == 0 || strlen($_POST['city']) > 30)
			{// City is not valid
				$message .=  "City is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['city'] = $_POST['city'];
			}
		}
		if (isset($_POST['stateBox']))
		{// state checked
			if (preg_match($name,$_POST['state']) == 0 || strlen($_POST['state']) > 30)
			{// State is not valid
				$message .=  "State is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['state'] = $_POST['state'];
			}
		}
		if (isset($_POST['zipBox']))
		{// zip checked
			if (preg_match($numeric,$_POST['zip']) == 0 || strlen($_POST['zip']) > 5 || strlen($_POST['zip']) < 5)
			{// Zip is not valid
				$message .=  "Zip is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['zip'] = $_POST['zip'];
			}
		}
		if (isset($_POST['cc_numBox']))
		{// credit card checked
			if (preg_match($numeric,$_POST['cc_num']) == 0 || strlen($_POST['cc_num']) > 16 || strlen($_POST['cc_num']) < 16)
			{// Credit Card is not valid
				$message .=  "Credit Card is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['cc_num'] = $_POST['cc_num'];
			}
		}		
		if (isset($_POST['u_typeBox']))
		{// user type checked
			if (preg_match($numeric,$_POST['u_type']) == 0 || $_POST['u_type'] < 0 || $_POST['u_type'] > 2)
			{// User Type not valid
				$message .=  "User type is not valid\n";
				$flag = 1;
			}
			else
			{
				$set['u_type'] = $_POST['u_type'];
			}
		}
		
		// Still need to verify that email does not exist in DB
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
			$key = $_POST['modCustomer'];
			$users->modify_customers($set, $key);
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
<script type="text/javascript" src="js/admin/ValidateCustomer.js"></script>

<li>Which user would you like to modify?</li>
<form id="ModifyCustomerForm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<select data-placeholder="Choose a customer (email address)" name="modCustomer" class="chosen" style="width:350px;">
		<option value=""></option>
		<?php echo $option; ?>           
	</select>
<li>Which fields would you like to modify from this user?:</li>
<tr>
	<td width="235">
		<input type="checkbox" class="checkbox" value="1" name="emailBox" id="emailBox" onclick="enableDisable(this.checked, 'email')" />
	</td>
	<td>
		Email: <input type="text" name="email" id="email" disabled="disabled" class="required email" id="email" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" class="checkbox" value="1" name="first_nameBox" id="first_nameBox" onClick="enableDisable(this.checked, 'first_name')" />
	</td>
	<td>
		First Name: <input type="text" name="first_name" id="first_name" disabled="disabled" class="required" id="first_name">
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" class="checkbox" value="1" name="last_nameBox" id="last_idBox" onClick="enableDisable(this.checked, 'last_name')" />
	</td>
	<td>
		Last Name: <input type="text" name="last_name" id="last_name" disabled="disabled" class="required" id="last_name" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" class="checkbox" value="1" name="passwordBox" id="passwordBox" onClick="enableDisable(this.checked, 'password')" />
	</td>
	<td>
		Password: <input type="password" name="password" id="password" disabled="disabled" class="required" id="password" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" class="checkbox" value="1" name="addrBox" id="addrBox" onClick="enableDisable(this.checked, 'addr')" />
	</td>
	<td>
		Billing Address: <input type="text" name="addr" id="addr" disabled="disabled" class="required" id="addr" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" class="checkbox" value="1" name="cityBox" id="cityBox" onClick="enableDisable(this.checked, 'city')" />
	</td>
	<td>
		City: <input type="text" name="city" id="city" disabled="disabled" class="required" id="city" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" class="checkbox" value="1" name="stateBox" id="stateBox" onClick="enableDisable(this.checked, 'state')" />
	</td>
	<td>
		State: <input type="text" name="state" id="state" disabled="disabled" class="required" id="state" >
	</td> </br>      
</tr>
<tr>
	<td width="235">
		<input type="checkbox" class="checkbox" value="1" name="zipBox" id="zipBox" onClick="enableDisable(this.checked, 'zip')" />
	</td>
	<td>
		Zip Code: <input type="text" name="zip" id="zip" disabled="disabled" class="required" id="zip" >
	</td> </br> 
</tr>
<tr>
	<td width="235">
		<input type="checkbox" class="checkbox" value="1" name="cc_numBox" id="cc_numBox" onClick="enableDisable(this.checked, 'cc_num')" />
	</td>
	<td>
		Credit Card Number: <input type="text" id="cc_num" name="cc_num" disabled="disabled" class="required" id="cc_num" >
	</td></br>
        
</tr>
<tr>
	<td width="235">
		<input type="checkbox" class="checkbox" value="1" name="u_typeBox" id="u_typeBox" onClick="enableDisable(this.checked, 'u_type')" />
	</td>
	<td>
		User Type: <input type="text" name="u_type" id="u_type" disabled="disabled" class="required" id="u_type" >
	</td>
</tr>
</br> <input type="submit" name="ModifyCustomerSubmit" /> 
</form>