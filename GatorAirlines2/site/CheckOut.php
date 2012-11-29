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

	<?php
		  $seat = $_GET['item'];
		   ?>
	<form id="CheckOutForm" action="survey.php" method="post">
	<tr>
	<td>First Name</td>
	<td><input type="text" name="First_N" id="first" required/></td>
	</tr></br>
	<tr>
	<td>Last Name</td>
	<td><input type="text" name="Last_N" id="last" required/></td>
	</tr></br>
	<td>Billing Address</td>
	<td><input type="text" name="B_addres" id="address" required/></td>
	</tr></br>
	<td>Credit Card Number</td>
	<td><input type="text" name="CC" id="money" required/></td>
	</tr></br>
	<input type="submit" id ="Sumbit" value="Submit">
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