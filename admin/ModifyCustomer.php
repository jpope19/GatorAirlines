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
?>
<!-- Some javascript to enable/disable text boxes based on check boxes -->
<script language="javascript">
    function enableDisable(bEnable, textBoxID)
    {
         document.getElementById(textBoxID).disabled = !bEnable;
    }
</script>

<li>Which user would you like to modify?</li>
<form action="../admin/ModifyCustomertoDB.php" method="post">
	<select data-placeholder="Choose a customer (email address)" class="chosen" style="width:350px;">
		<option value=""></option>
		<?php echo $option; ?>           
	</select>
<li>Which fields would you like to modify from this user?:</li>
<tr>
	<td width="235">
		<input type="checkbox" value="1" id="emailBox" onclick="enableDisable(this.checked, 'email')" />
	</td>
	<td>
		Email: <input type="text" disabled="disabled" id="email" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" id="first_nameBox" onClick="enableDisable(this.checked, 'first_name')" />
	</td>
	<td>
		First Name: <input type="text" disabled="disabled" id="first_name">
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" id="last_idBox" onClick="enableDisable(this.checked, 'last_name')" />
	</td>
	<td>
		Last Name: <input type="text" disabled="disabled" id="last_name" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" id="passwordBox" onClick="enableDisable(this.checked, 'password')" />
	</td>
	<td>
		Password: <input type="text" disabled="password" id="email" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" id="addr" onClick="enableDisable(this.checked, 'addr')" />
	</td>
	<td>
		Billing Address: <input type="text" disabled="disabled" id="addr" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" id="cityBox" onClick="enableDisable(this.checked, 'city')" />
	</td>
	<td>
		City: <input type="text" disabled="disabled" id="city" >
	</td> </br>
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" id="stateBox" onClick="enableDisable(this.checked, 'state')" />
	</td>
	<td>
		State: <input type="text" disabled="disabled" id="state" >
	</td> </br>      
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" id="zipBox" onClick="enableDisable(this.checked, 'zip')" />
	</td>
	<td>
		Zip Code: <input type="text" disabled="disabled" id="zip" >
	</td> </br> 
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" id="cc_numBox" onClick="enableDisable(this.checked, 'cc_num')" />
	</td>
	<td>
		Credit Card Number: <input type="text" disabled="disabled" id="cc_num" >
	</td></br>
        
</tr>
<tr>
	<td width="235">
		<input type="checkbox" value="1" id="u_typeBox" onClick="enableDisable(this.checked, 'u_type')" />
	</td>
	<td>
		User Type: <input type="text" disabled="disabled" id="u_type" >
	</td>
</tr>
</br> <input type="submit" /> 
</form>