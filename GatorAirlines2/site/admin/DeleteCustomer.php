<!-- Produce the Delete Customer form -->
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

if (isset($_POST['DeleteCustomerSubmit']))
{
	// Save Radio State
	$_SESSION['AdminStyle']="Admin";
	$_SESSION['table']="Customer";
	$_SESSION['action']="Delete";
	
	// Process button
	if(isset($_POST['delCustomer']))
	{
		foreach($_POST['delCustomer'] as $del)
		{// $customers is declared in admin.php. This will populate the drop down menu with options
			$users->delete_customers($del);
		}
	}
	else
	{
		echo "No users selected";
	}
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<select data-placeholder="Choose a customer (email address)" name="delCustomer[]" if="delCustomer" class="chosen" multiple style="width:350px;">
		<option value=""></option>
		<?php echo $option; ?>           
	</select>
	</br> <input type="submit" name="DeleteCustomerSubmit"/> 
</form>