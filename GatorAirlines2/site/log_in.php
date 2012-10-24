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
	
	   else if (isset($_POST['recovery'])) //come here if user forgot his/her password.
	   {
	     
		 $con = mysql_connect('localhost','jpope','baseball19');
		 mysql_select_db("gatorairlines", $con);

         include("mail/sendMail.php"); //include mailing function (in mail folder).

          $to = $_POST['email']; //where to send email.

         $query = "select * from customers where email = '".$_POST['email']."'"; //get the password for that email.

		$result = mysql_query($query,$con);	
		
		if(!$result)
		{
			die("Invalid query! <br> The query is: " . $query);
		}
		
	$password = null;
	

    if(count($result)>0){
	
	$row = mysql_fetch_assoc($result);
	$password = $row['password'];
	
	$message = "Your current password with GatorAirlines is ".$password."/n Hope to hear from you soon!!";
	
	mail_attachment(null,$to, null, 'Account Recovery', $message);
	
	header("Location:home.php");
	
	}



  }
?>

