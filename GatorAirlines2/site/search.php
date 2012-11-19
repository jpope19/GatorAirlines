<?php

include("classes/search.class.php");
include("classes/airport.class.php");
include("classes/users.class.php");
include("classes/Search_F_ID.class.php");
session_start();
$user = new users();
//convert passed in day/month/year into epoch times

//we use substr since now we have mm/dd/yyyy in one string.
$_POST['e_depart_time'] = mktime(0,0,0,intval(substr($_POST['depart'],0,2)),intval(substr($_POST['depart'],3,5)),intval(substr($_POST['depart'],6,9)));
$_POST['e_return_time'] = mktime(0,0,0,intval(substr($_POST['return'],0,2)),intval(substr($_POST['return'],3,5)),intval(substr($_POST['return'],6,9) ));
//convert airport iata names to IDs
$_POST['org'] = Airport::get_id_by_name($_POST['org'], $user);
$_POST['dest'] = Airport::get_id_by_name($_POST['dest'], $user);
//find routes
$routes = new Search($_POST, $user);
$FL = new Search_F_ID($_POST, $user);

?>
<!-- echo "<b>Departure Trips</b><br/>"; -->





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
<!--header -->
	<?include('section/header2.php')?>
<!-- / header -->


<!--content -->
	<section id="content">
		   <div class="wrapper pad1">
		   
		 <!--  DO YOU WORK HERE !!!! -->
		 
		 

<?php
//output routes
$to_routes = $routes->depart_routes;
$F_id = $FL->id;
$_SESSION['id_array'] = $F_id;
$a = Airport::get_name_by_id($_POST['org'], $user);
$b = Airport::get_name_by_id($_POST['dest'], $user);
echo "<font size=+2>Routes from $a to $b </font></br><br>";
$option_num = 1;
foreach($to_routes as $option) {
    echo "<b>Option " . $option_num  . " </b>";
	//echo "<select name='flight_id'>";
	//echo "<button name = 'button' type = 'submit' value = '".$F_id[$option_num -1]."'>Click</button> <br/>";	
    $val = $option->to_string();
    echo "$val";
    $option_num++;
	echo '<br/>';
}
?>

<form action="SeatAssignments.php" method="post">
Option &nbsp: <select name="id">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select>
<br><br>
<input type="submit" class="button1" value="Submit">	
<form/>

<?php
if($_POST['flight'] == 'Round-Trip') {
    echo"<br/><br/><b>Return Trips</b><br/>";
    $to_routes = $routes->return_routes;
    $a = Airport::get_name_by_id($_POST['org'], $user);
    $b = Airport::get_name_by_id($_POST['dest'], $user);
    echo "<font size=+2>Routes from $b to $a </font></br><br>";
    $option_num = 1;
    foreach($to_routes as $option) {
        echo "<b>Option " . $option_num . "</b><br/>";
        $val = $option->to_string();
        echo "$val";
        $option_num++;
		echo '<br/>';
    }
}
?>

	 
		 

			</div>
	</section>
			
			
			
			
			
			
			
			
			
			
			
			
			<!--content end-->
			<!--footer -->
			<?include('section/footer2.php')?>
			<!--footer end-->
		</div>

</body>
</html>