<?php
// start session
if (!isset($_SESSION))
{
	session_start();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include 'section/Head.php'; ?>
</head>
<body>
<!-- start header -->
<div id="header">
	<?php include 'section/Header.php'; ?>
</div>
<!-- end header -->
<!-- star menu -->
<div id="menu">
	<ul>
		<?php include 'section/Menu.php'; ?>
	</ul>
</div>
<!-- end menu -->
<!-- start page -->
<div id="page">

<body>
<div style= "width:430px; margin:0 auto;"> <!--"text-align:center;"> -->
<a name="top"></a>
<h1 style="margin-bottom:0;"> Frequently Asked Questions </h1> </div>
<br />

<a href="#makeAccount">How do I make an account?</a> <br />
<a href="#whyAccount">What is the benefit of making an account?</a> <br />
<a href="#cancel">Can i cancel my Flight without a fee?</a> <br />
<a href="#protected">How is my privacy protected?</a> <br />
<a href="#upgrade">How do I upgrade my Account to VIP?</a> <br />
<a href="#forgotPassword">What if I forgot my Password?</a> <br />
<a href="#seat">How do I choose my seat?</a> <br />
 	

<a name="makeAccount"></a>
<h2> Make an Account </h2>
<p>
To make an Account locate the Sign-up button at the top right corner of the home page. <br />
The page will lead you through the steps on creating your own account with us.
</p>
<a href="#top">Back to Top </a> <br />

<a name="whyAccount"></a>
<h2> Why have an Account? </h2>
<p>
Some benfits to having an account would be not having to have to reinsert your credit <br /> 
card information everytime you book a flight. You will earn flier milage that can lead <br />
to discount on future flights. Without making an account you cannot collect these discounts.
</p>
<a href="#top">Back to Top </a> <br />

<a name="cancel"></a>
<h2> Can I cancel my flight without a fee? </h2>

<p>
You may cancel any flight at any time 24 hours before your flight without penalty. If 24 <br />
hours or less remain you will recieve half of your payment back. If 6 hours or less remain <br /> 
no reinbursment will be available.
</p>
<a href="#top">Back to Top </a> <br />

<a name="protected"></a>
<h2>How is my privacy protected?</h2>
<p>
Your passwords, emails,credit card information, and any personal information given will be <br />
encrypted. You are safe with us.
</p>
<a href="#top">Back to Top </a> <br />

<a name="upgrade"></a>
<h2>How do I upgrade my Account to VIP?</h2>
<p>
When you reach frequent flier status you will be given the option to upgrade to VIP. To reach <br />
Frequent Flier status you have to book a flight at least once a month for a year to be eligable.
</p>
<a href="#top">Back to Top </a> <br />

<a name="forgotPassword"></a>
<h2>What if I forgot my Password</h2>
<p>
There will be an option to make a new password under the "Forgot Password" link. To make sure <br />
not just anyone can change your password, you will be sent an email to your email address that <br />
is linked to your account. 
</p>
<a href="#top">Back to Top </a> <br />

<a name="seat"></a>
<h2>How do I choose my seat?</h2>
<p>
Once you fill in your flight information on the home page you will be lead to the diagram of the <br />
plane that will take you to your destination and back if round trip. Click on the diagram where you<br />
would like to sit. Some seats marked in red will not be available. 
</p>
<a href="#top">Back to Top </a> <br />
</div>
</body>
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