// JQuery that uses the Validate plugin to validate the customer data on the client side

// This part is for AddTicketForm
$(document).ready(function()
{	
    $("#AddTicketForm").validate({
		// Apply rules
		ignore: ".checkbox, .date, .chosen",
		rules: {
			"cid":{
				required: true, 
				maxlength: 30,
				digits: true,
				name: false
			},
			"flight_id": {
				required: true, 
				maxlength: 30,
				digits: true,
				name: false
			},
			"seat_id": {
				required: true,
				maxlength: 30,
				digits: true,
				name: false
			},
			"price": {
				required: true, 
				maxlength: 30,
				digits: true,
				name: false
			}
		},
		
		// Messages for the rules
		messages: {
			"cid": {
				required: "You must provide a customer ID.",
				digits: "The customer ID must be an integer."
			},
			"flight_id": {
				required: "You must provide a flight ID.",
				digits: "The flight ID must be an integer."
			},
			"seat_id": {
				required: "You must provide a seat ID.",
				digits: "The seat ID must be an integer."
			},
			"price": {
				required: "You must provide a price.",
				digits: "The price ID must be an integer."
			}
		}
	});
});

// This part is for ModifyTicketForm
$(document).ready(function()
{	
    $("#ModifyTicketForm").validate({
		// Apply rules
		ignore: ".checkbox, .date, .chosen",
		rules: {
			"cid":{
				required: true, 
				maxlength: 30,
				digits: true,
				name: false
			},
			"flight_id": {
				required: true, 
				maxlength: 30,
				digits: true,
				name: false
			},
			"seat_id": {
				required: true,
				maxlength: 30,
				digits: true,
				name: false
			},
			"price": {
				required: true, 
				maxlength: 30,
				digits: true,
				name: false
			}
		},
		
		// Messages for the rules
		messages: {
			"cid": {
				required: "You must provide a customer ID.",
				digits: "The customer ID must be an integer."
			},
			"flight_id": {
				required: "You must provide a flight ID.",
				digits: "The flight ID must be an integer."
			},
			"seat_id": {
				required: "You must provide a seat ID.",
				digits: "The seat ID must be an integer."
			},
			"price": {
				required: "You must provide a price.",
				digits: "The price ID must be an integer."
			}
		}
	});
});