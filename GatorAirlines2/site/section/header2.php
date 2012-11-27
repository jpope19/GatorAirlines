<?php
// Check to see if the site requires https and is in http. If needs https, force it.
if(isset($https) && (https==true) && $_SERVER['SERVER_PORT'] != 443) {
   header("HTTP/1.1 301 Moved Permanently");
   header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
   exit();
}
else
{// Force to http if https is not necessary.
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	exit();
}
?>

<div id="login-box" class="login-popup">
     <a href="#" class="close" style="margin-left:210px;"><img src="images/close.png" width ="30" height= "30" class="btn_close" title="Close Window" alt="Close" /></a>
          <form method="post" class="signin" action="log_in.php">
                <fieldset class="textbox">
            	<label class="username">
                <span>Email</span>
                <input id="username" name="email" value="" type="text" autocomplete="on" placeholder="Username" required>
                </label>
                <label class="password">
                <span>Password</span>
                <input id="password" name="password" value="" type="password" placeholder="Password">
                </label>
                <button class="submit button" type="submit" name="submit">Sign in</button>
                <p> 
				<br/><br/>
                <button class="button1" name="recovery">Send password to my email</button>
                </p>        
                </fieldset>
          </form>
</div>


    
  <header>
		<div class="wrapper">
			<h1><a href="home.php" id="logo">Air lines</a></h1>
			<span id="slogan"><i>"Fly Safe with a Gator!"</i></span>
			<nav id="top_nav">
				<ul>
					<li><a href="home.php" class="nav1">Home</a></li>
					<li><a href="#" class="nav2">Sitemap</a></li>
					
					<?if (!isset($_SESSION['u_type']))
					
	                 {// check if user has been authenticated
					echo "<li> <a href=#login-box class=login-window>Login</a></li>";
					echo "<li> <a href=sign_up.php class=nav6>Sign up</a></li>";
                       }else{ echo "<li><a href=log_out.php class=nav5>Logout</a></li>"; }
					   
					         ?>					
					<li><a href="Contacts.php" class="nav3">Contact</a></li>
					
				</ul>
			</nav>
		</div>
		<nav>
			<ul id="menu">
				<li><a href="home.php"><span><span>Home</span></span></a></li>
				<?if(isset($_SESSION['u_type']) ) {echo "<li><a href=MyAccount.php><span><span>My Account</span></span></a></li>";}  ?>
				<li><a href="reservation.php"><span><span>Reservations</span></span></a></li>
				<li><a href="checkin.php"><span><span>Check-In</span></span></a></li>
				<li><a href="flight_times.php"><span><span>Flight Times</span></span></a></li>
				
				<?
				if(isset($_SESSION['u_type']) && $_SESSION['u_type']==1){ echo "<li><a href=admin.php><span><span>Admin</span></span></a></li>";}
				?>
				
  
	</header>