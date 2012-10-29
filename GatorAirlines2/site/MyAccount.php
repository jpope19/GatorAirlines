<?php
if (!isset($_SESSION))
{
	session_start();
    
	}
$ticket_id=0;	//ticket number for a reservation.
$result=null;    //to hold the query set.
$reservations=null; //to hold the number of reservations (integer) for a particular customer.

include("classes/users.class.php");

     $users = new users();
	 $results= $users->get_reservation($_SESSION['cid']);
	 
if($results!=false)    
{
   $reservations = $results;
}
?>
 
 
<?
//delete reservation after the user click "cancel" button.
if(isset($_GET['id']))
   {
       $ticket_id = $_GET['id'];
	  $users->delete_tickets($ticket_id); //this function remove reserv. from tickets table.
      
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
	<script type="text/javascript" src="js/confirmation.js"></script>

</head>


<body id="page4">


<div class="main">
<!--header -->
	<?include('section/header2.php')?>
<!-- / header -->


<!--content -->
	<section id="content">
		   <div class="wrapper pad1">
		   
		 <!--  DO YOU WORK HERE !!!! -->  
		   
Hello <? echo $_SESSION['first_name'].",<br/>";

echo "you currently have ". count($reservations)." reservation(s) on your account.";

 echo "<br/><br/>";     
	  
  echo   " <table width=77% border=1 cellpadding=5>
  <tr>
    <td><strong>Destination</strong></td>
    <td><strong>Ticket#</strong></td>
    <td><strong>Flight#</strong></td>
    <td><strong>Seat#</strong></td>
    <td><strong>Price</strong></td>
	<td><strong>Action</strong></td>
  </tr>";
  foreach($results as $result)
	  {	
	  $ticket_id =$result['ticket_id'];
echo "<tr>
    <td>&nbsp;</td>
    <td>$result[ticket_id]</td>
    <td>$result[flight_id]</td>
    <td>$result[seat_id]</td>
    <td>$$result[price]</td>";
	echo "<td><a href='delete.php?id=" . $result['ticket_id'] . "'><button class=button1 onclick='return doConfirmDelete(this.id);'>Delete</button></a></td>";
   echo "
  </tr>";
	  	 } 

			 echo "</table>";
           
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