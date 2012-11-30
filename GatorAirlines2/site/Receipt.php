<?php
	 if (!isset($_SESSION))
	{
	session_start();
		
	}
	include("classes/users.class.php");
	include("classes/airport.class.php");
	
	if(isset($_POST['go']))
	{
	$message= 
	" <div   style=background-image:url(images/ticket.jpg); width:959px;height:500px;><strong>Print ticket<strong>
	   <img input type=image src=images/print.png height=40px width=40px onClick=window.print()/>
	<form id=CheckOutForm action=survey.php method=post >
	<div style=margin-left:400px;>
	<tr><br/><br/><br/><br/>
	<strong><td>First Name</td></strong>
	<?	echo $_POST[First_N]	?>
	</br>
	
	<strong><td>Last Name</td></strong>
	<?	echo $_POST[Last_N]	?>
	</br>
	
	<strong><td>Email</td></strong>
	<?	echo $_POST[email]	?>
	</br>
	
	<strong><td>Your Flight ID: </td></strong>
	<?	echo $this_id	?>
	</br>
	
	<!-- ONLY DOES FOR 1 SEAT SELECTED -->
	<strong><td>Your Seat(s) ID: </td></strong>
	<?	echo $_SESSION[seat_id];	?>
	</br>
	
	<strong><td>From: </td></strong>
	<? echo $a	?>
	</br>
	
	<strong><td>TO: </td></strong>
	<? echo $b	?>
	</br>
	
	<strong><td>Departure Time: </td></strong>
	<? echo $d_date	?>
	</br>
	
	<strong><td>Arrival Time: </td></strong>
	<? echo $a_date	?>
	</br>
	
	<button><input type=submit id =Sumbit class=button1 value=Take quick survey><button>
	
	</div>";
	
	 $email = new email($_POST['email'], $message, "Password Recovery (GA)");
     $email->send_email();
	 
		}
	$users = new users();
	$num = trim($_SESSION['leave_ids']);
	$id_array = explode("_", $num);
	$this_id = $id_array[0];
	$seat = $_SESSION['seat_id'];
	$flight = $users->get_specific_flight($this_id);
	$d_time = $flight[0]['e_depart_time'];
	$a_time = $flight[0]['e_arrival_time'];
	$a = Airport::get_name_by_id($flight[0]['org_id'], $users);
	$b = Airport::get_name_by_id($flight[0]['dest_id'], $users);
	$d_date=date('M j, Y - g:ia', $d_time);
	$a_date=date('M j, Y - g:ia', $a_time);
	
	$record = array();
	$record['seat_id'] = $seat;
	
	if(isset($_SESSION['leave_ids'])){
		if(isset($_SESSION['loggedIn'])){
			$record['cid'] = $_SESSION['cid'];
		}
		else{
			$record['cid'] = 1;
		}
			$price = $users->get_price($flight[0]['flight_id']);
			$record['price'] = $price[0]['coach_class_cost'];
			$record['flight_id'] = $flight[0]['flight_id'];
			//insert
			$users->add_tickets($record);
	}
	//if(isset($_SESSION['return_ids'])){
	//	$ids = trim($_SESSION['leave_ids']);
	//	$id_array = explode(" ", $ids);
	//	foreach($id_array as $new_fid){
	//		$record['price']
	//		$record['flight_id']
			//insert
	//	}
	//}
	
	
		   ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Receipt</title>
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
 
	   <div   style="background-image:url('images/ticket.jpg'); width:959px;height:500px;"><strong>Print ticket<strong>
	   <img input type="image" src="images/print.png" height="40px" width="40px" onClick="window.print()"/>
	<form id="CheckOutForm" action="survey.php" method="post" >
	<div style="margin-left:400px;">
	<tr><br/><br/><br/><br/>
	<strong><td>First Name</td></strong>
	<?	echo $_POST['First_N']	?>
	</br>
	
	<strong><td>Last Name</td></strong>
	<?	echo $_POST['Last_N']	?>
	</br>
	
	<strong><td>Email</td></strong>
	<?	echo $_POST['email']	?>
	</br>
	
	<strong><td>Your Flight ID: </td></strong>
	<?	echo $this_id	?>
	</br>
	
	<!-- ONLY DOES FOR 1 SEAT SELECTED -->
	<strong><td>Your Seat(s) ID: </td></strong>
	<?	echo $_SESSION['seat_id'];	?>
	</br>
	
	<strong><td>From: </td></strong>
	<? echo $a	?>
	</br>
	
	<strong><td>TO: </td></strong>
	<? echo $b	?>
	</br>
	
	<strong><td>Departure Time: </td></strong>
	<? echo $d_date	?>
	</br>
	
	<strong><td>Arrival Time: </td></strong>
	<? echo $a_date	?>
	</br>
	
	<button><input type="submit" id ="Sumbit" class=button1 name="go" value="Submit"><button>
	
	</div>
	
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