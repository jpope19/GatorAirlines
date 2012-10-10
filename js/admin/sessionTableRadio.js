// Used in admin page to retain menu state
$(document).ready(function()
{
	// Click events for table
	$(".table").ready(function()
	{// When table radios are readyed
		// First, slide everything up
		$("#Customer").hide(); //Slide Up Effect
		$("#Airport").hide();  //Slide Up Effect
		$("#Airplane").hide();  //Slide Up Effect
		$("#Flight").hide();  //Slide Up Effect
		$("#Ticket").hide();  //Slide Up Effect
		$("#VIP").hide();  //Slide Up Effect
	
		if ($('input[name=table]:checked').val() == "Customer" ) 
		{
			$("#Customer").show(); //Slide Down Effect
			
			// Slide everyone else down
			$("#Airport").hide();  //Slide Up Effect
			$("#Airplane").hide();  //Slide Up Effect
			$("#Flight").hide();  //Slide Up Effect
			$("#Ticket").hide();  //Slide Up Effect
			$("#VIP").hide();  //Slide Up Effect
			
			// Check actions
			if ($('input[name=action]:checked').val() == "Add" ) 
			{
				$("#AddCustomer").show(); 
				$("#ModifyCustomer").hide(); 
				$("#DeleteCustomer").hide(); 
			}// end if
			else if ($('input[name=action]:checked').val() == "Modify" ) 
			{
				$("#AddCustomer").hide(); 
				$("#ModifyCustomer").show(); 
				$("#DeleteCustomer").hide(); 
			}// end else if
			else if ($('input[name=action]:checked').val() == "Delete" ) 
			{
				$("#AddCustomer").hide(); 
				$("#ModifyCustomer").hide(); 
				$("#DeleteCustomer").show(); 
			}// end else if
		}// end if
		else if ($('input[name=table]:checked').val() == "Airport" ) 
		{
			$("#Airport").show();  //Slide Down Effect
			
			// Slide everyone else down
			$("#Customer").hide();  //Slide Up Effect
			$("#Airplane").hide();  //Slide Up Effect
			$("#Flight").hide();  //Slide Up Effect
			$("#Ticket").hide();  //Slide Up Effect
			$("#VIP").hide();  //Slide Up Effect
			
			// Check actions
			if ($('input[name=action]:checked').val() == "Add" ) 
			{
				$("#AddAirport").show(); 
				$("#ModifyAirport").hide(); 
				$("#DeleteAirport").hide(); 
			}// end if
			else if ($('input[name=action]:checked').val() == "Modify" ) 
			{
				$("#AddAirport").hide(); 
				$("#ModifyAirport").show(); 
				$("#DeleteAirport").hide(); 
			}// end else if
			else if ($('input[name=action]:checked').val() == "Delete" ) 
			{
				$("#AddAirport").hide(); 
				$("#ModifyAirport").hide(); 
				$("#DeleteAirport").show(); 
			}// end else if
		}// end else if
		else if ($('input[name=table]:checked').val() == "Airplane" ) 
		{
			$("#Airplane").show();  //Slide Down Effect
			
			// Slide everyone else down
			$("#Customer").hide();  //Slide Up Effect
			$("#Airport").hide();  //Slide Up Effect
			$("#Flight").hide();  //Slide Up Effect
			$("#Ticket").hide();  //Slide Up Effect
			$("#VIP").hide();  //Slide Up Effect
			
			// Check actions
			if ($('input[name=action]:checked').val() == "Add" ) 
			{
				$("#AddAirplane").show(); 
				$("#ModifyAirplane").hide(); 
				$("#DeleteAirplane").hide(); 
			}// end if
			else if ($('input[name=action]:checked').val() == "Modify" ) 
			{
				$("#AddAirplane").hide(); 
				$("#ModifyAirplane").show(); 
				$("#DeleteAirplane").hide(); 
			}// end else if
			else if ($('input[name=action]:checked').val() == "Delete" ) 
			{
				$("#AddAirplane").hide(); 
				$("#ModifyAirplane").hide(); 
				$("#DeleteAirplane").show(); 
			}// end else if
		}// end else if
		else if ($('input[name=table]:checked').val() == "Flight" ) 
		{
			$("#Flight").show();  //Slide Down Effect
			
			// Slide everyone else down
			$("#Customer").hide();  //Slide Up Effect
			$("#Airport").hide();  //Slide Up Effect
			$("#Airplane").hide();  //Slide Up Effect
			$("#Ticket").hide();  //Slide Up Effect
			$("#VIP").hide();  //Slide Up Effect
			
			// Check actions
			if ($('input[name=action]:checked').val() == "Add" ) 
			{
				$("#AddFlight").show(); 
				$("#ModifyFlight").hide(); 
				$("#DeleteFlight").hide(); 
			}// end if
			else if ($('input[name=action]:checked').val() == "Modify" ) 
			{
				$("#AddFlight").hide(); 
				$("#ModifyFlight").show(); 
				$("#DeleteFlight").hide(); 
			}// end else if
			else if ($('input[name=action]:checked').val() == "Delete" ) 
			{
				$("#AddFlight").hide(); 
				$("#ModifyFlight").hide(); 
				$("#DeleteFlight").show(); 
			}// end else if
		}// end else if
		else if ($('input[name=table]:checked').val() == "Ticket" ) 
		{
			$("#Ticket").show();  //Slide Down Effect
			
			// Slide everyone else down
			$("#Customer").hide();  //Slide Up Effect
			$("#Airport").hide();  //Slide Up Effect
			$("#Airplane").hide();  //Slide Up Effect
			$("#Flight").hide();  //Slide Up Effect
			$("#VIP").hide();  //Slide Up Effect
			
			// Check actions
			if ($('input[name=action]:checked').val() == "Add" ) 
			{
				$("#AddTicket").show(); 
				$("#ModifyTicket").hide(); 
				$("#DeleteTicket").hide(); 
			}// end if
			else if ($('input[name=action]:checked').val() == "Modify" ) 
			{
				$("#AddTicket").hide(); 
				$("#ModifyTicket").show(); 
				$("#DeleteTicket").hide(); 
			}// end else if
			else if ($('input[name=action]:checked').val() == "Delete" ) 
			{
				$("#AddTicket").hide(); 
				$("#ModifyTicket").hide(); 
				$("#DeleteTicket").show(); 
			}// end else if
		}// end else if
		else if ($('input[name=table]:checked').val() == "VIP" ) 
		{
			$("#VIP").show();  //Slide Down Effect
			
			// Slide everyone else down
			$("#Customer").hide();  //Slide Up Effect
			$("#Airport").hide();  //Slide Up Effect
			$("#Airplane").hide();  //Slide Up Effect
			$("#Flight").hide();  //Slide Up Effect
			$("#Ticket").hide();  //Slide Up Effect
			
			// Check actions
			if ($('input[name=action]:checked').val() == "Add" ) 
			{
				$("#AddVIP").show(); 
				$("#ModifyVIP").hide(); 
				$("#DeleteVIP").hide(); 
			}// end if
			else if ($('input[name=action]:checked').val() == "Modify" ) 
			{
				$("#AddVIP").hide(); 
				$("#ModifyVIP").show(); 
				$("#DeleteVIP").hide(); 
			}// end else if
			else if ($('input[name=action]:checked').val() == "Delete" ) 
			{
				$("#AddVIP").hide(); 
				$("#ModifyVIP").hide(); 
				$("#DeleteVIP").show(); 
			}// end else if
		}// end else if
	 });
});