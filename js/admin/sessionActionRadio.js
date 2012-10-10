// Used in admin page to retain menu state
$(document).ready(function()
{
	// Click events for actions
	$(".action").ready(function()
	{// When table radios are readyed
		if ($('input[name=action]:checked').val() == "Add" ) 
		{
			$("#AddCustomer").show(); //Slide Down Effect
			$("#AddAirport").show();  //Slide Down Effect
			$("#AddAirplane").show();  //Slide Down Effect
			$("#AddFlight").show();  //Slide Down Effect
			$("#AddTicket").show();  //Slide Down Effect
			$("#AddVIP").show();  //Slide Down Effect
			
			$("#ModifyCustomer").hide(); //Slide Down Effect
			$("#ModifyAirport").hide();  //Slide Up Effect
			$("#ModifyAirplane").hide();  //Slide Up Effect
			$("#ModifyFlight").hide();  //Slide Up Effect
			$("#ModifyTicket").hide();  //Slide Up Effect
			$("#ModifyVIP").hide();  //Slide Up Effect
			
			$("#DeleteCustomer").hide(); //Slide Down Effect
			$("#DeleteAirport").hide();  //Slide Up Effect
			$("#DeleteAirplane").hide();  //Slide Up Effect
			$("#DeleteFlight").hide();  //Slide Up Effect
			$("#DeleteTicket").hide();  //Slide Up Effect
			$("#DeleteVIP").hide();  //Slide Up Effect
		}// end if
		else if ($('input[name=action]:checked').val() == "Modify" ) 
		{
			$("#ModifyCustomer").show(); //Slide Down Effect
			$("#ModifyAirport").show();  //Slide Down Effect
			$("#ModifyAirplane").show();  //Slide Down Effect
			$("#ModifyFlight").show();  //Slide Down Effect
			$("#ModifyTicket").show();  //Slide Down Effect
			$("#ModifyVIP").show();  //Slide Down Effect
			
			$("#AddCustomer").hide(); //Slide Down Effect
			$("#AddAirport").hide();  //Slide Up Effect
			$("#AddAirplane").hide();  //Slide Up Effect
			$("#AddFlight").hide();  //Slide Up Effect
			$("#AddTicket").hide();  //Slide Up Effect
			$("#AddVIP").hide();  //Slide Up Effect
			
			$("#DeleteCustomer").hide(); //Slide Down Effect
			$("#DeleteAirport").hide();  //Slide Up Effect
			$("#DeleteAirplane").hide();  //Slide Up Effect
			$("#DeleteFlight").hide();  //Slide Up Effect
			$("#DeleteTicket").hide();  //Slide Up Effect
			$("#DeleteVIP").hide();  //Slide Up Effect
		}// end else if
		else if ($('input[name=action]:checked').val() == "Delete" ) 
		{
			$("#DeleteCustomer").show(); //Slide Down Effect
			$("#DeleteAirport").show();  //Slide Down Effect
			$("#DeleteAirplane").show();  //Slide Down Effect
			$("#DeleteFlight").show();  //Slide Down Effect
			$("#DeleteTicket").show();  //Slide Down Effect
			$("#DeleteVIP").show();  //Slide Down Effect
			
			$("#AddCustomer").hide(); //Slide Down Effect
			$("#AddAirport").hide();  //Slide Up Effect
			$("#AddAirplane").hide();  //Slide Up Effect
			$("#AddFlight").hide();  //Slide Up Effect
			$("#AddTicket").hide();  //Slide Up Effect
			$("#AddVIP").hide();  //Slide Up Effect
			
			$("#ModifyCustomer").hide(); //Slide Down Effect
			$("#ModifyAirport").hide();  //Slide Up Effect
			$("#ModifyAirplane").hide();  //Slide Up Effect
			$("#ModifyFlight").hide();  //Slide Up Effect
			$("#ModifyTicket").hide();  //Slide Up Effect
			$("#ModifyVIP").hide();  //Slide Up Effect
		}// end else if
	 });
});