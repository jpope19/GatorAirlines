<!-- Produce the Delete VIP form -->
<?php

$option = "";
// Get the emails of the users from the database
foreach($vip as $vip)
{
	$option .= "<option value=\"" . $vip["vip_id"] . "\">" . $vip["email"] . "</option>";
}// end loop

if (isset($_POST['DeleteVIPSubmit']))
{
	// Save Radio State
	$_SESSION['AdminStyle']="Admin";
	$_SESSION['table']="VIP";
	$_SESSION['action']="Delete";
	
	// Process button
	if(isset($_POST['delVIP']))
	{
		foreach($_POST['delVIP'] as $del)
		{// $vip is declared in admin.php. This will populate the drop down menu with options
			$users->delete_vip($del);
		}
	}
	else
	{
		echo "No users selected";
	}
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<select data-placeholder="Choose a VIP (email address)" name="delVIP[]" if="delVIP" class="chosen" multiple style="width:350px;">
		<option value=""></option>
		<?php echo $option; ?>           
	</select>
	</br> <input type="submit" name="DeleteVIPSubmit"/> 
</form>