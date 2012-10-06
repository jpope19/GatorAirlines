<!-- Admins page -->
<?




?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include 'section/Head.php'; ?>
	
	<!--------------------------------------- JQuery for form ------------------------------------->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<script> 
	$(document).ready(function()
	{
		// Initiate states for the forms
		$("#Customer").css("display","none");
			$("#AddCustomer").css("display","none");
			$("#ModifyCustomer").css("display","none");
			$("#DeleteCustomer").css("display","none");
		$("#Airport").css("display","none");
			$("#AddAirport").css("display","none");
			$("#ModifyAirport").css("display","none");
			$("#DeleteAirport").css("display","none");
		$("#Airplane").css("display","none");
			$("#AddAirplane").css("display","none");
			$("#ModifyAirplane").css("display","none");
			$("#DeleteAirplane").css("display","none");
		$("#Flight").css("display","none");
			$("#AddFlight").css("display","none");
			$("#ModifyFlight").css("display","none");
			$("#DeleteFlight").css("display","none");
		$("#Ticket").css("display","none");
			$("#AddTicket").css("display","none");
			$("#ModifyTicket").css("display","none");
			$("#DeleteTicket").css("display","none");
		$("#VIP").css("display","none");
			$("#AddVIP").css("display","none");
			$("#ModifyVIP").css("display","none");
			$("#DeleteVIP").css("display","none");
		
		
		// Click events for table
		$(".table").click(function()
		{// When table radios are clicked
			// First, slide everything up
			$("#Customer").slideUp("fast"); //Slide Up Effect
			$("#Airport").slideUp("fast");  //Slide Up Effect
			$("#Airplane").slideUp("fast");  //Slide Up Effect
			$("#Flight").slideUp("fast");  //Slide Up Effect
			$("#Ticket").slideUp("fast");  //Slide Up Effect
			$("#VIP").slideUp("fast");  //Slide Up Effect
		
			if ($('input[name=table]:checked').val() == "Customer" ) 
			{
				$("#Customer").slideDown("fast"); //Slide Down Effect
				
				// Slide everyone else down
				$("#Airport").slideUp("fast");  //Slide Up Effect
				$("#Airplane").slideUp("fast");  //Slide Up Effect
				$("#Flight").slideUp("fast");  //Slide Up Effect
				$("#Ticket").slideUp("fast");  //Slide Up Effect
				$("#VIP").slideUp("fast");  //Slide Up Effect
				
				// Check actions
				if ($('input[name=action]:checked').val() == "Add" ) 
				{
					$("#AddCustomer").slideDown("fast"); 
					$("#ModifyCustomer").slideUp("fast"); 
					$("#DeleteCustomer").slideUp("fast"); 
				}// end if
				else if ($('input[name=action]:checked').val() == "Modify" ) 
				{
					$("#AddCustomer").slideUp("fast"); 
					$("#ModifyCustomer").slideDown("fast"); 
					$("#DeleteCustomer").slideUp("fast"); 
				}// end else if
				else if ($('input[name=action]:checked').val() == "Delete" ) 
				{
					$("#AddCustomer").slideUp("fast"); 
					$("#ModifyCustomer").slideUp("fast"); 
					$("#DeleteCustomer").slideDown("fast"); 
				}// end else if
			}// end if
			else if ($('input[name=table]:checked').val() == "Airport" ) 
			{
				$("#Airport").slideDown("fast");  //Slide Down Effect
				
				// Slide everyone else down
				$("#Customer").slideUp("fast");  //Slide Up Effect
				$("#Airplane").slideUp("fast");  //Slide Up Effect
				$("#Flight").slideUp("fast");  //Slide Up Effect
				$("#Ticket").slideUp("fast");  //Slide Up Effect
				$("#VIP").slideUp("fast");  //Slide Up Effect
				
				// Check actions
				if ($('input[name=action]:checked').val() == "Add" ) 
				{
					$("#AddAirport").slideDown("fast"); 
					$("#ModifyAirport").slideUp("fast"); 
					$("#DeleteAirport").slideUp("fast"); 
				}// end if
				else if ($('input[name=action]:checked').val() == "Modify" ) 
				{
					$("#AddAirport").slideUp("fast"); 
					$("#ModifyAirport").slideDown("fast"); 
					$("#DeleteAirport").slideUp("fast"); 
				}// end else if
				else if ($('input[name=action]:checked').val() == "Delete" ) 
				{
					$("#AddAirport").slideUp("fast"); 
					$("#ModifyAirport").slideUp("fast"); 
					$("#DeleteAirport").slideDown("fast"); 
				}// end else if
			}// end else if
			else if ($('input[name=table]:checked').val() == "Airplane" ) 
			{
				$("#Airplane").slideDown("fast");  //Slide Down Effect
				
				// Slide everyone else down
				$("#Customer").slideUp("fast");  //Slide Up Effect
				$("#Airport").slideUp("fast");  //Slide Up Effect
				$("#Flight").slideUp("fast");  //Slide Up Effect
				$("#Ticket").slideUp("fast");  //Slide Up Effect
				$("#VIP").slideUp("fast");  //Slide Up Effect
				
				// Check actions
				if ($('input[name=action]:checked').val() == "Add" ) 
				{
					$("#AddAirplane").slideDown("fast"); 
					$("#ModifyAirplane").slideUp("fast"); 
					$("#DeleteAirplane").slideUp("fast"); 
				}// end if
				else if ($('input[name=action]:checked').val() == "Modify" ) 
				{
					$("#AddAirplane").slideUp("fast"); 
					$("#ModifyAirplane").slideDown("fast"); 
					$("#DeleteAirplane").slideUp("fast"); 
				}// end else if
				else if ($('input[name=action]:checked').val() == "Delete" ) 
				{
					$("#AddAirplane").slideUp("fast"); 
					$("#ModifyAirplane").slideUp("fast"); 
					$("#DeleteAirplane").slideDown("fast"); 
				}// end else if
			}// end else if
			else if ($('input[name=table]:checked').val() == "Flight" ) 
			{
				$("#Flight").slideDown("fast");  //Slide Down Effect
				
				// Slide everyone else down
				$("#Customer").slideUp("fast");  //Slide Up Effect
				$("#Airport").slideUp("fast");  //Slide Up Effect
				$("#Airplane").slideUp("fast");  //Slide Up Effect
				$("#Ticket").slideUp("fast");  //Slide Up Effect
				$("#VIP").slideUp("fast");  //Slide Up Effect
				
				// Check actions
				if ($('input[name=action]:checked').val() == "Add" ) 
				{
					$("#AddFlight").slideDown("fast"); 
					$("#ModifyFlight").slideUp("fast"); 
					$("#DeleteFlight").slideUp("fast"); 
				}// end if
				else if ($('input[name=action]:checked').val() == "Modify" ) 
				{
					$("#AddFlight").slideUp("fast"); 
					$("#ModifyFlight").slideDown("fast"); 
					$("#DeleteFlight").slideUp("fast"); 
				}// end else if
				else if ($('input[name=action]:checked').val() == "Delete" ) 
				{
					$("#AddFlight").slideUp("fast"); 
					$("#ModifyFlight").slideUp("fast"); 
					$("#DeleteFlight").slideDown("fast"); 
				}// end else if
			}// end else if
			else if ($('input[name=table]:checked').val() == "Ticket" ) 
			{
				$("#Ticket").slideDown("fast");  //Slide Down Effect
				
				// Slide everyone else down
				$("#Customer").slideUp("fast");  //Slide Up Effect
				$("#Airport").slideUp("fast");  //Slide Up Effect
				$("#Airplane").slideUp("fast");  //Slide Up Effect
				$("#Flight").slideUp("fast");  //Slide Up Effect
				$("#VIP").slideUp("fast");  //Slide Up Effect
				
				// Check actions
				if ($('input[name=action]:checked').val() == "Add" ) 
				{
					$("#AddTicket").slideDown("fast"); 
					$("#ModifyTicket").slideUp("fast"); 
					$("#DeleteTicket").slideUp("fast"); 
				}// end if
				else if ($('input[name=action]:checked').val() == "Modify" ) 
				{
					$("#AddTicket").slideUp("fast"); 
					$("#ModifyTicket").slideDown("fast"); 
					$("#DeleteTicket").slideUp("fast"); 
				}// end else if
				else if ($('input[name=action]:checked').val() == "Delete" ) 
				{
					$("#AddTicket").slideUp("fast"); 
					$("#ModifyTicket").slideUp("fast"); 
					$("#DeleteTicket").slideDown("fast"); 
				}// end else if
			}// end else if
			else if ($('input[name=table]:checked').val() == "VIP" ) 
			{
				$("#VIP").slideDown("fast");  //Slide Down Effect
				
				// Slide everyone else down
				$("#Customer").slideUp("fast");  //Slide Up Effect
				$("#Airport").slideUp("fast");  //Slide Up Effect
				$("#Airplane").slideUp("fast");  //Slide Up Effect
				$("#Flight").slideUp("fast");  //Slide Up Effect
				$("#Ticket").slideUp("fast");  //Slide Up Effect
				
				// Check actions
				if ($('input[name=action]:checked').val() == "Add" ) 
				{
					$("#AddVIP").slideDown("fast"); 
					$("#ModifyVIP").slideUp("fast"); 
					$("#DeleteVIP").slideUp("fast"); 
				}// end if
				else if ($('input[name=action]:checked').val() == "Modify" ) 
				{
					$("#AddVIP").slideUp("fast"); 
					$("#ModifyVIP").slideDown("fast"); 
					$("#DeleteVIP").slideUp("fast"); 
				}// end else if
				else if ($('input[name=action]:checked').val() == "Delete" ) 
				{
					$("#AddVIP").slideUp("fast"); 
					$("#ModifyVIP").slideUp("fast"); 
					$("#DeleteVIP").slideDown("fast"); 
				}// end else if
			}// end else if
		 });
		 
		 
		 // Click events for actions
		$(".action").click(function()
		{// When table radios are clicked
			if ($('input[name=action]:checked').val() == "Add" ) 
			{
				$("#AddCustomer").slideDown("fast"); //Slide Down Effect
				$("#AddAirport").slideDown("fast");  //Slide Down Effect
				$("#AddAirplane").slideDown("fast");  //Slide Down Effect
				$("#AddFlight").slideDown("fast");  //Slide Down Effect
				$("#AddTicket").slideDown("fast");  //Slide Down Effect
				$("#AddVIP").slideDown("fast");  //Slide Down Effect
				
				$("#ModifyCustomer").slideUp("fast"); //Slide Down Effect
				$("#ModifyAirport").slideUp("fast");  //Slide Up Effect
				$("#ModifyAirplane").slideUp("fast");  //Slide Up Effect
				$("#ModifyFlight").slideUp("fast");  //Slide Up Effect
				$("#ModifyTicket").slideUp("fast");  //Slide Up Effect
				$("#ModifyVIP").slideUp("fast");  //Slide Up Effect
				
				$("#DeleteCustomer").slideUp("fast"); //Slide Down Effect
				$("#DeleteAirport").slideUp("fast");  //Slide Up Effect
				$("#DeleteAirplane").slideUp("fast");  //Slide Up Effect
				$("#DeleteFlight").slideUp("fast");  //Slide Up Effect
				$("#DeleteTicket").slideUp("fast");  //Slide Up Effect
				$("#DeleteVIP").slideUp("fast");  //Slide Up Effect
			}// end if
			else if ($('input[name=action]:checked').val() == "Modify" ) 
			{
				$("#ModifyCustomer").slideDown("fast"); //Slide Down Effect
				$("#ModifyAirport").slideDown("fast");  //Slide Down Effect
				$("#ModifyAirplane").slideDown("fast");  //Slide Down Effect
				$("#ModifyFlight").slideDown("fast");  //Slide Down Effect
				$("#ModifyTicket").slideDown("fast");  //Slide Down Effect
				$("#ModifyVIP").slideDown("fast");  //Slide Down Effect
				
				$("#AddCustomer").slideUp("fast"); //Slide Down Effect
				$("#AddAirport").slideUp("fast");  //Slide Up Effect
				$("#AddAirplane").slideUp("fast");  //Slide Up Effect
				$("#AddFlight").slideUp("fast");  //Slide Up Effect
				$("#AddTicket").slideUp("fast");  //Slide Up Effect
				$("#AddVIP").slideUp("fast");  //Slide Up Effect
				
				$("#DeleteCustomer").slideUp("fast"); //Slide Down Effect
				$("#DeleteAirport").slideUp("fast");  //Slide Up Effect
				$("#DeleteAirplane").slideUp("fast");  //Slide Up Effect
				$("#DeleteFlight").slideUp("fast");  //Slide Up Effect
				$("#DeleteTicket").slideUp("fast");  //Slide Up Effect
				$("#DeleteVIP").slideUp("fast");  //Slide Up Effect
			}// end else if
			else if ($('input[name=action]:checked').val() == "Delete" ) 
			{
				$("#DeleteCustomer").slideDown("fast"); //Slide Down Effect
				$("#DeleteAirport").slideDown("fast");  //Slide Down Effect
				$("#DeleteAirplane").slideDown("fast");  //Slide Down Effect
				$("#DeleteFlight").slideDown("fast");  //Slide Down Effect
				$("#DeleteTicket").slideDown("fast");  //Slide Down Effect
				$("#DeleteVIP").slideDown("fast");  //Slide Down Effect
				
				$("#AddCustomer").slideUp("fast"); //Slide Down Effect
				$("#AddAirport").slideUp("fast");  //Slide Up Effect
				$("#AddAirplane").slideUp("fast");  //Slide Up Effect
				$("#AddFlight").slideUp("fast");  //Slide Up Effect
				$("#AddTicket").slideUp("fast");  //Slide Up Effect
				$("#AddVIP").slideUp("fast");  //Slide Up Effect
				
				$("#ModifyCustomer").slideUp("fast"); //Slide Down Effect
				$("#ModifyAirport").slideUp("fast");  //Slide Up Effect
				$("#ModifyAirplane").slideUp("fast");  //Slide Up Effect
				$("#ModifyFlight").slideUp("fast");  //Slide Up Effect
				$("#ModifyTicket").slideUp("fast");  //Slide Up Effect
				$("#ModifyVIP").slideUp("fast");  //Slide Up Effect
			}// end else if
		 });
		 
	});      
	</script>
	
	<!--------------------------------------- END of JQuery for form ------------------------------------->

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
	<!--
	<ul>
		<?php include '../admin/add_flight.php'; ?>
	<ul>
	-->
	<!-- First, give the admin the tables he can modify -->
	<label for="table">Which table would you like to modify?</label> </br>
	<input type="radio" id="customers" name="table" class="table" value="Customer" /> Customers
	<input type="radio" id="airports" name="table" class="table" value="Airport" /> Airports
	<input type="radio" id="airplanes" name="table" class="table" value="Airplane" /> Airplanes
	<input type="radio" id="flights" name="table" class="table" value="Flight" /> Flights
	<input type="radio" id="tickets" name="table" class="table" value="Ticket" /> Tickets
	<input type="radio" id="vip" name="table" class="table" value="VIP" /> VIP <br /> <br /> <br />
	
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
		<li>Add a Customer Account:</li>
				<li><label for="pname1">Parent Name: </label>
			<input type="text" id="pname1" value="" name="pname1"/></li>
				<li><label for="contact1">Contact No.: </label>
			<input type="text" id="contact1" value="" name="contact1"/></li>
		</ol>
		
		<ol id="ModifyCustomer" class="formset">
		<li>Modify a Customer Account:</li>
				<li><label for="pname1">Parent Name: </label>
			<input type="text" id="pname1" value="" name="pname1"/></li>
				<li><label for="contact1">Contact No.: </label>
			<input type="text" id="contact1" value="" name="contact1"/></li>
		</ol>
		
		<ol id="DeleteCustomer" class="formset">
		<li>Delete a Customer Account:</li>
				<li><label for="pname1">Parent Name: </label>
			<input type="text" id="pname1" value="" name="pname1"/></li>
				<li><label for="contact1">Contact No.: </label>
			<input type="text" id="contact1" value="" name="contact1"/></li>
		</ol>
	</ol>
	</fieldset>
	
	<!-- Airport accounts -->
	<fieldset>
	<ol id="Airport" class="formset">
		<ol id="AddAirport" class="formset">
		<li>Add an Airport:</li>
				<li><label for="pname1">Parent Name: </label>
			<input type="text" id="pname1" value="" name="pname1"/></li>
				<li><label for="contact1">Contact No.: </label>
			<input type="text" id="contact1" value="" name="contact1"/></li>
		</ol>
		
		<ol id="ModifyAirport" class="formset">
		<li>Modify an Airport:</li>
				<li><label for="pname1">Parent Name: </label>
			<input type="text" id="pname1" value="" name="pname1"/></li>
				<li><label for="contact1">Contact No.: </label>
			<input type="text" id="contact1" value="" name="contact1"/></li>
		</ol>
		
		<ol id="DeleteAirport" class="formset">
		<li>Delete an Airport:</li>
				<li><label for="pname1">Parent Name: </label>
			<input type="text" id="pname1" value="" name="pname1"/></li>
				<li><label for="contact1">Contact No.: </label>
			<input type="text" id="contact1" value="" name="contact1"/></li>
		</ol>
	</ol>
	</fieldset>
	
	<!-- Airplane accounts -->
	<fieldset>
	<ol id="Airplane" class="formset">
		<ol id="AddAirplane" class="formset">
		<li>Add an Airplane:</li>
				<li><label for="pname1">Parent Name: </label>
			<input type="text" id="pname1" value="" name="pname1"/></li>
				<li><label for="contact1">Contact No.: </label>
			<input type="text" id="contact1" value="" name="contact1"/></li>
		</ol>
		
		<ol id="ModifyAirplane" class="formset">
		<li>Modify an Airplane:</li>
				<li><label for="pname1">Parent Name: </label>
			<input type="text" id="pname1" value="" name="pname1"/></li>
				<li><label for="contact1">Contact No.: </label>
			<input type="text" id="contact1" value="" name="contact1"/></li>
		</ol>
		
		<ol id="DeleteAirplane" class="formset">
		<li>Delete an Airplane:</li>
				<li><label for="pname1">Parent Name: </label>
			<input type="text" id="pname1" value="" name="pname1"/></li>
				<li><label for="contact1">Contact No.: </label>
			<input type="text" id="contact1" value="" name="contact1"/></li>
		</ol>
	</ol>
	</fieldset>
	
	<!-- Flight accounts -->
	<fieldset>
	<ol id="Flight" class="formset">
		<ol id="AddFlight" class="formset">
		<li>Add a Flight:</li>
				<li><label for="pname1">Parent Name: </label>
			<input type="text" id="pname1" value="" name="pname1"/></li>
				<li><label for="contact1">Contact No.: </label>
			<input type="text" id="contact1" value="" name="contact1"/></li>
		</ol>
		
		<ol id="ModifyFlight" class="formset">
		<li>Modify a Flight:</li>
				<li><label for="pname1">Parent Name: </label>
			<input type="text" id="pname1" value="" name="pname1"/></li>
				<li><label for="contact1">Contact No.: </label>
			<input type="text" id="contact1" value="" name="contact1"/></li>
		</ol>
		
		<ol id="DeleteFlight" class="formset">
		<li>Delete a Flight:</li>
				<li><label for="pname1">Parent Name: </label>
			<input type="text" id="pname1" value="" name="pname1"/></li>
				<li><label for="contact1">Contact No.: </label>
			<input type="text" id="contact1" value="" name="contact1"/></li>
		</ol>
	</ol>
	</fieldset>

	
	<!-- Ticket accounts -->
	<fieldset>
	<ol id="Ticket" class="formset">
		<ol id="AddTicket" class="formset">
		<li>Add a Ticket:</li>
				<li><label for="pname1">Parent Name: </label>
			<input type="text" id="pname1" value="" name="pname1"/></li>
				<li><label for="contact1">Contact No.: </label>
			<input type="text" id="contact1" value="" name="contact1"/></li>
		</ol>
		
		<ol id="ModifyTicket" class="formset">
		<li>Modify a Ticket:</li>
				<li><label for="pname1">Parent Name: </label>
			<input type="text" id="pname1" value="" name="pname1"/></li>
				<li><label for="contact1">Contact No.: </label>
			<input type="text" id="contact1" value="" name="contact1"/></li>
		</ol>
		
		<ol id="DeleteTicket" class="formset">
		<li>Delete a Ticket:</li>
				<li><label for="pname1">Parent Name: </label>
			<input type="text" id="pname1" value="" name="pname1"/></li>
				<li><label for="contact1">Contact No.: </label>
			<input type="text" id="contact1" value="" name="contact1"/></li>
		</ol>
	</ol>
	</fieldset>
	
	<!-- VIP accounts -->
	<fieldset>
	<ol id="VIP" class="formset">
		<ol id="AddVIP" class="formset">
		<li>Add a VIP Acount:</li>
				<li><label for="pname1">Parent Name: </label>
			<input type="text" id="pname1" value="" name="pname1"/></li>
				<li><label for="contact1">Contact No.: </label>
			<input type="text" id="contact1" value="" name="contact1"/></li>
		</ol>
		
		<ol id="ModifyVIP" class="formset">
		<li>Modify a VIP Acount:</li>
				<li><label for="pname1">Parent Name: </label>
			<input type="text" id="pname1" value="" name="pname1"/></li>
				<li><label for="contact1">Contact No.: </label>
			<input type="text" id="contact1" value="" name="contact1"/></li>
		</ol>
		
		<ol id="DeleteVIP" class="formset">
		<li>Delete a VIP Acount:</li>
				<li><label for="pname1">Parent Name: </label>
			<input type="text" id="pname1" value="" name="pname1"/></li>
				<li><label for="contact1">Contact No.: </label>
			<input type="text" id="contact1" value="" name="contact1"/></li>
		</ol>
	</ol>
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
