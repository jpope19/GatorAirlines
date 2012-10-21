
<?include("mail/sendMail.php"); //include mailing function (in mail folder).

$to = "gatorairlines@hotmail.com"; //where to send email.

if(isset($_POST['submit'])){

mail_attachment(null,$to, $_POST['name'], 'Client Mail', $_POST['textarea']);
}

  ?>








<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contacts</title>
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
	<section id="content">
		<div class="wrapper pad1">
			<article class="col1">
				<div class="box1">
							<h2 class="top">Contact Us</h2>
							<div class="pad">
								<div class="wrapper pad_bot1">
									<p class="cols pad_bot2"><strong>Country:<br>
										City:<br>
										Address:<br>
										Email:</strong></p>
									<p class="color1 pad_bot2">USA<br>
										Gainesville<br>
										<br>
										<a href="mailto:">gatorairlines@hotmail.</a></p>
								</div>
							</div>
							<h2></h2>
							<div class="pad pad_bot1">
								<p class="pad_bot2">We will get back to you as soon as possible. </p><br>
								
							</div>
						</div>
					</article>
					<article class="col2">
						<h3 class="pad_top1">Contact Form</h3>
						<form id="ContactForm" action="contacts.php" method="post">
							<div>
								<div  class="wrapper">
									<span>Name:</span>
									<input type="text" class="input" name="name">
								</div>
								<div  class="wrapper">
									<span>Email:</span>
									<input type="text" class="input" name ="email" >								
								</div>
								<div  class="textarea_box">
									<span>Message:</span>
									<textarea name="textarea" cols="1" rows="1"></textarea>								
								</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<button class = "button1" type="submit" name="submit">Send</button>
						
							</div>
						</form>
					</article>
				</div>
			</section>
			<!--content end-->
			<!--footer -->
			
			<?include('section/footer2.php')?>
			<!--footer end-->
		</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>