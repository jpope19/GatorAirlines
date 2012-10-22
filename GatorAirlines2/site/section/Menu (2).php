<?php
// serve links based on login credentials
if (isset($_SESSION))
{// The user is logged in, provide a log out 
	// Check user type
	if (!isset($_SESSION['u_type']))
	{// check if user has been authenticated
		$menu = '
		<a href="sign_up.php">Sign Up</a>
		<a href="log_in.php">Log In</a>';
	}
	else if ($_SESSION['u_type'] == 0)
	{// Regular customer
		$menu = '
		<a href="log_out.php">Log Out</a>';
	}
	else if ($_SESSION['u_type'] == 1)
	{// Administrator
		$menu = '
		<a href="admin.php">Administrator Page</a>
		<a href="log_out.php">Log Out</a>';
	}
	else if ($_SESSION['u_type'] == 2)
	{// VIP
		$menu = '<a href="log_out.php">Log Out</a>';
	}
}
else
{// User is not logged in, provide default banner
	$menu = '
	<a href="sign_up.php">Sign Up</a>
	<a href="log_in.php">Log In</a>';
}	


?>
<!-- HTML for menu of all documents -->
<center>
<a href="home.php">Home</a>
<a href="MyAccount.php">My Account</a>
<a href="reservation.php">Reservation</a>
<a href="checkin.php">Check-In</a>
<a href="flight_times.php">Flight Times</a>
<a href="FAQ.php">FAQ</a>
<?php echo $menu; ?>      
</center>


