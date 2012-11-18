<?php
if (!isset($_SESSION))
{
	session_start();
    
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
<!--header -->
	<?include('section/header2.php')?>
<!-- / header -->


<!--content -->
	<section id="content">
		   <div class="wrapper pad1">
		   
		 <!--  DO YOU WORK HERE !!!! -->  
		 
			<?php
			
			include("classes/users.class.php");
			
			$user = new users();
			
			$result = $user->get_flight_info();
			
			foreach($result as $output)
			{
				//echo $output['e_depart_time'];
				$destId = $output['dest_id'];
				$airport_info = $user->get_airport_info($destId);
				echo $airport_info[0]['city'];
				echo " ";
				echo $airport_info[0]['iata'];
				echo " ";
				echo $airport_info[0]['state'];
				echo " ";
				echo $airport_info[0]['name'];
				echo "<br/>";
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