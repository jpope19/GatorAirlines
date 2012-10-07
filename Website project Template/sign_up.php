
<?php


if (isset($_POST['name']))
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
		                                        '".$_POST['cc_num']."','vip')";
	
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
<!--



  DO YOUR WORK HERE!!!!!!!!!



  -->


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
