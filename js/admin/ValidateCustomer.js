// JQuery that uses the Validate plugin to validate the customer data on the client side

// This part is for AddCustomerForm
$(document).ready(function()
{	// Rule for names
	$.validator.addMethod("alphabet", function(value, element) {
        return this.optional(element) || /^[a-zA-Z]+$/i.test(value);
    }, "Your alphabet may only contain letters.");
	
	$.validator.addMethod("address", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9 ]+$/i.test(value);
    }, "The address may only contain letters and numbers.");
	
	$.validator.addMethod("zip", function(value, element) {
        return this.optional(element) || /^[0-9]+$/i.test(value);
    }, "The address may only contain letters and numbers.");
	
	$.validator.addMethod("name", function(value, element) {
        return this.optional(element) || /^[a-zA-Z ]+$/i.test(value);
    }, "Your input may only contain letters and a space.");
	
    $("#AddCustomerForm").validate({
		// Apply rules
		rules: {
			"email":{
				required: true, 
				maxlength: 30,
				alphabet: false,
				address: false,
				name: false
			},
			"first_name": {
				required: true, 
				maxlength: 30,
				alphabet: true,
				address: false,
				name: false
			},
			"last_name": {
				required: true,
				maxlength: 30,
				alphabet: true,
				address: false,
				name: false
			},
			"password": {
				required: true, 
				maxlength: 30,
				alphabet: false,
				address: false,
				name: false
			},
			"addr": {
				required: true, 
				maxlength: 30,
				alphabet: false,
				address: true,
				name: false
			},
			"city": {
				required: true, 
				maxlength: 30,
				alphabet: true,
				address: false,
				name: true
			},
			"state": {
				required: true, 
				maxlength: 30,
				alphabet: true,
				address: false,
				name: true
			},
			"zip": {
				required: true, 
				maxlength: 30,
				alphabet: false,
				address: false,
				digits: true,
				rangelength: [5,5],
				name: false
			},
			"cc_num": {
				required: true, 
				maxlength: 30,
				alphabet: false,
				address: false,
				name: false
			},
			"u_type": {
				required: true, 
				maxlength: 30,
				alphabet: false,
				address: false,
				digits: true,
				rangelength: [1,1],
				name: false
			}
		},
		
		// Messages for the rules
		messages: {
			"email": {
				required: "You must provide an email.",
			},
			"first_name": {
				required: "You must provide a first name.",
				alphabet: "Your first name may only contain letters."
			},
			"last_name": {
				required: "You must provide a last name.",
				alphabet: "Your last name may only contian letters."
			},
			"password": {
				required: "You must provide a password.",
			},
			"addr": {
				required: "You must provide the street of the billing address.",
			},
			"city": {
				required: "You must provide the city of the billing address.",
				name: "The city may only be letters and spaces."
			},
			"state": {
				required: "You must provide the state of the billing address.",
				name: "The state may only be letters and letters."
			},
			"zip": {
				required: "You must provide the zip of the billing addrss.",
				rangelength: "Your zip code must be 5 digits long." 
			},
			"cc_num": {
				required: "You must provide your credit card number.",
			},
			"u_type": {
				required: "You must provide a user type.",
				digits: "The user type can only be a number",
				rangelength: "The user type is only 1 digit."
			}
		}
	});
});

// This part is for ModifyCustomerForm
$(document).ready(function()
{	// Rule for names
	$.validator.addMethod("alphabet", function(value, element) {
        return this.optional(element) || /^[a-zA-Z]+$/i.test(value);
    }, "Your alphabet may only contain letters.");
	
	$.validator.addMethod("address", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9 ]+$/i.test(value);
    }, "The address may only contain letters and numbers.");
	
	$.validator.addMethod("zip", function(value, element) {
        return this.optional(element) || /^[0-9]+$/i.test(value);
    }, "The address may only contain letters and numbers.");
	
	$.validator.addMethod("name", function(value, element) {
        return this.optional(element) || /^[a-zA-Z ]+$/i.test(value);
    }, "Your input may only contain letters and a space.");
	
    $("#ModifyCustomerForm").validate({
		// Apply rules
		rules: {
			"email":{
				required: true, 
				maxlength: 30,
				alphabet: false,
				address: false,
				name: false
			},
			"first_name": {
				required: true, 
				maxlength: 30,
				alphabet: true,
				address: false,
				name: false
			},
			"last_name": {
				required: true,
				maxlength: 30,
				alphabet: true,
				address: false,
				name: false
			},
			"password": {
				required: true, 
				maxlength: 30,
				alphabet: false,
				address: false,
				name: false
			},
			"addr": {
				required: true, 
				maxlength: 30,
				alphabet: false,
				address: true,
				name: false
			},
			"city": {
				required: true, 
				maxlength: 30,
				alphabet: true,
				address: false,
				name: true
			},
			"state": {
				required: true, 
				maxlength: 30,
				alphabet: true,
				address: false,
				name: true
			},
			"zip": {
				required: true, 
				maxlength: 30,
				alphabet: false,
				address: false,
				digits: true,
				rangelength: [5,5],
				name: false
			},
			"cc_num": {
				required: true, 
				maxlength: 30,
				alphabet: false,
				address: false,
				name: false
			},
			"u_type": {
				required: true, 
				maxlength: 30,
				alphabet: false,
				address: false,
				digits: true,
				rangelength: [1,1],
				name: false
			}
		},
		
		// Messages for the rules
		messages: {
			"email": {
				required: "You must provide an email.",
			},
			"first_name": {
				required: "You must provide a first name.",
				alphabet: "Your first name may only contain letters."
			},
			"last_name": {
				required: "You must provide a last name.",
				alphabet: "Your last name may only contian letters."
			},
			"password": {
				required: "You must provide a password.",
			},
			"addr": {
				required: "You must provide the street of the billing address.",
			},
			"city": {
				required: "You must provide the city of the billing address.",
				name: "The city may only be letters and spaces."
			},
			"state": {
				required: "You must provide the state of the billing address.",
				name: "The state may only be letters and spaces."
			},
			"zip": {
				required: "You must provide the zip of the billing addrss.",
				rangelength: "Your zip code must be 5 digits long." 
			},
			"cc_num": {
				required: "You must provide your credit card number.",
			},
			"u_type": {
				required: "You must provide a user type.",
				digits: "The user type can only be a number",
				rangelength: "The user type is only 1 digit."
			}
		}
	});
});