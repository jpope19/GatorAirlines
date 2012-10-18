<!-- Produce the Add Customer form -->
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
// Code for when submit button is hit

if (isset($_POST['AddCustomerSubmit']))
{
	// Save Radio State
	$_SESSION['AdminStyle']="Admin";
	$_SESSION['table']="Customer";
	$_SESSION['action']="Add";
	
	// Filter form
	if ((empty($_POST['email'])) || (empty($_POST['first_name'])) || (empty($_POST['last_name'])) || (empty($_POST['password'])) ||	(empty($_POST['addr'])) || (empty($_POST['city'])) || (empty($_POST['state'])) || (empty($_POST['zip'])) || (empty($_POST['cc_num'])) || (empty($_POST['u_type'])))
	{
		echo "Please fill out all fields";
	}// end if
	else
	{	
		// Set up validations for zip and credit card
		$zipValid = array("options"=>array("min_range"=>9999, "max_range"=>99999));
		$ccValid = array("options"=>array("min_range"=>999999999999999, "max_range"=>9999999999999999));
		$userValid = array("options"=>array("min_range"=>0, "max_range"=>2));
		
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		{// email is not valid
			echo "E-mail is not valid";
		}
		else if ($_POST['first_name'] != (filter_var($_POST['first_name'], FILTER_SANITIZE_STRING)))
		{// First name is not valid
			echo "First name is not valid";
		}
		else if ($_POST['last_name'] != (filter_var($_POST['last_name'], FILTER_SANITIZE_STRING)))
		{// last name is not valid
			echo "Last is not valid";
		}
		else if (strlen($_POST['password'])<8)
		{// Password is not valid
			echo "Password must be greater than 8 characters";
		}
		else if ($_POST['city'] != (filter_var($_POST['city'], FILTER_SANITIZE_STRING)))
		{// City is not valid
			echo "City is not valid";
		}
		else if ($_POST['state'] != (filter_var($_POST['state'], FILTER_SANITIZE_STRING)))
		{// State is not valid
			echo "State is not valid";
		}
		else if (!filter_var($_POST['zip'], FILTER_VALIDATE_INT, $zipValid))
		{// Zip is not valid
			echo "Zip is not valid";
		}
		/*else if (!filter_var($_POST['cc_num'], FILTER_VALIDATE_INT, $ccValid))
		{// Credit Card is not valid
			echo "Credit Card is not valid";
		}*/
		else if (!filter_var($_POST['u_type'], FILTER_VALIDATE_INT, $userValid))
		{// Credit Card is not valid
			echo "User type is not valid";
		}
		else
		{// All fields are valid, put into database
			// For the future, will have to hash and salt password
			// Also will need to check for existing emails
			$record = array
			(
				"email"=>$_POST['email'],
				"first_name"=>$_POST['first_name'],
				"last_name"=>$_POST['last_name'],
				"password"=>$_POST['password'],
				"addr"=>$_POST['addr'],
				"city"=>$_POST['city'],
				"state"=>$_POST['state'],
				"zip"=>$_POST['zip'],
				"cc_num"=>$_POST['cc_num'],
				"u_type"=>$_POST['u_type']
			);
			$users->add_customers($record); // add_customers is a function that comes from the users class in users.class.php
		}
	}// end else
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
Email: <input type="text" name="email" /> </br>
First Name: <input type="text" name="first_name" /> </br>
Last Name: <input type="text" name="last_name" /> </br>
Password: <input type="password" name="password" /> </br>
Billing Address: <input type="text" name="addr" /> </br>
City: <input type="text" name="city" /> </br>
State: <input type="text" name="state" /> </br>
Zip Code: <input type="text" name="zip" /> </br>
Credit Card Number: <input type="text" name="cc_num" /> </br>
User Type: <input type="text" name="u_type" /> </br>
<input type="submit" name="AddCustomerSubmit"/>
</form>