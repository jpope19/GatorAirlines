// Used in admin page to make all forms initially "invisible"
$(document).ready(function()
{
	// Initiate states for the forms
	$("#Admin").css("display","none");
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
	$("#Developer").css("display","none");
	
	
/*
	// Check for session and display accordingly
	if(<?php echo $_SESSION['AdminStyle'] ?> == "Admin")
	{
		$("#Admin").slideDown("fast"); //Slide Down Effect
		$("#Developer").slideUp("fast"); //Slide Up Effect
		
		// First, slide everything up
		$("#Customer").slideUp("fast"); //Slide Up Effect
		$("#Airport").slideUp("fast");  //Slide Up Effect
		$("#Airplane").slideUp("fast");  //Slide Up Effect
		$("#Flight").slideUp("fast");  //Slide Up Effect
		$("#Ticket").slideUp("fast");  //Slide Up Effect
		$("#VIP").slideUp("fast");  //Slide Up Effect
		if(<?php echo $_SESSION['table'] ?> == "Customer")
		{
			$("#Customer").slideDown("fast"); //Slide Down Effect
			
			// Slide everyone else down
			$("#Airport").slideUp("fast");  //Slide Up Effect
			$("#Airplane").slideUp("fast");  //Slide Up Effect
			$("#Flight").slideUp("fast");  //Slide Up Effect
			$("#Ticket").slideUp("fast");  //Slide Up Effect
			$("#VIP").slideUp("fast");  //Slide Up Effect
			
			if (<?php echo $_SESSION['action'] ?> == "Add")
			{
				$("#AddCustomer").slideDown("fast"); 
				$("#ModifyCustomer").slideUp("fast"); 
				$("#DeleteCustomer").slideUp("fast"); 
			}
			else if (<?php echo $_SESSION['action'] ?> == "Modify")
			{
				$("#AddCustomer").slideUp("fast"); 
				$("#ModifyCustomer").slideDown("fast"); 
				$("#DeleteCustomer").slideUp("fast"); 
			}
			else if (<?php echo $_SESSION['action'] ?> == "Delete")
			{
				$("#AddCustomer").slideUp("fast"); 
				$("#ModifyCustomer").slideUp("fast"); 
				$("#DeleteCustomer").slideDown("fast"); 
			}
		}
		else if(<?php echo $_SESSION['table'] ?> == "Airport")
		{
			$("#Airport").slideDown("fast");  //Slide Down Effect
			
			// Slide everyone else down
			$("#Customer").slideUp("fast");  //Slide Up Effect
			$("#Airplane").slideUp("fast");  //Slide Up Effect
			$("#Flight").slideUp("fast");  //Slide Up Effect
			$("#Ticket").slideUp("fast");  //Slide Up Effect
			$("#VIP").slideUp("fast");  //Slide Up Effect

			if (<?php echo $_SESSION['action'] ?> == "Add")
			{
				$("#AddAirport").slideDown("fast"); 
				$("#ModifyAirport").slideUp("fast"); 
				$("#DeleteAirport").slideUp("fast");
			}
			else if (<?php echo $_SESSION['action'] ?> == "Modify")
			{
				$("#AddAirport").slideUp("fast"); 
				$("#ModifyAirport").slideDown("fast"); 
				$("#DeleteAirport").slideUp("fast"); 
			}
			else if (<?php echo $_SESSION['action'] ?> == "Delete")
			{
				$("#AddAirport").slideUp("fast"); 
				$("#ModifyAirport").slideUp("fast"); 
				$("#DeleteAirport").slideDown("fast");
			}
		}
		else if(<?php echo $_SESSION['table'] ?> == "Airplane")
		{
			$("#Airplane").slideDown("fast");  //Slide Down Effect
			
			// Slide everyone else down
			$("#Customer").slideUp("fast");  //Slide Up Effect
			$("#Airport").slideUp("fast");  //Slide Up Effect
			$("#Flight").slideUp("fast");  //Slide Up Effect
			$("#Ticket").slideUp("fast");  //Slide Up Effect
			$("#VIP").slideUp("fast");  //Slide Up Effect
			
			if (<?php echo $_SESSION['action'] ?> == "Add")
			{
				$("#AddAirplane").slideDown("fast"); 
				$("#ModifyAirplane").slideUp("fast"); 
				$("#DeleteAirplane").slideUp("fast"); 
			}
			else if (<?php echo $_SESSION['action'] ?> == "Modify")
			{
				$("#AddAirplane").slideUp("fast"); 
				$("#ModifyAirplane").slideDown("fast"); 
				$("#DeleteAirplane").slideUp("fast"); 
			}
			else if (<?php echo $_SESSION['action'] ?> == "Delete")
			{
				$("#AddAirplane").slideUp("fast"); 
				$("#ModifyAirplane").slideUp("fast"); 
				$("#DeleteAirplane").slideDown("fast"); 
			}
		}
		else if(<?php echo $_SESSION['table'] ?> == "Flight")
		{
			$("#Flight").slideDown("fast");  //Slide Down Effect
			
			// Slide everyone else down
			$("#Customer").slideUp("fast");  //Slide Up Effect
			$("#Airport").slideUp("fast");  //Slide Up Effect
			$("#Airplane").slideUp("fast");  //Slide Up Effect
			$("#Ticket").slideUp("fast");  //Slide Up Effect
			$("#VIP").slideUp("fast");  //Slide Up Effect
			
			if (<?php echo $_SESSION['action'] ?> == "Add")
			{
				$("#AddFlight").slideDown("fast"); 
				$("#ModifyFlight").slideUp("fast"); 
				$("#DeleteFlight").slideUp("fast");
			}
			else if (<?php echo $_SESSION['action'] ?> == "Modify")
			{
				$("#AddFlight").slideUp("fast"); 
				$("#ModifyFlight").slideDown("fast"); 
				$("#DeleteFlight").slideUp("fast");
			}
			else if (<?php echo $_SESSION['action'] ?> == "Delete")
			{
				$("#AddFlight").slideUp("fast"); 
				$("#ModifyFlight").slideUp("fast"); 
				$("#DeleteFlight").slideDown("fast");
			}
		}
		else if(<?php echo $_SESSION['block'] ?> == "Ticket")
		{
			$("#Ticket").slideDown("fast");  //Slide Down Effect
			
			// Slide everyone else down
			$("#Customer").slideUp("fast");  //Slide Up Effect
			$("#Airport").slideUp("fast");  //Slide Up Effect
			$("#Airplane").slideUp("fast");  //Slide Up Effect
			$("#Flight").slideUp("fast");  //Slide Up Effect
			$("#VIP").slideUp("fast");  //Slide Up Effect
			
			if (<?php echo $_SESSION['action'] ?> == "Add")
			{
				$("#AddTicket").slideDown("fast"); 
				$("#ModifyTicket").slideUp("fast"); 
				$("#DeleteTicket").slideUp("fast"); 
			}
			else if (<?php echo $_SESSION['action'] ?> == "Modify")
			{
				$("#AddTicket").slideUp("fast"); 
				$("#ModifyTicket").slideDown("fast"); 
				$("#DeleteTicket").slideUp("fast");  
			}
			else if (<?php echo $_SESSION['action'] ?> == "Delete")
			{
				$("#AddTicket").slideUp("fast"); 
				$("#ModifyTicket").slideUp("fast"); 
				$("#DeleteTicket").slideDown("fast"); 
			}
		}
		else if(<?php echo $_SESSION['block'] ?> == "VIP")
		{
			$("#VIP").slideDown("fast");  //Slide Down Effect
			
			// Slide everyone else down
			$("#Customer").slideUp("fast");  //Slide Up Effect
			$("#Airport").slideUp("fast");  //Slide Up Effect
			$("#Airplane").slideUp("fast");  //Slide Up Effect
			$("#Flight").slideUp("fast");  //Slide Up Effect
			$("#Ticket").slideUp("fast");  //Slide Up Effect
			
			if (<?php echo $_SESSION['action'] ?> == "Add")
			{
				$("#AddVIP").slideDown("fast"); 
				$("#ModifyVIP").slideUp("fast"); 
				$("#DeleteVIP").slideUp("fast"); 
			}
			else if (<?php echo $_SESSION['action'] ?> == "Modify")
			{
				$("#AddVIP").slideUp("fast"); 
				$("#ModifyVIP").slideDown("fast"); 
				$("#DeleteVIP").slideUp("fast"); 
			}
			else if (<?php echo $_SESSION['action'] ?> == "Delete")
			{
				$("#AddVIP").slideUp("fast"); 
				$("#ModifyVIP").slideUp("fast"); 
				$("#DeleteVIP").slideDown("fast");
			}
		}	
	}
	else if(<?php echo $_SESSION['AdminStyle'] ?> == "Developer")
	{
		$("#Admin").slideUp("fast"); //Slide Up Effect
		$("#Developer").slideDown("fast"); //Slide Down Effect
	}
*/
});