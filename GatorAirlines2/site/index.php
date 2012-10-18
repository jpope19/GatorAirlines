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
  <title>About</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>  
<script type="text/javascript" src="js/Cabin_400.font.js"></script>
<script type="text/javascript" src="js/tabs.js"></script> 
<script type="text/javascript" src="js/jquery.jqtransform.js" ></script>
<script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript" src="js/atooltip.jquery.js"></script>
<script type="text/javascript" src="js/script.js"></script>


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
<body id="page1">
<div class="main">
<!--header -->
	<?include('section/header2.php')?>
<!-- / header -->
<!--content -->
	<section id="content">
		<div class="for_banners">
			<article class="col1">
						<div class="tabs">
							<ul class="nav">
								<li class="selected"><a href="#Flight">Flight</a></li>
								<li><a href="#Hotel">Hotel</a></li>
								<li class="end"><a href="#Rental">Rental</a></li>
							</ul>
							<div class="content">
								<div class="tab-content" id="Flight">
									
									<form action="search.php" method="post">
<div id="content" style="background-color:green; height 200px;width:287px;float:left;">

<b>Book A Flight</b> <br>
<input type="radio" name="flight" value="Round-Trip" /> Round Trip &#09;
<input type="radio" name="flight" value="One-way" /> One way <br />

Departure : <input type="text" id="departure" /></p>

<br />

Return :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="return" /></p>

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
<input type="submit" value="Submit">
</form>
	</div>
								
								
							</div>
						</div>	
					</article>
					<div id="slider">
						<img src="images/banner1.jpg" alt="">
						<img src="images/banner2.jpg" alt="">
						<img src="images/banner3.jpg" alt="">
					</div>
				</div>
		<div class="wrapper pad1">
			<article class="col1">
				<div class="box1">
							<h2 class="top">Offers of the Week from UK</h2>
							<div class="pad">
								<strong>From Birmingham</strong><br>
								<ul class="pad_bot1 list1">
									<li>
										<span class="right color1">from GBP 143.-</span>
										<a href="Book2.html">Zurich</a>
									</li>
								</ul>
								<strong>From London City</strong><br>
								<ul class="pad_bot1 list1">
									<li>
										<span class="right color1">from GBP 176.-</span>
										<a href="Book2.html">Basel</a>
									</li>
									<li>
										<span class="right color1">from GBP 109.-</span>
										<a href="Book2.html">Geneva</a>
									</li>
								</ul>
								<strong>From London Heathrow</strong><br>
								<ul class="pad_bot2 list1">
									<li>
										<span class="right color1">from GBP 100.-</span>
										<a href="Book2.html">Geneva</a>
									</li>
									<li>
										<span class="right color1">from GBP 112.-</span>
										<a href="Book2.html">Zurich</a>
									</li>
									<li>
										<span class="right color1">from GBP 88.-</span>
										<a href="Book2.html">Basel</a>
									</li>
								</ul>
							</div>
							<h2>From Ireland To Switzerland</h2>
							<div class="pad">
								<strong>From Dublin</strong><br>
								<ul class="pad_bot2 list1">
									<li class="pad_bot1">
										<span class="right color1">from EUR 122.-</span>
										<a href="Book2.html">Zurich</a>
									</li>
								</ul>
							</div>
						</div>
					</article>
					<article class="col2">
						<h3>About Our Airlines<span>Template created by TemplateMonster.com team</span></h3>
						<div class="wrapper">
							<article class="cols">
								<figure><img src="images/page1_img1.jpg" alt="" class="pad_bot2"></figure>
								<p class="pad_bot1"><strong>Airlines is one of <a href="http://blog.templatemonster.com/free-website-templates/" target="_blank">free website templates</a> created by TemplateMonster.com team.</strong></p>
								<p>This website template is optimized for 1024X768 screen resolution. It is also XHTML &amp; CSS valid. This website template has several pages: <a href="index.html">About</a>, <a href="Offers.html">Offers</a>, <a href="Book.html">Book</a>, <a href="Services.html">Services</a>, <a href="Safety.html">Safety</a>, <a href="Contacts.html">Contacts</a>.</p>
							</article>
							<article class="cols pad_left1">
								<figure><img src="images/page1_img2.jpg" alt="" class="pad_bot2"></figure>
								<p class="pad_bot1"><strong>This <a href="http://blog.templatemonster.com/2011/05/09/free-website-template-airlines/" target="_blank" rel="nofollow">Airlines Template</a> goes with two packages.</strong></p>
								<p>With PSD source files and without them. PSD source files are available for free for the registered members of Templates.com. The basic package (without PSD source files) is available for anyone without registration).</p>
							</article>
						</div>
						<a href="#" class="button1"><strong>Read More</strong></a>
					</article>
				</div>
			</section>
			<!--content end-->
			<!--footer -->
			<?include('section/footer2.php')?>
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