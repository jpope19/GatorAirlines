// Used in admin page to select sql action (add, modify aka update, or delete) based on radio choice
$(document).ready(function()
{
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