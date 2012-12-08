<?php
if (!isset($_SESSION))
{
	session_start();
    
	}
$first_name = $_SESSION['first_name'];
$last_name= $_SESSION['last_name'];	
$email = $_SESSION['email'];
$password = $_SESSION['password'];	
$addr = $_SESSION['addr'];
$state = $_SESSION['state'];
$zip = $_SESSION['zip'];
$cc_num = $_SESSION['cc_num'];
$city = $_SESSION['city'];

	
$ticket_id=0;	//ticket number for a reservation.
$result=null;    //to hold the query set.
$reservations=null; //to hold the number of reservations (integer) for a particular customer.

include("classes/users.class.php");
include("classes/airport.class.php");
     $users = new users();
	 $results= $users->get_reservation($_SESSION['cid']);
	 
if($results!=false)    
{
   $reservations = $results;
}

    //update user's info in the database. when they click button.
   if(isset($_POST['save']))
   {
  $users->cust_update($_POST['first_name'],$_POST['last_name'],$_POST['email'],$_POST['password'],$_POST['addr'],$_POST['state']
                     ,$_POST['zip'],$_POST['cc_num'],$email);
   
   }
?>
 



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Account</title>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
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
	<script type="text/javascript" src="js/confirmation.js"></script>

	
	
	<script type="text/javascript">
jQuery(document).ready(function() {
  jQuery(".content_1").hide();
  //toggle the componenet with class msg_body
  jQuery(".but1").click(function()
  {
    jQuery(this).next(".content_1").slideToggle(500);
  });
});
</script>

</head>


<body id="page4">


<div class="main">
<!--header -->
	<?include('section/header2.php')?>
<!-- / header -->


<?echo "<h2>Welcome back ".$_SESSION['first_name']."!</h2><br/>";?>
 <div id="sidebar1">
    <b>Personal Info</b>
	
	
 <button class="but1" id="edit" style="background-color:red;">Edit</button>
     <div class="content_1">
		<br/><br/>   
		    <form action=myaccount.php method=post >
   <table border=0 cellpadding=5>
  <tr>
    <td>First Name:</td>
    <td><label>
      <input type=text name=first_name id=first_name value=<?echo $first_name;?> />
    </label></td>
  </tr>
  <tr>
    <td>Last Name:</td>
    <td><input type=text name=last_name id=last_name value=<?echo $last_name;?> /></td>
  </tr>
  <tr>
    <td>DOB:
    <p><br/>Email:</p></td>
    <td><p>
      <input type=text name=dob id=dob />
    </p>
      <p>
        <input type=text name=email id=email value=<?echo $email;?> />
    </p></td>
  </tr>
  <tr>
    <td>Password:</td>
    <td><input type=password name=password id=password value=<?echo $password;?>/></td>
  </tr>
  <tr>
    <td>Address:</td>
    <td><input type=text name=addr id=addr  value=<?echo $addr;?>/></td>
  </tr>
  <tr>
    <td>City</td>
    <td><input type=text name=city id=city value=<? echo $city;?> /></td>
  </tr>
  <tr>
    <td>State:</td>
    <td><input type=text   name=state  value=<?echo $state;?> /></td>
  </tr>
  <tr>
    <td>Zip:</td>
    <td><input type=text name=zip id=zip size=5   value=<? echo $zip;?>  /></td>
  </tr>
  <tr>
    <td>Credit Card:</td>
    <td><input type=text name=cc_num id=cc_num   value=<? echo $cc_num;?>    /></td>
  </tr>
  <tr>
    <td height=85>&nbsp;</td> 
    <td><p>
      <label>
	  <br/>
        <button id=button1 name=save class=button1>Save changes</button>
      </label>
    </p>
    <p>&nbsp; </p></td>
  </tr>
</table>
</form>
  </div>
  
	     
</div>
		 
<!--content -->
	<section id="content">
		   <div class="wrapper pad1">
		   
		 <!--  DO YOU WORK HERE !!!! -->  
		 
		 
	 
		   
 <?      
	echo "<strong>My Flights</strong><img src= images/plus.png class=but1 />";  
	  echo "<div class=content_1 style=background-color:#eee9e9;>";	 
     echo "you currently have ". count($reservations)." reservation(s) on your account.";	  
  echo   " <table width=77% border=1 cellpadding=5>
  <tr>
  <td><strong>Departure</strong></td>
    <td><strong>Destination</strong></td>
    <td><strong>Ticket#</strong></td>
    <td><strong>Flight#</strong></td>
    <td><strong>Seat#</strong></td>
    <td><strong>Price</strong></td>
	<td><strong>Status</strong></td>
	<td><strong>Action</strong></td>
  </tr>";
  foreach($results as $result)
	  {	
	 $depart = Airport::get_name_by_id($result['org_id'], $users);
     $arrival = Airport::get_name_by_id($result['dest_id'], $users);
	  $ticket_id =$result['ticket_id'];
echo "<tr>
    <td>$depart</td>
	<td>$arrival</td>
    <td>$result[ticket_id]</td>
    <td>$result[flight_id]</td>
    <td>$result[seat_id]</td>
    <td>$$result[price]</td>
	<td><strong style=color:green;>Active</strong></td>";
	
	echo "<td><a href='delete.php?id=" . $result['ticket_id'] . "'><button class=button1 onclick='return doConfirmDelete(this.id);'>Delete</button></a></td>";
  // echo"<td><a href='checkin.php?id=". $result['ticket']."'><input type=submit  value=check-in></td>";
   echo "
  </tr>";
	  	 } 

			 echo "</table>";
			 echo "</div>";
           
   ?>     
		   
		 
				        </div>
			</section>
			
		
			<!--content end-->
			
			<!--footer -->
			<?include('section/footer2.php')?>
			<!--footer end-->
		</div>

</body>
</html>