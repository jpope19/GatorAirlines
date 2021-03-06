<?php
// start session
if (!isset($_SESSION))
{
session_start();
}

// First, make sure that non-admis cannot use the admin page. Redirect them to home.
if(!isset($_SESSION['u_type']) || $_SESSION['u_type'] != 1)
{// The user is not an admin, do not allow access
header("Location:home.php"); // redirects
}

// Variable for https
$https = true;

// This user will also be used in most of the referenced php files here
include("classes/users.class.php");
$users = new users(); // class from user.class.php that will be used to manipulate the database

// Get objects from database to be used in the referenced php files here
$customers = $users->get_customers("email"); // this variable is getting an array with the customer information in the database. Used in Add,Modify, and DeleteCustomer.php
$airports = $users->get_airports(); // this variable is getting an array with the airport information in the database. Used in Add,Modify, and DeleteAirports.php
$airplanes = $users->get_planes(); // this variable is getting an array with the plane information in the database. Used in Add,Modify, and DeletePlanes.php
$flights = $users->get_flights(); // this variable is getting an array with the flight information in the database. Used in Add,Modify, and DeleteFlights.php
$tickets = $users->get_tickets(); // this variable is getting an array with the ticket information in the database. Used in Add,Modify, and DeleteTickets.php
$vip = $users->get_vip(); // this variable is getting an array with the VIP information in the database. Used in Add,Modify, and DeleteVIP.php

// Set the radios initial states by checking if session exists
if(!isset($_SESSION['AdminStyle']))
{
$_SESSION['AdminStyle'] = "none";
}
if(!isset($_SESSION['action']))
{
$_SESSION['action'] = "none";
}
if(!isset($_SESSION['table']))
{
$_SESSION['table'] = "none";
}

//if (isset())
function setAdminStyle($in)
{	
$_SESSION['AdminStyle'] = $in;
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin</title>
<link rel="stylesheet" href="css/login.css" type="text/css" media="all">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/adminStyle.css" type="text/css" media="all">
<!-- This is necessarry for the Chosen plugin -->
<link rel="stylesheet" href="css/chosen.css" />
<!--------------------------------------- Include JQuery ------------------------------->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/admin/initiateForm.js"></script>
<script type="text/javascript" src="js/admin/sessionActionRadio.js"></script>
<script type="text/javascript" src="js/admin/sessionAdminStyleRadio.js"></script>
<script type="text/javascript" src="js/admin/sessionTableRadio.js"></script>
<script type="text/javascript" src="js/admin/actionRadio.js"></script>
<script type="text/javascript" src="js/admin/AdminStyleRadio.js"></script>
<script type="text/javascript" src="js/admin/tableRadio.js"></script>

<!-- The Chosen JQuery plugin -->
<script type="text/javascript" src="js/chosen/chosen.jquery.js"></script>
<script type="text/javascript">
$(document).ready(function()
{// Used to make the cool looking drop down menu
$(".chosen").chosen();
$(".chosen-deselect").chosen({allow_single_deselect:true}); <!-- Use for unrequired items
});
</script>
<!-- The validation plugin -->
<script type="text/javascript" src="js/validation/dist/jquery.validate.js"></script>
<!-- Jquery for calendar and validaiton of dates -->
<script>
$(function() {
$( ".date" ).datepicker();
});
</script>
<!-------------------------------------- END JQUERY ----------------------------->

</head>
<body id="page4">


<div class="main" >
<!--header -->
<?include('section/header2.php')?>
<!-- / header -->
<!--content -->
<section id="content">
<!-- DO YOUR WORK HERE!!!!!!!!! -->
<!-- Choose configuration style -->
<label for="AdminStyle">Which options would you like?</label> </br>
<input type="radio" id="admin" name="AdminStyle" class="AdminStyle" value="Admin" <?php echo ($_SESSION['AdminStyle'] == "Admin") ? 'checked="checked"' : ''; ?> /> Admin
<input type="radio" id="developer" name="AdminStyle" class="AdminStyle" value="Developer" <?php echo ($_SESSION['AdminStyle'] == "Developer") ? 'checked="checked"' : ''; ?> /> Developer <br />

<!---------------------------------- Admin Style Options ---------------------------------------->
<fieldset>
<div id="Admin" class="formset">
<!-- First, give the admin the tables he can modify -->
<label for="table">Which table would you like to modify?</label> </br>
<input type="radio" id="customers" name="table" class="table" value="Customer" <?php echo ($_SESSION['table'] == "Customer") ? 'checked="checked"' : ''; ?> /> Customers
<input type="radio" id="airports" name="table" class="table" value="Airport" <?php echo ($_SESSION['table'] == "Airport") ? 'checked="checked"' : ''; ?> /> Airports
<input type="radio" id="airplanes" name="table" class="table" value="Airplane" <?php echo ($_SESSION['table'] == "Airplane") ? 'checked="checked"' : ''; ?> /> Airplanes
<input type="radio" id="flights" name="table" class="table" value="Flight" <?php echo ($_SESSION['table'] == "Flight") ? 'checked="checked"' : ''; ?> /> Flights
<input type="radio" id="tickets" name="table" class="table" value="Ticket" <?php echo ($_SESSION['table'] == "Ticket") ? 'checked="checked"' : ''; ?> /> Tickets
<input type="radio" id="vip" name="table" class="table" value="VIP" <?php echo ($_SESSION['table'] == "VIP") ? 'checked="checked"' : ''; ?> /> VIP <br />
<!-- Second, see how the amin wants to modify table -->
<label for="action">How would you like to modify the table?</label> </br>
<input type="radio" id="add" name="action" class="action" value="Add" <?php echo ($_SESSION['action'] == "Add") ? 'checked="checked"' : ''; ?> /> Add
<input type="radio" id="modify" name="action" class="action" value="Modify" <?php echo ($_SESSION['action'] == "Modify") ? 'checked="checked"' : ''; ?> /> Modify
<input type="radio" id="delete" name="action" class="action" value="Delete" <?php echo ($_SESSION['action'] == "Delete") ? 'checked="checked"' : ''; ?> /> Delete <br />
<!----------------------------------------- Produce forms based on radios ------------------------------->
<!-- Customer accounts -->
<fieldset>
<ol id="Customer" class="formset">
<ol id="AddCustomer" class="formset">
Add a Customer Account:
<?php include 'admin/AddCustomer.php'; ?>
</ol>
<ol id="ModifyCustomer" class="formset">
Modify a Customer Account:
<?php include 'admin/ModifyCustomer.php'; ?>
</ol>
<ol id="DeleteCustomer" class="formset">
Delete a Customer Account:
<?php include 'admin/DeleteCustomer.php'; ?>
</ol>
</ol>
</fieldset>
<!-- Airport accounts -->
<fieldset>
<ol id="Airport" class="formset">
<ol id="AddAirport" class="formset">
Add an Airport:
<?php include 'admin/AddAirport.php'; ?>
</ol>
<ol id="ModifyAirport" class="formset">
Modify an Airport:
<?php include 'admin/ModifyAirport.php'; ?>
</ol>
<ol id="DeleteAirport" class="formset">
Delete an Airport:
<?php include 'admin/DeleteAirport.php'; ?>
</ol>
</ol>
</fieldset>
<!-- Airplane accounts -->
<fieldset>
<ol id="Airplane" class="formset">
<ol id="AddAirplane" class="formset">
Add an Airplane:
<?php include 'admin/AddAirplane.php'; ?>
</ol>
<ol id="ModifyAirplane" class="formset">
Modify an Airplane:
<?php include 'admin/ModifyAirplane.php'; ?>
</ol>
<ol id="DeleteAirplane" class="formset">
Delete an Airplane:
<?php include 'admin/DeleteAirplane.php'; ?>
</ol>
</ol>
</fieldset>
<!-- Flight accounts -->
<fieldset>
<ol id="Flight" class="formset">
<ol id="AddFlight" class="formset">
Add a Flight:
<?php include 'admin/AddFlight.php'; ?>
</ol>
<ol id="ModifyFlight" class="formset">
Modify a Flight:
<?php include 'admin/ModifyFlight.php'; ?>
</ol>
<ol id="DeleteFlight" class="formset">
Delete a Flight:
<?php include 'admin/DeleteFlight.php'; ?>
</ol>
</ol>
</fieldset>

<!-- Ticket accounts -->
<fieldset>
<ol id="Ticket" class="formset">
<ol id="AddTicket" class="formset">
Add a Ticket:
<?php include 'admin/AddTicket.php'; ?>
</ol>
<ol id="ModifyTicket" class="formset">
Modify a Ticket:
<?php include 'admin/ModifyTicket.php'; ?>
</ol>
<ol id="DeleteTicket" class="formset">
Delete a Ticket:
<?php include 'admin/DeleteTicket.php'; ?>
</ol>
</ol>
</fieldset>
<!-- VIP accounts -->
<fieldset>
<ol id="VIP" class="formset">
<ol id="AddVIP" class="formset">
Add a VIP Acount:
<?php include 'admin/AddVIP.php'; ?>
</ol>
<ol id="ModifyVIP" class="formset">
Modify a VIP Acount:
<?php include 'admin/ModifyVIP.php'; ?>
</ol>
<ol id="DeleteVIP" class="formset">
Delete a VIP Acount:
<?php include 'admin/DeleteVIP.php'; ?>
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

</section>
<!--content end-->
<!--footer -->
<!--footer end-->
<script type="text/javascript">
$("'[placeholder]'").focus(function() {
  var input = $(this);
  if (input.val() == input.attr("'placeholder'")) {
    input.val("''");
    input.removeClass("'placeholder'");
  }
}).blur(function() {
  var input = $(this);
  if (input.val() == "''" || input.val() == input.attr("'placeholder'")) {
    input.addClass("'placeholder'");
    input.val(input.attr("'placeholder'"));
  }
}).blur();

       </script>
</div>

</body>
</html>