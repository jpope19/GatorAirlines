
<?php
if (!isset($_SESSION))
{
	session_start();
}
?>

<?php
include("../classes/users.class.php");

$users = new users();
$airports = $users->get_airports();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include 'section/Head.php'; ?>
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
	<link rel="stylesheet" href="../css/chosen.css" type="text/css" />
	

	<script>
    $(function() {
        $( "#departure" ).datepicker();
		   $( "#return" ).datepicker();
		   $( "#flexibleD" ).datepicker();
		   $( "#flexibleR" ).datepicker();
    });
   	
	
	
	
	$(document).ready(function()
	{
		$("#advanced").css("display","none");
		
		$(".advanced").click(function()
		{
			if ($('input[name=advanced]:checked').val() == "Yes" ) 
			{
				$("#advanced").slideDown("fast"); //Slide Down Effect
			}// end if
			else
			{
				$("#advanced").slideUp("fast"); //Slide Up Effect
			}// end else
		});
	});
	</script>
	
</head>
<body>
<!-- start header -->
<div id="header">
	<?php include 'section/Header.php'; ?>
</div>
<!-- end header -->
<!-- start menu -->
<div id="menu">
	<ul>
		<?php include 'section/Menu.php'; ?>
	</ul>
</div>
<!-- end menu -->
<!-- start page -->
<div id="page">



<form action="search.php" method="post">
<div id="content">

<b>Book A Flight</b> <br>
<input type="radio" name="flight" value="Round-Trip" /> Round Trip &#09;
<input type="radio" name="flight" value="One-way" /> One way <br />

Departure : <input type="text" id="departure" /></p>

<br />

Return :&nbsp &nbsp&nbsp &nbsp&nbsp<input type="text" id="return" /></p>

<br />

From &nbsp &nbsp &nbsp &nbsp &nbsp :  <select name="org">
<?
    foreach($airports as $airport){
        if($airport['airport_id'] <= 5) {
?>
        <option value=<?= $airport['iata']?>><?=$airport['name']?> - <?=$airport['city']?>, <?=$airport['state']?></option>

<?
        }
    }                
?>
</select>

<br />

To &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :  <select name="dest">
<?
    foreach($airports as $airport){
        if($airport['airport_id'] <= 5) {
?>
        <option value=<?= $airport['iata']?>><?=$airport['name']?> - <?=$airport['city']?>, <?=$airport['state']?></option>

<?
        }
    }                
?>
</select>

<br />

Passenger &nbsp: <select name="passengers">
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

<input type="submit" value="Submit">		<!-- Creates the submit button -->
<br>
<br>
Advanced
 <br>
<input type="radio" name="advanced" class="advanced" value="Yes">Yes
<input type="radio" name="advanced" class="advanced" value="No">No<br>

</form>

<!-- This is the advanced section of the home page -->

<form action="post">
<div id="advanced" style="background-color:#EEEEEE; height 200px;width:600px;float:left;">
<br>
<hr><b>Advanced	</b> <br>  <!-- hr creates the horizontal line -->

Budget &nbsp &nbsp &nbsp &nbsp : &nbsp Between: <input type="text" name="floorbudget"> &nbsp &nbsp And: <input type="text" name="ceilingbudget">
<br>
<!-- Create the radio buttons for tickets -->
<input type="radio" name="class" value="firstclass">First Class<br>
<input type="radio" name="class" value="economy">Economy<br>
<input type="radio" name="class" value="privatejet">Private Jet<br><br/>

Flexible Depature Date: <br>
<input type="text" id="flexibleD" /></p>

<br />

Flexible Return Date: <br>
    <input type="text" id="flexibleR" /></p>

<br />
<br>
<input type="submit" value="Submit">
</form>

</div>
	<!-- end content -->
	
	<div id="extra" style="clear: both;">&nbsp;</div>
</div>
<!-- end page -->
<!-- start footer -->
<div id="footer">
	<?php include 'section/Footer.php'; ?>
</div>
<!-- end footer -->
</body>
</html>
