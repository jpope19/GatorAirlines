
<?
 
 //connect to the server.
$con = mysql_connect('localhost','kgeraci','starwars44');

 //select the database.
 mysql_select_db("Gator_Airlines", $con);
session_start();

	if (isset($_POST['first']))
	{
		
		//check database for that user.	
		$query = "select * from customers where email='".$_POST['email']."' and password='".$_POST['password']."'";
		$result = mysql_query($query,$con);
    		
		if(!$result)
		{
			die("Invalid query! <br> The query is: " . $query);
		}
		 //if the user is valid, redirect to their account.
		if(mysql_num_rows($result) == 1)
		{
			$_SESSION['loggedIn'] = 1;
			$_SESSION['email'] = $_POST['email'];
			$row = mysql_fetch_assoc($result);
			
					header("Location:myaccount.php"); // redirects
					
					
					}
					//if bad login, display and error message.
		else
		{
			
			echo "<center><font class='error'><br /><br />Invalid username and/or password!</font></center>";
		}
		
		//Close connection
		mysql_close($con);
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

HTML CODE FOR SIGN IN
--!>
 <div id="page"> 
<!--
<input type="radio" name="admin" class="admin" value="Admin">Admin
<input type="radio" name="customer" class="customer" value="Customer">Customer<br>
-->
<body>
    <div style= "width:430px; margin:0 auto;"> <!--"text-align:center;"> -->
        <form action="">
		Username&nbsp: <input type="text" name="username" /><br />
		Password&nbsp&nbsp: <input type="password" name="password" />
		</form>
    </div>
</body>
  





</div> 
	<!-- end content -->
	
	<div id="extra" style="clear: both;">&nbsp;</div>
</div>
<!-- end page -->
<!-- start footer -->
<div id= "footer">
	<?php include 'section/Footer.php'; ?>
</div>
<!-- end footer -->
</body>
</html>
