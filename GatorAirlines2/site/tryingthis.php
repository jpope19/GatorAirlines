<?php


?>






<!DOCTYPE html>
<html lang="en">
<head>
  <title>Services</title>
  <link rel="stylesheet" href="css/login.css" type="text/css" media="all">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.1.min.js"></script>
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
		   
<h2> Choose seats by clicking the corresponding seat in the layout below:</h2>
    <div id="holder">
        <ul  id="place">
        </ul>
    </div>
    <div style="float:left;">
    <ul id="seatDescription">
        <li style="background:url('images/available_seat.png') no-repeat scroll 0 0 transparent;">Available Seat</li>
        <li style="background:url('images/booked_seat.png') no-repeat scroll 0 0 transparent;">Booked Seat</li>
        <li style="background:url('images/selected_seat.png') no-repeat scroll 0 0 transparent;">Selected Seat</li>
    </ul>
			<!-- PHP AND JAVASCRIPT REFERENCE -->		
<script type="text/javascript" src="js/seat.js"></script>
    </div>
        <div style="clear:both;width:100%">
        <input type="button" id="btnShowNew" value="Show Selected Seats" />
        <input type="button" id="btnShow" value="Show All" />
        </div>
		   
		   
		  <h2>Baggage Cost</h2> 
<FONT FACE="calibri"><p style="font-size:16px">&#160;&#160;Estimate the total cost of your trip, baggage included!</p></FONT> 
<form>   
&nbsp&nbspTotal Number of Bags &nbsp: <select name="bags">
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
</select><br></br>
&nbsp&nbspTotal Weight: <input type="text" name="firstname">&nbsp Lbs &nbsp <input type="submit" value="Calculate"><br></br>
</form>
<FONT FACE="calibri"><p style="font-size:16px">&#160;&#160;If you are unsure of the total weight of your luggage, please use the
<a href="baggage_calc.php">baggage calculator.</a></p></FONT>  
		   
 
		   
		   
		   
	  
				        </div>
			</section>
			
			

			
			<!--content end-->
			<!--footer -->
			<?include('section/footer2.php')?>
			<!--footer end-->
		</div>

</body>
</html>