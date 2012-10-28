
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Seat Selection</title>
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

<body id="page6">
<div class="main">
<!--header -->
	<?include('section/header2.php')?> 
<!-- / header -->
<!--content -->
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

<!-- JAVASCRIPT REFERENCE -->
<script type="text/javascript" src="js/seat.js"></script>
			<!--content end-->
			<!--footer -->
			
			<?include('section/footer2.php')?>
			<!--footer end-->
		</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>