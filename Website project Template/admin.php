<!-- Admins page -->
<?php
session_start();// This session will be used in most of the referenced php files here

// This user will also be used in most of the referenced php files here
include("../classes/users.class.php");
$users = new users();

// Get objects from database to be used in the referenced php files here
$customers = $users->get_customers("email");
$airports = $users->get_airports();
$airplanes = $users->get_planes();
$flights = $users->get_flights();
$tickets = $users->get_tickets();
$vip = $users->get_vip();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include 'section/Head.php'; ?>
	
	<!-- This is necessarry for the Chosen plugin -->
	<link rel="stylesheet" href="../css/chosen.css" />

	<!--------------------------------------- Include JQuery ------------------------------->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../js/admin/actionRadio.js"></script>
	<script type="text/javascript" src="../js/admin/AdminStyleRadio.js"></script>
	<script type="text/javascript" src="../js/admin/initiateForm.js"></script>
	<script type="text/javascript" src="../js/admin/tableRadio.js"></script>
	
	<!-- The Chosen JQuery plugin -->
	<script type="text/javascript" src="../js/chosen/chosen.jquery.js"></script>
	<script type="text/javascript">
	$(document).ready(function()
	{
		$(".chosen").chosen();
		$(".chosen-deselect").chosen({allow_single_deselect:true}); <!-- Use for unrequired items -->
	});
	</script>
	<!-------------------------------------- END JQUERY ----------------------------->
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
<!-- DO YOUR WORK HERE!!!!!!!!! -->
	<!-- Choose configuration style -->
	<label for="AdminStyle">Which options would you like?</label> </br>
	<input type="radio" id="admin" name="AdminStyle" class="AdminStyle" value="Admin" /> Admin
	<input type="radio" id="developer" name="AdminStyle" class="AdminStyle" value="Developer" /> Developer <br />

	<!---------------------------------- Admin Style Options ---------------------------------------->
	<fieldset>
	<div id="Admin" class="formset">
		<!-- First, give the admin the tables he can modify -->
		<label for="table">Which table would you like to modify?</label> </br>
		<input type="radio" id="customers" name="table" class="table" value="Customer" /> Customers
		<input type="radio" id="airports" name="table" class="table" value="Airport" /> Airports
		<input type="radio" id="airplanes" name="table" class="table" value="Airplane" /> Airplanes
		<input type="radio" id="flights" name="table" class="table" value="Flight" /> Flights
		<input type="radio" id="tickets" name="table" class="table" value="Ticket" /> Tickets
		<input type="radio" id="vip" name="table" class="table" value="VIP" /> VIP <br />
		
		<!-- Second, see how the amin wants to modify table -->
		<label for="action">How would you like to modify the table?</label> </br>
		<input type="radio" id="add" name="action" class="action" value="Add" /> Add
		<input type="radio" id="modify" name="action" class="action" value="Modify" /> Modify
		<input type="radio" id="delete" name="action" class="action" value="Delete" /> Delete <br />
		
		<!----------------------------------------- Produce forms based on radios ------------------------------->
		<!-- Customer accounts -->
		<fieldset>
		<ol id="Customer" class="formset">
			<ol id="AddCustomer" class="formset">
			Add a Customer Account:
				<?php include '../admin/AddCustomer.php'; ?>
			</ol>
			
			<ol id="ModifyCustomer" class="formset">
			Modify a Customer Account:
				<?php include '../admin/ModifyCustomer.php'; ?>
			</ol>
			
			<ol id="DeleteCustomer" class="formset">
			Delete a Customer Account:
				<?php include '../admin/DeleteCustomer.php'; ?>
			</ol>
		</ol>
		</fieldset>
		
		<!-- Airport accounts -->
		<fieldset>
		<ol id="Airport" class="formset">
			<ol id="AddAirport" class="formset">
			Add an Airport:
				<?php include '../admin/AddAirport.php'; ?>
			</ol>
			
			<ol id="ModifyAirport" class="formset">
			Modify an Airport:
				<?php include '../admin/ModifyAirport.php'; ?>
			</ol>
			
			<ol id="DeleteAirport" class="formset">
			Delete an Airport:
				<?php include '../admin/DeleteAirport.php'; ?>
			</ol>
		</ol>
		</fieldset>
		
		<!-- Airplane accounts -->
		<fieldset>
		<ol id="Airplane" class="formset">
			<ol id="AddAirplane" class="formset">
			Add an Airplane:
				<?php include '../admin/AddAirplane.php'; ?>
			</ol>
			
			<ol id="ModifyAirplane" class="formset">
			Modify an Airplane:
				<?php include '../admin/ModifyAirplane.php'; ?>
			</ol>
			
			<ol id="DeleteAirplane" class="formset">
			Delete an Airplane:
				<?php include '../admin/DeleteAirplane.php'; ?>
			</ol>
		</ol>
		</fieldset>
		
		<!-- Flight accounts -->
		<fieldset>
		<ol id="Flight" class="formset">
			<ol id="AddFlight" class="formset">
			Add a Flight:
				<?php include '../admin/AddFlight.php'; ?>
			</ol>
			
			<ol id="ModifyFlight" class="formset">
			Modify a Flight:
				<?php include '../admin/ModifyFlight.php'; ?>
			</ol>
			
			<ol id="DeleteFlight" class="formset">
			Delete a Flight:
				<?php include '../admin/DeleteFlight.php'; ?>
			</ol>
		</ol>
		</fieldset>

		
		<!-- Ticket accounts -->
		<fieldset>
		<ol id="Ticket" class="formset">
			<ol id="AddTicket" class="formset">
			Add a Ticket:
				<?php include '../admin/AddTicket.php'; ?>
			</ol>
			
			<ol id="ModifyTicket" class="formset">
			Modify a Ticket:
				<?php include '../admin/ModifyTicket.php'; ?>
			</ol>
			
			<ol id="DeleteTicket" class="formset">
			Delete a Ticket:
				<?php include '../admin/DeleteTicket.php'; ?>
			</ol>
		</ol>
		</fieldset>
		
		<!-- VIP accounts -->
		<fieldset>
		<ol id="VIP" class="formset">
			<ol id="AddVIP" class="formset">
			Add a VIP Acount:
				<?php include '../admin/AddVIP.php'; ?>
			</ol>
			
			<ol id="ModifyVIP" class="formset">
			Modify a VIP Acount:
				<?php include '../admin/ModifyVIP.php'; ?>
			</ol>
			
			<ol id="DeleteVIP" class="formset">
			Delete a VIP Acount:
				<?php include '../admin/DeleteVIP.php'; ?>
			</ol>
		</ol>
		</fieldset>
	</ol>
	</fieldset>
	
	
	
	<!----------------------------------- Developer Style Options ------------------------------------>
	<fieldset>
	<div id="Developer" class="formset">
		Developer stuff
		<!-- This body will include a more direct way to edit the database (such as a textbox to directly send SQL to the database) --> 
	</div>
	</fieldset>
	
	<!--------------------------------------------------END OF FORM ---------------------------------------->


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
