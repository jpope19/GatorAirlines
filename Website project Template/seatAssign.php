<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--

Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Title      : Newsprint
Version    : 1.0
Released   : 20070824
Description: A two-column, fixed-width design for blogs and small websites.

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Newsprint by FCT</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<script src="http://code.jquery.com/jquery-1.4.1.js" type="text/javascript"></script>
<!-- start header -->
<div id="header">
	<h1><a href="#">Gator Airlines</a></h1>
	
</div>
<!-- end header -->
<!-- star menu -->
<div id="menu">
	<ul>
		<li class="current_page_item"><a href="#">Home</a></li>
		<li><a href="#">My Account</a></li>
		<li><a href="#">Reservation</a></li>
		<li><a href="#">Check-In</a></li>
		<li><a href="#">Flight Times</a></li>
		<li><a href="#">Sign Up</a></li>
		<li><a href="#">Log In</a></li>
	</ul>
</div>
<!-- end menu -->
<!-- start page -->
<div id="page">

<!-- Starting Content -->
<br >
</br>

<h2> Select Desired Seat:</h2> 
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
    </div>
        <div style="clear:both;width:100%">
        <input type="button" id="btnShowNew" value="Show Selected Seats" />
        <input type="button" id="btnShow" value="Show All" />
        </div>
	
	<div id="extra" style="clear: both;">&nbsp;</div>
</div>
<!-- end page -->
<!-- start footer -->
<div id="footer">
	<p class="legal"> &copy;2007 Newsprint. All Rights Reserved.
		&nbsp;&nbsp;&bull;&nbsp;&nbsp;
		Design by <a href="http://www.freecsstemplates.org">FCT</a> </p>
	<p class="links"> <a href="http://validator.w3.org/check/referer" class="xhtml" title="This page validates as XHTML">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a> &nbsp;&bull;&nbsp; <a href="http://jigsaw.w3.org/css-validator/check/referer" class="css" title="This page validates as CSS">Valid <abbr title="Cascading Style Sheets">CSS</abbr></a> </p>
</div>
<!-- end footer -->

<!-- PHP AND JAVASCRIPT REFERENCE -->
<script type="text/javascript" src="seat.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>


<ul>
<!-- <script type="text/php" src="seat_selection.php"></script> -->
</ul>
			<script type='text/javascript'>
				$(document).ready(function(){
			
					/* call the php that has the php array which is json_encoded */
                $.getJSON("seat_selection.php", function(data) {
					$.each(data, function(key,val) {
						$('ul').append('<li id="number">' + val.number + '</li>'); });
											 });
											 });
			</script>



</body>
</html>
