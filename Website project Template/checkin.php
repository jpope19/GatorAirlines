
<?php

$the_ticket_error =null;
$the_name_error =null;

	if (isset($_POST['submit']))
	{
		include("../classes/users.class.php");
		$users = new users();
		$result = $users->check_ticket($_POST["ticket"]);
    		
		if($result == false)
		{
			die($result);
		}
		 //if the ticket is valid, then check if the name is valid.
		if(count($result) == 1)
		{
		 $result_two = $users->check_name($_POST["name"],$result[0]['cid']);
			//Check if the name has the same cid as the ticket, if it does not then error
			if(count($result_two) != 1)
			{
				$the_name_error='Invalid last name';
			}
		}
		//if bad ticket number, display and error message.

		else
		{
			
			$the_ticket_error= 'Invalid ticket number!';
		}
		
		//Close connection
		mysql_close($con);
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
        <form class="box login" method="post" action="checkin.php" >
		Last Name: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="name"><br>
		Ticket Number: <input type="text" name="ticket"><br>
		<input type="submit" value="Submit">
		</form>
    </div>
</body>

	<?php if($the_ticket_error!=null){
	 
	 echo '<p style="color: red; text-align: center">
      Invalid ticket number!
      </p>';
	 
	 }?> 
	 <?php if($the_name_error!=null){
	 
	 echo '<p style="color: red; text-align: center">
      Invalid last name!
      </p>';
	 
	 }?> 

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
