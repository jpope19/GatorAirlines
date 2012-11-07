// JQuery that uses the Validate plugin to validate the customer data on the client side

// This part is for AddAirportForm
$(document).ready(function()
{	// Rule for names
	$.validator.addMethod("alphabet", function(value, element) {
        return this.optional(element) || /^[a-zA-Z]+$/i.test(value);
    }, "Your input may only contain letters.");
	
	$.validator.addMethod("capAlphabet", function(value, element) {
        return this.optional(element) || /^[A-Z]+$/i.test(value);
    }, "Your input may only contain letters.");
	
	$.validator.addMethod("name", function(value, element) {
        return this.optional(element) || /^[a-zA-Z ]+$/i.test(value);
    }, "Your input may only contain letters and a space.");
	
    $("#AddAirportForm").validate({
		// Apply rules
		ignore: ".checkbox, .date, .chosen",
		rules: {
			"city": {
				required: true, 
				maxlength: 30,
				alphabet: false,
				name: true
			},
			"state": {
				required: true, 
				maxlength: 30,
				alphabet: true,
				name: false
			},
			"iata": {
				required: true, 
				rangelength: [3,3],
				alphabet: false,
				capAlphabet: true,
				name: false
			},
			"name": {
				required: true, 
				maxlength: 30,
				alphabet: true,
				name: true
			}
		},
		
		// Messages for the rules
		messages: {
			"city": {
				required: "You must provide the city of the airport.",
				name: "The city may only be letters and spaces."
			},
			"state": {
				required: "You must provide the state of the airport.",
				name: "The state may only be letters and spaces."
			},
			"iata": {
				required: "You must provide the IATA.",
				capAlphabet: "The IATA can only contain capital letters.",
				rangeLength: "The IATA must be 3 characters long"
			},
			"name": {
				required: "You must provide the name of the airport.",
				name: "The name may only be letters and spaces."
			}
		}
	});
});

// This part is for ModifyAirportForm
$(document).ready(function()
{	// Rule for names
	$.validator.addMethod("alphabet", function(value, element) {
        return this.optional(element) || /^[a-zA-Z]+$/i.test(value);
    }, "Your input may only contain letters.");
	
	$.validator.addMethod("capAlphabet", function(value, element) {
        return this.optional(element) || /^[A-Z]+$/i.test(value);
    }, "Your input may only contain letters.");
	
	$.validator.addMethod("name", function(value, element) {
        return this.optional(element) || /^[a-zA-Z ]+$/i.test(value);
    }, "Your input may only contain letters and a space.");
	
    $("#ModifyAirportForm").validate({
		// Apply rules
		ignore: ".checkbox, .date, .chosen",
		rules: {
			"acity": {
				required: true, 
				maxlength: 30,
				alphabet: true,
				name: false
			},
			"astate": {
				required: true, 
				maxlength: 30,
				alphabet: true,
				name: false
			},
			"iata": {
				required: true, 
				rangelength: [3,3],
				alphabet: false,
				capAlphabet: true,
				name: false
			},
			"name": {
				required: true, 
				maxlength: 30,
				alphabet: true,
				name: true
			}
		},
		
		// Messages for the rules
		messages: {
			"acity": {
				required: "You must provide the city of the airport.",
				name: "The city may only be letters and spaces."
			},
			"astate": {
				required: "You must provide the state of the airport.",
				name: "The state may only be letters and spaces."
			},
			"iata": {
				required: "You must provide the IATA.",
				capAlphabet: "The IATA can only contain capital letters.",
				rangeLength: "The IATA must be 3 characters long"
			},
			"name": {
				required: "You must provide the name of the airport.",
				name: "The name may only be letters and spaces."
			}
		}
	});
});