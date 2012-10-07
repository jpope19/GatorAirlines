<!-- Admins page -->
<?php


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
		$(".chosen").chosen(); <!-- For multiple items -->
		$(".chosen-deselect").chosen({allow_single_deselect:true}); <!-- For single items -->
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
	<input type="radio" id="customers" name="AdminStyle" class="AdminStyle" value="Admin" /> Admin
	<input type="radio" id="airports" name="AdminStyle" class="AdminStyle" value="Developer" /> Developer <br />

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
			<li>Add a Customer Account:</li>
				<?php include '../admin/AddCustomer.php'; ?>
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
