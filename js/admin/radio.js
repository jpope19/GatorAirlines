// The culmination of actionRadio.js, AdminStyleRadio.js, initiateForm.js, and tableRadio.js
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
	
	// Click Events for AdminStyle
	$(".AdminStyle").click(function()
	{
		if ($('input[name=AdminStyle]:checked').val() == "Admin" ) 
		{
			$("#Admin").slideDown("fast"); //Slide Down Effect
			$("#Developer").slideUp("fast"); //Slide Up Effect
		}// end if
		else
		{
			$("#Admin").slideUp("fast"); //Slide Up Effect
			$("#Developer").slideDown("fast"); //Slide Down Effect
		}// end else
	});
	
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