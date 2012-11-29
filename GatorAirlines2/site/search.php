<?php
session_start();
include("classes/search.class.php");
include("classes/airport.class.php");
include("classes/users.class.php");
include("js/select_flight.js");
$user = new users();
//convert passed in day/month/year into epoch times

//we use substr since now we have mm/dd/yyyy in one string.
$_POST['e_depart_time'] = mktime(0,0,0,intval(substr($_POST['depart'],0,2)),intval(substr($_POST['depart'],3,5)),intval(substr($_POST['depart'],6,9)));
$_POST['e_return_time'] = mktime(0,0,0,intval(substr($_POST['return'],0,2)),intval(substr($_POST['return'],3,5)),intval(substr($_POST['return'],6,9) ));
//convert airport iata names to IDs
$_POST['org'] = Airport::get_id_by_name($_POST['org'], $user);
$_POST['dest'] = Airport::get_id_by_name($_POST['dest'], $user);
$_SESSION['passengers'] = $_POST['passengers'];
//find routes
$routes = new Search($_POST, $user);


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
	<?include('section/header2.php');?>


	<section id="content">
		   <div class="wrapper pad1">
		   
		 
		 

<?php
//output routes
$to_routes = $routes->depart_routes;
$a = Airport::get_name_by_id($_POST['org'], $user);
$b = Airport::get_name_by_id($_POST['dest'], $user);


$option_num = 1;
if(count($to_routes) == 0){
    echo "Sorry, no flights available";
    //header("location: home.php?e=1");
}?>

<form class="flight_selection" action="SeatAssignments.php" method="POST">
<center>
<table>
    <tr>
        <td style='width: 50px'><center>Option</center></td>
        <td style='width: 150px'><center>Depart Time</center></td>
        <td style='width: 150px'><center>Arrival Time</center></td>
        <td style='width: 50px'><center>Cost</center></td>
        <td style='width: 50px'><center>Layovers</center></td>
        <td style='width: 50px'></td>
    </tr>    
    <tr><td colspan='6'><b><?=$a?></b> to <b><?=$b?></b></td></tr>

<?foreach($to_routes as $option) {?>
    <tr>
        <td><center><?=$option_num?></center></td>
        <?=$option->to_string('leave')?>
    </tr>
<?$option_num++;}?>

<?if($_POST['flight'] == 'Round-Trip'){?>
    <tr><td colspan='6'><b><?=$b?></b> to <b><?=$a?></b></td></tr>
<?php
    $to_routes = $routes->return_routes;
    $option_num = 1;
    foreach($to_routes as $option) {?>
        <tr>
            <td><center><?=$option_num?></center></td>
            <?=$option->to_string('return');?>
			
        </tr>
<?  $option_num++;}
}?>

    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><input type='submit' value='Reserve Flight'></td>
    </tr>
</table>
</center>
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