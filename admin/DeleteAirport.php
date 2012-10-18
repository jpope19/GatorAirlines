<!-- Produce the Delete Airport form -->
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
// Get the names of the Airports from the database
foreach($airports as $airport)
{
	$option .= "<option value=\"" . $airport["airport_id"] . "\">" . $airport["name"] . "</option>";
}// end loop

if (isset($_POST['DeleteAirportSubmit']))
{
	// Save Radio State
	$_SESSION['AdminStyle']="Admin";
	$_SESSION['table']="Airport";
	$_SESSION['action']="Delete";
	
	// Process button
	if(isset($_POST['delAirport']))
	{
		foreach($_POST['delAirport'] as $del)
		{// $airports is declared in admin.php. This will populate the drop down menu with options
			$users->delete_airports($del);
		}
	}
	else
	{
		echo "No Airport selected";
	}
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<select data-placeholder="Choose a airport (email address)" name="delAirport[]" if="delAirport" class="chosen" multiple style="width:350px;">
		<option value=""></option>
		<?php echo $option; ?>           
	</select>
	</br> <input type="submit" name="DeleteAirportSubmit"/> 
</form>