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
{
	$option .= "<option value=\"" . $customer["cid"] . "\">" . $customer["email"] . "</option>";
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
		echo "Please select a customer to modify";
	}
	else
	{// customer chosen
		if (isset($_POST['emailBox']))
		{// email checked
			$set['email'] = $_POST['email'];
		}
		if (isset($_POST['first_nameBox']))
		{// first name checked
			$set['first_name'] = $_POST['first_name'];
		}
		if (isset($_POST['last_nameBox']))
		{// last name checked
			$set['last_name'] = $_POST['last_name'];
		}
		if (isset($_POST['passwordBox']))
		{// password checked
			$set['password'] = $_POST['password'];
		}
		if (isset($_POST['addrBox']))
		{// address checked
			$set['addr'] = $_POST['addr'];
		}
		if (isset($_POST['cityBox']))
		{// city checked
			$set['city'] = $_POST['city'];
		}
		if (isset($_POST['stateBox']))
		{// state checked
			$set['state'] = $_POST['state'];
		}
		if (isset($_POST['zipBox']))
		{// zip checked
			$set['zip'] = $_POST['zip'];
		}
		if (isset($_POST['cc_numBox']))
		{// credit card checked
			$set['cc_num'] = $_POST['cc_num'];
		}		
		if (isset($_POST['u_type']))
		{// user type checked
			$set['u_type'] = $_POST['u_type'];
		}
		
		
		// The code above still needs to be validated (this can be done below too) 
		// and we need to verify that check boxes that were checked were also filled
		// Do this later
		// Update database
		$key = $_POST['modCustomer'];
		$users->modify_customers($set, $key);
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
	<select data-placeholder="Choose a customer (email address)" name="modCustomer" class="chosen" style="width:350px;">
		<option value=""></option>
		<?php echo $option; ?>           
	</select>
<li>Which fields would you like to modify from this user?:</li>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="emailBox" id="emailBox" onclick="enableDisable(this.checked, 'email')" />
	</td>
	<td>
		Email: <input type="text" name="email" disabled="disabled" id="email" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="first_nameBox" id="first_nameBox" onClick="enableDisable(this.checked, 'first_name')" />
	</td>
	<td>
		First Name: <input type="text" name="first_name" disabled="disabled" id="first_name">
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="last_nameBox" id="last_idBox" onClick="enableDisable(this.checked, 'last_name')" />
	</td>
	<td>
		Last Name: <input type="text" name="last_name" disabled="disabled" id="last_name" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="passwordBox" id="passwordBox" onClick="enableDisable(this.checked, 'password')" />
	</td>
	<td>
		Password: <input type="password" name="password" disabled="disabled" id="password" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="addrBox" id="addrBox" onClick="enableDisable(this.checked, 'addr')" />
	</td>
	<td>
		Billing Address: <input type="text" name="addr" disabled="disabled" id="addr" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="cityBox" id="cityBox" onClick="enableDisable(this.checked, 'city')" />
	</td>
	<td>
		City: <input type="text" name="city" disabled="disabled" id="city" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="stateBox" id="stateBox" onClick="enableDisable(this.checked, 'state')" />
	</td>
	<td>
		State: <input type="text" name="state" disabled="disabled" id="state" >
	</td> </br>      
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="zipBox" id="zipBox" onClick="enableDisable(this.checked, 'zip')" />
	</td>
	<td>
		Zip Code: <input type="text" name="zip" disabled="disabled" id="zip" >
	</td> </br> 
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="cc_numBox" id="cc_numBox" onClick="enableDisable(this.checked, 'cc_num')" />
	</td>
	<td>
		Credit Card Number: <input type="text" name="cc_num" disabled="disabled" id="cc_num" >
	</td></br>
        
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" name="u_typeBox" id="u_typeBox" onClick="enableDisable(this.checked, 'u_type')" />
	</td>
	<td>
		User Type: <input type="text" name="u_type" disabled="disabled" id="u_type" >
	</td>
</tr>
</br> <input type="submit" name="ModifyCustomerSubmit" /> 
</form>