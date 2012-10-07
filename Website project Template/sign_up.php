<?php
$con = mysql_connect("localhost","jpope","baseball19");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }



if (isset($_POST['email']))
	{
		
		
		// check if the email is already taken
		$query = "select * from userinfo where email = '".$_POST['email']."'";
		$result = mysql_query($query,$con);	
		
		if(!$result)
		{
			die("Invalid query! <br> The query is: " . $query);
		}
		
		if(mysql_num_rows($result) == 1)
		{
			
			echo "<center><font class='error'><br /><br />This account already exist!</font></center>";
		}
		
		//if email is valid, insert the user into the customers table.
		else{
		$query = "insert into customers values('".$_POST['email']."','".$_POST['first_name']."','".$_POST['last_name']."','".$_POST['password']."','".$_POST['addr']."',
		                                        '".$_POST['cc_num']."','0')";
	
           	$result = mysql_query($query,$con);
			
		if(!$result)
		{
			die("Invalid query! <br> The query is: " . $query);
		}
		
		header("Location:myaccount.php"); // redirects
}
		
		
}		



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include 'section/Head.php'; ?>
</head>
<body>
<!-- start header -->
<div id="header">
	<?php include 'section/Header.php'; ?>
</div>
<!-- end header -->
<!-- star menu -->
<div id="menu">
	<ul>
		<?php include 'section/Menu.php'; ?>
	</ul>
</div>
<!-- end menu -->
<!-- start page -->
<div id="page">

<form action="sign_up.php" method=POST>
<!-- <input type="reset"><br>
-->

First name: <input type="text" name="first_name"><br>
Last name: <input type="text" name ="last_name"><br>
email: <input type="email" name="email"><br>
Password:	<input type="password" name="password"><br>
Billing Address: <input type="text" name="addr"><br>
City: <input type="text" name="city"><br>
State: <form action="">
<select name="state">
<option value="Alabama">AL</option>
<option value="Alaska">AK</option>
<option value="Arizona">AZ</option>
<option value="Arkansas">AR</option>
<option value="California">CA</option>
<option value="Colorado">CO</option>
<option value="Connecticut">CT</option>
<option value="Delaware">DE</option>
<option value="Florida">FL</option>
<option value="Georgia">GA</option>
<option value="Hawaii">HI</option>
<option value="Idaho">ID</option>
<option value="Illinois">IL</option>
<option value="Indiana">IN</option>
<option value="Iowa">IA</option>
<option value="Kansas">KS</option>
<option value="Louisiana">LA</option>
<option value="Maine">ME</option>
<option value="Maryland">MD</option>
<option value="Massachusetts">MA</option>
<option value="Michigan">MI</option>
<option value="Minnesota">MN</option>
<option value="Mississippi">MS</option>
<option value="Missouri">MO</option>
<option value="Montana">MT</option>
<option value="Nebraska">NE</option>
<option value="Nevada">NV</option>
<option value="New Hampshire">NH</option>
<option value="New Jersey">NJ</option>
<option value="New Mexico">NM</option>
<option value="New York">NY</option>
<option value="North Carolina">NC</option>
<option value="North Dakota">ND</option>
<option value="Ohio">OH</option>
<option value="Oklahoma">OK</option>
<option value="Oregon">OR</option>
<option value="Pennsylvania">PA</option>
<option value="Rhode Island">RI</option>
<option value="South Carolina">SC</option>
<option value="South Dakota">SD</option>
<option value="Tennessee">TN</option>
<option value="Texas">TX</option>
<option value="Utah">UT</option>
<option value="Vermont">VT</option>
<option value="Virginia">VA</option>
<option value="Washington">WA</option>
<option value="West Virginia">WV</option>
<option value="Wisconsin">WI</option>
<option value="Wyoming">WY</option>
<select>
</form>
Zip code: <input type="text" name="zip"><br>
Credit Card Number: <input type="text" name="cc_num"><br>

<input type="submit" value="Submit">

</div>
	<!-- end content -->
	
	<div id="extra" style="clear: both;">&nbsp;</div>
</div>
<!-- end page -->
<!-- start footer -->
<div id="footer">
	<?php include 'section/Footer.php'; ?>
</div>
<!-- end footer -->
</body>
</html>
