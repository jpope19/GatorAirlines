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
	if ((empty($_POST['email'])) || (empty($_POST['first_name'])) || (empty($_POST['last_name'])) || (empty($_POST['password'])) ||	(empty($_POST['addr'])) || (empty($_POST['city'])) || (empty($_POST['state'])) || (empty($_POST['zip'])) || (empty($_POST['cc_num'])) || (!isset($_POST['u_type'])))
	{
		print "<script type=\"text/javascript\">"; 
		print "alert('Please fill out all fields.')"; 
		print "</script>"; 
	}// end if
	else
	{	
		$flag = 0; // flag to check for input errors.
		$message = ""; // message to be given to user if errors are detected.
		
		// Declare rules (patterns) to be evaluated by preg_match
		$alphabet = '/^[A-Za-z]+$/';
		$alphaNumeric = '/^[A-Za-z0-9]+$/';
		$numeric = '/^[0-9]+$/';
		$address = '/^[A-Za-z0-9 ]+$/';
		$name = '/^[A-Za-z ]+$/';
		
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		{// email is not valid
			$message .=  "E-mail is not valid\n";
			$flag = 1;
		}
		if (preg_match($alphabet,$_POST['first_name']) == 0 || strlen($_POST['first_name']) > 30)
		{// First name is not valid
			$message .=  "First name is not valid\n";
			$flag = 1;
		}
		if (preg_match($alphabet,$_POST['last_name']) == 0 || strlen($_POST['last_name']) > 30)
		{// last name is not valid
			$message .=  "Last name is not valid\n";
			$flag = 1;
		}
		if (strlen($_POST['password']) < 8 || strlen($_POST['password']) > 30)
		{// Password is not valid
			$message .=  "Password is incorrect size\n";
			$flag = 1;
		}
		if (preg_match($address,$_POST['addr']) == 0 || strlen($_POST['addr']) > 30)
		{// Address is not valid
			$message .=  "Address is not valid\n";
			$flag = 1;
		}
		if (preg_match($name,$_POST['city']) == 0 || strlen($_POST['city']) > 30)
		{// City is not valid
			$message .=  "City is not valid\n";
			$flag = 1;
		}
		if (preg_match($name,$_POST['state']) == 0 || strlen($_POST['state']) > 30)
		{// State is not valid
			$message .=  "State is not valid\n";
			$flag = 1;
		}
		if (preg_match($numeric,$_POST['zip']) == 0 || strlen($_POST['zip']) > 5 || strlen($_POST['zip']) < 5)
		{// Zip is not valid
			$message .=  "Zip is not valid\n";
			$flag = 1;
		}
		if (preg_match($numeric,$_POST['cc_num']) == 0 || strlen($_POST['cc_num']) > 16 || strlen($_POST['cc_num']) < 16)
		{// Credit Card is not valid
			$message .=  "Credit Card is not valid\n";
			$flag = 1;
		}
		if (preg_match($numeric,$_POST['u_type']) == 0 || $_POST['u_type'] < 0 || $_POST['u_type'] > 2)
		{// User Type not valid
			$message .=  "User type is not valid\n";
			$flag = 1;
		}
		
		// Deal with errors or lack of errors
		if ($flag == 1)
		{// Notify user that there were errors
			print "<script type=\"text/javascript\">"; 
			print "alert('There were errors in your input.')"; 
			print "</script>";
		}// end if
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
		}// end else
	}// end else
}// end if
?>
<!-- Jquery that uses Validation plugin to validate form on client side -->
<script type="text/javascript" src="js/admin/ValidateCustomer.js"></script>

<form id="AddCustomerForm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
First Name: <input type="text" class="required" name="first_name" /> </br>
Last Name: <input type="text" class="required" name="last_name" /> </br>
Email: <input type="text" class="required email" name="email" /> </br>
Password: <input type="password" class="required" name="password" /> </br>
Billing Address: <input type="text" class="required" name="addr" /> </br>
City: <input type="text" class="required" name="city" /> </br>
State: <input type="text" class="required" name="state" /> </br>
Zip Code: <input type="text" class="required" name="zip" /> </br>
Credit Card Number: <input type="text" class="required creditcard" name="cc_num" /> </br>
User Type: <input type="text" class="required" name="u_type" /> </br>
<input class="submit" type="submit" name="AddCustomerSubmit"/>
</form>
