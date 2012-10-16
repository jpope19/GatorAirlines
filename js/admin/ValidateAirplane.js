// JQuery that uses the Validate plugin to validate the customer data on the client side

// This part is for AddAirplaneForm
$(document).ready(function()
{	// Rule for names
	$.validator.addMethod("alphabet", function(value, element) {
        return this.optional(element) || /^[a-zA-Z]+$/i.test(value);
    }, "Your alphabet may only contain letters.");
	
    $("#AddAirplaneForm").validate({
		// Apply rules
		rules: {
			"type":{
				required: true, 
				maxlength: 30,
				alphabet: true
			},
			"chart_addr": {
				required: true, 
				maxlength: 30,
				alphabet: true
			},
			"num_first_class": {
				required: true,
				maxlength: 30,
				alphabet: false,
				digits: true
			},
			"num_coach_class": {
				required: true, 
				maxlength: 30,
				alphabet: false,
				digits: true
			}
		},
		
		// Messages for the rules
		messages: {
			"type": {
				required: "You must provide an airplane type.",
				alphabet: "The airplane type may only contain letters."
			},
			"chart_addr": {
				required: "You must provide a chart address.",
				alphabet: "The chart address may only contain letters."
			},
			"num_first_class": {
				required: "You must provide the number of first class seats.",
				digits: "This can only be a number."
			},
			"num_coach_class": {
				required: "You must provide a number of coach class seats.",
				digits: "This can only be a number."
			}
		}
	});
});

// This part is for ModifyAirplaneForm
$(document).ready(function()
{	// Rule for names
	$.validator.addMethod("alphabet", function(value, element) {
        return this.optional(element) || /^[a-zA-Z]+$/i.test(value);
    }, "Your alphabet may only contain letters.");
	
    $("#ModifyAirplaneForm").validate({
		// Apply rules
		rules: {
			"type":{
				required: true, 
				maxlength: 30,
				alphabet: true
			},
			"chart_addr": {
				required: true, 
				maxlength: 30,
				alphabet: true
			},
			"num_first_class": {
				required: true,
				maxlength: 30,
				alphabet: false,
				digits: true
			},
			"num_coach_class": {
				required: true, 
				maxlength: 30,
				alphabet: false,
				digits: true
			}
		},
		
		// Messages for the rules
		messages: {
			"type": {
				required: "You must provide an airplane type.",
				alphabet: "The airplane type may only contain letters."
			},
			"chart_addr": {
				required: "You must provide a chart address.",
				alphabet: "The chart address may only contain letters."
			},
			"num_first_class": {
				required: "You must provide the number of first class seats.",
				digits: "This can only be a number."
			},
			"num_coach_class": {
				required: "You must provide a number of coach class seats.",
				digits: "This can only be a number."
			}
		}
	});
});