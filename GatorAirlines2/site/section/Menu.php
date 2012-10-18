<?php
// serve links based on login credentials
if (isset($_SESSION))
{//
	if ($_SESSION['u_type'] == 1)
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


