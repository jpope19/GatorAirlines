<?php
	 if (!isset($_SESSION))
	{
	session_start();
    
	}
		//$num = trim($_SESSION['leave_ids']);
		//$id_array = explode("_", $num);
		$seat = explode(",",$_GET['item']);
		$_SESSION['seat_id'] = $seat;
		if(isset($_SESSION['loggedIn'])){
		$first_name = $_SESSION['first_name'];
		$last_name= $_SESSION['last_name'];	
		$addr = $_SESSION['addr'];
		$state = $_SESSION['state'];
		$zip = $_SESSION['zip'];
		$cc_num = $_SESSION['cc_num'];
		$city = $_SESSION['city'];
		$email = $_SESSION['email'];
		}
		else{
		
		$first_name = "";
		$last_name= "";	
		$addr = "";
		$state = "";
		$zip = "";
		$cc_num = "";
		$city = "";
		$email = "";
		}
		
		   ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Services</title>
  <link rel="stylesheet" href="css/login.css" type="text/css" media="all">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="js/test.js"></script>
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />

</head>


<body id="page4">


<div class="main">
	<?include('section/header2.php');?>

	<?if (isset($_SESSION['first_name'])){echo "<h2 style=color:red;>LAST CHANCE TO CHANGE PERSONAL INFO.</h2>";}?>
	<form id="CheckOutForm" action="Receipt.php" method="post" style="background-color:gray;">
	<table>
	<tr>
	<td>First Name</td>
	<td><input type="text" name="First_N" id="first" value=<?echo $first_name ?> "" required/> </td>
	</tr>
	<tr>
	<td>Last Name</td>
	<td><input type="text" name="Last_N" id="last" value=<?echo $last_name ?> "" required/></td>	
	</tr>
	
	<tr>
	<td>Email</td>
	<td><input type="text" name="email" id="email" value=<?echo $email ?> "" required/></td>
	</tr>
	
	<tr>
	<td>Billing Address</td>
	<td><input type="text" name="B_addres" id="address" value=<?echo $addr ?> "" required/></td>
	</tr>
	<tr>
	<td>Zip Code</td>
	<td><input type="text" name="Zip" id="address" value=<?echo $zip ?> "" required/></td>
	</tr>
	<tr>
	<td>City</td>
	<td><input type="text" name="City" id="address" value=<?echo $city ?> "" required/></td>
	</tr>
	<tr>
	<td>State</td>
	<td><input type="text" name="State" id="address" value=<?echo $state ?> "" required/></td>
	</tr>
	<tr>
	<td>Credit Card Number</td>
	<td><input type="text" name="CC" id="money" value=<?echo $cc_num ?> "" required/></td>
	</tr>
	
	<tr>
	<td><br/><button class=button1><input type="submit" id ="Sumbit" value="submit"></button><td>
	<tr>
	</table>
	</form>
	<section id="content">
		   <div class="wrapper pad1">
		   
		</div>
	</section>
			
			
		
			
			
			<!--content end-->
			<!--footer -->
			<?include('section/footer2.php');?>
			<!--footer end-->
		</div>

</body>
</html>