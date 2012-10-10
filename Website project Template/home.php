
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

	<script type="text/javascript">
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
<div id="content" style="background-color:#EEEEEE; height 200px;width:600px;float:left;">
<b>Book A Flight</b> <br>
<input type="radio" name="flight" value="Round-Trip" /> Round Trip &#09;
<input type="radio" name="flight" value="One-way" /> One way <br />

Departure : <select name="depart_month">
<option value="1">January</option>
<option value="2">February</option>
<option value="3">March</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">June</option>
<option value="7">July</option>
<option value="8">August</option>
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>

<select name="depart_day">
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
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>

<select name="depart_year">
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
</select>

<br />

Return &nbsp &nbsp &nbsp &nbsp: <select name="return_month">
<option value="1">January</option>
<option value="2">February</option>
<option value="3">March</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">June</option>
<option value="7">July</option>
<option value="8">August</option>
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>

<select name="return_day">
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
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>

<select name="return_year">
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
</select>

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
<input type="radio" name="class" value="privatejet">Private Jet<br>

Flexible Depature Date: <br>
<select name="month">
<option value="january">January</option>
<option value="february">February</option>
<option value="march">March</option>
<option value="april">April</option>
<option value="may">May</option>
<option value="june">June</option>
<option value="july">July</option>
<option value="august">August</option>
<option value="september">September</option>
<option value="october">October</option>
<option value="november">November</option>
<option value="december">December</option>
</select>

<select name="day">
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
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>

<select name="year">
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
</select>

<br />

Flexible Return Date: <br>
<select name="month">
<option value="january">January</option>
<option value="february">February</option>
<option value="march">March</option>
<option value="april">April</option>
<option value="may">May</option>
<option value="june">June</option>
<option value="july">July</option>
<option value="august">August</option>
<option value="september">September</option>
<option value="october">October</option>
<option value="november">November</option>
<option value="december">December</option>
</select>

<select name="day">
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
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>

<select name="year">
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
</select>

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
