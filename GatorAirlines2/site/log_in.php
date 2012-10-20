<?php
 
if (!isset($_SESSION))
{
	session_start();
}

$the_error =null;
	if (isset($_POST['submit']))
	{
		include("classes/users.class.php");
		$users = new users();
		$result = $users->get_user($_POST["email"],$_POST["password"]);
    		
		if($result == false)
		{
			die($result);
		}
		 //if the user is valid, redirect to their account.
		if(count($result) == 1)
		{
			$_SESSION['loggedIn'] = 1;
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['first_name'] = $result[0]['first_name'];
			$_SESSION['last_name'] = $result[0]['last_name'];
			$_SESSION['u_type'] = $result[0]['u_type']; 
			
			header("Location:myaccount.php"); // redirects								
		}
		//if bad login, display and error message.

		else
		{
			
			$the_error= 'Invalid email and/or password!';
		}
		
		//Close connection
		mysql_close($con);
	}
?>

