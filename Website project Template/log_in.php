
<?
 
 //connect to the server.
$con = mysql_connect('localhost','jpope','baseball19');

if(!$con){

die('could not connect to database');

}

 //select the database.
 mysql_select_db("gatorairlines", $con);
session_start();
$the_error =null;
	if (isset($_POST['submit']))
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
			
			$the_error= 'Invalid username and/or password!';
		}
		
		//Close connection
		mysql_close($con);
	}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include 'section/Head.php'; ?>
	<link rel="stylesheet" type="text/css" href="../css/structure.css">
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
<input type="radio" name="admin" class="admin" value="Admin">Admin
<input type="radio" name="customer" class="customer" value="Customer">Customer<br>
-->
<body>
    <div style= "width:430px; margin:0 auto;"> <!--"text-align:center;"> -->
	
       <form class="box login" method="post" action="log_in.php" >
	   
	<fieldset class="boxBody">
	  <label>Username</label>
	  <input name="email" type="text" tabindex="1" placeholder="Go Gators!" required>
	  <label><a href="#" class="rLink" tabindex="5">Forget your password?</a>Password</label>
	  <input name="password" type="password" tabindex="2" required>
	</fieldset>
	
	<footer>
	 	  <label><input type="checkbox" tabindex="3">Keep me logged in</label>
	  <input type="submit" class="btnLogin" value="Login" tabindex="4" name="submit"><br/>
	 
	</footer>
	
</form>
	  <?if($the_error!=null){
	 
	 echo '<p style="color: red; text-align: center">
      Invalid email and/or password!
      </p>';
	 
	 }?> 
	   	   
    </div>
  


</div> 
	<!-- end content -->
	
	<div id="extra" style="clear: both;">&nbsp;</div>

<!-- end page -->
<!-- start footer -->






<div id= "footer">
	<?php include 'section/Footer.php'; ?>
</div>
<!-- end footer -->
</body>
</html>
