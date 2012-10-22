<?$dev =1;?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Book</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
<link href="front.css" media="screen, projection" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>  
<script type="text/javascript" src="js/Cabin_400.font.js"></script>
<script type="text/javascript" src="js/tabs.js"></script> 
<script type="text/javascript" src="js/jquery.jqtransform.js" ></script>
<script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript" src="js/atooltip.jquery.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<style type="text/css">
	.main, .tabs ul.nav a, .content, .button1, .box1, .top { behavior:url(js/PIE.htc)}
</style>
<![endif]-->
<!--[if lt IE 7]>
	<div style=' clear: both; text-align:center; position: relative;'>
		<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/images/upgrade.jpg" border="0"  alt="" /></a>
	</div>
<![endif]-->
</head>
<body id="page3">



  <fieldset id="signin_menu">
    <form method="post" id="signin" action="https://twitter.com/sessions">
      <label for="username">Username or email</label>
      <input id="username" name="username" value="" title="username" tabindex="4" type="text">
      </p>
      <p>
        <label for="password">Password</label>
        <input id="password" name="password" value="" title="password" tabindex="5" type="password">
      </p>
      <p class="remember">
        <input id="signin_submit" value="Sign in" tabindex="6" type="submit">
        <input id="remember" name="remember_me" value="1" tabindex="7" type="checkbox">
        <label for="remember">Remember me</label>
      </p>
      <p class="forgot"> <a href="#" id="resend_password_link">Forgot your password?</a> </p>
      <p class="forgot-username"> <a id=forgot_username_link  title="If you remember your password, try logging in with your email" 
href="#">Forgot your username?</a> <a id=forgot_username_link href="sign_up.php">Register</a></p>
    </form>
  </fieldset>
  
<script src="javascripts/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function() {

            $(".signin").click(function(e) {          
				e.preventDefault();
                $("fieldset#signin_menu").toggle();
				$(".signin").toggleClass("menu-open");
            });
			
			$("fieldset#signin_menu").mouseup(function() {
				return false
			});
			$(document).mouseup(function(e) {
				if($(e.target).parent("a.signin").length==0) {
					$(".signin").removeClass("menu-open");
					$("fieldset#signin_menu").hide();
				}
			});			
			
        });
</script>
<script src="javascripts/jquery.tipsy.js" type="text/javascript"></script>
<script type='text/javascript'>
    $(function() {
	  $('#forgot_username_link').tipsy({gravity: 'w'});   
    });
  </script>







<div class="main">
<!--header -->
	<header>
		<div class="wrapper">
			<h1><a href="index.html" id="logo">Air lines</a></h1>
			<span id="slogan">Fast, Frequent &amp; Safe Flights</span>
			<nav id="top_nav">
				<ul>
					<li><a href="index.html" class="nav1">Home</a></li>
					<li><a href="#" class="nav2">Sitemap</a></li>
					
					<?if (!isset($_SESSION['u_type']))
					
	                 {// check if user has been authenticated
					echo "<li> <a href=login class=signin><span>Signin</span></a></li>";
					
                       }else{ echo "<li><a href=log_out.php class=nav1>Logout</a></li>"; }
					   
					         ?>					
					<li><a href="Contacts.html" class="nav3">Contact</a></li>
					
					
				</ul>
			</nav>
		</div>
		<nav>
			<ul id="menu">
				<li><a href="home.php"><span><span>About</span></span></a></li>
				<li><a href="Offers.php"><span><span>Offers</span></span></a></li>
				<li id="menu_active"><a href="Book.php"><span><span>Book</span></span></a></li>
				<li><a href="Services.php"><span><span>Services</span></span></a></li>
				<li><a href="Safety.php"><span><span>Safety</span></span></a></li>
				<?
				if(isset($_SESSION['u_type']) && $_SESSION['u_type']==1){ echo "<li><a href=safety.html><span><span>Transaction</span></span></a></li>";}
				?>
				
  
	</header>
<!-- / header -->
<!--content -->
	<section id="content">
		<div class="wrapper pad1">
			<article class="col1">
				<div class="box1">
					<h2 class="top">Hot Offers of the Week</h2>
					<div class="pad">
						<strong>Birmingham</strong><br>
						<ul class="pad_bot1 list1">
							<li><span class="right color1">from GBP 143.-</span><a href="Book2.html">Zurich</a></li>
						</ul>
						<strong>London (LCY)</strong><br>
						<ul class="pad_bot1 list1">
							<li><span class="right color1">from GBP 176.-</span><a href="Book2.html">Geneva</a></li>
							<li><span class="right color1">from GBP 109.-</span><a href="Book2.html">Zurich</a></li>
						</ul>
						<strong>London (LHR)</strong><br>
						<ul class="pad_bot2 list1">
							<li><span class="right color1">from GBP 100.-</span><a href="Book2.html">Geneva</a></li>
							<li><span class="right color1">from GBP 112.-</span><a href="Book2.html">Zurich</a></li>
							<li><span class="right color1">from GBP 88.-</span><a href="Book2.html">Basel</a></li>
						</ul>
						<strong>Manchester</strong><br>
						<ul class="pad_bot2 list1">
							<li><span class="right color1">from GBP 97.-</span><a href="Book2.html">Basel</a></li>
							<li><span class="right color1">from GBP 103.-</span><a href="Book2.html">Zurich</a></li>
						</ul>
						<strong>Edinburgh</strong><br>
						<ul class="pad_bot2 list1">
							<li><span class="right color1">from GBP 165.-</span><a href="Book2.html">Zurich</a></li>
						</ul>
						<strong>Birmingham</strong><br>
						<ul class="pad_bot1 list1">
							<li><span class="right color1">from GBP 143.-</span><a href="Book2.html">Zurich</a></li>
						</ul>
						<strong>London (LCY)</strong><br>
						<ul class="pad_bot1 list1">
							<li><span class="right color1">from GBP 176.-</span><a href="Book2.html">Geneva</a></li>
							<li><span class="right color1">from GBP 109.-</span><a href="Book2.html">Zurich</a></li>
						</ul>
						<strong>London (LHR)</strong><br>
						<ul class="pad_bot2 list1">
							<li><span class="right color1">from GBP 100.-</span><a href="Book2.html">Geneva</a></li>
							<li><span class="right color1">from GBP 112.-</span><a href="Book2.html">Zurich</a></li>
							<li><span class="right color1">from GBP 88.-</span><a href="Book2.html">Basel</a></li>
						</ul>
					</div>
				</div>
			</article>
			<article class="col2">
					<div class="tabs2">
							<ul class="nav">
								<li class="selected"><a href="#Flight">Flight</a></li>
								<li><a href="#Hotel">Hotel</a></li>
								<li class="end"><a href="#Rental">Rental</a></li>
							</ul>
							<div class="content">
								<div class="tab-content" id="Flight">
									<form id="form_5" class="form_5" method="post">
										<div>
											<div class="radio">
												<div class="wrapper">
													 <input type="radio" name="name1" checked>
													 <span class="left">Show prices</span>
													 <input type="radio" name="name1">
													 <span class="left">Show flights</span>
												</div>
											</div>
											<div class="pad">
												<div class="wrapper under">
													<div class="col1">
														<div class="row"><span class="left">From</span>
															<input type="text" class="input">
															<a href="#" class="help"></a>
														</div>
														<div class="row"><span class="left">To</span>
															<input type="text" class="input">
															<a href="#" class="help"></a>
														</div>
													</div>
													<div class="check_box">
														<input type="checkbox">
														<span>One way</span>
														<a href="#" class="help"></a>
													</div>
													<div class="check_box">
														<input type="checkbox">
														<span>Direct flights</span>
													</div>
												</div>
												<div class="wrapper under">
													<span class="left">Flights</span>
													<div class="cols marg_right1">
														<h6>Outbound flight</h6>
														<div class="row">
															<input type="text" class="input1" value="03.05.2011"  onblur="if(this.value=='') this.value='03.05.2011'" onFocus="if(this.value =='03.05.2011' ) this.value=''">
															<input type="text" class="input1" value="+/- 0 Days"  onblur="if(this.value=='') this.value='+/- 0 Days'" onFocus="if(this.value =='+/- 0 Days' ) this.value=''">
														</div>
														<div class="marg_top1">
															<div class="select1">
															<a href="#" class="marker_left"></a>
															<select><option>May 11</option><option>June 11</option><option>July 11</option></select>
															<a href="#" class="marker_right"></a>
															</div>
														</div>
														<div class="calendar">
															<ul class="thead">
																<li>Mon</li>
																<li>Tue</li>
																<li>Wed</li>
																<li>Thu</li>
																<li>Fri</li>
																<li>Sat</li>
																<li>Sun</li>
															</ul>
															<ul class="tbody">
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#">1</a></li>
																<li><a href="#">2</a></li>
																<li><a href="#">3</a></li>
																<li><a href="#">4</a></li>
																<li><a href="#" class="active">5</a></li>
																<li><a href="#">6</a></li>
																<li><a href="#">7</a></li>
																<li><a href="#">8</a></li>
																<li><a href="#">9</a></li>
																<li><a href="#">10</a></li>
																<li><a href="#">11</a></li>
																<li><a href="#">12</a></li>
																<li><a href="#">13</a></li>
																<li><a href="#">14</a></li>
																<li><a href="#">15</a></li>
																<li><a href="#">16</a></li>
																<li><a href="#">17</a></li>
																<li><a href="#">18</a></li>
																<li><a href="#">19</a></li>
																<li><a href="#">20</a></li>
																<li><a href="#">21</a></li>
																<li><a href="#">22</a></li>
																<li><a href="#">23</a></li>
																<li><a href="#">24</a></li>
																<li><a href="#">25</a></li>
																<li><a href="#">26</a></li>
																<li><a href="#">27</a></li>
																<li><a href="#">28</a></li>
																<li><a href="#">29</a></li>
																<li><a href="#">30</a></li>
																<li><a href="#">31</a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
															</ul>
														</div>
													</div>
													<div class="cols">
														<h5>Outbound flight</h5>
														<div class="row">
															<input type="text" class="input1" value="03.05.2011"  onblur="if(this.value=='') this.value='03.05.2011'" onFocus="if(this.value =='03.05.2011' ) this.value=''">
															<input type="text" class="input1" value="+/- 0 Days"  onblur="if(this.value=='') this.value='+/- 0 Days'" onFocus="if(this.value =='+/- 0 Days' ) this.value=''">
														</div>
														<div class="marg_top1">
															<div class="select1">
															<a href="#" class="marker_left"></a>
															<select><option>May 11</option><option>June 11</option><option>July 11</option></select>
															<a href="#" class="marker_right"></a>
															</div>
														</div>
														<div class="calendar">
															<ul class="thead">
																<li>Mon</li>
																<li>Tue</li>
																<li>Wed</li>
																<li>Thu</li>
																<li>Fri</li>
																<li>Sat</li>
																<li>Sun</li>
															</ul>
															<ul class="tbody">
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#">1</a></li>
																<li><a href="#">2</a></li>
																<li><a href="#">3</a></li>
																<li><a href="#">4</a></li>
																<li><a href="#" class="active">5</a></li>
																<li><a href="#">6</a></li>
																<li><a href="#">7</a></li>
																<li><a href="#">8</a></li>
																<li><a href="#">9</a></li>
																<li><a href="#">10</a></li>
																<li><a href="#">11</a></li>
																<li><a href="#">12</a></li>
																<li><a href="#">13</a></li>
																<li><a href="#">14</a></li>
																<li><a href="#">15</a></li>
																<li><a href="#">16</a></li>
																<li><a href="#">17</a></li>
																<li><a href="#">18</a></li>
																<li><a href="#">19</a></li>
																<li><a href="#">20</a></li>
																<li><a href="#">21</a></li>
																<li><a href="#">22</a></li>
																<li><a href="#">23</a></li>
																<li><a href="#">24</a></li>
																<li><a href="#">25</a></li>
																<li><a href="#">26</a></li>
																<li><a href="#">27</a></li>
																<li><a href="#">28</a></li>
																<li><a href="#">29</a></li>
																<li><a href="#">30</a></li>
																<li><a href="#">31</a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
															</ul>
														</div>
													</div>
												</div>
												<div class="wrapper pad_bot1">
													<span class="left">Passengers</span>
													<div class="cols marg_right1">
														<div class="row">
															<input type="text" class="input2" value="2"  onblur="if(this.value=='') this.value='2'" onFocus="if(this.value =='2' ) this.value=''">
															<span class="left">Adults</span>
															<a href="#" class="help"></a>
														</div>
														<div class="row">
															<input type="text" class="input2" value="0"  onblur="if(this.value=='') this.value='0'" onFocus="if(this.value =='0' ) this.value=''">
															<span class="left">Children</span>
															<a href="#" class="help"></a>
														</div>
													</div>
													<div class="cols">
														<div class="select1"><span class="left">Class</span><select><option>Economy</option></select>
															<a href="#" class="help"></a>
														</div>
														<div class="select1"><span class="left">Airline</span><select><option>Airlines</option></select>
															<a href="#" class="help"></a>
														</div>
													</div>
													<span class="right relative"><a href="#" class="button1" onClick="document.getElementById('form_5').submit()"><strong>Search</strong></a></span>
												</div>
											</div>
										</div>
									</form>
								</div>
								<div class="tab-content" id="Hotel">
									<form id="form_6" class="form_5" method="post">
										<div>
											<div class="radio">
												<div class="wrapper">
													 <input type="radio" name="name1" checked>
													 <span class="left">Show prices</span>
													 <input type="radio" name="name1">
													 <span class="left">Show flights</span>
												</div>
											</div>
											<div class="pad">
												<div class="wrapper under">
													<div class="col1">
														<div class="row"><span class="left">From</span>
															<input type="text" class="input">
															<a href="#" class="help"></a>
														</div>
														<div class="row"><span class="left">To</span>
															<input type="text" class="input">
															<a href="#" class="help"></a>
														</div>
													</div>
													<div class="check_box">
														<input type="checkbox">
														<span>One way</span>
														<a href="#" class="help"></a>
													</div>
													<div class="check_box">
														<input type="checkbox">
														<span>Direct flights</span>
													</div>
												</div>
												<div class="wrapper under">
													<span class="left">Flights</span>
													<div class="cols marg_right1">
														<h6>Outbound flight</h6>
														<div class="row">
															<input type="text" class="input1" value="03.05.2011"  onblur="if(this.value=='') this.value='03.05.2011'" onFocus="if(this.value =='03.05.2011' ) this.value=''">
															<input type="text" class="input1" value="+/- 0 Days"  onblur="if(this.value=='') this.value='+/- 0 Days'" onFocus="if(this.value =='+/- 0 Days' ) this.value=''">
														</div>
														<div class="marg_top1">
															<div class="select1">
															<a href="#" class="marker_left"></a>
															<select><option>May 11</option><option>June 11</option><option>July 11</option></select>
															<a href="#" class="marker_right"></a>
															</div>
														</div>
														<div class="calendar">
															<ul class="thead">
																<li>Mon</li>
																<li>Tue</li>
																<li>Wed</li>
																<li>Thu</li>
																<li>Fri</li>
																<li>Sat</li>
																<li>Sun</li>
															</ul>
															<ul class="tbody">
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#">1</a></li>
																<li><a href="#">2</a></li>
																<li><a href="#">3</a></li>
																<li><a href="#">4</a></li>
																<li><a href="#" class="active">5</a></li>
																<li><a href="#">6</a></li>
																<li><a href="#">7</a></li>
																<li><a href="#">8</a></li>
																<li><a href="#">9</a></li>
																<li><a href="#">10</a></li>
																<li><a href="#">11</a></li>
																<li><a href="#">12</a></li>
																<li><a href="#">13</a></li>
																<li><a href="#">14</a></li>
																<li><a href="#">15</a></li>
																<li><a href="#">16</a></li>
																<li><a href="#">17</a></li>
																<li><a href="#">18</a></li>
																<li><a href="#">19</a></li>
																<li><a href="#">20</a></li>
																<li><a href="#">21</a></li>
																<li><a href="#">22</a></li>
																<li><a href="#">23</a></li>
																<li><a href="#">24</a></li>
																<li><a href="#">25</a></li>
																<li><a href="#">26</a></li>
																<li><a href="#">27</a></li>
																<li><a href="#">28</a></li>
																<li><a href="#">29</a></li>
																<li><a href="#">30</a></li>
																<li><a href="#">31</a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
															</ul>
														</div>
													</div>
													<div class="cols">
														<h5>Outbound flight</h5>
														<div class="row">
															<input type="text" class="input1" value="03.05.2011"  onblur="if(this.value=='') this.value='03.05.2011'" onFocus="if(this.value =='03.05.2011' ) this.value=''">
															<input type="text" class="input1" value="+/- 0 Days"  onblur="if(this.value=='') this.value='+/- 0 Days'" onFocus="if(this.value =='+/- 0 Days' ) this.value=''">
														</div>
														<div class="marg_top1">
															<div class="select1">
															<a href="#" class="marker_left"></a>
															<select><option>May 11</option><option>June 11</option><option>July 11</option></select>
															<a href="#" class="marker_right"></a>
															</div>
														</div>
														<div class="calendar">
															<ul class="thead">
																<li>Mon</li>
																<li>Tue</li>
																<li>Wed</li>
																<li>Thu</li>
																<li>Fri</li>
																<li>Sat</li>
																<li>Sun</li>
															</ul>
															<ul class="tbody">
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#">1</a></li>
																<li><a href="#">2</a></li>
																<li><a href="#">3</a></li>
																<li><a href="#">4</a></li>
																<li><a href="#" class="active">5</a></li>
																<li><a href="#">6</a></li>
																<li><a href="#">7</a></li>
																<li><a href="#">8</a></li>
																<li><a href="#">9</a></li>
																<li><a href="#">10</a></li>
																<li><a href="#">11</a></li>
																<li><a href="#">12</a></li>
																<li><a href="#">13</a></li>
																<li><a href="#">14</a></li>
																<li><a href="#">15</a></li>
																<li><a href="#">16</a></li>
																<li><a href="#">17</a></li>
																<li><a href="#">18</a></li>
																<li><a href="#">19</a></li>
																<li><a href="#">20</a></li>
																<li><a href="#">21</a></li>
																<li><a href="#">22</a></li>
																<li><a href="#">23</a></li>
																<li><a href="#">24</a></li>
																<li><a href="#">25</a></li>
																<li><a href="#">26</a></li>
																<li><a href="#">27</a></li>
																<li><a href="#">28</a></li>
																<li><a href="#">29</a></li>
																<li><a href="#">30</a></li>
																<li><a href="#">31</a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
															</ul>
														</div>
													</div>
												</div>
												<div class="wrapper pad_bot1">
													<span class="left">Passengers</span>
													<div class="cols marg_right1">
														<div class="row">
															<input type="text" class="input2" value="2"  onblur="if(this.value=='') this.value='2'" onFocus="if(this.value =='2' ) this.value=''">
															<span class="left">Adults</span>
															<a href="#" class="help"></a>
														</div>
														<div class="row">
															<input type="text" class="input2" value="0"  onblur="if(this.value=='') this.value='0'" onFocus="if(this.value =='0' ) this.value=''">
															<span class="left">Children</span>
															<a href="#" class="help"></a>
														</div>
													</div>
													<div class="cols">
														<div class="select1"><span class="left">Class</span><select><option>Economy</option></select><a href="#" class="help"></a></div>
														<div class="select1"><span class="left">Airline</span><select><option>Airlines</option></select><a href="#" class="help"></a></div>
													</div>
													<span class="right relative"><a href="#" class="button1" onClick="document.getElementById('form_6').submit()"><strong>Search</strong></a></span>
												</div>
											</div>
										</div>
									</form>
								</div>
								<div class="tab-content" id="Rental">
									<form id="form_7" class="form_5" method="post">
										<div>
											<div class="radio">
												<div class="wrapper">
													 <input type="radio" name="name1" checked><span class="left">Show prices</span>
													 <input type="radio" name="name1"><span class="left">Show flights</span>
												</div>
											</div>
											<div class="pad">
												<div class="wrapper under">
													<div class="col1">
														<div class="row"><span class="left">From</span><input type="text" class="input"><a href="#" class="help"></a></div>
														<div class="row"><span class="left">To</span><input type="text" class="input"><a href="#" class="help"></a></div>
													</div>
													<div class="check_box"><input type="checkbox"><span>One way</span><a href="#" class="help"></a></div>
													<div class="check_box"><input type="checkbox"><span>Direct flights</span></div>
												</div>
												<div class="wrapper under">
													<span class="left">Flights</span>
													<div class="cols marg_right1">
														<h6>Outbound flight</h6>
														<div class="row">
															<input type="text" class="input1" value="03.05.2011"  onblur="if(this.value=='') this.value='03.05.2011'" onFocus="if(this.value =='03.05.2011' ) this.value=''">
															<input type="text" class="input1" value="+/- 0 Days"  onblur="if(this.value=='') this.value='+/- 0 Days'" onFocus="if(this.value =='+/- 0 Days' ) this.value=''">
														</div>
														<div class="marg_top1">
															<div class="select1">
															<a href="#" class="marker_left"></a>
															<select><option>May 11</option><option>June 11</option><option>July 11</option></select>
															<a href="#" class="marker_right"></a>
															</div>
														</div>
														<div class="calendar">
															<ul class="thead">
																<li>Mon</li>
																<li>Tue</li>
																<li>Wed</li>
																<li>Thu</li>
																<li>Fri</li>
																<li>Sat</li>
																<li>Sun</li>
															</ul>
															<ul class="tbody">
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#">1</a></li>
																<li><a href="#">2</a></li>
																<li><a href="#">3</a></li>
																<li><a href="#">4</a></li>
																<li><a href="#" class="active">5</a></li>
																<li><a href="#">6</a></li>
																<li><a href="#">7</a></li>
																<li><a href="#">8</a></li>
																<li><a href="#">9</a></li>
																<li><a href="#">10</a></li>
																<li><a href="#">11</a></li>
																<li><a href="#">12</a></li>
																<li><a href="#">13</a></li>
																<li><a href="#">14</a></li>
																<li><a href="#">15</a></li>
																<li><a href="#">16</a></li>
																<li><a href="#">17</a></li>
																<li><a href="#">18</a></li>
																<li><a href="#">19</a></li>
																<li><a href="#">20</a></li>
																<li><a href="#">21</a></li>
																<li><a href="#">22</a></li>
																<li><a href="#">23</a></li>
																<li><a href="#">24</a></li>
																<li><a href="#">25</a></li>
																<li><a href="#">26</a></li>
																<li><a href="#">27</a></li>
																<li><a href="#">28</a></li>
																<li><a href="#">29</a></li>
																<li><a href="#">30</a></li>
																<li><a href="#">31</a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
															</ul>
														</div>
													</div>
													<div class="cols">
														<h5>Outbound flight</h5>
														<div class="row">
															<input type="text" class="input1" value="03.05.2011"  onblur="if(this.value=='') this.value='03.05.2011'" onFocus="if(this.value =='03.05.2011' ) this.value=''">
															<input type="text" class="input1" value="+/- 0 Days"  onblur="if(this.value=='') this.value='+/- 0 Days'" onFocus="if(this.value =='+/- 0 Days' ) this.value=''">
														</div>
														<div class="marg_top1">
															<div class="select1">
															<a href="#" class="marker_left"></a>
															<select><option>May 11</option><option>June 11</option><option>July 11</option></select>
															<a href="#" class="marker_right"></a>
															</div>
														</div>
														<div class="calendar">
															<ul class="thead">
																<li>Mon</li>
																<li>Tue</li>
																<li>Wed</li>
																<li>Thu</li>
																<li>Fri</li>
																<li>Sat</li>
																<li>Sun</li>
															</ul>
															<ul class="tbody">
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#">1</a></li>
																<li><a href="#">2</a></li>
																<li><a href="#">3</a></li>
																<li><a href="#">4</a></li>
																<li><a href="#" class="active">5</a></li>
																<li><a href="#">6</a></li>
																<li><a href="#">7</a></li>
																<li><a href="#">8</a></li>
																<li><a href="#">9</a></li>
																<li><a href="#">10</a></li>
																<li><a href="#">11</a></li>
																<li><a href="#">12</a></li>
																<li><a href="#">13</a></li>
																<li><a href="#">14</a></li>
																<li><a href="#">15</a></li>
																<li><a href="#">16</a></li>
																<li><a href="#">17</a></li>
																<li><a href="#">18</a></li>
																<li><a href="#">19</a></li>
																<li><a href="#">20</a></li>
																<li><a href="#">21</a></li>
																<li><a href="#">22</a></li>
																<li><a href="#">23</a></li>
																<li><a href="#">24</a></li>
																<li><a href="#">25</a></li>
																<li><a href="#">26</a></li>
																<li><a href="#">27</a></li>
																<li><a href="#">28</a></li>
																<li><a href="#">29</a></li>
																<li><a href="#">30</a></li>
																<li><a href="#">31</a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
																<li><a href="#"></a></li>
															</ul>
														</div>
													</div>
												</div>
												<div class="wrapper pad_bot1">
													<span class="left">Passengers</span>
													<div class="cols marg_right1">
														<div class="row">
															<input type="text" class="input2" value="2"  onblur="if(this.value=='') this.value='2'" onFocus="if(this.value =='2' ) this.value=''">
															<span class="left">Adults</span>
															<a href="#" class="help"></a>
														</div>
														<div class="row">
															<input type="text" class="input2" value="0"  onblur="if(this.value=='') this.value='0'" onFocus="if(this.value =='0' ) this.value=''">
															<span class="left">Children</span>
															<a href="#" class="help"></a>
														</div>
													</div>
													<div class="cols">
														<div class="select1"><span class="left">Class</span><select><option>Economy</option></select>
															<a href="#" class="help"></a>
														</div>
														<div class="select1"><span class="left">Airline</span><select><option>Airlines</option></select>
															<a href="#" class="help"></a>
														</div>
													</div>
													<span class="right relative"><a href="#" class="button1" onClick="document.getElementById('form_7').submit()"><strong>Search</strong></a></span>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</article>
				</div>
			</section>
			<!--content end-->
			<!--footer -->
			<footer>
				<div class="wrapper">
					<ul id="icons">
						<li><a href="#" class="normaltip" title="Facebook"><img src="images/icon1.jpg" alt=""></a></li>
						<li><a href="#" class="normaltip" title="Delicious"><img src="images/icon2.jpg" alt=""></a></li>
						<li><a href="#" class="normaltip" title="Stumble Upon"><img src="images/icon3.jpg" alt=""></a></li>
						<li><a href="#" class="normaltip" title="Twitter"><img src="images/icon4.jpg" alt=""></a></li>
						<li><a href="#" class="normaltip" title="Linkedin"><img src="images/icon5.jpg" alt=""></a></li>
						<li><a href="#" class="normaltip" title="Reddit"><img src="images/icon6.jpg" alt=""></a></li>
					</ul>
					<div class="links">
						Website template designed by <a href="http://www.templatemonster.com/" target="_blank" rel="nofollow">www.templatemonster.com</a><br>
						3D Models provided by <a href="http://www.templates.com/product/3d-models/" target="_blank" rel="nofollow">www.templates.com</a></div>
				</div>
			</footer>
			<!--footer end-->
		</div>
<script type="text/javascript"> Cufon.now(); </script>
<script>
	jQuery(document).ready(function($) {
		$('.form_5').jqTransform({imgPath:'jqtransformplugin/img/'});	
	});
	$(document).ready(function() {
		tabs2.init();
	});
</script>
</body>
</html>