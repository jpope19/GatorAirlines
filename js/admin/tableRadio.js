// Used in admin page to select tables based on radio choice
$(document).ready(function()
{
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
});