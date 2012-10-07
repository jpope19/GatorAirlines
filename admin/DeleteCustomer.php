<!-- Produce the Delete Customer form -->
<?php
session_start();
include("../classes/users.class.php");
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
$users = new users();
$customers = $users->get_customers();
$option = "";

// Get the emails of the users from the database
foreach($customers as $customer)
{
	$option .= "<option value=\"" . $customer["cid"] . "\">" . $customer["email"] . "</option>";
}// end loop
?>

<form action="../admin/DeleteCustomertoDB.php" method="post">
	<select data-placeholder="Choose a customer (email address)" class="chosen" multiple style="width:350px;">
		<option value=""></option>
		<?php echo $option; ?>           
	</select>
	</br> <input type="submit" /> 
</form>