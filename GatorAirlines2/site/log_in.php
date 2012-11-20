<?php
session_start();
    include("classes/users.class.php");
	include("classes/email.class.php");  //in case user forgot their password.
	$users = new users();
 
$the_error =null;
	if (isset($_POST['submit']))
	{
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
			$_SESSION['cid'] = $result[0]['cid']; 
			
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
	
	   else if (isset($_POST['recovery'])) //come here if user forgot his/her password.
	   {
	      //get the password for that email.

		$result = $users->get_user2($_POST['email']);			
	    $password = null;
	
    if($result!=false){   //if email is in database, send the paasword to customer.
	
	 $password = $result[0]['password'];
	 
	 $password = $users->generateSalt(); // Generate new random password for user.
	 $set['password'] = $password;
	 $cid = $users->get_cid($_POST['email']);
	 $key = $cid[0]['cid'];
	 $users->modify_customers($set, $key); // change password to new random string
     $addresses = array();
     $addresses[] = $_POST['email'];
  
     // email(array of addresses, message, subject);
	 $message = "Your new password with GatorAirlines is ".$password."<br/> Hope to hear from you soon!!";	 
	 $email = new email($addresses, $message, "Password Recovery (GA)");
     $email->send_email();
	
	 header("Location:home.php");
	
	}
  }
?>

