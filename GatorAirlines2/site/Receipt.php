<?php
	 if (!isset($_SESSION))
	{
	session_start();
		
	}
	include("classes/users.class.php");
	include("classes/airport.class.php");
	$users = new users();
	$num = trim($_SESSION['leave_ids']);
	$id_array = explode("_", $num);
	$this_id = $id_array[0];
	$seat = $_SESSION['seat_id'];
	$flight = $users->get_specific_flight($this_id);
	$d_time = $flight[0]['depart_time'];
	$a_time = $flight[0]['arrival_time'];
	$a = Airport::get_name_by_id($flight[0]['org_id'], $users);
	$b = Airport::get_name_by_id($flight[0]['dest_id'], $users);
	$d_date=date("c", $d_time);
	$a_date=date("c", $a_time);
	
	
	
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

	
	<form id="CheckOutForm" action="survey.php" method="post">
	<tr>
	<td>First Name</td>
	<?	echo $_POST['First_N']	?>
	</br>
	
	<td>Last Name</td>
	<?	echo $_POST['Last_N']	?>
	</br>
	
	<td>Your Flight ID: </td>
	<?	echo $this_id	?>
	</br>
	
	<!-- ONLY DOES FOR 1 SEAT SELECTED -->
	<td>Your Seat(s) ID: </td>
	<?	echo $_SESSION['seat_id'];	?>
	</br>
	
	<td>From: </td>
	<? echo $a	?>
	</br>
	
	<td>TO: </td>
	<? echo $b	?>
	</br>
	
	<td>Departure Time: </td>
	<? echo $d_date	?>
	</br>
	
	<td>Arrival Time: </td>
	<? echo $a_date	?>
	</br>
	
	<input type="submit" id ="Sumbit" value="Done">
	
	
	<!--
	</tr></br>
	<tr>
	<td>Last Name</td>
	<td><input type="text" name="Last_N" id="last" value=<?echo $last_name ?> "" required/></td>
	</tr></br>
	<td>Billing Address</td>
	<td><input type="text" name="B_addres" id="address" value=<?echo $addr ?> "" required/></td>
	</tr></br>
	<td>Zip Code</td>
	<td><input type="text" name="Zip" id="address" value=<?echo $zip ?> "" required/></td>
	</tr></br>
	<td>City</td>
	<td><input type="text" name="City" id="address" value=<?echo $city ?> "" required/></td>
	</tr></br>
	<td>State</td>
	<td><input type="text" name="State" id="address" value=<?echo $state ?> "" required/></td>
	</tr></br>
	<td>Credit Card Number</td>
	<td><input type="text" name="CC" id="money" value=<?echo $cc_num ?> "" required/></td>
	</tr></br>
	<input type="submit" id ="Sumbit" value="Submit">
	</form>
	<section id="content">
		   <div class="wrapper pad1">
		-->
</form>		
		</div>
	</section>
			
			
		
			
			
			
			
			
			
			
			
			<!--content end-->
			<!--footer -->
			<?include('section/footer2.php');?>
			<!--footer end-->
		</div>

</body>
</html>