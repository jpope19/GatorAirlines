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
});