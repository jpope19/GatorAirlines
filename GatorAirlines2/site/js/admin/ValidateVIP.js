// JQuery that uses the Validate plugin to validate the VIP data on the client side

// This part is for AddVIPForm
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
	
	$.validator.addMethod("numeric", function(value, element) {
		return this.optional(element) || /^[0-9]+$/i.test(value);
	}, "Your input may only contain numbers.");
	
	
    $("#AddVIPForm").validate({
		// Apply rules
		ignore: ".checkbox"
		rules: {
			"email":{
				required: true, 
				maxlength: 30,
				alphabet: false,
				address: false,
				name: false
			},
			"totalDistanceTraveled": {
				required: true, 
				maxlength: 30,
				alphabet: false,
				address: false,
				digits: true,
				rangelength: [1,30],
				name: false
			},
			"rewardPoints": {
				required: true, 
				maxlength: 30,
				alphabet: false,
				address: false,
				digits: true,
				rangelength: [1,30],
				name: false
			}
			
			
		},
		
		// Messages for the rules
		messages: {
			"email": {
				required: "You must provide an email.",
			},
			"totalDistanceTraveled": {
				required: "You must provide the total distance traveled by this VIP.",
				rangelength: "Total distance traveled must be between 1 and 30 digits." 
			},
			"rewardPoints": {
				required: "You must provide the reward points for this VIP.",
				rangelength: "Reward points must be between 1 and 30 digits."
			},
			/*
			"joinDate": {
				required: "You must provide the date this VIP signed up for an account.",
			}
			*/
			
		}
	});
});

// This part is for ModifyVIPForm
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
	
	$.validator.addMethod("numeric", function(value, element) {
		return this.optional(element) || /^[0-9]+$/i.test(value);
	}, "Your input may only contain numbers.");
	
	
    $("#ModifyVIPForm").validate({
		// Apply rules
		rules: {
			"email":{
				required: true, 
				maxlength: 30,
				alphabet: false,
				address: false,
				name: false
			},
			"totalDistanceTraveled": {
				required: true, 
				maxlength: 30,
				alphabet: false,
				address: false,
				digits: true,
				rangelength: [1,30],
				name: false
			},
			"rewardPoints": {
				required: true, 
				maxlength: 30,
				alphabet: false,
				address: false,
				digits: true,
				rangelength: [1,30],
				name: false
			}
		},
		
		// Messages for the rules
		messages: {
			"email": {
				required: "You must provide an email.",
			},
			"totalDistanceTraveled": {
				required: "You must provide the total distance traveled by this VIP.",
				rangelength: "Total distance traveled must be between 1 and 30 digits." 
			},
			"rewardPoints": {
				required: "You must provide the reward points for this VIP.",
				rangelength: "Reward points must be between 1 and 30 digits."
			}
			/*
			"joinDate": {
				required: "You must provide the date this VIP signed up for an account.",
			}
			*/
			
		}
	});
});