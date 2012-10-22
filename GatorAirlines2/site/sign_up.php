<?php
$con = mysql_connect("localhost","jpope","baseball19");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }



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
			
			echo "<center><font class='error'><br /><br />This account already exist!</font></center>";
		}
		
		//if email is valid, insert the user into the customers table.
		else{
		$query = "insert into customers values('".$_POST['email']."','".$_POST['first_name']."','".$_POST['last_name']."','".$_POST['password']."','".$_POST['addr']."',
		                                        '".$_POST['cc_num']."','0')";
	
           	$result = mysql_query($query,$con);
			
		if(!$result)
		{
			die("Invalid query! <br> The query is: " . $query);
		}
		
		header("Location:myaccount.php"); // redirects
}
		
		
}		



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="../css/chosen.css">
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


<table width="74%" border="0" cellpadding="5">
    <tr>
    <form action="sign_up" method="post">
      <td width="19%">First name</td>
      <td width="81%"><input type="text" name="first_name" id="first_name" /></td>
      </tr>
      <tr>
        <td>Last name</td>
        <td><input type="text" name="last_name" id="last_name" /></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><input type="text" name="email" id="email" /></td>
      </tr>
      <tr>
        <td>Billing address</td>
        <td><input type="text" name="address" id="address" /></td>
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
        <td><input type="text" name="zip" id="zip" size="5"/></td>
      </tr>
      <tr>
        <td>Credit card number    </td>
        <td><input type="text" name="cc_num" id="cc_num" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input type="submit" name="submit" id="submit" value="Submit" />
        </label></td>
      </tr></form>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><div align="center"></div></td>
    </tr>
  </table>


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
