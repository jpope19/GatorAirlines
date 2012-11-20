<?php
if (!isset($_SESSION))
{
	session_start();
}
?>

<?php
include("classes/users.class.php");

$users = new users();
$airports = $users->get_airports();
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
 
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
	
<? if(isset($_GET['e'])){ ?>
    <script>
        alert("Sorry, no flights available");
    </script>
<?}?>


</head>
<body id="page1">
<div class="main">
<!--header -->

	<?PHP include('section/header2.php');?>

<!-- / header -->
<!--content -->
	<section id="content">
		<div class="for_banners">
			<article class="col1">
						<div class="tabs">
							<ul class="nav">
								<li class="selected"><a href="#Flight">Flight Search</a></li>
								
							</ul>
							<div class="content">
								<div class="tab-content" id="Flight">
									
									<form action="search.php" method="post">


<div id="content" style="background-color:#EEEEEE; height 200px;width:287px;float:left;">

<div id="content" style="background-color:#EEEEEE; height 200px;width:287px;float:left;">

<b>Book A Flight</b> <br>
<input type="radio" name="flight" value="Round-Trip" /> Round Trip &#09;
<input type="radio" name="flight" value="One-way" checked /> One way <br />

Departure : <input type="text" id="departure" name ="depart" /></p>

<br />

Return :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="return" name="return"/></p>

<br />


From:  <br/>
<select name="org">
<?php
    foreach($airports as $airport){
        if($airport['airport_id'] <= 50) {
?>

        <option value=<?= $airport['iata']?>><?=$airport['iata']?> - <?=$airport['city']?>, <?=$airport['state']?></option>

<?php
        }
    }
?>
</select>

<br />

To:  <br/>
<select name="dest">
<?php
    foreach($airports as $airport){
        if($airport['airport_id'] <= 50) {
?>

        <option value=<?= $airport['iata']?>><?=$airport['iata']?> - <?=$airport['city']?>, <?=$airport['state']?></option>


<?php
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

<input type="submit" class="button1" value="Submit">		<!-- Creates the submit button -->
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

Budget &nbsp &nbsp &nbsp &nbsp : &nbsp Between: <input type="text" name="floorbudget" size="3"> &nbsp &nbsp And: <input type="text" size="3" name="ceilingbudget">
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
<input type="submit" class="button1" value="Submit">
</form>
	</div>
								
								
							</div>
						</div>	
					</article>
					
					<div id="slider">
						<img src="images/banner1.jpg" alt="">
						<!--
						<img src="images/banner2.jpg" alt="">
						<img src="images/banner3.jpg" alt="">
						-->
					</div>
					
				</div>
		<div class="wrapper pad1">
			<article class="col1">
				<div class="box1">
							<h2 class="top"></h2>
							<div class="pad">
								<strong></strong><br>
								
								
								<strong></strong><br>
								<ul class="pad_bot2 list1">
									
									
								</ul>
							</div>
							
							
						</div>
					</article>
					
				</div>
			</section>
			<!--content end-->
			<!--footer -->
			<?php include('section/footer2.php')?>
			<!--footer end-->
		</div>
<script type="text/javascript"> Cufon.now(); </script>
<script>
	$(document).ready(function() {
		tabs.init();
	});
	jQuery(document).ready(function($) {
		$('#form_1, #form_2, #form_3').jqTransform({imgPath:'jqtransformplugin/img/'});	
	});
	$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'fade', //Specify sets like: 'fold,fade,sliceDown, sliceDownLeft, sliceUp, sliceUpLeft, sliceUpDown, sliceUpDownLeft' 
		slices:15,
		animSpeed:500,
		pauseTime:6000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false, //Next & Prev
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		controlNavThumbsFromRel:false, //Use image rel for thumbs
		controlNavThumbsSearch: '.jpg', //Replace this with...
		controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
		keyboardNav:true, //Use left & right arrows
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:1, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
	});
</script>
</body>
</html>
