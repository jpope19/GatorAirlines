// JQuery that uses the Validate plugin to validate the customer data on the client side

// This part is for AddAirportForm
$(document).ready(function()
{	// Rule for names
	$.validator.addMethod("alphabet", function(value, element) {
        return this.optional(element) || /^[a-zA-Z]+$/i.test(value);
    }, "Your alphabet may only contain letters.");
	
    $("#AddAirportForm").validate({
		// Apply rules
		rules: {
			"city": {
				required: true,
				alphabet: true
			},
			"state": {
				required: true,
				alphabet: true
			},
			"iata": {
				required: true,
				alphabet: false
			},
			"name": {
				required: true,
				alphabet: true
			}
		},
		
		// Messages for the rules
		messages: {
			"city": {
				required: "You must provide the city of the airport.",
				alphabet: "The city may only be letters."
			},
			"state": {
				required: "You must provide the state of the airport.",
				alphabet: "The state may only be letters."
			},
			"iata": {
				required: "You must provide the IATA.",
				alphabet: "The IATA can only contain letters." 
			},
			"name": {
				required: "You must provide the name of the airport.",
				alphabet: "The name of the airport can only contain letters."
			}
		}
	});
});

// This part is for ModifyAirportForm
$(document).ready(function()
{	// Rule for names
	$.validator.addMethod("alphabet", function(value, element) {
        return this.optional(element) || /^[a-zA-Z]+$/i.test(value);
    }, "Your alphabet may only contain letters.");
	
    $("#ModifyAirportForm").validate({
		// Apply rules
		rules: {
			"acity": {
				required: true,
				alphabet: true
			},
			"astate": {
				required: true,
				alphabet: true
			},
			"iata": {
				required: true,
				alphabet: false
			},
			"name": {
				required: true,
				alphabet: true
			}
		},
		
		// Messages for the rules
		messages: {
			"acity": {
				required: "You must provide the city of the airport.",
				alphabet: "The city may only be letters."
			},
			"astate": {
				required: "You must provide the state of the airport.",
				alphabet: "The state may only be letters."
			},
			"iata": {
				required: "You must provide the IATA.",
				alphabet: "The IATA can only contain letters." 
			},
			"name": {
				required: "You must provide the name of the airport.",
				alphabet: "The name of the airport can only contain letters."
			}
		}
	});
});