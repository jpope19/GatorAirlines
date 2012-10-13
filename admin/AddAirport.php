<!-- Produce the Add Airport form -->
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
// Code for when submit button is hit

if (isset($_POST['AddAirportSubmit']))
{
	// Save Radio State
	$_SESSION['AdminStyle']="Admin";
	$_SESSION['table']="Airport";
	$_SESSION['action']="Add";
	
	// Need to validate data
	$record = array
	(
		"city"=>$_POST['city'],
		"state"=>$_POST['state'],
		"iata"=>$_POST['iata'],
		"name"=>$_POST['name'],
	);
	$users->add_airports($record); // add_airports is a function that comes from the users class in users.class.php
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
City: <input type="text" name="city" /> </br>
State: <input type="text" name="state" /> </br>
IATA: <input type="text" name="iata" /> </br>
Airport Name: <input type="text" name="name" /> </br>
<input type="submit" name="AddAirportSubmit"/>
</form>