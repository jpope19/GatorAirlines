<?php

$error = null;
$con = mysql_connect("localhost","jpope","baseball19");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  
  mysql_select_db('gatorairlines', $con);
  
  

if (isset($_POST['submit']))
{


// check if the email is already taken
$query = "select * from customers where email = '".$_POST['email']."'";
$result = mysql_query($query,$con);	

if(!$result)
{
die("Invalid query! <br> The query is: " . $query);
}

if(mysql_num_rows($result) == 1)
{

$error = "<p style=color:red>An account already exists with ".$_POST['email']."</p>";
}

//if email is valid, insert the user into the customers table.
else{
$query = "insert into customers values (0,'".$_POST['email']."','".$_POST['first_name']."','".$_POST['last_name']."','".$_POST['password']."','".$_POST['address']."','".$_POST['city']."','".$_POST['state']."',".$_POST['zip'].",".$_POST['cc_num'].",0)";

            $result = mysql_query($query,$con);

if(!$result)
{
die("Invalid query! <br> The query is: " . $query.mysql_error());
}


header("Location:myaccount.php"); // redirects
}


}	

?>






<!DOCTYPE html>
<html lang="en">
<head>
  <title>Services</title>
  
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


<body id="page4">


<div class="main">
<!--header -->
	<?include('section/header2.php')?>
<!-- / header -->


<!--content -->
	<section id="content">
		   <div class="signup_div">
		   
		 <!--  DO YOU WORK HERE !!!! -->  
		 <br/><br/> <?if($error!=null){echo $error;}?> 
		  
		   <table width="74%" border="0" cellpadding="5">
<tr>
<br>
</br>
<form action="sign_up.php" method="post">
<td width="19%">First name</td>
<td width="81%"><input type="text" name="first_name" id="first_name"  required/></td>
</tr>
<tr>
<td>Last name</td>
<td><input type="text" name="last_name" id="last_name" required/></td>
</tr>
<tr>
<td>Email</td>
<td><input type="text" name="email" id="email" required/></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" name="password" id="password" required/></td>
</tr>
<tr>
<td>Billing address</td>
<td><input type="text" name="address" id="address" required/></td>
</tr>
<tr>
<td>City
<label>
<input type="text" name="city" id="city" />
</label></td>
<td>State
<label>
<select name="state" id="state">
<option value="AL">AL</option>
<option value="AK">AK</option>
<option value="AZ">AZ</option>
<option value="AR">AR</option>
<option value="CA">CA</option>
<option value="CO">CO</option>
<option value="CT">CT</option>
<option value="DE">DE</option>
<option value="DC">DC</option>
<option value="FL">FL</option>
<option value="GA">GA</option>
<option value="HI">HI</option>
<option value="ID">ID</option>
<option value="IL">IL</option>
<option value="IN">IN</option>
<option value="IA">IA</option>
<option value="KS">KS</option>
<option value="KY">KY</option>
<option value="LA">LA</option>
<option value="ME">ME</option>
<option value="MD">MD</option>
<option value="MA">MA</option>
<option value="MI">MI</option>
<option value="MN">MN</option>
<option value="MS">MS</option>
<option value="MO">MO</option>
<option value="MT">MT</option>
<option value="NE">NE</option>
<option value="NV">NV</option>
<option value="NH">NH</option>
<option value="NJ">NJ</option>
<option value="NM">NM</option>
<option value="NY">NY</option>
<option value="NC">NC</option>
<option value="ND">ND</option>
<option value="OH">OH</option>
<option value="OK">OK</option>
<option value="OR">OR</option>
<option value="PA">PA</option>
<option value="RI">RI</option>
<option value="SC">SC</option>
<option value="SD">SD</option>
<option value="TN">TN</option>
<option value="TX">TX</option>
<option value="UT">UT</option>
<option value="VT">VT</option>
<option value="VA">VA</option>
<option value="WA">WA</option>
<option value="WV">WV</option>
<option value="WI">WI</option>
<option value="WY">WY</option>
</select>
</label></td>
</tr>
<tr>
<td>Zip code</td>
<td><input type="text" name="zip" id="zip" size="5" required/></td>
</tr>
<tr>
<td>Credit card number </td>
<td><input type="text" name="cc_num" id="cc_num"  required/></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><label><br/>
<button type="submit" name="submit" id="submit" class="button1"> Submit</button>
</label></td>
</tr></form>
</tr>
<tr>
<td>&nbsp;</td>
<td><div align="center"></div></td>
</tr>
</table>
	   
	  
				        </div>
			</section>
			
			
		
			<!--content end-->
			<!--footer -->
			<?include('section/footer2.php')?>
			<!--footer end-->
		</div>

</body>
</html>